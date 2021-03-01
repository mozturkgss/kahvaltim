<?php
	session_start();

	if(!isset($_SESSION["login"])){
		echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
		header("Refresh: 2; url=login.php");
		die(1);
	} else{
		include  'data.php';  				
	}