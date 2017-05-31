<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
			
			
							//$_SESSION['dekanat'] = $_POST['dekanat'];
							//echo "Dodawany dekanat to: ".$_SESSION['dekanat'];
							
							require_once "daneDoPolaczenia.php";
							/*
							$host 
							$uzytkownik_bazy
							$haslo_uzytkownika
							$baza_logowania
							$baza_gazety
							*/
							if(!isset($_POST['dekanat']) OR !isset($_POST['parafia']) OR !isset($_POST['mgn']) OR !isset($_POST['gnd']) OR !isset($_POST['ndz'])
								OR !isset($_SESSION["tt"]) OR !isset($_SESSION["rr"])) header("Location: panel_Dodaj.php?error=brak_danych");
							$pol_par = new mysqli($host, $uzytkownik_bazy,$haslo_uzytkownika,$baza_gazety);
							mysqli_query($pol_par,"SET NAMES utf8");
							
							
							if ($pol_par->connect_errno!=0)
							{
								header("Location: panel_HomePage.php?error=".$pol_par->connect_errno);
								exit();
							}
							else{
								//Przyjęcie danych
								$dekanat=$_POST['dekanat'];
								$parafia=trim($_POST['parafia']);
								$parafia=mb_convert_case($parafia, MB_CASE_UPPER, "UTF-8");
								
								//requesty:
								$q_naklady="INSERT INTO `naklad` (`id_par`, `dekanat`, `parafia`, `maly`, `gosc`, `niedziela`) VALUES (NULL, '".$dekanat."', '".$parafia."', '".$_POST['mgn']."', '".$_POST['gnd']."','".$_POST['ndz']."')";
								
								//trzeba dodat session tt irr i odpowiednie kolumny!!!!!
								$q_bazamgn="INSERT INTO `bazamgn` (`id_par`, `dekanat`, `parafia`,  `nak_".$_SESSION["tt"]."_".$_SESSION["rr"]."`, `zwr_".$_SESSION["tt"]."_".$_SESSION["rr"]."`, `spr_".$_SESSION["tt"]."_".$_SESSION["rr"]."`) VALUES (NULL, '".$dekanat."', '".$parafia."', '".$_POST['mgn']."', '-1', '-1')";
								
								$q_bazagnd="INSERT INTO `bazagnd` (`id_par`, `dekanat`, `parafia`,  `nak_".$_SESSION["tt"]."_".$_SESSION["rr"]."`, `zwr_".$_SESSION["tt"]."_".$_SESSION["rr"]."`, `spr_".$_SESSION["tt"]."_".$_SESSION["rr"]."`) VALUES (NULL, '".$dekanat."', '".$parafia."', '".$_POST['gnd']."', '-1', '-1')";
								
								$q_bazandz="INSERT INTO `bazandz` (`id_par`, `dekanat`, `parafia`,  `nak_".$_SESSION["tt"]."_".$_SESSION["rr"]."`, `zwr_".$_SESSION["tt"]."_".$_SESSION["rr"]."`, `spr_".$_SESSION["tt"]."_".$_SESSION["rr"]."`) VALUES (NULL, '".$dekanat."', '".$parafia."', '".$_POST['ndz']."', '-1', '-1')";
								
								
								
								
									
								if($pol_par->query($q_naklady) and $pol_par->query($q_bazamgn) and $pol_par->query($q_bazagnd) and $pol_par->query($q_bazandz)) {	
									$pol_par->close();
									header("Location: panel_HomePage.php?error=Rekord został dodany poprawnie");
								}
								else {
									$pol_par->close();
									header("Location: panel_HomePage.php?error=Rekord NIE został dodany");
								}
							
							}
							
							
	

	
	
	
						?>