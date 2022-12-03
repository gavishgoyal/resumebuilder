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
		echo $sql1;
$result1 = mysqli_query($conn ,$sql1);

?>

	
<!DOCTYPE HTML>
<html>
<head>
<title>FILE UPLOAD USING AJAX</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
h1{
	color: white;
	text-align: center;
}
  
        .Table  
        {  
            display: table;  
        }  
        
        .Heading  
        {  
            display: table-row;  
            font-weight: bold;  
            text-align: center;
			background-color: #ABBAEA;
        }  
        
        .Cell  
        {  
            display: table-cell;  
            border: solid;  
            border-width: thin;  
            padding-left: 5px;  
            padding-right: 5px;  
        }  
 
</style>
</head>
<body style ="background-color: black">


 <section class="vh-100 bg-image" >
<h1>UPDATE YOUR INFORMATION</h1>


<div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5 text-center">



<form action= "main_upload.php" id = "submit_form" type = "POST">
<div class="form-outline mb-4">
<input type ="file" name ="image"/>
<input type ="submit" id ="upload" name = "upload" value = "browse">
</div>
</form>

<p id = "s"></p>
<form action = "upload.php" method = "POST" >


<div class="row">
<div class="col-4">
<label >Firstname : </label>
</div>
<div class="col-8">
<input type="text" id = "fname" name = "fname" value = "<?php echo $row["firstname"]?>" class="form-control form-control-lg"><br>
</div>
</div>


<div class="row">
<div class="col-4"><label>Lastname : </label>
</div>
<div class="col-8">
<input type="text" id = "lname" name = "lname" value = "<?php echo $row["lastname"]?>" class="form-control form-control-lg"><br>
</div>
</div>


<div class="row">
<div class="col-4">
<label>Age : </label>
</div>
<div class="col-8">
<input type="text" id = "age" name = "age" value = "<?php echo $row["age"]?>" class="form-control form-control-lg"><br>
</div>
</div>


<div class="row">
<div class="col-4">
<label>EMail : </label>
</div>
<div class="col-8">
<input type="text" id = "email" name = "email" value = "<?php echo $row["email"]?>" class="form-control form-control-lg"><br>
</div>
</div>

<div class="row">
<div class="col-4">
<label>Mobile no. : </label>
</div>
<div class="col-8">
<input type = "text" id = "number" name = "number" value = "<?php echo $row["number"]?>" class="form-control form-control-lg"><br>
</div>
</div>


<div class="row">
<div class="col-4">
<label>Address : </label>
</div>
<div class="col-8">
<input type = "text" id = "address" name = "address" value = "<?php echo $row["address"]?>" class="form-control form-control-lg"><br>
</div>
</div>

<div class="row">
<div class="col-4">
<label>Education : </label>
</div>
<div class="col-8">
<input type = "text" id = "education" name = "education" value = "<?php echo $row["education"]?>" class="form-control form-control-lg"><br>
</div>
</div>


<div class="row">
<div class="col-4">
<label>Occupation :</label>
</div>
<div class="col-8">
<input type = "text" id ="occupation" name = "occupation" value = "<?php echo $row["occupation"]?>" class="form-control form-control-lg" ><br>
</div>
</div>


<div class="row">
<div class="col-4">
<label>Skills : </label>
</div>
<div class="col-8">
<input type = "text" id = "skills" name = "skills" value = "<?php echo $row["skills"]?>" class="form-control form-control-lg"><br>
</div>
</div>

<div class="row">
<div class="col-4">
<label>Technical : </label>
</div>
<div class="col-8">
<input type = "text" id = "technical" name = "technical" value = "<?php echo $row["technical"]?>" class="form-control form-control-lg"><br>
</div>
</div>

<div class="row">
<div class="col-4">
<label>Degree : </label>
</div>
<div class="col-8">
<input type = "text" id = "degree" name = "degree" value = "<?php echo $row["degree"]?>" class="form-control form-control-lg"><br>
</div>
</div>

