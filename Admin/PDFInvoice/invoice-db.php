	<?php
require('fpdf17/fpdf.php');
include('../../functions.php');
include('../config.php');
if (!isAdmin()) {
$_SESSION['msg'] = "You must log in first";
header('location: ../../adminlogin.php');
}

    if (isset($_GET['logout'])) {
session_destroy();
unset($_SESSION['user']);
header("location: ../../login.php");
}
//db connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "cbfosystem";

$con=mysqli_connect($servername,$username,$password,$db);
mysqli_select_db($con,'cbfosystem');

$query = mysqli_query($con,"SELECT * FROM bookingcalendar WHERE  canceled = 0 AND room= '". $_SESSION['FilterResult'] ."' AND  (MONTH(FROM_UNIXTIME(start_day)) = '" . $_SESSION['FilterMonths'] . "' AND  YEAR(FROM_UNIXTIME(start_day)) = '" . $_SESSION['FilterYear'] . "' )  ORDER BY start_day ASC");
$invoice = mysqli_fetch_array($query);


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt


//Cell(width , height , text , border , end line , [align] )
$pdf->Image('SBCA-icon1transparent.png',10,50,190);
$pdf->Image('sbcalogo.png',40,8,20,25);

/*$pdf->AddFont('OldEnglish','','OLDENGL.php');
$pdf->SetFont('OldEnglish','B',36);*/
$pdf->Cell(200	,5,'San Beda College Alabang',0,1,'C');

$pdf->SetFont('Arial','B',14);
$pdf->Cell(200	,5,'Conference Room Reservation Records',0,1,'C');//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(200	,5,'[8 Don Manolo Blvd,Cupang]',0,0,'C');
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(200	,5,'[Muntinlupa City, 1770, Metro Manila]',0,1,'C');
$pdf->Cell(200	,5,'Phone [236-7222]',0,1,'C');
$pdf->Cell(34	,5, "",0,1);//end of line
$pdf->Cell(13	,5,'Date: ',0,0);
$pdf->Cell(34	,5, date("d/m/Y"),0,1);//end of line

//$pdf->Cell(130	,5,'Phone [236-7222]',0,0);
//$pdf->Cell(25	,5,'Invoice #',0,0);
//$pdf->Cell(34	,5,$invoice['OrderID'],0,1);//end of line
$pdf->Cell(189	,10,'',0,1);
$pdf->Cell(100	,5,'Records for Venue:',0,1);
$pdf->Cell(10	,5,'',0,0);
if ($_SESSION['WebpageOrigin'] == 'reports') {
$pdf->Cell(90	,5,$_SESSION['FilterResult'],0,1);	
}
else {
	$pdf->Cell(90	,5,$invoice['Department'],0,1);	
}


