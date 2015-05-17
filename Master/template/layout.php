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
 
<!-- CONTENT -->    
<?php echo $parsedown->text($content); ?>

<!-- FOOTER -->    
<?php include("template/layouts/footer.php"); ?> 

</body>

</html>