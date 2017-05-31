<!DOCTYPE HTML>
<html >
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
	
		$dekanat =$_GET["dekanatDoZnalezienia"];
		
		
		$pol_baza = mysqli_connect($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_gazety);
		if(!$pol_baza){
			die('Problem z połączeniem się z bazą: '.mysqli_error($pol_baza));
		}
		
		mysqli_query($pol_baza,"SET NAMES UTF8");
		$zapytanie='SELECT * FROM bazamgn WHERE dekanat="'.$dekanat.'"';
		$wynik= mysqli_query($pol_baza,$zapytanie);
		$ile_wyn = $wynik->num_rows;
		echo 'Parafia: <select name="parafia" style="margin-left:12px; min-width:200px;">';
		echo "<option value=' '></option>"	;
		while($row = mysqli_fetch_array($wynik))
		{
			
			echo "<option value='".$row['id_par']."'>".$row['parafia']."</option>";
			
		}
		//echo "<option >".$dekanat." i ".$ile_wyn."</option>"	;
		echo '</select>';
		mysqli_close($pol_baza);
	
	?>

			
     

</body>
</html>