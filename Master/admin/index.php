<?php

error_reporting(0);

include_once("../config.php");
include_once("inc/lang/english.php");
if (!empty($language) && file_exists("inc/lang/$language.php")){ include_once("inc/lang/$language.php"); } 
include_once("inc/login.php");
include_once("inc/magic.php");

$page = (isset($_GET['p']) && !empty($_GET['p'])) ? $_GET['p'] : 'home';
$page = htmlspecialchars($page, ENT_QUOTES, 'UTF-8');
$page = preg_replace('/[^-a-zA-Z0-9_]/', '', $page);

if (!file_exists("inc/" . $page . ".php")) {
    $page = '404';
}

ob_start(); 

include("inc/$page.php");

$content = ob_get_contents();

ob_end_clean();

?>
<!DOCTYPE html>
<html>
<head>	
	<title><?php echo $ivm_site_name; ?> CMS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo $path.'/'.$admin; ?>/css/admin.css">
	<link rel="stylesheet" href="<?php echo $path.'/'.$admin; ?>/css/animate.css">
	<link rel="stylesheet" href="<?php echo $path.'/'.$admin; ?>/css/redactor.css">
    
	<!-- JS -->
    <script src="<?php echo $path; ?>/ivm/system/assets/js/jquery.js"></script>
	<script src="<?php echo $path.'/'.$admin; ?>/js/jquery-ui.min.js"></script>
    <script src="<?php echo $path.'/'.$admin; ?>/js/scripts.js"></script>
    
    <!-- favicon -->
	<link rel="shortcut icon" type="image/ico" href="<?php echo $path; ?>/ivm/system/assets/img/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo $path; ?>/ivm/system/assets/img/apple-touch-icon.png" />
    
    <!-- fonts -->
    <link rel="stylesheet" href="<?php echo $path; ?>/ivm/framework/fonts/FaktPro.css">
    
    <!-- css -->
    <link rel="stylesheet" href="<?php echo $path; ?>/ivm/system/assets/css/ivm-uikit.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/ivm/system/assets/css/ivm-admin.min.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/ivm/system/assets/fonts/flaticon.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/ivm/system/assets/css/custom.css">
    
    <!-- ivm js -->
    <script src="<?php echo $path; ?>/ivm/system/assets/js/ivm_layout.js"></script>
    <script src="<?php echo $path; ?>/ivm/system/assets/js/ivm_protect.js"></script>
    <script src="<?php echo $path; ?>/ivm/system/assets/js/ivm-menu.js"></script>
    
    <!-- EDITORS -->
    <?php if($ivm_editor == 'htmleditor'):?>    
        <script>
            jQuery(function($) {
                $("#textblock").attr("data-uk-htmleditor","{mode:'tab'}");
                $("#wysiwyg").attr("data-uk-htmleditor","{mode:'tab'}");
            });
        </script>
    <?php else : ?>
    
    <!-- redactor editor -->
	<script src="<?php echo $path.'/'.$admin; ?>/js/redactor/table.js"></script>
    <script src="<?php echo $path; ?>/ivm/system/redactor/redactor.min.js"></script>
    <script src="<?php echo $path; ?>/ivm/system/redactor/redactor_options.js"></script>
    <script src="<?php echo $path.'/'.$admin; ?>/js/redactor/imagemanager.js"></script>
    <script src="<?php echo $path; ?>/ivm/system/redactor/table.js"></script>
    <script src="<?php echo $path; ?>/ivm/system/redactor/video.js"></script>
        
    <?php endif;?>
    
    <!-- uikit js -->
    <script src="<?php echo $path; ?>/ivm/system/assets/js/uikit.min.js"></script>
    <script src="<?php echo $path; ?>/ivm/system/assets/js/accordion.min.js"></script>
    
    <!-- html editor -->
    <link rel="stylesheet" href="<?php echo $path; ?>/ivm/system/assets/htmleditor/codemirror.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/ivm/system/assets/htmleditor/htmleditor.almost-flat.min.css">
    <script src="<?php echo $path; ?>/ivm/system/assets/htmleditor/codemirror.js"></script>
    <script src="<?php echo $path; ?>/ivm/system/assets/htmleditor/marked.js"></script>
    <script src="<?php echo $path; ?>/ivm/system/assets/htmleditor/htmleditor.js"></script>
    
    
<?php // ivm language files        
include_once("../ivm/lang/english.php"); 
if (!empty($language) && file_exists("../ivm/lang/$language.php")){ include_once("../ivm/lang/$language.php"); } 
?>
    
</head>
    
<body>
    
<?php // settings 
    include ("../ivm/system/settings.php");
?>   

<!-- sidebar -->   
<div id="ivm-admin-sidebar" class="uk-visible-large">
    
    <div class="ivm-admin-logo">
        <a href="<?php echo $path.'/'.$admin; ?>"><img src="<?php echo $path; ?>/ivm/system/assets/img/logo.png" /></a>
    </div>
    
    <nav id="ivm-admin-nav">
        <?php include("../ivm/system/menu.php"); ?>
    </nav>
    
    <div class="ivm-controls">
        <a class="ivm-logout" href="index.php?p=logout"><span class="flaticon-off"></span></a>
        <a class="ivm-view" href="../" target="_blank"><span class="flaticon-eye"></span></a>
    </div>
    
    <div id="ivm-admin-footer">
	   <a href="http://www.kreativan.net" target="_blank">Developed by kreativan.net v1.0.431</a>
    </div>
    
</div><!-- sidebar end -->

<!-- mobile menu -->      
<div id="ivm-admin-mobile-header" class="uk-hidden-large">
    <a href="#ivm-admin-mobile-menu" data-uk-offcanvas><i class="uk-icon-bars"></i></a>
    <?php include("../ivm/system/mobile-menu.php"); ?>
</div>
    
<!-- Toolbar -->
<div id="ivm-admin-toolbar" class="uk-visible-large">
    <?php include("../ivm/system/toolbar.php"); ?>
    <button class="ivm-show-toolbar"><i class="uk-icon-long-arrow-up"></i></button> 
</div>    

<!-- main content -->    
<div id="ivm-admin-main" class="ivm-folder-<?php echo $folder_display; ?>"> 
    <?php 
        echo $content;  
        if ($autobackup ==true && extension_loaded('zip')==true ){ include("inc/auto_backup.php"); } 
    ?>  
</div>
    
<!-- dev tools -->
<?php include("../ivm/dev-tools/dev-tools.php");?>    
    
<script type="text/javascript">
    function selectText(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
        }
    }
    
jQuery(function($) {
    $(".ivm-dev-close").click(function(){
        $(".ivm-dev-tools").addClass('uk-hidden');
    });
});    
    
</script>

</body>
</html>