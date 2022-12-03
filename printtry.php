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

if (isset($_GET['pdf'])) {
    runPDF();
  }
$test = ' <div class="yui-gc"> <div class="yui-u first"> <h1>'.$row["firstname"].' '.$row["lastname"].'</h1>';
$test .= '<h2>'.$row["occupation"].'</h2></div>';

$test .= '<div class="yui-u" style="float: right"> <h3>'. $row["email"].'</h3><br>
<h3>'.$row["number"].'</div> </h3> </div>';
for($i=0;$i<5;$i++) {
$test .= '<li>Hrllo Test</li>';
}
$test .= '</ul><p>Test Heading</p>';

//require 'vendor/autoload.php';
//use Dompdf\Dompdf;
//$options = new Options();
    //$options->set('isPhpEnabled', true);
   // $dompdf = new Dompdf($options);
$dompdf = new Dompdf();
$dompdf->loadhtml($test);
$dompdf->setPaper('A4','portrait');
$dompdf->render();
$dompdf->stream("p",array("Attachment" =>0));
?>
