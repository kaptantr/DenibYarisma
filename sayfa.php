<?php
    include("header.php");

    if(!isset($_GET['sayfaadi']) || empty($_GET['sayfaadi'])) {
        header("Location:anasayfa.html");
    }

    $sayfa = Sonuc(Sorgu("SELECT * FROM sayfalar WHERE ingadi = 'sayfa-" . $_GET['sayfaadi'] .".html'"));

?>

			<section class="banner-about_us header-three-margin"></section>
			<!--Content Area Start-->
			<div id="content">
	
				<!-- our view section start here -->
				<section class="our_views">
					<div class="container">
						<div class="row">

							<div class=" col-xs-12 heading-wrap top-one">
								<h2><?php echo $sayfa->sayfaadi;?></h2>
							</div>

							<div class="col-xs-12 view-main">
								<div class="row">
									<div class="col-xs-12 col-sm-3 view-img">
					                <?php if(!empty($sayfa->resim)) : ?>
										<img src="uploads/sayfalar/<?= $sayfa->resim; ?>" alt="Sayfa Resmi" />
                                    <?php endif; ?>
									</div>
									<div class="col-xs-12 col-sm-9">
										<div class="right-content">
											<p><?php echo $sayfa->aciklama; ?></p>
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

			</div>
			<!--Content Area End-->

<?php include("footer.php");?>
	