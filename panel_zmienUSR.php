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
			
			<?php

				require_once "daneDoPolaczenia.php";
					/*
					$host 
					$uzytkownik_bazy
					$haslo_uzytkownika
					$baza_logowania
					$baza_gazety
					*/
				
				$pol_baza = mysqli_connect($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_logowania);
				if(!$pol_baza){
					die('Problem z połączeniem się z bazą: '.mysqli_error($pol_baza));
				}
				
				mysqli_query($pol_baza,"SET NAMES UTF8");
				$zapytanie='SELECT * FROM `log_in` WHERE 1=1';
				$wynik= mysqli_query($pol_baza,$zapytanie);
				$ile_wyn = $wynik->num_rows;
				//$_SESSION["wyniki_USR"]=mysqli_fetch_array($wynik);
				?>
							
					
						
				<div id="main" class="none_main">
					
					<div id="AllUsers" style="margin-left:40px; margin-top:20px;">
						<div class="tab Fwers ">
							<div class="resize fl " >Login</div>
							<div class="resize fl " >Imię</div>
							<div class="resize fl " >Nazwisko</div>
							<div class="resize fl " >Status</div>
							<div style="clear:both;"></div></div>
					
						
				<?php
				while($row = mysqli_fetch_array($wynik))
				{
						
							?>
															<option class="tab wers" onclick="zmienDaneUSR(this.value)" value=<?php echo '"'.$row["id"].'"'?>>
															<div class=" resize fl" ><?php echo $row['login'] ;?></div>
															<div class=" resize fl" ><?php echo $row['imie'];?></div>
															<div class=" resize fl" ><?php echo $row['nazwisko'];?></div>
															<div class=" resize fl" >
																		<?php 
																			if($row['admin'])echo 'administrator';
																			else echo 'uzytkownik';
																		?>
															</div>
															<div style="clear:both;"></div></option>
								<?php 
				} ?>
				
				
				<button class="option txtopt" onclick="dodajUSR()" style="min-width: 600px; margin-left: 70px;">Dodaj użytkownika</button>
				</div>
				<a href="panel_zmienUSR.php"><div class="glowna" style="margin-top:20px; ">Wróć do listy użytkowników </div></a>
			
			
				<a href="panel_HomePage.php"><div class="glowna" style="margin-top:10px; ">Wróć do strony głównej </div></a>

			</div>
		
			<?php require("szkielet/footer.php");?>
		
     </div>

</body>
</html>