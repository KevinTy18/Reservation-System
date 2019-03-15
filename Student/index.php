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


$query = "SELECT * FROM tbl_student INNER JOIN room_department on tbl_student.Department_Id = room_department.Id INNER JOIN school_level on tbl_student.School_Level_Id = school_level.Id WHERE username=  '". $_SESSION['user']['username'] . "'  AND
password= '". $_SESSION['user']['password'] . "' LIMIT 1";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) == 1) { // user found
// check if user is admin or user
$logged_in_user = mysqli_fetch_assoc($results);
if ($logged_in_user['user_type'] == 'student') {

$_SESSION['user'] = $logged_in_user;
}
}
/*echo '<pre>';
    die(var_dump($_SESSION['user']['Department'] ));
    echo '</pre>';*/
$revenues = getRevenues();
 $query = "SELECT room_department.Id,room_department.Department FROM room_department INNER JOIN venues
on venues.Department_Id = room_department.Id INNER JOIN tbl_student on venues.Department_Id = tbl_student.Department_Id WHERE tbl_student.Department_Id = '" . $_SESSION['user']['Department_Id'] . "' GROUP BY
room_department.Department ";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $room_deparment_categories[] = array("id" => $row['Id'], "val" => $row['Department']);
  }

  $query = "SELECT RoomID, RoomName, Faculty_Booking_Only,Department_Id, RoomCapacity,RoomMinimumCapacity,VenueImage, Availability FROM venues INNER JOIN room_department ON venues.Department_Id = room_department.Id Where Availability = 'Available'  AND Faculty_Booking_Only = 0";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $venues_categories[$row['Department_Id']][] = array("id" => $row['RoomID'], "val" => $row['RoomName']);
    $venues_images_categories[$row['RoomID']][] = array("id" => $row['RoomID'], "val" => $row['VenueImage']);
  }
/*echo '<pre>';
    die(var_dump($venues_images_categories));
    echo '</pre>';*/
  $jsonCats = json_encode($room_deparment_categories);
  $jsonSubCats = json_encode($venues_categories);
  $json_venues_images_categories = json_encode($venues_images_categories);

?>
<!DOCTYPE html>
<html>
<head>
  <script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
        echo "var venues_images_categories = $json_venues_images_categories; \n";
      ?>

        
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
         select.options[0] = new Option("Select a Department", "");
        select.options[0].disabled = true;
        for(var i = 0; i < categories.length; i++){
          select.options[i + 1] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0;
        subcatSelect.options[0] = new Option("Select a Room", "");
        subcatSelect.options[0].disabled = true;
        for(var i = 0; i < subcats[catid].length; i++){
          subcatSelect.options[i + 1] = new Option(subcats[catid][i].val,subcats[catid][i].val);
        }
      }

      function change_picture(imageValue)
    { 
    if (imageValue == ""){
      /* document.getElementById("sample").innerHTML = "first error";*/
    } 
    else {
      /*document.getElementById("sample").innerHTML = "second error";*/
      if (window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
      }
      else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
         //  document.getElementById("sample").innerHTML = "third error";
        if (this.readyState == 4 && this.status == 200){
          var test = document.getElementById("imagedest");
          test.src = "../sanbedapics/"+JSON.parse(this.responseText);
        }
        /*else {
           document.getElementById("sample").innerHTML = this.responseText;
        }*/
      };
      xmlhttp.open("GET","ChangeImage.php?VenueImage=" + imageValue,true);
      xmlhttp.send();
    }
  }
       
    </script>
 <script>
$(function() {
  $('input[name="start_day"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  });
});
</script>
    
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
background-color: rgba(255, 255, 255, 0.98);
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
  background-color: #f13434;
  border: none;
  color: white;
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
    height: 250px;
    width: 500px;
    position: absolute;
    margin-left: 530px;
    margin-top: -340px;
}
.tablesize{
    max-height: 350px;
    overflow-y: scroll;
}
</style>

