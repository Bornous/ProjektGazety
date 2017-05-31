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
	
	<style>
			body
			{
				background-color: #FFCC99;
				font-size: 24px;
				color: black;
			}
			
			#formularz
			{
				margin-left: auto;
				margin-right: auto;
			}
			
			#wylog
			{
				margin-left: auto;
				margin-right: auto;
				padding: 10px
			
			}
			
		</style>
	
	
</head>

<body>


	<div id="formularz">
	
	<form action="dodanie_wiersza.php" method="post" style='margin:1% 30% 20% 30%;' >
	
		Nazwa dekanatu: <select name="dekanat">
		<option>BEŁŻYCE</option>
		<option>BYCHAWA</option>
		<option>CHEŁM WSCHÓD</option>
		<option>CHEŁM ZACHÓD</option>
		<option>CZEMIERNIKI</option>
		<option>GARBÓW</option>
		<option>KAZIMIERZ DOLNY</option>
		<option>KONOPNICA</option>
		<option>KRASNYSTAW WSCHÓD</option>
		<option>KRASNYSTAW ZACHÓD</option>
		<option>KRAŚNIK</option>
		<option>LUBARTÓW</option>
		<option>LUBLIN PODMIEJSKI</option>
		<option>LUBLIN POŁUDNIE</option>
		<option>LUBLIN PÓŁNOC</option>
		<option>LUBLIN ŚRÓDMIEŚCIE</option>
		<option>LUBLIN WSCHÓD</option>
		<option>LUBLIN ZACHÓD</option>
		<option>ŁĘCZNA</option>
		<option>MICHÓW</option>
		<option>OPOLE LUBELSKIE</option>
		<option>PIASKI</option>
		<option>PUŁAWY</option>
		<option>SIEDLISZCZE</option>
		<option>ŚWIDNIK</option>
		<option>TUROBIN</option>
		<option>URZĘDÓW</option>
		<option>ZAKRZÓWEK</option>
		<option>INNE</option>
		
	</select>
		
		<br></br>Nazwa parafii: <input type="text" name="parafia" />
		<br></br>
		<input type="submit" value="Zapisz nowy wiersz" />
	
	</form>
	</div>
	
	
	
	
	
	
	<div id="wylog">
	<a href="logout.php">[Wyloguj się!]</a> 
	</div>


</body>
</html>