<?php

require_once("login.php");

session_start();

//save new file or folder
if (isset($_POST['newname']) && !(empty($_POST['newname'])) 
    && isset($_POST['savepath']) && !(empty($_POST['savepath']))
    && isset($_SESSION["token"]) && !(empty($_POST['token']))
    && isset($_POST["token"]) && !(empty($_POST['token']))
    && $_SESSION["token"] == $_POST["token"]
    && isset($_POST['savetext'])
    && isset($_POST['folder'])){
    
    //create txt files
    if(!file_exists($_POST['savepath'].$_POST['newname']) && strstr($_POST['newname'],'.txt')){
    	
    	$count_subfoldes = explode('/', $_POST['folder']);
		
		if ($count_subfoldes[0] == 'media' || $_POST['folder'] == 'media' ) { 
		    echo $lang_error_create_ext; 
		 }
    	else {
        	$fp = @fopen($_POST['savepath'].$_POST['newname'], "w");
			$file = explode(".", $_POST['newname']);		 	
			if ($fp) {
	        	fwrite($fp, '');
				fclose($fp);
				header("Location:index.php?p=open&f=".$_POST['folder']."/".$file[0]."&e=txt");
				die();
			} 
	    } 
	} 
	
	//reject any other files than txt
	else if (!file_exists($_POST['savepath'].$_POST['newname']) 
	    && strstr($_POST['newname'],'.') 
	    && !strstr($_POST['newname'],'.txt')){
		$_SESSION['error'] = '<p class="errotMsg">'.$lang_error_create_ext.'</p>';
		$_SESSION['directory'] = $_POST['folder'];
		header("Location:index.php?p=create");
		die();
	}
	
	else if (!(strstr($_POST['newname'],'.')) && $_POST['folder'] == 'blog') { 
		echo $lang_blog_error_folder;
	}
	
	//create folder @ 775
	else if(!file_exists($_POST['savepath'].$_POST['newname']) && !(strstr($_POST['newname'],'.')) ){
	    @mkdir($_POST['savepath'].$_POST['newname'], 0775);
		header("Location:index.php?p=home&f=".$_POST['folder'].'/'.$_POST['newname']);
		die();	
	}
	else { echo $lang_error_file_exists; }	
}


//show form if folder name exists
else {
	
    if (empty($_SESSION['directory']) || !(isset($_SESSION['directory']))) {
	    header("Location:index.php?p=home");
	    die(); 
    }

    if (!empty($_SESSION['directory']) && file_exists("../content/".$_SESSION['directory'])){
	    $savepath = "../content/".$_SESSION['directory'].'/' ;
	    $folder = $_SESSION['directory'];
	    unset($_SESSION['directory']);	
    }

    if (!empty($savepath) && file_exists($savepath)) {    	
	    
	    $fname = explode('/',$folder);
	    $last_level = end($fname);
	    $full_path  = $folder;
	    
	    echo "<div class='breadcrumb'>";
			include('breadcrumbs.php'); 
		echo "</div>";
	    
	    if (!(empty($_SESSION['error']))) { echo $_SESSION['error']; unset($_SESSION['error']);}
				
    	if (empty($_SESSION["token"])) { $_SESSION["token"] = md5(uniqid(rand(), TRUE)); } ?>
        <form class="create-form" name="textfile" method="post" action="">	
        <input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
	    <input type="hidden" name="savepath" value="<?php echo $savepath; ?>">
	    <input type="hidden" name="folder" value="<?php echo $folder; ?>">
	    <input type="text" name="newname" placeholder="<?php echo $lang_create_file_or_folder; ?>" >
	    <button class="btn" type="submit" name="savetext"><?php echo $lang_create_button; ?></button>
	    <a href="#" class="tooltip" alt="<?php echo $lang_create_tool_tip; ?>">?</a>
        </form>    
        <?php
     }
}