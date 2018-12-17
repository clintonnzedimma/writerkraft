<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
include ROOT.'/engine/controllers/content_ctrl.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
if (isset($_GET['id']) && Kraft_Factory::existsById($_GET['id'])) :
?>

<h1><?=$kraft->get('title') ?></h1>
<p>
	<img src="cover-art/<?=$kraft->get('cover_img')?>" width="200">
	<br>
	<?=$kraft->get('writeup') ?>
	<br>
	<br>
	Time : <?=$kraft->get('time_of_post') ?>. Date <?=$kraft->get('date_of_post') ?>

	<br>
	Posted By <?=$kraft->creator->get('full_name')?>
</p>

<?php
endif;
?>



</body>
</html>