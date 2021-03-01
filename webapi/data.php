<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kahvaltim";

	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->set_charset("utf8");
	if ($conn->connect_error) {
		echo "-1";
	} 