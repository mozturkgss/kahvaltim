<?php
	include "data.php";

	$kullaniciid = $_GET['kullaniciid'];
	$adresadi = $_GET['adresadi'];
	$adres = $_GET['adres'];
	$ilce = $_GET['ilce'];
	$il = $_GET['il'];	
	$adisoyadi = $_GET['adisoyadi'];	
	
	$sql = "INSERT INTO adres (kullaniciid, adresadi, adres, ilce, il, adisoyadi) VALUES ('" . $kullaniciid . "', '" . $adresadi . "', '" . $adres . "', '" . $ilce . "', '" . $il . "', '" . $adisoyadi . "')";
	$conn->query($sql);

	$sql = "SELECT id FROM adres where kullaniciid = '" . $kullaniciid . "' and adresadi = '" . $adresadi . "'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$adresid = $row["id"];
		}
	}
	
	echo $adresid;