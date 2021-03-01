

<?php 
	include "loginc.php";
?>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0">		
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="navbar-brand" src="../images/logomini.png" alt=""/>                
                <a class="navbar-brand" href="index.php">Kahvaltım</a>						
            </div>
					
					
            <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
				  <li><a href="#about"><?php 
					$data = $database->get("kullanici","*", [
						"kullaniciid" => $_SESSION['kullaniciid']]);
						
					if ($data)	
						echo "<img height='30' width='30' src='data:image/jpeg;base64," . base64_encode( $data['resim'] ) . "' />";
				
					
				?></a></li>
				  <li><a href="#contact"><?php echo $_SESSION["adisoyadi"]; ?></a></li>
				</ul>
			</div>
			
			
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Ana Sayfa</a>
                        </li>
                        <li>
                            <a href="siparis.php?durum=siparis"><i class="fa fa-dashboard fa-fw"></i>Gelen Siparişler</a>
                        </li>                        											
						<li>
                            <a href="siparis.php?durum=tamam"><i class="fa fa-dashboard fa-fw"></i>Tamamlanan Siparişler</a>
                        </li>             
						<li>
                            <a href="satisanalizi.php"><i class="fa fa-dashboard fa-fw"></i>Satış Analizi</a>
                        </li>   						
						<li>
                            <a href="logout.php"><i class="fa fa-dashboard fa-fw"></i>Çıkış</a>
                        </li>
                    </ul>
				  
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
		
    </nav>
