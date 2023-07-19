<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if(p('kategori_adi') && g('islem')=="")
{
	$kategori_adi 	= $_POST['kategori_adi'];
	$kategori_ingadi 	= $_POST['kategori_ingadi'];
	$durum 			= $_POST['durum'];
	$seo			= seo($kategori_adi);
	
	include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->process("../uploads/projekategori");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_x = 300;
	$upload->image_y = 132;
	$upload->process("../uploads/projekategori/thumb");
	if ($upload->processed){
	$KategoriResim=''.$upload->file_dst_name.'';
	}
	}
	$gitti=$KategoriResim=''.$upload->file_dst_name.'';
	
	$kategori_sorgu	=	mysqli_query($GLOBALS['baglan'], "INSERT INTO proje_kategori SET
										kategori_adi	=	'$kategori_adi',
										kategori_ingadi	=	'$kategori_ingadi',
										resim			=	'$KategoriResim',
										seo				=	'$seo', 
										durum			=	'$durum'");	
																								   
		$bilgi = '  <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Başarı ile Eklenmiştir
                  </div>
		 ' ;
		
}


if(p('kategori_adi') && g('islem')=="duzenle")
{
	$kategori_adi 	= $_POST['kategori_adi'];
	$kategori_ingadi 	= $_POST['kategori_ingadi'];
	$durum 			= $_POST['durum'];
	$d_id 			= $_GET['id'];
	$seo			= seo($kategori_adi);
	
	include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->process("../uploads/projekategori");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_x = 300;
	$upload->image_y = 132;
	$upload->process("../uploads/projekategori/thumb");
	if ($upload->processed){
	$KategoriResim=''.$upload->file_dst_name.'';
	}
	}
	if($KategoriResim!="")
	{
		$resim_bul=mysqli_fetch_object(mysqli_query($GLOBALS['baglan'], "SELECT * FROM proje_kategori WHERE id='$d_id'"));
		$resim_sil=unlink("../uploads/projekategori/".$resim_bul->resim);
		$resim_sil2=unlink("../uploads/projekategori/thumb/".$resim_bul->resim);
	
		$kategori_duzenle_sorgu = Sorgu("UPDATE proje_kategori SET 
											kategori_adi	=	'$kategori_adi',
											kategori_ingadi	=	'$kategori_ingadi',
											resim			=	'$KategoriResim', 
											seo				=	'$seo', 
											durum			=	'$durum' 
											WHERE id		=	'$d_id'");
		$gitti=$sayfaresim=''.$upload->file_dst_name.'';
	}else{

		$kategori_duzenle_sorgu = Sorgu("UPDATE proje_kategori SET 
											kategori_adi	=	'$kategori_adi', 
											kategori_ingadi	=	'$kategori_ingadi',
											seo				=	'$seo', 
											durum			=	'$durum' 
											WHERE id		=	'$d_id'");
	}
				  $bilgi = '  <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Başarı ile Güncellenmiştir !
                  </div>
		 ' ;
}


if($_GET['islem']=="duzenle")
{
	$sayfaid = $_GET['id'];	
	$durum = "duzenle" ;
	
	$KategoriSonuc = Sonuc(Sorgu("SELECT * FROM proje_kategori WHERE id='$sayfaid'"));
	
}

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small><i class="fa fa-tasks"></i> Kategori Ekle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Kategori Ekle</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <?php echo $bilgi;?>
              <!-- general form elements -->
              <div class="box box-primary">
               <div class="row">  
              <div class="col-md-12">
                <!-- form start -->
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="kategori_adi">Kategori Adı</label>
                      <input type="text" class="form-control" name="kategori_adi" value="<?php echo $KategoriSonuc->kategori_adi;?>" id="kategori_adi" placeholder="Kategori Adı">
                    </div>
					
			
                    
                    <?php if($_GET['islem']=="duzenle"){?>
                    <div class="form-group">
                        <label>Durumu</label>
                              <div class="square-green">
                                <div class="radio">
                                    <input tabindex="3" type="radio" value="1" <?php if($KategoriSonuc->durum == '1') {?> checked <?php } ?> name="durum">
                                    <div style="margin-left:30px;position:absolute;margin-top:-20px;">Açık</div>
                                </div>
                            </div>
                             <div class="square-red">
                                <div class="radio">
                                    <input tabindex="3" type="radio" value="0" <?php if($KategoriSonuc->durum == '0') {?> checked <?php } ?> name="durum"  >
                                    <div style="margin-left:30px;position:absolute;margin-top:-20px;">Kapalı</div>
                                </div>
                            </div>
                    </div>
                  <?php }else{?>
                  	<div class="form-group">
                        <label>Durumu</label>
                              <div class="square-green">
                                <div class="radio">
                                    <input tabindex="3" type="radio" value="1"  checked  name="durum">
                                    <div style="margin-left:30px;position:absolute;margin-top:-20px;">Açık</div>
                                </div>
                            </div>
                             <div class="square-red">
                                <div class="radio">
                                    <input tabindex="3" type="radio" value="0"  name="durum"  >
                                    <div style="margin-left:30px;position:absolute;margin-top:-20px;">Kapalı</div>
                                </div>
                            </div>
                    </div>
                  <?php } ?>
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                  <?php if($_GET['islem']=="duzenle"){?>
						  <button type="submit" onclick="submit();" class="btn btn-primary">Güncelle</button>	
                    <?php }else{?>
						  <button type="submit" onclick="submit();" class="btn btn-primary">Kaydet</button>						
                   <?php } ?>
                  </div>
                </form>
              </div><!-- /.box -->
              </div>
</div>
            </div><!--/.col (left) -->
            <!-- right column -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div>
      
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
    <!-- CK Editor -->
    <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $(".textarea").wysihtml5();
      });
    </script>
    
    