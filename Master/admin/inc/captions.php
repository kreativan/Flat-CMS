<?php

require_once("login.php");

if ($fname[0] =='media' && !empty($fname[2])){ $gallery = $fname[1]; }

$check_in  = array();
$check     = array();
$all_files = glob("../content/media/". $gallery ."/*");
$opFile    = "../content/media/". $gallery ."/gallery.txt";
$c         = count($all_files)-1;
    
if (file_exists($opFile)) {
    $fp   = fopen($opFile,"r");
	$data = @fread($fp, filesize($opFile));
    fclose($fp);
        
    $line = explode("\n", $data);
    $no_of_posts = count($line)-1;
                               
	for ($i = 0; $i < $no_of_posts; $i++) {
        $image    = explode("|", $line[$i]);
		$images[] = $image;		    
	}
	    
	$nb = count($images);
}

if (isset($_POST['image']) && isset($_POST['caption'])) {
    $image_id    = $_POST['image'];
    $caption_new = $_POST['caption'];    
    $caption_new = str_replace(array("\n","\r")," ", $caption_new);
            
    if (file_exists($opFile)) {            
        for ($i = 0; $i < $no_of_posts; $i++) {
        	$caption = $images[$i][2]; 
               
            if ($image_id == $images[$i][0]) { $caption = $caption_new; }  
				$check_in[] = $images[$i][0];
                $new_data  .= $images[$i][0] ."|". $images[$i][1]."|". $caption ."\n";
                $images[$i][2] = $caption;
        }
    } 
	if (!in_array($image_id, $check_in)){ 
	    $new_data .= $image_id ."|". ''."|". $caption_new ."\n";
	    $images[$i][2] = $caption_new;
    }           
    if ($fp = @fopen($opFile,"w")) {
       	$success = fwrite($fp, $new_data);
        fclose($fp);
    }
}     
if (file_exists($opFile)) {       
	for ($i = 0; $i < $nb; $i++) {		
		$check[] = '../content/media/'.$gallery.'/'.$images[$i][0];	

		if ($images[$i][0] == $last_level.$ext) {
			?><form id="caption_form" action="" method="post"><?php
			echo '<textarea name="caption" placeholder="'.$lang_gal_caption_gallery.'">'. $images[$i][2] .'</textarea>';
			echo '<input type="hidden" name="image" value="'. $images[$i][0] .'" />';
			echo '<br><button type="submit" class="btn">'.$lang_save.'</button>'; 
			?> </form> <?php  
		}
	}
}
if (in_array('../content/media/'.$gallery.'/'.$last_level.$ext, $all_files) 
	&& !in_array('../content/media/'.$gallery.'/'.$last_level.$ext, $check)
	&& $fname[0] =='media' 
	&& !empty($fname[2]) ){
		  
	?><form id="caption_form" action="" method="post"><?php
			echo '<textarea name="caption" placeholder="'.$lang_gal_caption_gallery.'">'.$caption_new.'</textarea>';
			echo '<input type="hidden" name="image" value="'. $last_level.$ext .'" />';
			echo '<br><button type="submit" class="btn">'.$lang_save.'</button>'; 
	?></form><?php 
}