<?php
	include "data.php";
	
	$kullaniciadi = $_GET['kullaniciadi'];
	$sifre = $_GET['sifre'];
	
	$sql = "SELECT id FROM kullanici where kullaniciadi = '" . $kullaniciadi . "' and sifre = '" . $sifre . "'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$kullaniciid = $row["id"];
		}
	} else {
		$sql = "SELECT id FROM kullanici where kullaniciadi = '" . $kullaniciadi . "'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$kullaniciid = -1;
			}
		}else {	
			$sql = "INSERT INTO kullanici (kullaniciadi, sifre) VALUES ('" . $kullaniciadi . "', '" . $sifre . "')";
			$conn->query($sql);
			
			$sql = "SELECT id FROM kullanici where kullaniciadi = '" . $kullaniciadi . "' and sifre = '" . $sifre . "'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$kullaniciid = $row["id"];
				}
			}
		}
	}
	
	echo $kullaniciid;