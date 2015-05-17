<?php

    include("../ivm/system/settings/map-config.php");

    
if (isset($_POST['ivm_map_submit'])){
    $form_config = fopen("../ivm/system/settings/map-config.php", "w") or die("Unable to open file!");
    
    $form_txt  = '<?php'."\n";
    $form_txt .= '$map_lat='.'"'.$_POST["map_lat"].'"'.';'."\n";
    $form_txt .= '$map_lng='.'"'.$_POST["map_lng"].'"'.';'."\n";
    $form_txt .= '$map_height='.'"'.$_POST["map_height"].'"'.';'."\n";
    $form_txt .= '$map_zoom='.'"'.$_POST["map_zoom"].'"'.';'."\n";
    $form_txt .= '$panorama_lat='.'"'.$_POST["panorama_lat"].'"'.';'."\n";
    $form_txt .= '$panorama_lng='.'"'.$_POST["panorama_lng"].'"'.';'."\n";
    $form_txt .= '$panorama_height='.'"'.$_POST["panorama_height"].'"'.';'."\n";
    $form_txt .= '$map_title='.'"'.$_POST["map_title"].'"'.';'."\n";
    $form_txt .= '$map_text='.'"'.$_POST["map_text"].'"'.';'."\n";
    $form_txt .= '?>';
    fwrite($form_config, $form_txt);
    
    fclose($form_config);
}

?>

<form action="?ivm-form-save" method="post" class="ivm-settings">
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Map Latitude:</div>
    <div class="uk-float-right">
	   <input type="text" name="map_lat" value="<?php echo $map_lat; ?>">
    </div>
</div>
   
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Map Longitude:</div>
    <div class="uk-float-right">
	   <input type="text" name="map_lng" value="<?php echo $map_lng; ?>">
    </div>
</div>
     
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Map Height:</div>
    <div class="uk-float-right">
	   <input type="text" name="map_height" value="<?php echo $map_height; ?>">
    </div>
</div>
   
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Map Zoom:</div>
    <div class="uk-float-right">
	   <input type="text" name="map_zoom" value="<?php echo $map_zoom; ?>">
    </div>
</div>

<br>    
 
<div class="uk-accordion" data-uk-accordion>    
<h3 class="uk-accordion-title uk-active">Marker Info Box</h3>
<div class="uk-accordion-content">
   
    <div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Title:</div>
    <div class="uk-float-right">
	   <input type="text" name="map_title" value="<?php echo $map_title; ?>">
    </div>
    </div>
    <br>
    <div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Text:</div>
    <div class="uk-float-right">
	   <textarea rows="5" cols="60" name="map_text"><?php echo $map_text; ?></textarea>
    </div>
    </div>
    
</div>
        
<h3 class="uk-accordion-title">Panorama Settings</h3>
<div class="uk-accordion-content">
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Panorama Latitude:</div>
    <div class="uk-float-right">
	   <input type="text" name="panorama_lat" value="<?php echo $panorama_lat; ?>">
    </div>
</div>
<br>    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Panorama Longitude:</div>
    <div class="uk-float-right">
	   <input type="text" name="panorama_lng" value="<?php echo $panorama_lng; ?>">
    </div>
</div>
<br>     
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:5px;">Panorama Height:</div>
    <div class="uk-float-right">
	   <input type="text" name="panorama_height" value="<?php echo $panorama_height; ?>">
    </div>
</div> 
    
</div>
</div>    
    
<div class="uk-text-center">
    <input class="ivm-save-button btn" name="ivm_map_submit" type="submit" value="Save Settings">
</div>    

</form>