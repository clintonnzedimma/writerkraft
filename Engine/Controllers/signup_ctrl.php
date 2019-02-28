<?php

// Safe redirection
if (User_Factory::isLoggedIn()) {
	header("Location:home.php");
	exit();
}

$warning_icon_html = '<i class="zmdi zmdi-assignment-alert warning-icon"></i>';
$success_icon_html = '<i class="zmdi zmdi-assignment-alert check-icon"></i>'; 

if (isset($_POST['sign_up'])) {
	#required fields
 	$req_fields = array('username', 'full_name', 'password', 'confirm_password', 'email', 'sex');

	# Actual data for user sign up
	$username = sanitize_note($_POST['username']);
	$full_name = sanitize_note($_POST['full_name']);
	$password = sanitize_note($_POST['password']);
	$confirm_password = sanitize_note($_POST['confirm_password']);
	$email = sanitize_note($_POST['email']);


	/* Handling errors */
	if (!mandatory_fields($req_fields)) {
		$errors[] = $warning_icon_html."Please fill all fields !";
	}
	if (strlen($username) < 3) {
		$errors[] = $warning_icon_html."Your username should not be less than 3 characters ! ";
	}
	if (!sanitize_username($username)) {
		$errors[] = $warning_icon_html."Username should not contain space or special characters !";
	}	
	if (check_for_whitespace($username)) {
		$errors[] = $warning_icon_html."Your username should not contain any space ! ";
	}
	if (!strHasLettersOnly($full_name)) {
		$errors[] = $warning_icon_html."Your Full name should contain only letters [A-Za-z] !";
	}
	if (strlen($full_name)<3) {
		$errors[] = $warning_icon_html." Your full name should not be less than 3 characters !";
	}
	if (strlen($password) < 5) {
		$errors[] = $warning_icon_html." Your password should not be less than 5 characters !";
	}
	if (strlen($password) >= 5 && $password != $confirm_password) {
		$errors[] = $warning_icon_html."Your passwords do not match !";
	}
	if (!sanitize_email($email)) {
		$errors[] = $warning_icon_html."Invalid Email";
	}	
	if (User_Factory::usernameExists($username)) {
		$errors[] = $warning_icon_html."Username <b> $username  </b> already taken, choose another username !";
	}
	if (User_Factory::emailExists($email)) {
		$errors[] = $warning_icon_html."Email <b> $email </b> has aleady been used !";
	}


	if (!empty($errors)) {
		$ERROR_MESSAGE = error_msg($errors);
	} else {
		$success = $success_icon_html."Sign up successful !";
		$SUCCESS_MESSAGE = success_msg($success); 
		print_r($success);
		User_Factory::signUp();
		User_Factory::authenticate($username);
		header("Location:index.php");
		exit();
	}
 } 

?>