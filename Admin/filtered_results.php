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

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LRC Booking System</title>
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
    <link href="../cssforlogin/css/filtered_results.css" rel="stylesheet">
</head>
<script type="text/javascript"> 
function refresh(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('time()',refresh)
}

function time() {
var x = new Date()
var x1=x.toLocaleDateString() + " " + x.toLocaleTimeString();// changing the display to UTC string
document.getElementById('ct').innerHTML = x1;
refresh();
 }
    function startall(){
        time();
        loadCategories();
    }
</script>
<body onload=startall();>
<?php
include('header.php');
include('../includes/navigation.php');
?>
    <form method='post' action='PDFInvoice/invoice-db.php' target="_blank">
<button type='submit' class="smallbutton"  style="float:right;margin-right:80px"><i class="fa fa-print" style="font-size:24px;color:red;" ></i><span> Print Reports</span>
	

</button> 
</form>
    <form method='post' action='excel_MasterList.php'>
<button type='submit' name="export" value="Export" class="smallbutton"  style="float:right;margin-right:10px;width:160px"><i class="fa fa-print" style="font-size:24px;color:red;"></i><span> Export to Excel </span>
</button> 
</form>
<br>
<div class="w3-container">
<table id="divcon" color="black" border="1" cellpadding="5"
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
                $_SESSION['FilterYear'] =  $_POST['filteryear'];

			  $result = mysqli_query($con,"SELECT * FROM bookingcalendar WHERE  canceled = 0 AND room= '". $_POST['invoiceID'] ."' AND  (MONTH(FROM_UNIXTIME(start_day)) = '" . $_POST['filtermonth'] . "' AND  YEAR(FROM_UNIXTIME(start_day)) = '" . $_POST['filteryear'] . "' )  ORDER BY start_day ASC"); 


        if (mysqli_affected_rows($con)  > 0) {
          echo "<table style='border: solid 1px black; text-align:center;' >";
       echo "<tr style=color:black; >
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

          echo "<tr style=color:black;>";
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
