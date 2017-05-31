<?php
	require_once "daneDoPolaczenia.php";
	/*
	$host 
	$uzytkownik_bazy
	$haslo_uzytkownika
	$baza_logowania
	$baza_gazety
	*/

	session_start();
	if ( !isset($_GET["nowaParafia"]) /* OR !isset($_GET["nowyDekanat"]) */)
	{
		header('Location: panel_HomePage.php?error=Brak_podstawowych_danych');
		exit();
	
	}
	else{
		$pol_baza = mysqli_connect($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_gazety);
		if(!$pol_baza){
			die('Problem z połączeniem się z bazą: '.mysqli_error($pol_baza));
		}
		
		$q_NAZbazamgn="UPDATE bazamgn SET parafia='".$_GET["nowaParafia"]."' WHERE id_par='".$_GET["parafia"]."' ";
		$q_NAZbazagnd="UPDATE bazagnd SET parafia='".$_GET["nowaParafia"]."' WHERE id_par='".$_GET["parafia"]."' ";
		$q_NAZbazandz="UPDATE bazandz SET parafia='".$_GET["nowaParafia"]."' WHERE id_par='".$_GET["parafia"]."' ";
		$q_NAZnaklad="UPDATE naklad SET parafia='".$_GET["nowaParafia"]."' WHERE id_par='".$_GET["parafia"]."' ";
		
		
		
		
		$res_NAZbazamgn=$pol_baza->query($q_NAZbazamgn);
		$res_NAZbazagnd=$pol_baza->query($q_NAZbazagnd);
		$res_NAZbazandz=$pol_baza->query($q_NAZbazandz);
		$res_NAZnaklad=$pol_baza->query($q_NAZnaklad);

		
		$error[4];
		
		if($res_NAZbazamgn)$error[0]=1;else $error[0]=0;
	
		if($res_NAZbazagnd)$error[1]=1;else $error[1]=0;
		
		if($res_NAZbazandz)$error[2]=1;else $error[2]=0;
		
		if($res_NAZnaklad)$error[3]=1;else $error[3]=0;
		
		
		mysql_free_result($res_NAZbazamgn);
		mysql_free_result($res_NAZbazagnd);
		mysql_free_result($res_NAZbazandz);
		mysql_free_result($res_NAZnaklad);
		
		mysqli_close($pol_baza);
		$komunikat=$error[0].$error[1].$error[2].$error[3].$error[4].$error[5].$error[6].$error[7];
		if($komunikat=="1111")header('Location: panel_HomePage.php?error=Nazwa parafi zostala zmieniona&parafia='.$_GET["nowaParafia"]);
		else header('Location: panel_zmienNAZ.php?error=Wystąpił błąd!!!&parafia='.$_GET["nowaParafia"]);
		
	}
	
	


?>