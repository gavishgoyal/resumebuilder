<?php

$servername ="localhost";
$username ="root";
$password ="";
$db_name="adminlogin";

$conn = new mysqli($servername , $username, $password, $db_name);

if($conn->connect_error){
	die("connection error : ". $conn->connect_error);
}

$user_name= $_POST["username"];
$user_pass = $_POST["password"];
if($user_name == ""){
	$response = "PLEASE FILL USERNAME";
	echo $response;
}
elseif($user_pass == ""){
	$response = "PLEASE FILL password";
	echo $response;
}
else{
//echo $user_name. "<br>" . $user_pass;
$sql = "SELECT * FROM register where username = '$user_name'  ";
//echo $sql;
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$x = $row["password"];
if(password_verify($user_pass,$x)){

	session_start();
	$_SESSION["uname"]="$user_name";
	$_SESSION["fname"]= $row["firstname"];
	$_SESSION["lname"]= $row["lastname"];
	$_SESSION["email"]= $row["email"];
//	$_SESSION["password"]= $row["password"];
	//header("location : http://localhost/gavipractice/project/register.php");
	$response="";
}
else{
	$response = "INVALID CREDITALS";
	echo $response;
}
}
?>