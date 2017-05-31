<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	if (!isset($_GET['row'])  OR !isset($_SESSION['wyn_zestaw']) OR !isset($_GET['nak'] ) OR !isset($_GET['zwr'] ) OR !isset($_GET['spr']) OR !isset($_SESSION['poczatekTygodnia']) OR !isset($_SESSION["gazeta"]) )
	{
		
		header('Location: panel_HomePage.php');
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
	<script src="jquery/jquery-1.11.1.min.js"></script>

	
</head>

<body >

	<div id="contener">
	
		<?php require("szkielet/topbar.php");?>
			<?php require("szkielet/topmenu.php");?>
			<?php require("szkielet/options.php");?>
		
	
		
			<div id="main" class="none_main">
			<div><?php 
			$_SESSION["ParafiaDoZnalezienia"]=$_GET['row'];
			
			foreach($_SESSION['wyn_zestaw'] as $row){
										if($_GET['row']==$row[0]){
								?>
								
									<div id="resultt" >
										<div class="kol1">Okres: </div><div class="kol2"><?php echo " (".$_SESSION["poczatekOkresu"]." - ".$_SESSION["koniecOkresu"].")" ?></div><div class="kol3"></div>
										<div class="kol1">Dekanat: </div><div class="kol2"><?php echo $row[1] ?></div><div class="kol3"></div>
										<div class="kol1">Parafia: </div><div class="kol2"><?php echo $row[2] ; ?></div><div class="kol3"></div>
										<div class="kol1">Gazeta: </div><div class="kol2"><?php  echo $_SESSION["gazeta"];?></div><div class="kol3"></div>
										<div class="kol1">Nakład: </div><div class="kol2"><?php echo $_GET['nak'] ?></div><div class="kol3"></div>
										<div  class="kol1">Zwrot:</div><div class="kol2"><?php echo $_GET['zwr'] ?></div><div class="kol3"></div>
										<div class="kol1">Do zapłaty: </div><div class="kol2"><?php echo $_GET['spr']  ?> zł</div><div class="kol3"></div>
										
									</div>
								
								<?php
								
			}	}?>	</div>
			<?php unset($_SESSION['wyn_zestaw']);?>
		
			<div class="option drukuj" onclick="PrintPar('#resultt')" >WYDRUKUJ</div>
			<?php if($_SESSION["poczatekOkresu"]==$_SESSION["poczatekTygodnia"] AND $_SESSION["koniecOkresu"]==$_SESSION["koniecTygodnia"]){ ?>
			<div  id="doPoprawy"><option class="option drukuj" <?php echo 'value="'.$_SESSION["gazeta"].'"';?>onclick="zmianaZW(this.value)">POPRAW DANE</option></div>
			<?php  } ?>

		</div>
	
	
		<div id="footer">
	
			<a href="logout.php">[Wyloguj się]</a> 

		</div>
	
     </div>

</body>
</html>