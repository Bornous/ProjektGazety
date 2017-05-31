
	
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
	
	
	
		if (!isset($_GET['newlogin']) OR !isset($_GET['newpass']) OR !isset($_GET['newemail']) OR !isset($_GET['newtel']) OR !isset($_GET['newname']) OR !isset($_GET['newnazw']) OR !isset($_GET['newadmin']) OR !isset($_GET['idUSR']) )
		{
			$log="";
			if (!isset($_GET['newlogin']) )$log=$log."0";
			if (!isset($_GET['newpass']) )$log=$log."0";
			if (!isset($_GET['newemail']) )$log=$log."0";
			if (!isset($_GET['newtel']) )$log=$log."0";
			if (!isset($_GET['newname']) )$log=$log."0";
			if (!isset($_GET['newnazw']) )$log=$log."0";
			if (!isset($_GET['newadmin']) )$log=$log."0";
			if (!isset($_GET['idUSR']) )$log=$log."0";
	
	
	
			header('Location: panel_zmienUSR.php?error=Brak_danych&log='.$log);
			exit();
		}
		
		$pol_baza = mysqli_connect($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_logowania);
		if(!$pol_baza){
			die('Problem z połączeniem się z bazą: '.mysqli_error($pol_baza));
		}
		
		
		mysqli_query($pol_baza,"SET NAMES UTF8");
		$zapytanie="UPDATE log_in SET login='".$_GET["newlogin"]."',haslo='".$_GET["newpass"]."',email='".$_GET["newemail"]."',telefon='".$_GET["newtel"]."',imie='".$_GET["newname"]."',nazwisko='".$_GET["newnazw"]."',admin='".$_GET["newadmin"]."' WHERE id='".$_GET["idUSR"]."' ";
		if($wynik= mysqli_query($pol_baza,$zapytanie)){
			mysqli_close($pol_baza);
			header('Location: panel_zmienUSR.php?error=Zmieniono dane poprawnie');
		}
		else{
			header('Location: panel_zmienUSR.php?error=Cos jest nie tak');
			mysqli_close($pol_baza);
		}
			
		
		
	
	?>
