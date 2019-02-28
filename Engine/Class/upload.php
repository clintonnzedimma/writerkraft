<?php 
/**
 * @author Clinton Nzedimma
 * @package Upload
 */
class Upload
{
	public $file;	
	public $file_name;
	public $file_ext;	
	public $file_type;
	public $file_tmp;
	public $form_name;
	public $allowed_ext;
	public $size_limit; // in megaBytes
	public $DB;
	public $data = array();
	public $prefix; // custom prefix for upload name
	
	function __construct($type, $name, $size_limit)
	{
		$this->file_type =$type;
		$this->form_name = $name;
		$this->size_limit = $size_limit;
		$this->prefix = "external_"; // set prefix to add to new file name
		
		if(isset($_FILES[$this->form_name])) {
			$this->file = $_FILES[$this->form_name];
			$this->file_name = $this->file['name'];
			$this->file_tmp = $this->file['tmp_name'];
			$filter_file_ext = explode('.', $this->file_name);  // filtering file extension
			$this->file_ext = strtolower(end($filter_file_ext));
			if($this->file_type == 'image') {
				$this->allowed_ext = array('jpg', 'png', 'gif', 'jpeg');
			} 			
		}	
	}


	public function compress_img($source, $destination, $quality)
	{
		$info=getimagesize($source);

		if ($info['mime']=='image/jpeg') {
				$image=imagecreatefromjpeg($source);
			} elseif ($info['mime']=='image/gif'){
				$image=imagecreatefromgif($source);
			}elseif ($info['mime']=='image/png'){
				$image=imagecreatefrompng($source);
			}
			imagejpeg($image, $destination, $quality);
			return $destination;
	}

	public function isImage() {
		return (in_array($this->file_ext, $this->allowed_ext) ) ? true : false;
	}

	public function sizeIsLarge() {
			$byte_constant = 1048567;	// size in Byte	
			$size_in_MB = $this->size_limit;			// size in Megabyte
			$allowed_file_size = $size_in_MB * $byte_constant; // allowed file size
			return ($this->file["size"] > $allowed_file_size) ? true : false;
	} 

	public function hasError() {
		return($this->file["error"] == 0) ? false : true ;
	}	

	public function isEmpty() {
		return (strlen($this->file_tmp) == 0) ? true : false; // subject to review
	}

	public function pushImageTo($directory) {
		if($this->isImage() && !$this->hasError() && !$this->sizeIsLarge()) {
			$new_file_name = $this->prefix.uniqid('', true).'.'.$this->file_ext;
			$destination = $directory."/".$new_file_name;
			copy($this->file_tmp, $destination);
			if(move_uploaded_file($this->file_tmp, $destination)) {
				$size_range=filesize($destination)/1048567; // converting bytes to MB

				/*compression algorithm*/
				if ($size_range>=2)	{
						$this->compress_img($destination, $destination, 13); 
					} else if ($size_range <2 && $size_range>=1.5) {
						$this->compress_img($destination, $destination, 17); 
					} else if ($size_range<1.5 && $size_range>=1){
						$this->compress_img($destination, $destination, 20); 
					} else if ($size_range<1 && $size_range>=0.5){
						$this->compress_img($destination, $destination, 25); 
					} else if ($size_range<0.5 && $size_range>=0.15){
						$this->compress_img($destination, $destination, 30); 
					}

					/*Pushing data to array*/	
					$this->data =  array(
						"new_file_name" => $new_file_name
					);
																							
			}
		}
	}

}
?>