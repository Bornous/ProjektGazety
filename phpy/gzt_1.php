<?php

	session_start();
	
	$_SESSION['choose']='MAŁY GOŚĆ NIEDZIELNY';
	header('Location: http://localhost:85/Zelent_way/panel_BETA.php');
	
?>