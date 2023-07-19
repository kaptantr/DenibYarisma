<?php include("header.php");?>

		

 

			<section class="banner-service_2 header-three-margin"></section>
			<!--Content Area Start-->
			<div id="content">
				<section class="service_two-page">
					<div class="container">
						<div class="heading-wrap top-one">
							<h1 class="h1"> HİZMETLER </h1>
							

						</div>
						
						<div class="row service_2_row">
						
						
						
						
							                         <?php 
 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM hizmetler WHERE durum = 1 ORDER BY id DESC");
 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
 ?>   
				  
						
						
						
							<div class="col-xs-12 col-sm-6 service_2i">
								<figure>  <img src="uploads/hizmetler/<?php echo $haberSonuc->resim;?>" alt="services" /></figure>
								<div class="service-two_content">
									<h6><?php echo $haberSonuc->adi;?></h6>
									<p>  <?php echo substr($haberSonuc->aciklama,0,250);?> 



</p>
<a href="hizmet-detay-<?php echo $haberSonuc->seo;?>.html" class="btn trans-btn service-btn ">Devamı</a>
								</div>
								
								
								
							</div>
				
				
				
				
				
				       <?php }?>
				
				
				
				
				
				
				
				
				
							
							
						</div>
		
						
						

					</div>
				</section>
				
				
				
			
				<section class="clients-wrap">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 heading-wrap">
								<h2> MÜŞTERİ </h2>
								<span>Yorumları</span>

							</div>

							<div class="col-xs-12 owl-main-wrap">
								<div id="owl-slider" class="owl-carousel">
									
									
									
			                         <?php 
 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM duyurular WHERE durum = 1 ORDER BY id DESC");
 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
 ?>   
				 
									
									
									
									
									
									
									
									
									
								
									<div class="item1 orange-quote">
										<?php echo $haberSonuc->aciklama;?>

										<div class="profile-wrap clearfix">
											<figure>
												<img src="uploads/duyurular/<?php echo $haberSonuc->resim;?>" alt="">
											</figure>
											<div class="figcaption">
												<strong><?php echo $haberSonuc->adi;?></strong><span><?php echo $haberSonuc->ingadi;?></span>
											</div>

										</div>
									</div>
									
								
									
									
									
									
									
									          <?php }?>
									
									
									

								</div>
							</div>

						</div>
					</div>

				</section>

			</div>
			<!--Content Area End-->


<?php include("footer.php");?>
	