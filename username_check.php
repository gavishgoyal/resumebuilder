<?php
$servername = "localhost";
$username1 ="root";
$password="";
$db_name = "adminlogin";
$conn = new mysqli ($servername, $username1, $password, $db_name);
if($conn->connect_error){
	die("connection error: $conn=connect->error ");
}

   //$user_name = mysqli_real_escape_string($conn,$_POST['username']);
	$user_name = $_POST['username'];
	if($user_name==""){
		$response = "PLEASE FILL THE USERNAME";
		echo $response;
		die;
	}
	$first_name = $_POST['firstname'];
	if($first_name==""){
		$response = "PLEASE FILL THE FIRST NAME";
		echo $response;
		die;
	}
	$last_name = $_POST['lastname'];
	if($last_name==""){
		$response = "PLEASE FILL THE LAST NAME";
		echo $response;
		die;
	}
	$email = $_POST['email'];
	if($email==""){
		$response = "PLEASE FILL THE EMAIL";
		echo $response;
		die;
	}
	$password = $_POST['password'];
	if($password==""){
		$response = "PLEASE FILL THE PASSWORD";
		echo $response;
		die;
	}
	$sql = "SELECT * FROM register where username = '$user_name' ";
	//echo $sql;
	$result=$conn->query($sql);
	if($result->num_rows > 0 ){
		$response = "username not available";
	}
	else{
		$password = password_hash($password	, PASSWORD_DEFAULT);
		$sql1 = "insert into register (username, firstname, lastname, email , password) VALUES ('$user_name', '$first_name', '$last_name', '$email', '$password')";
		//echo $sql1;
		if($result1 = $conn->query($sql1)){
		$response = "INSERTED SUCCESFULLY";	
		}
		else{
			$response ="NOT INSERTED";
		}
		
		
	}

	echo $response;
	die;

?>