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
header("location: login.php");
}
$_SESSION['WebpageOrigin'] = "reports";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php
  include '../includes/head.php'; 
?>

<!--<script src="lang/datepicker-fi.js"></script>-->
<script>
    $(function() {
<!--$.datepicker.setDefaults($.datepicker.regional['fi']);-->
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
  regional: "fi",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>
<link href="../cssforlogin/css/Reports.css" rel="stylesheet">
</head>

<body>
<?php
include('header.php'); 
include('../includes/navigation.php');
?>
<br>

<div class="w3-container" >
    <div class="animated fadeIn">
<table id="divcon" cellpadding="0" cellspacing="0" border="0"
width="400" align="center"  >
<tr>
    <td valign="top" style="padding-left:20px">
        <div>
        <form method='post' action='filtered_results.php'>
			<select name='invoiceID' style="width:200px;margin-bottom:10px">
				<?php
	
		$db = mysqli_connect('localhost', 'root', '', 'cbfosystem');

					//show invoices list as options
					$query = mysqli_query($db,"select * from bookingcalendar GROUP by room");
					while($invoice = mysqli_fetch_array($query)){ ?>
						<option style="color:black" value= <?php echo $invoice['room'];?>> <?php echo $invoice['room']; ?> </option>";					
					<?php		
					}
				?>
			</select>
        <select name='filtermonth' style="width:200px">
        <?php
  
    $db = mysqli_connect('localhost', 'root', '', 'cbfosystem');

          //show invoices list as options
          $query = mysqli_query($db,"select *,MONTH(FROM_UNIXTIME(start_day))as month , YEAR(FROM_UNIXTIME(start_day)) from bookingcalendar GROUP by  MONTH(FROM_UNIXTIME(start_day)),YEAR(FROM_UNIXTIME(start_day))");
          while($invoice = mysqli_fetch_array($query)){ ?>
            <option style="color:black" value= <?php echo $invoice['month'];?>> <?php  echo date("M",($invoice['start_day'])) ; ?> </option>";          
          <?php   
          }
        ?>
      </select>
     <select name='filteryear' style="width:200px">
        <?php
  
    $db = mysqli_connect('localhost', 'root', '', 'cbfosystem');

          //show invoices list as options
          $query = mysqli_query($db,"select * , YEAR(FROM_UNIXTIME(start_day)) as year from bookingcalendar GROUP by YEAR(FROM_UNIXTIME(start_day))");
          while($invoice = mysqli_fetch_array($query)){ ?>
            <option style="color:black" value= <?php echo $invoice['year'];?>> <?php  echo date("Y",($invoice['start_day'])) ; ?> </option>";          
          <?php   
          }
        ?>
      </select>

            <button type="submit" value='Generate' class="smallbutton" name="generate_btn">Show Report</button>
			
		</form>
        </div>
		
        <div>
            <form method='post' action='designationreports.php' >
            <button type="submit" value='Generate' class="smallbutton" name="generate_btn" style="width:340px;">Show Reports of Students and Employee</button>
		</form>
        </div>
        
    </td>
</tr>


</table>
    </div>


<br>
<!--<div class="buttons" style="margin-left:80px">
<form action="checkbookings.php">
    <input type="submit" value="Check Calendar" /> 
    <button class="buttoncal" type="submit" style="float:left"><span><i class="fa
fa-calendar" style="font-size:24px;color:red"></i> Check
Calendar</span></button>
</form>

<div class="buttons">
<form action="UnavailableDates.php">
    <button class="buttoncal" type="submit" style="float:left;width:340px"><span><i class="fa fa-gears" style="font-size:24px;color:red;" ></i> Manage Unavailable Dates</span></button>
</form>
</div>
    
<form action="addvenue.php">
    <button class="buttoncal" type="submit" style="float:left"><span><i class="fa
fa-plus-circle" style="font-size:24px;color:red;"></i>
Add Rooms</span></button>
</form>
    
<form action="checkrooms.php">
    <button class="buttoncal" type="submit" style="float:left;width:270px"><span><i class="fa
fa-check-circle" style="font-size:24px;color:red;"></i>
Room Descriptions</span></button>
</form>
        
<form action="reports.php">
    <button class="buttoncal" type="submit" style="float:left"><span><i class="	fa fa-table" style="font-size:24px;color:red;"></i>
Check Reports</span></button>
</form>

    </div>-->

    </div>


</body>
</html>