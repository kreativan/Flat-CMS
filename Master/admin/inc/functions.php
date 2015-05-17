<?php

require_once("login.php");

function sortImages($gallery){
	$image = array();
	$check_in = array();
	$test_line = array();
	$line = array();
		
	$opFile = "../content/media/". $gallery ."/gallery.txt";
	if (file_exists($opFile)) { 
	
    	$fp          = fopen($opFile,"r");    	
		$data        = @fread($fp, filesize($opFile));
		fclose($fp);
		$line        = explode("\n", $data);
				
        foreach($line as $test){	 	 
       		$test_line[] = explode("|", $test); 
        }
                  
		foreach ($test_line as $k => $v){ 
		 	$check_in[] = $v[0];						 
			$name       = $v[0];		 
			$b[$name]   = $v[1];	
		}	
		asort($b);
			
		$count = count($b)-1;	
		for($i=0; $i<$count; $i++){			
			$image[] = $test_line[$i];
		}													   
   	}
   
    foreach (glob("../content/media/". $gallery ."/*") as $file){
   	    $info = pathinfo($file);
	    $ext  = $info['extension'];
	    $base = $info['basename'];   		
   		
   		if(!in_array($base, $check_in) && $ext!='txt'){
	   		$position = $count++; 
   			$image_insert = array($base, $position);
   		    array_push($image, $image_insert);  
   		}
    }
return($image);	   	
} 
?>