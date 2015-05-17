<?php

    include("../ivm/system/settings/email-config.php");

    
if (isset($_POST['ivm_email_submit'])){
    $form_config = fopen("../ivm/system/settings/email-config.php", "w") or die("Unable to open file!");
    
    $form_txt  = '<?php'."\n";
    $form_txt .= '$ivm_master_mail='.'"'.$_POST["ivm_master_mail"].'"'.';'."\n";
    $form_txt .= '$ivm_master_name='.'"'.$_POST["ivm_master_name"].'"'.';'."\n";
    $form_txt .= '$ivm_smtp='.'"'.$_POST["ivm_smtp"].'"'.';'."\n";
    $form_txt .= '$ivm_smtp_host='.'"'.$_POST["ivm_smtp_host"].'"'.';'."\n";
    $form_txt .= '$ivm_smtp_user='.'"'.$_POST["ivm_smtp_user"].'"'.';'."\n";
    $form_txt .= '$ivm_smtp_password='.'"'.$_POST["ivm_smtp_password"].'"'.';'."\n";
    $form_txt .= '$ivm_smtp_secure='.'"'.$_POST["ivm_smtp_secure"].'"'.';'."\n";
    $form_txt .= '$ivm_smtp_port='.'"'.$_POST["ivm_smtp_port"].'"'.';'."\n";
    $form_txt .= '?>';
    fwrite($form_config, $form_txt);
    
    fclose($form_config);
}

?>

<form action="?ivm-form-save" method="post" class="ivm-settings">
    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Email Address:</div>
    <div class="uk-float-right">
	   <input type="text" name="ivm_master_mail" value="<?php echo $ivm_master_mail; ?>">
    </div>
</div>     
<hr>
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">Owner Name:</div>
    <div class="uk-float-right">
	   <input type="text" name="ivm_master_name" value="<?php echo $ivm_master_name; ?>">
    </div>
</div>     
<hr>
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">SMTP Mail</div>
    <div class="on-off uk-float-right">
	   <input class="on" type="radio" name="ivm_smtp" value="on" <?php if ($ivm_smtp == "on") echo 'checked="checked"'; ?>>
        <label></label>
        <input class="off" type="radio" name="ivm_smtp" value="off" <?php if ($ivm_smtp == "off") echo 'checked="checked"'; ?>>
        <label></label>
    </div>
</div>
<hr>        
    
<div class="uk-accordion" data-uk-accordion>    
<h3 class="uk-accordion-title uk-active">SMTP Settings</h3>
<div class="uk-accordion-content">
          
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">SMTP Host</div>
    <div class="uk-float-right">
	   <input type="text" name="ivm_smtp_host" value="<?php echo $ivm_smtp_host; ?>">
    </div>
</div>
<hr>    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">SMTP User Name</div>
    <div class="uk-float-right">
	   <input type="text" name="ivm_smtp_user" value="<?php echo $ivm_smtp_user; ?>">
    </div>
</div>
<hr>    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">SMTP Password</div>
    <div class="uk-float-right">
	   <input type="password" name="ivm_smtp_password" value="<?php echo $ivm_smtp_password; ?>">
    </div>
</div>
<hr>    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">SMTP Security</div>
    <div class="uk-float-right">
	   <input type="text" name="ivm_smtp_secure" value="<?php echo $ivm_smtp_secure; ?>">
    </div>
</div>  
<hr>    
<div class="ivm-option uk-clearfix">
    <div class="uk-text-muted uk-float-left" style="position:relative;top:3px;">SMTP Port</div>
    <div class="uk-float-right">
	   <input type="text" name="ivm_smtp_port" value="<?php echo $ivm_smtp_port; ?>">
    </div>
</div>
    
</div>
</div>
    
<div class="uk-text-center">
    <input class="ivm-save-button btn" name="ivm_email_submit" type="submit" value="Save Settings">
</div>    

</form>