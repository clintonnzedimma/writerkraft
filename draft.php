<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
include ROOT.'/engine/controllers/draft_ctrl.php';
?>

<h5>Draft</h5>
<br>

<?php if (isset($_GET['id']) && Kraft_Draft_Factory::existsById($_GET['id'])): ?>
<?php if ($draft->creator->get('id') == $u->get('id')): ?>
	
	

<form method="POST" enctype="multipart/form-data">
	<p>Title <input type="text" name="title" value="<?=$draft->get('title')?>"></p>
	<p>Write up <textarea name="writeup"><?=$draft->get('writeup')?></textarea></p>
	<p>
		<img src="cover-art/<?=$draft->get('cover_img')?>" width="200">
		<br>
		
	</p>
	<p><button name="add-kraft" value="to-draft">Save</button></p>
<?php if (!$draft->hasBeenPublished()): ?> <p><button name="add-kraft" value="to-publish">Publish</button> </p><?php endif ?> 
</form>

<?php else : header("Location:my-drafts.php"); exit(); ?>

<?php endif ?>
<?php endif ?>