<?php
$servername = "localhost";
$username = "root";
$password ="";
$db_name="adminlogin";
$conn = new mysqli($servername, $username, $password, $db_name);
if($conn->connect_error){
	die("connection error : " . $conn->connect_error);
}
session_start();
$user_name = $_POST['uname'];
$user_fname= $_POST['fname'];
$user_lname= $_POST['lname'];
$user_email= $_POST['email'];
$user_password = $_POST['password'];
$sqlc = "SELECT * from register where username  = '$user_name'";
$resultc = $conn->query($sqlc);
if($row=$resultc->fetch_assoc()){
	
	$_SESSION["c"]="1";
	//header("location: http://localhost/gavipractice/project/register.php?c=1" );
}
else{
	$_SESSION["c"]="0";
$sql = "Insert into register (username, firstname, lastname , email, password) value ('$user_name','$user_fname' , '$user_lname', '$user_email', '$user_password')";
//echo $sql;
$result=$conn->query($sql);
//alert("Registered Successfully \n");
//header("Location: http://localhost/gavipractice/project/index.php");
}
?>