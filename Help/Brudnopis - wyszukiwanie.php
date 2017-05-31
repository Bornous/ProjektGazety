<?php
//Brudnopis:
					
					//version 3.0
					
					$parafia="BORZECHÓÓÓW";
					$nowa_parafia=strtr($parafia,"Ó",".+");
					echo $parafia." => ".$nowa_parafia;
					
					
					/*
					sprintf("SELECT * FROM zwroty WHERE  
															dekanat='%s' 
															OR parafia regexp '[a-zA-Z].*%s'  
															OR parafia like '%%s%' 
															OR  dekanat regexp '[a-zA-Z].*%s'
															OR  dekanat regexp '^%s'																
															",
					
					
										
					
					//Wykonanie zapytania do bazy '(wyswietlanie calego dekanatu)'
						if ($wynik = @$pol->query(
															sprintf("SELECT * FROM zwroty WHERE  
															dekanat='%s' 
															OR parafia regexp '[a-zA-Z]*.%s[[a-zA-Z]*]'  
															OR  dekanat regexp '[a-zA-Z]*.%s[a-zA-Z]'													
															",
																	mysqli_real_escape_string($pol,$dekanat),
																	mysqli_real_escape_string($pol,$parafia),
																	mysqli_real_escape_string($pol,$parafia)
																	)
																)
							)
							
				//version 2.0
				
				
				
				//Wykonanie zapytania do bazy '(wyswietlanie calego dekanatu)'
						if ($wynik = @$pol->query(
															sprintf("SELECT * FROM zwroty WHERE  dekanat='%s' OR parafia regexp '[a-zA-Z].*%s'  OR  dekanat regexp '[a-zA-Z].*%s' ",
																	mysqli_real_escape_string($pol,$dekanat),
																	mysqli_real_escape_string($pol,$parafia),
																	mysqli_real_escape_string($pol,$parafia)
																	)
																)
							)
							
							
	*/						
?>