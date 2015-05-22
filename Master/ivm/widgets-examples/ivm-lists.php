<?php 
    //SETTINGS
    $lists_nav_poz = 'left'; // left, right
    $lists_animation = 'slide-vertical';//[fade],[scale],[slide-top],[slide-bottom],[slide-left],[slide-right],[slide-horizontal],[slide-vertical];
?>

<?php

    //$folder = "content/blocks/_tabs_/demo_tabs";

    $tag_var1 = $tag_var1 . '/';

    $folder = "content/blocks/@kreativ-ui/$tag_var1";
    $items = glob($folder . "*.{txt}", GLOB_BRACE);

    $id = 'ivm-lists-'.$tag_var1;
    $id = preg_replace('/\s+/','',$id);
    $id = str_replace('/','',$id);

?>


<div class="ivm-widget-lists">

<?php if ($lists_nav_poz == 'left'): ?>
<div class="uk-grid uk-grid-match " data-uk-grid-match="{target:'> div > ul'}" data-uk-grid-margin="">   
    <div class="uk-width-medium-1-4">
        <ul class="uk-tab uk-tab-left" data-uk-tab="{connect:'#<?php echo $id;?>',animation:'<?php echo $lists_animation;?>'}">        
            <?php foreach ($items as $item) : ?>
            <?php
                // remove .txt extension
                $item_base_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($item));
                // replace _ with space
                $item_name = str_replace('_',' ',$item_base_name);
                // remove numbers from begining of the string
                $tab_title = preg_replace('#^\d+#', '', $item_name);
            ?>
            
                <li><a href=""><?php echo $tab_title;?></a></li>
            
            <?php endforeach;?> 
        </ul>
    </div>
    
    <div class="uk-width-medium-3-4">
        <ul id="<?php echo $id;?>" class="uk-switcher">
            <?php foreach ($items as $item) : ?>
                <li><?php include($item);?></li>
            <?php endforeach;?>   
        </ul>
    </div>  
</div>
<?php elseif ($lists_nav_poz == 'right'): ?>    
<div class="uk-grid uk-grid-match " data-uk-grid-match="{target:'> div > ul'}" data-uk-grid-margin="">
    <div class="uk-width-medium-3-4">
        <ul id="<?php echo $id;?>" class="uk-switcher">
            <?php foreach ($items as $item) : ?>
                <li><?php include($item);?></li>
            <?php endforeach;?>   
        </ul>
    </div>  
    <div class="uk-width-medium-1-4">
        <ul class="uk-tab uk-tab-right" data-uk-tab="{connect:'#<?php echo $id;?>',animation:'<?php echo $lists_animation;?>'}">        
            <?php foreach ($items as $item) : ?>
            <?php
                // remove .txt extension
                $item_base_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($item));
                // replace _ with space
                $item_name = str_replace('_',' ',$item_base_name);
                // remove numbers from begining of the string
                $tab_title = preg_replace('#^\d+#', '', $item_name);
            ?>
            
                <li><a href=""><?php echo $tab_title;?></a></li>
            
            <?php endforeach;?> 
        </ul>
    </div>
</div>    
<?php endif;?>
    
</div>