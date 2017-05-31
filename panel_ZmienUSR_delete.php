
	
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
	
		if (isset($_GET['idUSR'])  )
		{
			$pol_baza = mysqli_connect($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_logowania);
			
					if(!$pol_baza) die('Problem z połączeniem się z bazą: '.mysqli_error($pol_baza));
					
					
				mysqli_query($pol_baza,"SET NAMES UTF8");
				$zapytanie="DELETE FROM log_in WHERE id='".$_GET['idUSR']."' ";
				
				if($wynik= mysqli_query($pol_baza,$zapytanie)){
					
					mysqli_close($pol_baza);
					header('Location: panel_zmienUSR.php?error=usunieto uzytkownika '.$_GET['idUSR']);
				}
				
				
				else{
					
					mysqli_close($pol_baza);
					header('Location: panel_zmienUSR.php?error=nie usunieto uzytkownika '.$_GET['idUSR']);
				
				}
		}
		
	
	?>
