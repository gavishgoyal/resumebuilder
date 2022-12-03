<?php
$servername ='localhost';
$username ='root';
$password='';
$db_name='adminlogin';
$conn = mysqli_connect($servername, $username, $password, $db_name);
if(!$conn){
	die('Could not connect mysql server');
}
session_start();
$uname = $_SESSION['uname'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$email = $_POST['email'];
$number = $_POST['number'];
$address = $_POST['address'];
$education = $_POST['education'];
$degree = $_POST['degree'];
$percentage = $_POST['percentage'];
$occupation = $_POST['occupation'];
$skills = $_POST['skills'];
$technical = $_POST['technical'];
		//$sql1 = "insert into register (firstname, lastname, age, gender, email ) VALUES ('$fname', '$lname', '$age', '$gender', '$email')";
		$sql = "UPDATE register SET `firstname` = '".$fname."' ,`lastname` = '".$lname."' ,`age` = '".$age."' ,`email` = '".$email."' ,`number` = '".$number."' ,`address` = '".$address."' ,`education` = '".$education."' ,`occupation` = '".$occupation."',`skills` = '".$skills."' ,`technical` = '".$technical."' ,`degree` = '".$degree."',`percentage` = '".$percentage."'WHERE username = '".$uname."';";
		echo $sql."<br>";
		
		if($result = $conn->query($sql)){
			//header("location : http://localhost/gavipractice/project/main.php");
		}
		$sql1 = "DELETE FROM `experience` WHERE username = '".$uname."'";
		echo $sql1."<br>";
	$result1 = $conn->query($sql1);
$cname = $_POST['companyname'];
$designation =  $_POST['desigantion'];
$ltime = $_POST['ltime'];
$jtime = $_POST['jtime'];


foreach($cname as $key => $value){


	$sql2	= "INSERT INTO experience (username, company, post, joiningd, leavingd) VALUES ('".$uname."', '".$value."', '".$designation[$key]."' , '".$jtime[$key]."' , '".$ltime[$key]."') ";
	echo $sql2."<br>";
	
	if($result1 = $conn->query($sql2)){
			//header("location : http://localhost/gavipractice/project/main.php");
		}
		
	
}	
header("Location: https://gavishgoyal.github.io/resumebuilder/welcome.php");
?>