<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
include ROOT.'/engine/controllers/add-kraft_ctrl.php';


?>

<h5>Create Kraft</h5>
<br>
<form method="POST" enctype="multipart/form-data">
	<p>Title <input type="text" name="title"></p>
	<p>Write up <textarea name="writeup"></textarea></p>
	<p>Cover Image <input accept="image/*" type="file" name="cover_img"></p>
	<p><button name="add-kraft" value="to-publish">Create</button></p>
	<p><button name="add-kraft" value="to-draft">Save to Draft</button></p>
</form>

