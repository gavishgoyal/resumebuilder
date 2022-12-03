
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
<title>LOGIN</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>
<!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body id="page-top" style="background: #161F6D">



<!-- Navigation START -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style = "background: white" >
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/g2.svg" alt="..." /></a>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="https://gavishgoyal.github.io/resumebuilder/index.html#services" style = "color : black">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://gavishgoyal.github.io/resumebuilder/index.html#portfolio" style = "color : black">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://gavishgoyal.github.io/resumebuilder/index.html#about" style = "color : black">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://gavishgoyal.github.io/resumebuilder/index.html#team" style = "color : black">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://gavishgoyal.github.io/resumebuilder/contact" style = "color : black">Contact</a></li>
						<li class="nav-item"><a class="nav-link" href="https://gavishgoyal.github.io/resumebuilder/index.php" style = "color : black">Login</a></li>
						<li class="nav-item"><a class="nav-link" href="https://gavishgoyal.github.io/resumebuilder/register.php" style = "color : black">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
		
		<!-- Navigation END -->
		
		
		

<section class="vh-100" style="background-color: black;">
  <div class="container py-50 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
<h1 class="mb-5" >LOGIN</h1>
<form id = "login">
<div class="form-outline mb-4">
<input type = "text" name = "username" id = "username"placeholder = "Username" class="form-control form-control-lg" ><br>
       <p id ="s1" style = "color : red"></p>
</div>
<div class="form-outline mb-4">
<input type = "password" name ="password" id="password" placeholder ="password" class="form-control form-control-lg"><br>
       <p id ="s2" style = "color : red"></p>
</div>

<button type ="submit" class="btn btn-dark" >submit</button>

       <p id ="s3" style = "color : red"></p>
      



<p><a href="https://gavishgoyal.github.io/resumebuilder/register.php" >don't have an account? then register</a></p>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>	



		<footer class="page-footer font-small special-color-dark pt-4" style="background: white";>
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
console.log("in script");
 $(document).ready(function(){
	 console.log("in function");
	$("#login").on('submit', function(e){
		var username = $("#username").val();
		var password = $("#password").val();
		e.preventDefault();
		$.ajax({
			url: "login_done.php",
			type: "POST",
			data: {username: username, password: password},
			success: function(response){
				console.log("in success");

				if(response == ""){
					window.location.href = "https://gavishgoyal.github.io/resumebuilder/welcome.php";
				}
				else if(response == "PLEASE FILL USERNAME"){
					$('#s1').html(response);
				}
				else if(response == "PLEASE FILL password"){
					$('#s2').html(response);
				}
				else{
					$('#s3').html(response);
				}				
				}
		});
	});
});
</script>


</body>
</html>
