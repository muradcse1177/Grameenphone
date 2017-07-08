<?php
class login{

	function login_validation(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "gp";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}	
		$msg = "";
		session_start();
		if(isset($_SESSION['login_user'])){
			header("location: upload_content.php");
		}

		if(isset($_POST['username']) and  isset($_POST['password'])) {
			$myusername = $_POST['username'];	
			$mypassword = $_POST['password'];			
			$sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
			$result = mysqli_query($conn,$sql);	    
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
			$count = mysqli_num_rows($result);
			$_SESSION['username'] = $row['name'];
			if($count > 0) {  
				  header("location: upload_content.php");	
			}
			else{
				$msg = "Username and Password is not Correct!!!";
			}
		}		
	}

}
?>