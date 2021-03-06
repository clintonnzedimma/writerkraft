<?php
/**
 * @author Clinton Nzedimma
 * @package Users
 */
class User_Factory Extends Pagination
{
	public static $DB;
	function __construct()
	{
		self::$DB = new DB();
	}

	public static function signUp() {
		$username = sanitize_note($_REQUEST['username']);
		$full_name = sanitize_note($_REQUEST['full_name']);
		$password = sanitize_note(password_hash($_REQUEST['password'], PASSWORD_DEFAULT));
		$email = sanitize_note($_REQUEST['email']);
		$date_of_reg = date("Y-m-d");		
		$time_of_reg = date("H:i");		
		
		$sql = 	"INSERT INTO users 
		(
			id,
			username,
			full_name,
			password,
			email,
			date_of_reg,
			time_of_reg				
		) 
		VALUES (
			NULL,
			'$username',
			'$full_name',
			'$password',
			'$email',
			'$date_of_reg',
			'$time_of_reg'						
		)";

		return self::$DB->query($sql);
	}

	public static function usernameExists($param_username) {
		$param_username = sanitize_note($param_username);
		$sql = "SELECT * FROM users WHERE username = '$param_username' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return($num_rows > 0) ? true : false;
	}

	public static function emailExists($param_email) {
		$param_email= sanitize_note($param_email);
		$sql = "SELECT * FROM users WHERE email = '$param_email' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return($num_rows > 0) ? true : false;
	}

	public static function getByUsername($par, $param_username){
		$par = sanitize_note($par);
		$param_username = sanitize_note($param_username); 
		$sql = "SELECT * FROM users WHERE username = '$param_username' ";
		$query = self::$DB->query($sql);
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

	public static function getById($par, $param_id){
		$par = sanitize_note($par);
		$param_id = sanitize_note($param_id); 
		$sql = "SELECT * FROM users WHERE id = '$param_id' ";
		$query = self::$DB->query($sql);
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


	public static function passwordCheckByUsername($param_username, $param_password) {
			$param_username = sanitize_note($param_username);
			$param_password = sanitize_note($param_password);
			$sql = "SELECT * FROM users WHERE username = '$param_username' ";
			$query = self::$DB->query($sql);
			$num_rows = $query->num_rows;

			$count_check = null;
			if($num_rows > 0) {
				while ($row = $query->fetch_assoc()){
					if (password_verify($param_password, $row['password'])) {
						$count_check ++;
					}
				}
				return ($count_check>0) ? true :false;
			}
		}	

		public static function authenticate ($param) {
			$param = sanitize_note($param);
			$_SESSION['writerkraft_username'] = $param;
		}	

		public static function logOut() {
			session_unset($_SESSION['writerkraft_username']);
		}

		public static function protectPage() {
			if (!isset($_SESSION['writerkraft_username'])) {
				header("Location:login.php");
				exit();
			}
		}		

		public static function isLoggedIn() {
			return (isset($_SESSION['writerkraft_username'])) ? true : false;
		}	

	public static function topUsersAssoc ($order, $num_result_per_page, $page_num) {
		/** 
		* %%% SUBJECT TO REVIEW BECAUSE OF NO TOP USERS RANKING ALGORITHM %%%
		* @param order=>*ASC or DESC by id*,num_result_per_page => *number of result to return*, page_num => *page number*
		* @method returns all top users
		*/
		$order = sanitize_note($order);
		self::$get_num_result_per_page = $num_result_per_page ;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;

		$sql = "SELECT * FROM users ORDER BY id $order LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM users")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}
	}



public static function recentlyJoinedUsersAssoc ($order, $num_result_per_page, $page_num) {
		/**
		* @param order=>*ASC or DESC by id*,num_result_per_page => *number of result to return*, page_num => *page number*
		* @method returns all top users
		*/
		$order = sanitize_note($order);
		self::$get_num_result_per_page = $num_result_per_page ;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;

		$sql = "SELECT * FROM users ORDER BY id $order LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM users")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}
	}

}

#Static Init
new User_Factory();
?>