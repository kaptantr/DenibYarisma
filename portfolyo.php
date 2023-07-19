<?php include("header.php");?>

		
<section class="banner-news header-three-margin"></section>
			<!--Content Area Start-->
			<div id="content">
                   <?php 
 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM projeler WHERE durum = 1 ORDER BY id DESC");
 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
 ?>   
				        
			<section class="news-wrap-box news-side-box">
					<div class="container">
						
						<div class="row extra-row">
							<div class="col-xs-12 col-sm-2">
								<span class="triangle-date"><?php echo $haberSonuc->ingadi;?></span>
							</div>
							<div class="col-xs-12 col-sm-4 width-full">
								<img src="uploads/projeler/<?php echo $haberSonuc->resim;?>" alt="news-pics">
								<ul class="images-list clearfix width-full">
								
								
								
								
								<?php $projid = $haberSonuc->id;
$gresimler=mysqli_query($GLOBALS['baglan'], "SELECT * FROM proje_resim WHERE resim_id = '$projid'");
while($resimlerr=mysqli_fetch_object($gresimler)){
?>
									<li>
										<img src="uploads/projeler/diger/large/<?php echo $resimlerr['resim']; ?>" alt="earth">
									</li>
								<?php } ?>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-6 news-detaile">
								<h6><?php echo $haberSonuc->adi;?></h6>
								<p>
									<?php echo $haberSonuc->aciklama;?>
								</p>
								
								<div class="block-quote">
									
									<p>
									Firma Adı: <?php echo $haberSonuc->firma;?><br>
									Uygulama: <?php echo $haberSonuc->deger;?><br>
									Yapım Tarihi: <?php echo $haberSonuc->ingadi;?><br>
									Proje Adresi: <?php echo $haberSonuc->ingaciklama;?><br>
									</p>
								</div>
								
							</div>

						</div>
					</div>
				</section>
				
				   
				                <?php }?>
				            
		
						
						
				
				
				
			

			</div>
			<!--Content Area End-->

<?php include("footer.php");?>
	