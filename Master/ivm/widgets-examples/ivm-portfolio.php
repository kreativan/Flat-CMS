<?php
    //settings
    $filter_nav                         = 'true';    // true - false
    $filter_nav_order                   = 'true';    // true - false
    $filter_nav_style                   = 'uk-tab'; // [uk-tab], [uk-subnav uk-subnav-pill]
    $uk_gallery_animation               = 'uk-overlay-spin';   // [uk-overlay-spin], [uk-overlay-fade], [uk-overlay-scale], [uk-overlay-grayscale]
    $uk_gallery_no_of_items             = '4'; // 2, 3, 4, 5;
    $uk_gallery_item_space              = '20px'; // in pixels

?>

<?php

    $img_dir_prefix = $tag_var1.'_*';
    $dir_prefix     = $tag_var1.'_';

    $id = 'ivm-'.$dir_prefix.'id';
        
    // lang files
    include_once("ivm/lang/english.php"); 
    if (!empty($language) && file_exists("ivm/lang/$language.php")){ include_once("ivm/lang/$language.php"); } 
    
    // gallery settings file
    //include("ivm/widgets/admin/settings/uk-gallery-config.php");

    // folders
    $folders = glob("content/media/$img_dir_prefix" , GLOB_ONLYDIR);
    
    // images
    $directory = ("content/media/$img_dir_prefix/");
    $images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

    $path_new = '';
    if (!empty($path)) { $path_new = $path.'/'; }

?>

<div class="ivm-portfolio-gallery">
 
<!-- Galerry Nav --> 
<?php if($filter_nav == 'true') : ?>  
    <ul id="<?php echo $id;?>" class="<?php echo $filter_nav_style;?> uk-margin">
        <li data-uk-filter="" class="uk-active"><a href="">All</a></li>
        <?php foreach ($folders as $folder) : ?>
            <?php $folder_name = str_replace($dir_prefix, '', basename($folder)); ?>
            <li data-uk-filter="<?php echo $folder_name;?>"><a href=""><?php echo $folder_name;?></a></li> 
        <?php endforeach; ?>
    <?php if($filter_nav_order == 'true') : ?>  
        <li data-uk-sort="g-category"><a href="">Ascending</a></li>
        <li data-uk-sort="g-category:desc"><a href="">Descending</a></li>
    <?php endif;?>
    </ul>
<?php endif;?>
<!-- Gallery Content -->
<div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-<?php echo $uk_gallery_no_of_items;?>" data-uk-grid="{controls: '#<?php echo $id;?>'}">
<?php foreach ($images as $image) : ?>
<?php
    $img_filename   = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($image));
    $img_name       =  str_replace('_', ' ',basename($img_filename));
    $img            = '<img src="'.$image.'" alt="'.$img_name.'">';
    $filter         =   dirname(str_replace('content/media/'.$dir_prefix, '', $image));
?>

    <div class="uk-panel" data-uk-filter="<?php echo $filter; ?>" data-g-category="<?php echo $img_name; ?>">
    <a class="uk-overlay uk-overlay-hover" href="<?php echo $path_new.$image; ?>" data-uk-lightbox="{group:'<?php echo $filter; ?>'}" title="<?php echo $img_name; ?>">  
        <img class="<?php echo $uk_gallery_animation;?>" src="<?php echo $path_new.$image;?>">
        <div class="uk-overlay-panel uk-overlay-icon uk-overlay-background uk-overlay-fade"></div>
    </a>
    </div>
    

<?php endforeach;?>
</div>
    
</div>

<style>
.ivm-portfolio-gallery .uk-panel {
    padding-left:<?php echo $uk_gallery_item_space;?>;
    padding-bottom:<?php echo $uk_gallery_item_space;?>;
}
#<?php echo $id;?> + div {
    margin-left:-<?php echo $uk_gallery_item_space;?>;
}
</style>

<script src="<?php echo $path; ?>/ivm/framework/uikit/js/components/grid.min.js"></script>