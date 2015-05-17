<?php

require_once("login.php");

session_start();	
if (isset($_POST['token']) && !empty($_POST['token'])
    && isset($_POST['filename']) && !empty($_POST['filename'])
    && isset($_POST['rename']) && !empty($_POST['rename'])) {
	    
	    $rename = str_replace(' ', '_', $_POST['rename']);
	    $rename = str_replace('.', '', $_POST['rename']);	    
	    if (strlen($rename) > 200) { $rename = substr($rename, 0, 199); }
	    
	    if (file_exists("../content/".$_POST['main_folder'].$rename.$_POST['ext'])){
	    
	        $_SESSION['rename-error'] = "File already exists";
	        header("Location:index.php?p=rename&d=".$_POST['fullpath']."&e=".$_POST['ext']);
	        die();	    
         }	
	        
	        $old = "../content/".$_POST['fullpath'].$_POST['ext'];	        
	        $new = "../content/".$_POST['main_folder'].$rename.$_POST['ext'];
		      		      		        
	        rename($old, $new);
	        header("Location:index.php?p=home&f=".$_POST['filename']);
	        die();	
}	
	
	
	
else if ($_GET['d'] && !empty($_GET['d'])){
    $fname      = explode('/',$_GET['d']);		
	$ext        = (!empty($_GET['e'])) ?  $_GET['e'] : '';
	
	$filepath   = "../content/".$_GET['d'].$ext;
	
	$last_level = end($fname);
	$full_path  = $_GET['d'];
	$basic_path = array_slice($fname,0, -1);
	$basic_path = implode('/', $basic_path);
	
	$changable  = array_slice($fname,1);
	$main_folder= array_slice($fname,0,1);
	$main_folder= implode('/', $main_folder).'/';
	$changable  = implode('/', $changable);
	
	echo "<div class='breadcrumb'>";	
    	include('breadcrumbs.php');	
    echo "</div>";
	echo $_SESSION['rename-error'];	
	unset($_SESSION['rename-error']);
	
?>	
	<form class="rename-form" name="rename" method="post" action="">
	<?php if (empty($_SESSION["token"])) { $_SESSION["token"] = md5(uniqid(rand(), TRUE)); }?>	
	<input type="hidden" name="filename" value="<?php echo $basic_path; ?>">
	<input type="hidden" name="main_folder" value="<?php echo $main_folder; ?>">
	<input type="hidden" name="fullpath" value="<?php echo $full_path; ?>">
	<input type="hidden" name="ext" value="<?php echo $ext; ?>">
	<input type="text" name="rename" class="rename-file" value="<?php echo $changable; ?>">
	<input type="hidden" name="token" value="<?php echo $_SESSION["token"] ?>">
	<input type="submit" name="submit" value="<?php echo $lang_rename_btn; ?>" class="btn">				
</form>
	
<?php } ?>	