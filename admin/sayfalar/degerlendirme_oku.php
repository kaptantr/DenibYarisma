<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null; ?>
<?php 

    $degerlendirmeSorgu = Sorgu("SELECT * FROM degerlendirmeler");
    $degerlendirmeSonuc = Sonuc($degerlendirmeSorgu);

    $duzenlenecek_id = g('id');
    $degerlendirmeler	=	Sonuc(Sorgu("SELECT * FROM degerlendirmeler WHERE id = '$duzenlenecek_id'"));

    if(!empty($_GET['islem']) && $_GET['islem']=="sil")
    {
        $id = g('id');	
        $basvurusil = mysqli_query($GLOBALS['baglan'], "DELETE FROM degerlendirmeler WHERE id='$id'");
         header("Location:degerlendirmeler.html");
           $bilgi = '  <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Başarı ile Silinmiştir !
          </div> ' ;
    }
    
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Değerlendirme Oku
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Değerlendirme Oku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <?= $bilgi ?? ''; ?>
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Değerlendirmeyi İncele (DEG-<?= $degerlendirmeler->id; ?>)</h3>
                  <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Geri"><i class="fa fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="İleri"><i class="fa fa-chevron-right"></i></a>
                  </div>
                </div>
				
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
				  <a class="btn btn-default btn-sm pull-left" href="#" onclick="location.reload()"><i class="fa fa-refresh"></i></a>
                    <h5>  
						<span class="mailbox-read-time pull-right" style="float:right;font-weight:normal">
							<b>Değerlendirme Tarihi: </b><?= date("d-m-Y H:i:s", strtotime($degerlendirmeler->tarih)); ?>
						</span>
					</h5>
					<br>
                  </div>
				  
				  <br>
                  
				  <table id="bilgiler" style="margin:30px">
					  <tr><td><b>Jüri Adı Soyadı:</b></td><td><?= mb_convert_case($degerlendirmeler->juri, MB_CASE_TITLE, "UTF-8"); ?></td></tr>
					  <tr><td><b>Pafta Kodu:</b></td><td><?= $degerlendirmeler->pafta; ?></td></tr>
                      <tr><td><b>Değerlendirme Puanı:</b></td><td><big><?= $degerlendirmeler->puan; ?></big></td></tr>
					  <tr><td><b>Kontrol Onayı:</b></td><td><?= ($degerlendirmeler->kontrol==1 ? 'Var' : 'Yok'); ?></td></tr>
					  <tr><td><b>Değerlendirme Durumu:</b></td><td><?= ($degerlendirmeler->degerlendirme==1 ? 'Yapıldı' : 'Yapılmadı'); ?></td></tr>
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
				  <button class="btn btn-default" onclick="document.location.href='degerlendirmeler.html'"><i class="fa fa-angle-left"></i> Geri</button>
                  <a class="btn btn-default" href="?islem=sil&id=<?= $degerlendirmeler->id; ?>" onclick="return confirm('Silmek istediğinize emin misiniz ?')">
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