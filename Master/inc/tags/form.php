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
		
	/*
		$mail->isSMTP();                                      // Do nothing here
		$mail->Host = 'smtp1.example.com';                    // Specify main server
		$mail->SMTPAuth = true;                               // Do nothing here
		$mail->Username = 'jswan';                            // SMTP username
		$mail->Password = 'secret';                           // SMTP password
		$mail->Port = 465;									  // SMTP port 	
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
	*/

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

<form id="contact" method="post" action="" >

<?php
	
if (!empty($mail_inputs)){
    foreach ($mail_inputs as $field => $type){
	   echo "<label>$field</label>";
	   $field = str_replace(" ", "_", $field); 
	   echo '<input id="'.$field.'" name="'.$field.'" type="'.$type.'" value="'.$_POST["$field"].'" > <br>';   
	}	
}

if (!empty($mail_textarea)) { 
	foreach ($mail_textarea as $field=> $rows){
		echo "<label>$field</label>";
		$field = str_replace(" ", "_", $field); 
		echo '<textarea name="'.$field.'" id = "'.$field.'" rows = "'.$rows.'" > '.trim($_POST["$field"]).'</textarea><br>'; 
	}
}

?>       

<input id="human" name="human" type="text"  value="<?php echo $_POST['human'];?>" > 
<button name="submit" type="submit"><?php echo $lang_form_sent_button; ?></button>
</form>

<?php } ?>
<link rel="stylesheet" href="inc/tags/css/form.css">