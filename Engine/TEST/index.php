<?php
include $_SERVER['DOCUMENT_ROOT'].'/zipment/engine/env/ftf.php';
$packageFactory = new Package();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHECK</title>
</head>
<body>

<?php 
	if (submit_btn_clicked('check')) {
		$pin = sanitize_note($_POST['pin']);

		if(!$pin || empty($pin)) {
			$errors[] = "PIN should not be empty";
		}
		if (strlen($pin) != 6) {
			$errors[] = "PIN should not be characters";
		}

		if (!$packageFactory->existsByPin($pin) && strlen($pin) == 6) {
			$errors[] = "Tracking ID invalid";
		}

		if (!empty($errors)) {
			$ERROR_MESSAGE = error_msg($errors);
			echo "<p style='color:red'> $ERROR_MESSAGE </p>";
		} else {
			header("Location:track.php?pin=$pin");
			exit();
		}
	}

?>	

<?php //echo sanitize_note("''") ?>

<form method="post">
	<input type="text" name="pin">
	<input type="submit" name="check" value="CHECK">
</form>
</body>
</html>