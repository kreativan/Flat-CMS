<?php
error_reporting(0);

include_once("../../config.php");

$today        = date("m.d.y");
$today_mk     = mktime(0,0,0,date('m'),date('d'),date('y'));  
$last_week_mk = mktime(0,0,0,date('m'),date('d')-7,date('y'));  

$uri = $_GET['uri'];
$ref = $_GET['ref'];

$all = $_SERVER['REMOTE_ADDR']."|".$uri."|".$ref."|".date('d')."|".date('m')."|".date('y')."\n";

$all = htmlspecialchars($all, ENT_QUOTES, 'UTF-8');
$all = str_replace("<","", $all);
$all = str_replace(">","", $all);

foreach ((glob("../../content/stats/*.txt")) as $fl) {
	
	$file    = basename($fl,".txt");	 	
	$month   = substr($file, 0,2);
	$day     = substr($file, 3,2);
	$year    = substr($file, 6,2);
	$file_mk = mktime(0,0,0,$month, $day, $year);

	if ($file_mk  < $last_week_mk) {
		unlink("../../content/stats/$file.txt");
		}			
}

$file_han = fopen("../../content/stats/$today.txt","a");
    fwrite($file_han,$all);
    fclose($file_han);