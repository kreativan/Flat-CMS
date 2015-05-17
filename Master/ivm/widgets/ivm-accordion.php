
<?php

    //$folder = "content/blocks/_tabs_/demo_tabs";

    $tag_var1 = $tag_var1 . '/';

    $folder = "content/blocks/@kreativ-ui/$tag_var1";
    $items = glob($folder . "*.{txt}", GLOB_BRACE);

    $id = 'ivm-accordion-'.$tag_var1;
    $id = preg_replace('/\s+/','',$id);
    $id = str_replace('/','',$id);

?>


<div class="ivm-widget-accordion">

<div class="uk-accordion" data-uk-accordion>
<?php foreach ($items as $item) : ?>
    <?php
        // remove .txt extension
        $item_base_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($item));
        // replace _ with space
        $item_name = str_replace('_',' ',$item_base_name);
        // remove numbers from begining of the string
        $accordion_title = preg_replace('#^\d+#', '', $item_name);
    ?>
    
    <h3 class="uk-accordion-title"><?php echo $accordion_title;?></h3>
    <div class="uk-accordion-content"><?php include($item);?></div>
    
<?php endforeach;?> 
</div>
    
</div>

<script src="<?php echo $path; ?>/ivm/framework/uikit/js/components/accordion.min.js"></script>