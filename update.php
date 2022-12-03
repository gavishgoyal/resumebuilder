<?php 
session_start();
if($_SESSION['uname'] == "" ){
	header("location: http://localhost/gavipractice/project/index.php");
	die;
}
$servername ='localhost';
$username ='root';
$password='';
$db_name='adminlogin';
$conn = mysqli_connect($servername, $username, $password, $db_name);
if(!$conn){
	die("Could not connect mysql server");
}
//echo $_SESSION["uname"];


$sql1 = "delete FROM experience WHERE username='".$_SESSION['uname']."' and company = '". $_POST[];
		echo $sql1;
$result1 = mysqli_query($conn ,$sql1);

?>
