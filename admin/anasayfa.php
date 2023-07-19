<?php
    define("GUVENLIK",true);

    //include("../system/ayar.php");
    include("../system/fonksiyon.php");
    oturumkontrolana();

    $mesajSorgu = Sorgu("SELECT * FROM iletisim");
    $mesajSonuc = Sonuc($mesajSorgu);

    $rezSorgu = Sorgu("SELECT * FROM rez");
    $ezSonuc = Sonuc($rezSorgu);

    //$BasvuruSorgu = Sorgu("SELECT * FROM ik");
    //$BasvuruSonuc = Sonuc($BasvuruSorgu);


    if(isset($_GET['cikis'])){
    	session_destroy();
    	header("Location:anasayfa.html");
    }

?>
<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8">
    <title>Yönetim Paneli</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
     <!-- fileUploads -->
     <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-fileupload.min.css" />
      <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
     <link href="dist/js/iCheck/skins/square/red.css" rel="stylesheet">
     <link href="dist/js/iCheck/skins/square/green.css" rel="stylesheet">
    <!-- Javascript -->
       
    <link rel="stylesheet" href="assets/css/supersized.css">

    <script src="assets/js/jquery-1.8.2.min.js"></script>
    <script src="assets/js/supersized.3.2.7.min.js"></script>
    <script src="assets/js/supersized-init.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="layout-boxed skin-blued skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="anasayfa.html" class="logo"><b>Yönetim</b>Paneli</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"><?php echo say($mesajSorgu);?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"><?php echo say($mesajSorgu);?> Başvuru Var</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                     <?php $MesajSorgu = Sorgu("SELECT * FROM iletisim");
					 while($MesajSonuc = Sonuc($MesajSorgu)){?>
                      <li><!-- start message -->
                        <a href="basvuru-oku.html?id=<?php echo $MesajSonuc->id; ?>">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            <?php echo $MesajSonuc->isim; ?>
                            <small><i class="fa fa-clock-o"></i> <?php echo $MesajSonuc->tarih; ?></small>
                          </h4>
                          <p><?php echo kisalt($MesajSonuc->mesaj,30); ?></p>
                        </a>
                      </li><!-- end message -->
                      <?php }?>
                    </ul>
                  </li>
                  <li class="footer"><a href="basvurular.html">Tüm Başvuruları Gör</a></li>
                </ul>
              </li>
		
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="site-ayar.html" class="dropdown-toggle">
                  <i class="fa fa-wrench"></i>
                </a>
              </li>
              <li class="dropdown notifications-menu">
            <a href="?cikis=1" class="dropdown-toggle">
              <i class="fa fa-sign-out"></i>
              <span class="label label-danger">Çıkış</span>
            </a>
          </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a target="_blank" href="../anasayfa.html" class="dropdown-toggle">
                  <i class="fa fa-hand-o-right"></i>
                  <span class="hidden-xs">Site Önizleme</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->

            <ul class="sidebar-menu">
    		  <div class="user-panel">
                <div class="pull-left image">
                    <img src="../uploads/logo/logo.png" class="img-circle" alt="Denib Logo">
                </div>
                <div class="pull-left info">
                      <p><?php echo $ayar->firma_adi; ?></p>
                      <a href="yonetici-listele.html"><i class="fa fa-circle text-success"></i> Çevrimiçi</a>
                </div>
              </div>
                <li class="header"></li>
                <li class="treeview">
                  <a href="anasayfa.html">
                    <i class="fa fa-home"></i>
                    <span>Anasayfa</span>
                  </a>
                </li>


				<li class="treeview<?= isset($_GET['kategori']) &&  $_GET['kategori']=='denib' ? ' active' : '' ?>">
                  <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Denib Menüsü</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-ekle.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-ekle.html?kategori=denib"><i class="fa fa-circle-o"></i> Sayfa Ekle</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-listele.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-listele.html?kategori=denib"><i class="fa fa-circle-o"></i> Sayfa Listele</a>
                    </li>
                  </ul>
                </li>
				
				
                <li class="treeview<?= isset($_GET['kategori']) &&  $_GET['kategori']=='yarisma' ? ' active' : '' ?>">
                  <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Yarışma Menüsü</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-ekle.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-ekle.html?kategori=yarisma"><i class="fa fa-circle-o"></i> Sayfa Ekle</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-listele.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-listele.html?kategori=yarisma"><i class="fa fa-circle-o"></i> Sayfa Listele</a>
                    </li>
                  </ul>
                </li>



                <li class="treeview<?= isset($_GET['kategori']) &&  $_GET['kategori']=='basvuru' ? ' active' : '' ?>">
                  <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Başvuru Menüsü</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-ekle.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-ekle.html?kategori=basvuru"><i class="fa fa-circle-o"></i> Sayfa Ekle</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-listele.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-listele.html?kategori=basvuru"><i class="fa fa-circle-o"></i> Sayfa Listele</a>
                    </li>
                  </ul>
                </li>




                <li class="treeview<?= isset($_GET['kategori']) &&  $_GET['kategori']=='trend' ? '  active' : '' ?>">
                  <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Trend Menüsü</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-ekle.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-ekle.html?kategori=trend"><i class="fa fa-circle-o"></i> Sayfa Ekle</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-listele.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-listele.html?kategori=trend"><i class="fa fa-circle-o"></i> Sayfa Listele</a>
                    </li>
                  </ul>
                </li>
				
				
				<li class="treeview<?= isset($_GET['kategori']) &&  $_GET['kategori']=='sss' ? '  active' : '' ?>">
                  <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>S.S.S Menüsü</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-ekle.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-ekle.html?kategori=sss"><i class="fa fa-circle-o"></i> Sayfa Ekle</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-listele.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-listele.html?kategori=sss"><i class="fa fa-circle-o"></i> Sayfa Listele</a>
                    </li>
                  </ul>
                </li>




                <?php /*<li class="treeview<?= isset($_GET['kategori']) &&  $_GET['kategori']=='basin' ? '  active' : '' ?>">
                  <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Basın Menüsü</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-ekle.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="sayfa-ekle.html?kategori=basin"><i class="fa fa-circle-o"></i> Sayfa Ekle</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'sayfa-listele.html')!==FALSE  ? ' active' : '' ?>>">
                    	<a href="sayfa-listele.html?kategori=basin"><i class="fa fa-circle-o"></i> Sayfa Listele</a>
                    </li>
                  </ul>
                </li>*/ ?>




                 <?php /*<li class="treeview<?= stripos($_SERVER['REQUEST_URI'], 'duyuru-')!==FALSE  ? ' active' : '' ?>>">
                  <a href="#">
                    <i class="fa fa-bullhorn"></i> <span>Duyuru Yönetimi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'duyuru-ekle.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="duyuru-ekle.html"><i class="fa fa-circle-o"></i> Duyuru Ekle</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'duyuru-listele.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="duyuru-listele.html"><i class="fa fa-circle-o"></i> Duyuru Listesi</a>
                    </li>
                  </ul>
                </li>*/ ?>
				
				
				
				<li class="treeview<?= stripos($_SERVER['REQUEST_URI'], 'haber-')!==FALSE  ? ' active' : '' ?>>">
                  <a href="#">
                    <i class="fa fa-bullhorn"></i> <span>Haber Yönetimi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'haber-ekle.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="haber-ekle.html"><i class="fa fa-circle-o"></i> Haber Ekle</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'haber-listele.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="haber-listele.html"><i class="fa fa-circle-o"></i> Haber Listesi</a>
                    </li>
                  </ul>
                </li>




                <li class="treeview<?= stripos($_SERVER['REQUEST_URI'], 'slider-')!==FALSE  ? ' active' : '' ?>">
                  <a href="#">
                    <i class="fa fa-picture-o"></i> <span>Slider Yönetimi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">

                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'slider-ekle.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="slider-ekle.html"><i class="fa fa-circle-o"></i> Slider Ekle</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'slider-listele.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="slider-listele.html"><i class="fa fa-circle-o"></i> Slider Listesi</a>
                    </li>
                  </ul>
                </li>




                 <li class="<?= stripos($_SERVER['REQUEST_URI'], 'basvurular.html')!==FALSE  ? ' active' : '' ?>">
                  <a href="basvurular.html">
                    <i class="fa fa-envelope-o"></i> <span>Başvurular</span>
                  </a>
                </li>

				<li class="<?= stripos($_SERVER['REQUEST_URI'], 'degerlendirmeler.html')!==FALSE  ? ' active' : '' ?>">
                  <a href="degerlendirmeler.html">
                    <i class="fa fa-envelope-o"></i> <span>Değerlendirmeler</span>
                  </a>
                </li>

				<li class="<?= stripos($_SERVER['REQUEST_URI'], 'bilgi_formlari.html')!==FALSE  ? ' active' : '' ?>">
                  <a href="bilgi_formlari.html">
                    <i class="fa fa-envelope-o"></i> <span>Gönderilen Bilgi Formları</span>
                  </a>
                </li>
                <!---------------------------------------------------------------------------->



                <li class="treeview ">
                  <a href="#">
                    <i class="fa fa-cogs"></i> <span>Site Yönetimi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'site-ayar.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="site-ayar.html"><i class="fa fa-circle-o"></i> Site Ayarları</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'yonetici-ekle.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="yonetici-ekle.html"><i class="fa fa-circle-o"></i> Yeni Yönetici Ekleme</a>
                    </li>
                    <li class="<?= stripos($_SERVER['REQUEST_URI'], 'yonetici-listele.html')!==FALSE  ? ' active' : '' ?>">
                    	<a href="yonetici-listele.html"><i class="fa fa-circle-o"></i> Yönetici Listesi</a></li>
                  </ul>
                </li>
            <!---------------------------------------------------------------------------->
            <li>
              <a href="?cikis=1">
                <i class="fa fa-sign-out"></i> <span>Oturumu Kapat</span>
              </a>
            </li>
            <!---------------------------------------------------------------------------->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <?php 
	if(isset($_GET['sayfa'])){
		$s = $_GET['sayfa'];
		switch($s){
			
		case 'anasayfa';
		require_once("sayfalar/dashboard.php");
		break;
		
		case 'sayfa-ekle';
		require_once("sayfalar/sayfa_ekle.php");
		break;
		
		case 'sayfa-listele';
		require_once("sayfalar/sayfa_listele.php");
		break;
			
		case 'duyuru-ekle';
		require_once("sayfalar/duyuru_ekle.php");
		break;
		
		case 'duyuru-listele';
		require_once("sayfalar/duyuru_listele.php");
		break;		
		
		case 'galeri-kategori-ekle';
		require_once("sayfalar/galeri_kategori_ekle.php");
		break;
		
		case 'galeri-kategori-listele';
		require_once("sayfalar/galeri_kategori_listele.php");
		break;
				
		case 'galeri-ekle';
		require_once("sayfalar/galeri_ekle.php");
		break;
		
		case 'galeri-listele';
		require_once("sayfalar/galeri_listele.php");
		break;		
		
		case 'slider-ekle';
		require_once("sayfalar/slider_ekle.php");
		break;
		
		case 'slider-listele';
		require_once("sayfalar/slider_listele.php");
		break;		
				
		case 'site-ayar';
		require_once("sayfalar/site_ayar.php");
		break;
		
		case 'basvurular';
		require_once("sayfalar/basvurular.php");
		break;
		
		case 'basvuru-oku';
		require_once("sayfalar/basvuru_oku.php");
		break;

		case 'degerlendirmeler';
		require_once("sayfalar/degerlendirmeler.php");
		break;

		case 'degerlendirme-oku';
		require_once("sayfalar/degerlendirme_oku.php");
		break;

		case 'bilgi_formlari';
		require_once("sayfalar/bilgi_formlari.php");
		break;
		
		case 'bilgi_formu-oku';
		require_once("sayfalar/bilgi_formu_oku.php");
		break;						
				
		case 'yonetici-ekle';
		require_once("sayfalar/yonetici_ekle.php");
		break;
		
		case 'yonetici-listele';
		require_once("sayfalar/yonetici_listele.php");
		break;
		
		case 'haber-ekle';
		require_once("sayfalar/haber_ekle.php");
		break;
		
		case 'haber-listele';
		require_once("sayfalar/haber_listele.php");
		break;			
					
		default:
		require_once("sayfalar/dashboard.php");
		}
	}else{
	require_once("sayfalar/dashboard.php");
}
?> 
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>
        <strong>Webtorn Bilişim @ Copyright 2021</strong>
      </footer>
    </div><!-- ./wrapper -->
    <!--file upload-->
	<script type="text/javascript" src="dist/js/bootstrap-fileupload.min.js"></script>
    <!--icheck -->
	<script src="dist/js/iCheck/jquery.icheck.js"></script>
	<script src="dist/js/icheck-init.js"></script>
	<script src="kategori.js" type="text/javascript"></script>
  </body>
</html>