<?php include("header.php");?>

		

 <section class="banner-blog header-three-margin"> </section>
			<!--Content Area Start-->
			<div id="content">
				
				
				<section class="blog-section">
					<div class="container">
				
				
				
				
				
				                         <?php 
 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM haberler WHERE durum = 1 ORDER BY id DESC");
 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
 ?>   
				
				
				<!-- ********************************************** -->		
				
						<div class="row">
	
							<div class="col-xs-3 col-sm-2 col-md-1">
											<figure class="blog-admin-img">
												<img alt="" src="assets/images/admin-img-1.png"  title=" ">
											</figure>
								</div>
								<div class="col-xs-9 col-sm-10 col-md-11">
											
											<div class="blog-admin-content">
												<h5>
											    <a href="#"> 
												<?php echo $haberSonuc->adi;?>
												</a>
												</h5>
												<span><?php echo $ayar->firma_adi; ?>, <?php echo $haberSonuc->tarih;?></span>
											</div>
									
							    </div>
							    
							    <div class="col-xs-12 col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 blog-img-wrapper-1">
							    	<img width="1043px" height="334px" src="uploads/haberler/kucuk/<?php echo $haberSonuc->resim;?>" alt=" " title=" " />
							    	<p> <?php echo substr($haberSonuc->aciklama,0,150);?>  </p>
							    </div>
							    
							    <div class="col-xs-7 col-sm-4 col-sm-offset-1 col-md-3 col-md-offset-1">
							    	<ul class="blog-social-icon-list clearfix">
							    		<li><span>Paylaş :</span></li>
							    		<li><a href="http://www.facebook.com/share.php?u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" class="fb-wrapper"><i class="fa fa-facebook"></i></a></li>
							    		<li><a href="http://twitter.com/home?status=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" class="twitt-wrapper"><i class="fa fa-twitter"></i></a></li>
							    		<li><a href="https://plus.google.com/share?url=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" class="google-wrapper"><i class="fa fa-google-plus"></i></a></li>
							    	</ul>
							    </div>
							    
							    <div class="col-xs-5 col-sm-3 col-sm-offset-4 col-md-2 col-md-offset-6 blog-read-btn-wrapper"><a href="haber-detay-<?php echo $haberSonuc->seo;?>.html" class="blog-read-btn">Devamı</a> </div>
							
							
						</div>
						
						<!-- ********************************************** -->
				
						       <?php }?>
						
					</div>
				</section>
				
				<div class="container blog-paging">
				
							
							<div class="row pull-right">
									<div class="col-xs-12 triangle-img">
										<img class="blue-triangle" alt="sky-triangel" src="assets/images/sky-blue-triangle.png">
										<img src="assets/svg/triangle.svg" alt="yellow-triangel" class="triangle-svg pos-r svg"/>

									</div>

								</div>
						</div>
						

			</div>
			<!--Content Area End-->

<?php include("footer.php");?>
	