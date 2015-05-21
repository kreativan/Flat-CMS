<?php

error_reporting(0);

include("config.php");
include_once("$admin/inc/lang/english.php");
if (!empty($language) && file_exists("$admin/inc/lang/$language.php")){ include_once("$admin/inc/lang/$language.php"); } 

$page = (isset($_GET['p']) && !empty($_GET['p'])) ? $_GET['p'] : 'home';
$page = htmlspecialchars($page, ENT_QUOTES, 'UTF-8');

if (preg_match("/\//", $page)){ 
    if(file_exists("content/pages/".$page."home.txt")){
        $page = $page."home";
    } 
}

if (!file_exists("content/pages/".$page.".txt")) {
    $page = '404';
    header('HTTP/1.1 404 Not Found');
}

include("inc/plugins/parsedown.php");
$parsedown = new Parsedown();

ob_start(); 
include("content/pages/$page.txt");
$content     = ob_get_clean(); 
$get_page    = explode("\n",$content);
$page_title  = $get_page[0];
$page_desc   = $get_page[2];
$page_body   = array_slice($get_page, 4);
$content     = implode("\n", $page_body);
ob_end_clean();

if (preg_match_all("/".'(\\{)'.'(\\{)'.'.*?'.'(\\})'.'(\\})'."/", $content, $m)) {   
    
    foreach ($m[0] as $get_embed1) {       
        $get_embed = $get_embed1;
        $get_embed = str_replace("{", "" ,$get_embed); 
        $get_embed = str_replace("}", "" ,$get_embed);  
                  
        if (substr_count($get_embed, ':') >=1 ) {                        
            $exp = explode(':', $get_embed); 
            $vars = array_slice($exp, 1); 
            $tag_var1 = (!empty($vars[0])) ? $vars[0] : '';
            $tag_var2 = (!empty($vars[1])) ? $vars[1] : '';
            $tag_var3 = (!empty($vars[2])) ? $vars[2] : '';
            $get_embed = $exp[0];
        } 
        ob_start(); 
        if($get_embed == 'template'){ $new_template = $tag_var1; }
        else { 
            include("template/widgets/$get_embed.php");
            include("ivm/widgets/$get_embed.php");
            include("inc/tags/$get_embed.php");
            $new  = ob_get_contents();
        }
        $content = str_replace($get_embed1, $new, $content);
        ob_end_clean();
    }
}

if (!empty($new_template) && (file_exists("ivm/page-templates/$new_template/layout.php") || file_exists("template/page-templates/$new_template/layout.php"))) {
    include ("ivm/page-templates/$new_template/layout.php");
    include ("template/page-templates/$new_template/layout.php");
}

else { 
    include("template/layout.php"); 
}