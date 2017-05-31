<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	/*
	if(!isset($_SESSION['pol'])){
							//Połączenie z bazą danych
							$_SESSION['pol'] = @new mysqli("localhost", "root","","gazety");
							mysqli_query($_SESSION['pol'],"SET NAMES UTF8");
	}
	*/
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

<body onload="">

	<div id="contener">
	
			<?php require("szkielet/topbar.php");?>
			
			<?php require("szkielet/options.php");?>
			
			<div id="main" class="none_main">
			
					<div class="dottedline"></div>
					<div class="czasos"> 
					<form action="" method="post" >
					
						Od <select name="poczatek" style="text-align:center;font-size:23px;">
									<option id="begining"><?php
									
									
									
									
									
									?></option>
									
			
						</select>
						<tab style="margin-left:40px;"></tab>
						Do <select name="koniec" style="text-align:center;font-size:23px;">
									<option id="ending"></option>
									
			
						</select>
					<tab style="margin-left:80px;"></tab>
					<input type="submit" value="WYSZUKAJ"  />
					
					</form>
		
		
		</div>
		<div style="clear:both;"></div>
					
					<div class="dottedline"></div>
					
					<span class="dane" style="float:left;">Dany tydzień: </span> <div  id="tydz" style="margin-left:10px;float:left;"></div> <div style="clear:both;"></div>
					
					<div class="dottedline"></div>
					
					<span class="dane">Ilość uzupełnionych zwrotów: </span>
					<div class="dottedline"></div>
					
					<button class="option txtopt" onclick="flink()" style="min-width: 600px; margin-left: 70px;">Wyświetl nieuzupełnione parafie</button>

			</div>
		
			<?php require("szkielet/footer.php");?>
			
     </div>

</body>
</html>