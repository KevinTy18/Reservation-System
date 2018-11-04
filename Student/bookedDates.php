<?php
include('../functions.php');
include('config.php');

if (!isStudent()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../userlogin.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../userlogin.php");
}

 $query = $db->query("SELECT Id,Department FROM room_department ");
 $_SESSION['WebpageOrigin'] = "User";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<style>

.divsize {
    max-width: 500px;
    height: 110px;
    left: 50%;
    margin-left: 35%;
    padding-top: 10px;
    background-color: rgba(255,255,255,0.8);
    border-radius: 30px;
}

html *
{
   font-family: Arial ; /* !important */
}
body {
    background-image: url("../cssforlogin/images/site-image.jpg");
    background-repeat: no-repeat, repeat;
    background-color: #cccccc;
    background-size: cover;
    width: 100%;

  background-position: center top;
}



#divcon {
background-color: rgba(255,255,255,0.8);
    border-radius: 30px;
color: black;
}
.colortrans {
background-color: powderblue;

}
table.calendar {
border-left: 1px solid #999;
}
tr.calendar-row {
}
td.calendar-day {
min-height: 80px;
font-size: 11px;
position: relative;
vertical-align: top;
}
* html div.calendar-day {
height: 80px;
}
td.calendar-day:hover {
background: #eceff5;
}
td.calendar-day-np {
background: #eee;
min-height: 80px;
}
* html div.calendar-day-np {
height: 80px;
}
td.calendar-day-head {
background: #ccc;
font-weight: bold;
text-align: center;
width: 120px;
padding: 5px;
border-bottom: 1px solid #999;
border-top: 1px solid #999;
border-right: 1px solid #999;
}
div.day-number {
background: #999;
padding: 5px;
color: #fff;
font-weight: bold;
float: right;
margin: -5px -5px 0 0;
width: 20px;
text-align: center;
}
td.calendar-day, td.calendar-day-np {
width: 120px;
padding: 5px;
border-bottom: 1px solid #999;
border-right: 1px solid #999;
}
input[type=button], input[type=submit], input[type=reset]{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}


    input[type=text],input[type=number] {
    width: 200px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
select {
    width: 100px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.button {
  border-radius: 4px;
  background-color: white;
  border: none;
  color: crimson;
  text-align: center;
  font-size: 20px;
  padding: 20px;
  width: 190px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.smallbutton {
  border-radius: 4px;
  background-color: white;
  border: none;
  color: crimson;
  text-align: center;
  font-size: 17px;
  padding: 6px;
  width: 120px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.smallbuttonnav {
  border-radius: 4px;
  background-color: white;
  border: none;
  color: crimson;
  text-align: center;
  font-size: 17px;
  padding: 6px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.buttoncal {
  border-radius: 4px;
  background-color: white;
  border: none;
  color: crimson;
  text-align: center;
  font-size: 20px;
  padding: 20px;
  width: 280px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  width: 250px;
    margin-left: -80px;
}
.buttoncal span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.buttoncal span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}
.buttoncal:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.buttoncal:hover span:after {
  opacity: 1;
  right: 0;
}

.pulse:hover, .pulse:focus {
  animation: pulse 1s;
  box-shadow: 0 0 0 2em rgba(255, 255, 255, 0);
}
@keyframes pulse {
  0% {
    box-shadow: 0 0 0 0 var(--hover);
  }
}

.pulse {
  --color: #ef6eae;
  --hover: #ef8f6e;
  background-color: white;
}

button {
  color: var(--color);
  transition: 0.25s;
}
button:hover, button:focus {
  border-color: var(--hover);
  color: #ef8f6e;
}

button {
  background: none;

  border: 2px solid;
  font: inherit;
  line-height: 1;
  margin: 0.5em;
  padding: 1em 2em;
}

code {
  color: #e4cb58;
  font: inherit;
}
.fontforlogo {
    font-family: helvetica;
    color: black;
}
.fontfortitle{
    font-family: Helvetica;
	padding-top: 20px;
    }
/* MODAL */
    * {
  box-sizing: border-box;
}



.btn {
  padding: 20px 50px;
  display: inline-block;
  background: #EF233C;
  color: white;
  text-decoration: none;
  transition: 0.35s ease-in-out;
  font-weight: 700;
}
.btn:hover {
  background: #dc1029;
}

.overlay {
  width: 100%;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 40px;
  position: fixed;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.75);
  opacity: 0;
  pointer-events: none;
  transition: 0.35s ease-in-out;
  max-height: 100vh;
  overflow-y: auto;
}
.overlay.open {
  opacity: 1;
  pointer-events: inherit;
}
.overlay .modal {
  background: white;
  text-align: center;
  padding: 40px 80px;
  box-shadow: 0px 1px 10px rgba(255, 255, 255, 0.35);
  opacity: 0;
  pointer-events: none;
  transition: 0.35s ease-in-out;
  max-height: 100vh;
  overflow-y: auto;
}
.overlay .modal.open {
  opacity: 1;
  pointer-events: inherit;
}
.overlay .modal.open .content {
  transform: translate(0, 0px);
  opacity: 1;
}
.overlay .modal .content {
  transform: translate(0, -10px);
  opacity: 0;
  transition: 0.35s ease-in-out;
}
.overlay .modal .title {
  margin-top: 0;
}
.image{
    margin-left: 63%;
    margin-top: -13%;
    width:8%;
    }
.header {
  overflow: hidden;
  background-color: #B22222;
  padding: 0px 10px;
}
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 10px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}
.header a.logo {
  font-size: 25px;
  font-weight: bold;
}
.heade a:hover {
  background-color: #ddd;
  color: black;
}
.header a.active {
  background-color: dodgerblue;
  color: white;
}
.header-right {
  float: right;
}
    .tablesize{
    width:2050px;
    max-height: 450px;
    overflow-y: scroll;
    
    
}
    
</style>
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
<script>
    var inputs = document.querySelectorAll('.file-input')

for (var i = 0, len = inputs.length; i < len; i++) {
  customInput(inputs[i])
}

function customInput (el) {
  const fileInput = el.querySelector('[type="file"]')
  const label = el.querySelector('[data-js-label]')
  
  fileInput.onchange =
  fileInput.onmouseout = function () {
    if (!fileInput.value) return
    
    var value = fileInput.value.replace(/^.*[\\\/]/, '')
    el.className += ' -chosen'
    label.innerText = value
  }
}
</script>
<script>
var $table = $('table.scroll'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth;

// Adjust the width of thead cells when window resizes
$(window).resize(function() {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function() {
        return $(this).width();
    }).get();
    
    // Set the width of thead columns
    $table.find('thead tr').children().each(function(i, v) {
        $(v).width(colWidth[i]);
    });    
}).resize(); // Trigger resize handler    
</script>
</head>

<body>
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
<h2 class="fontforlogo"><img src="../sanbedapics/sbcalogo.png" alt="SBCA Logo"
width="14%">  SBCA Booking System</h2>

</div>
    
<div class="buttons">
<form action="checkbookingsUsers.php">
    <!--<input type="submit" value="Check Calendar" /> -->
    <button class="smallbuttonnav" type="submit"
style="float:left"><span><i class="fa
fa-calendar" style="font-size:24px;color:red"></i> Check
Calendar</span></button>
</form>

<form action="bookedDates.php">
    <button class="smallbuttonnav" type="submit"
style="float:left;"><span><i class="fa fa-gears"
style="font-size:24px;color:red;" ></i>Booked Dates</span></button>
</form>

    </div>
<div class="w3-container">
    <div class="animated fadeIn">
<table id="divcon" cellpadding="0" cellspacing="0" border="0"
width="1000px" class="w3-table w3-centered" >
<tr>
<td valign="top">
<div class="ex3"> 
<?php
				
				//Table for users
				
				$servername = "localhost";
$username = "root";
$password = "";
$db = "cbfosystem";


				$con=mysqli_connect($servername,$username,$password,$db);
				$result = mysqli_query($con,"SELECT id, eventname, organization,reservee_name,phone,Capacity,start_time, end_time FROM bookingcalendar WHERE designation_id = '". $_SESSION['user']['School_Id'] ."';
                
                ");
      
				
   ?>
<div class="tablesize">
 <table style='border: solid 1px black;' >
  <tr style=color:black, text-align:right;>
 <th>ID</th>
 <th>Event Name</th>
 <th>Organization</th>
 <th>Reservee name</th>
 <th>Phone Num</th>
 <th>Attendees</th>
 <th>Time Start</th>
 <th>Time End</th>
 <th>Print</th>
 
 </tr>
 <?php
while($row = mysqli_fetch_array($result)) {
$id = $row['id'];

    echo "<tr style=color:black;>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['id'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['eventname'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['organization'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['reservee_name'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['phone'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['Capacity'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['start_time'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['end_time'] . "</td>";
    
    
echo '<td><form method="post" action="PDFInvoice/invoice-db.php">

<button id="print_btn" type="submit" class="btn">Print</button>

</button> 
</td>
<td>

<td>
<input type="hidden" name="venueid" value="' . $id . '"/></td></form>';
 echo "</tr>";
}
?>
</table>
    </div>
</div>





</td>


</tr>
</table>
    </div>

    </div>


</body>
</html>
