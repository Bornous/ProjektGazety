<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel administratora</title>
	
	<link href="CSS/panel_styles_BETA.css" rel="stylesheet" type="text/css">
	
	<script src="panel_scripts.js"></script>
	
	
</head>

<body >

	<div id="contener">
	
			<?php require("szkielet/topbar.php");?>
			<?php require("szkielet/topmenu.php");?>
			<?php require("szkielet/options.php");?>
				<div id="main" class="none_main">
				<br>
					<button class="option txtopt" onclick="zmienZW()" style="min-width: 600px; margin-left: 70px;">Popraw dane o zwrotach z tego tygodnia</button><br>
					<button class="option txtopt" onclick="zmianaParafii()" style="min-width: 600px; margin-left: 70px;">Zmień dane parafi (nazwa parafi lub nazwa dekanatu)</button><br>
					<button class="option txtopt" onclick="dodajParafie()" style="min-width: 600px; margin-left: 70px;">Dodaj parafię</button><br>
					<button class="option txtopt" onclick="deletePar()" style="min-width: 600px; margin-left: 70px;">Usuń parafię</button><br>
					<button class="option txtopt" onclick="zmianaUser()" style="min-width: 600px; margin-left: 70px;">Zmień dane / Dodaj użytkowników</button><br>
					<button class="option txtopt" onclick="zmianaNAK()" style="min-width: 600px; margin-left: 70px;">Zmień domyślny nakład gazet</button><br>
					<button class="option txtopt" onclick="flink()" style="min-width: 600px; margin-left: 70px;">Zmień dane z poprzednich tygodni</button>
				</div>
		
		
		
			<?php require("szkielet/footer.php");?>
			
     </div>

</body>
</html>