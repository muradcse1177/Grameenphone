<?php
class upload{
	
	public function upload_content(){
		$conn = new mysqli("localhost", "root", "", "gp");
		//include('session.php');
		// file upload
		$uploadstatus=0;
		function getRandomHex($num_bytes=4) {
		  return bin2hex(openssl_random_pseudo_bytes($num_bytes));
		}

		if(isset($_POST["submit"])) {
			$name=$_POST["name"];
			$category=$_POST["category"];
			$subcategory=$_POST["subcategory"];
			//$portal_name=$_POST["portal"];
			//$remarks=$_POST["portal"];
			$target_dir = "uploads/".$category."/".$subcategory."/";	
			$target_dir_preview = "../demo/".$category."/".$subcategory."/";
			if (!is_dir($target_dir)) 
			{
				mkdir($target_dir);
			}
			if (!is_dir($target_dir_preview)) 
			{
				mkdir($target_dir_preview);
			}
			
			//For original file
			$temp = explode(".", $_FILES["file"]["name"]);
			$filename = getRandomHex(15); // get a hexadecimal number for filename	
			$fullfilename = $filename . '.' . end($temp);
			if(move_uploaded_file($_FILES["file"]["tmp_name"],  $target_dir. $fullfilename))
				$uploadstatus=1;
			
			//For preview file
			$temp_preview = explode(".", $_FILES["file_preview"]["name"]);
			//$filename = getRandomHex(15); // get a hexadecimal number for filename	
			$fullfilename_preview = $filename . '.' . end($temp_preview);
			if(move_uploaded_file($_FILES["file_preview"]["tmp_name"],  $target_dir_preview. $fullfilename_preview))
				$uploadstatus=1;
			
			
			// connect to db
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "content";

			// connect to database
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 	
			
			// add upload data to database
			$target_link="/admin/uploads/".$category."/".$subcategory."/".$fullfilename;
			$target_link_preview="/demo/".$category."/".$subcategory."/".$fullfilename_preview;
			$sql="";
			$sql = "INSERT INTO contents (category,subcategory,content_id,name,preview_link,file_link, uploded_by,downloaded,status,remarks)
					VALUES ('$category','$subcategory','$filename','$name','$target_link_preview', '$target_link', 'Murad','0','published','Popular')";				
			if ($conn->query($sql) === TRUE) {
				$uploadresult="Congrats! Content uploaded successfully.";
			}
			else {
				$uploadresult="Sorry! Content not uploaded.";
			}

		}	
		return array($uploadstatus,$uploadresult);
	}	
}	
?>