$pdf->Cell(189	,10,'',0,1);
$pdf->Cell(100	,5,'Records for the Month of:',0,1);
$pdf->Cell(10	,5,'',0,0);
if($_SESSION['FilterMonths'] == 1){
$pdf->Cell(90	,5,'January ' . $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 2){
$pdf->Cell(90	,5,'February ' . $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 3){
$pdf->Cell(90	,5,'March ' . $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 4){
$pdf->Cell(90	,5,'April ' . $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 5){
$pdf->Cell(90	,5,'May ' . $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 6){
$pdf->Cell(90	,5,'June ' . $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 7){
$pdf->Cell(90	,5,'July ' . $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 8){
$pdf->Cell(90	,5,'August '. $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 9){
$pdf->Cell(90	,5,'September '. $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 10){
$pdf->Cell(90	,5,'October '. $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 11){
$pdf->Cell(90	,5,'November '. $_SESSION['FilterYear'],0,1);	
}
if($_SESSION['FilterMonths'] == 12){
$pdf->Cell(90	,5,'December ' . $_SESSION['FilterYear'],0,1);	
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

$query = mysqli_query($con,"SELECT * FROM bookingcalendar WHERE  canceled = 0 AND room= '". $_SESSION['FilterResult'] ."' AND  (MONTH(FROM_UNIXTIME(start_day)) = '" .   $_SESSION['FilterMonths'] . "' AND  YEAR(FROM_UNIXTIME(start_day)) = '" . $_SESSION['FilterYear'] . "' )  ORDER BY start_day ASC");



 if (mysqli_affected_rows($con)  > 0) {
$pdf->Cell(50	,5,'Event Name',1,0);
$pdf->Cell(40	,5,'Organization',1,0);
$pdf->Cell(25	,5,'Day Booked',1,0);
$pdf->Cell(25	,5,'Time Start',1,0);
$pdf->Cell(25	,5,'Time End',1,0);
$pdf->Cell(20	,5,'Attendee',1,1);
//end of line

$pdf->SetFont('Arial','',12);

$TotalBookings = 0; //total tax
$TotalBookingsbyEmployee = 0;
$TotalBookingsbyStudent = 0; //total amount
//Cell(width , height , text , border , end line , [align] )
//display the items
while($item = mysqli_fetch_array($query)){

	$pdf->Cell(50	,5,$item['eventname'],1,0);
	//add thousand separator using number_format function
	$pdf->Cell(40	,5,$item['organization'],1,0);
	$pdf->Cell(25	,5,date('d/m/Y',$item['start_day']),1,0);
	$pdf->Cell(25	,5,sprintf("%02d:%02d", $item["start_time"]/60/60, ($item["start_time"]%(60*60)/60)) ." " . $item["TimeBeginDenum"],1,0);
	 if ($item["end_time"] / 60 / 60 == 12) {
 	 $pdf->Cell(25	,5,sprintf("%02d:%02d", $item["end_time"]/60/60, ($item["end_time"]%(60*60)/60)) ." nn"  ,1,0);
    }
    else if ($item["end_time"]/60/60 > 12) {
    	$TimeEnd = $item["end_time"]/60/60 - 12;
    	if ($TimeEnd < 1) {
    		$TimeEnd = 12;
    		$pdf->Cell(25	,5,sprintf("%02d:%02d", $TimeEnd, ($item["end_time"]%(60*60)/60))." pm"  ,1,0);
    	}
    	else {
    		$pdf->Cell(25	,5,sprintf("%02d:%02d", $TimeEnd, ($item["end_time"]%(60*60)/60)) ." pm"  ,1,0);
    	}
    
    }
    else {
    $pdf->Cell(25	,5,sprintf("%02d:%02d", $item["end_time"]/60/60, ($item["end_time"]%(60*60)/60)) ." " . $item["TimeBeginDenum"],1,0);
    }
	/*$pdf->Cell(25	,5,sprintf("%02d:%02d", $item["end_time"]/60/60, ($item["end_time"]%(60*60)/60)) ." " . $item["TimeEndDenum"],1,0);*/
	$pdf->Cell(20	,5,$item['Capacity'],1,1);

	if($item['reservee_type'] == "Student") {
		$TotalBookingsbyStudent += 1;
	}
	else
	{
		$TotalBookingsbyEmployee += 1;
	}
	$TotalBookings += 1;
	//$pdf->Cell(34	,5,($item['date']),1,1,'R');//end of line
	//accumulate tax and amount
	//$tax += $item['tax'];
	
//	$amount +=  $item['quantity'];
}
$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(80	,5,'',0,0);
$pdf->Cell(15	,5,'',0,0);
$pdf->Cell(70	,5,'Total Reservation',1,0);
$pdf->Cell(20	,5,$TotalBookings,1,1);


$pdf->Cell(80	,5,'',0,0);
$pdf->Cell(15	,5,'',0,0);
$pdf->Cell(70	,5,'Total Reservation by Students',1,0);
$pdf->Cell(20	,5,$TotalBookingsbyStudent,1,1);

$pdf->Cell(80	,5,'',0,0);
$pdf->Cell(15	,5,'',0,0);
$pdf->Cell(70	,5,'Total Reservation by Employee',1,0);
$pdf->Cell(20	,5,$TotalBookingsbyEmployee,1,1);

//$pdf->Cell(130	,5,'',0,0);
//$pdf->Cell(25	,5,'Date Due',0,0);
//$pdf->Cell(4	,5,'P',1,0);
//$pdf->Cell(30	,5,number_format($amount + $tax),1,1,'R');//end of line

 }

else {
	$pdf->SetFont('Arial','',24);
	$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(10	,5,'',0,1);
$pdf->Cell(60	,5,'',0,0);
$pdf->Cell(50	,5,'No Records Found',0,0);
}









$pdf->Output();
?>
