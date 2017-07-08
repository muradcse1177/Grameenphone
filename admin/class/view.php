<?php
class view_content{
	public function fn_view_content(){
		// session_start();			
		// if(!isset($_SESSION['login_user'])){
			// header("location: index.php");
		// }		
		$post_category=$_GET["category"];
		$conn = new mysqli("localhost", "root", "", "content");
		$sql="select * from contents where category ='$post_category'";
		$result = mysqli_query($conn,$sql);
		return $result;
	}
	public function fn_delete_content(){
		$category_del=$_GET["category"];	
		$category=trim(urldecode($_GET["category"]));	
		$ContentId_del=$_GET["ContentId"];	
		$link_del=$_GET["link"];	
		echo $category;
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "content";

		// connect to database
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$sql_del = "DELETE FROM contents WHERE content_id='$ContentId_del'";
		
		if ($conn->query($sql_del) === TRUE) {		
			unlink("$link_del");
		} 
		else {
			echo "Error deleting record: " . $conn->error;
		}
		$redirect_url = "view_content.php?category_cur=".$category_del;
		header("Location: $redirect_url");  	
	}
	
}

?>