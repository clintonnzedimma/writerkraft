<?php

/**
 * First Things First (FTF).
 * This module contain all included classes and initialization
 *
 */
ob_start();
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/writerkraft/');

/**
 	* Environment can be imported by including this below
 	* => $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php'
*/

include ROOT.'/engine/env/db.php';

include ROOT.'/engine/procedures/init.php';
include ROOT.'/engine/procedures/errors.php';

include ROOT.'/engine/class/upload.php';
include ROOT.'/engine/class/abstract.pagination.php';
include ROOT.'/engine/class/user_factory.php';
include ROOT.'/engine/class/user_singleton.php';
include ROOT.'/engine/class/kraft.static.interface.php';
include ROOT.'/engine/class/kraft_factory.php';
include ROOT.'/engine/class/kraft_draft_factory.php';
include ROOT.'/engine/class/kraft_draft_singleton.php';


if (User_Factory::isLoggedIn()) {
	$u = new User_Singleton (User_Factory::getByUsername('id', $_SESSION['writerkraft_username']));
}
?>