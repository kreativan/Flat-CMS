<?php
require_once("login.php");

session_set_cookie_params(0, $path, $domain, false, true);
session_start();
$cmp_pass = md5($password);
$domain = $_SERVER['SERVER_NAME'];


if (crypt($cmp_pass,$_SESSION["mpass_pass-$path"] == $_SESSION["mpass_pass-$path"])) {
	unset($_SESSION["mpass_pass-$path"]);
	$_SESSION["mpass_attempts"] 	   = 0;
	$_SESSION["mpass_session_expires"] = 0;
	setcookie ("mpass_pass-$path","", time()+3600*24*3,$path, $domain, false, true);
}

header("Location: index.php");
die();
?> 