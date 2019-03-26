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
 $query = "SELECT Id,Department FROM room_department INNER JOIN venues
on venues.Department_Id = room_department.Id GROUP BY
room_department.Department";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $room_deparment_categories[] = array("id" => $row['Id'], "val" =>
$row['Department']);
  }

  $query = "SELECT RoomID, RoomName, Department_Id,
RoomCapacity,RoomMinimumCapacity,VenueImage, Availability FROM venues
INNER JOIN room_department ON venues.Department_Id =
room_department.Id Where Availability = 'Available'";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $venues_categories[$row['Department_Id']][] = array("id" =>
$row['RoomID'], "val" => $row['RoomName']);
    $venues_images_categories[$row['RoomID']][] = array("id" =>
$row['RoomID'], "val" => $row['VenueImage']);
  }


   $query = "SELECT Duration_Description,Duration_Value, Department_Id FROM department_duration INNER JOIN room_department ON department_duration.Department_Id = room_department.Id Order by Duration_Value";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $venues_durations[$row['Department_Id']][] = array("id" => $row['Duration_Value'], "val" => $row['Duration_Description']);

  }
    $query = "SELECT Schedule_Description,Schedule_Value, Department_Id FROM department_schedule INNER JOIN room_department ON department_schedule.Department_Id = room_department.Id";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $venues_schedule[$row['Department_Id']][] = array("id" => $row['Schedule_Value'], "val" => $row['Schedule_Description']);

  }
/*echo '<pre>';
    die(var_dump($venues_images_categories));
    echo '</pre>';*/
  $jsonCats = json_encode($room_deparment_categories);
  $jsonSubCats = json_encode($venues_categories);
  $json_venues_images_categories = json_encode($venues_images_categories);
  $json_venues_duration = json_encode($venues_durations);
  $json_venues_schedule = json_encode($venues_schedule);



?>
<!DOCTYPE html>
<html>
<head>
  <script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
        echo "var venues_images_categories = $json_venues_images_categories; \n";
        echo "var venues_durations = $json_venues_duration; \n";
        echo "var venues_schedule = $json_venues_schedule; \n";
      ?>

      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        select.options[0] = new Option("Select a Department", "");
        select.options[0].disabled = true;
        for(var i = 0; i < categories.length; i++){
          select.options[i+1] = new Option(categories[i].val,categories[i].id);

        }


      }

      function updateSubCats(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        var durationselect = document.getElementById("duration");
        var scheduleselect = document.getElementById("schedule");
        subcatSelect.options.length = 0;
        durationselect.options.length = 0;
        scheduleselect.options.length = 0;
        subcatSelect.options[0] = new Option("Select a Room", "");
        subcatSelect.options[0].disabled = true;

        durationselect.options[0] = new Option("Select a Duration", "");
        durationselect.options[0].disabled = true;

        scheduleselect.options[0] = new Option("Select a Schedule", "");
        scheduleselect.options[0].disabled = true;
        for(var i = 0; i < subcats[catid].length; i++) {
          subcatSelect.options[i+1] = new Option(subcats[catid][i].val,subcats[catid][i].val);   
        }
        for(var i = 0; i < venues_durations[catid].length; i++) {
          durationselect.options[i+1] = new Option(venues_durations[catid][i].val,venues_durations[catid][i].id);   
        }
         for(var i = 0; i < venues_schedule[catid].length; i++) {
          scheduleselect.options[i+1] = new Option(venues_schedule[catid][i].val,venues_schedule[catid][i].id);   
        }
      }

      function change_picture(imageValue)
      {
        if (imageValue == ""){
          document.getElementById("sample").innerHTML = "";
        }
        else {
          //document.getElementById("sample").innerHTML = "sdadad";
          if (window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
          }
          else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200){
              var test = document.getElementById("imagedest");
              test.src = "../sanbedapics/"+JSON.parse(this.responseText);
            }
          };
          xmlhttp.open("GET","ChangeImage.php?VenueImage=" + imageValue,true);
          xmlhttp.send();
        }
      }


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
  
