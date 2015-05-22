<!DOCTYPE html>
<html lang="sr" dir="ltr">

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
    

<?php
$pass = htmlspecialchars($_POST['pass']);

?>  

<!-- if password is correct -->     
<?php if($pass == $protected_pages_password) :?> 
<!-- CONTENT -->    
<?php echo $parsedown->text($content); ?>
<!-- if password iswrong -->     
<?php elseif(isset($_POST['pass']) && $pass != "admin") : ?>
<div class="uk-container uk-container-center uk-flex uk-flex-middle uk-flex-center" style="min-height:500px;">
    <div class="uk-panel uk-text-center">
        <div class="uk-alert uk-alert-danger uk-margin-large-bottom" data-uk-alert style="width:500px;">
            <a href="" class="uk-alert-close uk-close"></a>
            <h3><i class="flaticon-warning"></i> Wrong password!</h3>
        </div>
        <a class="uk-button uk-button-danger uk-button-large" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
            <i class="uk-icon-arrow-left"></i> BACK
        </a>
    </div>
</div>    

<!-- login form -->    
<?php else : ?>
<div id="ivm-password" class="uk-container uk-container-center uk-flex uk-flex-middle uk-flex-center" style="min-height:400px;">
<div class="uk-panel" style="width:100%;padding:50px 0px;Fill:#222;">
    <div style="display:block;height:150px;width:auto;overflow:hidden;">
        <img class="svg" src="ivm/system/assets/img/protect.svg" />
    </div>
    <h1 class="uk-heading-large uk-text-center">This page is private</h1>
    <h2 class="uk-text-center uk-margin-large-bottom">You need password to access this page!</h2>
    <form action="?p=login" method="post" class="uk-form uk-form-stacked uk-text-center">
        <div class="uk-form-row">
            <input type="password" name="pass" id="pass" />
            <input class="uk-button uk-button-primary" type="submit" id="submit" value="Enter" />
        </div>
    </form>
</div>    
</div>
<?php endif;?>    
    

<!-- FOOTER -->    
<?php include("template/layouts/footer.php"); ?> 

</body>

</html>