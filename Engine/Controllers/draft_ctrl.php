<?php
User_Factory::protectPage();

if (isset($_GET['id']) && Kraft_Draft_Factory::existsById($_GET['id'])) {
	$draft = new Kraft_Draft_Singleton($_GET['id']);
	if ($draft->creator->get('id') == $u->get('id')) {
		if (isset($_POST['add-kraft'])) {

			$req_fields = array('title', 'writeup'/*, 'cover_img'*/);

			$title = sanitize_note($_POST["title"]);
			$writeup = sanitize_note($_POST["writeup"]);
			/*$upload = new Upload('image', 'cover_img', 2);*/

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
			if ($draft->hasBeenPublished()) {
				$errors[] = 'Sorry, you have already published this draft !';
			}

			if (!empty($errors)) {
				print_r($errors);
			} else if ($_POST['add-kraft'] == 'to-publish' && empty($errors)) {
				// Publishing kraft
				$success = "DRAFT PUBLISHED";
				echo $success;
				$draft->publish();
			} else if ($_POST['add-kraft'] == 'to-draft' && empty($errors)) {
				// modifying draft
				$success = "KRAFT SAVED TO DRAFT";
				echo $success;
				$draft->modify();
			}
		}
	}
}
?>