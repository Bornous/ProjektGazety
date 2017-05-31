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
	
	if ( !isset($_POST['dekanat'])  )
	{
		header('Location: panel_HomePage.php');
		exit();
	
	}
	
	if ( !isset($_POST['poczatekOkresu']) OR !isset($_POST['koniecOkresu'])  OR  $_POST['poczatekOkresu']=="" OR $_POST['koniecOkresu']=="")
	{
		header('Location: panel_HomePage.php');
		exit();
	}
	else{
		$_SESSION['poczatekOkresu']=$_POST['poczatekOkresu'];
		$_SESSION['koniecOkresu']=$_POST['koniecOkresu'];
	}
	
	
	$baza="brak wyboru";
	
	
    if($_POST["name_gaz"]=="MAŁY GOŚĆ NIEDZIELNY"){
        $baza="bazamgn";
		$_SESSION["gazeta"]="MAŁY GOŚĆ NIEDZIELNY";
	
	}
   if($_POST["name_gaz"]=="GOŚĆ NIEDZIELNY"){
        $baza="bazagnd";
		$_SESSION["gazeta"]="GOŚĆ NIEDZIELNY";
	
   }
    if($_POST["name_gaz"]=="NIEDZIELA"){
        $baza="bazandz";
		$_SESSION["gazeta"]="NIEDZIELA";
	
	}
	
	if($baza=="brak wyboru"){
		header('Location: panel_HomePage.php?error=brak_wyboru_gazety');
		exit();		
	}
	
	//Połączenie z bazą danych
	$pol= @new mysqli($host, $uzytkownik_bazy,$haslo_uzytkownika,$baza_gazety);
	mysqli_query($pol,"SET NAMES UTF8");
	
	//$pol=$_SESSION['baseConnnect'];
	if ($pol->connect_errno!=0)
		{
				echo "Error: ".$pol->connect_errno;
		}
	else{ 
				
				
		
		
				//konwersja danych przychodzących
				
				
				$parafia=trim($_POST['parafia']);
				$dekanat=$_POST['dekanat'];
				
				if (empty($parafia) and empty($dekanat)){
					
					$parafia='Nie została wpisana ani parafia ani dekanat';
					$_SESSION['komunikat'] = '<span style="color:red">'.$parafia.'</span>';
					header('Location: panel_Znajdz-wyniki.php');
				
				} 
				else{
					
						if (empty($parafia))$parafia='PUSTY';
						if (empty($dekanat))$dekanat='PUSTY';
						
						$parafia=mb_convert_case($parafia, MB_CASE_UPPER, "UTF-8");
				
					
						//Wykonanie zapytania do bazy '(wyswietlanie calego dekanatu)'
						if ($wynik = $pol->query("SELECT * FROM ".$baza." WHERE  dekanat='".$dekanat."' OR parafia regexp '[a-zA-Z]*".$parafia."'  OR  dekanat regexp '[a-zA-Z]*".$parafia."' "))
						{
							$ile_wyn = $wynik->num_rows;
						
							if($ile_wyn>0)
							{
								//Przekazanie wynikow wyszukiwania do zmiennej $_SESSION['wyn_zestaw']
								$_SESSION['wyn_zestaw']=$wynik->fetch_all();
								
								$_SESSION['wyn_n']=$ile_wyn;
								mysql_free_result($wynik);
								
								
								$_SESSION['komunikat'] = '<span style="color:red">Znaleziono '.$ile_wyn.' wynikow w okresie od '.$_SESSION['poczatekOkresu'].' do '.$_SESSION['koniecOkresu'].' </span>';
								$pol->close();
								//Przekierowanie do strony wyświetlającej wyniki
								header('Location: panel_Znajdz-wyniki.php');
																			
							} 
							else{
								$pol->close();
								$_SESSION['komunikat'] = '<span style="color:red">Brak wynikow dla: '.$parafia.'</span>';
								header('Location: panel_Znajdz-wyniki.php');
								
								}
							
						}
						 
				}
				
	}

?>