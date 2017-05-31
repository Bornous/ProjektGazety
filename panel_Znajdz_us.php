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
	
	<script>
		function flink() {
		window.location.href = "panel_HomePage.php";
		}
		
		function panel() {
		window.location.href = "panel_HomePage.php";
		}		
		
		
	</script>
	
	
</head>

<body>

	<div id="contener" >
	
			<?php require("szkielet/topbar.php");?>

			
			<?php require("szkielet/options.php");?>
			
			
			<?php
						if(isset($_POST['poczatek']))$_SESSION['poczatekTygodnia']=$_POST['poczatek'];
						if(isset($_POST['koniec']))$_SESSION['koniecTygodnia']=$_POST['koniec'];
			
			
			?>
	
		
			<div id="main" class="none_main">
						
					<?php
					$daty = @new mysqli("localhost","root","","gazety");
					mysqli_query($daty,"SET NAMES utf8");;
					
				
							if ($daty->connect_errno!=0)
							{
								echo "Error: ".$daty->connect_errno;
							}
							else
							{
							
							
								if ($spis = $daty->query(sprintf("SELECT * FROM tygodnie")))
								{
													
						
	
			?>

		
		

					<div style="padding: 10px; text-align:center;" >
					<form action="wyszukaj.php" method="post" >
					<div class="przedzial dottedline_up">		Przedział czasu		</div>
					
		<div class="czasos"> 
					
						Od <select name="poczatek" style="text-align:center;font-size:23px;">
									<option id="begining"></option>
									<?php
														
														
									
												foreach ($spis as $tydz){
													
													
									?>
									<option>
										<?php			
													echo $tydz['data_pocz'];
										?>
									</option>				
								
												
								<?php
												}
								?>
														
							
							
			
						</select>
				
						Do <select name="koniec" style="text-align:center;font-size:23px;">
									<option id="ending"></option>
									<?php
														
														
									
												foreach ($spis as $tydz){
													
													
									?>
									<option>
										<?php			
													echo $tydz['data_konc'];
										?>
									</option>		
									
										<?php
							}}}
									
										?>
			
						</select>
					<tab style="margin-left:80px;"></tab>
			
					<br>
					
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