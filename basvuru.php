<?php include("header.php");?>
 
<?php

	if($_POST && $ayar->basvuru == 0) {
		$_SESSION['fail'] = 'Yarışma başvuruları tamamlanmıştır!'; 
		$_SESSION['success'] = null; 
		goto atla; 
	 }
	 
	 if($_POST && isset($_POST['basvur'])) {
		 
		 if(empty($_POST['isim'])) { 
			  $_SESSION['fail'] = 'Ad Soyad boş bırakılamaz!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 
		 if(strlen($_POST['tcno']) != 11) { 
			  $_SESSION['fail'] = 'TC Kimlik Numarası 11 haneli olmalıdır!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 
		 if(strlen($_POST['telefon']) != 11) { 
			  $_SESSION['fail'] = 'Telefon Numarası 11 haneli olmalıdır!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 
		 if(empty($_POST['email'])) { 
			  $_SESSION['fail'] = 'Email Adresi boş bırakılamaz!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 
		 if(!is_array($_POST['yarisma_turu'])) { 
			  $_SESSION['fail'] = 'Yarışma Türü boş bırakılamaz!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 
		 if(empty($_POST['banaaitonay'])) { 
			  $_SESSION['fail'] = 'Onay-1 boş bırakılamaz!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 
		 if(empty($_POST['kvkkonay'])) { 
			  $_SESSION['fail'] = 'KVKK Onay boş bırakılamaz!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 
		 if(empty($_POST['captcha_challenge']) || strtolower($_POST['captcha_challenge']) != strtolower($_SESSION['captcha_text'])) {
			  $_SESSION['fail'] = 'Güvenlik Kodu hatalı!'; 
			  $_SESSION['success'] = null;
			  goto atla; 
		 }


		 $basvuruno = 'DNB-1000';
		 $isim = trim($_POST['isim']);
		 $tcno = trim($_POST['tcno']);
		 $telefon = trim($_POST['telefon']);
		 $email = trim($_POST['email']);
		 $yarisma_turu = $_POST['yarisma_turu'];
		 $onay1 = ($_POST['banaaitonay'] == 'on' ? 1 : 0);
		 $onay2 = ($_POST['kvkkonay'] == 'on' ? 1 : 0);
		 $okundu = 0;
		 $ip = ip();
		 $tarih = date("Y-m-d H:i:s");
		 
		 $yarisma_turu_string = implode('<br><br>', $_POST['yarisma_turu']);

		 $bilgi = Sorgu("SELECT * FROM basvurular WHERE email='$email'");
		 if(say($bilgi)) {
			  $_SESSION['fail'] = 'E-Mail adresi kullanılıyor!'; 
			  $_SESSION['success'] = null;
			  goto atla; 
		 }
		 
		 		 
		 $basvuru_sorgu = Sorgu("INSERT INTO basvurular SET basvuruno = '$basvuruno', 
			   isim = '$isim', 
			   tcno = '$tcno', 
			   telefon = '$telefon',
			   email = '$email', 
			   yarisma_turu = '$yarisma_turu_string', 
			   onay1 = $onay1,
			   onay2 = $onay2,
			   okundu = $okundu,
			   ip = '$ip',
			   tarih = '$tarih'"
		 ); 

		 $last_id = mysqli_insert_id($GLOBALS['baglan']);
		 if($last_id > 0) {
			  $basvuruno = 'DNB-' . (1000+$last_id);		  
			  			  
			  $basvuru_sorgu = Sorgu("UPDATE basvurular SET basvuruno = '$basvuruno' WHERE id = $last_id");
			  if($basvuru_sorgu) {				    							  
					 
				    include_once('class.phpmailer.php');	
					
				    $send_mail = new PHPMailer();
					$send_mail->ClearAddresses();
					$send_mail->ClearAttachments();

					$send_mail->IsSMTP();
					$send_mail->From = 'duyuru@denibdesign.org';
					$send_mail->FromName = 'Denib Design';
					$send_mail->addAddress($email);
					$send_mail->Subject = 'Başvurunuz kaydedilmiştir...';
					$send_mail->Body = "Başvurunuz başarıyla oluşturuldu.<br><br>Başvuru No: <b>$basvuruno</b>";
					$send_mail->SMTPAuth = true;
					$send_mail->Host = 'smtp.yandex.com';
					$send_mail->Username = 'duyuru@denibdesign.org';
					$send_mail->Password = 'Duyuru2023***';
					$send_mail->SMTPSecure = 'tls';
					$send_mail->Port = 587;
					$send_mail->isHTML(true);

					$attach_file1 = 'denib-hikaye-panosu-hazirlama.pdf';
					$attach_file2 = 'Denib-Tasarim-sartname.pdf';
					$attach_file3 = 'Forecast_FW_22_23_Flourish_-_Trend_Story_full_report.pdf';
					// $send_mail->AddAttachment($attach_file1);
					// $send_mail->AddAttachment($attach_file2);
					$send_mail->AddAttachment($attach_file3);
				  
					if($send_mail->Send()) 
					{
					    $_SESSION['fail'] = null;
						$_SESSION['success'] = 'Başvurunuz kaydedildi ve adresinize bilgilendirme emaili gönderildi.<br><br>Başvuru No: <b style="font-weight:bold">'.$basvuruno.'</b>';
					}
					else
					{
					    $_SESSION['fail'] = null;
						$_SESSION['success'] = 'Başvurunuz kaydedildi fakat adresinize bilgilendirme emaili gönderilemedi!.<br><br>Başvuru No: <b style="font-weight:bold">'.$basvuruno.'</b><br><br>'.$send_mail->ErrorInfo;
					}				  
			  }
		 }
		 else {
			  $_SESSION['fail'] = "Başvurunuz kaydedilemedi!";
			  $_SESSION['success'] = null;
		 }
	 }
	 
	atla:
 
?>  
  <div id="spinner-overlay" style="display:none"><div class="cv-spinner"><span class="spinner"></span></div></div>

 <!--Content Area Start-->
 <div id="content">
	 <div class="row">
	  <div class="col-md-2" style="padding-right: 0;"> </div>
	  
	  <div class="col-md-8" style="padding-right: 0;">
		  <section class="contact">
			   <div style="display: none" id="success"></div>
			   <div class="heading-wrap top-one">
					<h2 style="text-align:center">Başvuru Kodu Al</h2>   
			   </div>
			   
			   <br><br><br>
			   
			   <div class="row">
				   <div class="col-xs-12 form-wrap">
						<form method="post" action="" id="contact" onSubmit="return submitFunction()" enctype="multipart/form-data">							
							
							<div class="form-group">
								<input type="text" name="isim" class="form-control" style="text-transform:capitalize" id="isim" 
									placeholder="Adınız Soyadınız" <?= !empty($_SESSION['fail']) ? 'value="'.($_POST['isim'] ?? '').'"' : '' ?> required />
							</div>
							
							<div class="form-group">
								<input type="text" name="tcno" class="form-control" id="tcno" style="text-transform:none" 
									placeholder="TC Kimlik Numaranız" pattern="[0-9]+" maxlength="11" <?= !empty($_SESSION['fail']) ? 'value="'.($_POST['tcno'] ?? '').'"' : '' ?> required />
							</div>
							
							<div class="form-group">
								<input type="text" name="telefon" class="form-control" id="telefon" style="text-transform:none" 
									placeholder="Telefon: 05xxxxxxxxxx" pattern="[0-9]+" maxlength="11" <?= !empty($_SESSION['fail']) ? 'value="'.($_POST['telefon'] ?? '').'"' : '' ?> required />
							</div>
							
							<div class="form-group">
								<input type="email" name="email" class="form-control" style="text-transform:none" id="email" placeholder="E-Posta Adresiniz"
									<?= !empty($_SESSION['fail']) ? 'value="'.($_POST['email'] ?? '').'"' : '' ?> required />
							</div> 
							
							<div class="form-group" style="font-size: 16px; color: black;">								 
								<label for="tur1">
									<input type="checkbox" name="yarisma_turu[]" value="Profesyonel Banyo Tekstili" id="tur1" <?= !empty($_SESSION['fail']) && $_POST['yarisma_turu']=='Profesyonel Banyo Tekstili' ? 'checked': '' ?> />
									Profesyonel Banyo Tekstili
								</label>
								<br>
								<br>
								<label for="tur2">
									<input type="checkbox" name="yarisma_turu[]" value="Profesyonel Ev Tekstili" id="tur2" <?= !empty($_SESSION['fail']) && $_POST['yarisma_turu']=='Profesyonel Ev Tekstili' ? 'checked': '' ?> />
									Profesyonel Ev Tekstili
								</label>
								<br>
								<br>
								<label for="tur3">
									<input type="checkbox" name="yarisma_turu[]" value="Öğrenci Banyo Tekstili" id="tur3" <?= !empty($_SESSION['fail']) && $_POST['yarisma_turu']=='Öğrenci Banyo Tekstili' ? 'checked': '' ?> />
									Öğrenci Banyo Tekstili
								</label>
								<br>
								<br>
								<label for="tur4">
									<input type="checkbox" name="yarisma_turu[]" value="Öğrenci Ev Tekstili" id="tur4" <?= !empty($_SESSION['fail']) && $_POST['yarisma_turu']=='Öğrenci Ev Tekstili' ? 'checked': '' ?> />
									Öğrenci Ev Tekstili
								</label>
							</div>   						
														
							<br><br><br><br><br><br>
							
							<div style="font-size:14px;color:#333">
								<img src="captcha.php" alt="CAPTCHA" class="captcha-image"><i class="fa fa-refresh refresh-captcha"></i>
								<br><br>
								<div class="form-group">
									<input type="text" name="captcha_challenge" class="form-control" id="captcha" placeholder="Güvenlik Kodu" pattern="[a-zA-Z]+" maxlength="6" autocomplete="off" required />
								</div>
							</div>
							
							<br><br><br><br>
						
							<div class="checkbox" style="font-size:14px;color:#333;line-height: normal;">
							 <label>
								<input id="banaaitonay" name="banaaitonay" type="checkbox" <?= !empty($_SESSION['fail']) ? 'value="on"' : '' ?> required />
									Yukarıdaki bilgilerin şahsıma ait ve doğru olduğunu kabul ederim.
							 </label>
							 
							 <br><br>     

							 <label>
								 <input id="kvkkonay" name="kvkkonay" type="checkbox" <?= !empty($_SESSION['fail']) ? 'value="on"' : '' ?> required />
									Başvurum esnasında kurumunuza ileteceğim 6698 sayılı Kişisel Verileri Koruma Kanunu kapsamında bulunan 
									kişisel verilerimin DENİB tarafından işlenmesi ile ilgili olarak 
									<a href="Denib-Tasarim-sartname.pdf" target='_blank'>Kişisel Verilerin Korunması Genel Aydınlatma Metni</a>’ni okudum, kabul ediyorum.
							 </label>
							 <br>
							</div>
						  
							<br><br><br><br>
						  
							<?php if(($ayar->basvuru ?? 0) == 1) { ?>
								<button type="submit" name="basvur" class="btn trans-btn"> Başvur </button>
							<?php } ?>
						</form>

				   </div>
				   <div class="col-xs-12 triangle-img" style="margin-top: 100px;">
						<img src="assets/svg/triangle.svg" alt="yellow-triangel" class="triangle-svg pos-r svg"/>
						<img src="assets/images/sky-blue-triangle.png" alt="sky-triangel" class="blue-triangle">
				   </div>

			   </div>
		  </section>
	  </div>  
	  
	  <div class="col-md-2" style="padding-right: 0;"> </div>
	 </div>
 </div>
 
 <script src="assets/js/app.js"></script>
 <script> 
	 $(document).ready(function() {
	  
		$('.refresh-captcha').click(function() {
			$('img.captcha-image').attr('src', 'captcha.php?' + Date.now());
		});   
	  
	 <?php 
		 
		 if ($ayar->basvuru == 0) {   
			  echo "
				  $(\"button[name='basvur']\").attr('disabled', 'true');
				  swal({
				  html: true,
				  title: 'Başarılı', 
				  text: 'Yarışma başvuruları tamamlanmıştır!<br>İlginize teşekkür eder, katılımcılara başarılar dileriz.', 
				  type: 'success', 
				  timer: 1000000
				  }, 
				  function () { document.location.href='index.html'; });";
			  $_SESSION['success'] = null;
			  unset($_SESSION['success']);
		 }
		 if (!empty($_SESSION['success'])) {   
			  echo "
				  $(\"button[name='basvur']\").attr('disabled', 'true');
				  swal({
				  html: true,
				  title: 'Başarılı', 
				  text: '" . $_SESSION['success'] . "', 
				  type: 'success', 
				  timer: 10000
				  }, 
				  function () { document.location.href='basvuru.html'; });";
			  $_SESSION['success'] = null;
			  unset($_SESSION['success']);
		 }
		 if (!empty($_SESSION['fail'])) {    
			  echo "
				  $(\"button[name='basvur']\").removeAttr('disabled');
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
	 
	 function submitFunction() {
		  $('#spinner-overlay').css('display', 'block');
		  return true;
	  }
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