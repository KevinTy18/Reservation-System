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
}


$revenues = getRevenues();
?>
<!DOCTYPE html>
<html>
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
  width: 130px;
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

ul.categorychecklist {
        list-style: none;
        margin: 0;
        padding: 0;
}
ul.categorychecklist li {
     display: inline-block;
     float: left;
     padding-right: 10px;
}

@media only screen and (min-width:360px) and (max-width:360px){
	.header{
        width: 642px;
        height: 85px;
        padding-top: 6px;
		
	}
	body{
		background-size: 1900px;
	}
	.divsize{
		margin-left: 61px;
	    margin-right: -198px;
	}
	table {
        border-collapse: collapse;
        margin: -5px;
        margin-bottom: 20px;
        width: 100%;
    }
	.buttoncal{
	    border-collapse: collapse;
        margin: -5px;
        margin-bottom: 20px;
        width: 100%;
        margin-left: 160px;
        margin-right: auto;
	}
	.header-right {
        padding-top: 12px;
		display: inline;
}
.header a.logo {
    font-size: 16px;
	display: -webkit-inline-box;
  }
}

    input{
        vertical-align: middle;
    }
img {
    max-width: 100%;
    max-height: 100%;
}
.landscape {
    height: 200px;
    width: 400px;
    position: absolute;
    margin-left: 40px;
    margin-top: 40px;  
}

</style>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SBCA BOOKING CALENDAR</title>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="jquery-1.10.2.js"></script>
<script src="jquery-ui.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="jquery-ui.css" rel="stylesheet">

</head>


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



<body>

<div class="header">
  <a class="logo" style="color:white;"> Welcome, <?php  if
(isset($_SESSION['user'])) : ?>
<strong><?php echo $_SESSION['user']['username']; ?>!</strong>


<?php endif ?></a>
  <div class="header-right">
    <a href="#" class="smallbutton" style="margin-right:5px;color:maroon;">
          <span class="fa fa-home" style="font-size:20px"></span> Home
    </a>
    <a href="index.php?logout='1'" class="smallbutton"
style="margin-right:10px;color:maroon;">
          <span class="fa fa-sign-out" style="font-size:20px"></span> Log out
    </a>
  </div>
</div>

<div style="margin:1%;">
</div>
<div class="divsize" align="center">
<!--<img src="sbcalogo.png" alt="SBCA Logo" width="7%" align="center" > -->
<h2 class="fontforlogo"><img src="sbcalogo.png" alt="SBCA Logo"
width="14%"> <b> SBCA BOOKING SYSTEM </b> </h2>

</div>

<div class="buttons">
<form action="checkbookings.php">
    <!--<input type="submit" value="Check Calendar" /> -->
    <button class="smallbuttonnav" type="submit" style="float:left"><span><i class="fa
fa-calendar" style="font-size:24px;color:red"></i> Check
Calendar</span></button>
</form>

<div class="buttons">
<form action="BookingOptions.php">
    <button class="smallbuttonnav" type="submit" style="float:left"><span><i class="fa fa-gears" style="font-size:24px;color:red;" ></i> Cancel Reservation</span></button>
</form>
</div>
    
<form action="addvenue.php">
    <button class="smallbuttonnav" type="submit" style="float:left"><span><i class="fa
fa-plus-circle" style="font-size:24px;color:red;"></i>
Add Venues</span></button>
</form>
    
<form action="checkrooms.php">
    <button class="smallbuttonnav" type="submit" style="float:left"><span><i class="fa
fa-check-circle" style="font-size:24px;color:red;"></i>
Venue Descriptions</span></button>
</form>
        
<form action="reports.php">
    <button class="smallbuttonnav" type="submit" style="float:left"><span><i class="	fa fa-table" style="font-size:24px;color:red;"></i>
Check Reports</span></button>
</form>


    </div>
<div class="w3-container">
<table id="divcon" cellpadding="0" cellspacing="0" border="0"
width="100%" height="450px">
<tr>
<script>

    function change_picture(imageValue)
    { 	  
		document.getElementById("imagedest").innerHTML = '<div><div class="landscape"><img src="../sanbedapics/' + imageValue + '" style="width:100%"></div></div>';
    }

</script>
   

<td valign="top">
<form action="index.php" method="post">
<center><h3 class="fontfortitle">Make a Reservation</h3>


<?php
foreach ($revenues as $revenue) {
	$name = $revenue['RoomName'];
	$image = $revenue['VenueImage'];
	
    echo "<input type='radio' name='item' value='$name' onclick='change_picture(\"" . $image . "\")'>$name</input> ";
}
?> 

</center> 
<!--
<p><input checked="checked" name="item" type="radio" value="MPH" />MPH
 <input name="item" type="radio" value="ST.Maur" />St Maur Hall
 <input name="item" type="radio" value="AVR" />CAS AVR
 <input name="item" type="radio" value="Balcruz" />Balcruz 
  <input name="item" type="radio" value="Bellarmine Hall" />Bellarmine Hall 
              <input name="item" type="radio" value="Rosendo" />Rosendo </p> -->
