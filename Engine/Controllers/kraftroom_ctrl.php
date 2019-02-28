<?php
User_Factory::protectPage();
if (isset($_POST['add-kraft'])) {

	$req_fields = array('title', 'writeup', 'cover_img');

	$title = sanitize_note($_POST["title"]);
	$writeup = sanitize_note($_POST["writeup"]);
	$category = sanitize_note($_POST['category']);
	$editor_note = sanitize_note($_POST['editor_note']);
	$upload = new Upload('image', 'cover_img', 2);

	/*errors*/
	if (!mandatory_fields($req_fields)) {
		$errors[] = "Please fill all fields !";
	}
	if (strlen($title) > 50) {
		$errors[] = 'The title should not exceed 50 characters !';
	}
	if (strlen($title) < 3) {
		$errors[] = 'The title should not be less than 3 characters !';
	}
	if (strlen($writeup) > 500){
		$errors[] = 'The content should not exceed 500 characters';
	}	
	if (strlen($writeup) < 5){
		$errors[] = 'The content should not be less than 5 characters !';
	}
	if (strlen($category) == 0) {
		$errors[] = "Please choose a category !";
	}	
	if (!in_array($category, Kraft_Factory::$allowed_categories) && strlen($category) > 0) {
		$errors[] = "Invalid category !";
	}	
	if ($upload->sizeIsLarge() && !$upload->hasError()) {
		$errors[] = "Please upload image below 2.0MB !";
	}
	if ($upload->hasError() && !$upload->isEmpty()) {
		$errors[] = "There is an error in the photo you uploaded !";
	}
	if (!$upload->isImage() && !$upload->isEmpty()) {
		$errors[] = "The file you uploaded is not an image !";
	}


	// If errors exists do nothing else publish kraft or save to draft
	if (!empty($errors)) {
		$ERROR_MESSAGES = error_msg($errors);
	} else if ($_POST['add-kraft'] == 'to-publish' && empty($errors)) {
		// Publishing kraft
		$success = "KRAFT POSTED";
		Kraft_Factory::addNew($u->get('id'));
	} else if ($_POST['add-kraft'] == 'to-draft' && empty($errors)) {
		// Saving kraft to draft
		$success = "KRAFT SAVED TO DRAFT";
		Kraft_Draft_Factory::addNew($u->get('id'));
	}


}


?>