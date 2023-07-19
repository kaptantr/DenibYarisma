<?php include("header.php");?>
		
	<?php
if(isset($_POST['mesajgonderr'])){
	$isim	=	p('isim');
	$email	=	p('email');
	$konu	=	p('konu');
	$mesaj	=	p('mesaj');
	$telefon	=	p('telefon');
	$ip		= 	ip();
	$t		= 	date("Y-m-d H:i:s");
	$tarih	= 	tarih($t);

	if(empty($isim) || empty($email) || empty($mesaj))
	{
		$bilgim = '  <div class="hata">
					Gerekli alanları doldurunuz..!
					</div>
				' ;
	} else {
		$ekle	=	Sorgu("INSERT INTO iletisim SET
							isim	=	'$isim',
							email	=	'$email',
							konu	=	'$konu',
							mesaj	=	'$mesaj',
							telefon	=	'$telefon',
							ip		=	'$ip',
							tarih	=	'$tarih'");
		if($ekle){
			
			$bilgim = '    <div class="success-box">
					<div class="alert alert-success">Başarılı. Mesajınız başarıyla gönderildi. Teşekkürler.</div>
				</div>
					' ;	

		} else {
			$bilgim = '  <div class="error-box">
					<div class="alert alert-warning">Hata oluştu. Lütfen tekrar deneyiniz.</div>
				</div>
					' ;	
		}
	}
	
}?>	  
 
   <iframe src="<?php echo $ayar->google_maps; ?>" width="100%" height="384px" frameborder="0" style="border:0" allowfullscreen></iframe>    
   
	<!--Content Area Start-->
	<div id="content">
		<div class="row">
			<div class="col-md-8" style="padding-right: 0;">
				<section class="contact-from">
					<div style="display: none" id="success"></div>
					<div class="heading-wrap top-one">
						<h2>İLETİŞİM FORMU</h2>
						<span> <?php echo $bilgim ?? '';?></span>
					</div>
					<br>
					<br>
					<div class="row">
						<div class="col-xs-12 form-wrap">
							<form  method="post" action="" novalidate id="contact">
								<!-- <div ng-bind="successsubmissionMessage" id="success"></div> -->
								<div class="form-group">
									<input type="text" name="isim" class="form-control" id="isim" placeholder="Adınız ve Soyadınız *" data-ng-model="formData.name" required="" data-ng-pattern = "/^[a-zA-Z]/" data-ng-class="{'error' : contactForm.name.$error.pattern || contactForm.$submitted && contactForm.name.$invalid && successStatus}"/>
								</div>
								
								<div class="form-group">
									<input type="email" name="email" required="" class="form-control" id="email" placeholder="E-Posta Adresiniz *" data-ng-model="formData.email" data-ng-pattern = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/" data-ng-class="{'error' : contactForm.email.$error.pattern || contactForm.$submitted && contactForm.email.$invalid && successStatus}"/>
								</div>
								<div class="form-group">
									<input type="text" name="telefon" required="" class="form-control" id="telefon" placeholder="Telefon Numaranız *" data-ng-model="formData.phoneNo" data-ng-pattern = "/^[0-9]/" data-ng-class="{'error' : contactForm.phoneNo.$error.pattern || contactForm.$submitted && contactForm.phoneNo.$invalid && successStatus}">
								</div>
								<?php /*<div class="form-group textarea-grp">
									<select class="form-control" name="konu" id="konu" data-ng-model="formData.selectOption"  data-ng-class="{'error' :selectOption }" data-ng-change = "checkOption()">
										 <option value="" selected="selected">Hizmet Seçiniz *</option>
									<?php 
									 $haberSorgu = mysqli_query($GLOBALS['baglan'], "SELECT * FROM hizmetler WHERE durum = 1 ORDER BY id DESC");
									 while($haberSonuc = mysqli_fetch_object($haberSorgu)){
									?>  
										<option value="Konu - <?php echo $haberSonuc->adi;?>"><?php echo $haberSonuc->adi;?></option>													   
									<?php }?>									 
												 
									 </select>
								</div>*/ ?>
								<div class="form-group">
									<textarea cols="1" rows="1" name="mesaj" placeholder="Mesajınız *" id="textarea-form" class="form-control" data-ng-model="formData.message" required data-ng-class="{'error' : contactForm.textarea.$error.required && contactForm.textarea.$blured || contactForm.$submitted && contactForm.textarea.$invalid && successStatus}"></textarea>
								</div>
								
							  <!-- <div style="color: red"  ng-bind = "message"> Please fill the value  </div>-->
								<button type="submit" name="mesajgonderr" class="btn trans-btn sub-btn-contact" data-ng-click = "submitcotactusForm(contactForm.$invalid)">
									Gönder
								</button>
							</form>

						</div>
						<div class="col-xs-12 triangle-img" style="margin-top: -90px;">
							<img src="assets/svg/triangle.svg" alt="yellow-triangel" class="triangle-svg pos-r svg"/>
							<img src="assets/images/sky-blue-triangle.png" alt="sky-triangel" class="blue-triangle">
						</div>

					</div>
				</section>
			</div>
			
			<div class="col-md-4 no-padding">
				<!-- Map Section -->
				<div class="map-info-right">
					<ul>
						<li>
							<span aria-hidden="true" class="icon-pointer map-ico-o"></span>
							<span class="label-map-contnet"> 
								<span><?php echo $ayar->firma_adres ?? ''; ?>
							</span>
						</li>
						<li>
							<span aria-hidden="true" class="icon-screen-smartphone map-ico-o"></span>
							<span class="label-map-contnet"> 
								<?php echo $ayar->firma_tel ?? ''; ?>
							</span>
						</li>
						<?php /*<li>
							<span aria-hidden="true" class="icon-call-out map-ico-o"></span>
							<span class="label-map-contnet"> 
								<?php echo $ayar->firma_fax ?? ''; ?> 
							</span>
						</li>*/ ?>
						<li>
							<span aria-hidden="true" class="icon-envelope-open  map-ico-o"></span>
							<span class="label-map-contnet"> 
								<?php echo $ayar->firma_email ?? ''; ?>
							</span>
						</li>
					</ul>
				</div>
				<!-- contact-form section start here -->
			</div>
		</div>
	</div>
	<script src="assets/js/app.js"></script>
	<!--Content Area End-->
<?php include("footer.php");?>