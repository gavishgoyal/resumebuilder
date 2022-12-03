
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
<title>REGISTER</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
#f{
	margin-top:200px;
	background-color: white;
}
</style>
</head>


<body class="d-flex flex-column min-vh-100" style = "background-color: black">



<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style = "background: white" >
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/g2.svg" alt="..." /></a>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="http://localhost/gavipractice/project/index.html#services" style = "color : black">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/gavipractice/project/index.html#portfolio" style = "color : black">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/gavipractice/project/index.html#about" style = "color : black">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/gavipractice/project/index.html#team" style = "color : black">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/gavipractice/project/index.html#contact" style = "color : black">Contact</a></li>
						<li class="nav-item"><a class="nav-link" href="http://localhost/gavipractice/project/index.php" style = "color : black">Login</a></li>
						<li class="nav-item"><a class="nav-link" href="http://localhost/gavipractice/project/register.php" style = "color : black">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>




<section class="vh-100 bg-image">

<div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5 text-center">
<h2 class="text-center mb-5" >CREATE AN ACCOUNT</h2>

<form id ="register">
<div class="form-outline mb-4">
<input type = "text"  id = "uname" name = "uname" placeholder = "username" class="form-control form-control-lg ">
</div>
<div class="form-outline mb-4">
<input type = "text"  id ="fname" name = "fname" placeholder = "firstname" class="form-control form-control-lg">
</div>
<div class="form-outline mb-4">
<input type = "text" name = "lname" id = "lname" placeholder = "Lastname" class="form-control form-control-lg">
</div>
<div class="form-outline mb-4">

<input type = "text" name = "email" id = "email" placeholder = "EMail" class="form-control form-control-lg">
</div>
<div class="form-outline mb-4">

<input type = "password" name ="password" id ="password" placeholder ="password" class="form-control form-control-lg">
</div>

<p id ="s"></p>
<div id = "hide1">
<button type ="submit" class="btn btn-dark" >submit</button>
</div>
<div id = "hide2" style =  "display : none">
<a class="btn btn-outline-primary mr-1" href="http://localhost/gavipractice/project/index.php" role="button">LOGIN NOW</a>
</div>
<p id ="s1"></p>
<div id ="hide3">
<p><a href="http://localhost/gavipractice/project/index.php" >Already have an account? then LOGIN</a></p>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<footer class="page-footer font-small special-color-dark pt-4" id = "f" ;>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>


<script>
$(document).ready(function(){
	$("#register").on('submit', function(e){
		//console.log("submit");
		var username = $("#uname").val();
		//console.log(username);
		var firstname = $("#fname").val();
		console.log(firstname);
		var lastname = $("#lname").val();
		var email = $("#email").val();
		var password = $("#password").val();
		e.preventDefault();
		$.ajax({
			//console.log("in ajax");
			url: "username_check.php",
			type: "POST",
			data:  {username: username, firstname: firstname, lastname: lastname, email: email, password: password},
			success: function(response){
					$('#s').html(response);
					//console.log("successs");
					if(response=="INSERTED SUCCESFULLY"){
						document.getElementById("hide1").style.display = "none";
						document.getElementById("hide2").style.display = "block";
						document.getElementById("hide3").style.display = "none";
					}
			}
			
		});
	});
});
</script>


</body>
</html>