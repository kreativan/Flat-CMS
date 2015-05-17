<?php

    include("../ivm/system/dev-config.php");

    
if (isset($_POST['submit'])){
    $myfile = fopen("../ivm/system/settings/dev-config.php", "w") or die("Unable to open file!");
    
    $txt  = '<?php'."\n";
    $txt .= '$less='.'"'.$_POST["less"].'"'.';'."\n";
    $txt .= '$g_analytics='.'"'.$_POST["g_analytics"].'"'.';'."\n";
    $txt .= '$custom_js='.'"'.$_POST["custom_js"].'"'.';'."\n";
    $txt .= '$custom_css='.'"'.$_POST["custom_css"].'"'.';'."\n";
    $txt .= '?>';
    fwrite($myfile, $txt);
    
    fclose($myfile);
}

?>
    
<form action="?action=save" method="post" class="ivm-settings">

<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Less Preprocessor</div>
    <div class="on-off uk-float-right">
	   <input class="on" type="radio" name="less" value="on" <?php if ($less == "on") echo 'checked="checked"'; ?>>
        <label></label>
        <input class="off" type="radio" name="less" value="off" <?php if ($less == "off") echo 'checked="checked"'; ?>>
        <label></label>
    </div>
</div>
    
<hr>    
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Google Analytics</div>
    <div class="on-off uk-float-right">
	   <input class="on" type="radio" name="g_analytics" value="on" <?php if ($g_analytics == "on") echo 'checked="checked"'; ?>>
        <label></label>
        <input class="off" type="radio" name="g_analytics" value="off" <?php if ($g_analytics == "off") echo 'checked="checked"'; ?>>
        <label></label>
    </div>
</div>    
    
<hr>
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Custom JS</div>
    <div class="on-off uk-float-right">
	   <input class="on" type="radio" name="custom_js" value="on" <?php if ($custom_js == "on") echo 'checked="checked"'; ?>>
        <label></label>
        <input class="off" type="radio" name="custom_js" value="off" <?php if ($custom_js == "off") echo 'checked="checked"'; ?>>
        <label></label>
    </div>
</div>    
    
<hr>
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Custom CSS</div>
    <div class="on-off uk-float-right">
	   <input class="on" type="radio" name="custom_css" value="on" <?php if ($custom_css == "on") echo 'checked="checked"'; ?>>
        <label></label>
        <input class="off" type="radio" name="custom_css" value="off" <?php if ($custom_css == "off") echo 'checked="checked"'; ?>>
        <label></label>
    </div>
</div> 
    
<hr>
    
<!-- SAVE BUTTON -->    
<div class="uk-text-center">
    <input class="ivm-save-button btn" name="submit" type="submit" value="Save Settings">
</div>
    
</form>