</head>

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
$(function() {
  $('input[name="start_day"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  });
});
</script>
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

<body onload='startall();'>
<?php
include('../includes/bookingalerts.php');
?>
<div class="header">
  <a class="logo" style="color:white;"> Welcome, <?php  if
(isset($_SESSION['user'])) : ?>
<strong><?php echo $_SESSION['user']['username']; ?>!</strong>

<a style="color:white;background-color:#000000b0;left:50%">Current Date and Time: <span id='ct'></span></a>
<?php endif ?></a>
  <div class="header-right">
    <a href="#" class="smallbutton" style="margin-right:5px;background-color:white;color:maroon;">
          <span class="fa fa-home" style="font-size:20px"></span> Home
    </a>
    <a href="index.php?logout='1'" class="smallbutton"
style="margin-right:10px;background-color:white;color:maroon;">
          <span class="fa fa-sign-out" style="font-size:20px"></span> Log out
    </a>
  </div>
</div>

<div style="margin:1%;">
</div>
<div class="divsize" align="center">
<!--<img src="sbcalogo.png" alt="SBCA Logo" width="7%" align="center" > -->
<h2 class="fontforlogo"><img src="../sanbedapics/sbcalogo.png" alt="SBCA Logo"
width="14%"> <b> LRC BOOKING SYSTEM </b> </h2>

</div>
<div>
<div class="buttons" style="margin:0 auto;">
<form action="checkbookingsUsers.php" method="POST">
    <button class="smallbuttonnav" type="submit" name="StudentDepartment"
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
</div>
<div class="w3-container">
    <div class="animated fadeIn">
<table id="divcon" cellpadding="0" cellspacing="0" border="0"
width="100%" height="450px">
<tr>
<script>
</script>
   

<td valign="top">
<form action="index.php" method="post">
<center><h3 class="fontfortitle">Make a Schedule</h3>

</center> 
<table>
<tr>
<td style="color:black;padding-left:20px">Choose a Department:</td>
<td>
<select id='categoriesSelect' name="RoomDepartment" style="width: 200px;">
    </select>
</td></tr>
<tr>
<td style="color:black;padding-left:20px">Choose a Room:</td>
<td>
    <select id='subcatsSelect' style="width: 200px;" onchange="change_picture(this.value)" name="Roomname">
    </select>  
</td>
</tr>
<tr>
<td style="color:black;padding-left:20px">Purpose:</td>
<td> 
<select name="eventname"style="width: 200px;" >
            <option selected="selected" value="Meeting">Meeting</option>
            <option value="Presentation">Presentation</option>
            <option value="Research">Research</option>
            </select>
        
</td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<td style="color:black;padding-left:20px">Organization:</td>
<td> <input maxlength="50" name="organization" required="" type="text"
autocomplete="off"/ value="<?php echo $_SESSION['user']['Department'] ?>" readonly="readonly"></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<td style="color:black;padding-left:20px">Name:</td>
<td> <input maxlength="50" name="reservee" required="" type="text"
autocomplete="off" value="<?php echo $_SESSION['user']['firstname'] ." ". $_SESSION['user']['middlename']." " . $_SESSION['user']['lastname']  ?>" readonly="readonly"/></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<!-- <td style="color:black;padding-left:20px">Designation:</td> -->
 <td><input type="text"  name="designation" value="Student" readonly="readonly" autocomplete="off" style="display: none"/>
 </td>
 </tr>
 <tr>
<td style="color:black;padding-left:20px">ID Number:</td>
<td>
<input maxlength="15" name="designation_id" value="<?php echo $_SESSION['user']['School_Id']  ?>" readonly="readonly" required="" type="text"
autocomplete="off"/></td>

</tr>
<tr>
<td style="color:black;padding-left:20px">School Level / Course:</td>
<td> <input maxlength="50" name="School_Level" required="" type="text"
autocomplete="off" value="<?php echo $_SESSION['user']['Name_or_Course'] ?>" readonly="readonly"/></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>
<tr>
<td style="color:black;padding-left:20px">Scheduled Date:</td>
<td>
<input id="from" name="start_day" required="" placeholder="dd/mm/yy" type="text"
autocomplete="off" /></td>
<!--
<td>-</td>
<td><input id="to" name="end_day" required="" type="text"
autocomplete="off"/></td> -->
</tr>
<?php if($_SESSION['user']['Department_Id'] == 1) {?>
<tr>
<td style="color:black;padding-left:20px">Scheduled Time:</td> 	
<td> 
    <ul class="categorychecklist">
        <li><select name="start_hour">
            <option selected="selected">07 am</option>
            <option>08 am</option>
            <option>09 am</option>
            <option>10 am</option>
            <option>11 am</option>
            <option>12 pm</option>
            <option>1 pm</option>
            <option>2 pm</option>
            <option>3 pm</option>
            </select>
            <select name="start_minute">
            <option selected="selected">00</option>
            <option>30</option>
            </select>
        </li>
      </ul>  
     </td>
</tr>
<?php } ?>
<?php if($_SESSION['user']['Department_Id'] == 2) {?>
<tr>
<td style="color:black;padding-left:20px">Schedule Time:</td>   
<td> 
    <ul class="categorychecklist">
        <li><select name="start_hour">
            <option selected="selected">07 am</option>
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
            </select>
            <select name="start_minute">
            <option selected="selected">00</option>
            <option>30</option>
            </select>
        </li>
      </ul>  
     </td>
</tr>
<?php } ?>
<?php if($_SESSION['user']['Department_Id'] == 3) {?>
<tr>
<td style="color:black;padding-left:20px">Schedule Time:</td>   
<td> 
    <ul class="categorychecklist">
        <li><select name="start_hour">
            <option selected="selected">07 am</option>
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
            </select>
            <select name="start_minute">
            <option selected="selected">00</option>
            <option>30</option>
            </select>
        </li>
      </ul>  
     </td>
</tr>
<?php } ?>
<?php if($_SESSION['user']['Department_Id'] == 4) {?>
<tr>
<td style="color:black;padding-left:20px">Schedule Time:</td>   
<td> 
    <ul class="categorychecklist">
        <li><select name="start_hour">
            <option selected="selected">07 am</option>
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
            </select>
            <select name="start_minute">
            <option selected="selected">00</option>
            <option>30</option>
            </select>
        </li>
      </ul>  
     </td>
</tr>
<?php } ?>
<?php if($_SESSION['user']['Department_Id'] == 5 || $_SESSION['user']['Department_Id'] == 6 ) {?>
<tr>
<td style="color:black;padding-left:20px">Schedule Time:</td>   
<td> 
    <ul class="categorychecklist">
        <li><select name="start_hour">
            <option selected="selected">12 pm</option>
            <option>1 pm</option>
            <option>2 pm</option>
            <option>3 pm</option>
            <option>4 pm</option>
            <option>5 pm</option>
            <option>6 pm</option>
            <option>7 pm</option>
            </select>
            <select name="start_minute">
            <option selected="selected">00</option>
            <option>30</option>
            </select>
        </li>
      </ul>  
     </td>
</tr>
<?php } ?>
    <tr>
      <td style="color:black;padding-left:20px">Duration:</td>
      <td>  
          <ul class="categorychecklist">
            <li><select name="Duration" style="width:200px;">
            <option selected="selected" value="1800">30 minutes</option>
            <option value="3600">1 hour</option>
            <option value="5400">1 hour and 30 minutes</option>
            <option value="7200">2 hours</option>
            </select>
            </li>        
          </ul>
 </td> 
 </tr> 


<tr>
<td style="color:black;padding-left:20px">Contact #:</td>
<td>
<input maxlength="11" name="phone" required="" type="text"
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
<td style="color:black;padding-left:20px">Materials Needed:</td>
<td>
<ul class="categorychecklist">
    <li><input type="checkbox" name="material_list[]" value="Remote Control-Smart TV">Remote Control -Smart TV<br></li>
    <li><input type="checkbox" name="material_list[]" value="Whiteboard Marker">Whiteboard Marker<br></li>
    <li><input type="checkbox" name="material_list[]" value="Eraser">Eraser<br></li> 
    <li>-Other (Please Specify)<input type="text" name="material_list[]" ></li> 
</ul>
</td>
</tr>
<tr>
<td></td>
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




<div class='landscape'>
<img id="imagedest" style="width:100%;max-width: 100%; height: auto;">
  
</div>

</td>

<td valign="top">
<h3 class="fontfortitle"><span>Room Capacity List:</span></h3>


<?php
				
			
				
$servername = "localhost";
$username = "root";
$password = "";
$db = "cbfosystem";


				$con=mysqli_connect($servername,$username,$password,$db);
				$result = mysqli_query($con,"SELECT RoomName,RoomCapacity,RoomMinimumCapacity FROM venues ORDER BY RoomName ASC"); 
				
   ?>
<div class="tablesize">   
    <table style='border: solid 1px black;'>
        <tr style=color:black, text-align:right;>

        <th>Venue Name</th>
        <th>Venue Capacity</th>
        
       
        </tr>
 <?php
while($row = mysqli_fetch_array($result)) {


    
    echo "<td style='width:150px;border:1px solid black;'>" . $row['RoomName'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['RoomMinimumCapacity'] . " - ". $row['RoomCapacity'] . " persons</td>";
    
     "</td>";
    
 echo "</tr>";
}
?>
    </table>
</div> 
</td>

</tr>
</table>
    </div>
    </div>

   
</body>
</html>
