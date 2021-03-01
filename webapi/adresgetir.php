<?php
	include "data.php";

	$kullaniciid = $_GET['kullaniciid'];
	
	$sql = "SELECT adresadi FROM adres where kullaniciid = '" . $kullaniciid . "' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo $row["adresadi"]."<br>";
		}
	} else {
		echo "0";
	}
	$conn->close();