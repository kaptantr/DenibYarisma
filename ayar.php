<?php 
	session_start();
	ob_start();
	
	ini_set('magic_quotes_runtime', 0);

	global $baglan, $debug, $public;
	$GLOBALS['debug'] = true;
	$GLOBALS['public'] = true;
	
	if(isset($_GET['debug']) || $debug) {
		error_reporting(E_ALL);
		ini_set('display_startup_errors', 1);
		ini_set('display_errors', 1);
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	} else {
		error_reporting(0);
		ini_set('display_startup_errors', 0);
		ini_set('display_errors', 0);
		mysqli_report(MYSQLI_REPORT_OFF);
	}
	
	if($public) {
		define('DB_HOST', "localhost");
		define('DB_USER', "mesut");
		define('DB_PASSWORD', "");
		define('DB_NAME', "yarisma");
	} else {
		define('DB_HOST', "localhost");
		define('DB_USER', "root");
		define('DB_PASSWORD', "");
		define('DB_NAME', "denibyarisma");
	}
	
	## Mysqli Bağlantısı ##
	$GLOBALS['baglan'] = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die (mysqli_error());

	
	## Karakter Sorunu ##
	mysqli_query($GLOBALS['baglan'], "SET CHARACTER SET 'utf8'");
	mysqli_query($GLOBALS['baglan'], "SET NAMES 'utf8'");
	
	
?>
