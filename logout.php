<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
User_Factory::logout();
header("Location:index.php?log_out");
exit();

?>
