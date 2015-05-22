<?php

    include("../ivm/system/settings/twitter-config.php");

    
if (isset($_POST['ivm_twitter_submit'])){
    $form_config = fopen("../ivm/system/settings/twitter-config.php", "w") or die("Unable to open file!");
    
    $form_txt  = '<?php'."\n";
    $form_txt .= '$twitter_img='.'"'.$_POST["twitter_img"].'"'.';'."\n";
    $form_txt .= '$twitter_img_size='.'"'.$_POST["twitter_img_size"].'"'.';'."\n";
    $form_txt .= '$twitter_username='.'"'.$_POST["twitter_username"].'"'.';'."\n";
    $form_txt .= '$twitter_limit='.'"'.$_POST["twitter_limit"].'"'.';'."\n";
    $form_txt .= '$show_time='.'"'.$_POST["show_time"].'"'.';'."\n";
    $form_txt .= '$show_media='.'"'.$_POST["show_media"].'"'.';'."\n";
    $form_txt .= '?>';
    fwrite($form_config, $form_txt);
    
    fclose($form_config);
}

?>

<form action="?ivm-form-save" method="post" class="ivm-settings">

<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Twiter Username:</div>
    <div class="uk-float-right">
	   <input type="text" name="twitter_username" value="<?php echo $twitter_username; ?>">
    </div>
</div>
<br>
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Twitter Image:</div>
    <div class="uk-float-right">
	   <input type="text" name="twitter_img" value="<?php echo $twitter_img; ?>">
    </div>
</div>
<br>   
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Twiter Image Size:</div>
    <div class="uk-float-right">
	   <input type="text" name="twitter_img_size" value="<?php echo $twitter_img_size; ?>">
    </div>
</div>
<br>
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">No of Tweets:</div>
    <div class="uk-float-right">
	   <input type="text" name="twitter_limit" value="<?php echo $twitter_limit; ?>">
    </div>
</div>
<br>    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Show Time</div>
    <div class="on-off uk-float-right">
        <input class="on" type="radio" name="show_time" value="true" <?php if ($show_time == "true") echo 'checked="checked"'; ?>>
        <label></label>
        <input class="off" type="radio" name="show_time" value="false" <?php if ($show_time == "false") echo 'checked="checked"'; ?>>
        <label></label>
    </div>
</div>
<br>    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Show Media</div>
    <div class="on-off uk-float-right">
        <input class="on" type="radio" name="show_media" value="true" <?php if ($show_media == "true") echo 'checked="checked"'; ?>>
        <label></label>
        <input class="off" type="radio" name="show_media" value="false" <?php if ($show_media == "false") echo 'checked="checked"'; ?>>
        <label></label>
    </div>
</div>     
    
<div class="uk-text-center">
    <input class="ivm-save-button btn" name="ivm_twitter_submit" type="submit" value="Save Settings">
</div>    

</form>