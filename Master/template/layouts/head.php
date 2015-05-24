<!-- favicon -->
<link rel="shortcut icon" type="image/ico" href="<?php echo $path; ?>/template/img/favicon.ico" />
<link rel="apple-touch-icon-precomposed" href="<?php echo $path; ?>/template/img/apple-touch-icon.png" />

<!-- fonts -->
<link rel="stylesheet" href="<?php echo $path; ?>/ivm/framework/fonts/FaktPro.css">
<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>

<!-- js -->
<script src="<?php echo $path; ?>/ivm/framework/js/jquery.js"></script>
<script src="<?php echo $path; ?>/ivm/framework/uikit/js/uikit.min.js"></script>
<script src="<?php echo $path; ?>/ivm/framework/uikit/js/components/sticky.min.js"></script>
<script src="<?php echo $path; ?>/ivm/framework/uikit/js/components/lightbox.min.js"></script>
<script src="<?php echo $path; ?>/ivm/framework/uikit/js/components/tooltip.min.js"></script>

<script src="<?php echo $path; ?>/ivm/framework/js/ivm_menu.js"></script>
<script src="<?php echo $path; ?>/ivm/framework/js/highlight.pack.js"></script>

<script src="<?php echo $path; ?>/template/js/smooth-scroll.js"></script>
<script src="<?php echo $path; ?>/template/js/custom.js"></script>

<!-- css -->
<link rel="stylesheet" href="<?php echo $path; ?>/template/css/theme.css">
<link rel="stylesheet" href="<?php echo $path; ?>/template/css/custom.css">

<!-- less preprocessor -->
<?php if($less == "on") : ?>
    <link rel="stylesheet/less" href="<?php echo $path; ?>/template/less/theme.less">
    <script src="<?php echo $path; ?>/ivm/framework/js/less.min.js"></script>
<?php endif;?>

<!-- meta tags -->
<?php include("content/blocks/@system/sb_meta.txt"); ?>

<?php if($custom_css == 'on') : ?>
    <?php include("content/blocks/@system/sb_custom_css.txt"); ?>
<?php endif;?>

<script type="text/javascript">
// add prefix to img src    
$(document).ready(function() {
       $("img").each(function() {
          $(this).attr("src", $(this).attr("src").replace("/content", "<?php echo $path;?>/content"));
       });
    });
</script>
<script src="<?php echo $path; ?>/ivm/framework/js/svg.js"></script>