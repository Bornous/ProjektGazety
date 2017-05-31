<!DOCTYPE HTML>
<html >
<body >
<?php

	session_start();
	
	$_SESSION["poczatekTygodnia"]=$_GET["pocz"];
	$_SESSION["koniecTygodnia"]=$_GET["koni"];
	$_SESSION["tt"]=$_GET["tt"];
	$_SESSION["rr"]=$_GET["rr"];
	$_SESSION["miesiac"]=$_GET["miesiac"];
	echo $_SESSION["miesiac"];
	
?>

</body>
</html>