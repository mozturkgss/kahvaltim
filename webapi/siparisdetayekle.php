<?php
	include "data.php";

	$siparisid = $_GET['siparisid'];
	$stokid = $_GET['stokid'];	
	$miktar = $_GET['miktar'];	
	$birimfiyat = $_GET['birimfiyat'];
	$tutar = $_GET['tutar'];
		
	$sql = "INSERT INTO siparisdetay (siparisid, stokid, miktar, birimfiyat, tutar) VALUES ('" . $siparisid . "', '" . $stokid . "', '" . $miktar . "', '" . $birimfiyat . "', '" . $tutar . "')";
	$conn->query($sql);	