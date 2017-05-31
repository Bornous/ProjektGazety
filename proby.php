<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel administratora</title>

	
	
	
</head>

<body  >

	
	<div  >
		
	
			<?php 
			require_once "daneDoPolaczenia.php";
			$bazaGazety= @new mysqli($host,$uzytkownik_bazy,$haslo_uzytkownika,$baza_gazety);
			mysqli_query($bazaGazety,"SET NAMES utf8");
			$pocz='14.11.16';
			
			$testNaPrzypadkoweKlikniecie=mysqli_query($bazaGazety,"SELECT * FROM tygodnie WHERE data_pocz='".$pocz."' ");
			if($testNaPrzypadkoweKlikniecie)echo 'Wszystko dziala! a wynik to: ()';
			else {
				$wynik=$testNaPrzypadkoweKlikniecie->fetch_all();
				foreach($wynik as $row)  echo "Nic nie dziala a wynik to: ".$row[2];
				}
			
		
			?>
			
     </div>
	
</body>
</html>
