<?php
class edit_content_panel{
	public function fn_edit_content_panel(){
		$uploadstatus=0;
		if(isset($_GET["name"])) {
			$name1=$_GET["name"];
			$ContentId1=$_GET["ContentId"];
			$category1=$_GET["category"];
			$subcategory1=$_GET["subcategory"];	
			$status1=$_GET["status"];
			$link1=$_GET["link"];	
		}
		if(isset($_POST["submit"])) {
			$name1=$_POST["name1"];
			$ContentId1=$_POST["ContentId1"];
			$category1=$_POST["category1"];
			$subcategory1=$_POST["subcategory1"];	
			$status1=$_POST["status1"];
			$link1=$_POST["link1"];		
			
			$name2=$_POST["name"];	
			$category2=$_POST["category"];
			$subcategory2=$_POST["subcategory"];	
			$status2=$_POST["status"];	
			$target_dir = "uploads/".$category2."/".$subcategory2."/";	
			$link2= $target_dir.$ContentId1.substr($link1, -4);
			if (!is_dir($target_dir)) 
			{
				mkdir($target_dir);
			}
			if(file_exists($link1)){
				if(!file_exists($link2))
					rename($link1, $link2);
			}
			$uploadstatus=1;
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "content";
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 	
			
			if($category1==$category2 && $subcategory1==$subcategory2 && $name1==$name2 && $status1==$status2)
				$uploadresult="Nothing has been changed.";
			else if($category1==$category2){									
					$sql_new = "UPDATE contents SET name='$name2', subcategory='$subcategory2', link='$link2', ContentId='$ContentId1', status='$status2' WHERE link='$link1'";			
				if ($conn->query($sql_new) === TRUE) {		
					$uploadresult="Congrats! data updated successfully.";
				} 
				else {
					$uploadresult="Sorry! data not updated.";
				}
				
			}		
			else if($category1!=$category2){		
				//delete previous data
					$sql_del = "DELETE FROM contents WHERE link='$link1'";			
				//insert new data
					$sql_new = "INSERT INTO contents (name, subcategory, link, ContentId, downloaded,status)
							VALUES ('$name2', '$subcategory2', '$link2', '$ContentId1','0','published')";
							
					$sql_new = "INSERT INTO contents (category,subcategory,content_id,name,preview_link,file_link, uploded_by,downloaded,status,remarks)
					VALUES ('$category','$subcategory','$filename','$name','$target_link_preview', '$target_link', 'Murad','0','published','Popular')";								
				if ($conn->query($sql_new) === TRUE) {
					if ($conn->query($sql_del) === TRUE) 
					$uploadresult="Congrats! data updated successfully."; 
				}
				else 
					$uploadresult="Sorry! data not updated.";				
			}
		}
		return $uploadresult;
	}
	
}


?>