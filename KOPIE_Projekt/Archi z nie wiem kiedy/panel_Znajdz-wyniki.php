<?php

	session_start();
	
	if ((!isset($_SESSION['zalogowany'])) &&  (!isset($_SESSION['komunikat'])))
	{
		header('Location: panel_Znajdz.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel administratora</title>
	
	<link href="panel_styles_BETA.css" rel="stylesheet" type="text/css">
	
	<script>
		function flink() {
		window.location.href = "panel_BETA.php";
		}
		
		function panel() {
		window.location.href = "panel_BETA.php";
		}		
		
		
	</script>
	
	
</head>

<body>

	<div id="contener">
	
		<div id="topbar" >
	
			<a href="panel_BETA.php"><h1 >PANEL ADMINISTRATORA</h1></a>

		</div>
	
		<div id="topmenu">
				
				<div class="option" style="margin-top:0px; margin-left:30px; float:left; min-width: 310px;">MAŁY GOŚĆ NIEDZIELNY
				</div>
				<div class="option" style="margin-top:0px; margin-left:30px; float:left; min-width: 310px;">GOŚĆ NIEDZIELNY
				</div>
				<div class="option" style="margin-top:0px; margin-left:30px; float:left; min-width: 310px;">NIEDZIELA
				</div>
				<div  style="margin-top:0px; clear:both;">
				</div>
				
		</div>
	
		
	
	
		<div id="options">
			
			<a href="panel_Znajdz.php"><div class="option">ZNAJDŹ PARAFIĘ</div></a>
			<a href="panel_Dodaj.php"><div class="option">DODAJ PARAFIĘ</div></a>
			<a href="panel_Zmien.php"><div class="option">ZMIEŃ DANE</div></a>
			<a href="panel_Inna.php"><div class="option">INNA TABELA</div></a>
			
		

		</div>
	
	
		<div id="main" >
		
				<br>
				<div style="padding: 10px; text-align:center;max-width: 750px;" >
				
					<?php
						//Wyświetlenie liczby wyników
						if(isset($_SESSION['komunikat'])) echo $_SESSION['komunikat'];
						
						unset($_SESSION['komunikat']);
											
							if(isset($_SESSION['wyn_n'])){
											
								//Wyswietlanie wynikow
								
								$row = $_SESSION['wyn_zestaw'];
																		
									printf('<div class="tab">
													<div class="mtab">%s</div>
													<div class="mtab">%s</div>
													<div class="mtab" style="max-width: 40px;min-width:40px;">%s</div>
													<div class="mtab" style="max-width: 40px;min-width:40px;">%s</div>
													<div class="mtab" style=" max-width: 40px;min-width:40px;border-right:0px solid black;">%s</div>
													<div style="clear:both;"></div>
												</div> ',
												 $row['dekanat'], $row['parafia'], $row['nadzial'], $row['zwrot'], $row['sprzedaz']);
									
									
									
								unset($_SESSION['wyn_zestaw']);
								unset($_SESSION['wyn_n']);
							}
							printf("\n-----------------------------------------------------------------------------------");
							
						
						
						
					?>
					
				</div>
		
		
			<a href="panel_BETA.php"><div class="glowna" style="margin-top:270px;">Wróć do strony głównej </div></a>

		</div>
	
	
		<div id="footer">
	
			<a href="logout.php">[Wyloguj się]</a> 

		</div>
	
     </div>

</body>
</html>