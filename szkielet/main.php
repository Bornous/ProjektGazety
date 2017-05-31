<div id="main" class="none_main">
			<?php
			if(isset($_SESSION["brakPrzedzialu"])){
				if($_SESSION["brakPrzedzialu"]!="1")
				{
					echo "<div class='error' >".$_SESSION["brakPrzedzialu"]." </div>";
					$_SESSION["brakPrzedzialu"]="1";
					
				}
				
				
			}

				?>
				
				
				<div class="dottedline"></div>
			<div class="wybor">Wybierz datę: </div><div class="endfloat"></div>	
			<?php
					
					
							require_once "daneDoPolaczenia.php";
							/*
							$host 
							$uzytkownik_bazy
							$haslo_uzytkownika
							$baza_logowania
							$baza_gazety
							*/
							
							$daty = @new mysqli($host ,$uzytkownik_bazy,$haslo_uzytkownika,$baza_gazety);
							mysqli_query($daty,"SET NAMES utf8");;
							
						
									if ($daty->connect_errno!=0)
									{
										echo "Error: ".$daty->connect_errno;
										$_SESSION["TESTdlaSPISU"]=false;
									}
									else
									{
										
						
							
								if ($spis= $daty->query(sprintf("SELECT * FROM tygodnie")))
								{
													
						
	
										?>

									<div class="przedzial dottedline_up">		Przedział czasu		</div>
									
									<div class="czasos"> 
												<form class="form" action="wyszukaj.php" method="post" >
												
													Od <select name="poczatekOkresu" style="text-align:center;font-size:23px;">
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
													<tab style="margin-left:40px;"></tab>
													Do <select name="koniecOkresu" style="text-align:center;font-size:23px;">
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
																			}
									}}
									
										?>
			
						</select>
			
					
					
		
		
						</div>
		<div class="endfloat"></div>	
		
			<div class="dottedline"></div>
			
					<div class="form znajdz">
						NAZWA DEKANATU: <select name="dekanat">
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
					
						NAZWA PARAFI: <input type="text"  name="parafia" >
					
					
					</div>
					<div class="endfloat"></div>	
					
			<div class="dottedline"></div>
			
			<div class="wybor">Wybierz gazetę: </div><div class="endfloat"></div>	
				<div class="form" style="margin-left:50px;">
				
				<div >
					<input  type="radio"     name="name_gaz" value="MAŁY GOŚĆ NIEDZIELNY">MAŁY GOŚĆ NIEDZIELNY</input>
				</div>
				<div>
				<input  type="radio"   class="dottedline_up"  name="name_gaz" value="GOŚĆ NIEDZIELNY">GOŚĆ NIEDZIELNY
				</div>
				<div >
				<input  type="radio"    class="dottedline_up" name="name_gaz" value="NIEDZIELA">NIEDZIELA
				</div>
					
				
				</div>
	<div class="endfloat"></div>
				<button type="submit" class="option opt_1 txtopt submit" >
					WYSZUKAJ
				</button>
				
				</form>
			<div class="endfloat"></div>
		
			
			<div class="dottedline"></div>
			<?php if(isset($_GET['news']))				if($_GET['news']="zakonczono") echo "<t style='color:red;margin-left:200px;'>Udało się otworzyć nowy tydzień</t>";
				if(isset($_GET['error']))echo "<t style='color:red;margin-left:200px;'>".$_GET['error']."</t>";
				
				
			?>
			<br>
			<button class="option txtopt" onclick="zakoncz()" style="min-width: 600px; margin-left: 70px;">Rozpocznij nowy tydzien</button>
		
		</div>