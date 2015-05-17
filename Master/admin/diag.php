<?php session_start(); ?>

<?php include_once("../config.php"); ?>

<style>
body {
	font-family: sans-serif;
	line-height:1.4;
	padding: 20px;
	color: #333;
}
</style>

<h1>Pulse CMS Diagnostic Tool</h1>

<hr>

<h2>System Requirements</h2>

<p>Basic system requirements are an apache server with PHP 5 installed.</p>

<?php

function my_ini_get($name) {        
	$setting = (ini_get($name));        
	$setting = ($setting==1 || $setting=='On') ? 'On' : 'Off';
	return $setting;
	}

?>
<p><b>Server Type:</b> <?php print $_SERVER['SERVER_SOFTWARE']; ?><br> 
<b>PHP Version:</b> <?php print phpversion()?><br>
<b>File Uploads:</b> <?php print my_ini_get('file_uploads'); ?><br>
<b>Safe Mode:</b> <?php print my_ini_get('safe_mode'); ?><br>
<b>Magic Quotes:</b> <?php if(get_magic_quotes_gpc()) echo "On"; else echo "Off"; ?><br>
<b>GD Support:</b> <?php 

	if(!function_exists("gd_info")){ 
		print "Off";
		} 
	else{
		if(function_exists("gd_info")){ 
			print "On"; 
			}
		}	
?><br>
<b>Zip Extension:</b> <?php if (extension_loaded('zip')) { echo "On"; } else{ echo "Off"; } ?></p> 

<hr>

<h2>Permissions Check</h2>

<p>Folders should have at least 755 and files 644 permissions.</p>

<?php clearstatcache(); ?>

content - <?php echo substr(sprintf('%o', fileperms('../content')), -4); ?><br>
content/blocks - <?php echo substr(sprintf('%o', fileperms('../content/blocks')), -4); ?><br>
content/blog - <?php echo substr(sprintf('%o', fileperms('../content/blog')), -4); ?><br>
content/media - <?php echo substr(sprintf('%o', fileperms('../content/media')), -4); ?><br>
data/pages - <?php echo substr(sprintf('%o', fileperms('../content/pages')), -4); ?><br>
config.php - <?php echo substr(sprintf('%o', fileperms('../config.php')), -4); ?><br><br>

<hr>

<h2>Path Setting</h2>

<p>This is where Pulse is installed. If you installed Pulse in the root, it should should a blank space. If you are using Pulse inside a sub-folder, it shoud be set as "/sub".</p>

<p><b>Path Name:</b> " <?php echo $path; ?>"</p>

<hr>

<h2>.Htaccess Check</h2>

<p>The .htaccess file is required for Pulse to work properly. If the file is missing, use the sample.htaccess file. Just remove the sample part and place it in the app root along with the index.php and config.phh files.</p>

<p><?php
$filename = '../.htaccess';

if (file_exists($filename)) {
    echo "<b>The .htaccess file exists.</b>";
} else {
    echo "<b>The .htaccess file does not exist.</b>";
}
?></p>

<hr>

<h2>Session Handling</h2>

<p>If sessions are not working properly, it can cause problems with logging in and viewing blocks, etc.</p>

<?
if($_GET["test"] == '1'){
	
	if($_SESSION['atest'] == 'yes'){
	
		echo('<b>Your hosting supports sessions</b>');
		
		} else echo('<b>Your hosting does not support sessions</b>');
		
	} else {
			
			$_SESSION['atest'] = 'yes';
			echo '
				<head>
				<script>
					<!--
					function delayer(){
						window.location = "'.$_SERVER['PHP_SELF'].'?test=1";
					}
					//-->
				</script>
				</head>
				<body onLoad="setTimeout(\'delayer()\', 2000)">
				<br><br>
					Please wait...
				</body>
				';
		}
?>
<br><br><br><br>