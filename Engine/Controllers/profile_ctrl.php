<?php 
if (!User_Factory::isLoggedIn()) {
	header("Location:login.php");
	exit();
}
if (isset($_POST['save-photo'])) {
	$upload =  new Upload("image", "profilePicInput", 4);

	// ERRORS
	if ($upload->sizeIsLarge()) {
		$errors[] = "Image file size should be at most 4MB !";
	}
	if (!$upload->isImage()) {
		$errors[] = "Please upload a valid image !";
	}
	if ($upload->hasError()) {
		$errors[] = "There is an error with your image, please try again !";
	}

	// MESSAGE	
	if (!empty($errors)) {
		$ERROR_MESSAGES = error_msg($errors);
	} else {
		$SUCCESS_MESSAGES = "Upload successful";
		$upload->pushImageTo("img/dp");
		$u->changeDpData($upload->data['new_file_name']);
	}
	
}

?>