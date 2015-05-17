<?php

// edit the language variables for the form here

$thanks      = "Thanks!";
$try_again   = "Try again";
$placeholder = "Enter Email";
$button_send = "Sign up";

error_reporting(0);
$no_good = false;
$success = false;
session_start();

if (isset($_POST['submit']) 
	&& ($_POST["send_token"] == $_SESSION["send_token"])){

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) 
	&& substr_count($_POST['email'],'@') == 1 
	&& substr_count($_POST['email'],',') == 0 ){ 
					
		$file_han = fopen("content/blocks/sb_email_list.txt","a");
		fwrite($file_han,$_POST['email']."\n");
		fclose($file_han);
		
		$success = true;
		unset($_SESSION["send_token"]); 
				
	} else { 
		$no_good = true; 		
	}
} 

if ($success == true) { echo $thanks; }

if ($success == false || $no_good == true ) {

	if ($no_good == true) { $no_good = $try_again; }
	
	$_SESSION["send_token"] = md5(uniqid(rand(), TRUE));	

?>

<form id="contact" method="post" action="" >
	<input id="email" name="email" placeholder="<?php echo $placeholder; ?>" type="email" value="<?php echo $no_good; ?>" >
	<input type="hidden" name="send_token" value="<?php echo $_SESSION["send_token"]; ?>">
	<button name="submit" type="submit"><?php echo $button_send; ?></button>
</form>

<?php } ?>

<style>
	button { padding: 5px 10px; color: white; background-color: #999; font-size: 13px; }
	input { padding: 5px 10px; font-size: 13px; }
</style>
