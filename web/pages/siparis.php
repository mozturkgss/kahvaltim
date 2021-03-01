<!DOCTYPE html>
<html lang="tr">
	<head>
		<?php include "meta.php" ?>
		<script>		
		function filtrele() {
			var filter = "?page=1";
			if (document.getElementById("filtersiparisno").value != "")
				filter += "&filtersiparisno=" + document.getElementById("filtersiparisno").value;

			if (document.getElementById("filtertarih").value != "")
				filter += "&filtertarih=" + document.getElementById("filtertarih").value;

			if (document.getElementById("filteradisoyadi").value != "")
				filter += "&filteradisoyadi=" + document.getElementById("filteradisoyadi").value;
			
			if (document.getElementById("filterkullaniciadi").value != "")
				filter += "&filterkullaniciadi=" + document.getElementById("filterkullaniciadi").value;
			
			location.href = filter;
		}
		
		function popupwindow(url, title, w, h) {
		  var left = (screen.width/2)-(w/2);
		  var top = (screen.height/2)-(h/2);
		  return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		}
		
		function kayitguncelle(id, durum) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					location.reload(true);
				}
			};
			xmlhttp.open("GET", "siparisguncelle.php?id=" + id + "&durum=" + durum, true);
			xmlhttp.send();				
		}
		
		</script>
	</head>
	<body>
		<?php 
			include "header.php";
		
			$currentdate = date('Y-m-d');	
			$firstdate = date("Y-m-01", strtotime("0 month"));
			$lastdate = date("Y-m-t", strtotime("0 month"));			
			
			$page = (isset($_GET['page']) ? $_GET['page']: 1)-1;
			$durum = $_GET['durum'];
			
			$filtersiparisnoname = (isset($_GET['filtersiparisno']) ? "siparis.id": "siparis.id[>]");
			$filtertarihname = (isset($_GET['filtertarih']) ? "siparis.tarih": "siparis.id[>]");
			$filteradisoyadiname = (isset($_GET['filteradisoyadi']) ? "adres.adisoyadi[~]": "siparis.id[>]");
			$filterkullaniciadiname = (isset($_GET['filterkullaniciadi']) ? "kullanici.kullaniciadi[~]": "siparis.id[>]");
			
			$filtersiparisnovalue = (isset($_GET['filtersiparisno']) ? $_GET['filtersiparisno']: 0);
			$filtertarihvalue = (isset($_GET['filtertarih']) ? $_GET['filtertarih']: 0);
			$filteradisoyadivalue = (isset($_GET['filteradisoyadi']) ? $_GET['filteradisoyadi']: 0);
			$filterkullaniciadivalue = (isset($_GET['filterkullaniciadi']) ? $_GET['filterkullaniciadi']: 0);			
		?>
		
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<br />
					<br />
					<div class="col-sm-12">              
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Sipariş No</th>
									<th>Sipariş Zamanı</th>
									<th>Adı Soyadı</th>
									<th>Kullanıcı Adı</th>
									<th>Tutar</th>
									<th>Siparişler</th>
									<th>Adres</th>									
									<th>Durum</th>
								</tr>
						
							</thead>
							<tbody>
								<?php
								$datas = $database->select("siparis", [
									"[>]kullanici" => ["kullaniciid" => "id"],
									"[>]adres" => ["adresid" => "id"]], [						
									"siparis.id",
									"siparis.tarih",
									"siparis.toplamtutar",
									"kullanici.kullaniciadi",
									"adres.adisoyadi",
									"adres.adres",
									"adres.ilce",
									"adres.il"
								], [
									"AND" => [
										"durum" => $durum,
										$filtersiparisnoname => $filtersiparisnovalue,
										$filtertarihname."[~]" => $filtertarihvalue,
										$filteradisoyadiname => $filteradisoyadivalue,
										$filterkullaniciadiname => $filterkullaniciadivalue
									],
									"ORDER" => "siparis.id DESC",
									"LIMIT" => [$page*10, 10]
								]);
																
								$rowcount = $database->count("siparis", [
									"AND" => [
										$filtersiparisnoname => $filtersiparisnovalue,
										$filtertarihname => $filtertarihvalue,
										$filteradisoyadiname => $filteradisoyadivalue,
										$filterkullaniciadiname => $filterkullaniciadivalue
									]
								]);
								
								foreach($datas as $data)
								{
									$detay = "";
									$datas1 = $database->query("select s.stokadi, s.birim, d.miktar, d.tutar FROM siparisdetay d left join stok s on s.id = d.stokid where siparisid = " .$data["id"] , [])->fetchAll();
									foreach($datas1 as $data1)
									{
										$detay = $detay . $data1["stokadi"] . " (" . $data1["miktar"] . " " . $data1["birim"] . ") "  . $data1["tutar"] . " TL </br>";
									}
									
									
									$date=date_create($data["tarih"]);
									
									if ($durum == "siparis"){
										$btn = "<button type='button' class='btn btn-default' onclick='kayitguncelle(".$data["id"].", \"tamam\");'>Siparişi Gönder</button>";
									}
									else {
										$btn = "<button type='button' class='btn btn-default' onclick='kayitguncelle(".$data["id"].", \"siparis\");'>Siparişi Geri Al</button>";
									}
																		
									echo "<tr>
										<td>" . $data["id"] . "</td>
										<td>" . date_format($date,"d/m/Y H:i") . "</td>
										<td>" . $data["adisoyadi"] . "</td>
										<td>" . $data["kullaniciadi"] . "</td>
										<td align='right'>" . $data["toplamtutar"] . " TL </td>
										<td>" . $detay . "</td>
										<td>" . $data["adres"] . " " . $data["ilce"] . " " . $data["il"] . "</td>
										<td>"
										. $btn .
										"</td>
									</tr>";
								}
								
								?>	

								<tr class="filters">
									<td><input id="filtersiparisno" type="number" class="form-control" placeholder="Sipariş No"></td>
									<td><input id="filtertarih" type="date" class="form-control" placeholder="Tarih"></td>
									<td><input id="filteradisoyadi" type="text" class="form-control" placeholder="Adı Soyadı"></td>
									<td><input id="filterkullaniciadi" type="text" class="form-control" placeholder="Kullanıcı Adı"></td>
									<td colspan="4">
										<button type='button' class='btn btn-primary' onclick='filtrele();'>Filtrele</button>
									</td>
								</tr>								
							</tbody>
						</table>						
						<ul class="pagination" valign="top">
							<?php
								echo "<li><a href='?page=1'><<</a></li>";
																
								for($i=1; $i<$rowcount/10+1; $i++){
									if ($i > $page - 10 && $i < $page + 10)
										echo "<li " .($i==$page+1 ? "class='active' " : "") ."><a href='?page=$i'>$i</a></li>";
								}
								
								echo "<li><a href='?page=" . (int)( $rowcount/10+1) . "'>>></a></li>";
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php include "footer.php" ?>
	</body>
</html>
