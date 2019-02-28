<?php
/**
 * @author Clinton Nzedimma
 * @package Kraft Draft
 */
class Kraft_Draft_Factory Extends Pagination Implements KraftStaticInterface
{
	public static $DB;
	function __construct()
	{
		self::$DB = new DB();	
	}

	public static function addNew($user_id)
	{
		$title = sanitize_note($_REQUEST["title"]);
		$writeup = sanitize_note($_REQUEST["writeup"]);
		$category = sanitize_note($_REQUEST['category']);
		$editor_note = sanitize_note($_POST['editor_note']);
		$date_of_post = date("Y-m-d");		
		$time_of_post = date("H:i");

		/*upload image*/			
		$upload = new Upload('image', 'cover_img', 2);

		// Upload cover art when upload is not empty 
		if (!$upload->isEmpty()) {
			$upload->pushImageTo("img/cover-art"); // uploading image to directory
			$cover_img = $upload->data['new_file_name'];
		} else {
			$cover_img = null;
		}	

		$sql = "INSERT INTO drafts (
			id,
			title,
			writeup,
			category,
			editor_note,
			date_of_post,
			time_of_post,
			cover_img,
			user_id
		)
		VALUES (
			NULL,
			'$title',
			'$writeup',
			'$category',
			'$editor_note',
			'$date_of_post',
			'$time_of_post',
			'$cover_img',
			'$user_id'
		)
	";
		return self::$DB->query($sql);
	}


	public static function existsById($param_id){
		$param_id = sanitize_note($param_id);
		$sql = "SELECT * FROM drafts WHERE id = '$param_id' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return ($num_rows > 0) ? true : false;
	}

	public static function allByUserId($param_user_id){
		$param_user_id = sanitize_note($param_user_id);
		$sql = "SELECT * FROM drafts WHERE user_id = '$param_user_id' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();

		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row;
			}

			$retval = array(
				"data" => $data
			);
			return $retval;	
		}

	}

}
#Static Initializiation
new  Kraft_Draft_Factory();
?>