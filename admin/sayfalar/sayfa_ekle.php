<?php echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;?>
<?php
if(p('menuadi') && g('islem')=="" && !empty($_POST['ingaciklama']))
{
	$menuadi = $_POST['menuadi'];
	$sayfaadi 		= $_POST['sayfaadi'];
	$ingadi 	= $_POST['ingadi'];
	$durum 		= $_POST['durum'];
	$aciklama	= $_POST['aciklama'];
	$ingaciklama= $_POST['ingaciklama'];
	$seo		= seo($sayfaadi);

    include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);

    if (!empty($_FILES['resim']) && $upload->uploaded){
    	$upload->file_auto_rename = true;
    	$upload->process("../uploads/sayfalar");

    	$upload->file_auto_rename = true;
    	$upload->image_resize = true;
    	$upload->image_ratio_crop = true;
    	$upload->image_x = 850;
    	$upload->image_y = 150;
    	$upload->image_ratio_y = true;
    	$upload->process("../uploads/sayfalar/thumb");
    	if ($upload->processed){
    	    $sayfaresim=''.$upload->file_dst_name.'';
    	}
	}
	$gitti=$sayfaresim=''.$upload->file_dst_name.'';

	$sayfa_sorgu	=	mysqli_query($GLOBALS['baglan'], "INSERT INTO sayfalar SET
										menuadi =	'$menuadi',
										sayfaadi =	'$sayfaadi',
										ingadi	=	'$ingadi',
										resim	=	'$sayfaresim',
										seo		=	'$seo',
										aciklama=	'$aciklama',
										ingaciklama=	'$ingaciklama',
										durum	=	'$durum'");

		$bilgi = '  <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Başarı ile Eklenmiştir
                  </div>
		 ' ;

}


