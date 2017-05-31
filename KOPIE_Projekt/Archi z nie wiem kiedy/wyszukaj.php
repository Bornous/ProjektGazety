<?php

	session_start();
	
	if ( !isset($_POST['parafia'])  )
	{
		header('Location: panel_Znajdz.php');
		exit();
	}

	//Połączenie z bazą danych
	$pol = @new mysqli("localhost", "root","","gazety");
	mysqli_query($pol,"SET NAMES UTF8");
	
	if ($pol->connect_errno!=0)
		{
				echo "Error: ".$pol->connect_errno;
		}
	else
		{
		
				//konwersja danych przychodzących
				$parafia=trim($_POST['parafia']);
				$dekanat=trim($_POST['dekanat']);
				$parafia=mb_convert_case($parafia, MB_CASE_UPPER, "UTF-8");
				$dekanat=mb_convert_case($dekanat, MB_CASE_UPPER, "UTF-8");
				$parafia = htmlentities($parafia, ENT_QUOTES, "UTF-8");
				$dekanat= htmlentities($dekanat, ENT_QUOTES, "UTF-8");
				
				//Wykonanie zapytania do bazy '(wyszukiwanie tylko jednej parafii)'
				//Z tym zapytaniem wszystko działa, jeśli jest znalezionych 0 lub 1 parafii
				/*if ($wynik = @$pol->query(
													sprintf("SELECT * FROM zwroty WHERE   parafia='%s'",
															mysqli_real_escape_string($pol,$parafia)
															)
														)
					)
			*/
			
				//Wykonanie zapytania do bazy '(wyswietlanie calego dekanatu)'
				if ($wynik = @$pol->query(
													sprintf("SELECT * FROM zwroty WHERE  dekanat='%s' OR parafia='%s'",
															mysqli_real_escape_string($pol,$dekanat),
															mysqli_real_escape_string($pol,$parafia)
															)
														)
					)
				{
					$ile_wyn = $wynik->num_rows;
					
					if($ile_wyn>0)
					{
						//Przekazanie wynikow wyszukiwania do zmiennej $_SESSION['wyn_zestaw']
						$_SESSION['wyn_zestaw']=$wynik->fetch_assoc();
						
						$_SESSION['wyn_n']=$ile_wyn;
						mysql_free_result($wynik);
						
						
						$_SESSION['komunikat'] = '<span style="color:red">Znaleziono '.$ile_wyn.' wynikow</span>';
						
						//Przekierowanie do strony wyświetlającej wyniki
						header('Location: panel_Znajdz-wyniki.php');
																	
					} 
					else{
						
						$_SESSION['komunikat'] = '<span style="color:red">Brak wynikow dla: '.$parafia.'</span>';
						header('Location: panel_Znajdz-wyniki.php');
						
						}
					
				}
				
				$pol->close();
	}
	
?>