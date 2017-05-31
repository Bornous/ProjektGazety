<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']) )
	{
		
		header('Location: panel_HomePage.php');
		exit();
	}
	
	require_once "daneDoPolaczenia.php";
	/*
	$host 
	$uzytkownik_bazy
	$haslo_uzytkownika
	$baza_logowania
	$baza_gazety
	*/
	
		
	$wyszukiwanie= @new mysqli($host,$uzytkownik_bazy,$haslo_uzytkownika,$baza_gazety);
	mysqli_query($wyszukiwanie,"SET NAMES UTF8");

	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel administratora</title>
	
	<link href="CSS/panel_styles_BETA.css" rel="stylesheet" type="text/css">
		<script src="jquery/jquery-1.11.1.min.js"></script>
		<script src="panel_scripts.js"></script>
		
	
</head>

<body>

	<div id="contener">
	
						<?php require("szkielet/topbar.php");?>
						<?php require("szkielet/topmenu_wyniki.php");?>
						<?php require("szkielet/options.php");?>
					
				
					
						<div id="main" class="none_main">
		
				<div id="Wwyniki" class="aabb">
					<div class="nonePrint">
					<?php
						//Wyświetlenie
						if(isset($_SESSION['komunikat'])) echo $_SESSION['komunikat'];
						
						unset($_SESSION['komunikat']);
					?>
						
					</div>
					
					<?php
						if(isset($_SESSION['wyn_n'])){	
					?>
					<div class="option glowna" onclick="PrintAllPar('#Wwyniki')" >WYDRUKUJ DLA WSZYSTKICH WYNIKÓW</div>
					<div class="nonePrint" style="margin-top:20px;"></div>
								<div class="tab t0 nonePrint" >
										<div class="mtab t0 nonePrint">DEKANAT</div>
										<div class="mtab t0 nonePrint" >PARAFIA</div>
										<div class="mtab2 t0 nonePrint" >N</div>
										<div class="mtab2 t0 nonePrint" >Z</div>
										<div class="mtab3 t0 nonePrint" >S</div>
										<div class="endfloat nonePrint"></div>
									</div>
								<?php
								//Znalezienie odpowiednich danych na podstawie wyznaczonego okresu czasu
								if ($pierwszyTydzien = $wyszukiwanie->query(
																																sprintf("SELECT * FROM tygodnie WHERE  data_pocz='%s' ",$_SESSION['poczatekOkresu'])
																															)
								)
								{
										$pT=$pierwszyTydzien ->fetch_assoc();
										
										//$_SESSION['pierwszyTydzien']=$pierwszyTydzinen->fetch_all();
										
										if ($ostatniTydzien = $wyszukiwanie->query(
																																sprintf("SELECT * FROM tygodnie WHERE  data_konc='%s' ",$_SESSION['koniecOkresu'])
																															)
										)
										{
											$oT=$ostatniTydzien->fetch_assoc();
											//$_SESSION['ostatniTydzien']=$ostatniTydzinen->fetch_all();
										}
										$wyszukiwanie->close();				
								}
								
								
								//Wyswietlanie wynikow
								$licznikDoSzesciu=0;
								foreach ($_SESSION['wyn_zestaw'] as $row) {	
										$licznikDoSzesciu++;
										$numer_pocz=5+(3*$pT["id_tyg"])-2;
														$numer_konc=5+(3*$oT["id_tyg"])-2;
														$naklad=0;
														while($numer_pocz<=$numer_konc){
															$naklad=$row[$numer_pocz]+$naklad;
															$numer_pocz=$numer_pocz+3;							
														}
										$numer_pocz=5+(3*$pT["id_tyg"])-1;
														$numer_konc=5+(3*$oT["id_tyg"])-1;
														$zwroty=0;
														while($numer_pocz<=$numer_konc){
															$zwroty=$row[$numer_pocz]+$zwroty;
															$numer_pocz=$numer_pocz+3;							
														}
										$numer_pocz=5+(3*$pT["id_tyg"]);
														$numer_konc=5+(3*$oT["id_tyg"]);
														$sprzedarz=0;
														while($numer_pocz<=$numer_konc){
															$sprzedarz=$row[$numer_pocz]+$sprzedarz;
															$numer_pocz=$numer_pocz+3;							
														}
										?>
										
										<div  onclick="doDruczek('<?php echo 'panel_druczek.php?row='.$row[0]."&nak=".$naklad."&zwr=".$zwroty."&spr=".$sprzedarz;?>')">
											<div class="tab" >
											<div class="mtab noneNet">Okres: <?php echo $_SESSION["poczatekOkresu"]." - ".$_SESSION["koniecOkresu"]; ?></div>
												<div class="mtab"><t class="noneNet">Dekanat: </t><?php echo $row[1] ?></div>
												<div class="mtab" ><t class="noneNet">Parafia: </t>
												<?php
													if(strlen($row[2])<=24)
													echo $row[2] ;
													else {
												?>
														<t style="font-size:17px;"><?php echo $row[2] ;?></t>
												<?php	
													}
												?>
												</div>
												<div class="noneNet"><?php   echo $_SESSION["gazeta"]; ?> </div>
												<div class="mtab2 noneNet">Nakład</div><div class="mtab2 noneNet">Zwrócono:</div><div class="mtab3 noneNet">Do zapłaty:</div><div class ="noneNet" style="clear:both;"></div>
												<div class="mtab2" ><?php 
														
														echo $naklad;
												
												?></div>
												
												<div class="mtab2" ><?php 
														
														echo $zwroty;
												
														
												?></div>
												<div class="mtab3" ><?php 
														
														echo $sprzedarz;

												
												?><t class="noneNet" ><?php echo " zł";?></t></div>
												<div style="clear:both;"></div>
											</div>
											</div>
										
										
										<?php
											if($licznikDoSzesciu==6){
												$licznikDoSzesciu=0;
												echo '<p class="noneNet" style="page-break-after:always;"></p>  ';
											}
								
								}		
								
								//unset($_SESSION['wyn_zestaw']);
								unset($_SESSION['wyn_n']);
								//unset($_SESSION['poczatekTygodnia']);
								//unset($_SESSION['koniecTygodnia']);
							}
							?>
					
				</div>
			
			
			
			<a href="panel_HomePage.php"><div class="glowna" >Wróć do strony głównej </div></a>
			

		</div>
	
	
		<?php require("szkielet/footer.php");?>
	
     </div>

</body>
</html>