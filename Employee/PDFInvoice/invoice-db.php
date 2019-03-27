	<?php
require('fpdf17/fpdf.php');
include('../../functions.php');
include('../config.php');
if (!isEmployee()) {
$_SESSION['msg'] = "You must log in first";
header('location: ../../userlogin.php');
}

    if (isset($_GET['logout'])) {
session_destroy();
unset($_SESSION['user']);
header("location: ../../userlogin.php");
}
//db connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "cbfosystem";


				$con=mysqli_connect($servername,$username,$password,$db);
mysqli_select_db($con,'cbfosystem');

$query = mysqli_query($con,"SELECT * FROM bookingcalendar WHERE  canceled = 0 AND id = '". $_POST['venueid'] ."' ORDER BY start_day ASC");
$invoice = mysqli_fetch_array($query);


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$pdf->Image('SBCA-icon1transparent.png',10,50,190);
$pdf->Image('sbcalogo.png',40,8,20,25);

$pdf->Cell(200	,5,'San Beda College Alabang',0,1,'C');
$pdf->Cell(200	,5,'Conference Room Reservation Receipt',0,1,'C');//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(200	,5,'[8 Don Manolo Blvd,Cupang]',0,0,'C');
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(200	,5,'[Muntinlupa City, 1770, Metro Manila]',0,1,'C');
$pdf->Cell(200	,5,'Phone [236-7222]',0,1,'C');
$pdf->Cell(34	,5, "",0,1);//end of line
$pdf->Cell(13	,5,'',0,0);
$pdf->Cell(34	,5, '',0,1);//end of line

//$pdf->Cell(130	,5,'Phone [236-7222]',0,0);
//$pdf->Cell(25	,5,'Invoice #',0,0);
//$pdf->Cell(34	,5,$invoice['OrderID'],0,1);//end of line
$pdf->Cell(189	,10,'',0,1);
$pdf->Cell(100	,5,'Booking ID:',0,1);
$pdf->Cell(10	,5,'',0,0);

$pdf->Cell(90	,5,$_POST['venueid'],0,1);	
$pdf->Cell(100	,5,'Booked By:',0,1);
$pdf->Cell(10	,5,'',0,0);

$pdf->Cell(90	,5,$invoice['reservee_name'],0,1);

$pdf->Cell(100	,5,'Booking Date:',0,1);
$pdf->Cell(10	,5,'',0,0);
 if ($invoice['date_reserved'] == 0 ){
 	$pdf->Cell(90	,5,'Unavailable Date',0,1);
 }
 else {
 $pdf->Cell(90	,5,date('d/m/Y',$invoice['date_reserved']),0,1);	
 }

//$pdf->Cell(130	,5,'Fax [+12345678]',0,0);
//$pdf->Cell(25	,5,'Customer ID',0,0);
//$pdf->Cell(34	,5,$invoice['UserID'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
//end of line

//billing address
//end of line

//add dummy cell at beginning of each line for indentation

//$pdf->Cell(10	,5,'',0,0);
//$pdf->Cell(90	,5,$invoice['company'],0,1);

$pdf->Cell(10	,5,'',0,0);
//$pdf->Cell(90	,5,$invoice['unitno'] ." " . $invoice['street'].", " .$invoice['subdivision'] .", " . $invoice['barangay'] .", " . $invoice['city'] .", " . $invoice['province'] ,0,1);

$pdf->Cell(10	,5,'',0,0);
//$pdf->Cell(90	,5,$invoice['email'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',9);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$pdf->Cell(40	,5,'Purpose',1,0);
$pdf->Cell(30	,5,'Organization',1,0);
$pdf->Cell(30	,5,'Room',1,0);
$pdf->Cell(25	,5,'Scheduled Date',1,0);
$pdf->Cell(25	,5,'Time Start',1,0);
$pdf->Cell(25	,5,'Time End',1,0);
$pdf->Cell(20	,5,'Attendee',1,1);
//end of line

$pdf->SetFont('Arial','',12);

$tax = 0; //total tax
$amount = 0; //total amount
//Cell(width , height , text , border , end line , [align] )
//display the items
$query = mysqli_query($con,"SELECT * FROM bookingcalendar WHERE  canceled = 0 AND id = '". $_POST['venueid'] ."' ORDER BY start_day ASC");

while($item = mysqli_fetch_array($query)){
	$pdf->Cell(40	,5,$item['eventname'],1,0);
	//add thousand separator using number_format function
	$pdf->Cell(30	,5,$item['organization'],1,0);
	$pdf->Cell(30	,5,$item['room'],1,0);
	$pdf->Cell(25	,5,date('m/d/Y',$item['start_day']),1,0);
	$pdf->Cell(25	,5,sprintf("%02d:%02d", $item["start_time"]/60/60, ($item["start_time"]%(60*60)/60)) ." " . $item["TimeBeginDenum"],1,0);
	$pdf->Cell(25	,5,sprintf("%02d:%02d", $item["end_time"]/60/60, ($item["end_time"]%(60*60)/60)) ." " . $item["TimeEndDenum"],1,0);
	$pdf->Cell(20	,5,$item['Capacity'],1,1);
	//$pdf->Cell(34	,5,($item['date']),1,1,'R');//end of line
	//accumulate tax and amount
	//$tax += $item['tax'];
	
//	$amount +=  $item['quantity'];
	$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(20	,5,'Materials:',0,0);
if (empty($item['Materials'])){
	$pdf->Cell(20	,5,'None',0,1);
}
else {
$pdf->Cell(20	,5,$item["Materials"],0,1);	
}
	
}



//summary


//$pdf->Cell(130	,5,'',0,0);
//$pdf->Cell(25	,5,'Date Due',0,0);
//$pdf->Cell(4	,5,'P',1,0);
//$pdf->Cell(30	,5,number_format($amount + $tax),1,1,'R');//end of line

$pdf->Output();
?>
