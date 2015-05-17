<!DOCTYPE html>
<html>

<head>	
	<title><?php echo $page_title; ?></title>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $page_desc; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include("template/layouts/head.php"); ?> 
    
</head>

<body>

<!-- HEADER -->
<?php include("template/layouts/header.php"); ?>

<!-- page heading -->    
<div class="ivm-page-heading">
    <div class="uk-container uk-container-center">
        <h1 class="uk-heading-large"><?php echo $page_title; ?></h1>
        <h2 class="uk-margin-remove"><?php echo $page_desc; ?></h2>
    </div>
</div>  
    
<!-- CONTENT -->
<div class="uk-container uk-container-center">   
    <div class="uk-grid" data-uk-grid-match="{target:'.ivm-content'}">
        
        <div class="uk-width-medium-3-4">
            <div class="ivm-content">
            <?php echo $parsedown->text($content); ?>
            </div>
        </div>
        
        <div class="uk-width-medium-1-4">
            <div class="ivm-content ivm-sidebar">
                <?php
                    if ($tag_var2 != '') {
                        $tag_var2 = $tag_var2.'/';
                    }
                    $sidebar_folder = "content/blocks/@sidebar/$tag_var2";
                    $files = glob($sidebar_folder . "*.{txt}", GLOB_BRACE);
                    
                    foreach ($files as $file) {
                        include($file);
                    }
                ?>
            </div>
        </div>
        
    </div>
</div>

<!-- FOOTER -->    
<?php include("template/layouts/footer.php"); ?> 

</body>

</html>