if(isset($_GET['islem']) && isset($_GET['id']) && isset($_GET['menusirasi']) && $_GET['id'] > 0 && g('islem')=="sirala") {
    $id 		= $_GET['id'];
    $menusirasi = $_GET['menusirasi'];
    $sayfa_duzenle_sorgu	=	Sorgu("UPDATE sayfalar SET
											menusirasi =	$menusirasi
											WHERE id=	'$id'");
    exit($sayfa_duzenle_sorgu);
}

if(p('menuadi') && g('islem')=="duzenle")
{
	$menuadi = $_POST['menuadi'];
	$sayfaadi = $_POST['sayfaadi'];
	$ingadi 	= $_POST['ingadi'];
	$ingaciklama= $_POST['ingaciklama'];
	$durum 		= $_POST['durum'];
	$d_id 		= $_GET['id'];
	$aciklama	= $_POST['aciklama'];
	$seo		= seo($sayfaadi);

	include_once('class.upload.php');
	$upload = new upload($_FILES['resim']);

    if ($upload->uploaded){
    	$upload->file_auto_rename = true;
    	$upload->process("../uploads/sayfalar");

    	$upload->file_auto_rename = true;
    	$upload->image_resize = true;
    	$upload->image_ratio_crop = true;
    	$upload->image_x = 850;
    	$upload->image_y = 150;
    	$upload->image_ratio_y = true;
    	$upload->process("../uploads/sayfalar/thumb");
    	if ($upload->processed){
    	    $sayfaresim=''.$upload->file_dst_name.'';
    	}
	}

	if(isset($sayfaresim) && $sayfaresim!="")
	{
		$resim_bul=mysqli_fetch_object(mysqli_query($GLOBALS['baglan'], "SELECT * FROM sayfalar WHERE id='$d_id'"));
		$resim_sil=unlink("../uploads/sayfalar/".$resim_bul->resim);
		$resim_sil2=unlink("../uploads/sayfalar/thumb/".$resim_bul->resim);

		$sayfa_duzenle_sorgu	=	Sorgu("UPDATE sayfalar SET
											menuadi =	'$menuadi',
											sayfaadi =	'$sayfaadi',
											ingadi	=	'$ingadi',
											ingaciklama=	'$ingaciklama',
											resim	=	'$sayfaresim',
											aciklama=	'$aciklama',
											seo		=	'$seo',
											durum	=	'$durum'
											WHERE id=	'$d_id'");
		$gitti=$sayfaresim=''.$upload->file_dst_name.'';
	}
    else
    {
		$sayfa_duzenle_sorgu = Sorgu("UPDATE sayfalar SET
											durum	=	'$durum',
											ingadi	=	'$ingadi',
											ingaciklama=	'$ingaciklama',
											aciklama=	'$aciklama',
											seo		=	'$seo',
											menuadi =	'$menuadi',
											sayfaadi =	'$sayfaadi'
											where id=	'$d_id'");
	}
				  $bilgi = '  <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		Başarı ile Güncellenmiştir !
                  </div>
				  <script>setTimeout(() => { document.location.href="/admin/sayfa-listele.html?kategori='.$ingaciklama.'"; }, 1500);</script>
		 ' ;
}


if(isset($_GET['islem']) && $_GET['islem']=="duzenle")
{
	$sayfaid = $_GET['id'];
	$durum = "duzenle" ;

	$SayfaSonuc = Sonuc(Sorgu("SELECT * FROM sayfalar WHERE id='$sayfaid'"));

}

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small><i class="fa fa-edit"></i> Sayfa Ekle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Sayfa Ekle</li>
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
                      <label for="menuadi">Menü Adı:</label>
                      <input type="text" class="form-control" name="menuadi" value="<?php echo $SayfaSonuc->menuadi ?? '';?>" id="menuadi" placeholder="Menüde görülen yazı" required>
                    </div>

                    <div class="form-group">
                      <label for="sayfaadi">Sayfa Adı:</label>
                      <input type="text" class="form-control" name="sayfaadi" value="<?php echo $SayfaSonuc->sayfaadi ?? '';?>" id="sayfaadi" placeholder="Sayfa içinde görülen başlık" required>
                    </div>
                    <div class="form-group">
                      <label for="ingadi">Sayfa Link:</label>
                      <input type="text" class="form-control" name="ingadi" value="<?php echo $SayfaSonuc->ingadi ?? '';?>" id="ingadi" readonly>
                    </div>

                    <input type="hidden" class="form-control" name="ingaciklama" value="<?= $_GET['kategori'] ?? '' ?>" id="ingaciklama" readonly>

                    <div class="form-group ">
                                    <label>Sayfa Resmi:</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                   <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <?php if(isset($_GET['islem']) && $_GET['islem']=='duzenle'){?>
                                    <?php if($SayfaSonuc->resim){?>
                                    <img src="../uploads/sayfalar/<?php echo $SayfaSonuc->resim;?>" alt="" />
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
                  <div class="form-group">
                    <label for="icerik">İçerik</label>
                    <textarea class="ckeditor" id="icerik" name="aciklama" placeholder="İçerik Giriniz."><?php echo $SayfaSonuc->aciklama ?? '';?></textarea>
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
    <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>

    <style scoped>
        #cke_1_contents {
            height: 600px !important;
        }

    </style>

    <script>
        $('#sayfaadi').keyup(function() {
            let trimmed = $.trim($(this).val()).toLocaleLowerCase();
            let slug = trimmed.replace(/[^a-z0-9-_ığşüöç]/gi, '-').replace(/-+ /g, '-').replace(/^-|-$/g, '');
            slug = slug.replace(/[İı]/g, 'i');
            slug = slug.replace(/[Şş]/g, 's');
            slug = slug.replace(/[Ğğ]/g, 'g');
            slug = slug.replace(/[Üü]/g, 'u');
            slug = slug.replace(/[Öö]/g, 'o');
            slug = slug.replace(/[Çç]/g, 'c');

            $('#ingadi').val('sayfa-' + slug + '.html');
        });
    </script>
    