</style>
    
    <link href="../cssforlogin/css/index.css" rel="stylesheet">
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
<body onload=startall();>

<?php
include('../includes/bookingalerts.php');
include('header.php');
include('../includes/navigation.php'); 
?>
<div class="w3-container">
    <div class="animated fadeIn">
<table id="divcon" cellpadding="0" cellspacing="0" border="0"
width="100%" height="450px">
<script>

    /*function change_picture(imageValue)
    {
document.getElementById("imagedest").innerHTML = '<div><div
class="landscape"><img src="../sanbedapics/' + imageValue + '"
style="width:100%"></div></div>';
    }*/

</script>


<td valign="top">
<form action="index.php" method="post">
<center><h3 class="fontfortitle">Make a Schedule</h3>
</center>
<table>

<tr>
<td style="color:black;padding-left:20px">Choose a room:</td>
<td>
<select id='categoriesSelect' onchange="change_Timer(this.value)" name="RoomDepartment" style="width:170px">
    </select>
    <select id='subcatsSelect' onchange="change_picture(this.value)"
name="Roomname" style="width:170px">
    </select>
</td>
</tr>
<tr>  
<td style="color:black;padding-left:20px">Purpose:</td>
<td> <select id="" name="eventname"style="width: 200px;" >
            <option selected="selected" value="Meeting">Meeting</option>
            <option value="Presentation">Presentation</option>
            <option value="Research">Research</option>
            </select></td>
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
<td style="color:black;padding-left:20px;">School Level / Course:</td>
<td> 
    <?php
    $query = $db->query("SELECT Id,Name_or_Course FROM school_level ORDER BY Name_or_Course ASC"); // Run your query
    
    echo '<select name="School_Level" style="width:200px">'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = $query->fetch_assoc()) {
   echo '<option value="'.$row['Name_or_Course'].'">'.$row['Name_or_Course'].'</option>';
}

echo '</select>';// Close your drop down box
?>
</td>
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
 <td><input  checked="checked" name="designation" type="radio"
value="Student" />Student
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
<td style="color:black;padding-left:20px">Day of Event:</td>
<td>
<input  name="start_day" required="" placeholder="dd/mm/yy" type="text"
autocomplete="off" /></td>
</tr>

<tr>
<td style="color:black;padding-left:20px">Time of Reservation:</td>
<td>
    <ul class="categorychecklist">
        <li><select id="schedule" name="start_hour">
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
            </select>
            <select name="start_minute">
            <option selected="selected">00</option>
            <option>30</option>
            </select>
        </li>
      </ul>
     </td>
</tr>
    <tr>
      <td style="color:black;padding-left:20px">Duration of the
Reservation:</td>
      <td>
          <ul class="categorychecklist">
              <li><select name="Duration" id="duration" style="width:200px;"></select></li>
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
    <li><input type="checkbox" name="material_list[]" value="Remote
Control-Smart TV">Remote Control -Smart TV<br></li>
    <li><input type="checkbox" name="material_list[]"
value="Whiteboard Marker">Whiteboard Marker<br></li>
    <li><input type="checkbox" name="material_list[]"
value="Eraser">Eraser<br></li>
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
<img id="imagedest" style="width:100%">
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
$result = mysqli_query($con,"SELECT
RoomName,RoomCapacity,RoomMinimumCapacity FROM venues WHERE Availability = 'Available' ORDER BY RoomName ASC");
   ?>
<div class="tablesize">
    <table style='border: solid 1px black;'>
        <tr style=color:black, text-align:right;>

        <th>Venue Name</th>
        <th>Venue Capacity</th>


        </tr>
 <?php
while($row = mysqli_fetch_array($result)) {



    echo "<td style='width:150px;border:1px solid black;'>" .
$row['RoomName'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" .
$row['RoomMinimumCapacity'] . " - ". $row['RoomCapacity'] . "
persons</td>";

     "</td>";

 echo "</tr>";
}
?>
    </table>
</div>

</table>
    </div>
    </div>


</body>
</html> 
    