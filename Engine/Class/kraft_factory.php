<?php
/**
 * @author Clinton Nzedimma
 * @package Kraft
 */
class Kraft_Factory
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

		$sql = "INSERT INTO krafts (
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
		$sql = "SELECT * FROM krafts WHERE id = '$param_id' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return($num_rows > 0) ? true : false;
	}

}
#Static Initializiation
new Kraft_Factory();
?>