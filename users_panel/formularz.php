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

<body onload="daty()">

	<div id="contener">
	
			<?php require("szkielet2/topbar2.php");?>
			<?php require("szkielet2/topmenu2.php");?>
			<?php require("szkielet2/options2.php");?>
			<?php require("szkielet2/main2.php");?>
			<?php require("szkielet2/footer2.php");?>
			
     </div>

</body>
</html>