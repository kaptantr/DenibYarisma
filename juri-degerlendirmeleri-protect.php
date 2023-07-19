<!DOCTYPE html>
<html lang="tr" class="no-js">
<head>
    <title>Juri Değerlendirme Sayfası Şifre Koruması</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <style>
        body
        {
            margin:0 auto;
            padding:0px;
            text-align:center;
            width:100%;
            font-family: "Myriad Pro","Helvetica Neue",Helvetica,Arial,Sans-Serif;
            background-color:#8A4B08;
        }
        #wrapper
        {
            margin:0 auto;
            padding:0px;
            text-align:center;
            width:995px;
        }
        #wrapper h1
        {
            margin-top:50px;
            font-size:45px;
            color:white;
        }
        #wrapper p
        {
            font-size:16px;
        }
        #logout_form input[type="submit"]
        {
            width:250px;
            margin-top:10px;
            height:40px;
            font-size:16px;
            background:none;
            border:2px solid white;
            color:white;
        }
        #login_form
        {
            margin-top:200px;
            background-color:white;
            width:350px;
            margin-left:310px;
            padding:20px;
            box-sizing:border-box;
            box-shadow:0px 0px 10px 0px #3B240B;
        }
        #login_form h1
        {
            margin:0px;
            font-size:25px;
            color:#8A4B08;
        }
        #login_form input[type="text"], #login_form input[type="password"]
        {
            width:250px;
            margin-top:10px;
            height:40px;
            padding-left:10px;
            font-size:16px;
        }
        #login_form input[type="submit"]
        {
            width:250px;
            margin-top:10px;
            height:40px;
            font-size:16px;
            background-color:#8A4B08;
            border:none;
            box-shadow:0px 4px 0px 0px #61380B;
            color:white;
            border-radius:3px;
        }
        #login_form p
        {
            margin:0px;
            margin-top:15px;
            color:#8A4B08;
            font-size:17px;
            font-weight:bold;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <form method="post" action="juri-degerlendirmeleri.php" id="login_form">
        <h1>Jüri Değerlendirme Giriş</h1>
        <br>
        <input type="text" autocomplete="off" name="user" />
        <input type="password" autocomplete="off" name="pass" placeholder="*******" />
        <br>
        <input type="submit" name="submit" value="GİRİŞ">
    </form>
</div>
</body>
</html>