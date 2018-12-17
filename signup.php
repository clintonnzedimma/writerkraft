<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
include ROOT.'/engine/controllers/signup_ctrl.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
	<div>
		<form method="POST">
			<p> Username : <input type="text" name="username" value="<?php postConst('username') ?>"> </p>
			<p> Full Name : <input type="text" name="full_name" value="<?php postConst('full_name') ?>"> </p>
			<p> Password : <input type="password" name="password"> </p>
			<p> Confirm Password : <input type="password" name="confirm_password"> </p>
			<p> Email : <input type="text" name="email" value="<?php postConst('email') ?>"> </p>
			<p> 
				Sex : <select name="sex"> 
					<option value="">Select Sex</option>
					<option value="male" <?php selectPostConst('sex', 'male') ?> >Male</option>
					<option value="female" <?php selectPostConst('sex', 'female') ?> >Female</option>
				</select> 
			</p>
			<p><button name="sign_up">Sign up</button></p>
		</form>
	</div>

</body>
</html>