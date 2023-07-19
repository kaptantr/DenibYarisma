<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null; ?>
<?php 
$basvuruSorgu = Sorgu("SELECT * FROM bilgi_formlari");
$basvuruSonuc = Sonuc($basvuruSorgu);
?>
<?php
$duzenlenecek_id = g('id');
$bilgi_formlari	=	Sonuc(
	Sorgu(
		"SELECT * FROM bilgi_formlari 
		WHERE id = '$duzenlenecek_id'"
	)
);
if($_GET['islem']=="sil")
{
	$id = g('id');	
	$bilgi_formusil = mysqli_query($GLOBALS['baglan'], "DELETE FROM bilgi_formlari WHERE id='$id'");
	 header("Location:bilgi_formlari.html");
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
            Bilgi Formu Oku
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Bilgi Formu Oku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <?= $bilgi; ?>
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Bilgi Formunu İncele (<?= $bilgi_formlari->basvuruno; ?>)</h3>
                  <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Geri"><i class="fa fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="İleri"><i class="fa fa-chevron-right"></i></a>
                  </div>
                </div>
				
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h5>  
						<span class="mailbox-read-time pull-right" style="float:right;font-weight:normal">
							<b>Gönderilme Tarihi: </b><?= date("d-m-Y H:i:s", strtotime($bilgi_formlari->tarih)); ?>
						</span>
					</h5>
					<br>
                  </div>
				  
				  <br>
                  
				  <table id="bilgiler" style="margin:30px">
					  <tr><td><b>Adı Soyadı:</b></td><td><?= mb_convert_case($bilgi_formlari->isim, MB_CASE_TITLE, "UTF-8"); ?></td></tr>				  
					  <tr><td><b>E-posta Adresi:</b></td><td><?= $bilgi_formlari->email; ?></td></tr>				  
					  <tr><td><b>Doğum Yılı:</b></td><td><?= $bilgi_formlari->dogumyili; ?></td></tr>				  
					  <tr><td><b>Telefon Numarası:</b></td><td><?= $bilgi_formlari->telefon; ?></td></tr>				  
					  <tr><td><b>Mezun/Öğrencisi Olduğu Üniversite:</b></td><td><?= $bilgi_formlari->universite; ?></td></tr>				  
					  <tr><td><b>Mezun/Öğrencisi Olduğu Bölüm:</b></td><td><?= $bilgi_formlari->bolum; ?></td></tr>				  
					  <tr><td><b>Yaşadığı İl:</b></td><td><?= $bilgi_formlari->il; ?></td></tr>				  
					  <tr><td><b>IP Adresi:</b></td><td><?= $bilgi_formlari->ip; ?></td></tr>				  
						<style>
						table#bilgiler td {
							padding: 20px;
						}
					  </style>					  
				  </table>
				</div><!-- /.box-body -->
                <!-- /.box-footer -->
                <div class="box-footer">
                  <div class="pull-right"> </div>
				  <button class="btn btn-default" onclick="document.location.href='bilgi_formlari.html'"><i class="fa fa-angle-left"></i> Geri</button>
                  <a class="btn btn-default" href="?islem=sil&id=<?= $bilgi_formlari->id; ?>" onclick="return confirm('Silmek istediğinize emin misiniz ?')">
					<i class="fa fa-trash-o"></i> Sil
				  </a>
                  <button class="btn btn-default print-btn"><i class="fa fa-print"></i> Yazdır</button>
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
	
	<script>
		$("button.print-btn").click(function (e) {
            e.preventDefault();
            
			let table = $('table#bilgiler');
			let popup = window.open("", "_blank", "location=no status=no toolbar=no, scrollbars=yes, resizable=yes, top=0, left=0, width=750, height=1000");
            popup.document.write(table.parent().html());
            popup.print();
            popup.close();
        });
	</script>