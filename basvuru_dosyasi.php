<?php include("header.php");?>
 
<?php
 
	 if($_POST && $ayar->basvuru == 0) {
		$_SESSION['fail'] = 'Yarışma başvuruları tamamlanmıştır!'; 
		$_SESSION['success'] = null; 
		goto atla; 
	 }
		 
		 
	 if($_POST && isset($_POST['basvur'])) {

         if(empty($_POST['basvuruno'])) {
			  $_SESSION['fail'] = 'Başvuru No boş bırakılamaz!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 
		 
		 if(empty($_POST['email'])) { 
			  $_SESSION['fail'] = 'Email Adresi boş bırakılamaz!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 
		 
		 if(empty($_FILES['dosya1'])) { 
			  $_SESSION['fail'] = 'Başvuru Formu Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if(empty($_FILES['dosya2'])) { 
			  $_SESSION['fail'] = 'Bilgilendirme Formu Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if(empty($_FILES['dosya3'])) { 
			  $_SESSION['fail'] = 'Öğrenci Belgesi Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if(empty($_FILES['dosya5'])) { 
			  $_SESSION['fail'] = 'Özgeçmiş Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if(empty($_FILES['dosya6'])) { 
			  $_SESSION['fail'] = 'Nüfus Cüzdan Fotokopisi Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if(empty($_FILES['dosya7'])) { 
			  $_SESSION['fail'] = 'Proje Paftaları Dosyası Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 
		 
		 if(empty($_POST['banaaitonay'])) { 
			  $_SESSION['fail'] = 'Onay-1 boş bırakılamaz!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
	
	
		 if(empty($_POST['captcha_challenge']) || strtolower($_POST['captcha_challenge']) != strtolower($_SESSION['captcha_text'])) {
			  $_SESSION['fail'] = 'Güvenlik Kodu hatalı!'; 
			  $_SESSION['success'] = null;
			  goto atla; 
		 }


		 $basvuruno = trim(strtoupper($_POST['basvuruno']));
		 $email = trim($_POST['email']);
		 $dosya1 = $_FILES['dosya1'];
		 $dosya2 = $_FILES['dosya2'];
		 $dosya3 = $_FILES['dosya3'];
		 $dosya4 = $_FILES['dosya4'] ?? null;
		 $dosya5 = $_FILES['dosya5'];
		 $dosya6 = $_FILES['dosya6'];
		 $dosya7 = $_FILES['dosya7'];
		 $onay1 = ($_POST['banaaitonay'] == 'on' ? 1 : 0);
		 $okundu = 0;
		 $ip = ip();
		 $tarih = date("Y-m-d H:i:s");
		 
		 
		 $bilgi = Sorgu("SELECT id FROM basvurular WHERE basvuruno = '$basvuruno' AND email = '$email' LIMIT 1");
		 if(say($bilgi)) { }
		 else {
			  $_SESSION['fail'] = 'Başvuru No ile E-Mail adresi uyuşmuyor!'; 
			  $_SESSION['success'] = null;
			  goto atla; 
		 }
		 
		 
		 /* $bilgi = Sorgu("SELECT * FROM basvurular WHERE email='$email'");
		 if(say($bilgi)) {
			  $_SESSION['fail'] = 'E-Mail adresi kullanılıyor!'; 
			  $_SESSION['success'] = null;
			  goto atla; 
		 } */
		 
		 include_once('class.upload.php');	
		//------------------------------------		 
		 $size1 = $dosya1['size'];
		 if (empty($dosya1) || $size1 <= 0){
			  $_SESSION['fail'] = 'Başvuru Formu Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if ($size1 > 32*1024*1024){ //Boyut: 32Mb
			 $_SESSION['fail'] = 'Başvuru Formu boyutu 32Mb tan büyük olamaz!'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 if(!in_array(strtolower(end(explode(".", $dosya1['name']))), ['pdf'])) {
			 $_SESSION['fail'] = 'Başvuru Formu türü yanlış! (.pdf)'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 //------------------------------------
		 $size2 = $dosya2['size'];
		 if (empty($dosya2) || $size2 <= 0){
			  $_SESSION['fail'] = 'Bilgilendirme Formu Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if ($size2 > 32*1024*1024){ //Boyut: 32Mb
			 $_SESSION['fail'] = 'Bilgilendirme Formu boyutu 32Mb tan büyük olamaz!'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 if(!in_array(strtolower(end(explode(".", $dosya2['name']))), ['pdf'])) {
			 $_SESSION['fail'] = 'Bilgilendirme Formu türü yanlış! (.pdf)'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 //------------------------------------
		 $size3 = $dosya3['size'];
		 if (empty($dosya3) || $size3 <= 0){
			  $_SESSION['fail'] = 'Öğrenci Belgesi Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if ($size3 > 32*1024*1024){ //Boyut: 32Mb
			 $_SESSION['fail'] = 'Öğrenci Belgesi boyutu 32Mb tan büyük olamaz!'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 if(!in_array(strtolower(end(explode(".", $dosya3['name']))), ['pdf'])) {
			 $_SESSION['fail'] = 'Öğrenci Belgesi türü yanlış! (.pdf)'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 //------------------------------------
		 $size4 = $dosya4['size'] ?? 0;
		 if ($size4 > 32*1024*1024){ //Boyut: 32Mb
			 $_SESSION['fail'] = 'Diploma Belgesi boyutu 32Mb tan büyük olamaz!'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 if(!empty($dosya4['name']) && !in_array(strtolower(end(explode(".", $dosya4['name']))), ['pdf'])) {
			 $_SESSION['fail'] = 'Diploma Belgesi türü yanlış! (.pdf)'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 //------------------------------------
		 $size5 = $dosya5['size'];
		 if (empty($dosya5) || $size5 <= 0){
			  $_SESSION['fail'] = 'Özgeçmiş Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if ($size5 > 32*1024*1024){ //Boyut: 32Mb
			 $_SESSION['fail'] = 'Özgeçmiş boyutu 32Mb tan büyük olamaz!'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 if(!in_array(strtolower(end(explode(".", $dosya5['name']))), ['pdf'])) {
			 $_SESSION['fail'] = 'Özgeçmiş türü yanlış! (.pdf)'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 //------------------------------------
		 $size6 = $dosya6['size'];
		 if (empty($dosya6) || $size6 <= 0){
			  $_SESSION['fail'] = 'Nüfus Cüzdan Fotokopisi Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if ($size6 > 32*1024*1024){ //Boyut: 32Mb
			 $_SESSION['fail'] = 'Nüfus Cüzdan Fotokopisi boyutu 32Mb tan büyük olamaz!'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 if(!in_array(strtolower(end(explode(".", $dosya6['name']))), ['pdf'])) {
			 $_SESSION['fail'] = 'Nüfus Cüzdan Fotokopisi türü yanlış! (.pdf)'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 //------------------------------------
		 $size7 = $dosya7['size'];
		 if (empty($dosya7) || $size7 <= 0){
			  $_SESSION['fail'] = 'Proje Paftaları Dosyası Eklenmemiş!'; 
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }
		 if ($size7 > 32*1024*1024){ //Boyut: 32Mb
			 $_SESSION['fail'] = 'Proje Paftaları Dosyası boyutu 32Mb tan büyük olamaz!'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }
		 if(!in_array(strtolower(end(explode(".", $dosya7['name']))), ['pdf'])) {
			 $_SESSION['fail'] = 'Proje Paftaları Dosyası türü yanlış! (.pdf)'; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }	 
		 //------------------------------------		
				
		 $dosya_yolu1 = '';
		 $dosya_yolu2 = '';
		 $dosya_yolu3 = '';
		 $dosya_yolu4 = '';
		 $dosya_yolu5 = '';
		 $dosya_yolu6 = '';
		 $dosya_yolu7 = '';
		 
		 $upload1 = new upload($dosya1);
		 if ($upload1->uploaded){
			 $upload1->file_auto_rename = true;
			 $upload1->process("uploads/basvurular/"); 
		 }
		 else {
			 $_SESSION['fail'] = $upload1->error; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }		 
		 $dosya_yolu1 = $upload1->file_dst_name;
		 
		 $upload2 = new upload($dosya2);
		 if ($upload2->uploaded){
			 $upload2->file_auto_rename = true;
			 $upload2->process("uploads/basvurular/"); 
		 }
		 else {
			 $_SESSION['fail'] = $upload2->error; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }		 
		 $dosya_yolu2 = $upload2->file_dst_name;
		 
		 $upload3 = new upload($dosya3);
		 if ($upload3->uploaded){
			 $upload3->file_auto_rename = true;
			 $upload3->process("uploads/basvurular/"); 
		 }
		 else {
			 $_SESSION['fail'] = $upload3->error; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }		 
		 $dosya_yolu3 = $upload3->file_dst_name;
		 
		 if($size4 > 0) {
			 $upload4 = new upload($dosya4);
			 if ($upload4->uploaded){
				 $upload4->file_auto_rename = true;
				 $upload4->process("uploads/basvurular/"); 
			 }
			 else {
				 $_SESSION['fail'] = $upload4->error; 
				 $_SESSION['success'] = null;
				 goto atla; 
			 }		 
			 $dosya_yolu4 = $upload4->file_dst_name;
		 }
		 
		 $upload5 = new upload($dosya5);
		 if ($upload5->uploaded){
			 $upload5->file_auto_rename = true;
			 $upload5->process("uploads/basvurular/"); 
		 }
		 else {
			 $_SESSION['fail'] = $upload5->error; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }		 
		 $dosya_yolu5 = $upload5->file_dst_name;
		 
		 $upload6 = new upload($dosya6);
		 if ($upload6->uploaded){
			 $upload6->file_auto_rename = true;
			 $upload6->process("uploads/basvurular/"); 
		 }
		 else {
			 $_SESSION['fail'] = $upload6->error; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }		 
		 $dosya_yolu6 = $upload6->file_dst_name;
		 
		 $upload7 = new upload($dosya7);
		 if ($upload7->uploaded){
			 $upload7->file_auto_rename = true;
			 $upload7->process("uploads/basvurular/"); 
		 }
		 else {
			 $_SESSION['fail'] = $upload7->error; 
			 $_SESSION['success'] = null;
			 goto atla; 
		 }		 
		 $dosya_yolu7 = $upload7->file_dst_name;
		 
		 
		 
		 $basvuru_sorgu = Sorgu("UPDATE basvurular SET 
									dosya_yolu1 = '$dosya_yolu1', 
									dosya_yolu2 = '$dosya_yolu2', 
									dosya_yolu3 = '$dosya_yolu3', 
									dosya_yolu4 = '$dosya_yolu4', 
									dosya_yolu5 = '$dosya_yolu5', 
									dosya_yolu6 = '$dosya_yolu6', 
									dosya_yolu7 = '$dosya_yolu7', 
									ip = '$ip' WHERE basvuruno = '$basvuruno' AND email = '$email'"); 

		 if($basvuru_sorgu) {			  
			  $_SESSION['fail'] = null;
			  $_SESSION['success'] = 'Başvuru dosyalarınız eklendi.<br><br>Başvuru No: <b style="font-weight:bold">'.$basvuruno.'</b>';			  
		 }
		 else {
			  $_SESSION['fail'] = "Başvuru dosyalarınız eklenemedi!";
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
	  
	  <div class="col-md-10" style="padding-right: 0;">
		  <section class="contact">
			   <div style="display: none" id="success"></div>
			   <div class="heading-wrap top-one">
					<h2 style="text-align:center">Başvuru Dosyalarını Yükle</h2>   
			   </div>
			   
			   <br><br><br>
			   
			   <div class="row">
				   <div class="col-xs-12 form-wrap">
						<form method="post" action="" id="contact" onSubmit="return submitFunction()" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" name="basvuruno" class="form-control" style="text-transform:capitalize" id="basvuruno" maxlength="8" 
									placeholder="DNB-XXXX" <?= !empty($_SESSION['fail']) ? 'value="'.($_POST['basvuruno'] ?? '').'"' : '' ?> required />
							</div>
														
							<div class="form-group">
								<input type="email" name="email" class="form-control" style="text-transform:none" id="email" placeholder="E-Posta Adresiniz"
									<?= !empty($_SESSION['fail']) ? 'value="'.($_POST['email'] ?? '').'"' : '' ?> required />
							</div> 							
							
							<br><br><br><br>
							
							<div class="row" style="font-size:14px;color:#333">
								 <div class="col-md-6">
									 <label class="control-label" for="dosya1">Başvuru Formu:</label>
									 <input id="dosya1" name="dosya1" type="file" class="form-control" value="" accept=".pdf" />
									 <span class="field-validation-valid text-danger"></span>
									 <p class="help-block"><small>Tasarım Yarışması Fotoğraflı ve Islak İmzalı Taahhütname/Başvuru Formu (Şartname ekinde yer alan). PDF formatında taratılarak yüklenecektir (.pdf max:32Mb)</small></p>
								 </div>
								 <div class="col-md-4"> </div>
							</div> 
							
							<br><br><br><br>
							
							<div class="row" style="font-size:14px;color:#333">
								 <div class="col-md-6">
									 <label class="control-label" for="dosya2">Bilgilendirme Formu:</label>
									 <input id="dosya2" name="dosya2" type="file" class="form-control" value="" accept=".pdf" />
									 <span class="field-validation-valid text-danger"></span>
									 <p class="help-block"><small>Islak İmzalı 6698 Sayılı Kişisel Verilerin Korunması Kanunu İle İlgili Aydınlatma/Bilgilendirme Formu (Şartname ekinde yer alan) (.pdf max:32Mb)</small></p>
								 </div>
								 <div class="col-md-4"> </div>
							</div> 
							
							<br><br><br><br>
							
							<div class="row" style="font-size:14px;color:#333">
								 <div class="col-md-6">
									 <label class="control-label" for="dosya3">Öğrenci Belgesi:</label>
									 <input id="dosya3" name="dosya3" type="file" class="form-control" value="" accept=".pdf" />
									 <span class="field-validation-valid text-danger"></span>
									 <p class="help-block"><small>Öğrencinin okuduğu okuldan alınan güncel tarihli, ıslak imzalı, kaşeli Öğrenci Belgesi (E-devlet çıkışlı resmi öğrenci belgesi de kabul edilecektir) (PDF formatında taratılarak yüklenecektir) (.pdf max:32Mb)</small></p>
								 </div>
								 <div class="col-md-4"> </div>
							</div> 
							
							<br><br><br><br>
							
							<div class="row" style="font-size:14px;color:#333">
								 <div class="col-md-6">
									 <label class="control-label" for="dosya4">Diploma (mezun ise):</label>
									 <input id="dosya4" name="dosya4" type="file" class="form-control" value="" accept=".pdf" />
									 <span class="field-validation-valid text-danger"></span>
									 <p class="help-block"><small>(PDF formatında taratılarak yüklenecektir) (.pdf max:32Mb)</small></p>
								 </div>
								 <div class="col-md-4"> </div>
							</div> 
							
							<br><br><br><br>
							
							<div class="row" style="font-size:14px;color:#333">
								 <div class="col-md-6">
									 <label class="control-label" for="dosya5">Özgeçmiş:</label>
									 <input id="dosya5" name="dosya5" type="file" class="form-control" value="" accept=".pdf" />
									 <span class="field-validation-valid text-danger"></span>
									 <p class="help-block"><small>Fotoğraflı Özgeçmiş olacaktır. (PDF formatında taratılarak yüklenecektir) (.pdf max:32Mb)</small></p>
								 </div>
								 <div class="col-md-4"> </div>
							</div> 
							
							<br><br><br><br>
							
							<div class="row" style="font-size:14px;color:#333">
								 <div class="col-md-6">
									 <label class="control-label" for="dosya6">Nüfus Cüzdan Fotokopisi:</label>
									 <input id="dosya6" name="dosya6" type="file" class="form-control" value="" accept=".pdf" />
									 <span class="field-validation-valid text-danger"></span>
									 <p class="help-block"><small>(PDF formatında taratılarak yüklenecektir) (.pdf max:32Mb)</small></p>
								 </div>
								 <div class="col-md-4"> </div>
							</div> 
							
							<br><br><br><br>
							
							<div class="row" style="font-size:14px;color:#333">
								 <div class="col-md-6">
									 <label class="control-label" for="dosya7">Proje Paftaları Dosyası:</label>
									 <input id="dosya7" name="dosya7" type="file" class="form-control" value="" accept=".pdf" />
									 <span class="field-validation-valid text-danger"></span>
									 <p class="help-block"><small>(PDF formatında tek bir dosya olarak yüklenecektir) (.pdf max:32Mb)</small></p>
								 </div>
								 <div class="col-md-4"> </div>
							</div> 
							
							<br><br><br><br>
							<br><br>

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
							 							 
							 <br>
							</div>
						  
							<br><br><br><br>
						  
							<?php if(($ayar->basvuru ?? 0) == 1) { ?>
								<button type="submit" name="basvur" class="btn trans-btn"> Yükle </button>
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