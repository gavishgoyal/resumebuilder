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
$sql = "SELECT * FROM register WHERE username='".$_SESSION['uname']."' ";
		//echo $sql;
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$sql1 = "SELECT * FROM experience WHERE username='".$_SESSION['uname']."' ORDER BY id ASC";
		//echo $sql1;
$result1 = mysqli_query($conn ,$sql1);
//function printa(){
//	var doc = new jsPDF();
//	doc.text(20, 20, 'resume.php');
//	doc.save('resume.pdf');
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>RESUME</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> <script src="js/jsPDF/dist/jspdf.min.js"></script>
	<link rel="stylesheet" type="text/css" href="resume.css" media="all" />

</head>
<body>

<div id="doc2" class="yui-t7">
	<div id="inner">
	
				<div class="yui-u">
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1><?php echo $row["firstname"]." ". $row["lastname"]  ?></h1>
					<h2><?php echo $row["occupation"]?></h2>
				</div>

					<div class="contact-info">
						
						<h3><?php echo $row["email"] ?></h3>
						<h3><?php echo $row["number"] ?></h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Profile</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
								Progressively evolve cross-platform ideas before impactful infomediaries. Energistically visualize tactical initiatives before cross-media catalysts for change. 
							</p>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
						<h2>Skills</h2>
						</div>
						<?php $a = $row["skills"];
						$skill_arr = explode(",", $a);
						$l = count($skill_arr);
						for($x=0;$x<$l;$x++){
							
						?>
							
						<div class="yui-u">

								<ul class="talent">
									<li><h3><?php echo $skill_arr[$x] ?></h3></li>
									
								</ul>
								</div>
						<?php } ?>
								
						
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Technical</h2>
						</div>
						<?php $t = $row["technical"];
						$tech_arr = explode(",", $t);
						$l = count($tech_arr);
						for($x=0;$x<$l;$x++){
							
						?>
						<div class="yui-u">
							<ul class="talent">
							<?php $y=$x+1;
							if($y%3 == 0 ){?>
								<li class="last"><?php echo $tech_arr[$x] ?></li>
							<?php } 
							else { ?>
								<li><h3><?php echo $tech_arr[$x] ?></h3></li>
							<?php  } ?>
							</ul>
							</div>
						<?php } ?>
						
						
					</div><!--// .yui-gf-->

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Experience</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">
<?php 

while($row1 = mysqli_fetch_assoc($result1)){
	?>
							<div class="job">
								<h2><?php echo $row1['company'] ?></h2>
								<h3><?php echo "position :".$row1['post'] ?></h3>
								<h4><?php echo $row1['joiningd']." to " .$row1['leavingd']?></h4>
								
							</div>
<?php
}
?>
							

						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
						<div class="yui-u">
							<h2><?php echo $row["education"]?></h2>
							<h3><?php echo $row["degree"]?><strong>&nbsp;&nbsp;&nbsp;<?php echo $row["percentage"]?>%</strong> </h3>
						</div>
					</div><!--// .yui-gf -->


				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p><?php echo $row["firstname"]." ". $row["lastname"]  ?> &mdash; <?php echo $row["email"] ?> &mdash; <?php echo $row["number"] ?></p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->


</body>
</html>

