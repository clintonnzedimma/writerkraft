<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
/**
* @author Clinton Nzedimma
* This script is for user profile request via AJAX
*/

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit-profile' ) {	
	if (isset($_REQUEST['data'])) {
		$_DATA = $_REQUEST['data'];
		echo $u->modifyProfile($_DATA);
	}
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'change-dp') {
	if (isset($_REQUEST['data'])) {
		$_DATA = $_REQUEST['data'];
		$_FILES['dp']['tmp_name'] = $_DATA;
	/*	var_dump($_FILES['dp']);*/
		$upload = new Upload("image", "dp", 2);
		if ($upload->pushImageTo($_SERVER['DOCUMENT_ROOT'].'/img/dp')) {
			 echo true;
		}
	}
}

?>