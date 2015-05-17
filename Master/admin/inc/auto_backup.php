<?php
require_once("login.php");

$days = 1;  // if no backups within x days, create one
$keep = 5; // keep only x number of most recent backups

$backupfiles = array();
$backupfiles = glob("../content/backups/*");
rsort($backupfiles);

foreach ($backupfiles as $backupfile) {
	$backupcollection[] = $backupfile;	
}

if (count($backupcollection) > $keep) { 
    $i = 0;
    foreach ($backupcollection as $backup){	 
	    $i++;
	    if ($i > $keep) { 	 
	        if(file_exists($backup)){ 
	            unlink($backup);
	         } 	 
	     }	 
    }
}

$lastbackup = filemtime($backupcollection[0]) + ($days * 24 * 60 * 60);

if ($lastbackup > time()) { 	
	
} else { 

$today = date("m.d.y-gi");

$zip   = new ZipArchive();
 
$zip->open("../content/backups/" . $today . ".zip", ZipArchive::CREATE); 

$dirNames = array('../content/pages','../content/blog','../content/media','../content/blocks'); 

foreach ($dirNames as $dirName) {

    if (!is_dir($dirName)) { 
   	 echo $lang_backup_err_destination; 
   	 } 

   	 $dirName = realpath($dirName); 
    
    if (substr($dirName, -1) != '/') { 
	   	 $dirName.= '/'; 
	 } 
 
	 $dirStack = array($dirName); 

	 $cutFrom = strrpos(substr($dirName, 0, -1), '/')+1; 

	 while (!empty($dirStack)) { 
		 $currentDir = array_pop($dirStack); 
		 $filesToAdd = array(); 

		 $dir = dir($currentDir); 
     while (false !== ($node = $dir->read())) { 
          
          if (($node == '..') || ($node == '.')) { 
            continue; 
          } 
        
		  if (is_dir($currentDir . $node)) { 
            array_push($dirStack, $currentDir . $node . '/'); 
		  } 
        
          if (is_file($currentDir . $node)) { 
            $filesToAdd[] = $node; 
          } 
     } 

	 $localDir = substr($currentDir, $cutFrom); 
	 $zip->addEmptyDir($localDir); 
    
	 foreach ($filesToAdd as $file) { 
         $zip->addFile($currentDir . $file, $localDir . $file); 
     } 
   } 
  }
}
?>