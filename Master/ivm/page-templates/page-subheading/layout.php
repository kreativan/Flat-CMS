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
<div class="uk-container uk-container-center ivm-content">
    <?php echo $parsedown->text($content); ?>
</div>

<!-- FOOTER -->    
<?php include("template/layouts/footer.php"); ?> 

</body>

</html>