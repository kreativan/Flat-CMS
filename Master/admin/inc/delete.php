<?php

require_once("login.php");

session_start();

if (isset($_POST['savepath']) && !(empty($_POST['savepath']))
    && isset($_SESSION["token"]) && !(empty($_POST['token']))
    && isset($_POST["token"]) && !(empty($_POST['token']))
    && isset($_POST["go_back"]) && !(empty($_POST['go_back']))
    && $_SESSION["token"] == $_POST["token"]
    && isset($_POST['folder'])
    && isset($_POST['ext'])){
	
	if (file_exists($_POST['savepath']) && strstr($_POST['ext'],'.')){
	    
	    $del = explode('/', $_POST['folder']);
	    
	    if ($del[0] == 'media'
	        && !empty($del[1])
			&& !empty($del[2])
			&& file_exists("../content/".$del[0].'/'.$del[1].'/gallery.txt') ){
			
			$opFile = "../content/".$del[0].'/'.$del[1].'/gallery.txt';
				
			$fp   = fopen($opFile,"r");
			$data = @fread($fp, filesize($opFile));
			fclose($fp);
        
			$line = explode("\n", $data);
			$no_of_posts = count($line)-1;
                               
			for ($i = 0; $i < $no_of_posts; $i++) {
				$image = explode("|", $line[$i]);
				
				if($image[0] == $del[2]){ } else { $new_data .= $image[0] ."|". $image[1]."|". $image[2] ."\n"; }		    
			} 
			if ($fp = @fopen($opFile,"w")) {
				$success = fwrite($fp, $new_data);
				fclose($fp);
			}	   
		}	    
	    unlink($_POST['savepath']);
	    header("Location:index.php?p=home&f=".$_POST['go_back']);
	    die();
	}	

	else if (file_exists($_POST['savepath'].'/') && !strstr($_POST['ext'],'.')){

        function delTree($dir) {
             foreach (glob($dir.'*') as $file){ 
	             $fileext = explode('/', $file);	             
                 if (!strstr(end($fileext),'.')){ 
                     delTree($file.'/'); 
                 }else{
                      unlink($file);
                 }    
              }
              rmdir($dir);
         }
        
         delTree($_POST['savepath'].'/');
     	 header("Location:index.php?p=home&f=".$_POST['go_back']);
	     die();     
     }
     
     else {
	     header("Location:index.php?p=home&f=".$_POST['go_back']);
	     die();
     }     
}

else{
	
	$ext = '';
    if (!empty($_GET['e'])){ $ext = '.'.$_GET['e']; }
	
    if (empty($_GET['d']) 
    || !isset($_GET['d'])
    || !file_exists("../content/".$_GET['d'].$ext)) {
	    header("Location:index.php?p=home");
	    die(); 
	    
    } else {
	    
	    $savepath = "../content/".$_GET['d'].$ext ;
	    $folder   = $_GET['d'].$ext;
	    $back  = explode('/', $folder);
	    $back = array_slice($back, 0, -1);
	    $go_back = implode("/",$back);
	    	
    }
    if (!empty($savepath) && file_exists($savepath)) {    	
	    echo "<div class='banner'>$lang_delete<span>". $folder .'</span> ?</div>';
		
    	if (empty($_SESSION["token"])) { $_SESSION["token"] = md5(uniqid(rand(), TRUE)); } ?>
        
        
        
        <form class="delete-form" name="textfile" method="post" action="">	
        <a onclick="history.go(-1)"; class="btn cancel"><?php echo $lang_cancel;?></a>
        <input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
	    <input type="hidden" name="savepath" value="<?php echo $savepath; ?>">
	    <input type="hidden" name="folder" value="<?php echo $folder; ?>">
	    <input type="hidden" name="go_back" value="<?php echo $go_back; ?>">
	    <input type="hidden" name="ext" value="<?php echo $ext; ?>">
	    <button class="btn" type="submit" name="savetext"><?php echo $lang_del_button;?></button>
        </form>            
        <?php
     }
}
?>	