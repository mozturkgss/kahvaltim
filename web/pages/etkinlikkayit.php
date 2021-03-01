<!DOCTYPE html>
<html lang="tr">
	<head>

		<?php include "meta.php" ?>
	</head>
	<body>
		<?php include "header.php" ?>					
		<!-- Page Content -->
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<br />
					
					<?php 
						$etkinlikid = -1;							
						$tarih = date('Y-m-d');
						$saat = date('H:i');
						$etkinlikadi = "";
						$etkinlikyeri = "";
						$etkinlikaciklama = "";
						$etkinlikturu = "";
						$sirano = "0";
						$yazirenk = "#000000";
						$yaziboyut = "12";
						$zeminrenk = "#ffffff";
						$valiyardimcisi = "";
						$program = "1";
						$detayprogram = null;
						$disprogram = null;
						$soru = null;
						$kabul = null;
						$iptal = null;
						$mesaj = null;
						$vyardimcisi = null;
						$dahasonra = null;
						$cicek = null;
						$celenk = null;
						
						if(!empty($_GET['id'])) {									
							$data = $database->get("etkinlik","*", [
								"etkinlikid" => $_GET['id']
							]);
							
							if ($data){
								$etkinlikid = $data["etkinlikid"];	
								$tarih = $data['tarih'];
								$saat = $data['saat'];
								$etkinlikadi = $data['etkinlikadi'];
								$etkinlikyeri = $data['etkinlikyeri'];
								$etkinlikaciklama = $data['etkinlikaciklama'];
								$etkinlikturu = $data['etkinlikturu'];
								$sirano = $data['sirano'];
								$yazirenk = $data['yazirenk'];
								$yaziboyut = $data['yaziboyut'];
								$zeminrenk = $data['zeminrenk'];
								$valiyardimcisi = $data['valiyardimcisi'];
								$program = $data['program'];
								$detayprogram = $data['detayprogram'];
								$disprogram = $data['disprogram'];
								$soru = $data['soru'];
								$kabul = $data['kabul'];
								$iptal = $data['iptal'];
								$mesaj = $data['mesaj'];
								$vyardimcisi = $data['vyardimcisi'];
								$dahasonra = $data['dahasonra'];
								$cicek = $data['cicek'];
								$celenk = $data['celenk'];
							}
						} 					
					?>
					
					<form role="form" method="post" action="etkinlikkayitekle.php">
						<input type="hidden" name="etkinlikid" value="<?php echo $etkinlikid; ?>"/> 
						<div class="row">
							<div class="col-sm-6">
								<div class="col-sm-12">
									<div class="col-sm-3">
										<input type="checkbox" name="program" value="" <?php echo ($program =="1" ? "checked" : null);?>/> 
										<label>Program</label> 		
									</div>
									<div class="col-sm-3">
										<input type="checkbox" name="detayprogram" value="" <?php echo ($detayprogram =="1" ? "checked" : null);?>/> 
										<label>Detay Program</label> 
									</div>
									<div class="col-sm-3">
										<input type="checkbox" name="disprogram" value="" <?php echo ($disprogram =="1" ? "checked" : null);?>/> 
										<label>Dış Program</label> 
										</div>
									<div class="col-sm-3">
										<input type="checkbox" name="soru" value="" <?php echo ($soru =="1" ? "checked" : null);?>/> 
										<label>?</label>
									</div>
								</div>
								<div class="col-sm-12">		
									<div class="col-sm-3">
										<input type="checkbox" name="kabul" value="" <?php echo ($kabul =="1" ? "checked" : null);?>/> 
										<label>Kabul</label> 
									</div>
									<div class="col-sm-3">
										<input type="checkbox" name="iptal" value="" <?php echo ($iptal =="1" ? "checked" : null);?>/> 
										<label>İptal</label>
									</div>
									<div class="col-sm-3">
										<input type="checkbox" name="mesaj" value="" <?php echo ($mesaj =="1" ? "checked" : null);?>/> 
										<label>Mesaj</label> 
									</div>
									<div class="col-sm-3">
										<input type="checkbox" name="vyardimcisi" value="" <?php echo ($vyardimcisi =="1" ? "checked" : null);?>/> 
										<label>Vali Yardımcısı</label> 
									</div>									
								</div>
								<div class="col-sm-12">								
									<div class="col-sm-3">
										<input type="checkbox" name="dahasonra" value="" <?php echo ($dahasonra =="1" ? "checked" : null);?>/> 
										<label>Daha Sonra</label> 
									</div>
									<div class="col-sm-3">
										<input type="checkbox" name="cicek" value="" <?php echo ($cicek =="1" ? "checked" : null);?>/> 
										<label>Çiçek</label> 
									</div>
									<div class="col-sm-3">
										<input type="checkbox" name="celenk" value="" <?php echo ($celenk =="1" ? "checked" : null);?>/> 
										<label>Çelenk</label>
										</br>
									</div>
								</div>											
								<div class="col-sm-4">
									<label>Tarih</label> 
									<input type="date" class="form-control" name="tarih" value="<?php echo $tarih; ?>"/> 
								</div>
								<div class="col-sm-3">
									<label>Saat</label> 
									<input type="time" class="form-control" name="saat" value="<?php echo $saat; ?>"/> 
								</div>												
								<div class="col-sm-3">			  
									<label>Sıra No</label> 
									<input type="number" class="form-control"  name="sirano" value="<?php echo $sirano; ?>"/> 
								</div>								
								<div class="col-sm-12">
									<label>Etkinlik Adı</label> 
									<textarea class="form-control" rows="3" name="etkinlikadi"><?php echo $etkinlikadi; ?></textarea>
								</div>
								<div class="col-sm-12">
									<label>Etkinlik Yeri</label> 
									<input type="text" class="form-control" name="etkinlikyeri" value="<?php echo $etkinlikyeri; ?>"/>
								</div>
								<div class="col-sm-12">
									<label>Açıklama</label> 
									<textarea class="form-control" rows="2" name="etkinlikaciklama"><?php echo $etkinlikaciklama; ?></textarea>
								</div>
								
								<div class="col-sm-3">
									<label>Vali Yardımcısı</label> 
									<select class="form-control" se="" name="valiyardimcisi" value="test">
										<option></option>
										<option>Erdoğan AYGENÇ</option>
										<option>M. Emin AVCI</option>
										<option>Zülkarnin ÖZTÜRK</option>
										<option>Baha BAŞÇELİK</option>
										<option>Gökhan AZCAN</option>
										<option>Mehmet AKTAŞ</option>
										<option selected="selected"><?php echo $valiyardimcisi; ?></option>
									</select>
								</div>			

								<div class="col-sm-3">
									<label>Yazı Rengi</label> 
									<input type="color" class="form-control"  name="yazirenk" value="<?php echo $yazirenk; ?>"/>
								</div>
								<div class="col-sm-3">
									<label>Yazı Boyutu</label> 
									<input type="number" class="form-control"  name="yaziboyut" value="<?php echo $yaziboyut; ?>"/>
								</div>
								<div class="col-sm-3">
									<label>Zemin Rengi</label> 
									<input type="color" class="form-control" name="zeminrenk" value="<?php echo $zeminrenk; ?>"/>
									</br>
								</div>								
								<div class="col-sm-12">
                                	</br>
									<button type="submit" class="btn btn-default">Kaydet</button> 
									<button type="button" class="btn btn-default" onclick="location.href=&#39;etkinlik.php&#39;;">Vazgeç</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
		<!-- /#wrapper -->
		<?php include "footer.php" ?>
	</body>
</html>
