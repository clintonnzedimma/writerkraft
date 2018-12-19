<?php
/**
 * @author Clinton Nzedimma
 * @package Kraft Draft Singleton Cass
 */
class Kraft_Draft_Singleton
{	
	public $DB;
	public $id;
	public $creator;
	function __construct($id)
	{	
		 $this->DB = new DB();
		 $this->id = sanitize_note($id);
		 $this->creator = new User_Singleton($this->get('user_id'));
	}

	public function get($par) {
		$par = sanitize_note($par);
		$sql = "SELECT * FROM drafts WHERE id = '$this->id' ";
		$query = $this->DB->query($sql);
		$num_rows = $query->num_rows;

		if ($num_rows>0) {
			while ($row = $query->fetch_assoc()) {
				switch ($par) {
					case $par:
						$value = $row[$par];
						break;

					default:
						$value = null;
						break;
				}
			}
			return $value;
		}
	}

	public function modify() {
		$title = sanitize_note($_REQUEST["title"]);
		$writeup = sanitize_note($_REQUEST["writeup"]);
		$last_modified_date = date("Y-m-d");		
		$last_modified_time = date("H:i");
		
		/*upload image, this block is redudant*/			
/*		$upload = new Upload('image', 'cover_img', 2);
		$upload->pushImageTo("cover-art");
		$cover_img = $upload->data['new_file_name'];*/

		$sql = "UPDATE drafts  SET 
			title = '$title',
			writeup = '$writeup',
			last_modified_date = '$last_modified_date',
			last_modified_time = '$last_modified_time'
			WHERE id = '$this->id'
		";	
		return $this->DB->query($sql);	
	}



	public function publish()
	{
		$title = sanitize_note($_REQUEST["title"]);
		$writeup = sanitize_note($_REQUEST["writeup"]);
		$date_of_post = date("Y-m-d");		
		$time_of_post = date("H:i");
		$user_id = $this->creator->get('id');

		/*upload image, this block is redudant*/			
/*		$upload = new Upload('image', 'cover_img', 2);
		$upload->pushImageTo("cover-art"); */
		$cover_img = $this->get('cover_img');	

		$sql = "INSERT INTO krafts (
			id,
			title,
			writeup,
			date_of_post,
			time_of_post,
			cover_img,
			user_id,
			draft_id
		)
		VALUES (
			NULL,
			'$title',
			'$writeup',
			'$date_of_post',
			'$time_of_post',
			'$cover_img',
			'$user_id',
			'$this->id'
		)
	";
		return $this->DB->query($sql);
	}


	public function hasBeenPublished(){
		$sql ="SELECT * FROM krafts WHERE draft_id ='".$this->get('id')."' ";
		$query = $this->DB->query($sql);
		$num_rows = $query->num_rows;
		return ($num_rows > 0) ? true : false;
	}

}	
?>