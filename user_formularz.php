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
	<meta charset="utf8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Panel użytkownika</title>
	
	<link href="CSS_us/panel_styles_BETA.css" rel="stylesheet" type="text/css">
	<script src="user_panel_scripts.js"></script>
	
	
</head>

<body <?php if(!isset($_SESSION['poczatekTygodnia'])) echo "onload='daty()'" ?>>

	<div id="contener">
	
			<?php require("szkielet/us_topbar.php");?>
			<?php require("szkielet/us_topmenu.php");?>
			<?php require("szkielet/us_options.php");?>
			<?php require("szkielet/us_main.php");?>
			<?php require("szkielet/us_footer.php");?>
			
     </div>

</body>
</html>