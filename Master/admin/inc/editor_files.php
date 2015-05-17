<?php

include_once("../../config.php");
require_once("login.php");

copy($_FILES['file']['tmp_name'], '../../content/media/'.$_FILES['file']['name']);
					
$array = array(
    'filelink' => $path.'/content/media/'.$_FILES['file']['name'],
    'filename' => $_FILES['file']['name']
);
 
echo stripslashes(json_encode($array));	
?>