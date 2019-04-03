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
   echo header('location:../Admin/checkbookings.php?ImportDateSuccess=0');
  }
 }
}
?>
<html>
<head>
    <style>
*{
-webkit-box-sizing: initial;
box-sizing: initial;
}
.btn-primary{
color:crimson;
}

    </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../cssforlogin/css/bootstrapbookings.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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


</head>
<link rel="icon" type="image/png" href="../sanbedapics/sbcalogo.png"/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LRC Booking System</title>
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
    swal("Date Cancel Failed!", "Unfortunately the date has already been cancelled", "error");
    </script>
<?php
}
if (isset($_GET['ImportDateSuccess']) == true) {
    ?>
    <script type="text/javascript">
    swal("Import Success!", "Importing unavailable dates database complete!", "success");
    </script>
<?php
}
if (isset($_GET['BookingCancelled']) == true) {
    ?>
    <script type="text/javascript">
    swal("Booking cancelled!", "Booking successfully cancelled!", "success");
    </script>
<?php
}     
if (isset($_GET['BookingCancelledFailed']) == true) {
    ?>
    <script type="text/javascript">
    swal("Booking cancelled Failed!", "Booking Does Not Exist/Already have been Canceled!", "error");
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
<div class="divsize" align="center">
<!--<img src="sbcalogo.png" alt="SBCA Logo" width="7%" align="center" > -->
<img src="../sanbedapics/LRClogo.png" alt="LRC Logo" width="20%" height="80%" style="margin-top: -10px;margin-left: 18px;float:left;margin-top:0px">
<img src="../sanbedapics/sbcalogo.png" alt="LRC Logo" width="15%" height="70%" style="margin-right: 18px;float:right;margin-top:10px">
<h2 class="fontforlogo" style="vertical-align: middle;
    text-align: center; "> <b> LRC BOOKING SYSTEM </b> </h2>

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
    <p></p>
     <div class="buttons">
               <button type="button" class="smallbuttonnav" data-toggle="modal"
data-target="#exampleModalCenter">
  Cancel Dates
</button>

            </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cancel Date</h5>
        
      </div>
      <div class="modal-body">
        Are you sure you want to cancel the date?
          
          <div class="wrap-input100 validate-input" data-validate="Enter password">
              Please enter password:
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
data-dismiss="modal">Close</button>
        <button name="unavailabledates" type="submit" type="button"
class="btn btn-primary">Yes, cancel the date</button>
      </div>
    </div>
  </div>
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
           
<a href="download.php?file=unavailabedatesample.csv">Download sample csv file.</a>
    <p></p>
                <div class="buttons" >
               <button name="submitunavailabledates" type="submit"
class="smallbuttonnav" style="margin:0 auto;background-color:black">Import</button>

            </div>
</form>
    </div>
    </div>
    <div>
    <?php include('../includes/CheckCalendarNavigation.php');?>
    </div>
<div class="divmargin" style="margin-top:100px">
    <div class="divcalendar">
        <div class="table-responsive">
        <center>
<?php
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
</div>
<form action="checkbookings.php" method="post"
enctype='multipart/form-data'>
<!-- Modal -->

    </form>
</body>
</html>