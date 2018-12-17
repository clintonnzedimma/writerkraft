<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
User_Factory::protectPage();

?>

<h3>Welcome <?=$u->get('full_name')?></h3>

<br>
<a href="add-kraft.php">Create Kraft</a>
<br>
<a href="logout.php">Log out</a>