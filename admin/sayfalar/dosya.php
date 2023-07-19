<?php
//include("../system/ayar.php");
include("../system/fonksiyon.php");
oturumkontrolana();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dosya Ekleme</title>
</head>

<body>

<?php
$urun_id = $_GET['urun_id'] ;
				if($_POST['EKLE']=="EKLE")
				{
					$urun_id = $_GET['urun_id'] ;
					if (empty($_FILES["resim"]["name"])) 
					{ 
					echo ' 
					  <script language="javascript"> 
						  alert("Lütfen Bir Dosya Seçiniz"); 
						  history.back();  
					  </script>'; 
				 	exit; 
				 	}
					
				    include_once('../class.upload.php');
					$upload = new upload($_FILES['resim']);
					if ($upload->uploaded){
					$upload->file_auto_rename = true;
					$upload->process("../../uploads/urunler/dosya/");
					if ($upload->processed){
					$UrunResim=''.$upload->file_dst_name.'';
					}
					}
					$gitti1	=$UrunResim=''.$upload->file_dst_name.'';
										
					$sayfa_ekle_sorgu = Sorgu("INSERT INTO dosya SET
													 dosya_id	=	'$urun_id', 
													 adi		=	'$UrunResim'");
					
						if($sayfa_ekle_sorgu){
							echo "EKLENDİ";
						}else{
							echo "HATA OLUSTU";
						}
				  }
				  
				  
				  if($_GET['islem']=="sil")
				  {
				  $gid=$_GET['gid'];
					  $resim_bul=Sonuc(Sorgu("SELECT * FROM dosya WHERE id='$gid'"));
					  $resim_sil=unlink("../../uploads/urunler/dosya/".$resim_bul->adi);
				  $sayfa_sil_sorgu = Sorgu("DELETE FROM dosya WHERE id='$gid'");
				  }?>

<form action="#" method="post" enctype="multipart/form-data">

<table>

<tr>
<td>Resim</td>
<td><input type="file" name="resim" /></td>
</tr>


<tr>
<td></td>
<td><input type="submit" value="EKLE" name="EKLE" /></td>
</tr>

<tr>
<td colspan="2">Resim</td>
</tr>


<tr>
<td colspan="2">	<?php
					$Sorgu = Sorgu("SELECT * FROM dosya WHERE dosya_id ='$urun_id' ORDER BY id ASC");
					while($Sonuc = Sonuc($Sorgu)){?>
                    
                    <div style="width:150px; 
                    			height:130px; 
                                float:left; 
                                margin-left:5px; 
                                text-align:center; 
                                margin-bottom:20px;">
 <div style="width:100px;height:auto;float:left;margin:5px;border:solid 1px #ddd;">                   
	<img src="../images/pdf_file.png" width="100"/><br />
    <span><?=$Sonuc->adi;?></span><br />
	<a href="?islem=sil&gid=<?=$Sonuc->id;?>&urun_id=<?=$urun_id;?>">SİL</a>
</div>
</div>
<?php }?>
</td>
</tr>

</table>

</form>

</body>
</html>
