<?php
include('../functions.php');
include('config.php');
/*if (!isAdmin()) {
$_SESSION['msg'] = "You must log in first";
header('location: ../adminlogin.php');
}
*/
    if (isset($_GET['logout'])) {
session_destroy();
unset($_SESSION['user']);
header("location: login.php");
}
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
<link href="../cssforlogin/css/UnavailableDates.css" rel="stylesheet">
</head>
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
<br>
<div class="divsize" align="center">
<!--<img src="sbcalogo.png" alt="SBCA Logo" width="7%" align="center" > -->
<h2 class="fontforlogo"><img src="sbcalogo.png" alt="SBCA Logo"
width="14%">  SBCA Booking System</h2>

</div>
<br>

<div class="w3-container" >
<div class="animated fadeIn">
<table id="divcon" cellpadding="0" cellspacing="0" border="0"
width="400" align="center"  style=margin-top: "30%">
<tr>


<td valign="top">
<center>
<h3 class="fontfortitle">Cancel Date</h3>
<form action="AddUnavailableDates.php" method="post">
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
                <div class="buttons">
<!--<input name="cancel" type="submit" value="Cancel" /> -->
               <button name="cancel" type="submit"
class="smallbutton1">Cancel</button>

            
            </div>
</form>

</center>

</td>
</tr>
</table>
    </div>




    <div class="buttons" style="margin-left:80px">
<form action="checkbookings.php">
    <!--<input type="submit" value="Check Calendar" /> -->
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
    <button class="buttoncal" type="submit" style="float:left"><span><i class=" fa fa-table" style="font-size:24px;color:red;"></i>
Check Reports</span></button>
</form>

    </div>

    </div>

 
</body>
</html>