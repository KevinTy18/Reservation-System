<?php
include('../functions.php');
include('config.php');

if (!isAdmin()) {
$_SESSION['msg'] = "You must log in first";
header('location: ../adminlogin.php');
}

    if (isset($_GET['logout'])) {
session_destroy();
unset($_SESSION['user']);
header("location: ../adminlogin.php");

$Image;
}
?>
<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'cbfosystem');


if(isset($_POST["submitunavailabledates"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");

     $rows   = array_map('str_getcsv', file($_FILES['file']['tmp_name']));
    $header = array_shift($rows);
    $csv    = array();
    $BatchInsert = array();
    $SQLInsert = array();
    foreach($rows as $row) {
    	$row[0] = intval(strtotime(htmlspecialchars($row[0])));
        $csv[] = array_combine($header, $row);
       

    }
 	
    foreach ($csv as $rows) {
    	$BatchInsert[]=implode("','",$rows);
    		 
    	    }

 	    foreach ($BatchInsert as $value) {
    	$query = "INSERT into unavailable_dates(date,reason) values ('$value')";
    	
mysqli_query($con, $query);
}

  /* while($data = fgetcsv($handle))
   {
				$item1 = mysqli_real_escape_string($connect, $data[0]);  
                $item2 = mysqli_real_escape_string($connect, $data[1]);
				
                $query = "INSERT into unavailable_dates(date,reason) values('$item1','$item2')";
                mysqli_query($connect, $query);
   }*/
   fclose($handle);
   echo header('location:../Admin/index.php?ImportDateSuccess=0');
  }
 }
}
?>
<html>
<head>
<?php
include ('../includes/datepicker.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop() > 100){
            $('#scroll').fadeIn();
        }else{
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
</script>
<link href="../cssforlogin/css/checkbookings.css" rel="stylesheet">
<style>
    
.containerer {
  display: flex;
}
.containerer > div {
  flex: 1; /*grow*/
}    
</style>
</head>
<link rel="icon" type="image/png" href="../sanbedapics/sbcalogo.png"/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SBCA Booking Calendar</title>
<link href="jquery-ui.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
$(function() {
  $('input[name="unavailable_day"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  });
});
</script>
<body>
<?php
    include('../includes/bookingalerts.php');
    
?>
    <?php
  
    
    //dasdadad
  if (isset($_GET['SetUnavailableDate']) == true) {
    ?>
    <script type="text/javascript">
  swal("Date cancelled!", "Date successfully cancelled!", "success");
    </script>
<?php
}
if (isset($_GET['SetUnavailableDateError']) == true) {
    ?>
    <script type="text/javascript">
    swal("Date Cancel Failed", "Unfortunately the date has already been cancelled", "error");
    </script>
<?php
}
if (isset($_GET['ImportDateSuccess']) == true) {
    ?>
    <script type="text/javascript">
    swal("Import Sucess!", "Importing unavailable dates database complete!", "success");
    </script>
<?php
}    
    
?>
 <div class="header">
  <a class="logo" style="color:white;"> Welcome, <?php  if
(isset($_SESSION['user'])) : ?>
<strong><?php echo $_SESSION['user']['username']; ?>!</strong>


<?php endif ?></a>
  <div class="header-right">
    <a href="index.php" class="smallbutton" style="margin-right:5px;color:maroon;">
          <span class="fa fa-home" style="font-size:20px"></span> Home
    </a>
    <a href="index.php?logout='1'" class="smallbutton"
style="margin-right:10px;color:maroon;">
          <span class="fa fa-sign-out" style="font-size:20px"></span> Log out
    </a>
  </div>
</div>

<!-- BackToTop Button -->
<a href="javascript:void(0);" id="scroll" title="Scroll to Top"
style="display: none;">Top<span></span></a>




<div class="parallax" style="">
   <div class="divsize" style="margin:0 auto;margin-top:250px">

    <div class="divlogo"><img src="sbcalogo.png" alt="SBCA Logo"
width="20%" height="80%" style="margin-left:20px"></div>
    <div class="divsbcalogo" ><h2 class="fontforlogo">  LRC Booking
Calendar</h2></div>
</div>
</div>
<div class="containerer">
    <div style="background-color:rgba(255,255,255,0.8);text-align:center;max-width:500px;margin:0 auto;border-radius:20px">
    
<h3 class="fontfortitle">Cancel Schedule</h3>
<form action="checkbookings.php" method="post">
<p></p>
ID: <input name="id" required="" type="text" autocomplete="off"/><br />
            <p></p>

                <div class="buttons" >
               <button name="cancel" type="submit"
class="smallbuttonnav" style="margin:0 auto;background-color:black">Cancel Schedule</button>

            </div>
</form>


    </div>
    <div style="background-color:rgba(255,255,255,0.8);text-align:center;max-width:500px;margin:0 auto;border-radius:20px">
    
<center>
<h3 class="fontfortitle">Cancel Date</h3>
<form action="checkbookings.php" method="post">
<table>
<tr>  
    <td>Day:</td> 
<td><input id="from" name="unavailable_day" required="" placeholder="dd/mm/yy" type="text"
autocomplete="off"/></td>
</tr>    
<tr>
    <td>Reason:</td> 
<td><input  name="Reason" required="" type="text"
           autocomplete="off"/></td>
</tr>           
</table>
               <!-- <div class="buttons">
<input name="cancel" type="submit" value="Cancel" />
               <button name="cancel" type="submit"
class="smallbuttonnav">Cancel</button>

            </div> -->
     <div class="buttons">
               <button name="unavailabledates" type="submit"
class="smallbuttonnav" style="margin:0 auto;background-color:black">Cancel Date</button>

            </div>
    
</form>

</center>


    </div>
<div style="background-color:rgba(255,255,255,0.8);text-align:center;max-width:500px;margin:0 auto;border-radius:20px">
    
<h3 class="fontfortitle">Import Unavailable Dates</h3>
<form action="checkbookings.php" method="post" enctype='multipart/form-data'>
<p></p>
Import a CSV File to be placed
in the database.
        <input type="file" name="file" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple /><br />
            <p></p>

                <div class="buttons" >
               <button name="submitunavailabledates" type="submit"
class="smallbuttonnav" style="margin:0 auto;background-color:black">Import</button>

            </div>
</form>


    </div>
    </div>
<div class="divmargin">
    <div class="divcalendar">
        <center>
<?php
/* draws a calendar */
function draw_calendar($month,$year){

	include 'config.php';

	// Create connection
	$conn = mysqli_connect($servername, $username, $password,  $dbname);

	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
	
	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			$current_epoch = mktime(0,0,0,$month,$list_day,$year);
			$Cancelled_Date_Epoch = intval(strtotime(htmlspecialchars($current_epoch)));
			
			$sql = "SELECT * FROM $tablename WHERE $current_epoch BETWEEN start_day AND end_day AND canceled = 0 ORDER BY start_time ASC";
			
			$CancelledDates = "SELECT * FROM unavailable_dates WHERE date = $current_epoch";

			$result = mysqli_query($conn, $sql);
    		$result_of_Cancelled_Dates = mysqli_query($conn, $CancelledDates);
    		//test_progress($result_of_Cancelled_Dates);
    		if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {


    				if (mysqli_num_rows($result_of_Cancelled_Dates) > 0) {
					while($row = mysqli_fetch_assoc($result_of_Cancelled_Dates)) {
					$calendar .= "<div style=background-color:black>";
					$calendar .= "<font color=white><b>";
					$calendar .= "Closed" . "<br>";
					$calendar .= "Reason: " . $row["reason"];
					$calendar .= "</div>";
					}
				}
					else { 
					if($row["canceled"] == 1) $calendar .= "<font color=\"grey\"><s>";
    				$calendar .= "<b>" . "Room: ". $row["room"] . "</b><br>ID: " . $row["id"] . "<br>" ."Event Name: " . $row["eventname"] . "<br>". "Organization: ". $row["organization"] . "<br>". "Reservee name: ". $row["reservee_name"] . "<br>" ."Phone Num: " . $row["phone"] . "<br>" ."Capacity: " .$row["Capacity"] . "<br>";
    				if($current_epoch == $row["start_day"] AND $current_epoch != $row["end_day"]) {
    					$calendar .= "Booking starts: " . sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60)) . "<br><hr><br>";
    				}
    				if($current_epoch == $row["start_day"] AND $current_epoch == $row["end_day"]) {
    					$calendar .= "Booking start: " . sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60)) . " " . $row["TimeBeginDenum"] ."<br>";
    				}
    				if($current_epoch == $row["end_day"]) {
              if($row["end_time"]/60/60 > 12){
                $TimeEnd = $row["end_time"]/60/60 - 12;
                 $calendar .= "Booking end: " . sprintf("%02d:%02d", $TimeEnd, ($row["end_time"]%(60*60)/60)) . " " . $row["TimeEndDenum"] ."<br><hr><br>";
              }
    				else {
              $calendar .= "Booking end: " . sprintf("%02d:%02d", $row["end_time"]/60/60, ($row["end_time"]%(60*60)/60)) . " " . $row["TimeEndDenum"] ."<br><hr><br>";
            }

    				}
    				if($current_epoch != $row["start_day"] AND $current_epoch != $row["end_day"]) {
	    				$calendar .= "Booking: 24h<br><hr><br>";
	    			}
					if($row["canceled"] == 1) $calendar .= "</s></font>";
    			}
			} 
		}
		if (mysqli_num_rows($result_of_Cancelled_Dates) > 0) {
					while($row = mysqli_fetch_assoc($result_of_Cancelled_Dates)) {
					$calendar .= "<div style=background-color:black>";
					$calendar .= "<font color=white><b>";
					$calendar .= "Closed" . "<br>";
					$calendar .= "Reason: " . $row["reason"];
					$calendar .= "</div>";
					}
				}
			else {
    			$calendar .= "OPEN";
			}
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	mysqli_close($conn);
	
	/* all done, return result */
	return $calendar;
}

include 'config.php';
echo '<br>';
echo '<div class="divcenter">';
$d = new DateTime(date("Y-m-d"));
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));
echo '</div>';
echo '<br>';
?>
        </center>




    </div>
</div>
</body>
</html>