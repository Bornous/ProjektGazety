<!DOCTYPE HTML>
<html >
<head>
	<meta charset="utf8" />
	</head>
<body >
	
	<?php
		session_start();
		require_once "daneDoPolaczenia.php";
			/*
			$host 
			$uzytkownik_bazy
			$haslo_uzytkownika
			$baza_logowania
			$baza_gazety
			*/
	
		if( isset($_GET["ParafiaDoZnalezienia"]) ){
			$parafia =$_GET["ParafiaDoZnalezienia"];
			$_SESSION["ParafiaDoZnalezienia"]=$parafia;
			
			
			$pol_baza = @new  mysqli($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_gazety);
			if(!$pol_baza){
				die('Problem z połączeniem się z bazą: '.mysqli_error($pol_baza));
			}
			
			mysqli_query($pol_baza,"SET NAMES UTF8");
			$q_mgn="SELECT * FROM bazamgn WHERE id_par='".$parafia."'";
			$q_gnd='SELECT * FROM bazagnd WHERE id_par="'.$parafia.'" ';
			$q_ndz='SELECT * FROM bazandz WHERE  id_par="'.$parafia.'" ';
			$re_mgn= $pol_baza->query($q_mgn);
			$re_gnd= $pol_baza->query($q_gnd);
			$re_ndz= $pol_baza->query($q_ndz);
			$assoc_mgn=$re_mgn->fetch_assoc();
			$assoc_gnd=$re_gnd->fetch_assoc();
			$assoc_ndz=$re_ndz->fetch_assoc();
			$zwr="zwr_".$_SESSION["tt"]."_".$_SESSION["rr"];
			$nak="nak_".$_SESSION["tt"]."_".$_SESSION["rr"];
			$spr="spr_".$_SESSION["tt"]."_".$_SESSION["rr"];
		
		
			echo '<br><div  class="naglowekZW">Zwrotów w tym tygodniu ('.$_SESSION["poczatekTygodnia"].' - '.$_SESSION["koniecTygodnia"].') :</div><div class="gazetyZW">Mały gość niedzielny</div ><div  class="zawartoscZW">		(nakład: '.$assoc_mgn[$nak].' ) zwroty: <input type="number_format" name="mgn" value="'.$assoc_mgn[$zwr].'" /> (do zapłaty: '.$assoc_mgn[$spr].' zł)</div ><div  class="gazetyZW">Gość niedzielny</div ><div  class="zawartoscZW">		(nakład: '.$assoc_gnd[$nak].' ) zwroty: <input type="number_format" name="gnd" value="'.$assoc_gnd[$zwr].'" /> (do zapłaty: '.$assoc_gnd[$spr].' zł)</div > <div  class="gazetyZW">Niedziela</div ><div  class="zawartoscZW">		(nakład: '.$assoc_ndz[$nak].' ) zwroty:  <input type="number_format" name="ndz" value="'.$assoc_ndz[$zwr].'"/> (do zapłaty: '.$assoc_ndz[$spr].' zł)</div >';
			

			mysqli_close($pol_baza);
		}
		else echo "nie pobiera danych parafi z bazy danych!";
	?>
	
			
     

</body>
</html>