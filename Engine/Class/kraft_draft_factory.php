<?php
/**
 * @author Clinton Nzedimma
 * @package Kraft Draft
 */
class Kraft_Draft_Factory Implements KraftStaticInterface
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
		$date_of_post = date("Y-m-d");		
		$time_of_post = date("H:i");

		/*upload image*/			
		$upload = new Upload('image', 'cover_img', 2);
		$upload->pushImageTo("cover-art");
		$cover_img = $upload->data['new_file_name'];	

		$sql = "INSERT INTO drafts (
			id,
			title,
			writeup,
			date_of_post,
			time_of_post,
			cover_img,
			user_id
		)
		VALUES (
			NULL,
			'$title',
			'$writeup',
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