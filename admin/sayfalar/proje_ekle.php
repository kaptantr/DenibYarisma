<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if($_POST['adi') && g('islem')=="")
{
	$adi 		= $_POST['adi'];
	$ingadi 	= $_POST['ingadi'];
	$kategori	= $_POST['kategori'];
	$durum 		= $_POST['durum'];
	$kod 		= $_POST['kod'];
	$aciklama	= $_POST['aciklama'];
	$firma	= $_POST['firma'];
	$deger	= $_POST['deger'];
	$yapim	= $_POST['yapim'];
	$alan	= $_POST['alan'];
	$mevki	= $_POST['mevki'];
	$fiyat	= $_POST['fiyat'];
	$ozellik	= $_POST['ozellik'];
	$sabah	= $_POST['sabah'];
	$oda	= $_POST['oda'];
	$spor	= $_POST['spor'];
	$klima	= $_POST['klima'];
	$park	= $_POST['park'];
	$tv	= $_POST['tv'];
	$hayvan	= $_POST['hayvan'];
	$ysayi	= $_POST['ysayi'];
	$obanyo	= $_POST['obanyo'];
	$kilit	= $_POST['kilit'];
	$oservis	= $_POST['oservis'];
	$teras	= $_POST['teras'];
	$uyandirma	= $_POST['uyandirma'];
	$yildiz	= $_POST['yildiz'];
	$sorumlu	= $_POST['sorumlu'];
	$ingaciklama= $_POST['ingaciklama'];
	$seo		= seo($adi);
	$tarih		= date("d-m-Y");
	
	include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->process("../uploads/projeler");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_x = 300;
	$upload->image_y = 240;
	$upload->process("../uploads/projeler/medium");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_ratio_crop = true;
	$upload->image_x = 200;
	$upload->image_y = 114;
	$upload->process("../uploads/projeler/thumb");
	if ($upload->processed){
	$UrunResim=''.$upload->file_dst_name.'';
	}
	}
	$gitti1	=$UrunResim=''.$upload->file_dst_name.'';
	
	$urun_sorgu	=	Sorgu("INSERT INTO projeler SET
								adi			=	'$adi', 
								kod			=	'$kod', 
								kategori	=	'$kategori',    
								resim		=	'$UrunResim', 
								aciklama	=	'$aciklama',
								ingaciklama=	'$ingaciklama',
								ingadi	=	'$ingadi', 
								tarih		=	'$tarih',
								firma		=	'$firma',
								deger		=	'$deger',
								yapim		=	'$yapim',
								sorumlu		=	'$sorumlu',
								mevki		=	'$mevki',
								fiyat		=	'$fiyat',
								ozellik		=	'$ozellik',
								oda		=	'$oda',
								spor		=	'$spor',
								klima		=	'$klima',
								sabah		=	'$sabah',
								park		=	'$park',
								hayvan		=	'$hayvan',
								wifi		=	'$wifi',
								ysayi		=	'$ysayi',
								oservis		=	'$oservis',
								uyandirma	=	'$uyandirma',
								kilit		=	'$kilit',
								obanyo		=	'$obanyo',
								teras		=	'$teras',
								yildiz		=	'$yildiz',
								tv		=	'$tv',
								alan		=	'$alan',
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


if($_POST['adi') && g('islem')=="duzenle")
{
	$d_id 			= $_GET['id'];
	$adi 		= $_POST['adi'];
	$ingadi 	= $_POST['ingadi'];
	$kod 		= $_POST['kod'];
	$kategori	 	= $_POST['kategori'];
	$durum 			= $_POST['durum'];
	$aciklama		= $_POST['aciklama'];
	$firma	= $_POST['firma'];
	$deger	= $_POST['deger'];
	$yapim	= $_POST['yapim'];
	$alan	= $_POST['alan'];
	$mevki	= $_POST['mevki'];
	$fiyat	= $_POST['fiyat'];
	$ozellik	= $_POST['ozellik'];
	$sabah	= $_POST['sabah'];
	$oda	= $_POST['oda'];
	$spor	= $_POST['spor'];
	$klima	= $_POST['klima'];
	$park	= $_POST['park'];
	$tv	= $_POST['tv'];
	$hayvan	= $_POST['hayvan'];
	$wifi	= $_POST['wifi'];
	$ysayi	= $_POST['ysayi'];
	$obanyo	= $_POST['obanyo'];
	$kilit	= $_POST['kilit'];
	$oservis	= $_POST['oservis'];
	$teras	= $_POST['teras'];
	$uyandirma	= $_POST['uyandirma'];
	$yildiz	= $_POST['yildiz'];
	$sorumlu	= $_POST['sorumlu'];
	$ingaciklama= $_POST['ingaciklama'];
	$seo			= seo($adi);
	$tarih			= date("d-m-Y");
	
	
	include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->process("../uploads/projeler");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_x = 300;
	$upload->image_y = 240;
	$upload->process("../uploads/projeler/medium");
	
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_ratio_crop = true;
	$upload->image_x = 200;
	$upload->image_y = 114;
	$upload->process("../uploads/projeler/thumb");
	if ($upload->processed){
	$UrunResim=''.$upload->file_dst_name.'';
	}
	}
	if($UrunResim!="")
	{
		$resim_bul	=	Sonuc(Sorgu("SELECT * FROM projeler WHERE id='$d_id'"));
		$resim_sil1	=	unlink("../uploads/projeler/".$resim_bul->resim);
		$resim_sil2	=	unlink("../uploads/projeler/medium".$resim_bul->resim);
		$resim_sil3	=	unlink("../uploads/projeler/thumb".$resim_bul->resim);
	
		$urun_duzenle_sorgu	=	Sorgu("UPDATE projeler SET 
											adi			=	'$adi', 
											kategori	=	'$kategori',
											kod			=	'$kod', 											
											resim		=	'$UrunResim', 
											aciklama	=	'$aciklama',
											tarih		=	'$tarih',
											ingaciklama=	'$ingaciklama',
											ingadi	=	'$ingadi', 
											seo			=	'$seo',
											firma		=	'$firma',
											deger		=	'$deger',
											yapim		=	'$yapim',
											sorumlu		=	'$sorumlu',
											mevki		=	'$mevki',
											fiyat		=	'$fiyat',
								            ozellik		=	'$ozellik',
											oda		=	'$oda',
								            spor		=	'$spor',
								            klima		=	'$klima',
								            sabah		=	'$sabah',
								            park		=	'$park',
								            hayvan		=	'$hayvan',
								            wifi		=	'$wifi',
											ysayi		=	'$ysayi',
								            oservis		=	'$oservis',
								            uyandirma	=	'$uyandirma',
								            kilit		=	'$kilit',
								            obanyo		=	'$obanyo',
								            teras		=	'$teras',
								            yildiz		=	'$yildiz',
								            tv		=	'$tv',
											alan		=	'$alan',
											durum		=	'$durum' 
											WHERE id	=	'$d_id'");
		$gitti=$UrunResim=''.$upload->file_dst_name.'';
		
	}else{	
		$urun_duzenle_sorgu = Sorgu("UPDATE projeler SET 
											adi			=	'$adi', 
											kategori	=	'$kategori',  
											kod			=	'$kod', 	
											aciklama	=	'$aciklama',
											tarih		=	'$tarih',
											ingadi	=	'$ingadi', 
											ingaciklama=	'$ingaciklama',
											seo			=	'$seo',
											firma		=	'$firma',
											deger		=	'$deger',
											yapim		=	'$yapim',
											sorumlu		=	'$sorumlu',
											mevki		=	'$mevki',
											fiyat		=	'$fiyat',
								            ozellik		=	'$ozellik',
											oda		=	'$oda',
								            spor		=	'$spor',
								            klima		=	'$klima',
								            sabah		=	'$sabah',
								            park		=	'$park',
								            hayvan		=	'$hayvan',
								            wifi		=	'$wifi',
											ysayi		=	'$ysayi',
								            oservis		=	'$oservis',
								            uyandirma	=	'$uyandirma',
								            kilit		=	'$kilit',
								            obanyo		=	'$obanyo',
								            teras		=	'$teras',
								            yildiz		=	'$yildiz',
								            tv		=	'$tv',
											alan		=	'$alan',
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
	$UrunSonuc = Sonuc(Sorgu("SELECT * FROM projeler WHERE id='$sayfaid'"));
}

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small><i class="fa fa-tasks"></i> Proje Ekle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Proje Ekle</li>
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
                      <label for="adi">Proje Adı</label>
                      <input type="text" class="form-control" name="adi" value="<?php echo $UrunSonuc->adi;?>" id="adi" placeholder="">
                    </div>
                    <!-------------------------------------------------------------------------------------->
					
                    <div class="form-group">
                      <label for="ingadi">Proje Tarihi</label>
                      <input type="text" class="form-control" name="ingadi" value="<?php echo $UrunSonuc->ingadi;?>" id="ingadi" placeholder="">
                    </div>
					
					
					  <div class="form-group">
                      <label for="firma">Proje Firması</label>
                      <input type="text" class="form-control" name="firma" value="<?php echo $UrunSonuc->firma;?>" id="firma" placeholder="">
                    </div>
					
					
					  <div class="form-group">
                      <label for="deger">Proje Kodlamaları</label>
                      <input type="text" class="form-control" name="deger" value="<?php echo $UrunSonuc->deger;?>" id="deger" placeholder="">
                    </div>
					
					
                    <!-------------------------------------------------------------------------------------->
                   <div class="form-group">
                      <label for="ingaciklama">Proje Linki</label>
                      <input type="text" class="form-control" name="ingaciklama" value="<?php echo $UrunSonuc->ingaciklama;?>" id="ingaciklama" placeholder="">
                    </div>
                    <!-------------------------------------------------------------------------------------->
             
                    <!-------------------------------------------------------------------------------------->
                    
                    <div class="form-group " style="float:left;">
                                    <label>Proje Resmi</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                   <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <?php if($_GET['islem']=='duzenle'){?>
                                    <img src="../uploads/projeler/<?php echo $UrunSonuc->resim;?>" alt="" />
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
            <div class="form-group " style="float:left;">
                                    <label><strong style="color:#FFFFFF;">.</strong></label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                   <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                     <?php if($_GET['id']){?>
                                       
								   <a href="javascript:NewWindow=window.open('sayfalar/proje_resim_ekle.php?urun_id=<?=$UrunSonuc->id;?>','newWin','width=468,height=600,left=0,top=0 ,toolbar=No,location=No,scrollbars=No,status=No,re sizable=No,fullscreen=No'); NewWindow.focus();void(0);" style="line-height:30px;"><img src="images/resimsec.jpg" alt="" /></a>
								  <?php }else{ ?>
                                   <!-- Modal -->
                                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal3" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                    <h4 class="modal-title">Uyarı</h4>
                                                </div>
                                                <div class="modal-body">

                                                    Bu özelliği portfolyo listesi > düzenle bölümünden kullanabilirsiniz

                                                </div>
                                                <div class="modal-footer">
                                                	<button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal -->
                                  <a href="#myModal3" data-toggle="modal">
                                     <img src="images/resimsec.jpg" alt="" />
                                   </a>
									 
								<?php } ?>
                                   </div>
                                 	
                                            
                                        </div>
                                </div>
                                
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
                  
                  <div class="form-group">
                    <label for="icerik">Proje Açıklama</label>
                    <textarea class="ckeditor" id="icerik" name="aciklama" placeholder="İçerik Giriniz."><?php echo $UrunSonuc->aciklama;?></textarea>
                    </div>
                    <!-------------------------------------------------------------------------------------->
					 
                  
                
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
   <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
    
    