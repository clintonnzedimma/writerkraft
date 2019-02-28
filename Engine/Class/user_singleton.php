<?php
/**
 * @author Clinton Nzedimma
 * @package Users 
 */
class User_Singleton
{	
	public $DB;
	public $id;
	function __construct($id)
	{	
		 $this->DB = new DB();
		 $this->id = sanitize_note($id);
	}

	public function get($par) {
		$par = sanitize_note($par);
		$sql = "SELECT * FROM users WHERE id = '$this->id' ";
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

		public function modifyProfile($init_array) {
			$_PASTE = $init_array;

			$full_name = sanitize_note($_PASTE['full_name']);
			$bio = sanitize_note($_PASTE['bio']);
			$occupation = sanitize_note($_PASTE['occupation']);
			$location = sanitize_note($_PASTE['location']);
			$fav_book = sanitize_note($_PASTE['fav_book']);
			$fav_word = sanitize_note($_PASTE['fav_word']);
			$fav_vice = sanitize_note($_PASTE['fav_vice']);
			$fav_colour = sanitize_note($_PASTE['fav_colour']);
			$fav_person = sanitize_note($_PASTE['fav_person']);
			$qualifications = sanitize_note($_PASTE['qualifications']);

			$sql = "UPDATE users SET
				full_name = '$full_name',
				bio = '$bio',
				occupation = '$occupation',
				location = '$location',
				fav_word = '$fav_word',
				fav_book = '$fav_book',
				fav_vice = '$fav_vice',
				fav_colour = '$fav_colour',
				fav_person = '$fav_person',
				qualifications = '$qualifications'
				WHERE id = '$this->id' 
			";
			return $this->DB->query($sql);
		}

		public function changePassword($param_password){
			$param_password = sanitize_note($param_password);
			$new_password= sanitize_note(password_hash($param_password, PASSWORD_DEFAULT));
			$sql = "UPDATE users SET  password = '$new_password' WHERE id = '$this->id' ";
			return $this->DB->query($sql);	
		}


		public function changeDpData ($par) {
			try {
				/* delete old profile picture*/
				unlink("img/dp/".$this->get('profile_pic')); 
			} catch (Exception $e) { }
			
			$par = sanitize_note($par);
			$sql = "UPDATE users SET profile_pic = '$par' WHERE id = '$this->id' ";
			return $this->DB->query($sql);
		}	

		public function hasDP() {
			return ($this->get('profile_pic') != null && $this->get("profile_pic") != "") ? true : false;
		}
}


?>