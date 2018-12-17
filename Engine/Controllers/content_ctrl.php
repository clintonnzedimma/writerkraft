<?php
User_Factory::protectPage();
if (isset($_GET['id']) && Kraft_Factory::existsById($_GET['id'])) {
	$kraft = new Kraft_Singleton($_GET['id']);
}

?>