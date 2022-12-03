<?php
session_start();
$uname = $_SESSION["uname"];
echo $uname;
//if(isset($_FILES['image'])){
	echo "inside if";
	print_r($_FILES);
	$errors=array();
	$file_name= $_FILES['image']['name'];
	$file_size=$_FILES['image']['size'];
	$file_tmp=$_FILES['image']['tmp_name'];
	$file_type=$_FILES['image']['type'];
	$file_store ="uploadtry/".$file_name;
	@$fle_ext=end(explode('.',$file_name));
	$file_ext = strtolower($fle_ext);

	$extensions= array("jpeg","jpg","png");
	
	if(in_array($file_ext,$extensions) === FALSE ){
		echo "file not allowed , pls choose a jpeg or png file ";
	exit;
	}
	if($file_size > 2097152){
		echo "File must be of 2mb ";
		exit;
	}
		move_uploaded_file($file_tmp,$file_store);
		echo "success";
$servername ='localhost';
$username ='root';
$password='';
$db_name='adminlogin';
$conn = mysqli_connect($servername, $username, $password, $db_name);
if(!$conn){
	die('Could not connect mysql server');
}

		$sql = "UPDATE register SET `image` = '".$file_store."' WHERE username = '".$uname."';";
		//echo $sql;
$result = $conn->query($sql);

//}

?>