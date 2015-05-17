<?php
$block = $tag_var1;

ob_start();	
include("content/blocks/$block.txt");
$home  = ob_get_contents();
ob_end_clean();

unset($block);
unset($tag_var1);

if (preg_match_all("/".'(\\{)'.'(\\{)'.'.*?'.'(\\})'.'(\\})'."/", $home, $m)){ 	

    foreach ($m[0] as $get_block1){	      
	    $get_block = $get_block1;
	    $get_block = str_replace("{", "" ,$get_block); 
        $get_block = str_replace("}", "" ,$get_block);  
	      	      
	    if (substr_count($get_block, ':') >=1 ){ 		    		    
            $exp = explode(':', $get_block); 
            $vars = array_slice($exp, 1); 
            $tag_var1 = (!empty($vars[0])) ? $vars[0] : '';
            $tag_var2 = (!empty($vars[1])) ? $vars[1] : '';
            $tag_var3 = (!empty($vars[2])) ? $vars[2] : '';
            $get_block = $exp[0];
	    } 
	    ob_start();	
        include("inc/tags/$get_block.php");
        $new  = ob_get_contents();
        $home = str_replace($get_block1, $new, $home);
        ob_end_clean();
    }
}        
echo $home;
?>