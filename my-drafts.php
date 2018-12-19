<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
include ROOT.'/engine/controllers/my-drafts_ctrl.php';

?>

<h4>My Drafts</h4>

<?php if ($drafts): ?>
	<?php foreach ($drafts as $draft): ?>
		<p>
			<a href="draft.php?id=<?=$draft['id'] ?>"> <?=$draft['title']?></a>
		</p>
	<?php endforeach ?>
	<?php else : ?>
		<h5>You have no drafts !</h5>
<?php endif ?>