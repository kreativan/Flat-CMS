<?php
	
include_once("../../config.php");
require_once("login.php");

header('Content-type: application/json');
$files = glob('../../content/media/*.*');
$arr   = array();

foreach ($files as $file) {	
    $file = basename($file);
    $arr[] = array("thumb" => "$path/content/media/".$file, 'image'=> "$path/content/media/".$file);
}

exit(str_replace('\/','/',json_encode($arr)));
?>