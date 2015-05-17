<?php

$max_session_time 	= 36000;
$cmp_pass 			= md5($password);
$max_attempts 		= 15;
$session_expires 	= !empty($_SESSION["mpass_session_expires"])?$_SESSION["mpass_session_expires"]:'';
$timestamp_old 		= time() - (60*60);
$token_check 		= false;
$max_attempts++;
$domain = $_SERVER['SERVER_NAME'];

session_set_cookie_params(0, $path, $domain, false, true);
session_start();

if(isset($_COOKIE["mpass_pass-$path"])){
    $_SESSION["mpass_pass-$path"] = $_COOKIE["mpass_pass-$path"];

}

//check token
if(isset($_POST["log_token"])){
	
  if(isset($_SESSION["log_token"]) 
  	&& isset($_SESSION["log_token_time"]) 
  	&& $_SESSION["log_token"] == $_POST["log_token"]) {

    if($_SESSION["log_token_time"] >= $timestamp_old) {
		$token_check = true;
	}
   }			
   unset($_SESSION["log_token"]);	
   $_SESSION["log_token_time"]='';
}

if(!isset($_POST["log_token"]) || $_SESSION["log_token_time"] <= $timestamp_old) {		
	$_SESSION["log_token"] = md5(uniqid(rand(), TRUE));	
	$_SESSION["log_token_time"] = time();
}

if(!empty($_POST["mpass_pass"])) {
    if ((md5($_POST["mpass_pass"]) == $cmp_pass) && $token_check == true) {
    
    	$_SESSION["mpass_pass-$path"] = crypt(md5($_POST["mpass_pass"]));
		setcookie ("mpass_pass-$path", crypt(md5($_POST["mpass_pass"])), time()+3600*24*7,$path, $domain,false, true);
		header("Location: index.php");
		die();
    }
   } 

//if no failed attempts yet, set to 0
if (empty($_SESSION["mpass_attempts"])) {	
	$_SESSION["mpass_attempts"] = 0;	
}

//failed attempt or session expired
if (($max_session_time > 0 
	&& !empty($session_expires) 
	&& time() > $session_expires) 
	|| empty($_SESSION["mpass_pass-$path"]) 
	|| crypt($cmp_pass,$_SESSION["mpass_pass-$path"]) != $_SESSION["mpass_pass-$path"] ) {

	sleep(1);
	
	if (crypt($cmp_pass,$_SESSION["mpass_pass-$path"]) != $_SESSION["mpass_pass-$path"]) {	
		$_SESSION["mpass_attempts"]++;
	}
	
	if($max_attempts >1 && $_SESSION["mpass_attempts"] >= $max_attempts) {
	    
		exit("Too many login failures.");
	}

	$_SESSION["mpass_session_expires"] = "";
?>
<!DOCTYPE html>
<html>
<head>

    <title><?php echo $lang_title; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="css/admin.css" media="all">
    <link rel="stylesheet" href="css/animate.css" />
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <link rel="stylesheet" href="../ivm/system/assets/css/ivm-login.css" />
</head>

<body id="login-page">

<div id="login-form" class="animated fadeInDown">
<img src="img/logo.svg">
    <form name="login" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="login">
    <?php if (!empty($_POST["mpass_pass"]) && (md5($_POST["mpass_pass"]) != $cmp_pass)) {
            echo "<p class='errorMsg animated shake'>$lang_login_incorrect</p>";
	      }
	 ?>
    	<input type="password" size="27" name="mpass_pass" placeholder="<?php echo $lang_login_password;?>" autofocus>
        <input type="hidden" name="log_token" value="<?php echo $_SESSION["log_token"] ?>">
        <button class="btn login-btn"><?php echo $lang_login_button;?></button>
    </form>
</div>

</body>

</html>
<?php 
exit();
}
$_SESSION["mpass_attempts"]        = 0;
$_SESSION["mpass_session_expires"] = time()+$max_session_time;
?>