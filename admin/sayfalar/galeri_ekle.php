<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if(p('adi') && g('islem')=="")
{
	$adi 		= $_POST['adi'];
	$ingadi 	= $_POST['ingadi'];
	$kategori	= $_POST['kategori'];
	$durum 		= $_POST['durum'];
	$kod 		= $_POST['kod'];
	$aciklama	= $_POST['aciklama'];
	$ingaciklama= $_POST['ingaciklama'];
	$seo		= seo($adi);
	$tarih		= date("d-m-Y");
	
	include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->process("../uploads/galeriler/large");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_x = 550;
	$upload->image_y = 242;
	$upload->process("../uploads/galeriler/medium");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_ratio_crop = true;
	$upload->image_x = 200;
	$upload->image_y = 114;
	$upload->process("../uploads/galeriler/thumb");
	if ($upload->processed){
	$UrunResim=''.$upload->file_dst_name.'';
	}
	}
	$gitti1	=$UrunResim=''.$upload->file_dst_name.'';
	
	$urun_sorgu	=	Sorgu("INSERT INTO galeriler SET
								adi			=	'$adi', 
								kod			=	'$kod', 
								kategori	=	'$kategori',    
								resim		=	'$UrunResim', 
								aciklama	=	'$aciklama',
								ingaciklama=	'$ingaciklama',
								ingadi	=	'$ingadi', 
								tarih		=	'$tarih',
								seo			=	'$seo',
								durum		=	'$durum'");	
		if($urun_sorgu){																						   
		$bilgi = '  <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Başarı ile Eklenmiştir
                  </div>
		 ' ;
		}else{
		$bilgi = '  <div class="alert alert-danger alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Hata oluştu tekrar deneyiniz..!
                  </div>
		 ' ;	
		}
}


if(p('adi') && g('islem')=="duzenle")
{
	$d_id 			= $_GET['id'];
	$adi 		= $_POST['adi'];
	$ingadi 	= $_POST['ingadi'];
	$kod 		= $_POST['kod'];
	$kategori	 	= $_POST['kategori'];
	$durum 			= $_POST['durum'];
	$aciklama		= $_POST['aciklama'];
	$ingaciklama= $_POST['ingaciklama'];
	$seo			= seo($adi);
	$tarih			= date("d-m-Y");
	
	
	include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->process("../uploads/galeriler/large");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_x = 550;
	$upload->image_y = 242;
	$upload->process("../uploads/galeriler/medium");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_ratio_crop = true;
	$upload->image_x = 200;
	$upload->image_y = 114;
	$upload->process("../uploads/galeriler/thumb");
	if ($upload->processed){
	$UrunResim=''.$upload->file_dst_name.'';
	}
	}
	if($UrunResim!="")
	{
		$resim_bul	=	Sonuc(Sorgu("SELECT * FROM galeriler WHERE id='$d_id'"));
		$resim_sil1	=	unlink("../uploads/galeriler/large/".$resim_bul->resim);
		$resim_sil2	=	unlink("../uploads/galeriler/medium".$resim_bul->resim);
		$resim_sil3	=	unlink("../uploads/galeriler/thumb".$resim_bul->resim);
	
		$urun_duzenle_sorgu	=	Sorgu("UPDATE galeriler SET 
											adi			=	'$adi', 
											kategori	=	'$kategori',
											kod			=	'$kod', 											
											resim		=	'$UrunResim', 
											aciklama	=	'$aciklama',
											tarih		=	'$tarih',
											ingaciklama=	'$ingaciklama',
											ingadi	=	'$ingadi', 
											seo			=	'$seo',
											durum		=	'$durum' 
											WHERE id	=	'$d_id'");
		$gitti=$UrunResim=''.$upload->file_dst_name.'';
		
	}else{	
		$urun_duzenle_sorgu = Sorgu("UPDATE galeriler SET 
											adi			=	'$adi', 
											kategori	=	'$kategori',  
											kod			=	'$kod', 	
											aciklama	=	'$aciklama',
											tarih		=	'$tarih',
											ingadi	=	'$ingadi', 
											ingaciklama=	'$ingaciklama',
											seo			=	'$seo',
											durum		=	'$durum' 
											WHERE id	=	'$d_id'");
	}
	if($urun_duzenle_sorgu){
				  $bilgi = '  <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Başarı ile Güncellenmiştir !
                  </div>
		 ' ;
	}else{
	$bilgi = '  <div class="alert alert-danger alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Hata oluştu tekrar deneyiniz..!
                  </div>
		 ' ;	
	}
}

if($_GET['islem']=="duzenle")
{
	$sayfaid = $_GET['id'];	
	$durum = "duzenle" ;
	$UrunSonuc = Sonuc(Sorgu("SELECT * FROM galeriler WHERE id='$sayfaid'"));
}

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small><i class="fa fa-tasks"></i> Galeri Ekle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Galeri Ekle</li>
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
                  <!-------------------------------------------------------------------------------------->
                    <div class="form-group">
                      <label for="adi">Galeri Adı</label>
                      <input type="text" class="form-control" name="adi" value="<?php echo $UrunSonuc->adi;?>" id="adi" placeholder="Galeri Adı">
                    </div>
                    <!-------------------------------------------------------------------------------------->
					
               
                    <!-------------------------------------------------------------------------------------->
   
                    <!-------------------------------------------------------------------------------------->
                    
                    <div class="form-group " style="float:left;">
                                    <label>Galeri Resmi</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                   <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <?php if($_GET['islem']=='duzenle'){?>
                                    <img src="../uploads/galeriler/large/<?php echo $UrunSonuc->resim;?>" alt="" />
                                    <?php } else { ?>
                                    <img src="images/no_name.png" alt="" />
                                    <?php }?>
                                   </div>
                                 	<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                           <span class="btn btn-default btn-file">
                                           <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Resim Seç</span>
                                           <span class="fileupload-exists"><i class="fa fa-undo"></i> Değiştir</span>
                                           <input name="resim" type="file" class="default" />
                                           </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                            </div>
                                        </div>
                                </div>
                                <!-------------------------------------------------------------------------------------->
                    
                 
                                <!-------------------------------------------------------------------------------------->
                                
                                <div style="clear:both"></div>
                    <?php if($_GET['islem']=="duzenle"){?>
                    <div class="form-group">
                        <label>Durumu</label>
                              <div class="square-green">
                                <div class="radio">
                                    <input tabindex="3" type="radio" value="1" <?php if($UrunSonuc->durum == '1') {?> checked <?php } ?> name="durum">
                                    <div style="margin-left:30px;position:absolute;margin-top:-20px;">Açık</div>
                                </div>
                            </div>
                             <div class="square-red">
                                <div class="radio">
                                    <input tabindex="3" type="radio" value="0" <?php if($UrunSonuc->durum == '0') {?> checked <?php } ?> name="durum"  >
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
                  <!-------------------------------------------------------------------------------------->
                  
               
                  
     

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
   <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
    
    