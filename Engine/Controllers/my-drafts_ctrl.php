<?php
User_Factory::protectPage();
$all_draft_assoc = Kraft_Draft_Factory::allByUserId($u->get('id'));
$drafts = $all_draft_assoc['data']; 
?>