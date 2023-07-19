<?php include "header.php";?>
	<style>
		.tp-mask-wrap .tp-caption a h1 {
			color: #ddd;
			font-size: 20px;
			line-height: 30px;			
		}		
		.tp-mask-wrap .tp-caption.read_more_banner a {
			background-color: #00000055;
			float: left;
			padding: 10px;
			white-space: normal;
			top: 100px;
			height: 200px;
			position: relative;
		}		
		.tp-mask-wrap {
			position: absolute;
			overflow: auto;
			transform: initial;
			height: initial;
			width: auto;
			margin-top: 120px;
			height: 200px !important;
		}
		.tp-bgimg.defaultimg {
			width: auto !important;
			height: 700px !important;
			background-size: contain !important;
			background-position: left top !important;
		}
	</style>	
    <!--slider Section Start Here -->
    <section class="example top-space">
        <article class="content">

            <!--<div id="rev_slider_34_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery34" 
				style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">

                <div id="rev_slider_34_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
                    <ul>

                        <?php
                            $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM slider WHERE durum = 1 ORDER BY id DESC");
                            while ($haberSonuc = mysqli_fetch_object($haberSorgu)) {
                        ?>
							<li data-index="rs-129" data-transition="parallaxvertical" data-slotamount="default" data-easein="default" 
								data-easeout="default" data-masterspeed="default" data-thumb="uploads/slider/<?php echo $haberSonuc->resim; ?>" 
								data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" 
								data-title="" data-description="">
							  
								<img src="uploads/slider/<?php echo $haberSonuc->resim; ?>" alt="" data-bgposition="center center"
									data-bgfit="contain" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina="" />
								
							</li>
                        <?php }?>

                    </ul>
                    <div class="tp-bannertimer tp-bottom" style="height: 5px; background-color: rgba(166, 216, 236, 1.00);"></div>
                </div>
            </div>-->

			<div id="main-slider" class="flexslider" style="padding:0;margin:0px;background:#fff;position:relative;zoom:1;overflow:hidden;">
                <ul class="slides">
                    
					<?php
						$haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM slider WHERE durum = 1 ORDER BY id ASC");
						while ($haberSonuc = mysqli_fetch_object($haberSorgu)) { ?>
						<li>
						<?php if($haberSonuc->adi == 'Video') { ?>
					
							<img class="vidyard-player-embed" src="<?php echo $haberSonuc->resim; ?>" 
								data-uuid="<?php preg_match('/\.com\/(.*)\.jpg/', $haberSonuc->resim, $array); echo $array[1] ?? ''; ?>" 
								data-v="4" data-type="inline" data-muted="0" data-autoplay="1" 
								data-disable_redirect="0" data-no_html5_fullscreen="0" data-loop="1" data-hide_html5_playlist="1" 
								data-hidden_controls="1" data-hide_playlist="1" data-height="600px" data-viral_sharing="0" />
						
						<?php } else { ?>
							  
								<img src="uploads/slider/<?php echo $haberSonuc->resim; ?>" alt="" />									
							
						<?php }?>
						</li>
					<?php }?>
						
                </ul>
            </div>
			
        </article>
    </section>
    <!--slider Section End Here -->

    <!--Content Area Start-->
    <div id="content">

        <?php /*<section class="news-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 heading-wrap">
                        <img src="assets/images/denib-afis-2-02.png" alt="" />		
                    </div>
                </div>                
            </div>
        </section>*/ ?>
		
		<section class="news-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 heading-wrap">
                        <h2> DENİB </h2>
                        <span>Haberler</span>

                    </div>

                </div>

                <div class="row">

				 <?php
					$haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM haberler WHERE durum = 1 ORDER BY tarih DESC LIMIT 10 ");
					while ($haberSonuc = mysqli_fetch_object($haberSorgu)) {
				?>

                    <div class="col-xs-12 col-sm-6 blog-news-wrap">
                        <div class="blog-comment-info">
                            <ul>
                                <li>
                                    <strong><?php echo substr($haberSonuc->tarih, 0, 2); ?></strong>
                                    <?php echo substr($haberSonuc->tarih, 2, 12); ?>
                                </li>
                                <li>
                                    <span aria-hidden="true" class="icon-eye"></span>
                                    <?php echo substr($haberSonuc->tarih, 15, 100); ?>
                                </li>
                                <li>
                                    <span aria-hidden="true" class="icon-bubbles"></span>
                                Haberler Denib
                                </li>

                            </ul>

                        </div>
                        <div class="blog-news">
                            <figure>
                                <img src="uploads/haberler/<?php echo $haberSonuc->resim; ?>" alt="news-blog">
                            </figure>
                            <div class="blog-caption">
                                <h4>
                                <a href="haber-detay-<?php echo $haberSonuc->seo; ?>.html">
                            <?php echo $haberSonuc->adi; ?>
                                </a>
                                </h4>
                                <p>
                                    <?php echo substr($haberSonuc->aciklama, 0, 250); ?>
                                </p>
                                <a href="haber-detay-<?php echo $haberSonuc->seo; ?>.html" class="btn more-btn"> Detay</a>
                            </div>

                        </div>

                    </div>

                      <?php }?>

                </div>
            </div>
        </section>


    </div>
    <!--Content Area End-->

	<!--<section class="example top-space">
        <article class="content">			
        <video autoplay muted loop id="denibvideo">
			  <source src="uploads/video/Denib_1800.mp4" type="video/mp4">
			  Your browser does not support HTML5 video.
			</video>

        </article>
    </section>-->
	
<br>
<?php include "footer.php";?>
