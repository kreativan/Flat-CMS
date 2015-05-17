<?php
require_once("login.php");

	$last = count($fname);

	echo "<a href='$path/$admin'>$lang_nav_home</a>";
	foreach ($fname as $level){
		
		    switch ($level) {
            case 'blog':
            $base_output = $lang_nav_blog;
            break;
            
            case 'blocks':
            $base_output = $lang_nav_blocks;
            break;
    
            case 'media':
            $base_output = $lang_nav_img;
            break;
            
            case 'pages':
            $base_output = $lang_nav_pages;
            break; 
            
            default: 
            $base_output = $level;
            break;          
           }
		
		$i++;
				
		if ($level == $last_level && $last == $i){ 
			
			if (!empty($ext)){ $base_output = $level.$ext; }
			echo ' / '.$base_output; 
	    }
	    else { 
		    $all_levels[] = $level;
		    $all = implode('/', $all_levels);
		    echo " / <a href='$path/$admin/?p=home&f=$all'>".$base_output."</a>";
		}	    
	}
?>