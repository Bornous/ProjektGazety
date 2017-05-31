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
	if ( !isset($_SESSION["ParafiaDoZnalezienia"])  OR !isset($_GET["mgn_nak"]) OR !isset($_GET["gnd_nak"]) OR !isset($_GET["ndz_nak"]) OR !isset($_SESSION["tt"]) OR !isset($_SESSION["rr"]) )
	{
		header('Location: panel_HomePage.php?error=Brak_podstawowych_danych');
		exit();
	
	}
	else{
		$pol_baza = mysqli_connect($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_gazety);
		if(!$pol_baza){
			die('Problem z połączeniem się z bazą: '.mysqli_error($pol_baza));
		}
		
		mysqli_query($pol_baza,"SET NAMES utf8");
		
		
		$q_naklad="UPDATE naklad SET maly='".$_GET["mgn_nak"]."' , gosc='".$_GET["gnd_nak"]."' , niedziela='".$_GET["ndz_nak"]."' WHERE id_par='".$_SESSION["ParafiaDoZnalezienia"]."' ";
		
		
		if($re_naklad=mysqli_query($pol_baza,$q_naklad))$erro=1;else $erro=0;
		
		
		mysql_free_result($re_naklad);
	
		mysqli_close($pol_baza);
		
		header('Location: panel_zmienNAK.php?feedback='.$erro.'&parafia='.$_SESSION["ParafiaDoZnalezienia"]);
		
		
	}
	
	


?>