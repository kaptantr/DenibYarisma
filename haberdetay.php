<?php include("header.php");?>
<?php $id = g('id');?>
<?php $sayfa = Sonuc(Sorgu("SELECT * FROM haberler WHERE seo = '$id'"));?>


	

			<section class="banner-blog-sidebar header-three-margin"></section>
			<!--Content Area Start-->
			<div id="content">

				<section class="blog-sidebar-section">
					<div class="container">
						<div class="heading-wrap">
							<h1 class="h1"> BİZDEN</h1>
							<span>Haberler</span>

						</div>
						<div class="row no-bdr">
							<div class="col-xs-12 col-sm-8 col-md-9">
								<div class="row">
									<div class="blog-side-img">
										<figure class="blog-sidebar-admin-img">
											<img alt="" src="assets/images/admin-img-1.png"  title=" ">
										</figure>
									</div>
									<div class="blog-side-main">
										<div class="blog-sidebar-admin-content">
											<h5>
											 <a href="#">
											<?php echo $sayfa->adi;?>
											 </a>
											</h5>
											<span>Ekleyen: <?php echo $ayar->firma_adi; ?>,  <?php echo $sayfa->tarih;?></span>
										</div>
										<div class="blog-sidebar-img-wrapper-1">
											<img src="uploads/haberler/<?php echo $sayfa->resim;?>" title=" " alt="" />
											<p>
												<?php echo $sayfa->aciklama;?>
											</p>
										</div>
										<div class="side-sidebar-blog-media clearfix ">
											<ul class="blog-social-icon-list clearfix">
							    		<li><span>Paylaş :</span></li>
							    		<li><a href="http://www.facebook.com/share.php?u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" class="fb-wrapper"><i class="fa fa-facebook"></i></a></li>
							    		<li><a href="http://twitter.com/home?status=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" class="twitt-wrapper"><i class="fa fa-twitter"></i></a></li>
							    		<li><a href="https://plus.google.com/share?url=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" class="google-wrapper"><i class="fa fa-google-plus"></i></a></li>
							    	</ul>

											
										</div>

									</div>

								</div>

							

						

							</div>
							<div class="col-xs-12 col-sm-4 col-md-3">
								
								
								<div class="sidebar-category recent-news">
									<h5>DİĞER Haberler</h5>

									<ul class="blog-list-sidebar">    
									
									
									
									    <?php 
 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM haberler WHERE durum = 1 ORDER BY id DESC");
 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
 ?>   
										<li>
											<figure> <a href="haber-detay-<?php echo $haberSonuc->seo;?>.html" >  <img src="uploads/haberler/<?php echo $haberSonuc->resim;?>" alt="recent-news" /> </a> </figure>
											<div class="news-recent-content">
												<a href="haber-detay-<?php echo $haberSonuc->seo;?>.html"> 
												<strong><?php echo $haberSonuc->tarih;?></strong>
												<span><?php echo $haberSonuc->adi;?></span>
												</a>
											</div>
										</li>
									   <?php }?>

									</ul>
								</div>
								
								<div class="sidebar-category tags">
									<h5>Etiketler</h5>
									<ul class="tag-list clearfix">
									
									                <?php 
 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM haberler WHERE durum = 1 limit 4");
 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
 ?>   
				           
									
										<li>
											<a href="#"><?php echo $haberSonuc->seo;?></a>
										</li>
										
										
										 <?php }?>
												                <?php 
 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM projeler WHERE durum = 1 limit 4");
 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
 ?>   
				           
									
										<li>
											<a href="#"><?php echo $haberSonuc->seo;?></a>
										</li>
										
										
										 <?php }?>
										
												                <?php 
 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM hizmetler WHERE durum = 1 limit 4");
 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
 ?>   
				           
									
										<li>
											<a href="#"><?php echo $haberSonuc->seo;?></a>
										</li>
										
										
										 <?php }?>
										
										
								
									</ul>
									
									
									</div>

							</div>

						</div>

						<div class="tri-angle pull-right">

							<div class="col-xs-12 triangle-img">
								<img class="blue-triangle" alt="sky-triangel" src="assets/images/sky-blue-triangle.png">
								<img src="assets/svg/triangle.svg" alt="yellow-triangel" class="triangle-svg pos-r svg"/>

							</div>

						</div>
					</div>
				</section>

			</div>
			<!--Content Area End-->

<?php include("footer.php");?>
	