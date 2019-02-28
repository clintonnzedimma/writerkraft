<?php

// Safe redirection
if (User_Factory::isLoggedIn()) {
	header("Location:home.php");
	exit();
}

$warning_icon_html = '<i class="zmdi zmdi-assignment-alert warning-icon"></i>';
$success_icon_html = '<i class="zmdi zmdi-assignment-alert check-icon"></i>';

if (isset($_POST['login'])) {
	# required fields
	$req_fields = array('username', 'password');

	# Actual data for user login
	$username = sanitize_note(strip_whitespace($_POST['username']));;
	$password = sanitize_note($_POST['password']);


	/* Handling errors */
	if (!mandatory_fields($req_fields)) {
		$errors[] = $warning_icon_html."Please fill all fields !";
	}
	if (!User_Factory::usernameExists($username)) {
		$errors[] = $warning_icon_html."This username  <b> $username </b> does not exist !";
	}
	if (strlen($username) < 3) {
		$errors[] = $warning_icon_html."Invalid username !";
	}
	if (User_Factory::usernameExists($username) && !User_Factory::passwordCheckByUsername($username, $password)) {
		$errors[] = $warning_icon_html."Wrong password !";
	}
	
	if (!empty($errors)) {
			$ERROR_MESSAGE = error_msg($errors);
		} else {
			$success = $success_icon_html."Login Successful!";
			$SUCCESS_MESSAGE = success_msg($success); 
			User_Factory::authenticate($username);
			header("Location:index.php");
			exit();
		}


}

?>