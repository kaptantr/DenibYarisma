<?php
//include("../system/ayar.php");
include "../system/fonksiyon.php";
if (isset($_POST['giris'])) {
    $sifre = p('sifre');
    $kullanici = p('kullanici');

    $giriskontrol = mysqli_query($GLOBALS['baglan'], "SELECT * FROM yonetici WHERE yonetici_kullanici ='$kullanici' AND yonetici_sifre ='$sifre'");
    $durum = mysqli_fetch_array($giriskontrol);
    if ($durum) {
        $son_giris = date("d.m.Y");
        $yonetici_id_sabit = $durum["yonetici_id"];

        if (isset($yonetici_id)) {
            $yonetici_guncelle = mysqli_query($GLOBALS['baglan'], "UPDATE yonetici SET
                                            yonetici_son_giris  =   '$son_giris'
                                            WHERE yonetici_id   =   '$yonetici_id'");
        }

        $_SESSION['yonetici_ad_soyad'] = $durum['yonetici_ad_soyad'];
        $_SESSION['yonetici_kullanici'] = $durum['yonetici_kullanici'];
        $_SESSION['yonetici_sifre'] = $durum['yonetici_sifre'];
        $_SESSION['yonetici_id'] = $yonetici_id_sabit;

        $bilgi = '

                         BAŞARILI!
                            Giriş yapılmıştır. yönlendiriliyorsunuz.

         ';

        echo '<meta http-equiv="refresh" content="1; url=anasayfa.html">';

    } else {
        $bilgi = '

                         HATA!
                            Kullanıcı Adı veya Şifreniz Yanlış.

        ';
    }
}

?>

<!DOCTYPE html>
<html lang="tr" class="no-js">
    <head>
        <meta charset="utf-8">
        <title><?php echo $ayar->site_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $ayar->site_title; ?></title>
        <meta name="keywords" content="<?php echo $ayar->site_meta; ?>" />
        <meta name="Title" content="<?php echo $ayar->firma_adi; ?>" />
        <meta name="page-topic" content="<?php echo $ayar->site_title; ?>" />

        <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">
        <link rel="mask-icon" href="../assets/images/safari-pinned-tab.svg" color="#29aed1">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- CSS -->
        <link rel='stylesheet' href='//fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="page-container">
            <h1>Yönetici Paneli </h1>
            <form action="" name="form1" method="post" id="form1">
                <input type="text" name="kullanici" class="username" placeholder="Kullanıcı Adı">
                <input type="password" name="sifre" class="password" placeholder="Şifreniz">
                <button type="submit" name="giris">Giriş Yap</button>
                <div class="error"><span>+</span></div>
            </form>
           <div class="connect">
                <p><?php echo $bilgi ?? ''; ?></p>
                <p>
                    <a class="facebook" target="_blank" href="<?php echo $ayar->facebook; ?>"></a>
                    <a class="twitter" target="_blank"  href="<?php echo $ayar->twitter; ?>"></a>
                </p>
            </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>