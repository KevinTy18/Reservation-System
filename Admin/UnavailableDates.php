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
include('header.php');
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
      
     $csv =  array_map('str_getcsv', file($_FILES['file']['tmp_name']));
     $records = [];
      unset($csv[0]);
      
      foreach ($csv as $record) {
          $record = array_map(function ($column) {
              return '"'.$column.'"';
          }, $record);
          
          $records[] = '('.implode(',', $record).')';
      }
      
    
      $query = "INSERT into tbl_student(School_Id,firstname,middlename,lastname,Department_Id,School_Level_Id,gender,username,email,password,user_type)
values ".implode(',', $records);
   
  $checker = mysqli_query($con, $query);
      if ($checker){
           echo "<script>alert('Import done!');</script>";
      }else{
          echo "<script>alert('Import error!');</script>";
      }
  }
 }
}  
?>
<br>

<div class="w3-container" >

<div class="animated fadeIn">
<table id="divcon" cellpadding="0" cellspacing="0" border="0"
width="400" align="center"  style="margin-top: 0%">
<tr>


<td valign="top">
<center>
<h3 class="fontfortitle">Import Student Database</h3>
<form method='POST' enctype='multipart/form-data' id="myform">
                        
        <input type="file" name="file" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
        <!--<label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>-->

            
        
            <table class="table">
                <tbody>
                <tr>
    <p>
    <button type="submit" name='submitstudentdb' class="">Import</button>
    </p>
</tr>
                </tbody>
                    </table>
  
                                        

                                </form>

                                            
</center>

</td>
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