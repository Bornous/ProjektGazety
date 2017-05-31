<?php

	require_once "daneDoPolaczenia.php";
	/*
	$host 
	$uzytkownik_bazy
	$haslo_uzytkownika
	$baza_logowania
	$baza_gazety
	*/

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	if (!isset($_GET['baza']) AND !isset($_SESSION["poczatekTygodnia"])  AND !isset($_SESSION["koniecTygodnia"]) )
	{
		header('Location: panel_HomePage.php?error="brak bazy danych"');
		exit();
	}
	
	$bazaGazety= @new mysqli($host,$uzytkownik_bazy,$haslo_uzytkownika,$baza_gazety);
	mysqli_query($bazaGazety,"SET NAMES utf8");
		if(!isset($testNaPrzypadkoweKlikniecie) AND $_GET['baza']=='bazamgn' ) {
			$testNaPrzypadkoweKlikniecie=mysqli_query($bazaGazety,"SELECT * FROM tygodnie WHERE data_pocz='".$_SESSION["poczatekTygodnia"]."' ");
			
			
				$wynik=$testNaPrzypadkoweKlikniecie->fetch_all();
				$dodatek="nic nie znalazlo";
				
				foreach($wynik as $row)  $dodatek=$row[2];
				if($dodatek!="nic nie znalazlo"){
				header('Location: panel_HomePage.php?error=Nowy tydzień został już stworzony');
				exit();}
			}
			
		
		
		if(isset($_GET['tt']) AND isset($_GET['rrr']) AND isset($_GET['rrr'])){
		
			if($_GET['tt']<10 && ord($_GET['tt'])!=48)		$_GET['tt']="0".$_GET['tt'];
			
			$data_obecnego_tygodnia=($_GET['tt'])."_".$_GET['rrr'];
			$dodanieOstatniejKolumny="ALTER TABLE `".$_GET["baza"]."` ADD `ostatnia_kolumna` INT NULL DEFAULT NULL AFTER `spr_".$data_obecnego_tygodnia."`";
			$komenda="ALTER TABLE `".$_GET["baza"]."` ADD `nak_".$data_obecnego_tygodnia."` INT NOT NULL AFTER `ostatnia_kolumna`, ADD `zwr_".$data_obecnego_tygodnia."` INT NOT NULL AFTER `nak_".$data_obecnego_tygodnia."`, ADD `spr_".$data_obecnego_tygodnia."` INT NOT NULL AFTER `zwr_".$data_obecnego_tygodnia."`";
			$usuniecieOK="ALTER TABLE `".$_GET["baza"]."` DROP `ostatnia_kolumna`";
				
				
			if(mysqli_query($bazaGazety,$komenda)){
				$tak="?dod=tak";
				if(mysqli_query($bazaGazety,$usuniecieOK)){
					$tak2="&usu=tak";
					if(mysqli_query($bazaGazety,$dodanieOstatniejKolumny)) $tak3="&dod_o=tak";
					else $tak3="&dod_o=nie";
				}
				else $tak2="&usu=nie";
			}
			else{ $tak="?dod=nie";}
		
			//automatyczne uzupelnienie nakladu oraz ustalenie sprzedarzy i zwrotow na -1:
					$wczytaj_komenda="SELECT * FROM naklad WHERE TRUE";
					
					if($_GET["baza"]=="bazamgn")$nak="maly";
					if($_GET["baza"]=="bazagnd")$nak="gosc";
					if($_GET["baza"]=="bazandz")$nak="niedziela";
					
					if($wczytaj_naklad = $bazaGazety ->query($wczytaj_komenda))
					{
						foreach ($wczytaj_naklad as $wiersz){
							$wypelnienie="UPDATE `".$_GET["baza"]."` SET nak_".$data_obecnego_tygodnia."=".$wiersz[$nak]." WHERE id_par=".$wiersz['id_par'];
							$zwroty="UPDATE `".$_GET["baza"]."` SET zwr_".$data_obecnego_tygodnia."=-1 WHERE id_par=".$wiersz['id_par'];
							$spr="UPDATE `".$_GET["baza"]."` SET spr_".$data_obecnego_tygodnia."=-1 WHERE id_par=".$wiersz['id_par'];
							mysqli_query($bazaGazety,$wypelnienie);
							mysqli_query($bazaGazety,$zwroty);
							mysqli_query($bazaGazety,$spr);
						}
						
					}
					else $erro="&erro=wypelnienie-brak";
		
			//zaktualizowanie tygodni
			if($_GET["baza"]=="bazamgn"){
					if(isset($_SESSION["poczatekTygodnia"]) AND isset($_SESSION["koniecTygodnia"])){
						
							$dodanieTygodnia="INSERT INTO `tygodnie` (`id_tyg`, `nr_tyg`, `data_pocz`, `data_konc`) VALUES (NULL, '".$_GET['tt']."', '".$_SESSION["poczatekTygodnia"]."', '".$_SESSION["koniecTygodnia"]."')";
							mysqli_query($bazaGazety,$dodanieTygodnia);
				
				
					}
					else{
							$dodanieTygodnia="INSERT INTO `tygodnie` (`id_tyg`, `nr_tyg`, `data_pocz`, `data_konc`) VALUES (NULL, 'tt', 'dd.mm.rr', 'dd.mm.rr')";
							mysqli_query($bazaGazety,$dodanieTygodnia);
					}
			}
		}
		else echo"ERROR -> Brak ustalonego tygodnia!!!";
	
	if(!isset($erro))$erro="&erro=wypelnienie-powinnobyc";
	
	$bazaGazety ->close();
	//if(isset($tak) AND isset($tak2) AND isset($tak3) )header('Location: panel_HomePage.php'.$tak.$tak2.$tak3.$erro);
	//else header('Location: panel_HomePage.php?cosiestalo=nic'.$erro);
	if($_GET["baza"]=="bazamgn") header('Location: panel_zakoncz.php?tt='.$_GET['tt'].'&rrr='.$_GET['rrr'].'&baza=bazagnd');
	if($_GET["baza"]=="bazagnd")  header('Location: panel_zakoncz.php?tt='.$_GET['tt'].'&rrr='.$_GET['rrr'].'&baza=bazandz');
	if($_GET["baza"]=="bazandz")   header('Location: panel_HomePage.php?news="zakonczono"');
	exit();
?>
