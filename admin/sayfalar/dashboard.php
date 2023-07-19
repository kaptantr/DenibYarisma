<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null; ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= ucwords(mb_convert_case($_SESSION['yonetici_ad_soyad'], MB_CASE_LOWER, "UTF-8")); ?>
            <small>Hoşgeldin | Site Yönetim Paneli</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
             <?php $bilgi = Sorgu("SELECT * FROM yonetici");
                $mevcut = say($bilgi);?>
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $mevcut; ?></h3>
                  <p>Yöneticiler</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="yonetici-listele.html" class="small-box-footer">Yönetici Listesi <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <?php $bilgi = Sorgu("SELECT * FROM sayfalar WHERE ingaciklama='denib'");
                $mevcut = say($bilgi);?>
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $mevcut; ?></h3>
                  <p>Denib Menüsü</p>
                </div>
                <div class="icon">
                  <i class="fa fa-edit"></i>
                </div>
                <a href="sayfa-listele.html?kategori=denib" class="small-box-footer">Sayfa Listesi <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <?php $bilgi = Sorgu("SELECT * FROM sayfalar WHERE ingaciklama='yarisma'");
                $mevcut = say($bilgi);?>
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $mevcut; ?></h3>
                  <p>Yarışma Menüsü</p>
                </div>
                <div class="icon">
                  <i class="fa fa-edit"></i>
                </div>
                <a href="sayfa-listele.html?kategori=yarisma" class="small-box-footer">Sayfa Listesi <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <?php $bilgi = Sorgu("SELECT * FROM sayfalar WHERE ingaciklama='basvuru'");
                $mevcut = say($bilgi);?>
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $mevcut; ?></h3>
                  <p>Başvuru Menüsü</p>
                </div>
                <div class="icon">
                  <i class="fa fa-bookmark"></i>
                </div>
                <a href="sayfa-listele.html?kategori=basvuru" class="small-box-footer">Sayfa Listesi <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <?php $bilgi = Sorgu("SELECT * FROM sayfalar WHERE ingaciklama='sss'");
                $mevcut = say($bilgi);?>
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $mevcut; ?></h3>
                  <p>S.S.S Menüsü</p>
                </div>
                <div class="icon">
                  <i class="fa fa-bullhorn"></i>
                </div>
                <a href="sayfa-listele.html?kategori=sss" class="small-box-footer">Sayfa Listesi <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <?php $bilgi = Sorgu("SELECT * FROM slider");
                $mevcut = say($bilgi);?>
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $mevcut; ?></h3>
                  <p>Slider Resmi</p>
                </div>
                <div class="icon">
                  <i class="fa fa-tasks"></i>
                </div>
                <a href="slider-listele.html" class="small-box-footer">Slider Listesi <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
             <?php $bilgi = Sorgu("SELECT * FROM basvurular");
                $mevcut = say($bilgi);?>
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $mevcut; ?></h3>
                  <p>Başvuru Sayısı</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="basvurular.html" class="small-box-footer">Başvurular Listesi <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
             <?php $bilgi = Sorgu("SELECT * FROM bilgi_formlari");
                $mevcut = say($bilgi);?>
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $mevcut; ?></h3>
                  <p>Bilgi Form Sayısı</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="bilgi_formlari.html" class="small-box-footer">Bilgi Form Listesi <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
             <?php $bilgi = Sorgu("SELECT * FROM haberler");
                $mevcut = say($bilgi);?>
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $mevcut; ?></h3>
                  <p>Haber Sayısı</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="haber_listele.html" class="small-box-footer">Haber Listesi <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
              <!-- Main row -->

        </section><!-- /.content -->
      </div>


    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>