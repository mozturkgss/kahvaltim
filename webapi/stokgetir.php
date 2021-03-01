<?php
	include "data.php";

	$sql = "SELECT id, stokadi, aciklama, resimid, birim, birimfiyat FROM stok";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo $row["id"]. ";" . $row["stokadi"].  ";" .$row["aciklama"].  ";" . $row["resimid"]. ";" . $row["birim"]. ";" . $row["birimfiyat"]. "<br>";
		}
	} else {
		echo "0";
	}
	$conn->close();