<?php
include $_SERVER['DOCUMENT_ROOT'].'/zipment/engine/env/ftf.php';
$packageFactory = new Package();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TRACKING DETAILS</title>
</head>
<body>


<?php 
if (isset($_GET['pin']) && !$packageFactory->existsByPin($_GET['pin']) || !isset($_GET['pin'])) {
	header("Location:index.php");
	exit();
} else if (isset($_GET['pin']) && $packageFactory->existsByPin($_GET['pin'])) :
	$get_pin =  sanitize_note($_GET['pin']);
	$get_id = $packageFactory->getIdByPin($get_pin);
	$the_package = new Package_Singleton($get_id);
	$count = 1;
	$track_count = 1;
?>



<style type="text/css">
	.track-bar {
		
	}

	.track-bar span {
		border: orange 2px solid;
		border-radius: 100%;
		padding: 10px;
		position: relative;
		margin-right: 100px;
		margin-left: 100px;
	}

	.track-bar span:after {
		border: 5px solid #0fab05;
		content: "";
		right: 0;
		position: absolute;
		z-index: -1;
		width: 180px;
		left: -16px;
		margin-left: 50px;
	}

	.track-bar span:nth-child(<?= $the_package->get('num_of_points') ?>):after{
		border: 0px solid #0fab05;
		content: "";
		right: 0;
		position:;
		z-index: -1;
		width: 0px;
		left: 0px;
		margin-left: 50px;
	}

</style>

<table cellspacing="20">
	<tr style="background: #282828; color: #b6b6b6">
		<td>SN</td>
		<td>Date</td>
		<td>Activity</td>
		<td>Location</td>
	</tr>
<?php 
if($the_package->trackProgressAssoc()) :
	foreach ($the_package->trackProgressAssoc() as $drop_point):
 ?>
	<tr>
		<td><?=$count ++;?></td>
		<td><?= $drop_point['drop_date'] ?></td>
		<td><?= $drop_point['activity'] ?></td>
		<td><?= $drop_point['location_name'] ?></td>
	</tr>
<?php endforeach ?>
<?php endif; ?>
</table>


<div class="track-bar">
<?php
if($the_package->trackProgressAssoc()) :
	foreach ($the_package->trackProgressAssoc() as $drop_point):
?>		
	<span><?= $track_count++ ?></span>

<?php endforeach ?>
<?php endif; ?>

</div>
<?php 
if($the_package->isDelivered())  {
	echo "PACKAGE IS DELIVERED";
}

?>

<?php endif ?>
</body>
</html>