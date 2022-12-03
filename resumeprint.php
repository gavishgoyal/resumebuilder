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
require 'vendor/autoload.php';
use Dompdf\Dompdf; 
use Dompdf\Options;

function runPDF () {
    $options = new Options();
    $options->set('isPhpEnabled', true);
    $dompdf = new Dompdf($options);

    $data = array('name'=>'John Smith', 'date'=>'1/29/15');

    $html = file_get_contents("resume.php"); 
    $dompdf->loadHTML($html); 
    
    $dompdf->setPaper('A4', 'portrait'); 
    $dompdf->render(); 
    $dompdf->stream("niceshipest", array("Attachment" => 0));

}

$html='
<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd"  text-align: justify>
			<div class="yui-gc">
				<div class="yui-u first" style = "float: left">
					<h1>'.$row["firstname"].' '. $row["lastname"].'  </h1>
					<h3>'.$row["occupation"].'</h3>
				</div>

				<div class="yui-u" style = "float: right">
					<div class="contact-info">
						<h3>'.$row["email"].' </h3>
						<h3>'.$row["number"].' </h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->
<br><br><br><br><br><br>
		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2><u>Profile</u></h2>
						</div>
						
							<p class="enlarge" >
								Progressively evolve cross-platform ideas before impactful infomediaries. Energistically visualize tactical initiatives before cross-media catalysts for change. 
							</p>
					
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						
						<h2><u>Skills</u></h2>
						';
						$a = $row["skills"];
						$skill_arr = explode(",", $a);
						$l = count($skill_arr);
						for($x=0;$x<$l;$x++){
							
					
						$html.='	
								<ul class="talent">
									<li><h4>'.$skill_arr[$x].'</h3></li>
								</ul>';
						 } 
								
						$html .='
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2><u>Technical</u></h2>
						</div>';
						$t = $row["technical"];
						$tech_arr = explode(",", $t);
						$l = count($tech_arr);
						for($x=0;$x<$l;$x++){
							
						$html.='
						
							<ul class="talent">
								
								<li class="last"><h4>'.$tech_arr[$x].' </h4></li>
							</ul>';
						 } 
						$html.='
						
					</div><!--// .yui-gf-->

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2><u>Experience</u></h2>
						</div><!--// .yui-u -->

						<div class="yui-u">';


while($row1 = mysqli_fetch_assoc($result1)){
					$html.='
							<div class="job">
								<h2 style = "float: left"><u>'. $row1["company"].'</u></h2>
								<h4 style = "float: right">'.$row1["joiningd"].'  to ' .$row1["leavingd"].'</h4>
								<br><br><br><h3> position : '.$row1["post"].' </h3>
								
								
							</div>';

}

							$html.='

						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2><u>Education</u></h2>
						</div>
						<div class="yui-u">
							<h2>'.$row["education"].'</h2>
							<h3>'.$row["degree"].'<strong>&nbsp;&nbsp;&nbsp;'. $row["percentage"].'%</strong> </h3>
						</div>
					</div><!--// .yui-gf -->


				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		

	</div><!-- // inner -->


</div><!--// doc -->';




$dompdf = new Dompdf();
$dompdf->loadhtml($html);
$dompdf->setPaper('A4','portrait');
$dompdf->render();
$dompdf->stream($_SESSION['uname']."-resume",array("Attachment" =>1));
?>