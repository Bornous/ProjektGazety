<?php
			if(!isset($_SESSION['nieuzupelnione'])){
					require_once "daneDoPolaczenia.php";
					/*
					$host 
					$uzytkownik_bazy
					$haslo_uzytkownika
					$baza_logowania
					$baza_gazety
					*/
					
					//Po��czenie z baz� danych
					$gazety= @new mysqli($host, $uzytkownik_bazy,$haslo_uzytkownika,$baza_gazety);
					mysqli_query($gazety,"SET NAMES UTF8");
					
					//$wyszukaj="SELECT * FROM `bazaglowna` WHERE `zwr"
				
			}


?>