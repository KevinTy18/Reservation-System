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
<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'cbfosystem');


if(isset($_POST["submitstudentdb"]))
{
	if($_FILES['file']['name'])
 		{
  			$filename = explode(".", $_FILES['file']['name']);
  
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");

   $rows   = array_map('str_getcsv', file($_FILES['file']['tmp_name']));
    $header = array_shift($rows);
    $csv    = array();
    $BatchInsert = array();
    $SQLInsert = array();
    foreach($rows as $row) {
        $csv[] = array_combine($header, $row);
    }

    foreach ($csv as $rows) {
    	$BatchInsert[]=implode("','",$rows);
    		 
    	    }
 	/*test_progress($BatchInsert);*/
    foreach ($BatchInsert as $value) {
    	$query = "INSERT into tbl_student(School_Id,
firstname,middlename,lastname,Department_Id,School_Level_Id,gender,username,email,password,user_type)
values('$value')";
mysqli_query($con, $query);
    }
    
   /*while($data = fgetcsv($handle))
   {
   	
   	
$item1 = mysqli_real_escape_string($con, $data[0]);
$item2 = mysqli_real_escape_string($con, $data[1]);
$item3 = mysqli_real_escape_string($con, $data[2]);
$item4 = mysqli_real_escape_string($con, $data[3]);
$item5 = mysqli_real_escape_string($con, $data[4]);
$item6 = mysqli_real_escape_string($con, $data[5]);
$item7 = mysqli_real_escape_string($con, $data[6]);
$item8 = mysqli_real_escape_string($con, $data[7]);
$item9 = mysqli_real_escape_string($con, $data[8]);
$item10 = mysqli_real_escape_string($con, $data[9]);
$item11 = mysqli_real_escape_string($con, $data[10]);

/*$query = "INSERT into tbl_students(School_Id,
firstname,middlename,lastname,Department_Id,School_Level_Id,gender,username,email,password,user_type)
values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11')";
mysqli_query($con, $query);
   }*/

   fclose($handle);
   echo header('location:../Admin/ManageStudentDatabase.php?ImportStudentsSuccess=0');
  }
 }
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
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
<style>
    
.containerer {
  display: flex;
}
.containerer > div {
  flex: 1; /*grow*/
}    
</style>
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
include('header.php');
include('../includes/navigation.php'); 
    
    if (isset($_GET['ImportStudentsSuccess']) == true) {
    ?>
    <script type="text/javascript">
    swal("Import Success!", "Importing student database complete!", "success");
    </script>
<?php
}
 if (isset($_GET['StudentDeleted']) == true) {
    ?>
    <script type="text/javascript">
    swal("Delete Success!", "Deleting student database complete!", "success");
    </script>
<?php
}
?>

<br>

<div class="w3-container" >
<div class="animated fadeIn">
<table id="divcon" cellpadding="0" cellspacing="0" border="0"
width="400" align="center">
<tr>
<div class="containerer">
<div style="background-color:rgba(255,255,255,0.8);text-align:center;max-width:500px;margin:0 auto;border-radius:20px">
<h3 class="fontfortitle">Import student database</h3>
<form action="ManageStudentDatabase.php" method="post" enctype='multipart/form-data'>
Import a CSV File to be placed
in the database.
<input type="file" name="file" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
        <!--<label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label> -->
<div>
<a href="download.php?file=studentdbsample.csv">Download sample csv file.</a>    
</div>
<div>
<a href="download.php?file=LRClegend.xlsx">Download LRC Legend for IDs.</a>    
</div>    

                <div class="buttons">
<!--<input name="cancel" type="submit" value="Cancel" /> -->
               <button type="submit" name='submitstudentdb' Value='Import' class="btn btn-outline-danger btn-lg btn-block1">Import</button>               

            
            </div>
</form>

    </div>
    <div style="background-color:rgba(255,255,255,0.8);text-align:center;max-width:500px;margin:0 auto;border-radius:20px">
    

<h3 class="fontfortitle">Delete students</h3>
<form action="ManageStudentDatabase.php" method="post">
    This deletes the all of the students stored in the database.
<p></p>
     <!--<div class="buttons">
               <button class="smallbutton1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Delete Students</button>  
            </div>-->
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Delete Students
</button>
</form>



    </div>
</div>
    

<!--<div style="background-color:rgba(255,255,255,0.8);text-align:center;max-width:500px;margin:0 auto;border-radius:20px">
    <center>
<form action="DeleteStudents.php" method="post">
<table>
<tr>  
<td>Delete students in the database</td>
</tr>           
</table>
                

             <div class="buttons">
               <button name="deletestudents" type="submit" class="smallbutton1">Delete Students</button>  
            </div>
</form> 
    </center>
    
    </div>-->

</tr>
</table>
    </div>

    

<form action="ManageStudentDatabase.php" method="post" enctype='multipart/form-data'>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete all the students in the database?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="deletestudents" type="submit" type="button" class="btn btn-primary">Yes, delete all students</button>
      </div>
    </div>
  </div>
</div>
    </form> 

   <!-- <div class="buttons" style="margin-left:80px">
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
    <button class="buttoncal" type="submit" style="float:left"><span><i class=" fa fa-table" style="font-size:24px;color:red;"></i>
Check Reports</span></button>
</form>

    </div>-->

    </div>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>