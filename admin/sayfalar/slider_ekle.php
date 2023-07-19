<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if(p('slideradi') && g('islem')=="")
{
	$slideradi 	= $_POST['slideradi'];
	$slideradi2	= $_POST['slideradi2'];
	$ingadi2	= $_POST['ingadi2'];
	$ingadi	= $_POST['ingadi'];
	$durum 		= p('durum');
	$tarih		= date("d-m-Y");
	
	include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_x = 1970;
	$upload->image_y = 707;
	$upload->process("../uploads/slider");
	if ($upload->processed){
	$sliderResim=''.$upload->file_dst_name.'';
	}
	}
	$gitti=$sliderResim=''.$upload->file_dst_name.'';
	
	$slider_sorgu	=	Sorgu("INSERT INTO slider SET
										adi		=	'$slideradi',
										adi2	=	'$slideradi2', 
										ingadi2	=	'$ingadi2', 
										ingadi	=	'$ingadi', 
										resim	=	'$sliderResim', 
										tarih	=	'$tarih',
										durum	=	'$durum'");	
																								   
		$bilgi = '  <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Başarı ile Eklenmiştir
                  </div>
				  <script>setTimeout(() => { document.location.href="slider-listele.html"; }, 1500);</script>
		 ' ;
		
}


if(p('slideradi') && g('islem')=="duzenle")
{
	$slideradi 	= $_POST['slideradi'];
	$slideradi2	= $_POST['slideradi2'];
	$ingadi2	= $_POST['ingadi2'];
	$ingadi	= $_POST['ingadi'];
	$durum 		= p('durum');
	$d_id 		= g('id');
	$tarih		= date("d-m-Y");
	
	include_once('class.upload.php');	
	$upload = new upload($_FILES['resim']);
	if ($upload->uploaded){
	$upload->file_auto_rename = true;
	$upload->image_resize = true;
	$upload->image_x = 1970;
	$upload->image_y = 707;
	$upload->process("../uploads/slider");
	if ($upload->processed){
	$sliderResim=''.$upload->file_dst_name.'';
	}
	}
	if($sliderResim!="")
	{
		$resim_bul=Sonuc(Sorgu("SELECT * FROM slider WHERE id='$d_id'"));
		$resim_sil=unlink("../uploads/slider/".$resim_bul->resim);
	
		$slider_duzenle_sorgu	=	Sorgu("UPDATE slider SET 
											adi		=	'$slideradi',
											adi2	=	'$slideradi2', 
											ingadi2	=	'$ingadi2', 
											ingadi	=	'$ingadi', 
											resim	=	'$sliderResim', 
											tarih	=	'$tarih',
											durum	=	'$durum' 
											WHERE id=	'$d_id'");
		$gitti=$sliderResim=''.$upload->file_dst_name.'';
	}else{	
		$slider_duzenle_sorgu = Sorgu("UPDATE slider SET 
											durum	=	'$durum', 
											tarih	=	'$tarih', 
											ingadi2	=	'$ingadi2', 
											ingadi	=	'$ingadi', 
											adi2	=	'$slideradi2',
											adi		=	'$slideradi' 
											where id=	'$d_id'");
	}
				  $bilgi = '  <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Başarı ile Güncellenmiştir !
                  </div>
		 ' ;
}

if(isset($_GET['islem']) && $_GET['islem']=="duzenle")
{
	$sayfaid = $_GET['id'];	
	$durum = "duzenle" ;
	$SliderSonuc = Sonuc(Sorgu("SELECT * FROM slider WHERE id='$sayfaid'"));
}

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small><i class="fa fa-picture-o"></i> Slider Ekle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="anasayfa.html"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Slider Ekle</li>
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
                      <label for="slideradi">Slider Adı</label>
                      <input type="text" class="form-control" name="slideradi" value="<?php echo $SliderSonuc->adi ?? '';?>" id="slideradi" placeholder="Slider Adı" required>
                    </div>
					                    
                    <div class="form-group ">
                                    <label>Slider Resmi</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                   <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <?php if(isset($_GET['islem']) && $_GET['islem']=='duzenle'){?>
                                    <?php if($SliderSonuc->resim){?>
                                    <img src="../uploads/slider/<?php echo $SliderSonuc->resim ?? '';?>" style="width: 200px; height: 200px;" alt="" />
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
                    <?php if(isset($_GET['islem']) && $_GET['islem']=="duzenle"){?>
                    <div class="form-group">
                        <label>Durumu</label>
                              <div class="square-green">
                                <div class="radio">
                                    <input tabindex="3" type="radio" value="1" <?php if($SliderSonuc->durum == '1') {?> checked <?php } ?> name="durum">
                                    <div style="margin-left:30px;position:absolute;margin-top:-20px;">Açık</div>
                                </div>
                            </div>
                             <div class="square-red">
                                <div class="radio">
                                    <input tabindex="3" type="radio" value="0" <?php if($SliderSonuc->durum == '0') {?> checked <?php } ?> name="durum"  >
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
				  
				    <div class="form-group">
                    <label for="ingadi">İçerik</label>
                    <textarea class="ckeditor" id="ingadi" name="ingadi" placeholder="İçerik Giriniz."><?php echo $SliderSonuc->ingadi ?? '';?></textarea>
                    </div>
					<hr>
				  
				  
				  
				  
				  
				  
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
    
    