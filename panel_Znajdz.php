<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	/*if (!isset($_POST['poczatek']) OR !isset($_POST['poczatek']))
	{
		$_SESSION['brakPrzedzialu']="Nie wybrano przedziału czasu !";
		header('Location: panel_HomePage.php');
		exit();
	}
	else  $_SESSION['brakPrzedzialu']="1";*/
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel administratora</title>
	
	<link href="CSS/panel_styles_BETA.css" rel="stylesheet" type="text/css">
	
	<script src="panel_scripts.js"></script>
	
	
</head>

<body>

	<div id="contener">
	
			<?php require("szkielet/topbar.php");?>
			<?php require("szkielet/topmenu.php");?>
			
			<?php require("szkielet/options.php");?>
			
			
			<?php
					/*	$_SESSION['poczatekTygodnia']=$_POST['poczatek'];
						$_SESSION['koniecTygodnia']=$_POST['koniec'];
			
			*/
			?>
	
		
			<div id="main" class="none_main">
			
					<br>
					<div style="padding: 10px; text-align:center;" >
					<form action="wyszukaj.php" method="post" >
					
						Nazwa dekanatu: <select name="dekanat">
									<option></option>
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
						<br><br>
					
						Wpisz nazwę parafi: <input type="text"  name="parafia" >
					<br><br>
					<input type="submit" value="WYSZUKAJ"  class="option txtopt"  />
					
					</form>
					</div>
			
				<a href="panel_HomePage.php"><div class="glowna" style="margin-top:215px; ">Wróć do strony głównej </div></a>

			</div>
		
			<?php require("szkielet/footer.php");?>
		
     </div>

</body>
</html>