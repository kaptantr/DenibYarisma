<?php include("header.php");?>
 
<?php
 
	 if($_POST && isset($_POST['basvur'])) {


         if(empty($_POST['email'])) {
			  $_SESSION['fail'] = 'Email Adresi boş bırakılamaz!'; 
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


		 $email = trim($_POST['email']);
		 $onay1 = ($_POST['banaaitonay'] == 'on' ? 1 : 0);
		 $okundu = 0;
		 $ip = ip();
		 $tarih = date("Y-m-d H:i:s");
	 
		 
		 $basvuru_ = Sorgu("SELECT basvuruno, REPLACE(yarisma_turu, '<br><br>', '<br>') AS yarismaturu FROM basvurular WHERE email = '$email' LIMIT 1");
		 $basvuru = Sonuc($basvuru_);
		 
		 if(say($basvuru_)) {
			  $_SESSION['fail'] = null;
			  $_SESSION['success'] = '<br><br>Başvuru No: <b style="font-weight:bold">'.$basvuru->basvuruno.
										'</b><br><br>Katılınan Yarışmalar: <br><b style="font-weight:bold">'.($basvuru->yarismaturu=='' ? 'Yok' : $basvuru->yarismaturu).'</b>';			  
		 }
		 else {
			  $_SESSION['fail'] = 'E-Mail adresi bulunamadı!'; 
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
					<h2 style="text-align:center">Başvuru Kodu Sorgulama</h2>   
			   </div>
			   
			   <br><br><br>
			   
			   <div class="row">
				   <div class="col-xs-12 form-wrap">
						<form method="post" action="" id="contact" onSubmit="return submitFunction()" enctype="multipart/form-data">
							<div class="form-group">
								<input type="email" name="email" class="form-control" style="text-transform:none" id="email" placeholder="E-Posta Adresiniz"
									<?= !empty($_SESSION['fail']) ? 'value="'.($_POST['email'] ?? '').'"' : '' ?> required />
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
									Yukarıdaki bilginin şahsıma ait ve doğru olduğunu kabul ederim.
							 </label>
							 							 
							 <br>
							</div>
						  
							<br><br><br><br>
						  
							<button type="submit" name="basvur" class="btn trans-btn"> Sorgula </button>
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
				  function () { document.location.href='basvuru_kod_sorgulama.html'; });";
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