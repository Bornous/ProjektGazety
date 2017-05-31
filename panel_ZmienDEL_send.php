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
	if ( !isset($_GET["parafia"])  )
	{
		header('Location: panel_HomePage.php?error=Brak_podstawowych_danych');
		exit();
	
	}
	else{
		$pol_baza = mysqli_connect($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_gazety);
		if(!$pol_baza){
			die('Problem z połączeniem się bazą: '.mysqli_error($pol_baza));
		}
		
		$q_DELbazamgn="DELETE FROM `bazamgn` WHERE `id_par`='".$_GET["parafia"]."' ";
		$q_DELbazagnd="DELETE FROM `bazagnd` WHERE `id_par`='".$_GET["parafia"]."' ";
		$q_DELbazandz="DELETE FROM `bazandz` WHERE `id_par`='".$_GET["parafia"]."' ";
		$q_DELnaklad="DELETE FROM `naklad` WHERE `id_par`='".$_GET["parafia"]."' ";
		
		$q_przestawienieAImgn="ALTER TABLE `bazamgn` AUTO_INCREMENT = 0";
		$q_przestawienieAIgnd="ALTER TABLE `bazagnd` AUTO_INCREMENT = 0";
		$q_przestawienieAIndz="ALTER TABLE `bazandz` AUTO_INCREMENT = 0";
		$q_przestawienieAInak="ALTER TABLE `naklad` AUTO_INCREMENT = 0";
		
		
		$res_DELbazamgn=$pol_baza->query($q_DELbazamgn);
		$res_DELbazagnd=$pol_baza->query($q_DELbazagnd);
		$res_DELbazandz=$pol_baza->query($q_DELbazandz);
		$res_DELnaklad=$pol_baza->query($q_DELnaklad);
		$res_przestawienieAImgn=$pol_baza->query($q_przestawienieAImgn);
		$res_przestawienieAIgnd=$pol_baza->query($q_przestawienieAIgnd);
		$res_przestawienieAIndz=$pol_baza->query($q_przestawienieAIndz);
		$res_przestawienieAInak=$pol_baza->query($q_przestawienieAInak);
		
		$error[8];
		
		if($res_DELbazamgn)$error[0]=1;else $error[0]=0;
	
		if($res_DELbazagnd)$error[1]=1;else $error[1]=0;
		
		if($res_DELbazandz)$error[2]=1;else $error[2]=0;
		
		if($res_DELnaklad)$error[3]=1;else $error[3]=0;
		
		if($res_przestawienieAImgn)$error[4]=1;else $error[4]=0;
		
		if($res_przestawienieAIgnd)$error[5]=1;else $error[5]=0;
			
		if($res_przestawienieAIndz)$error[6]=1;else $error[6]=0;
		
		if($res_przestawienieAInak)$error[7]=1;else $error[7]=0;
		
		mysql_free_result($res_DELbazamgn);
		mysql_free_result($res_DELbazagnd);
		mysql_free_result($res_DELbazandz);
		mysql_free_result($res_DELnaklad);
		mysql_free_result($res_przestawienieAImgn);
		mysql_free_result($res_przestawienieAIgnd);
		mysql_free_result($res_przestawienieAIndz);
		mysql_free_result($res_przestawienieAInak);
		
		
		mysqli_close($pol_baza);
		$komunikat=$error[0].$error[1].$error[2].$error[3].$error[4].$error[5].$error[6].$error[7];
		if($komunikat=="11111111")header('Location: panel_HomePage.php?error=Parafia została usunięta&parafia='.$_GET["parafia"]);
		else header('Location: panel_zmienDEL.php?error=Parafia nie została usunięta!!!&parafia='.$_GET["parafia"]);
		
	}
	
	


?>