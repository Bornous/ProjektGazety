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
			
			$q_nak="SELECT * FROM naklad WHERE id_par='".$parafia."'";
			
			
			$re_nak= $pol_baza->query($q_nak);
			
			
			$assoc_nak=$re_nak->fetch_assoc();
		
		
			echo '<br><div  class="naglowekZW">Domyślne zwroty dla  '.$assoc_nak['parafia'].' :</div><div class="gazetyZW">Mały gość niedzielny</div ><div  class="zawartoscZW">		nakład: <input type="number_format" name="mgn_nak" value="'.$assoc_nak['maly'].'" /></div ><div  class="gazetyZW">Gość niedzielny</div ><div  class="zawartoscZW">		nakład: <input type="number_format" name="gnd_nak" value="'.$assoc_nak['gosc'].'" /> </div > <div  class="gazetyZW">Niedziela</div ><div  class="zawartoscZW">		nakład::  <input type="number_format" name="ndz_nak" value="'.$assoc_nak['niedziela'].'"/></div >';
			

			mysqli_close($pol_baza);
		}
		else echo "nie pobiera danych parafi z bazy danych!";
	?>
	
			
     

</body>
</html>