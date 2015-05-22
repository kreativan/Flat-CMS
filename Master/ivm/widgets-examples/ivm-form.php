<?php 
    /* Email Settings
    $ivm_master_mail="email@gmail.com";
    $ivm_master_name="Ivan Milincic";   // your name
    $ivm_smtp="off"; // on/ off
    $ivm_smtp_host="smtp1.example.com"; // eg. smtp.gmail.com
    $ivm_smtp_user="smtp_username"; // email adress
    $ivm_smtp_password="smtp_password"; // passowrd
    $ivm_smtp_secure="ssl"; //ssl or tls
    $ivm_smtp_port="465";
    */
    include("ivm/system/settings/email-config.php"); // admin email config file, comment if u wont to use params above;
?>

<?php

include_once("inc/plugins/mailer/class.phpmailer.php");
include_once("inc/plugins/mailer/class.smtp.php");

if (isset($_POST['submit']) && empty($_POST['human'])){
   
    $merge_tester = array_merge($mail_inputs, $mail_textarea);
    
	foreach ($merge_tester as $field => $type){	
		$raw_field = $field;		
		$field = str_replace(" ", "_", $field); 

		if (!isset($_POST[$field]) || empty($_POST[$field]) || strlen(trim($_POST[$field]))< 1 ){
			$field = str_replace("_", " ", $field); 
			$errors[] = $lang_form_error1 . $field;
		}	
		if (strlen($_POST[$field])>1000){
			$field = str_replace("_", " ", $field); 
			$errors[] = $lang_form_error2a. $field .$lang_form_error2b;
		}
		if ($raw_field == $lang_form_email && (filter_var($_POST[$field], FILTER_VALIDATE_EMAIL) == false)){
			$errors[] = $lang_form_error1 . $raw_field;
		}	   
	}
	 	
	if (empty($errors)){
		foreach ($merge_tester as $field => $type) {
			$field1     = str_replace(" ", "_", $field); 			
			$submitted = trim($_POST[$field1]);
			
			if ($field == $lang_form_name){   
				$sender_name = $submitted;
			}
			else if ($field == $lang_form_email){ 
				$sender_email = $submitted;
			}
			else {                             
				$text .= $field .': '. $submitted."\n\n"; 
			}
		  }
	
    $mail = new PHPMailer;
	
	// If your host requires smtp authentication, uncomment and fill out the lines below. 
		
	//if smtp turned on
    if ($ivm_smtp = 'on') {
            
		$mail->isSMTP();                                      // Do nothing here
		$mail->Host = $ivm_smtp_host;                         // Specify main server -> 'smtp1.example.com'
		$mail->SMTPAuth = true;                               // Do nothing here
		$mail->Username = $ivm_smtp_user;                     // SMTP username
		$mail->Password = $ivm_smtp_password;                 // SMTP password
		$mail->Port = $ivm_smtp_port;						  // SMTP port 	ssl = 465
		$mail->SMTPSecure = $ivm_smtp_secure;                 // Enable encryption, 'ssl'or 'tls' also accepted
        
    }// smtp params end


	$mail->From     = $sender_email;
	$mail->FromName = $sender_name;	
	foreach ($email_contact as $email_address){ $mail->addAddress($email_address); }
	$mail->Subject  = $lang_form_subject_line;
	$mail->Body     = $text;
            
    if ($mail->send()) { echo "<p class='green'>$lang_form_email_sent</p>"; $success = true; unset($mail,$merge_tester);}
    } 
           
}
 
if (!empty($errors) || $success == false){
if (!empty($errors)) { foreach($errors as $error){ echo "<p>".$error."</p>"; }}	
    
    
?>

<div class="uk-flex uk-flex-center">
<form id="ivm-contact" class="uk-form uk-form-stacked uk-display-inline-block" method="post" action="" >  
<?php
	
if (!empty($mail_inputs)){
    foreach ($mail_inputs as $field => $type){ 
       echo '<div class="uk-form-row">';    
	   echo "<label class='uk-form-label'>$field</label>";
	   $field = str_replace(" ", "_", $field); 
	   echo '<input id="'.$field.'" name="'.$field.'" type="'.$type.'" value="'.$_POST["$field"].'" > <br>'; 
       echo '</div>';    
	}	
}

if (!empty($mail_textarea)) { 
	foreach ($mail_textarea as $field=> $rows){
        echo '<div class="uk-form-row">';   
		echo "<label class='uk-form-label'>$field</label>";
		$field = str_replace(" ", "_", $field); 
		echo '<textarea name="'.$field.'" id = "'.$field.'" rows = "'.$rows.'" > '.trim($_POST["$field"]).'</textarea><br>'; 
        echo '</div>'; 
	}
}

?>       
<div class="uk-form-row">
    <input class="uk-hidden" id="human" name="human" type="text"  value="<?php echo $_POST['human'];?>" > 
    <button class="uk-button uk-button-primary" name="submit" type="submit"><?php echo $lang_form_sent_button; ?></button>
</div>
</form>
</div>
<?php } ?>
