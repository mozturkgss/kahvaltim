<?php
	include "data.php";

	$kullaniciid = $_GET['kullaniciid'];
	$adresadi = $_GET['adresadi'];	
	$tutar = $_GET['tutar'];	
	
	$sql = "SELECT id FROM adres where kullaniciid = '" . $kullaniciid . "' and adresadi = '" . $adresadi . "'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$adresid = $row["id"];
		}
	}
	
	$sql = "INSERT INTO siparis (kullaniciid, adresid, toplamtutar) VALUES ('" . $kullaniciid . "', '" . $adresid . "', '" . $tutar . "')";
	$conn->query($sql);
	
	$sql = "SELECT id FROM siparis where kullaniciid = '" . $kullaniciid . "' and adresid = '" . $adresid . "' and durum='siparis' order by id asc";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$siparisid = $row["id"];
		}
	}

	echo $siparisid;