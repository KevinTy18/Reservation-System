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
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../cssforlogin/css/checkschoollevel.css" rel="stylesheet">
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
    }
</script>
<body onload=startall();>
    
<?php
include('../includes/bookingalerts.php');
include('header.php');
include('../includes/navigation.php');
include('../includes/checkroomsalerts.php');  
?>
<div class="w3-container">
    <div class="table-responsive">
<table id="divcon" cellpadding="0" cellspacing="0" border="0"
width="1000px" class="w3-table w3-centered">
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
                SELECT school_level.Id,school_level.Name_or_Course,school_level.Status
FROM school_level;
                
                ");
      
				
   ?>
<div class="tablesize">
 <table style='border: solid 1px black;' >
  <tr style=color:black, text-align:right;>
 <th>School Level ID</th>
 <th>Level or Course</th>
 <th>Status</th>
 <th>Edit</th>
 <th>Deactivate</th>
 <th>Activate</th>
 </tr>
 <?php
while($row = mysqli_fetch_array($result)) {
$id = $row['Id'];

    echo "<tr style=color:black;>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['Id'] . "</td>";
    echo "<td style='width:150px;border:1px solid black;'>" . $row['Name_or_Course'] . "</td>";
    if ($row['Status'] == 0){
        echo "<td style='width:150px;border:1px solid black;'>Active</td>";

    }
    else{
    echo "<td style='width:150px;border:1px solid black;'>Inactive</td>";
    }
        
    
    
    
    
echo '<td><form method="post" action="checkschoollevel.php" enctype="multipart/form-data">

<button id="edit_btn" type="submit" class="btn" name="selectlevel" >Select</button>
</td>
<td>
<button type="submit" class="btn" name="deletelevel"">Deactivate</button>
</td>
<td>
<button type="submit" class="btn" name="restorelevel">Activate</button>
</td>
<td>
<input type="hidden" name="levelid" value="' . $id . '"/></td></form>';
 echo "</tr>";
}
?>
</table>
    </div>
</div>





</td>
<td valign="top">
<form action="checkschoollevel.php" method="post" enctype="multipart/form-data">
<h3 class="fontfortitle">Create</h3>



<table style="width: 10%">

<tr>
<td style=color:black>Level/Course:</td>
<td> <input maxlength="50" name="levelcourse" required="" type="text"
autocomplete="off"/></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>

    
    <!--<input type="hidden" name="levelid" value="<?php echo $_SESSION['levelid']?>"/>-->
<tr>
</table>
<p>
            <div class="buttons">
                <button class="button" name="createlevel"
                        type="submit"><i class="fa fa-pencil-square-o"></i>Create</button>
            </div>
    
    
<!--<input name="book" type="submit" value="Book" /> -->
</form>
</td>
<td valign="top">
<form action="checkschoollevel.php" method="post" enctype="multipart/form-data">
<h3 class="fontfortitle">Edit</h3>



<table style="width: 10%">

<tr>
<td style=color:black>Level/Course:</td>
<td> <input maxlength="50" name="levelcourse" required="" type="text"
autocomplete="off" value="<?php echo $_SESSION['levelcourse']?>" /></td>
<!-- <td>&nbsp;</td>
<td>&nbsp;</td> -->
</tr>

    
    <input type="hidden" name="levelid" value="<?php echo $_SESSION['levelid']?>"/>
<tr>
</table>
<p>
            <div class="buttons">
                <button class="button" name="editlevel"
                        type="submit"><i class="fa fa-pencil-square-o"></i>Edit Level</button>
            </div>
    
    
<!--<input name="book" type="submit" value="Book" /> -->
</form>
</td>
</tr>
</table>
    </div>

    </div>

</body>
</html>
