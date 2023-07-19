<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php 
$mesajSorgu = Sorgu("SELECT * FROM rez");
$mesajSonuc = Sonuc($mesajSorgu);
?>
<?php
$duzenlenecek_id = g('id');
$mesajlar	=	Sonuc(Sorgu("SELECT * FROM rez WHERE id = '$duzenlenecek_id'"));
if($_GET['islem']=="sil")
{
	$id = g('id');	
	$mesajsil = mysqli_query($GLOBALS['baglan'], "DELETE FROM rez WHERE id='$id'");
	 header("Location:mesajlar.html");
	   $bilgi = '  <div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Başarı ile Silinmiştir !
	  </div>
	' ;
	
}
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Rezervasyon Oku
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Rezervasyon Oku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <?php echo $bilgi;?>
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Rezervasyon Oku</h3>
                  <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
				   <a href="../oda-detay-<?php echo $mesajlar->seo;?>.html" target="_blank"><h4>Oda Adı: <?php echo $mesajlar->adi;?></h4></a>
	
					<div class="fileupload fileupload-new" data-provides="fileupload">
                                   <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="../uploads/projeler/large/<?php echo $mesajlar->resim;?>" alt="">
                                                                       </div>
                                 	<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                         
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                            </div>
                                        </div>
										
										
										
										<h4>Oda Günlük Fiyatı: <font color="#FF0000"><?php echo $mesajlar->fiyat;?> ₺</font></h4>
										
										
										
											<h4>Müşteri Adı Soyadı: <font color="#FF0000"><?php echo $mesajlar->isim;?></font> </h4>
										
										
										
											<h4>Müşteri Telefon Numarası: <font color="#FF0000"><?php echo $mesajlar->telefon;?></font> </h4>
											
											<h4>Müşteri Email Adresi: <font color="#FF0000"><?php echo $mesajlar->email;?></font> </h4>
													<h4>Geliş & Gidiş Tarihi: <font color="#FF0000"><?php echo $mesajlar->gel;?> / <?php echo $mesajlar->git;?></font> </h4>
													
													
													
											<h4>Oda Sayısı: <font color="#FF0000"><?php echo $mesajlar->oda;?> tane <?php echo $mesajlar->adi;?> Oda</font></h4>
											
											<h4>Yatak Sayısı: Her odada <font color="#FF0000"><?php echo $mesajlar->yatak;?> tane yatak  bulunacak.</font></h4>
											
											
											
											
									
										
										<h4>Kişi ve Çocuk Sayısı: <font color="#FF0000"><?php echo $mesajlar->kisi;?> Kişi -  <?php echo $mesajlar->cocuk;?> Çocuk</font></h4>
										<h4>Rezervasyon Oluşturma Tarihi: <font color="#FF0000"><?php echo $mesajlar->tarih;?></font></h4>
										<h3>1 GÜNLÜK ÖDENECEK OLAN  TUTAR <font color="#FF0000">
										
										
										
										
										<?php
 
$sayi1  = $mesajlar->fiyat;
$sayi2  = $mesajlar->oda;;
$sonuc  = $sayi1 * $sayi2;
 
echo ":".$sonuc."₺";
 
?>
										
										
										
											
										
										
										
										
										</font> </h3>
											
                  </div><!-- /.mailbox-read-info -->
                  <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                    <a class="btn btn-default btn-sm" href="?islem=sil&id=<?php echo $mesajlar->id;?>" title="Sil" onclick="return confirm('Silmek istediğinize emin misiniz ?')"><i class="fa fa-trash-o"></i></a>

                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Yazdır">
                    <i class="fa fa-print"></i></button>
                  </div><!-- /.mailbox-controls -->
                  <div class="mailbox-read-message">
                    <p><?php echo $mesajlar->mesaj;?></p>
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->
                <!-- /.box-footer -->
                <div class="box-footer">
                  <div class="pull-right">
                  </div>
                  <a class="btn btn-default" href="?islem=sil&id=<?php echo $mesajlar->id;?>" onclick="return confirm('Silmek istediğinize emin misiniz ?')"><i class="fa fa-trash-o"></i> Sil</a>
                  <button class="btn btn-default"><i class="fa fa-print"></i> Yazdır</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
      <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>