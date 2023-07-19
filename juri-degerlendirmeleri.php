<?php include("header.php");?>

<?php

    session_start();

    $orjUser = "Juri";
    $orjPass = "2021@";

    if($_POST && !isset($_POST['basvur']) && isset($_POST['user']) && isset($_POST['pass']))
    {
        $user = $_POST['user'];
        if($user == $orjUser)
        {
            $_SESSION['login_juri_user'] = $user;
        }
        else
        {
            exit("<script>setTimeout(function() { alert('Yanlış Kullanıcı Adı!'); document.reload();  }, 2000);</script>");
        }

        $pass = $_POST['pass'];
        if($pass == $orjPass)
        {
            $_SESSION['login_juri_pass'] = $pass;
        }
        else
        {
            exit("<script>setTimeout(function() { alert('Yanlış Şifre!'); document.reload(); }, 2000);</script>");
        }
    }

    if(!isset($_SESSION['login_juri_user']) || !isset($_SESSION['login_juri_pass']))
    {
        header('Location: juri-degerlendirmeleri-protect.html');
    }
    if((isset($_SESSION['login_juri_user']) && $_SESSION['login_juri_user'] != $orjUser) || (isset($_SESSION['login_juri_pass']) && $_SESSION['login_juri_pass'] != $orjPass))
    {
        header('Location: juri-degerlendirmeleri-protect.html');
    }


    if($_POST && isset($_POST['basvur'])) {
		 if(empty($_POST['juri'])) {
			  $_SESSION['fail'] = 'Juri seçimi boş bırakılamaz!';
			  $_SESSION['success'] = null; 
			  goto atla; 
		 }

		 if(empty($_POST['pafta'])) {
			  $_SESSION['fail'] = 'Pafta seçimi boş bırakılamaz!';
			  $_SESSION['success'] = null;
			  goto atla;
		 }

        if(empty($_POST['puan'])) {
			  $_SESSION['fail'] = 'Puan boş bırakılamaz!';
			  $_SESSION['success'] = null;
			  goto atla;
		 }

		 if($_POST['puan'] < 0) {
			  $_SESSION['fail'] = "Puan 0 dan küçük olamaz!";
			  $_SESSION['success'] = null;
			  goto atla;
		 }

		 if($_POST['puan'] > 10) {
			  $_SESSION['fail'] = "Puan 10 dan büyük olamaz!";
			  $_SESSION['success'] = null;
			  goto atla;
		 }

		 if(empty($_POST['kontrol'])) {
			  $_SESSION['fail'] = 'Kontrol onayı boş bırakılamaz!';
			  $_SESSION['success'] = null;
			  goto atla;
		 }

		 $juri = trim($_POST['juri']);
		 $pafta = trim($_POST['pafta']);
		 $puan = $_POST['puan'];
		 $kontrol = ($_POST['kontrol'] == 'on' ? 1 : 0);
		 $tarih = date("Y-m-d H:i:s");

		 /* $bilgi = Sorgu("SELECT * FROM degerlendirmeler WHERE pafta='$pafta' AND degerlendirme=1");
		 if(say($bilgi)) {
			  $_SESSION['fail'] = 'Bu pafta daha önce değerlendirilmiş!';
			  $_SESSION['success'] = null;
			  goto atla; 
		 } */
		 
		 		 
		 $basvuru_sorgu = Sorgu("INSERT INTO degerlendirmeler SET pafta = '$pafta', 
			   juri = '$juri', 
			   puan = '$puan', 
			   kontrol = '$kontrol', 
			   tarih = '$tarih', 
			   degerlendirme = 1"
		 ); 

		 $last_id = mysqli_insert_id($GLOBALS['baglan']);
		 if($last_id > 0) {
		     $_SESSION['fail'] = null;
             $_SESSION['success'] = 'Değerlendirmeniz kaydedildi<br><br>Değerlendirme No: <b style="font-weight:bold">DEG-'.$last_id.'</b>';
         }
		 else {
			  $_SESSION['fail'] = "Değerlendirmeniz kaydedilemedi!";
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
					<h2 style="text-align:center">Jüri Değerlendirmesi Yapınız</h2>   
			   </div>
			   
			   <br><br><br>
			   
			   <div class="row">
				   <div class="col-xs-12 form-wrap">
						<form method="post" action="" id="contact" onSubmit="return submitFunction()" enctype="multipart/form-data">							
							
							<div class="form-group">
                                <label for="juri" style="font-size:20px">Jüri Adı Soyadı:</label>
								<select name="juri" class="form-control" style="text-transform:capitalize" id="juri" required>
									<option value="" selected> </option>
									<option value="Cihan Bahar">Cihan Bahar</option> 
									<option value="Hüseyin Hüsnü Yaman">Hüseyin Hüsnü Yaman</option> 
									<option value="Ahu Barut">Ahu Barut</option> 
									<option value="Sertaç Ersayın">Sertaç Ersayın</option> 
									<option value="Mukaddes Başkaya">Mukaddes Başkaya</option> 
									<option value="Osman Nuri Kes">Osman Nuri Kes</option> 
									<option value="Erkan Demiroğlu">Erkan Demiroğlus</option> 
								</select>
							</div>
							
							<div class="form-group">
                                <label for="pafta" style="font-size:20px">Paftalar:</label>
                                <select name="pafta" class="form-control" style="text-transform:capitalize" id="pafta" required>
									<option value="" selected> </option>
									<?php
                                        foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/uploads/paftalar/*', GLOB_ONLYDIR) as $folder) {
                                            foreach (glob($folder . '/*.pdf') as $file) {
                                                $name = str_ireplace('.pdf', '', end(explode('/', $file)));
                                                echo '<option value="' . $name . '">' . $name . '</option>
                                              ';
                                            }
                                        }
									?>	
								</select>
							</div>
							
							
							<div class="form-group">
                                <label for="puan" style="font-size:20px">Değerlendirme Puanı: (1 ila 10 arasında bir puan veriniz)</label>
								<input type="tel" name="puan" class="form-control" id="puan" style="text-transform:none" placeholder="0.0" minlength="1"
                                       maxlength="2" oninput="this.value=this.value.replace(/[^\d\+]+/, '')" required />
							</div>

							<br><br><br><br>
						
							<div class="checkbox" style="font-size:14px;color:#333;line-height: normal;">
							 <label>
								<input id="kontrol" name="kontrol" type="checkbox" <?= !empty($_SESSION['fail']) ? 'value="on"' : '' ?> required />
									Yukarıdaki bilgileri kontrol ettim.
							 </label>
							 <br>
							</div>
						  
							<br><br><br><br>
						  
                            <button type="submit" name="basvur" class="btn trans-btn"> Gönder </button>
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
				  function () { document.location.href='juri-degerlendirmeleri.html'; });";
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