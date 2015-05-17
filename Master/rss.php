<?php 

include("config.php");
error_reporting(0);

$all_blog_files_folder = glob("content/blog/*");

natsort($all_blog_files_folder);

foreach ($all_blog_files_folder as $files) {	
	$resortfiles[] = $files;
}

foreach ($resortfiles as $blog_files) {	
	$file_info                = pathinfo($blog_files);	
	$blog_id                  = $file_info['filename'];	
	$all_blog_files[$blog_id] = array($blog_files, $blog_id);
	$all_blog_ids[]           = $blog_id;
}

echo "<?xml version='1.0' encoding='utf-8'?>\n";
echo "<rss version='2.0' xmlns:atom='http://www.w3.org/2005/Atom'>\n";
echo "<channel>\n\n";

echo "<title>$blog_title</title>\n";
echo "<link>$blog_url</link>\n";
echo "<description>$blog_description</description>\n";
echo "<language>$rss_lang</language>\n\n";


$all_blog_files = array_reverse($all_blog_files);

foreach ($all_blog_files as $blog){

	$open         = fopen($blog[0],"r");
	$data         = @fread($open, filesize($blog[0])); fclose($open);
	$lines        = explode("\n", $data);
	$date_explode = explode('-', $lines[2]);
	$month        = $date_explode[0];
	$day          = $date_explode[1];
	$year         = $date_explode[2];
	$date_mk      = mktime(0, 0, 0, $month, $day, $year);
	$date         = date('r', $date_mk);		
	$title        = $lines[0];
	$url_title    = $url_prefix.'-'.$blog[1].'-'.str_replace(" ", "-", $title);
	$lines        = array_slice($lines,3);
	$content_blog = implode("\n", $lines);

	 echo "<item>\n";
	 echo "<title>$title</title>\n";
	 echo "<link>http://".$_SERVER['HTTP_HOST'].$path.'/'.$url_title."</link>\n";
	 echo "<description><![CDATA[".str_replace("##more##", "", $content_blog) ."]]></description>\n";
	 echo "<pubDate>$date</pubDate>\n";
	 echo "<guid isPermaLink='true'>http://".$_SERVER['HTTP_HOST'].$path.'/'.$url_title."</guid>\n";
	 echo "</item>\n\n";
   }
echo "</channel>\n";

echo "</rss>";