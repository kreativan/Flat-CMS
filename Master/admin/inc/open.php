<script>

// Adds save hotkey
$(document).keydown(function(e) {
if ((e.which == '115' || e.which == '83' ) && (e.ctrlKey || e.metaKey))
{
    e.preventDefault();
    $("#textfile button[name=savetext]").click();
    return false;
}
return true;
}); 

//Prevents backspace
$(document).keydown(function (e) {
    var preventKeyPress;
    if (e.keyCode == 8) {
        var d = e.srcElement || e.target;
        switch (d.tagName.toUpperCase()) {
            case 'TEXTAREA':
                preventKeyPress = d.readOnly || d.disabled;
                break;
            case 'INPUT':
                preventKeyPress = d.readOnly || d.disabled ||
                    (d.attributes["type"] && $.inArray(d.attributes["type"].value.toLowerCase(), ["radio", "checkbox", "submit", "button"]) >= 0);
                break;
            case 'DIV':
                preventKeyPress = d.readOnly || d.disabled || !(d.attributes["contentEditable"] && d.attributes["contentEditable"].value == "true");
                break;
            default:
                preventKeyPress = true;
                break;
        }
    }
    else
        preventKeyPress = false;

    if (preventKeyPress)
        e.preventDefault();
});

</script>
<?php

require_once("login.php");

session_start();
$pics_files = array('.jpg','.jpeg','.gif','.svg','.png');
$browser_files = array('.zip','.pdf');

//save edits to txt file
if (isset($_POST['textblock']) && !(empty($_POST['textblock'])) 
&& isset($_POST['filename']) && !(empty($_POST['filename']))
&& file_exists($_POST['filename'])
&& isset($_SESSION["token"]) && !(empty($_POST['token']))
&& isset($_POST["token"]) && !(empty($_POST['token']))
&& $_SESSION["token"] == $_POST["token"]
&& isset($_POST['savetext'])){
    
    if ($_POST['fname'] != 'blocks' ){
    	$content  = !empty($_POST['head1']) ? $_POST['head1']."\n\n" : "\n\n";
		$content .= !empty($_POST['head2']) ? $_POST['head2']."\n\n" : "\n\n";
    } 
    
    $content .= $_POST['textblock'];
           
    $fp = @fopen($_POST['filename'], "w");		 	
	if ($fp) {
	    fwrite($fp, $content);
		fclose($fp);
	}	
}

