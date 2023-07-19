<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null; ?>
<?php 
if(isset($_POST['tsil'])){
	$id = implode(",", $_POST["sil"]);
	if(empty($id)){
	
	}else{
	$delete = Sorgu("DELETE FROM bilgi_formlari WHERE id IN($id)");
	if($delete){
		  header("Location:bilgi_formlari.html");
		}else{
	
		}
	}
}
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Gelen Bilgi Formları
            <small><?php echo say($bilgi_formlariSorgu); ?> Gönderi</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Bilgi Formu Listesi</li>
          </ol>
        </section>

        <!-- Main content -->
       
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <?= $bilgi ?? ''; ?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Bilgi Formu Listesi</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="Bilgi Formu Ara"/>
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                 
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm" form="form1" type="submit" name="tsil" onclick="return confirm('Silmek istediğinize emin misiniz ?')">
                      	<i class="fa fa-trash-o"></i>
					  </button>
                    </div><!-- /.btn-group -->
                    <a class="btn btn-default btn-sm" href="bilgi_formlari.html"><i class="fa fa-refresh"></i></a>
                  </div>
                  <div class="table-responsive mailbox-messages">
                  <form action="" method="post" id="form1">
                    <table class="table table-hover table-striped">
                      <tbody>
                      <?php $bilgi_formlariSorgu = Sorgu("SELECT * FROM bilgi_formlari");
					  if(!mysqli_affected_rows($GLOBALS['baglan'])){?>
						<tr>
                            <td colspan="5">
                                 Bilgi Formu Bulunamadı.
                            </td>
                        </tr>  
					<?php }else{
					  while($bilgi_formlariSonuc = Sonuc($bilgi_formlariSorgu)){?>
                        <tr>
                          <td><input type="checkbox" name="sil[]" value="<?= $bilgi_formlariSonuc->id; ?>" /></td>
                          <!--<td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>-->
                          <td class="mailbox-name"><a href="bilgi_formu-oku.html?id=<?= $bilgi_formlariSonuc->id; ?>"><?= $bilgi_formlariSonuc->basvuruno; ?></a></td>
                          <td class="mailbox-subject"><b><?= mb_convert_case($bilgi_formlariSonuc->isim, MB_CASE_TITLE, "UTF-8"); ?></b> - <?= $bilgi_formlariSonuc->telefon; ?></td>
                          <td class="mailbox-attachment"><?= $bilgi_formlariSonuc->email; ?></td>
                          <td class="mailbox-date"><?= date("d-m-Y H:i:s", strtotime($bilgi_formlariSonuc->tarih)); ?></td>
                        </tr>
                        
					<?php }} ?>
                      </tbody>
                    </table><!-- /.table -->
                   </form>
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
      
                  </div>
                </div>
              </div><!-- /. box -->
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
         
      </div>
          <!-- Bootstrap 3.3.2 -->
    <link href="../admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar 2.2.5-->
    <link href="plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
      <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Page Script -->
      <script>
      $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data('clicks');
          if (clicks) {
            //Uncheck all checkboxes
            $("input[type='checkbox']", ".mailbox-messages").iCheck("uncheck");
          } else {
            //Check all checkboxes
            $("input[type='checkbox']", ".mailbox-messages").iCheck("check");
          }
          $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function (e) {
          e.preventDefault();
          //detect type
          var $this = $(this).find("a > i");
          var glyph = $this.hasClass("glyphicon");
          var fa = $this.hasClass("fa");          

          //Switch states
          if (glyph) {
            $this.toggleClass("glyphicon-star");
            $this.toggleClass("glyphicon-star-empty");
          }

          if (fa) {
            $this.toggleClass("fa-star");
            $this.toggleClass("fa-star-o");
          }
        });
      });
    </script>