<?php include("header.php");?>

<?php

    session_start();

    $orjUser = "Pafta";
    $orjPass = "2021@";

    if($_POST && !isset($_POST['basvur']) && isset($_POST['user']) && isset($_POST['pass']))
    {
        $user = $_POST['user'];
        if($user == $orjUser)
        {
            $_SESSION['login_pafta_user'] = $user;
        }
        else
        {
            exit("<script>setTimeout(function() { alert('Yanlış Kullanıcı Adı!'); document.reload();  }, 2000);</script>");
        }

        $pass = $_POST['pass'];
        if($pass == $orjPass)
        {
            $_SESSION['login_pafta_pass'] = $pass;
        }
        else
        {
            exit("<script>setTimeout(function() { alert('Yanlış Şifre!'); document.reload(); }, 2000);</script>");
        }
    }

    if(!isset($_SESSION['login_pafta_user']) || !isset($_SESSION['login_pafta_pass']))
    {
        header('Location: yarisma-paftalar-protect.html');
    }
    if((isset($_SESSION['login_pafta_user']) && $_SESSION['login_pafta_user'] != $orjUser) || (isset($_SESSION['login_pafta_pass']) && $_SESSION['login_pafta_pass'] != $orjPass))
    {
        header('Location: yarisma-paftalar-protect.html');
    }

?>

	<div id="content" style="padding: 50px;">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
        <link rel="stylesheet" href="assets/css/jquery.simplefilebrowser.css">

        <div id="files" style="min-height:800px"></div>    
	</div>

	<style>
		.sfb .sfbBreadCrumbs {
			background: #f5f5f5;
			margin: 0!important;
			padding: 10px 20px 40px 10px;
		}
		.sfb.x32 .sfbContent.icon li {
			width: auto;
		}
	</style>

	<script src="assets/js/simplefilebrowser.js?v=3"></script>
	<script>
		$(document).ready(function() {
				
			let files = {
				"/": [
			<?php
				foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/uploads/paftalar/*', GLOB_ONLYDIR) as $folder) {
				  echo '{
							"name": "' . end(explode('/', $folder)) . '",
							"type": "folder"
						},
						';			  
			   }
		   
			?>	
				],
			<?php
				foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/uploads/paftalar/*', GLOB_ONLYDIR) as $folder) {
					echo '"/' . end(explode('/', $folder)) . '": [
					';
					foreach (glob($folder . '/*.pdf') as $file) {
					  echo '{
								"name": "' . end(explode('/', $file)) . '",
								"type": "pdf"
							},
							';			  
				   }
				   echo '],
					';
			   }
		   
			?>	
			};
			
			$("#files").simpleFileBrowser({
				json: files,
				path: '/',
				view: 'icon',
				select: false,
				breadcrumbs: true,
				onSelect: function (obj, file, folder, type) {
					//$("#select").html("You select a " + type + " " + folder + '/' + file);
				},
				onOpen: function (obj, file, folder, type) {
					if (type == 'file') {
						var w = window.open('uploads/paftalar' + folder + '/' + file);
					}
				}
			});
		});

	</script>
<?php include("footer.php");?>