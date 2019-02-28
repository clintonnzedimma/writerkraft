<?php
/**
 * @author Clinton Nzedimma
 * @package Kraft
 */
class Kraft_Factory Extends Pagination Implements KraftStaticInterface
{
	public static $DB;
	public static $allowed_categories;
	function __construct()
	{
		self::$DB = new DB();

		// specifying categories that a Kraft can be
		self::$allowed_categories = array (
				"italian" => "italian",
				"classical" => "classical",
				"thoughts" => "thoughts",
				"random" => "random",
				"love" => "love",
				"satire" => "satire",
				"quotes" => "quotes",
				"emotions" => "emotions"
		);	
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
			

		$sql = "INSERT INTO krafts (
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
		$sql = "SELECT * FROM krafts WHERE id = '$param_id' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return ($num_rows > 0) ? true : false;
	}

	public static function allAssoc ($order, $num_result_per_page, $page_num) {
		/**
		* @param order=>*ASC or DESC by id*,num_result_per_page => *number of result to return*, page_num => *page number*
		* @method returns all krafts
		*/
		$order = sanitize_note($order);
		self::$get_num_result_per_page = $num_result_per_page ;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;

		$sql = "SELECT * FROM krafts ORDER BY id $order LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM krafts")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}
	}



}
#Static Initializiation
new Kraft_Factory();
?>