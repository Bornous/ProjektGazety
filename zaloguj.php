<?php
	
	session_start();
	
	if ( (!isset($_POST['login'])) || (!isset($_POST['haslo']))  )
	{
		header('Location: index.php');
		exit();
	}
	
	require_once "daneDoPolaczenia.php";
							/*
							$host 
							$uzytkownik_bazy
							$haslo_uzytkownika
							$baza_logowania
							$baza_gazety
							*/

	$polaczenie = @new mysqli($host , $uzytkownik_bazy,$haslo_uzytkownika,$baza_logowania);
	mysqli_query($polaczenie,"SET NAMES utf8");
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = $polaczenie->query(
											sprintf("SELECT * FROM log_in WHERE login='%s' AND haslo='%s'",
													mysqli_real_escape_string($polaczenie,$login),
													mysqli_real_escape_string($polaczenie,$haslo)
													)
											)
			)
		{
			$ilu_userow = $rezultat->num_rows;
			
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				
				$_SESSION['admin'] = $wiersz['admin'];
				$_SESSION['idUsera']=$wiersz['id'];
				
				
				unset($_SESSION['blad']);
				
				if($_SESSION['admin']!=1){
				$_SESSION['imie']=$wiersz['imie'];
				$_SESSION['nazwisko']=$wiersz['nazwisko'];
				header('Location: user_formularz.php');}
				
				else{
					header('Location: panel_HomePage.php');
					
					}
				
			} 
			else{
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
				}
			
		}
		
		$polaczenie->close();
	}
	
?>