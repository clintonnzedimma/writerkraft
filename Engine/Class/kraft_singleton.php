<?php
/**
 * @author Clinton Nzedimma
 * @package Kraft 
 */
class Kraft_Singleton
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
		$sql = "SELECT * FROM krafts WHERE id = '$this->id' ";
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


	public function addComment ($param_comment, $param_user_id) {
		$param_comment = sanitize_note($param_comment);
		$param_user_id =  sanitize_note($param_user_id);
		$date_of_comment = date("Y-m-d");		
		$time_of_comment = date("H:i");	
		$kraft_id = $this->get('id');		
		$sql = "INSERT INTO comments(
			id,
			comment,
			kraft_id,
			user_id,
			date_of_comment,
			time_of_comment
		)
		VALUES (
			NULL,
			'$param_comment',
			'$kraft_id',
			'$param_user_id',
			'$date_of_comment',
			'$time_of_comment'
		)
		";
		return $this->DB->query($sql);
	}

	public function allComments($order) {
		$order = sanitize_note($order);
		$sql = "SELECT * FROM comments WHERE kraft_id = '$this->id' ORDER BY id $order";
		$query = $this->DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();

		if($num_rows > 0) {
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
?>