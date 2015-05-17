<?php

    include("../ivm/system/settings/gallery-config.php");

    
if (isset($_POST['ivm_gallery_submit'])){
    $form_config = fopen("../ivm/system/settings/gallery-config.php", "w") or die("Unable to open file!");
    
    $form_txt  = '<?php'."\n";
    $form_txt .= '$numb_of_items_in_row='.'"'.$_POST["numb_of_items_in_row"].'"'.';'."\n";
    $form_txt .= '$ivm_gallery_animation='.'"'.$_POST["ivm_gallery_animation"].'"'.';'."\n";
    $form_txt .= '$ivm_gallery_space='.'"'.$_POST["ivm_gallery_space"].'"'.';'."\n";
    $form_txt .= '$filter_nav='.'"'.$_POST["filter_nav"].'"'.';'."\n";
    $form_txt .= '$filter_nav_order='.'"'.$_POST["filter_nav_order"].'"'.';'."\n";
    $form_txt .= '$filter_nav_style='.'"'.$_POST["filter_nav_style"].'"'.';'."\n";
    $form_txt .= '$uk_gallery_animation='.'"'.$_POST["uk_gallery_animation"].'"'.';'."\n";
    $form_txt .= '$uk_gallery_no_of_items='.'"'.$_POST["uk_gallery_no_of_items"].'"'.';'."\n";
    $form_txt .= '$uk_gallery_item_space='.'"'.$_POST["uk_gallery_item_space"].'"'.';'."\n";
    $form_txt .= '?>';
    fwrite($form_config, $form_txt);
    
    fclose($form_config);
}

?>

<form action="?ivm-form-save" method="post" class="ivm-settings">

<h3>Gallery</h3>
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Number of items in a row</div>
    <div class="uk-float-right">
        <select name="numb_of_items_in_row">
            <option <?php if ($numb_of_items_in_row == "1") echo 'selected="selected"'; ?>>1</option>
            <option <?php if ($numb_of_items_in_row == "2") echo 'selected="selected"'; ?>>2</option>
            <option <?php if ($numb_of_items_in_row == "3") echo 'selected="selected"'; ?>>3</option>
            <option <?php if ($numb_of_items_in_row == "4") echo 'selected="selected"'; ?>>4</option>
            <option <?php if ($numb_of_items_in_row == "5") echo 'selected="selected"'; ?>>5</option>
        </select>
    </div>
</div>
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Galelry overlay animation</div>
    <div class="uk-float-right">
        <select name="ivm_gallery_animation">
            <option <?php if ($ivm_gallery_animation == "uk-overlay-spin") echo 'selected="selected"'; ?>>uk-overlay-spin</option>
            <option <?php if ($ivm_gallery_animation == "uk-overlay-fade") echo 'selected="selected"'; ?>>uk-overlay-fade</option>
            <option <?php if ($ivm_gallery_animation == "uk-overlay-scale") echo 'selected="selected"'; ?>>uk-overlay-scale</option>
            <option <?php if ($ivm_gallery_animation == "uk-overlay-grayscale") echo 'selected="selected"'; ?>>uk-overlay-grayscale</option>
        </select>
    </div>
</div>
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Gutter (space betwin images)</div>
    <div class="uk-float-right">
	   <input type="text" name="ivm_gallery_space" value="<?php echo $ivm_gallery_space; ?>">
    </div>
</div>  
    
<div class="uk-text-center">
    <input class="ivm-save-button btn" name="ivm_gallery_submit" type="submit" value="Save Settings">
</div>    

</form>