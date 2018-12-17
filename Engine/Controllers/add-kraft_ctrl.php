<?php
User_Factory::protectPage();
if (isset($_POST['add-kraft'])) {

	$req_fields = array('title', 'writeup', 'cover_img');

	$title = sanitize_note($_POST["title"]);
	$writeup = sanitize_note($_POST["writeup"]);
	$upload = new Upload('image', 'cover_img', 2);

	/*errors*/
	if (!mandatory_fields($req_fields)) {
		$errors[] = "Please fill all fields !";
	}
	if (strlen($title) > 50) {
		$errors[]='The title should not exceed 50 characters !';
	}
	if (strlen($title) < 3) {
		$errors[]='The title should not be less than 3 characters !';
	}
	if (strlen($writeup) > 500){
		$errors[]='The description should not exceed 500 characters';
	}	
	if (strlen($writeup) < 5){
		$errors[]='The description should not be less than 5 characters !';
	}	
	if ($upload->sizeIsLarge() && !$upload->hasError()) {
		$errors[] = "Please upload image below 2.0MB !";
	}
	if ($upload->hasError()) {
		$errors[] = "There is an error in the photo you uploaded !";
	}
	if (!$upload->isImage() && !$upload->isEmpty()) {
		$errors[] = "The file you uploaded is not an image !";
	}
	if ($upload->isEmpty()) {
		$errors[] = "No Image !";
	}

	if (!empty($errors)) {
		print_r($errors);
	} else {
		$success = "KRAFT POSTED";
		echo $success;
		Kraft_Factory::addNew($u->get('id'));

	}
}
?>