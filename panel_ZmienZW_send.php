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
	if ( !isset($_SESSION["ParafiaDoZnalezienia"])  OR !isset($_GET["mgn"]) OR !isset($_GET["gnd"]) OR !isset($_GET["ndz"]) OR !isset($_SESSION["tt"]) OR !isset($_SESSION["rr"]) )
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
		
		$q_naklad=mysqli_query($pol_baza,"SELECT * FROM naklad WHERE id_par='".$_SESSION["ParafiaDoZnalezienia"]."' ");
		
		$q_cena_mgn=mysqli_query($pol_baza,"SELECT cena FROM cenygazet WHERE id_gazety=1");
		$q_cena_gnd=mysqli_query($pol_baza,"SELECT cena FROM cenygazet WHERE id_gazety=2");
		$q_cena_ndz=mysqli_query($pol_baza,"SELECT cena FROM cenygazet WHERE id_gazety=3");
	
		$naklad=mysqli_fetch_assoc($q_naklad);
		
		$cena_mgn=mysqli_fetch_assoc($q_cena_mgn);
		$cena_gnd=mysqli_fetch_assoc($q_cena_gnd);
		$cena_ndz=mysqli_fetch_assoc($q_cena_ndz);
		
		$spr_mgn=$cena_mgn['cena']*($naklad['maly']-$_GET["mgn"]);
		$spr_gnd=$cena_gnd['cena']*($naklad['gosc']-$_GET["gnd"]);
		$spr_ndz=$cena_ndz['cena']*($naklad['niedziela']-$_GET["ndz"]);
		
		$maly_update="UPDATE bazamgn SET zwr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$_GET["mgn"]."' , spr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$spr_mgn."' WHERE id_par='".$_SESSION["ParafiaDoZnalezienia"]."' ";
		$gosc_update="UPDATE bazagnd SET zwr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$_GET["gnd"]."' , spr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$spr_gnd."' WHERE id_par='".$_SESSION["ParafiaDoZnalezienia"]."'";
		$niedziela_update="UPDATE bazandz SET zwr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$_GET["ndz"]."' , spr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$spr_ndz."' WHERE id_par='".$_SESSION["ParafiaDoZnalezienia"]."'";
		
		if($_GET["mgn"]!="bez_zmian"){if($q_mgn=mysqli_query($pol_baza,$maly_update))$erro_mgn=1;else $erro_mgn=0;}
		else$erro_mgn=3;
		if($_GET["gnd"]!="bez_zmian"){if($q_gnd=mysqli_query($pol_baza,$gosc_update))$erro_gnd=1;else $erro_gnd=0;}
		else$erro_gnd=3;
		if($_GET["ndz"]!="bez_zmian"){if($q_ndz=mysqli_query($pol_baza,$niedziela_update))$erro_ndz=1;else $erro_ndz=0;}
		else$erro_ndz=3;
		
		mysql_free_result($q_naklad);
		mysql_free_result($q_cena_mgn);
		mysql_free_result($q_cena_gnd);
		mysql_free_result($q_cena_ndz);
		if($_GET["mgn"]!="bez_zmian")mysql_free_result($q_mgn);
		if($_GET["gnd"]!="bez_zmian")mysql_free_result($q_gnd);
		if($_GET["ndz"]!="bez_zmian")mysql_free_result($q_ndz);
		mysqli_close($pol_baza);
		if($_GET["mgn"]!="bez_zmian" AND $_GET["gnd"]!="bez_zmian" AND $_GET["ndz"]!="bez_zmian")header('Location: panel_zmienZW.php?feedback='.$erro_mgn.$erro_gnd.$erro_ndz.'&parafia='.$_SESSION["ParafiaDoZnalezienia"]);
		else header('Location: panel_HomePage.php?feedback='.$erro_mgn.$erro_gnd.$erro_ndz.'&parafia='.$_SESSION["ParafiaDoZnalezienia"]);
		
	}
	
	


?>