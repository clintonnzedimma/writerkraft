<?php

// Safe redirection
if (User_Factory::isLoggedIn()) {
	header("Location:home.php");
	exit();
}

if (isset($_POST['login'])) {
	# required fields
	$req_fields = array('username', 'password');

	# Actual data for user login
	$username = sanitize_note(strip_whitespace($_POST['username']));;
	$password = sanitize_note($_POST['password']);


	/* Handling errors */
	if (!mandatory_fields($req_fields)) {
		$errors[] = "Please fill all fields !";
	}
	if (!User_Factory::usernameExists($username)) {
		$errors[] = "This username  <b> $username </b> does not exist !";
	}
	if (strlen($username) < 3) {
		$errors[] = "Invalid username !";
	}
	if (User_Factory::usernameExists($username) && !User_Factory::passwordCheckByUsername($username, $password)) {
		$errors[] = "Wrong password !";
	}
	
	if (!empty($errors)) {
			print_r($errors);
		} else {
			$success = "Login Successful!";
			User_Factory::authenticate($username);
			header("Location:home.php");
			exit();
		}


}

?>