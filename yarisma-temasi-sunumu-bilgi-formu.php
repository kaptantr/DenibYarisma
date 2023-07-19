<?php include("header.php");?>
		
<?php

	if($_POST
		&& isset($_POST['isim']) 
		&& isset($_POST['dogumyili']) 
		&& isset($_POST['telefon']) 
		&& isset($_POST['email']) 
		&& isset($_POST['universite']) 
		&& isset($_POST['bolum']) 
		&& isset($_POST['il']) 
		&& isset($_POST['gonder'])) {	
		
		if(empty($_POST['isim'])) { 
			$_SESSION['fail'] = 'Ad Soyad boş bırakılamaz!'; 
			$_SESSION['success'] = null; 
			goto atla; 
		}
		
		if(empty($_POST['dogumyili'])) { 
			$_SESSION['fail'] = 'Doğum Tarihi boş bırakılamaz!'; 
			$_SESSION['success'] = null; 
			goto atla; 
		}
		
		if(empty($_POST['telefon'])) { 
			$_SESSION['fail'] = 'Telefon Numarası boş bırakılamaz!'; 
			$_SESSION['success'] = null; 
			goto atla; 
		}
		
		if(empty($_POST['email'])) { 
			$_SESSION['fail'] = 'Eposta Adresi boş bırakılamaz!'; 
			$_SESSION['success'] = null; 
			goto atla; 
		}
		if(empty($_POST['universite']) && empty($_POST['universite2'])) { 
			$_SESSION['fail'] = 'Mezun/Öğrencisi Olduğunuz Üniversite boş bırakılamaz!'; 
			$_SESSION['success'] = null; 
			goto atla; 
		}		
		if(empty($_POST['bolum']) && empty($_POST['bolum2'])) { 
			$_SESSION['fail'] = 'Mezun/Öğrencisi Olduğunuz Bölüm boş bırakılamaz!'; 
			$_SESSION['success'] = null; 
			goto atla; 
		}
		if(empty($_POST['il'])) { 
			$_SESSION['fail'] = 'Yaşadığınız İl boş bırakılamaz!'; 
			$_SESSION['success'] = null; 
			goto atla; 
		}
		
		if(empty($_POST['captcha_challenge']) || strtolower($_POST['captcha_challenge']) != strtolower($_SESSION['captcha_text'])) {
			$_SESSION['fail'] = 'Güvenlik Kodu hatalı!'; 
			$_SESSION['success'] = null;
			goto atla; 
		}

		$basvuruno 	= 'DNB-1000';
		$isim 	= $_POST['isim'];
		$dogumyili 	= $_POST['dogumyili'];
		$telefon 	= $_POST['telefon'];
		$email	= $_POST['email'];
		$universite	= empty($_POST['universite']) ? $_POST['universite2'] : $_POST['universite'];
		$bolum	= empty($_POST['bolum']) ? $_POST['bolum2'] : $_POST['bolum'];
		$il	= $_POST['il'];
		$okundu	= 0;
		$ip	= ip();
		$tarih = date("Y-m-d H:i:s");
		
		
		$bilgi = Sorgu("SELECT * FROM bilgi_formlari WHERE email='$email'");
        if(say($bilgi)) {
			$_SESSION['fail'] = 'Eposta adresi kullanılıyor!'; 
			$_SESSION['success'] = null;
			goto atla; 
		}
		
				
		$basvuru_sorgu = Sorgu("INSERT INTO bilgi_formlari SET basvuruno =	'$basvuruno', 
														isim = '$isim', 
														dogumyili = '$dogumyili', 
														telefon	= '$telefon',
														email =	'$email', 
														universite = '$universite',
														bolum = '$bolum',
														mezuniyet =	'',
														il =	'$il',
														okundu = $okundu,
														ip = '$ip',
														tarih = '$tarih'"
		);		

		$last_id = mysqli_insert_id($GLOBALS['baglan']);
		if($last_id > 0) {
			$basvuruno = 'DNB-' . (1000+$last_id);
			
			$_SESSION['fail'] = null;
			$_SESSION['success'] = "Bilgi Formunuz kaydedildi.<br><br>Kayıt No: <b>$basvuruno</b><br><br><br>Toplantı giriş linki eposta adresinize gönderilecektir!";
			
			$basvuru_sorgu = Sorgu("UPDATE bilgi_formlari SET basvuruno = '$basvuruno' WHERE id = $last_id");
		}
		else {
			$_SESSION['fail'] = "Bilgi Formunuz kaydedilemedi!";
			$_SESSION['success'] = null;
		}
	}
	
