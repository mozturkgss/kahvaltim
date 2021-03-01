<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "meta.php" ?>
</head>

<body>
	<?php include "header.php" ?>

        <div id="page-wrapper">
		    </br>
            <div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo date("Y"); ?> Yılı Satış Analizi
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>                        
                    </div>
                </div>      
			    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo date("Y")-1 . " - " . date("Y"); ?> Yılı Karşılaştırma - Sipariş Sayısı (Adet)
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chartsip"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo date("Y")-1 . " - " . date("Y"); ?>  Yılı Karşılaştırma - Satış Tutarı (TL)
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chartsat"></div>
                        </div>
                    </div>
                </div>        
            </div>
            <!-- /.row -->
        </div>
    </div>

	<?php include "footer.php" ?>
	
	<script>
		var tutar = [0,0,0,0,0,0,0,0,0,0,0,0];
		var sayi = [0,0,0,0,0,0,0,0,0,0,0,0];
		
		var sipyil1 = [0,0,0,0,0,0,0,0,0,0,0,0];
		var sipyil2 = [0,0,0,0,0,0,0,0,0,0,0,0];
		
		var satyil1 = [0,0,0,0,0,0,0,0,0,0,0,0];
		var satyil2 = [0,0,0,0,0,0,0,0,0,0,0,0];
	</script>
	<?php 	
		$datas = $database->query("select month(tarih) as ay, sum(toplamtutar) as tutar, count(1) sayi from siparis where year(tarih)=year(curdate()) and durum = 'tamam' group by month(tarih)", [])->fetchAll();
		foreach($datas as $data)
		{
			echo "<script> tutar[" . $data["ay"] . "]  = " . $data["tutar"] . ";</script>";
			echo "<script> sayi[" . $data["ay"] . "]  = " . $data["sayi"] . ";</script>";	
			
			echo "<script> satyil2[" . $data["ay"] . "]  = " . $data["tutar"] . ";</script>";
			echo "<script> sipyil2[" . $data["ay"] . "]  = " . $data["sayi"] . ";</script>";	
		}
		
		$datas = $database->query("select month(tarih) as ay, sum(toplamtutar) as tutar, count(1) sayi from siparis where year(tarih)=year(curdate())-1 and durum = 'tamam' group by month(tarih)", [])->fetchAll();
		foreach($datas as $data)
		{		
			echo "<script> satyil1[" . $data["ay"] . "]  = " . $data["tutar"] . ";</script>";
			echo "<script> sipyil1[" . $data["ay"] . "]  = " . $data["sayi"] . ";</script>";	
		}
	?>
		
	<script src="../js/morris-data.js"></script>
</body>

</html>
