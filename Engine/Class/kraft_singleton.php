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
		 $this->creator = new User_Singleton($this->get('id'));
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

}	

?>