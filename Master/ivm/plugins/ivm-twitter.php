<?php

    // Settings
    $twitter_img = 'https://pbs.twimg.com/profile_images/463019833244659713/y2nJte5Q_400x400.jpeg';
    $twitter_img_size = '60px';
    $twitter_username = 'lokomotivan';
    $twitter_limit = '3';
    $show_time = 'true';
    $show_media = 'false';

?>

<div id="tweecool" class="uk-clearfix"></div>

<p class="uk-hidden"> 
<style>
.ivm-tweet-img,
.ivm-tweet-img img {
    height:<?php echo $twitter_img_size; ?>;
    width:<?php echo $twitter_img_size; ?>;
}
.ivm-tweets {
    margin-left:<?php echo $twitter_img_size; ?>;
    padding-left:20px;
}
#tweecool > ul {
    margin:0px;
}
    
</style>
    
<link rel="stylesheet" href="<?php echo $path; ?>/ivm/plugins/twitter/ivm-tweecool.css">
<script src="<?php echo $path; ?>/ivm/plugins/twitter/ivm-tweecool.js"></script>
<script>
$(document).ready(function() {
$('#tweecool').tweecool({
    //settings
    ivm_image_link:'<?php echo $twitter_img;?>',
    username : '<?php echo $twitter_username; ?>',
    limit : <?php echo $twitter_limit;?>,
    profile_image:true,
    show_time:<?php echo $show_time;?>,
    show_media:<?php echo $show_media;?>,
    //values: small, large, thumb, medium
    show_media_size: 'thumb' 
    });
});
</script>
</p>