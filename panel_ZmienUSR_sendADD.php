
	
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
	
	
	
		if (!isset($_GET['login']) OR !isset($_GET['pass']) OR !isset($_GET['email']) OR !isset($_GET['tel']) OR !isset($_GET['name']) OR !isset($_GET['nazw']) OR !isset($_GET['admin'])  )
		{
			$log="";
			if (!isset($_GET['login']) )$log=$log."0";
			if (!isset($_GET['pass']) )$log=$log."0";
			if (!isset($_GET['email']) )$log=$log."0";
			if (!isset($_GET['tel']) )$log=$log."0";
			if (!isset($_GET['name']) )$log=$log."0";
			if (!isset($_GET['nazw']) )$log=$log."0";
			if (!isset($_GET['admin']) )$log=$log."0";
	
	
	
			header('Location: panel_zmienUSR.php?error=Brak_danych&log='.$log);
			exit();
		}
		
		$pol_baza = mysqli_connect($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_logowania);
		if(!$pol_baza){
			die('Problem z połączeniem się z bazą: '.mysqli_error($pol_baza));
		}
		
		$login=trim($_GET['login']);
		$pass=trim($_GET['pass']);
		mysqli_query($pol_baza,"SET NAMES UTF8");
		$zapytanie="INSERT INTO log_in (login, haslo, email, telefon, imie, nazwisko, admin) VALUES ('".$login."','".$pass."','".$_GET["email"]."','".$_GET["tel"]."','".$_GET["name"]."','".$_GET["nazw"]."','".$_GET["admin"]."')";
		if($wynik= mysqli_query($pol_baza,$zapytanie)){
			mysqli_close($pol_baza);
			header('Location: panel_zmienUSR.php?error=dodano uzytkownika');
		}
		else{
			mysqli_close($pol_baza);
			header('Location: panel_zmienUSR.php?error=nie dodano uzytkownika');
		
		}
			

		
	
	?>
