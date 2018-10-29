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

 $query = $db->query("SELECT Id,Department FROM room_department ");
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
    max-height: 450px;
    overflow-y: scroll;
    overflow-x: hidden;
    
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
    
<div class="buttons">
<form action="checkbookings.php">
    <!--<input type="submit" value="Check Calendar" /> -->
    <button class="smallbuttonnav" type="submit"
style="float:left"><span><i class="fa
fa-calendar" style="font-size:24px;color:red"></i> Check
Calendar</span></button>
</form>

<div class="buttons">
<form action="BookingOptions.php">
    <button class="smallbuttonnav" type="submit"
style="float:left"><span><i class="fa fa-gears"
style="font-size:24px;color:red;" ></i> Cancel
Reservation</span></button>
</form>
</div>

<form action="addvenue.php">
    <button class="smallbuttonnav" type="submit"
style="float:left"><span><i class="fa
fa-plus-circle" style="font-size:24px;color:red;"></i>
Add Venues</span></button>
</form>

<form action="checkrooms.php">
    <button class="smallbuttonnav" type="submit"
style="float:left"><span><i class="fa
fa-check-circle" style="font-size:24px;color:red;"></i>
Venue Descriptions</span></button>
</form>

<form action="reports.php">
    <button class="smallbuttonnav" type="submit"
style="float:left"><span><i class=" fa fa-table"
style="font-size:24px;color:red;"></i>
Check Reports</span></button>
</form>


    </div>
<div class="w3-container">
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
				$result = mysqli_query($con,"
                SELECT venues.RoomID,venues.RoomName,venues.Department_Id,venues.RoomCapacity,venues.RoomMinimumCapacity,venues.VenueImage,venues.Availability,room_department.Department 
FROM venues
INNER JOIN room_department ON venues.Department_Id = room_department.Id;
                
                ");
      
				
   ?>
<div class="tablesize">
 <table style='border: solid 1px black;' >
  <tr style=color:black, text-align:right;>
 <th>Room ID</th>
 <th>Department</th>
 <th>Room Name</th>
 <th>Room Capacity</th>
 <th>Minimum Capacity</th>
 <th>Room Image</th>
 <th>Availability</th>
 <th>Edit</th>
 <th>Deactivate</th>
 <th>Activate</th>
 </tr>
 <?php
while($row = mysqli_fetch_array($result)) {
$id = $row['RoomID'];

    echo "<tr style=color:black;>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['RoomID'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['Department'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['RoomName'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['RoomCapacity'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['RoomMinimumCapacity'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['VenueImage'] . "</td>";
       echo "<td style='width:150px;border:1px solid black;'>" . $row['Availability'] . "</td>";
    
    
echo '<td><form method="post" action="" enctype="multipart/form-data">

<button id="edit_btn" type="submit" class="btn" name="selectvenue" >Select</button>
</td>
<td>
<button type="submit" class="btn" name="deletevenue">Deactivate</button>
</td>
<td>
<button type="submit" class="btn" name="restorevenue">Activate</button>
</td>
<td>
<input type="hidden" name="venueid" value="' . $id . '"/></td></form>';
 echo "</tr>";
}
?>
</table>
    </div>
</div>





</td>

<td valign="top">
<form action="checkrooms.php" method="post" enctype="multipart/form-data">
<h3 class="fontfortitle">Edit Rooms</h3>



<table style="width: 10%">
<tr>
<td style="color:black;padding-left:20px;text-align:right">Department:</td>
<td> 
    <?php
    // Run your query
    
    echo '<select name="deparment" style="width:200px">'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = $query->fetch_assoc()) {
   echo '<option value='.$row['Id'].'>'.$row['Department'].'</option>';
}

echo '</select>';// Close your drop down box
?>
</td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<td style=color:black>Room Name:</td>
<td> <input maxlength="50" name="venuename" required="" type="text"
autocomplete="off" value="<?php echo $_SESSION['venuename']?>" /></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<td style=color:black>Room Capacity:</td>
<td> <input maxlength="50" name="capacity" required="" type="number"
autocomplete="off" min="1" value="<?php echo $_SESSION['capacity']?>" /></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<td style=color:black>Minimun Room Capacity:</td>
<td>
<input maxlength="20" name="mincapacity" required="" type="number"
autocomplete="off" min="1" value="<?php echo $_SESSION['mincapacity']?>" /></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style=color:black>Room Image:</td>
<td>
    
    <input type="hidden" value="<?php echo $_SESSION['venueimagee']?>">
    <input class="btn" type="file"  name="venueimage"  >  
    
</td>
</tr>
    
    <input type="hidden" name="venueid" value="<?php echo $_SESSION['venueid']?>"/>
<tr>


</table>
<p>
            <div class="buttons">
                <button class="button" name="editvenue"
                        type="submit"><i class="fa fa-pencil-square-o"></i>Edit venue</button>
            </div>
    
    
<!--<input name="book" type="submit" value="Book" /> -->
</form>
</td>
</tr>
</table>


    </div>


</body>
</html>
