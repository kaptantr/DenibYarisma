<?php define("GUVENLIK", true);?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?php //include("system/ayar.php"); ?>
        <?php include "system/fonksiyon.php";?>
        <title><?php echo $ayar->site_title; ?></title>
        <meta name="keywords" content="<?php echo $ayar->site_meta; ?>" />
        <meta name="Title" content="<?php echo $ayar->firma_adi; ?>" />
        <meta name="page-topic" content="<?php echo $ayar->site_title; ?>" />

        <link rel="shortcut icon" href="assets/images/favicon_.ico">

        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,700,800,900%7COpen+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic%7CLora:400,400italic,700,700italic%7CRoboto+Slab:400,700,300%7CKarla:400,400italic,700,700italic'>
        <link rel="stylesheet" href="assets/css/bootstrap.css" media="screen">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="assets/css/simple-line-icons.css" media="screen">
        <link rel="stylesheet" href="assets/css/owl.carousel.css" media="screen">
        <link rel="stylesheet" href="assets/css/global.css" media="screen">
        <link rel="stylesheet" href="assets/css/settings.css" media="screen">
        <link rel="stylesheet" href="assets/css/layers.css" media="screen">
        <link rel="stylesheet" href="assets/css/style.css" media="screen">
        <link rel="stylesheet" href="assets/css/responsive.css" media="screen">
        <link rel="stylesheet" href="assets/css/skin.txt" media="screen">
        <link rel="stylesheet" href="assets/css/sweet-alert.min.css" media="screen">
		<link rel="stylesheet" href="assets/css/toastr.min.css" media="screen">
		<link rel="stylesheet" href="assets/css/flexslider.min.css" media="screen">

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <![endif]-->
		
		<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
    </head>
	<body>
        <div class="loader">
          <div class="sk-folding-cube">
          <div class="sk-cube1 sk-cube"></div>
          <div class="sk-cube2 sk-cube"></div>
          <div class="sk-cube4 sk-cube"></div>
          <div class="sk-cube3 sk-cube"></div>
        </div>
        </div><!-- loader -->
        <!--Page Wrapper Start-->
        <div id="wrapper">
            <!--Header Section Start-->
            <header id="header" class="header-one">
                <div class="primary_header">
                    <div class="container">
                        <div class="row" style="margin-right: -5vh;">
                            <div class="col-xs-12 col-sm-9 col-md-10">
                                <nav class="navbar navbar-default">

                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                            <span class="sr-only">MENÜ</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="index.html">ANASAYFA </a></li>

                                            <?php
                                                $menuler = [
                                                    'denib' => 'DENİB',
                                                    'yarisma' => 'YARIŞMA',
                                                    'basvuru' => 'BAŞVURU',
                                                    'trend' => 'TREND',
                                                    'sss' => 'S.S.S'
                                                ];

                                                foreach ($menuler as $key => $menu):
                                                ?>

                                                <li>
                                                    <a href="#"> <?=$menu?> </a>
                                                    <?php $SayfaSorgu = Sorgu("SELECT * FROM sayfalar WHERE ingaciklama='" . $key . "' AND durum=1 ORDER BY menusirasi ASC");?>

                                                    <?php if (say($SayfaSorgu) > 0): ?>
                                                    <ul class="dropdown">
                                                    <?php endif;?>

                                                    <?php while ($SayfaSonuc = Sonuc($SayfaSorgu)): ?>
                                                        <li><a href="<?=$SayfaSonuc->ingadi?>"> <?=$SayfaSonuc->menuadi?> </a></li>
                                                    <?php endwhile;?>

                                                    <?php if (say($SayfaSorgu) > 0): ?>
                                                    </ul>
                                                    <?php endif;?>
                                                </li>

                                                <?php endforeach;?>

                                            <li><a href="iletisim.html"> İLETİŞİM </a></li>
                                        </ul>
                                    </div><!-- /.navbar-collapse -->

                                </nav>

                            </div>
                            <?php /*<div class="col-xs-12 col-sm-3 col-md-2">
                                <a href="basvuru.html" class="sign-up_btn" style="padding-left: 15px;padding-top: 15px;height: 50px;">
                                    <i class="fa fa-sign-in" style="font-size: 24px"></i>
                                    <span style="margin-left: 5px; vertical-align: super;">BAŞVURU YAP</span>
                                </a>
                            </div>*/ ?>
                        </div>

                    </div>

                </div>

                <div class="main_header">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-lg-2">
                                <a href="index.html" class="logo-one" style="padding: 10px 5px">
                                    <img width="164px" height="34px" src="uploads/logo/<?php echo $ayar->firma_logo; ?>" alt="logo" />
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-8  col-lg-6  pull-right contact-wrap-header">

                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Header Section End-->
