<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if(p('adi') && g('islem')=="")
{
	$adi 		= $_POST['adi'];
	$ingadi 	= $_POST['ingadi'];
	$durum 		= $_POST['durum'];
	$aciklama	= $_POST['aciklama'];
	$facebook	= $_POST['facebook'];
	$twitter	= $_POST['twitter'];
	$pinterest	= $_POST['pinterest'];
	$mevki	= $_POST['mevki'];
	$ingaciklama= $_POST['ingaciklama'];
	$seo		= seo($adi);
	include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->process("../uploads/markalar");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_ratio_crop = true;
	$upload->image_x = 207;
	$upload->image_y = 165;
	$upload->image_ratio_y = true;
	$upload->process("../uploads/markalar/thumb");
	if ($upload->processed){
	$sayfaresim=''.$upload->file_dst_name.'';
	}
	}
	$gitti=$sayfaresim=''.$upload->file_dst_name.'';
	
	$sayfa_sorgu	=	mysqli_query($GLOBALS['baglan'], "INSERT INTO markalar SET
										adi		=	'$adi', 
										ingadi	=	'$ingadi', 
										resim	=	'$sayfaresim',
										seo		=	'$seo',
										facebook		=	'$facebook',
										twitter		=	'$twitter',
										pinterest		=	'$pinterest',
										mevki		=	'$mevki',
										aciklama=	'$aciklama',
										ingaciklama=	'$ingaciklama',
										durum	=	'$durum'");	
																								   
		$bilgi = '  <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Başarı ile Eklenmiştir
                  </div>
		 ' ;
		
}


if(p('adi') && g('islem')=="duzenle")
{
	$adi 		= $_POST['adi'];
	$ingadi 	= $_POST['ingadi'];
	$ingaciklama= $_POST['ingaciklama'];
	$durum 		= $_POST['durum'];
	$d_id 		= $_GET['id'];
	$aciklama	= $_POST['aciklama'];
	$facebook	= $_POST['facebook'];
	$twitter	= $_POST['twitter'];
	$pinterest	= $_POST['pinterest'];
	$mevki	= $_POST['mevki'];
	$seo		= seo($adi);
	
	include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->process("../uploads/markalar");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_ratio_crop = true;
	$upload->image_x = 207;
	$upload->image_y = 165;
	$upload->image_ratio_y = true;
	$upload->process("../uploads/markalar/thumb");
	if ($upload->processed){
	$sayfaresim=''.$upload->file_dst_name.'';
	}
	}
	if($sayfaresim!="")
	{
		$resim_bul=mysqli_fetch_object(mysqli_query($GLOBALS['baglan'], "SELECT * FROM markalar WHERE id='$d_id'"));
		$resim_sil=unlink("../uploads/markalar/".$resim_bul->resim);
		$resim_sil2=unlink("../uploads/markalar/thumb/".$resim_bul->resim);
	
		$sayfa_duzenle_sorgu	=	Sorgu("UPDATE markalar SET 
											adi		=	'$adi',
											ingadi	=	'$ingadi',	
											ingaciklama=	'$ingaciklama',
											resim	=	'$sayfaresim', 
											aciklama=	'$aciklama',
											seo		=	'$seo',
											facebook		=	'$facebook',
										    twitter		=	'$twitter',
										    pinterest		=	'$pinterest',
										    mevki		=	'$mevki',
											durum	=	'$durum' 
											WHERE id=	'$d_id'");
		$gitti=$sayfaresim=''.$upload->file_dst_name.'';
	}else{	
		$sayfa_duzenle_sorgu = Sorgu("UPDATE markalar SET 
											durum	=	'$durum', 
											ingadi	=	'$ingadi',
											ingaciklama=	'$ingaciklama',
											aciklama=	'$aciklama', 
											seo		=	'$seo',
											facebook		=	'$facebook',
										    twitter		=	'$twitter',
										    pinterest		=	'$pinterest',
										    mevki		=	'$mevki',
											adi		=	'$adi' 
											where id=	'$d_id'");
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
	
	$SayfaSonuc = Sonuc(Sorgu("SELECT * FROM markalar WHERE id='$sayfaid'"));
	
}

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small><i class="fa fa-edit"></i> Çalışan Ekle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Çalışan Ekle</li>
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
                      <label for="adi">Adı ve Soyadı</label>
                      <input type="text" class="form-control" name="adi" value="<?php echo $SayfaSonuc->adi;?>" id="adi" placeholder="">
                    </div>
				
               <div class="form-group">
                      <label for="mevki">Mevkisi</label>
                      <input type="text" class="form-control" name="mevki" value="<?php echo $SayfaSonuc->mevki;?>" id="mevki" placeholder="">
                    </div>
				     <div class="form-group">
                      <label for="facebook">Facebook</label>
                      <input type="text" class="form-control" name="facebook" value="<?php echo $SayfaSonuc->facebook;?>" id="facebook" placeholder="">
                    </div>
				
				     <div class="form-group">
                      <label for="twitter">Twitter</label>
                      <input type="text" class="form-control" name="twitter" value="<?php echo $SayfaSonuc->twitter;?>" id="twitter" placeholder="">
                    </div>
				
				     <div class="form-group">
                      <label for="pinterest">İnstagram</label>
                      <input type="text" class="form-control" name="pinterest" value="<?php echo $SayfaSonuc->pinterest;?>" id="pinterest" placeholder="">
                    </div>
				
				
                    
                    <div class="form-group ">
                                    <label>Fotoğrafı</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                   <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <?php if($_GET['islem']=='duzenle'){?>
                                    <?php if($SayfaSonuc->resim){?>
                                    <img src="../uploads/markalar/<?php echo $SayfaSonuc->resim;?>" alt="" />
                                     <?php } else { ?>
                                     <img src="images/no_name.png" alt="" />
                                     <?php }?>
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
                    <?php if($_GET['islem']=="duzenle"){?>
                    <div class="form-group">
                        <label>Durumu</label>
                              <div class="square-green">
                                <div class="radio">
                                    <input tabindex="3" type="radio" value="1" <?php if($SayfaSonuc->durum == '1') {?> checked <?php } ?> name="durum">
                                    <div style="margin-left:30px;position:absolute;margin-top:-20px;">Açık</div>
                                </div>
                            </div>
                             <div class="square-red">
                                <div class="radio">
                                    <input tabindex="3" type="radio" value="0" <?php if($SayfaSonuc->durum == '0') {?> checked <?php } ?> name="durum"  >
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

    
    