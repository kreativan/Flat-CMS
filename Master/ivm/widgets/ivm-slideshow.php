<?php

    // Slideshow Settings
    $slideshow_height             = '400';    // slideshow height
    $slideshow_full_screen        = 'false'; // slideshow fulls creen true-false
    $slideshow_animation          = 'random-fx';   // fade, scroll, scale, swipe, slice-down, slice-up, slice-up-down, fold, puzzle, boxes, boxes-reverse, random-fx
    $slideshow_kenburns           = 'false';   // true - false
    $slideshow_caption            = 'true';   // true - false
    $caption_animation            = 'fade';   // fade, scale, slide-top, slide-bottom, slide-left, slide-right
    $slideshow_slidenav           = 'true';   // nav arrows true - false
    $slideshow_dotnav             = 'true';   // dot navigation true - false
    $slideshow_thumbnav           = 'true';   // true - false
    $slideshow_thumbnav_height    = '60px';    // % or px
    $slideshow_thumbnav_poz       = 'right'; // center, left, right

    if ($slideshow_full_screen == 'true') {
        $slideshow_full_screen = 'uk-slideshow-fullscreen';
    }

    $folder             = '@slideshow'; //slideshow main folder (defined in admin menu)

?>

<?php

// get dir
$galdir = $folder; // or $tag_var1
$images = glob("content/media/$galdir/*");
$taken  = array();
$path_new = '';
if (!empty($path)) { $path_new = $path.'/'; }

//file
$opFile = "content/media/". $galdir ."/gallery.txt";

if (file_exists($opFile)) { 
    //open -> read file -> files array
	$fp          = fopen($opFile,"r");    	
	$data        = @fread($fp, filesize($opFile));
	fclose($fp);
	$line        = explode("\n", $data);
    
    // separate files into arrays = 1 file 1 array
    foreach($line as $test){
		if(!empty($test)){
    		$test_line[] = explode("|", $test); 
		}     	        
	}    
}

$i = '0';
$t = '0';

?>

<div class="ivm-slideshow">
<div class="uk-slidenav-position" data-uk-slideshow="{kenburns:<?php echo $slideshow_kenburns; ?>, height: <?php echo $slideshow_height;?>, animation: '<?php echo $slideshow_animation;?>', autoplay: true}">
<ul class="uk-slideshow <?php echo $slideshow_full_screen;?> uk-overlay-active">
<?php foreach ($test_line as $item) : ?>
<?php
    $image          = "/content/media/$galdir/".$item[0];
    $info           = pathinfo($image);
    $ext            = $info['extension'];
    $item_text      = $item[2];
    $item_title     = preg_replace('/\\.[^.\\s]{3,4}$/', '', $item[0]);
    $img            = '<img src="'.$path.$image.'" alt="'.$item_title.'">';
?>
<?php if ($ext != 'txt' || empty($ext)) :?>
<?php $taken[] = $image; ?>
    
    
    
    <li>
        <?php echo $img; ?>
        <?php if($slideshow_caption == "true") : ?>
        <div class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center uk-overlay-<?php echo $caption_animation;?>">
            <div class="uk-width-7-10"><?php echo $item_text;?></div>
        </div>
        <?php endif;?>
    </li>
    
    
    
<?php endif; ?>
<?php endforeach;?>
</ul>
<?php if ($slideshow_slidenav == 'true') : ?>    
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
<?php endif; ?>    
<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
<?php if ($slideshow_dotnav == 'true') : ?>        
    <?php foreach($test_line as $image) : ?> 
    <?php if ($ext != 'txt' || empty($ext)) :?>  
        <li data-uk-slideshow-item="<?php echo $i++;?>"><a href=""></a></li>
    <?php endif; ?>
    <?php endforeach;?> 
<?php endif; ?>    
</ul>
<?php if ($slideshow_thumbnav == 'true') : ?>  
<div class="uk-overlay-panel uk-overlay-bottom">   
    <ul class="uk-thumbnav uk-flex-<?php echo $slideshow_thumbnav_poz;?>">
        <?php foreach($test_line as $item) : ?>
        <?php
            $image          = "/content/media/$galdir/".$item[0];
            $img            = '<img src="'.$path.$image.'" alt="'.$item_title.'"'.'style="height:'.$slideshow_thumbnav_height.';">';
        ?>
        <li data-uk-slideshow-item="<?php echo $t++;?>">
            <a href="" ><?php echo $img; ?></a>
        </li>
        <?php endforeach;?> 
    </ul>
</div>  
<?php endif; ?>     
</div>    
</div>

<p class="uk-margin-remove">
<script src="<?php echo $path; ?>/ivm/framework/uikit/js/components/slideshow.min.js"></script>
<script src="<?php echo $path; ?>/ivm/framework/uikit/js/components/slideshow-fx.min.js"></script>
</p>