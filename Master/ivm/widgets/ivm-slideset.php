<?php 
    //SETTINGS
    $slideset_animation = 'slide-horizontal';//[fade],[scale],[slide-top],[slide-bottom],[slide-horizontal],[slide-vertical];
    $slideset_autoplay = 'true';
    $slideset_no_of_items = '3';
    $slideset_slidenav  = 'true';
    $slideset_dotnav = 'true'; 
?>

<?php

    $tag_var1 = $tag_var1 . '/';

    $folder = "content/blocks/@slideset/$tag_var1";
    $items = glob($folder . "*.{txt}", GLOB_BRACE);

    $id = 'ivm-slideset-'.$tag_var1;
    $id = preg_replace('/\s+/','',$id);
    $id = str_replace('/','',$id);

?>

<div class="ivm-slideset">
    
<div data-uk-slideset="{small: 1, medium: 2, large: <?php echo $slideset_no_of_items; ?>, animation: '<?php echo $slideset_animation;?>', autoplay:<?php echo $slideset_autoplay;?>, pauseOnHover: 'true'}">
    <div class="uk-slidenav-position">
        <ul class="uk-slideset uk-grid">
            <?php foreach ($items as $item) : ?>
                <li><?php include($item);?></li>
            <?php endforeach;?>  
        </ul>
        <?php if ($slideset_slidenav == 'true') :?>
        <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
        <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
        <?php endif; ?>
    </div>
    <?php if ($slideset_dotnav == 'true') :?>
    <ul class="uk-slideset-nav uk-dotnav uk-flex-center"></ul>
    <?php endif; ?>
</div>

</div>

<script src="<?php echo $path; ?>/ivm/framework/uikit/js/components/slideset.min.js"></script>