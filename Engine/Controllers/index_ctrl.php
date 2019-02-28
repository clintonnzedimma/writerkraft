<?php 
/**
* @author Clinton Nzedimma
* @controller for index
*/

/***KRAFTS***/

// The number of result per page
$num_result_per_page = 21;

// Page number
$page_num = 1;

//	Creating variable for ads to be displayed
$all_kraft_assoc = Kraft_Factory::allAssoc("DESC",$num_result_per_page, $page_num);

// Pagination links 
$page_links = $all_kraft_assoc["page_links"];

// Number of pages with result depending on thw number of result per page
$num_of_pages = $all_kraft_assoc["num_of_pages"];

// Passing all the data from database to the $krafts variable
$krafts = $all_kraft_assoc["data"];



/***USERS***/
// top users assoc *REDUNDANT FOR NOW*
$top_users_assoc = User_Factory::topUsersAssoc("DESC", 5, 1);

// Passing all data from database to $top_users variable
$top_users =  $top_users_assoc["data"];


// 7 recently joined users.
$recently_joined_users_assoc = User_Factory::recentlyJoinedUsersAssoc("DESC", 7, 1);

// Passing all data from database to $recent_users variable
$recently_joined_users = $recently_joined_users_assoc ["data"]



?>