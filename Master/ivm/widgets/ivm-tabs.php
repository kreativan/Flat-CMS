<?php 
    //SETTINGS

    $tabs_nav_poz = 'left'; // left, right, center
    $tabs_animation = 'fade';//[fade],[scale],[slide-top],[slide-bottom],[slide-left],[slide-right],[slide-horizontal],[slide-vertical];
 

    if ($tabs_nav_poz == 'center'){
        $tabs_center = 'uk-tab-center';
    }
    else if ($tabs_nav_poz == 'right'){
        $tabs_flip = 'uk-tab-flip';
    }
?>

<?php

    //$folder = "content/blocks/_tabs_/demo_tabs";

    $tag_var1 = $tag_var1 . '/';

    $folder = "content/blocks/@kreativ-ui/$tag_var1";
    $items = glob($folder . "*.{txt}", GLOB_BRACE);

    $id = 'ivm-tabs-'.$tag_var1;
    $id = preg_replace('/\s+/','',$id);
    $id = str_replace('/','',$id);

?>


<div class="ivm-widget-tabs">

<div class="ivm-tabs-nav <?php echo $tabs_center;?>">    
    <ul class="uk-tab <?php echo $tabs_flip;?>" data-uk-switcher="{connect:'#<?php echo $id;?>', animation: '<?php echo $tabs_animation;?>'}">    
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
 
<div class="ivm-tabs-content" style="margin-top:20px;">    
    <ul id="<?php echo $id;?>" class="uk-switcher">
        <?php foreach ($items as $item) : ?>
            <li><?php include($item);?></li>
        <?php endforeach;?>   
    </ul>
</div>
    
</div>