<?php 
    //SETTINGS
    $numb_of_items_in_row   = '3';  // 2, 3, 4, 5;
    $ivm_grid_space      = '20px'; // in pixels
    $numb_of_items_in_row   = $tag_var3;
?>

<?php

    $tag_var1 = $tag_var1 . '/';

    $folder = "content/blocks/@grid/$tag_var1";
    $items = glob($folder . "*.{txt}", GLOB_BRACE);

?>

<div class="ivm-grid">
<div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-<?php echo $numb_of_items_in_row; ?>" data-uk-grid>
    
        <?php foreach ($items as $item) : ?>
        <?php
            // remove .txt extension
            $item_base_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($item));
            // replace _ with space
            $item_name = str_replace('_',' ',$item_base_name);
            // remove numbers from begining of the string
            $tab_title = preg_replace('#^\d+#', '', $item_name);
        ?>
    
        <div class="ivm-grid-item"><?php include($item);?></div>
    
        <?php endforeach;?>  
    
</div>
</div>

<style>
.ivm-grid .ivm-grid-item {
    padding-left:<?php echo $ivm_grid_space;?>;
    padding-bottom:<?php echo $ivm_grid_space;?>;
}
.ivm-grid > div {
    margin-left:-<?php echo $ivm_grid_space;?>;
}
</style>

<script src="<?php echo $path; ?>/ivm/framework/uikit/js/components/grid.min.js"></script>