<table>
<tr>
<td style="color:black;padding-left:20px">Event Name:</td>
<td> <input maxlength="50" name="eventname" required="" type="text"
autocomplete="off"/></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<td style="color:black;padding-left:20px">Organization:</td>
<td> <input maxlength="50" name="organization" required="" type="text"
autocomplete="off"/></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<td style="color:black;padding-left:20px">Reservee name:</td>
<td> <input maxlength="50" name="reservee" required="" type="text"
autocomplete="off"/></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<td style="color:black;padding-left:20px">Designation:</td>
 <td><input  checked="checked" name="designation" type="radio" value="Student" />Student
| <input name="designation" type="radio" value="Employee" />Employee
 </td>
 </tr>
 <tr>
<td style="color:black;padding-left:20px">Reservee ID:</td>
<td>
<input maxlength="15" name="designation_id" required="" type="text"
autocomplete="off"/></td>

</tr>
<tr>
<td style="color:black;padding-left:20px">Contact #:</td>
<td>
<input maxlength="10" name="phone" required="" type="text"
autocomplete="off"/></td>
</tr>
<tr>
<td style="color:black;padding-left:20px">Expected Atendee:</td>
<td>
<input maxlength="20" name="atendee" required="" type="number"
autocomplete="off" min="0"/></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<td style="color:black;padding-left:20px">Day(s) of Event:</td>
<td>
<input id="from" name="start_day" required="" type="text"
autocomplete="off" /></td>
<!--
<td>-</td>
<td><input id="to" name="end_day" required="" type="text"
autocomplete="off"/></td> -->
</tr>
<tr>
<td style="color:black;padding-left:20px">Time of Event:</td> 	
<td> 
    <ul class="categorychecklist">
        <li><select name="start_hour">
            <!-- <option selected="selected">06</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option> -->
            <option selected="selected">06 am</option>
            <option>07 am</option>
            <option>08 am</option>
            <option>09 am</option>
            <option>10 am</option>
            <option>11 am</option>
            <option>12 pm</option>
            <option>1 pm</option>
            <option>2 pm</option>
            <option>3 pm</option>
            <option>4 pm</option>
            <option>5 pm</option>
            <option>6 pm</option>
            <option>7 pm</option>
            <option>8 pm</option>
            <option>9 pm</option>
            <option>10 pm</option>
            <!-- <option>23</option> -->
            </select>
            <select name="start_minute">
            <option selected="selected">00</option>
            <option>30</option>
            </select>
        </li>
        <li>
        <select name="end_hour">
<!-- <option>00</option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>  -->
<option selected="selected">06 am</option>
<option>07 am</option>
<option>08 am</option>
<option>09 am</option>
<option>10 am</option>
<option>11 am</option>
<option>12 pm</option>
<option>1 pm</option>
<option>2 pm</option>
<option>3 pm</option>
<option>4 pm</option>
<option>5 pm</option>
<option>6 pm</option>
<option>7 pm</option>
<option>8 pm</option>
<option>9 pm</option>
<option>10 pm</option>
<!-- <option selected="selected">23</option> -->
</select>:<select name="end_minute">
<option>00</option>
<option selected="selected">30</option>
</select>
        </li>
    </ul>
    
</td>
<td>&nbsp;</td>
<td>
</td>
</tr>
<tr>
<td style="color:black;padding-left:20px">Borrow Materials:
</td>
<td>
<ul class="categorychecklist">
    <li><input type="checkbox" name="remote" value="Remote Control-Smart TV">Remote Control -Smart TV<br></li>
    <li><input type="checkbox" name="whiteboardmarker" value="Whiteboard Marker" checked>Whiteboard Marker<br></li>
    <li><input type="checkbox" name="eraser" value="Eraser" checked>Eraser<br></li>
    
    <li><input type="checkbox" name="other" value="Other" checked>Other (Please Specify) <input maxlength="50" name="reservee" required="" type="text"
autocomplete="off"/><br></li> 
</ul>
</td>
</tr>
<tr>
<td>
<div class="buttons">
                <button class="smallbutton" name="book"
type="submit"><span>Reserve</span></button>
            </div>
</td>    
</tr>
</table>




            
<!--<input name="book" type="submit" value="Book" /> -->
</form>




<div class='image' id='imagedest' style="margin-top:-350px;">
</div>

</td>
<td valign="top">
<h3 class="fontfortitle"><span>Room Capacity List:</span></h3>
<br>
<h5><span>AVR: 40 People</span></h5>
<h5><span>Balcruz: 40-60 Persons</span></h5>
<h5><span>Bellarmine: 60-80 Persons</span></h5>
<h5><span>Rosendo: 80-150 Persons</span></h5>
<h5><span>MPH: 150-350 Persons</span></h5>
<h5><span>St. Maur: 350-500 Persons</span></h5>
</td>

</tr>
</table>


    

    </div>


</body>
</html>
