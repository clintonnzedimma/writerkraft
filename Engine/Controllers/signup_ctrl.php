<?php

// Safe redirection
if (User_Factory::isLoggedIn()) {
	header("Location:home.php");
	exit();
}

if (isset($_POST['sign_up'])) {
	#required fields
 	$req_fields = array('username', 'full_name', 'password', 'confirm_password', 'email', 'sex');

	# Actual data for user sign up
	$username = sanitize_note($_POST['username']);
	$full_name = sanitize_note($_POST['full_name']);
	$password = sanitize_note($_POST['password']);
	$confirm_password = sanitize_note($_POST['confirm_password']);
	$email = sanitize_note($_POST['email']);
	$sex = sanitize_note($_POST['sex']);


	/* Handling errors */
	if (!mandatory_fields($req_fields)) {
		$errors[] = "Please fill all fields !";
	}
	if (strlen($username) < 3) {
		$errors[] = "Your username should not be less than 3 characters ! ";
	}
	if (!sanitize_username($username)) {
		$errors[] = "Username should not contain space or special characters !";
	}	
	if (check_for_whitespace($username)) {
		$errors[] = "Your username should not contain any space ! ";
	}
	if (!strHasLettersOnly($full_name)) {
		$errors[] = "Your Full name should contain only letters [A-Za-z] !";
	}
	if (strlen($full_name)<3) {
		$errors[] = " Your full name should not be less than 3 characters !";
	}
	if (strlen($password) < 5) {
		$errors[] = " Your password should not be less than 5 characters !";
	}
	if (strlen($password) >= 5 && $password != $confirm_password) {
		$errors[] = "Your passwords do not match !";
	}
	if (!sanitize_email($email)) {
		$errors[] = "Invalid Email";
	}	
	if($sex != "male" && $sex != "female" && $sex!=null) {
		$errors[] = "Invalid Sex !";
	}
	if ($sex == null || $sex =="") {
		$errors[] = "Please select sex";	
	}	
	if (User_Factory::usernameExists($username)) {
		$errors[] = "Username <b> $username  </b> already taken, choose another username !";
	}
	if (User_Factory::emailExists($email)) {
		$errors[] = "Email <b> $email </b> has aleady been used !";
	}


	if (!empty($errors)) {
		print_r($errors);
	} else {
		$success = "Sign up successful !";
		print_r($success);
		User_Factory::signUp();
		User_Factory::authenticate($username);
		header("Location:home.php");
		exit();
	}
 } 

?>