<?php
    echo !defined("GUVENLIK") ? die("Erisim Engellendi!.") : null;

    if(g('islem')=="sil")
    {
    	$id = g('id');
    	$resim_bul=Sonuc(Sorgu("SELECT * FROM sayfalar WHERE id='$id'"));
    	$resim_sil=unlink("../uploads/sayfalar/".$resim_bul->resim);
    	$resim_sil2=unlink("../uploads/sayfalar/thumb/".$resim_bul->resim);

    	$sayfa_sil_sorgu = Sorgu("DELETE FROM sayfalar WHERE id='$id'");

    	$bilgi = '	 <div class="alert alert-success">
    										Başarı ile Silinmiştir !
    				  </div>
					  <script>setTimeout(() => { location.reload(); }, 1500);</script>' ;

    }

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small><i class="fa fa-edit"></i> Sayfa Listesi</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="active">Sayfa Listesi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header" style="padding:0;">
                <a href="sayfa-ekle.html?kategori=<?= $_GET['kategori'] ?? '' ?>" class="btn bg-navy margin"><i class="fa fa-plus"></i> Sayfa Ekle</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="table1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Menü Adı</th>
                        <th>Sayfa Adı</th>
                        <th style="width:100px;">Menü Sırası</th>
                        <th>Sayfa Resmi</th>
                        <th style="width:100px;">Durumu</th>
                        <th style="width:100px;">İşlem</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $SayfaSorgu = Sorgu("SELECT * FROM sayfalar WHERE ingaciklama='". ($_GET['kategori'] ?? '') ."' ORDER BY menusirasi ASC");
                            $index = 0;
                            while($SayfaSonuc = Sonuc($SayfaSorgu)) :
                                if($SayfaSonuc->ingaciklama == '') break;
                        ?>
                      <tr>
                        <td><?php echo ++$index; ?></td>
                        <td><?php echo $SayfaSonuc->menuadi; ?></td>
                        <td><?php echo $SayfaSonuc->sayfaadi; ?></td>
                        <td><input type="number" value="<?= $SayfaSonuc->menusirasi; ?>" data-id="<?= $SayfaSonuc->id; ?>" min="1" max="20" class="form-control menusirasi is-valid"></td>
                        <td>
						<?php if($SayfaSonuc->resim == ""){?>
			 			<span class="btn btn-danger btn-xs"><i class="fa fa-picture-o"></i> Resim Yok</span>
			 			<?php }else{?>
			 			<a class="btn btn-success btn-xs" href="../uploads/sayfalar/<?php echo $SayfaSonuc->resim; ?>" target="_blank"><i class="fa fa-eye"></i> Resmi Gör</a>
						 <?php } ?>
                         </td>
                        <td>
						<?php
			 				if($SayfaSonuc->durum=='1'){?>
                             <span class="label label-success">Aktif</span>
                             <?php } else { ?>
                             <span class="label label-danger">Pasif</span>
                             <?php } ?>
             			</td>
                        <td>
                        <a href="?islem=sil&id=<?php echo $SayfaSonuc->id;?>" title="Sil" class="btn btn-danger  btn-xs" onclick="return confirm('Silmek istediğinize emin misiniz ?')" id="remove-all">
            			    Sil
            			</a>

            			<a href="?kategori=<?= $_GET['kategori'] ?? '' ?>&sayfa=sayfa-ekle&islem=duzenle&id=<?php echo $SayfaSonuc->id;?>" class="btn btn-info btn-xs" title="Düzenle" id="add-sticky">
            			    Düzenle
            			</a>
                        </td>
                      </tr>
                        <?php endwhile; ?>

                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>

    <script type="text/javascript" src="dist/js/bootstrap-input-spinner.js"></script>

    <style scoped>
        .input-group-prepend button, .input-group-append button, input[type='text'].form-control.menusirasi {
            background: #fff;
            color: #6c757d;
            border-color: #bbb;
        }
        input[type='number'].form-control.menusirasi ~ .input-group {
            display: inline-flex;
        }
    </style>

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $('#table1').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });

        $('.menusirasi').inputSpinner({
            buttonsOnly: true
        });

        let timer = null;
        $('.form-control.menusirasi').on("change", function () {
            clearTimeout(timer);
            timer = setTimeout(() => {
                $.get("sayfa-ekle.html?id=" + $(this).attr('data-id') + "&menusirasi=" + $(this).val() + "&islem=sirala", function() {

                })
                .done(function() {
                    location.reload();
                });
            }, 1000);
        });

      });
    </script>