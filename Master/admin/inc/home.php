<?php

require_once("login.php");

session_start();
include('functions.php');

if ($_GET['f'] === 'stats') { include('view-stats.php'); }

else if ($_GET['f'] && !empty($_GET['f']) && file_exists("../content/".$_GET['f'])){
	
	$filepath              = "../content/".$_GET['f'];
	$_SESSION['directory'] = $_GET['f'];
	$fname                 = explode('/',$_GET['f']);
	$last_level            = end($fname);
	$full_path             = $_GET['f'];
	$all_files_in_folder1  = glob($filepath."/*");
	natsort($all_files_in_folder1); 
	
	//get folder first and reverse blog order
	foreach($all_files_in_folder1 as $files) {
		$info1   = pathinfo($files);
		$ext1    = $info1["extension"];	
		if (empty($ext1)){ $all_files_in_folder_folder[] = $files; }
		if (!empty($ext1)){ $all_files_in_folder_files[] = $files; }
    }
    
    if (!empty($all_files_in_folder_folder) && !empty($all_files_in_folder_files)){
        $all_files_in_folder = array_merge($all_files_in_folder_folder,$all_files_in_folder_files);
    } else if(!empty($all_files_in_folder_files)){ $all_files_in_folder = $all_files_in_folder_files;}
    else if (!empty($all_files_in_folder_folder)){ $all_files_in_folder = $all_files_in_folder_folder;}
    
    if ($last_level == 'blog') { 
		$all_files_in_folder = array_reverse($all_files_in_folder); 
	}

    //echo out errors
	if ($_SESSION['error']) { 
		echo $_SESSION['error']; 
		unset($_SESSION['error']);
	}
	
	//breadcrumbs
	echo "<div class='breadcrumb'>\n";
	include('breadcrumbs.php');	
    if(!empty($fname[1])){ echo "<a class='rename' href='index.php?p=rename&d=$full_path'>[$lang_rename_btn]</a>"; }	
	echo "</div>\n\n";
	
	$amount_of_folders = count($all_files_in_folder);
	$result_per_page   = 20 ; 
	$total_pages       = ceil($amount_of_folders/$result_per_page);
	$cur_page          = $_GET['pnum'] ? $_GET['pnum'] : 1;
		
	$start = 0 + (($cur_page-1) * $result_per_page);
	$end   = $result_per_page * $cur_page;

    for ($n = $start; $n < $end; $n++ ) {	
     if(!empty($all_files_in_folder[$n])){
	    		
        $info   = pathinfo($all_files_in_folder[$n]);
        $file   = $info['filename'];
        $base   = $info['basename'];
        $ext    = $info['extension'];
        $ext2    = strtolower($ext);
        $folder = $_GET['f'];
        $browser_files = array('pdf', 'zip');
        $gal = array();
         
        if ($fname[0] == 'blog') { 
        		$file_adr  = "../content/blog/$file.txt";
				$open      = fopen($file_adr,"r");	
				$file_data = fread($open, filesize($file_adr));
				fclose($open);
				$titl = explode("\n", $file_data);
		}			
        
        if ($fname[0]=='media' && !empty($fname[1])){
         	$gal        = array($folder);
			$gal_pics[] = array($folder.'/'.$file, $ext, $base);
	   	 }
         
         // show the files and links to open               
        if (!empty($ext) && in_array($ext2, $allow) && (!in_array($folder, $gal))){
            echo "<div class='file-row'>";
            
            if (in_array($ext2, $browser_files) && file_exists("../content/$folder/$file.$ext") ){
	             echo "<a class='file' href='$path/content/$folder/$file.$ext'>".$file.'.'.$ext."";
	        }
	       else{
                echo "<a class='file' href='index.php?p=open&f=$folder/$file&e=$ext'>$file<span>.$ext</span>";
            }
            if(!empty($titl)){ echo '<span class="blog-title-list">'.$titl[0].'</span>'; }
            echo "</a>";
            echo "<a class='delete' href='index.php?p=delete&d=$folder/$file&e=$ext'><img src='img/icon-delete.svg'></a>";
            echo "</div>\n\n";
        }
         // show folders and links into the folder              
        else if (file_exists($filepath) && empty($ext)){
		    echo "<div class='folder-row'>";
		    echo "<a class='folder' href='index.php?p=home&f=$folder/$file'>$base</a>";
		    echo "<a class='delete' href='index.php?p=delete&d=$folder/$file'><img src='img/icon-delete.svg'></a>";
		    echo "</div>\n\n";
		}
	  }
    }
        
	if(!empty($gal_pics)){	
	
	 $sorted = (sortImages($fname[1]));	
	 ?><ul id = "sortable" > <?php	
		 echo "\n\n";
        
	    foreach($sorted as $val){
	    	$info = pathinfo("../content/media/$fname[1]/$val[0]");
	    	$ext  = $info['extension'];
	    	$base = $info['filename'];
			if (!empty($val[0])){ 	
			
				?> <li id = "one=<?php echo $val[0]; ?>"><?php
				echo "<div class='file-row'>";
				
				 if (in_array($ext2, $browser_files) && file_exists("../content/$folder/$base.$ext") ){
	             	echo "<a class='file' href='$path/content/$folder/$base.$ext'>".$base.'.'.$ext.""."</a>";
	             	echo "<a class='delete' href='index.php?p=delete&d=media/$fname[1]/$base&e=$ext'><img src='img/icon-delete.svg'></a>";

				 }
				else{
					echo "<a class='file' href='index.php?p=open&f=media/$fname[1]/$base&e=$ext'>$base<span>.$ext</span></a>";
					echo "<a class='delete' href='index.php?p=delete&d=media/$fname[1]/$base&e=$ext'><img src='img/icon-delete.svg'></a>";
				}
				echo "</div>";
				?> </li> <?php 
				echo "\n\n";		       
			}
	    }    
	 ?></ul>
	 
	 <div id ="result"></div><?php 
	 }
	 
	 
	 // footer
	if ($amount_of_folders == 0) { 
		 echo '<p class="message">'.$lang_home_emptyfold.'</p>'; 
	}
	 
	if ($fname[0] == 'media') { 
	     echo "<a class='btn upload-img' href='index.php?p=upload&gallery=".$_GET['f']."'>$lang_home_upload_button</a>";
	}
	 
    if ($fname[0] == 'media' && !empty($fname[1])){
	     	$embed_path = array_slice($fname,1); 
			$embed_path = implode('/', $embed_path); ?>
			
			<div class="tagdiv">
				<span>Embed Tag:</span>
				<input onclick="this.select()" class="embed_tag" value="<?php echo '{{gal:'. $embed_path; ?>}}"></input>
			</div> 	
					
			<?php
 
    } else { echo "<a class='btn create-new' href='index.php?p=create'>$lang_home_new</a>"; }
     		 
	if(empty($gal_pics)){
     	if ($cur_page < $total_pages) { 
		 	echo "<a class='older' href='index.php?p=home&f=$folder&pnum=".($cur_page+1)."'>></a>"; 
		 }
		if ($cur_page > 1) { 
	     	echo "<a class='newer' href='index.php?p=home&f=$folder&pnum=".($cur_page-1)."'><</a>"; 
		 }     
	}
	 
	if ($fname[0] == 'blog'){ 	    
	    echo "<a class='btn blog_preview-button' target='_blank' href='$blog_url'>$lang_home_preview</a>"; ?>
		<div class="tagdiv">
			<span>Embed Tag:</span>
			<input onclick="this.select()" type="text" class="embed_tag" value="{{blog}}">
		</div>		
		<?php
	}
}
else {
	//home directory
	echo "<div class='breadcrumb'>$lang_nav_home</div>";
    foreach (glob("../content/*") as $allfiles) {
	    
	    if ($allfiles != '../content/backups')	{
        $info = pathinfo($allfiles);
        $file = $info['filename'];
        $base = $info['basename'];
        
        switch ($base) {
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

            case 'stats':
            $base_output = $lang_nav_stats;
            break;            
           
        }
        
        echo "<div class='folder-row'>";
        echo "<a class='folder' href='index.php?f=$file'>$base_output</a><br>";
        echo "</div>";
        }
    }
}
?>
<script>
$ (function() {
    $("#sortable").sortable({ 
	  update: function() {
        var order = $(this).sortable("serialize", {expression: /(.+)[=](.+)/ }) + '&gallery=<?php echo $fname[1];  ?>';
	        $.post("inc/gal-sort.php", order, function(theResponse){
	        $("#result").html(theResponse);
			});
        } 
    });
});
</script> 