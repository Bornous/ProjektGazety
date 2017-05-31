<?php

	session_start();
	
	$_SESSION['choose']='GOŚĆ NIEDZIELNY';
	header('Location: http://localhost:85/Zelent_way/panel_BETA.php');
	
?>