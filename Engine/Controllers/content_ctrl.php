<?php
if (isset($_GET['id']) && Kraft_Factory::existsById($_GET['id'])) {
	$kraft = new Kraft_Singleton($_GET['id']);
	//Comments data
	$comments_assoc = $kraft->allComments("ASC");
	$comments = $comments_assoc['data'];

	//adding comments 
	if (isset($_POST['add-comment'])) {
		$user_comment = sanitize_note($_POST['comment']);
		// errors
		if(empty($user_comment)) {
			$errors[] = "Your comment should not be empty !";
		}

		if (!empty($errors)) {
			print_r($errors);
		} else {
			$kraft->addComment($user_comment, $u->get('id'));
			header("Location:content.php?id=".$kraft->get('id'));
			exit();

		}
	}
}

?>