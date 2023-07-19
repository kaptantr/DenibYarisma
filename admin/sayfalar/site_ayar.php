<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if(isset($_POST['site_title']))
{
	$site_title 		= $_POST['site_title'];
	$site_ingtitle 		= $_POST['site_ingtitle'];
	$site_meta  		= $_POST['site_meta'];
	$site_desc 			= $_POST['site_desc'];
	
	$firma_adi 			= $_POST['firma_adi'];
	$firma_ingadi 		= $_POST['firma_ingadi'];
	$firma_tel			= p('firma_tel');
	$firma_fax 			= p('firma_fax');
	$firma_email		= p('firma_email');
	$firma_adres		= $_POST['firma_adres'];
	
	$google_analytics 	= $_POST['google_analytics'];
	$google_maps 		= $_POST['google_maps'];
	
	$facebook 			= p('facebook');
	$twitter 			= p('twitter');
	$gplus 				= p('gplus');
	$instagram 			= p('instagram');
	$pinterest 			= p('pinterest');
	$skype 			= p('skype');
	$youtube 			= p('youtube');
	$tanitim 			= p('tanitim');
	$tema 			= p('tema');
	$copyright 			= $_POST['copyright'];
	$basvuru 			= $_POST['basvuru'];
	$ingcopyright 			= $_POST['ingcopyright'];
	
	include_once('class.upload.php');
	$upload = new upload($_FILES['firma_logo']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->image_ratio_x = true;
	$upload->process("../uploads/logo");
	if ($upload->processed){
	$firmalogo=''.$upload->file_dst_name.'';
	}
	}
	if($firmalogo!="")
	{
	$ayar_duzenle_sorgu=mysqli_query($GLOBALS['baglan'], "UPDATE site_ayar SET 
									site_title			=	'$site_title',
									site_ingtitle			=	'$site_ingtitle',
									site_meta			=	'$site_meta', 
									site_desc			=	'$site_desc', 
									firma_adi			=	'$firma_adi',
									firma_ingadi			=	'$firma_ingadi',
									firma_tel			=	'$firma_tel',
									firma_fax			=	'$firma_fax',
									firma_email			=	'$firma_email',
									firma_logo			=	'$firmalogo',
									firma_adres			=	'$firma_adres',
									google_analytics	=	'$google_analytics',
									google_maps			=	'$google_maps',
									facebook			=	'$facebook',
									twitter				=	'$twitter',
									gplus				=	'$gplus',
									instagram			=	'$instagram',
									skype			=	'$skype',
									youtube			=	'$youtube',
									tanitim			=	'$tanitim',
									tema			=	'$tema',
									pinterest			=	'$pinterest',
									copyright			=	'$copyright',
									basvuru			=	'$basvuru',
									ingcopyright			=	'$ingcopyright'
									WHERE id			=	'1'");
									$gitti=$firmalogo=''.$upload->file_dst_name.'';
	}else{
			$ayar_duzenle_sorgu=mysqli_query($GLOBALS['baglan'], "UPDATE site_ayar SET
										site_title			=	'$site_title',
										site_ingtitle			=	'$site_ingtitle',
										site_meta			=	'$site_meta', 
										site_desc			=	'$site_desc', 
										firma_adi			=	'$firma_adi',
										firma_ingadi			=	'$firma_ingadi',
										firma_tel			=	'$firma_tel',
										firma_fax			=	'$firma_fax',
										firma_email			=	'$firma_email',
										firma_adres			=	'$firma_adres',
										google_analytics	=	'$google_analytics',
										google_maps			=	'$google_maps',
										facebook			=	'$facebook',
										twitter				=	'$twitter',
										gplus				=	'$gplus',
										instagram			=	'$instagram',
										skype			=	'$skype',
									    youtube			=	'$youtube',
									    tanitim			=	'$tanitim',
										tema			=	'$tema',
										pinterest			=	'$pinterest',
										copyright			=	'$copyright',
										basvuru			=	'$basvuru',
										ingcopyright			=	'$ingcopyright'
										WHERE id			=	'1'");
		}
								
				   $bilgi = '  <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Bilgiler Başarı ile Güncellenmiştir.
                  </div>
		 ' ;
	
}

	$ayar_dizi	=	Sonuc(Sorgu("SELECT * FROM site_ayar WHERE id = '1'"));

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small><i class="fa fa-cogs"></i> Site Genel Ayarları</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Site Genel Ayarları</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <?php echo $bilgi ?? '';?>
              <!-- general form elements -->
              <div class="box box-primary">
               <div class="row">  
              <div class="col-md-12">
                <!-- form start -->
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="site_title">Site Title</label>
                      <input type="text" class="form-control" name="site_title" value="<?php echo $ayar_dizi->site_title;?>" id="site_title" placeholder="Site Title">
                    </div>
					
					
                    <div class="form-group">
                      <label for="site_meta">Site Meta</label>
                      <input type="text" class="form-control" name="site_meta" value="<?php echo $ayar_dizi->site_meta;?>" id="site_meta" placeholder="Site Meta">
                    </div>
                    
                    <div class="form-group">
                      <label for="site_desc">Site Açıklama (description)</label>
                      <input type="text" class="form-control" name="site_desc" value="<?php echo $ayar_dizi->site_desc;?>" id="site_desc" placeholder="Site Açıklama">
                    </div>
					
		
                 
                    <div class="form-group ">
                                    <label>Firma Logo</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                   <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <?php if(isset($_GET['islem']) && $_GET['islem']=='duzenle'){?>
                                    
                                    <?php if($ayar_dizi->firma_logo){?>
                                    <img src="../uploads/logo/<?php echo $ayar_dizi->firma_logo;?>" style="height:auto;" alt="" />
                                    <?php } else { ?>
                                    <img src="images/no_name.png" alt="" />
                                    <?php }?>
                                    
                                    <?php } else { ?>
                                    <?php if($ayar_dizi->firma_logo){?>
                                    <img src="../uploads/logo/<?php echo $ayar_dizi->firma_logo;?>" style="height:auto;" alt="" />
                                    <?php } else { ?>
                                    <img src="images/no_name.png" alt="" />
                                    <?php }?>
                                    <?php }?>
                                   </div>
                                 	<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                           <span class="btn btn-default btn-file">
                                           <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Resim Seç</span>
                                           <span class="fileupload-exists"><i class="fa fa-undo"></i> Değiştir</span>
                                           <input name="firma_logo" type="file" class="default" />
                                           </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Sil</a>
                                            </div>
                                        </div>
                                </div>
                      <div class="form-group">
                      <label for="firma_adi">Firma Adı</label>
                      <input type="text" class="form-control" name="firma_adi" value="<?php echo $ayar_dizi->firma_adi;?>" id="firma_adi" placeholder="Firma Adı">
                    </div>
					  
			
                    <div class="form-group">
                      <label for="firma_tel">Firma Telefon</label>
                      <input type="text" class="form-control" name="firma_tel" value="<?php echo $ayar_dizi->firma_tel;?>" id="firma_tel" placeholder="Firma Telefon">
                    </div>
                    
                    <div class="form-group">
                      <label for="firma_fax">Firma Fax</label>
                      <input type="text" class="form-control" name="firma_fax" value="<?php echo $ayar_dizi->firma_fax;?>" id="firma_fax" placeholder="Firma Fax">
                    </div>
                    
                    <div class="form-group">
                      <label for="firma_email">Firma E-Mail</label>
                      <input type="text" class="form-control" name="firma_email" value="<?php echo $ayar_dizi->firma_email;?>" id="firma_email" placeholder="Firma E-Mail">
                    </div>
                     
                     <div class="form-group">
                    <label for="firma_adres">Firma Adres</label>
                    <textarea class="textarea" id="icerik" name="firma_adres" placeholder="Firma Adres"><?php echo $ayar_dizi->firma_adres;?></textarea>
                    </div>
                    
                    <div class="form-group">
                    <label for="google_maps">Google Maps</label>
                    <textarea id="icerik" name="google_maps" placeholder="Google Maps"><?php echo $ayar_dizi->google_maps;?></textarea>
                    </div>
                    
                    <div class="form-group">
                    <label for="google_analytics">Google Analytics</label>
                    <textarea id="icerik" name="google_analytics" placeholder="Google Analytics"><?php echo $ayar_dizi->google_analytics;?></textarea>
                    </div>
                    
                    <div class="form-group">
                      <label for="facebook">Facebook Sayfa URL</label>
                      <input type="text" class="form-control" name="facebook" value="<?php echo $ayar_dizi->facebook;?>" id="facebook" placeholder="Facebook Sayfa URL">
                    </div>
                    
                    <div class="form-group">
                      <label for="twitter">Twitter Sayfa URL</label>
                      <input type="text" class="form-control" name="twitter" value="<?php echo $ayar_dizi->twitter;?>" id="twitter" placeholder="Twitter Sayfa URL">
                    </div>
                    
             
					 <div class="form-group">
                      <label for="twitter">İnstagram Sayfa URL</label>
                      <input type="text" class="form-control" name="instagram" value="<?php echo $ayar_dizi->instagram;?>" id="instagram" placeholder="İnstagram Sayfa URL">
           </div>
		
               
                    <div class="form-group">
                      <label for="copyright">Copyright Metni</label>
                      <input type="text" class="form-control" name="copyright" value="<?php echo $ayar_dizi->copyright;?>" id="copyright" placeholder="Copyright Metni">
                    </div>
					
					
					<div class="form-group">
						<label for="basvuru">Başvuru Durumu</label>
						<p>&emsp;<input type="radio" class="" name="basvuru" value="0"<?= $ayar_dizi->basvuru=='0' ? ' checked' : '' ?>> Kapalı</p>
						<p>&emsp;<input type="radio" class="" name="basvuru" value="1"<?= $ayar_dizi->basvuru=='1' ? ' checked' : '' ?>> Açık (başvurulabilir)</p>
					</div>
										
                                
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                  <?php if(isset($_GET['islem']) && $_GET['islem']=="duzenle"){?>
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
    
    