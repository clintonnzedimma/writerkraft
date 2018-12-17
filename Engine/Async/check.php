<?php
// ajax response for check.php
include $_SERVER['DOCUMENT_ROOT'].'/zipment/engine/env/ftf.php';
$packageFactory = new Package();

if (isset($_REQUEST['pin']) && $packageFactory->existsByPin($_REQUEST['pin'])) {
	$ajax_response = true;
} else {
	$ajax_response = false;
}
echo $ajax_response;

?>