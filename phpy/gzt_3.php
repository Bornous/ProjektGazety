<?php

	session_start();
	
	$_SESSION['choose']='NIEDZIELNA';
	header('Location: http://localhost:85/Zelent_way/panel_BETA.php');
	
?>