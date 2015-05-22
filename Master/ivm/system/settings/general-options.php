<?php

    include("../ivm/system/settings/general-config.php");

    
if (isset($_POST['ivm_general_submit'])){
    $myfile = fopen("../ivm/system/settings/general-config.php", "w") or die("Unable to open file!");
    
    $txt  = '<?php'."\n";
    $txt .= '$ivm_site_name='.'"'.$_POST["ivm_site_name"].'"'.';'."\n";
    $txt .= '$ivm_language='.'"'.$_POST["ivm_language"].'"'.';'."\n";
    $txt .= '$ivm_editor='.'"'.$_POST["ivm_editor"].'"'.';'."\n";
    $txt .= '$folder_display='.'"'.$_POST["folder_display"].'"'.';'."\n";
    $txt .= '$ivm_blog_posts='.'"'.$_POST["ivm_blog_posts"].'"'.';'."\n";
    $txt .= '$protected_pages_password='.'"'.$_POST["protected_pages_password"].'"'.';'."\n";
    $txt .= '?>';
    fwrite($myfile, $txt);
    
    fclose($myfile);
}

?>
    
<form action="?action=save" method="post" class="ivm-settings">
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Web Site Name:</div>
    <div class="uk-float-right">
	   <input type="text" name="ivm_site_name" value="<?php echo $ivm_site_name; ?>">
    </div>
</div>
    
<hr>   
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;"><?php echo $lg_admin_language;?> (reload page after change)</div>
    <div class="uk-float-right">
        <select name="ivm_language">
            <option <?php if ($ivm_language == "english") echo 'selected="selected"'; ?>>english</option>
            <option <?php if ($ivm_language == "serbian") echo 'selected="selected"'; ?>>serbian</option>
        </select>
    </div>
</div>
    
<hr>
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Admin Editor</div>
    <div class="uk-float-right">
        <select name="ivm_editor">
            <option <?php if ($ivm_editor == "redactor") echo 'selected="selected"'; ?>>redactor</option>
            <option <?php if ($ivm_editor == "htmleditor") echo 'selected="selected"'; ?>>htmleditor</option>
        </select>
    </div>
</div>
    
<hr>
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Folder Display</div>
    <div class="uk-float-right">
        <select name="folder_display">
            <option <?php if ($folder_display == "grid") echo 'selected="selected"'; ?>>grid</option>
            <option <?php if ($folder_display == "list") echo 'selected="selected"'; ?>>list</option>
        </select>
    </div>
</div>
    
<hr>    
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Blog posts per page:</div>
    <div class="uk-float-right">
	   <input type="text" name="ivm_blog_posts" value="<?php echo $ivm_blog_posts; ?>">
    </div>
</div>
    
<hr>
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Protected pages password:</div>
    <div class="uk-float-right">
	   <input type="text" name="protected_pages_password" value="<?php echo $protected_pages_password; ?>">
    </div>
</div>
    
<hr>     
    
<!-- SAVE BUTTON -->    
<div class="uk-text-center">
    <input class="ivm-save-button btn" name="ivm_general_submit" type="submit" value="Save Settings">
</div>
    
</form>
