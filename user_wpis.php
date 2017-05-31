<?php
		session_start();

		require_once "daneDoPolaczenia.php";
			/*
			$host 
			$uzytkownik_bazy
			$haslo_uzytkownika
			$baza_logowania
			$baza_gazety
			*/
	if(!isset($_POST["parafia"]) OR !isset($_POST["mgn"]) OR !isset($_POST["gnd"]) OR !isset($_POST["ndz"]) OR !isset($_SESSION["tt"]) OR !isset($_SESSION["rr"]) ){
		header('Location: user_formularz.php?error=nie_zostaly_wprowadzone_dane');
	}
		
		$pol_baza = mysqli_connect($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_gazety);
		if(!$pol_baza){
			die('Problem z połączeniem się z bazą: '.mysqli_error($pol_baza));
		}
		
		mysqli_query($pol_baza,"SET NAMES UTF8");
		
		$q_naklad=mysqli_query($pol_baza,"SELECT * FROM naklad WHERE  parafia='".$_POST["parafia"]."'");
		
		$q_cena_mgn=mysqli_query($pol_baza,"SELECT cena FROM cenygazet WHERE id_gazety=1");
		$q_cena_gnd=mysqli_query($pol_baza,"SELECT cena FROM cenygazet WHERE id_gazety=2");
		$q_cena_ndz=mysqli_query($pol_baza,"SELECT cena FROM cenygazet WHERE id_gazety=3");
	
		$naklad=mysqli_fetch_assoc($q_naklad);
		
		$cena_mgn=mysqli_fetch_assoc($q_cena_mgn);
		$cena_gnd=mysqli_fetch_assoc($q_cena_gnd);
		$cena_ndz=mysqli_fetch_assoc($q_cena_ndz);
		
		$spr_mgn=$cena_mgn['cena']*($naklad['maly']-$_POST["mgn"]);
		$spr_gnd=$cena_gnd['cena']*($naklad['gosc']-$_POST["gnd"]);
		$spr_ndz=$cena_ndz['cena']*($naklad['niedziela']-$_POST["ndz"]);
		
		$maly_update="UPDATE bazamgn SET zwr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$_POST["mgn"]."' , spr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$spr_mgn."' WHERE (dekanat='".$_POST["dekanat"]."' AND parafia='".$_POST["parafia"]."')";
		$gosc_update="UPDATE bazagnd SET zwr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$_POST["gnd"]."' , spr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$spr_gnd."' WHERE (dekanat='".$_POST["dekanat"]."' AND parafia='".$_POST["parafia"]."')";
		$niedziela_update="UPDATE bazandz SET zwr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$_POST["ndz"]."' , spr_".$_SESSION["tt"]."_".$_SESSION["rr"]."='".$spr_ndz."' WHERE (dekanat='".$_POST["dekanat"]."' AND parafia='".$_POST["parafia"]."')";
		
		if($q_mgn=mysqli_query($pol_baza,$maly_update))$erro_mgn=1;
		else $erro_mgn=0;
		if($q_gnd=mysqli_query($pol_baza,$gosc_update))$erro_gnd=1;
		else $erro_gnd=0;
		if($q_ndz=mysqli_query($pol_baza,$niedziela_update))$erro_ndz=1;
		else $erro_ndz=0;
		
		
		mysqli_close($pol_baza);
		header('Location: user_formularz.php?feedback='.$erro_mgn.$erro_gnd.$erro_ndz);
	
	?>