//open files for viewing
if ($_GET['f'] && !empty($_GET['f'])){
	$filepath   = "../content/".$_GET['f'];
	$fname      = explode('/',$_GET['f']);
	$ext        = (!empty($_GET['e'])) ?  '.'.$_GET['e'] : '';
	$last_level = end($fname);
	$full_path  = $_GET['f'];
	
	echo "<div class='breadcrumb'>";
		include('breadcrumbs.php');		
		echo "<a class='rename' href='index.php?p=rename&d=$full_path&e=$ext'>[$lang_rename_btn]</a>";
	echo "</div>";
	
	//txt files	
    if (file_exists("../content/".$_GET['f'].".txt")){ 
	    $lines = file($filepath.".txt");
	    
	    if ($fname[0] == 'blocks'){
	    	$content = implode("", $lines);
	    	$editor = ($wysiwyg == true) ? 'id="wysiwyg"' : 'id="textblock"'; 
	    	
	    	if(preg_match("/sb_/", $last_level)){
		    	$editor = 'id="textblock"';	
	    	}    
	    }
	    
	    else{
	    	    
	    	if ($fname[0] == 'blog'){	
		    	$label1 = "Blog Title";
				$label2 = "Date";
				$class1 = "class='blog-title-input'";
				$class2 = "class='blog-date-input'";
			    $editor = ($wysiwyg == true) ? 'id="wysiwyg"' : 'id="textblock"';
			    $one =  '.*?';
			    $two = '(-)';
			    $three = '.*?';
			    $four = '(-)';
			    $all = $one.$two.$three.$four;
			    if (!preg_match_all("/$all/",$lines[2],$match)) {  $lines[2] = date('m-d-Y', time()); }   
     

			}
		 
			if ($fname[0] == 'pages'){
		    	$label1 = $lang_pages_title;
				$label2 = $lang_pages_description;	
				$class1	= "class='page-title-input'";
				$class2 = "class='page-desc-input'";
				$editor = 'id="textblock"';	 
		 	}
		 			 		
		 	echo "<a class='embed_toggle' href='#'>Meta</a>";	       
			$header_form_fields = "<div class='hide'><label>$label1</label><input ".$class1."type='text' value='".htmlspecialchars($lines[0], ENT_QUOTES)."' name='head1' >";  
			$header_form_fields.= "<label>$label2</label><input ".$class2."type='text' value='".htmlspecialchars($lines[2], ENT_QUOTES)."' name='head2' ></div>";
			$lines    = array_slice($lines, 4);	    
			$content  = implode("", $lines);
	     
			$new_path = array_slice($fname,1); 
			$new_path = implode('/',$new_path);			
	     
	     }
	     
	     
    	 if (empty($_SESSION["token"])) { $_SESSION["token"] = md5(uniqid(rand(), TRUE)); } ?>
        <form class="animated zoomIn" id="textfile" name="textfile" method="post" action="">
	    <?php echo $header_form_fields ? $header_form_fields: ''; ?>	    
	    <input type="hidden" name="token"    value="<?php echo $_SESSION["token"]; ?>">
	    <input type="hidden" name="filename" value="<?php echo $filepath.".txt"; ?>">
	    <input type="hidden" name="fname" value="<?php echo $fname[0]; ?>">	    
	    <textarea spellcheck="false" <?php echo $editor;?> name="textblock" ><?php echo htmlspecialchars($content); ?></textarea>
	    <button class="btn save" type="submit" name="savetext"><?php echo $lang_save; ?></button>
	   
	       <?php if($fname[0] == 'blog'){ ?>
	       <a class="btn preview-button" target="_blank" href="<?php echo $blog_url; ?>"><?php echo $lang_home_preview; ?></a>
	       <?php } ?>
	   
	       <?php if($fname[0] == 'pages'){ ?>
	       <a class="btn preview-button" target="_blank" href="<?php echo $path.'/'.$new_path;?>"><?php echo $lang_home_preview; ?></a>
	       <?php } ?>
        
        <a target="_blank" class="media-manager" href="index.php?f=media">Media</a> 
        </form>    
        <?php
	        
	    if ($fname[0] == 'blocks') {    
		    $embed_path = array_slice($fname,1); 
			$embed_path = implode('/', $embed_path); ?>
			
			<div class="tagdiv">
				<span>Embed Tag:</span>
				<input onclick="this.select()" type="text" class="embed_tag" value="<?php echo '{{block:'. $embed_path; ?>}}">
			</div>
			
        <?php
	    }     
	        
	      
    }
        
    //all pics
    else if (in_array($ext, $pics_files) && file_exists($filepath.$ext) ){
        $var   = $_GET['f'];
        $dimen = (getimagesize($filepath.$ext));
	    $dim   = ($ext == '.svg') ? 'vector' : ($dimen[0].' x '.$dimen[1]);
	    $size  = round(filesize($filepath.$ext)/1000,2);
	    
	    echo "<img class='img-preview animated zoomIn' src='$path/content/$var$ext'>";
	    echo "<p class='img-info'><b>$lang_gal_filename</b>$last_level$ext</p>";
	    echo "<p class='img-info'><b>$lang_gal_dimensions</b>".$dim."</p>";
	    echo "<p class='img-info'><b>$lang_gal_size</b>$size K</p>";
	    echo "<p class='img-info'><b>$lang_gal_img</b>&#60;img src='$path/content/$var$ext' alt=''&#62;</p>";
	    echo "<p class='img-info'><b>$lang_gal_link</b>&#60;a href='$path/content/$var$ext'&#62;Link Text&#60;/a&#62;</p>";
	    
	    include('captions.php');

	}
	
    else{
	    echo $lang_no_content;
    }
}

    else{
	    echo $lang_no_content;
    }