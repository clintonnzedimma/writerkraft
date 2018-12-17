<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
include ROOT.'/engine/controllers/login_ctrl.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div>
		<form method="POST">
			<p> Username : <input type="text" name="username" value="<?php postConst('username') ?>"> </p>
			<p> Password : <input type="password" name="password"> </p>	
			<p><button name="login">Sign In</button></p>		
		</form>
	</div>

</body>
</html>