<div class="row">
<div class="col-4">
<label>Percentage : </label>
</div>
<div class="col-8">
<input type = "text" id = "percentage" name = "percentage" value = "<?php echo $row["percentage"]?>" class="form-control form-control-lg"><br>
</div>
</div>
<div class="row">
<div class="col-4">
<label>Experience : </label>
</div>

<div class = "Gavish">
<?php 

while($row1 = mysqli_fetch_assoc($result1)){
	?>
	
<div class="Table">  
				<div>
                <div class="Cell Heading col-5">  
                    <p>  
                    Company name </p>  
                </div> 
				<div class="cell col-8">
				<input type = "text" id = "companyname[]" name = "companyname[]"  value = "<?php echo $row1['company']?>" >
				</div>				
				</div>
				
				<div>
                <div class="Cell Heading col-5">  
                    <p>  
                    Designation    </p>  
                </div> 
				<div class="Cell col-8">
				<input type = "text" id = "desigantion[]" name = "desigantion[]"  value = "<?php echo $row1['post']?>" >
				</div>				
				</div>
				
				<div>
                <div class="Cell Heading col-5">  
                    <p>  
                    Joining Time </p>  
                </div> 
				<div class="Cell col-8">
				<input type = "date" id = "jtime[]" name = "jtime[]"  value = "<?php echo $row1['joiningd']?>" >
				</div>				
				</div>
				
				<div>
                <div class="Cell Heading col-5">  
                    <p>  
                    Leaving Time </p>  
                </div> 
				<div class="Cell col-8">
				<input type = "date" id = "ltime[]" name = "ltime[]"  value = "<?php echo $row1['leavingd']?>" >
				</div>				
				</div>
				
				<div>
               
				<div class="Cell">
				<input class = "btn" type = "button" name = "delete" id ="delete" value = "delete">
				</div>				
				</div>
        </div>

<?php
}
?>
</div>

				<div>
				<div class="Cell">
				<input class = "btn" type = "button" name = "add" id ="add" value = "Add More Experience">
				</div>				
				</div>

<div class="form-outline mb-4" style = "text-align : center">
<input type = "submit" class = "btn btn-success">
</div>
</form>

</div>
<div>
        </div>
      </div>
    </div>
  </div>
</section>	


<script>
console.log("entered");
$(document).ready(function(){
	console.log("entered ready function");
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
				$('#s').html(response); 
			}
		});
		
		console.log("AJAX EXIT");
	});
	var html = '<div class="Table"><div><div class="Cell Heading col-5"><p>Company name </p></div><div class="cell col-8"><input type = "text" id = "companyname[]" name = "companyname[]"  ></div></div><div><div class="Cell Heading col-5"><p>Designation</p></div><div class="Cell col-8"><input type = "text" id = "desigantion[]" name = "desigantion[]"  ></div></div><div><div class="Cell Heading col-5"><p>Joining Time </p></div><div class="Cell col-8"><input type = "date" id = "jtime[]" name = "jtime[]" ></div>	</div><div><div class="Cell Heading col-5"><p>Leaving Time </p></div><div class="Cell col-8"><input type = "date" id = "ltime[]" name = "ltime[]" ></div></div><div><div class="Cell"><input class = "btn" type = "button" name = "delete" id ="delete" value = "delete"></div></div></div>';
	$("#add").click(function(e){
		e.preventDefault();
	console.log("in add function");
	$(".Gavish").append(html);
});
$(document).on('click', '#delete', function(e){
	e.preventDefault();
	console.log("deleted");
	$(this).parent().parent().parent().remove();
//	let x = $(this).parent().parent();
//	$x.remove();
});
//$("#delete").click(function(e){
//	e.preventDefault();
//	console.log("deleted");
//	$(this).parent().remove();
//});

//$(".Cell").on('click','#delete',function(){
	//console.log("deleted");
	//$(this).parent().remove();
//});

	
});
</script>

</body>
</html>

