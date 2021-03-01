<?php 	
	include "loginc.php";
	
	$id = (isset($_GET['id']) ? $_GET['id']: 0);
	$durum = (isset($_GET['durum']) ? $_GET['durum']: 0);
	
	if ($id > 0) {
		$database->update("siparis", [
			"durum" => $durum
		], [
			"id" => $id
		]);
	}