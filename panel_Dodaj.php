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
	
	<link href="CSS/panel_styles_BETA.css" rel="stylesheet" type="text/css">
	<script src="panel_scripts.js"></script>		
	
		
		

	
	
</head>

<body>

	<div id="contener">
					<?php require("szkielet/topbar.php");?>
						<?php require("szkielet/topmenu.php");?>
						<?php require("szkielet/options.php");?>

		<div id="main" class="none_main">
			<div style="min-height:400px;">
			
			<div id="formularz">
	
					<form action="panel_Dodaj-dodawanie.php" method="post" >
							
								<div class="gazetyZW small fl">Nazwa dekanatu: </div><div class="small fl"><select  name="dekanat">
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
		
					</select></div><div class="endfloat"></div>
		
					<br><div class="gazetyZW small fl">Nazwa parafii: </div><div class="small fl"><input  type="text" name="parafia" /></div><div class="endfloat"></div>
					</br>
					<div  class="naglowekZW small">Nakłady gazet:</div>
					
						<div class="gazetyZW small fl">Mały gość niedzielny: </div >
							<div  class="zawartoscZW small fl"><input type="number_format" name="mgn" value="0" /></div >
							<div class="endfloat"></div>
							
						<div  class="gazetyZW small fl">Gość niedzielny: </div >
							<div  class="zawartoscZW small fl"><input type="number_format" name="gnd" value="0" /> </div >
							<div class="endfloat"></div>

						<div  class="gazetyZW small fl">Niedziela</div >
						<div  class="zawartoscZW  small fl"><input type="number_format" name="ndz" value="0"/></div >
						<div class="endfloat"></div>
						
					<input type="submit" value="Zapisz nowy wiersz" class="glowna" style="font-size: 20px;" />
	
				</form>
			</div>
			
			</div>
			
			
		
		
			<div class="glowna"  onclick="flink()">Wróć do strony głównej </div>

		</div>
			
	<?php require("szkielet/footer.php");?>
			
	
     </div>

</body>
</html>