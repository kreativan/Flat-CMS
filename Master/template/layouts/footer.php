<?php if($custom_js == "on") : ?>
<!-- custom js --> 
<?php include("content/blocks/@system/sb_custom_js.txt"); ?>
<?php endif;?>
    
<!-- Stats Tracking Code -->
<script src="<?php echo $path; ?>/<?php echo $admin; ?>/inc/tracker.php?uri=<?php echo $_SERVER['REQUEST_URI']; ?>&ref=<?php echo $_SERVER['HTTP_REFERER']; ?>"></script>

<?php if($g_analytics == "on") : ?>
<!-- google analytics -->
<?php include("content/blocks/@system/sb_google_analytics.txt"); ?>
<?php endif;?>

<div id="ivm-footer">

<a class="ivm-scroll-top" href="#" data-uk-smooth-scroll><i class="uk-icon-angle-up"></i></a>
<p class="uk-text-center">Developed by <a href="http://kreativan.net" target="_blank">Ivan Milincic</a></p>

</div>

<footer id="ivm-mobile-menu" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <div class="uk-offcanvas-header"><img class="logo" alt="logo" src="<?php echo $path; ?>/template/img/logo.png"></div>
        <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
            <?php include("content/blocks/@menus/sb_mobile_menu.txt"); ?>
        </ul>    
    </div>
</footer>