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
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel administratora</title>
	
	<link href="CSS/panel_styles_BETA.css" rel="stylesheet" type="text/css">
	
	<script src="panel_scripts.js" charset="UTF-8"></script>
	
	
</head>

<body>

	<div id="contener">
	
			<?php require("szkielet/topbar.php");?>
			<?php require("szkielet/topmenu.php");?>
			
			<?php require("szkielet/options.php");?>
			
			
	
		
			<div id="main" class="none_main">
			
					<div style="min-height:10px; color:red; font-size:19px;text-align:center;"></div>
					<div style="padding: 3px; text-align:center;" >
					<form action="panel_ZmienNAZ_send.php" method="get">
						Dekanat: <select name="dekanat" onchange="znajdzParafieNAZ(this.value)" style="min-width:200px;">
									<option value="">				Wybierz dekanat:</option>
									<option value="BEŁŻYCE">					BEŁŻYCE</option>
									<option value="BYCHAWA">				BYCHAWA</option>
									<option value="CHEŁM WSCHÓD">		CHEŁM WSCHÓD</option>
									<option value="CHEŁM ZACHÓD">		CHEŁM ZACHÓD</option>
									<option value="CZEMIERNIKI">			CZEMIERNIKI</option>
									<option value="GARBÓW">					GARBÓW</option>
									<option value="KAZIMIERZ DOLNY">	KAZIMIERZ DOLNY</option>
									<option value="KONOPNICA">				KONOPNICA</option>
									<option value="KRASNYSTAW WSCHÓD">KRASNYSTAW WSCHÓD</option>
									<option value="KRASNYSTAW ZACHÓD">KRASNYSTAW ZACHÓD</option>
									<option value="KRAŚNIK">					KRAŚNIK</option>
									<option value="LUBARTÓW">				LUBARTÓW</option>
									<option value="LUBLIN PODMIEJSKI">	LUBLIN PODMIEJSKI</option>
									<option value="LUBLIN POŁUDNIE">	LUBLIN POŁUDNIE</option>
									<option value="LUBLIN PÓŁNOC">		LUBLIN PÓŁNOC</option>
									<option value="LUBLIN ŚRÓDMIEŚCIE">LUBLIN ŚRÓDMIEŚCIE</option>
									<option value="LUBLIN WSCHÓD">		LUBLIN WSCHÓD</option>
									<option value="LUBLIN ZACHÓD">		LUBLIN ZACHÓD</option>
									<option value="ŁĘCZNA">					ŁĘCZNA</option>
									<option value="MICHÓW">					MICHÓW</option>
									<option value="OPOLE LUBELSKIE">	OPOLE LUBELSKIE</option>
									<option value="PIASKI">						PIASKI</option>
									<option value="PUŁAWY">					PUŁAWY</option>
									<option value="SIEDLISZCZE">			SIEDLISZCZE</option>
									<option value="ŚWIDNIK">					ŚWIDNIK</option>
									<option value="TUROBIN">					TUROBIN</option>
									<option value="URZĘDÓW">				URZĘDÓW</option>
									<option value="ZAKRZÓWEK">			ZAKRZÓWEK</option>
									<option value="INNE">							INNE</option>
						
						</select>
						
					
						<div  id="spis2" >
							Parafia: Wybierz najpierw dekanat
							
						</div>
						
						<div id="DaneParafi">
						
						</div>	
					
					<input type="submit" value="ZAPISZ ZMIANY"  class="option txtopt"  />
					
					</form>
					</div>
			
				<a href="panel_HomePage.php"><div class="glowna" style="margin-top:50px; ">Wróć do strony głównej </div></a>

			</div>
		
			<?php require("szkielet/footer.php");?>
		
     </div>

</body>
</html>