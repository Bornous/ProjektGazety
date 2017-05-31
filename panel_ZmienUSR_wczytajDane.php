<?php echo'<!DOCTYPE HTML><html ><head>';
 header('Content-Type: text/html; charset=UTF-8'); 
 echo'<body >';
	
		
		session_start();
			require_once "daneDoPolaczenia.php";
					/*
					$host 
					$uzytkownik_bazy
					$haslo_uzytkownika
					$baza_logowania
					$baza_gazety
					*/
				if(isset($_GET['error']))unset($_GET['error']);
				
				$pol_baza = mysqli_connect($host, $uzytkownik_bazy, $haslo_uzytkownika, $baza_logowania);
				if(!$pol_baza){
					die('Problem z połączeniem się z bazą: '.mysqli_error($pol_baza));
				}
				
				mysqli_query($pol_baza,"SET NAMES UTF8");
				$zapytanie='SELECT * FROM `log_in` WHERE 1=1';
				$wynik= mysqli_query($pol_baza,$zapytanie);
		
			if(isset($_GET['id']) ){
			
				while($row=mysqli_fetch_array($wynik)){
					if($row['id']==$_GET['id']){
						
						if($row["admin"]==1){$first="administrator"; $second="uzytkownik";}
						else {$first="uzytkownik";$second="administrator";}
						
						
						
						echo '<form action="panel_ZmienUSR_send.php" methot="GET"><div  class="noneNet"> <input type="text" name="idUSR" value="'.$row["id"].'" /></div ><div  class="gazetyZW fl">Login:</div ><div  class="zawartoscZW fl smaller"> <input type="text" name="newlogin" value="'.$row["login"].'" /></div ><div class="endfloat"> </div><div  class="gazetyZW fl">Hasło:</div ><div  class="zawartoscZW fl smaller"> <input type="password" name="newpass" value="'.$row["haslo"].'" /></div ><div class="endfloat"> </div><div  class="gazetyZW fl">Email:</div ><div  class="zawartoscZW fl smaller"> <input type="text" name="newemail" value="'.$row["email"].'" /></div ><div class="endfloat"> </div><div  class="gazetyZW fl">Numer telefonu:</div ><div  class="zawartoscZW fl smaller"> <input type="text" name="newtel" value="'.$row["telefon"].'" /></div ><div class="endfloat"> </div><div  class="gazetyZW fl">Imię:</div ><div  class="zawartoscZW fl smaller"> <input type="text" name="newname" value="'.$row["imie"].'" /></div ><div class="endfloat"> </div><div  class="gazetyZW fl">Nazwisko:</div ><div  class="zawartoscZW fl smaller"> <input type="text" name="newnazw" value="'.$row["nazwisko"].'" /></div ><div class="endfloat"> </div><div  class="gazetyZW fl">Status:</div ><div  class="zawartoscZW fl smaller"> <select name="newadmin" ><option value="'.$first.'">'.$first.'</option><option value=" '.$second.' ">'.$second.'</option></select></div ><div class="endfloat"> </div><input type="submit" value="ZAPISZ ZMIANY"  class="option"  /></form>';
						if ($_SESSION['idUsera']!=$_GET["id"]) echo"<button class='option right'   onclick=USRdelete('".$_GET["id"]."')>USUŃ UŻYTKOWNIKA</button> ";
					}	
				}
				
				
				
			}
			else echo 'Nie ma danych';
			
		//wersja bez dekanatu
		//echo '<br><div  class="naglowekZW">Wprowadz nowe dane:</div><div  class="gazetyZW fl">Nazwa parafi:</div ><div  class="zawartoscZW fl smaller"> <input type="number_format" name="nowaParafia" value="" /></div ><div class="endfloat text15"> (pozostaw puste, jeśli nie chcesz zmieniać)</div>';
		
	?>
	<?php
	/*
			<form action="panel_ZmienUSR_send.php" methot="POST">
			<div  class="gazetyZW fl">Login:</div >
			<div  class="zawartoscZW fl smaller"> <input type="number_format" name="nowylogin" value="'.$row["login"].'" /></div >
			<div class="endfloat"> </div>
			
			<select name="newadmin" ><option value="'.$first.'">	$first</option><option value=" '.$second.' ">	$second</option></select>
			*/
			
		
			
			
			
     
echo "</body></html>";

?>
			