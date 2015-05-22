<?php 
    //SETTINGS
/*
    $numb_of_items_in_row   = '5';  // 2, 3, 4, 5;
    $ivm_gallery_animation  = 'uk-overlay-spin';   // [uk-overlay-spin], [uk-overlay-fade], [uk-overlay-scale], [uk-overlay-grayscale]
    $ivm_gallery_space      = '10px'; // in pixels
*/    
?>

<?php
    $folder = $tag_var1;

    $directory = ("content/media/$folder/");
    $images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

    $path_new = '';
    if (!empty($path)) { $path_new = $path.'/'; }
?>

<div class="ivm-gallery">
<div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-<?php echo $numb_of_items_in_row; ?>" data-uk-grid>
<?php foreach ($images as $image) : ?>
<?php
    $img_name   = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($image));
    $img = '<img src="'.$image.'" alt="'.$img_name.'">';
?>
   
<div class="uk-panel" style="padding-right:<?php echo $ivm_gallery_space ; ?>;padding-bottom:<?php echo $ivm_gallery_space ; ?>;">    
    <a class="uk-overlay uk-overlay-hover" href="<?php echo $path_new.$image; ?>" data-uk-lightbox="{group:'<?php echo $folder; ?>'}" title="<?php echo $img_name; ?>">  
        <img class="<?php echo $ivm_gallery_animation;?>" src="<?php echo $path_new.$image;?>">
        <div class="uk-overlay-panel uk-overlay-icon uk-overlay-background uk-overlay-scale"></div>
    </a>
</div>    
    
<?php endforeach;?>    
</div>
</div>

<script src="<?php echo $path; ?>/ivm/framework/uikit/js/components/grid.min.js"></script>