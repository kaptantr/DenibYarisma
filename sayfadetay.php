<?php include("header.php");?>
<?php $id = g('id');?>
<?php $sayfa = Sonuc(Sorgu("SELECT * FROM sayfalar WHERE seo = '$id'"));?>


		

			<section class="banner-about_us header-three-margin"></section>
			<!--Content Area Start-->
			<div id="content">
	
				<!-- our view section start here -->
				<section class="our_views">
					<div class="container">
						<div class="row">

							<div class=" col-xs-12 heading-wrap top-one">
								<h2> Kurumsal </h2>
								<span><?php echo $sayfa->adi;?></span>

							</div>

							<div class="col-xs-12 view-main">
								<div class="row">
									<div class="col-xs-12 col-sm-3 view-img">
										<img src="uploads/sayfalar/<?php echo $sayfa->resim;?>" alt="view" />
									</div>
									<div class="col-xs-12 col-sm-9">
										<div class="right-content">
											<h6><?php echo $sayfa->adi;?></h6>
											<p>
												<?php echo $sayfa->aciklama;?>
											</p>
										</div>

									</div>

								</div>

							</div>

							<div class="col-xs-12 view-main">
								<div class="row">

									<div class="col-xs-12 col-sm-9 ">
									

									</div>
									

								</div>

							</div>

						</div>

						<div class="row">
							<div class="col-xs-12 triangle-img">
								<img src="assets/images/sky-blue-triangle.png" alt="sky-triangel" class="blue-triangle"/>
							
								<img src="assets/svg/triangle.svg" alt="yellow-triangel" class="triangle-svg  svg"/>

							</div>

						</div>

					</div>

				</section>

                <!-- clients-about section start here -->
				<section class="clients-about">
						<div class="container">
								<div class="row">
									<div class="col-xs-12 heading-wrap top-one">
										<h2> Referanslarımız </h2>

									</div>
									</div>

									<div class="clients-info text-center">
										<div id="owl-slider-clients" class="owl-carousel">









												                         <?php
 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM urun_kategori WHERE durum = 1 ORDER BY id DESC");
 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
 ?>
										<div class="item1">
											<div class="tp-img">
												<a href="#">
												<img src="uploads/urunkategori/large/<?php echo $haberSonuc->resim;?>" alt="" />
												</a>
											</div>

										</div>



										  <?php }?>

























									</div>

								</div>


															<div class="row pull-right">
									<div class="col-xs-12 triangle-img">
										<img src="assets/images/sky-blue-triangle.png" alt="sky-triangel" class="blue-triangle"/>
										<img src="assets/svg/triangle.svg" alt="yellow-triangel" class="triangle-svg svg"/>

									</div>

								</div>

							</div>
					</section>

			</div>
			<!--Content Area End-->

<?php include("footer.php");?>
	