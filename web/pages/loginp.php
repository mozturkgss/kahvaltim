<?php
	include("data.php");
	 
	session_start();
	ob_start();
	
	$data = $database->get("yonetici","*", [
		"AND" => [
			"kullaniciadi" => $_POST['username'],
			"sifre" => $_POST['password']]
	]);

	if ($data){
		$_SESSION["login"] = "true";
		$_SESSION["kullaniciid"] = $data["kullaniciid"];
		$_SESSION["kullaniciadi"] = $data["kullaniciadi"];
		$_SESSION["adisoyadi"] = $data["adisoyadi"];
		
		header("Location:index.php");
	}
	else
	{
		echo "Kullan�c� ad� veya �ifre Yanl��.";
		 
		header("Refresh: 2; url=login.php");;
	}
	 
	ob_end_flush();
 
?>
