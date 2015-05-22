<?php 
    // Ivan Milincic, http://www.kreativan.net 

    // {{breadcrumbs}} | {{breadcrumbs:/SUBFOLDER} - if website is in subfolder

?>

<div class="ivm-breadcrumbs">   
<style>.ivm-breadcrumbs-home + span,.ivm-breadcrumbs-home + a {display:none;}</style> 
<?php 
    
function breadcrumbs($path = '', $separator = '', $home = 'Home') {
    
    $ivm_path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    $base_url = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    $breadcrumbs = array("<a class=\"ivm-breadcrumbs-home\" href=\"$base_url$path\">$home</a>");
 
    $last = end(array_keys($ivm_path));
    
    
    foreach ($ivm_path AS $x => $crumb) {
        $title = ucwords(str_replace(array('.php', '_'), Array('', ' '), $crumb));
        if (($x != $last) && (is_dir($x))){
            
            $breadcrumbs[] = '<a href="'.$base_url.$path.'/'.$crumb.'">'.str_replace('-', ' ', $title).'</a>';
        }else{
            $breadcrumbs[] = '<span>'.str_replace('-', ' ', $title).'</span>';
        }
    }
    
    return implode($separator, $breadcrumbs);
} 

echo breadcrumbs($tag_var1);

?>
    
</div>