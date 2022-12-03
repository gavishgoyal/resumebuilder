<?php 
session_start();
if($_SESSION['uname'] == "" ){
	header("location: https://gavishgoyal.github.io/resumebuilder/index.php");
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
$sql = "SELECT * FROM register WHERE username='".$_SESSION['uname']."' ";
		//echo $sql;
$result = $conn->query($sql);
$row=$result->fetch_assoc();

$sql1 = "SELECT * FROM experience WHERE username='".$_SESSION['uname']."' ORDER BY id ASC";
		//echo $sql1;
$result1 = mysqli_query($conn ,$sql1);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>FILE UPLOAD USING AJAX</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<section style="background-color: #eee;">

  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="http://localhost/gavipractice/project/index.php">Login</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
		  
        </nav>
		<a class="btn btn-outline-primary mr-1" href="http://localhost/gavipractice/project/index.php" role="button" style = "float: right">logout  </a>
<a class="btn btn-outline-primary mr-1" href="http://localhost/gavipractice/project/main.php" role="button" style = "float: right">Update Data</a>
<a class="btn btn-outline-primary mr-1" href="http://localhost/gavipractice/project/resume.php" role="button" style = "float: right">Preview Resume</a>
<br><br>

      </div>
    </div>



    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
		  <div id = "here">
            <img src="<?php echo $row["image"] ?>" alt="unavailable" class="rounded-circle img-fluid" style="width: 150px;">
			  </div>
			  <form action= "main_upload.php" id = "submit_form" type = "POST">
			  
<input type ="file" name ="image" id = "image"  >
<input type = "submit" id = "hide">
</form>
            <h5 class="my-3"><?php echo $row["firstname"]?></h5>
            <p class="text-muted mb-1"><?php echo $row["occupation"]?></p>
            <p class="text-muted mb-4"><?php echo $row["address"]?></p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
			<?php 
		$g = $row["skills"];
		$skill_arr = explode(",",$g);
		$length = count($skill_arr);
		for($x=0;$x<$length;$x++){
		?>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><?php echo $skill_arr[$x] ?></p>
              </li>
		<?php  } ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">First Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["firstname"]?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Last Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["lastname"]?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["email"]?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["number"]?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["address"]?></p>
              </div>
            </div>
			<hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Education</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row["education"]?></p>
              </div>
            </div>
          </div>
        </div>
		<?php 
		$a = $row["technical"];
		$arr = explode(",",$a);
		?>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4" style="font-size: 3rem" > Languages
                </p>
				<?php 
				$l = count($arr);
				for($x=0;$x<$l;$x++){
				?>
				<hr>
                <p class="mb-1" style="font-size: .77rem;"><?php echo $arr[$x]?></p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
				<?php } ?>
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4" style="font-size: 3rem "> Experience
                </p>
				<?php 

while($row1 = mysqli_fetch_assoc($result1)){
	?>
	<hr>
                <p class="mb-1" style="font-size: 2rem;"><?php echo $row1['company'] ?></p>
                <p class="mb-1" style="font-size: 1rem;"><?php echo "position :".$row1['post'] ?></p>
				<p class="mb-1" style="font-size: .77rem;"><?php echo "time period : ".$row1['joiningd']." to " .$row1['leavingd']?></p>
				<?php
}
?>
				
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>

console.log("entered");
$(document).ready(function(){
	console.log("entered ready function");
	//$("#image").change(function(){
		//console.log("entered upload function");
		//$("#hide").trigger("click");
		
	$("#submit_form").on('submit',function(e){
		
		console.log("entered submit function");
		e.preventDefault();
		//var formData = new FormData(this);
		console.log("going to enter Ajax");
		$.ajax({
			url: "main_upload.php",
			type: "POST",
			data: new FormData(this), 
			contentType : false,
			cache: false,
			processData: false,
			
					success: function(response){
						console.log("successfully finished");
				//$('#s').html(response); 
				$("#here").load(" #here > *");
			}
		});
		
		console.log("AJAX EXIT");
//	});
	});
});
</script>
</body>
</html>

