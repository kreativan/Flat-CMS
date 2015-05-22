<?php 
    //SETTINGS

    $switcher_nav_poz = 'center'; // left, right, center
    $switcher_animation = 'slide-horizontal';//[fade],[scale],[slide-top],[slide-bottom],[slide-left],[slide-right],[slide-horizontal],[slide-vertical];

?>

<?php

    //$folder = "content/blocks/_tabs_/demo_tabs";

    $tag_var1 = $tag_var1 . '/';

    $folder = "content/blocks/@kreativ-ui/$tag_var1";
    $items = glob($folder . "*.{txt}", GLOB_BRACE);


    $id = 'ivm-switcher-'.$tag_var1;
    $id = preg_replace('/\s+/','',$id);
    $id = str_replace('/','',$id);

?>


<div class="ivm-widget-switcher">

<div class="ivm-switcher-nav">    
    <ul class="uk-subnav uk-subnav-pill uk-flex-<?php echo $switcher_nav_poz;?>" data-uk-switcher="{connect:'#<?php echo $id;?>', animation: '<?php echo $switcher_animation;?>'}">    
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
 
<div class="ivm-switcher-content" style="margin-top:20px;">    
    <ul id="<?php echo $id;?>" class="uk-switcher">
        <?php foreach ($items as $item) : ?>
            <li><?php include($item);?></li>
        <?php endforeach;?>   
    </ul>
</div>
    
</div>