atla:
	
?>	   
    <div id="spinner-overlay" style="display:none"><div class="cv-spinner"><span class="spinner"></span></div></div>

	<!--Content Area Start-->
	<div id="content">
		<div class="row">
			<div class="col-md-2" style="padding-right: 0;">
			</div>
			
			<div class="col-md-8" style="padding-right: 0;">
				<section class="contact">
					<div style="display: none" id="success"></div>
					<div class="heading-wrap top-one">
						<h2 style="text-align:center">Yarışma Teması Sunumu Bilgi Formu</h2>						
					</div>
					<br><br><br>
					
					<div class="row">
						<div class="col-xs-12 form-wrap">
							<form  method="post" action="yarisma-temasi-sunumu-bilgi-formu.php" id="contact" onSubmit="return submitFunction()">
								<div class="form-group">
									<input type="text" name="isim" class="form-control" style="text-transform:capitalize" id="isim" 
										placeholder="Adınız Soyadınız" <?= !empty($_SESSION['fail']) ? 'value="'.($_POST['isim'] ?? '').'"' : '' ?> required />
								</div>
								
								<div class="form-group">
									<input type="text" name="dogumyili" class="form-control" id="dogumyili" style="text-transform:none" 
										placeholder="Doğum Tarihiniz"  
										<?= !empty($_SESSION['fail']) ? 'value="'.($_POST['dogumyili'] ?? '').'"' : '' ?> required />
								</div>
								
								<div class="form-group">
									<input type="text" name="telefon" class="form-control" id="telefon" style="text-transform:none" 
										placeholder="Telefon: 05xxxxxxxxxx" pattern="[0-9]+" maxlength="11" 
										<?= !empty($_SESSION['fail']) ? 'value="'.($_POST['telefon'] ?? '').'"' : '' ?> required />
								</div>
								
								<div class="form-group">
									<input type="email" name="email" class="form-control" style="text-transform:none" id="email" placeholder="E-Posta Adresiniz"
										<?= !empty($_SESSION['fail']) ? 'value="'.($_POST['email'] ?? '').'"' : '' ?> required />
								</div>
								
								<div class="form-group" style="display:inline-flex;width:50%">
									<select name="universite" class="form-control" style="text-transform:none" id="universite">
										<option value="" selected> Mezun/Öğrencisi Olduğunuz Üniversiteyi Seçiniz </option>
									<?php 
										$universiteSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM universiteler ORDER BY adi ASC");
										while($universiteSonuc = mysqli_fetch_object($universiteSorgu)){
									 ?>   
										<option value="<?php echo $universiteSonuc->adi;?>"><?php echo $universiteSonuc->adi;?></option>
									 <?php } ?>
									</select>
								</div>
								<div class="form-group" style="display:inline-flex;width:49%">
									<input type="text" name="universite2" class="form-control" style="text-transform:none" id="universite2" placeholder="Diğer..." />
								</div>
								
								<div class="form-group" style="display:inline-flex;width:50%">
									<select name="bolum" class="form-control" style="text-transform:none" id="bolum">
										<option value="" selected> Mezun/Öğrencisi Olduğunuz Bölümü Seçiniz </option>
									<?php 
										$bolumSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM bolumler ORDER BY adi ASC");
										while($bolumSonuc = mysqli_fetch_object($bolumSorgu)){
									 ?>   
										<option value="<?php echo $bolumSonuc->adi;?>"><?php echo $bolumSonuc->adi;?></option>
									 <?php } ?>
									</select>
								</div>
								<div class="form-group" style="display:inline-flex;width:49%">
									<input type="text" name="bolum2" class="form-control" style="text-transform:none" id="bolum2" placeholder="Diğer..." />
								</div>
								
								<?php /*<div class="form-group">
									<select name="mezuniyet" class="form-control" style="text-transform:none" id="mezuniyet">
										<option value="" selected> Lütfen Mezuniyet Yılı Seçiniz </option>
									<?php 
										for($i=2000; $i<=date('Y'); $i++){
									 ?>   
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
									 <?php } ?>
									</select>
								</div>*/ ?>				
								
								<div class="form-group">
									<select name="il" class="form-control" style="text-transform:none" id="il">
										<option value="" selected> Yaşadığınız İli Seçiniz </option>
									<?php 
										$ilSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM iller ORDER BY adi ASC");
										while($ilSonuc = mysqli_fetch_object($ilSorgu)){
									 ?>   
										<option value="<?php echo $ilSonuc->adi;?>"><?php echo $ilSonuc->adi;?></option>
									 <?php } ?>
									</select>
								</div>
								
								<br><br><br><br>
								
								<div style="font-size:14px;color:#333">
									<img src="captcha.php" alt="CAPTCHA" class="captcha-image"><i class="fa fa-refresh refresh-captcha"></i>
									<br><br>
									<div class="form-group">
										<input type="text" name="captcha_challenge" class="form-control" id="captcha" 
											placeholder="Güvenlik Kodu" pattern="[a-zA-Z]+" maxlength="6" autocomplete="off" required />
									</div>
								</div>					
			
								<br><br><br><br>
			
								<button type="submit" name="gonder" class="btn trans-btn"> Gönder </button>
							</form>

						</div>
						<div class="col-xs-12 triangle-img" style="margin-top: 100px;">
							<img src="assets/svg/triangle.svg" alt="yellow-triangel" class="triangle-svg pos-r svg"/>
							<img src="assets/images/sky-blue-triangle.png" alt="sky-triangel" class="blue-triangle">
						</div>

					</div>
				</section>
			</div>			
			
			<div class="col-md-2" style="padding-right: 0;">
			</div>
		</div>
	</div>
	
	<script src="assets/js/app.js"></script>
	<script src="assets/js/jquery.inputmask.js"></script>
	<script>		
		$(document).ready(function() {
			
			$('.refresh-captcha').click(function() {
				$('img.captcha-image').attr('src', 'captcha.php?' + Date.now());
			});			

			$('input#dogumyili').inputmask({mask: "99.99.9999", alias: "date", placeholder: "dd.mm.yyyy", insertMode: false});			
			
	<?php	
	
		if (!empty($_SESSION['success'])) {						
			echo "
			$(\"button[name='gonder']\").attr('disabled', 'true');
			swal({
				html: true,
				title: 'Başarılı', 
				text: '" . $_SESSION['success'] . "', 
				type: 'success', 
				timer: 10000
			}, 
			function () { document.location.href='sayfa-yarisma-temasi-sunumu-bilgi-formu.html'; });";
			$_SESSION['success'] = null;
			unset($_SESSION['success']);
		}
		if (!empty($_SESSION['fail'])) {							
			echo "
			$(\"button[name='gonder']\").removeAttr('disabled');
			swal({
				html: true,
				title: 'Hata!', 
				text: '" . $_SESSION['fail'] . "', 
				type: 'error', 
				timer: 5000
			});";
			$_SESSION['fail'] = null;
			unset($_SESSION['fail']);
		}
	?>		
			
		});		
	</script>
	<style scoped>
		.refresh-captcha {
			font-size: 32px;
			padding-left: 20px;
			margin-top: 10px;
			position: absolute;
			cursor: pointer;
			color: chocolate;
		}		
		#spinner-overlay{
			position: fixed;
			top: 0;
			z-index: 100;
			width: 100%;
			height:100%;
			background: rgba(0,0,0,0.6);
		}
		.cv-spinner {
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.spinner {
			width: 40px;
			height: 40px;
			border: 4px #ddd solid;
			border-top: 4px #2e93e6 solid;
			border-radius: 50%;
			animation: sp-anime 0.8s infinite linear;
		}
		@keyframes sp-anime {
			100% {
				transform: rotate(360deg);
			}
		}
		.swal-overlay {
		  background-color: rgba(43, 165, 137, 0.45);
		}
	</style>

	<!--Content Area End-->
	
<?php include("footer.php");?>