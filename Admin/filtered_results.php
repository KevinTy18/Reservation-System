<?php
include('../functions.php');
include('config.php');
if (!isAdmin()) {
$_SESSION['msg'] = "You must log in first";
header('location: ../../adminlogin.php');
}

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
<style>
html *
{
   font-family: Arial ; /* !important */
     
}
body {
    background-image: url("../sanbedapics/site-image.jpg");
    background-repeat: no-repeat, repeat;
    background-color: #cccccc;
    background-size: cover;
    width: 100%;

  background-position: center top;
}


.divsize {
    max-width: 500px;
    height: 110px;
    left: 50%;
    margin-left: 35%;
    padding-top: 10px;
    background-color: rgba(255,255,255,0.8);
    border-radius: 30px;
}
#divcon {
background: rgba(216, 0, 0,0.6);

color: white;
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


    input[type=text],input[type=number], select {
    width: 200px;
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
  margin-left: -65px;
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
.smallbutton {
  border-radius: 4px;
  background-color: white;
  border: none;
  color: crimson;
  text-align: center;
  font-size: 17px;
  padding: 6px;
  width: 150px;
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
.buttonopt {
  border-radius: 4px;
  background-color: white;
  border: none;
  color: crimson;
  text-align: center;
  font-size: 20px;
  padding: 20px;
  width: 250px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.buttoncal span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.buttonopt span {
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
.buttonopt span:after {
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
.buttonopt:hover span {
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
.buttonopt:hover span:after {
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
.fontforlogo{
     font-family: Old English Text MT;
     color:black;
}
.fontfortitle{
    font-family: Lucida Calligraphy;
    }
/* MODAL */
    * {
  box-sizing: border-box;
}



.btn {
  padding: 10px 40px;
  display: inline-block;
  background: white;
  color: #333;
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
#image{
    margin-left: 20%;
    margin-top: -40%;

    }
.file-input {
  display: inline-block;
  text-align: left;
  background: #fff;
  padding: 10px;
  width: 210px;
  position: relative;
  border-radius: 3px;
}

.file-input > [type='file'] {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  z-index: 10;
  cursor: pointer;
}

.file-input > .button1 {
  color:black;
  display: inline-block;
  cursor: pointer;
  background: #eee;
  padding: 2px 4px;
  border-radius: 2px;
  margin-right: 8px;
}

.file-input:hover > .button1 {
  background: dodgerblue;
  color: white;
}

.file-input > .label {
  color: #333;
  white-space: nowrap;
  opacity: .3;
}
div.ex3 {
    /* background-color: lightblue; */
    width: 1050px;
    height: 410px;
    overflow: auto;
}
.header {
  overflow: hidden;
  background-color:rgba(216, 0, 0,0.6)    ;
  padding: 5px 10px;
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
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}
.overflow {
    overflow:auto;
}
</style>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SBCA Booking Calendar</title>
<link href="jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="jquery-1.10.2.js"></script>
<script src="jquery-ui.js"></script>
<script src="../cssforlogin/js/uploadbtn.js"></script>


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
<?php
include('header.php');
include('../includes/navigation.php');
?>
    <form method='post' action='PDFInvoice/invoice-db.php'>
<button type='submit' class="smallbutton"  style="float:right;margin-right:80px"><i class="fa fa-print" style="font-size:24px;color:red;" ></i><span> Print Reports</span>
	

</button> 
</form>   
<br>
<div class="w3-container">
<table id="divcon" color="white" border="1" cellpadding="5"
width="800" class="w3-table w3-centered" >
<tr>
<td valign="top">
<div class="overflow">
<center>

<?php
				
				//Table for users
			
				$servername = "localhost";
        $username = "root";
        $password = "";
        $db = "cbfosystem";


				$con=mysqli_connect($servername,$username,$password,$db);
				$_SESSION['FilterResult'] =  $_POST['invoiceID'];
        $_SESSION['FilterMonths'] =  $_POST['filtermonth'];
           $_SESSION['FilterResult'] =  $_POST['invoiceID']; 

			  $result = mysqli_query($con,"SELECT * FROM bookingcalendar WHERE  canceled = 0 AND room= '". $_POST['invoiceID'] ."' AND  (MONTH(FROM_UNIXTIME(start_day)) = '" . $_POST['filtermonth'] . "' AND  YEAR(FROM_UNIXTIME(start_day)) = '" . $_POST['filteryear'] . "' )  ORDER BY start_day ASC"); 

          $_SESSION['FilterYear'] =  $_POST['filteryear'];

        if (mysqli_affected_rows($con)  > 0) {
          echo "<table style='border: solid 1px black; text-align:center;' >";
       echo "<tr style=color:white; >
       <th>EventName</th>
       <th>Organization</th> 
       <th>PhoneNum</th>
       <th>Venue</th>
       <th>Start Day</th>
       <th>End Day</th>
       <th>Start Time</th>
       <th>End Time</th>
       <th>Expected Attendee</th>
       </tr>";
       
       while($row = mysqli_fetch_array($result)) {

          echo "<tr style=color:white;>";
          echo "<td style='width:150px;border:1px solid black;'>" . $row['eventname'] . "</td>";
          echo "<td style='width:150px;border:1px solid black;'>" . $row['organization'] . "</td>";
          echo "<td style='width:150px;border:1px solid black;'>" . $row['phone'] . "</td>";
          echo "<td style='width:150px;border:1px solid black;'>" . $row['room'] . "</td>";
          echo "<td style='width:150px;border:1px solid black;'>" . date('d/m/Y',$row['start_day']) . "</td>";
          echo "<td style='width:150px;border:1px solid black;'>" . date('d/m/Y',$row['end_day']) . "</td>";
          echo "<td style='width:150px;border:1px solid black;'>" . sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60)) ." " . $row["TimeBeginDenum"]."</td>";
        echo "<td style='width:150px;border:1px solid black;'>" . sprintf("%02d:%02d", $row["end_time"]/60/60, ($row["end_time"]%(60*60)/60))." " .$row["TimeEndDenum"] . "</td>";
            echo "<td style='width:150px;border:1px solid black;'>" . $row['Capacity'] . "</td>";
        
       echo "</tr>";
      }
      echo "</table>";
        }

        else {
           ?>
           <h2><b>No Records Found</b></h2>
      <?php  }   ?>
     

</center>
    </div>
</td>

    </tr>
    
    </table>

    
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
