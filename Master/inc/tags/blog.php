<?php
 
if (!empty($tag_var1)) { $blog_prefix = $tag_var1; } else { $blog_prefix = 'blog'; }

if (is_numeric($_GET['d'])){ $get_id = $_GET['d']; }
if (is_numeric($_GET['page'])){ $cur_page = $_GET['page']; }


$all_blog_files_folder = glob("content/blog/*");
natsort($all_blog_files_folder);

foreach ($all_blog_files_folder as $files) {	
	$resortfiles[] = $files;
}

foreach ($resortfiles as $blog_files) {	
	$file_info = pathinfo($blog_files);	
	$blog_id   = $file_info['filename'];	
	$all_blog_files[$blog_id] = array($blog_files, $blog_id);
	$all_blog_ids[] = $blog_id;
}
    $amount_of_posts = count($all_blog_files);
    
// show one post
if (!(empty($get_id)) && is_numeric($get_id) && $all_blog_files[$get_id]) {	
	
		$open         = fopen($all_blog_files[$get_id][0] , "r");
		$data         = @fread($open, filesize($all_blog_files[$get_id][0])); fclose($open);
		$lines        = explode("\n", $data);
		$date_explode = explode('-', $lines[2]);
		$month        = $date_explode[0];
		$day          = $date_explode[1];
		$year         = $date_explode[2];
		$date_mk      = mktime(0, 0, 0, $month, $day, $year);
	    $date         = date($date_format, $date_mk);
		$title        = $lines[0];
	    $url_title    = $all_blog_files[$get_id][1].'-'.str_replace(" ", "-", $title);

		$lines     = array_slice($lines,3);
		$content_blog   = implode("\n", $lines);
		$content_blog   = str_replace("##more##", "", $content_blog);
		$page_title = $title;
		
	    echo "<div class='blog-wrap'>";
	    echo "<h2 class='blog-title'>$title</h2>";
	    echo "<p class='blog-date'>$date</p>";
		echo $parsedown->text($content_blog);	
		if ($disqus_comments == true){include('inc/plugins/disqus.php');}
		echo "</div>";
}


// show all posts
else {
		$total_pages     = ceil($amount_of_posts/$result_per_page);
		$cur_page        = $cur_page ? $cur_page : 1;

		$start = $amount_of_posts - (($cur_page-1) * $result_per_page);
		$end   = $amount_of_posts - (($cur_page) * $result_per_page);
							
    for ($n = $start ; $n >= $end+1; $n-- ) {
    	 
        $postnumber = $all_blog_ids[$n-1];
        
        if(!empty($all_blog_files[$postnumber][0])){
        
		$open         = fopen($all_blog_files[$postnumber][0],"r");
		$data         = @fread($open, filesize($all_blog_files[$postnumber][0])); fclose($open);
		$lines        = explode("\n", $data);
		$date_explode = explode('-', $lines[2]);
		$month        = $date_explode[0];
		$day          = $date_explode[1];
		$year         = $date_explode[2];
		$date_mk      = mktime(0, 0, 0, $month, $day, $year);
	    $date         = date($date_format, $date_mk);
		$title        = $lines[0];
	    $url_title    = $all_blog_files[$postnumber][1].'-'.str_replace(" ", "-", $title);

		$lines        = array_slice($lines,3);
		$content_blog = implode("\n", $lines);
		
		if (strpos($content_blog,'##more##')) { 
		    $content_blog = strstr($content_blog,'##more##', true)."<a href=$path/$blog_prefix-".strtolower($url_title).">$lang_blog_read_more</a>";
	    } 
		
		echo "<div class='blog-wrap'>";
	    echo "<h2 class='blog-title'><a href=$path/$blog_prefix-".strtolower($url_title).">$title</a></h2>";
	    echo "<p class='blog-date'>$date</p>";
		echo $parsedown->text($content_blog);
		echo "</div>";
		}
    }
        
    if ($cur_page < $total_pages) { echo "<a class='older' href=\"$blog_prefix-page-".($cur_page+1)."\">$lang_blog_older</a>"; }
    if ($cur_page > 1) { echo  "<a class='newer' href=\"$blog_prefix-page-".($cur_page-1)."\">$lang_blog_newer</a>"; }    
}
?>
<link rel="stylesheet" href="inc/tags/css/blog.css">