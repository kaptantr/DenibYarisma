<?php include("header.php");?>



		

			<section class="banner-about_us header-three-margin"></section>
			<!--Content Area Start-->
			<div id="content">
	
								<section class="team-wrap">
					<div class="container">

						<div class="heading-wrap text-center">
							<h2> Çalışma </h2>
							<span>Ekibimiz</span>

						</div>
						<div class="row">
						
						
							                         <?php 
 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM markalar WHERE durum = 1 ORDER BY id DESC");
 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
 ?>   
						
						
							<div class="col-xs-12 col-sm-3 member-wrap">
								<figure>
									<img width="236px" height="410px" src="uploads/markalar/<?php echo $haberSonuc->resim;?>" alt="team-member">
								</figure>
								<div class="member-contact-info text-center">
									<span class="name-label"> <strong><?php echo $haberSonuc->adi;?></strong> <span><?php echo $haberSonuc->mevki;?></span> </span>
									<div class="media-wrap">
										<ul class="member-media clearfix">
											<li>
												<a href="<?php echo $haberSonuc->facebook;?>"><i class="fa fa-facebook"></i></a>
											</li>
											<li>
												<a href="<?php echo $haberSonuc->pinterest;?>"><i class="fa fa-instagram"></i></a>
											</li>
											<li>
												<a href="<?php echo $haberSonuc->twitter;?>"><i class="fa fa-twitter"></i></a>
											</li>
										</ul>
									</div>

								</div>

							</div>
      <?php }?>
					

						</div>

					</div>

				</section>

			</div>
			<!--Content Area End-->
<br>
<?php include("footer.php");?>
	