<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
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
	</script>
	
	
</head>

<body>

	<div id="contener">
	
		<div id="topbar">
	
			<a href="panel_BETA.php"><h1>PANEL ADMINISTRATORA</h1></a>

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
	
	
		<div id="main">
			<div class="dottedline"></div>
			<span class="dane">Dany miesiąc: </span>
			<div class="dottedline"></div>
			<span class="dane">Dany tydzień: </span>
			<div class="dottedline"></div>
			<span class="dane">Ilość uzupełnionych zwrotów: </span>
			<div class="dottedline"></div>
			
			<button class="option" onclick="flink()" style="min-width: 600px; margin-left: 70px;">Wyświetl nieuzupełnione parafie</button>

		</div>
	
	
		<div id="footer">
	
			<a href="logout.php">[Wyloguj się]</a> 

		</div>
	
     </div>

</body>
</html>