<?php
	require_once("../../config.php");
	require_once("login.php");

if(!empty($_POST['gallery']) && !empty($_POST['one'])) {
    $gallery = $_POST['gallery'];    
	$order   = $_POST['one'];
	$taken = array();			
	$opFile = "../../content/media/". $gallery ."/gallery.txt";
	    
	foreach ($order as $key => $value){
										
			$position_new[] = array($value,$key);
	}     
	if (file_exists($opFile)) {    
    	$fp          = fopen($opFile,"r");    	
		$data        = @fread($fp, filesize($opFile));
		fclose($fp);
		$line        = explode("\n", $data);
		$count       = count($line);        
        
    	foreach ($line as $lin) {
	    	$image[] = explode("|", $lin);
    	}
 	}   
  	foreach ($position_new as $new) {
	
		for ($i = 0; $i < $count; $i++){ 
		   		   
			if ($image[$i][0] == $new[0]) {
				$taken[]   = $new[0];
				$new_data .= $new[0] ."|". $new[1]."|". $image[$i][2]. "\n"; 
       		}
    	}   
    	
		if (!empty($new[0])){
		    if(!in_array($new[0], $taken))  { 
	    	   $new_data .= $new[0]."|".$new[1] ."|". '' . "\n";  
		    } 
		}                 
	}
	$open = fopen($opFile,"w");
	if ($open) {
		$data  = fwrite($open, $new_data); 
		fclose($open);
	}
}