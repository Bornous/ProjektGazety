	<div id="topmenu" class="topmeni">
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
												<form action="panel_Znajdz.php" method="post" >
												
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
													<tab style="margin-left:40px;"></tab>
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
																			}
									}}
									
										?>
			
						</select>
					<tab style="margin-left:80px;"></tab>
					<input type="submit" value="WYSZUKAJ"  />
					
					</form>
		
		
		</div>
		<div style="clear:both;"></div>
				
	</div>
	