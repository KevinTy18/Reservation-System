<?php
session_start();

    $_SESSION['venuename'] =  "";
    $_SESSION['department_id'] =  "";
    $_SESSION['capacity'] =  "";
    $_SESSION['mincapacity'] =  "";
    $_SESSION['venueimagee'] =  "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'cbfosystem');

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['adminlogin_btn'])) {
		adminlogin();
	}
	if (isset($_POST['userlogin_btn'])) {
		userlogin();
	}
    if (isset($_POST['book'])) {
		book();
	} 
    if (isset($_POST['cancel'])) {
		cancel();
	}
    if (isset($_POST['createvenue'])) {
		createvenue();
	}
    if (isset($_POST['editvenue'])) {
		updatevenue();
	}
    if (isset($_POST['selectvenue'])) {
		selectvenue();
	}
    if (isset($_POST['deletevenue'])) {
		deletevenue();
	}
	if (isset($_POST['deletestudents'])) {
		deletestudents();
	}
    if (isset($_POST['restorevenue'])) {
		restorevenue();
	}
	if (isset($_POST['unavailable_day'])) {
		AddUnavailableDate();
	}
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header("location: ../login.php");
    }


// LOGIN USER
function adminlogin(){
global $db, $username, $errors;

// grap form values
$username = e($_POST['username']);
$password = e($_POST['password']);

// make sure form is filled properly
if (empty($username)) {
array_push($errors, "Username is required");
}
if (empty($password)) {
array_push($errors, "Password is required");
}

// attempt login if no errors on form
if (count($errors) == 0) {

$query = "SELECT * FROM tbl_student WHERE username='$username' AND
password='$password' AND deleted_at IS NULL LIMIT 1";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) == 1) { // user found
// check if user is admin or user
$logged_in_user = mysqli_fetch_assoc($results);
if ($logged_in_user['user_type'] == 'admin') {

$_SESSION['user'] = $logged_in_user;
$_SESSION['success']  = "You are now logged in";
                  //  $_SESSION['image'] = $logged_in_user['image'];
header('location: Admin/index.php');
}
}else {
array_push($errors, "Wrong username/password combination");
}
}
}
function userlogin(){
global $db, $username, $errors;

// grap form values
$username = e($_POST['username']);
$password = e($_POST['password']);

// make sure form is filled properly
if (empty($username)) {
array_push($errors, "Username is required");
}
if (empty($password)) {
array_push($errors, "Password is required");
}

// attempt login if no errors on form
if (count($errors) == 0) {

$query = "SELECT * FROM tbl_student WHERE username='$username' AND
password='$password'AND deleted_at IS NULL LIMIT 1";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) == 1) { // user found

$logged_in_user = mysqli_fetch_assoc($results);
if ($logged_in_user['user_type'] == 'student') {

$_SESSION['user'] = $logged_in_user;
$_SESSION['success']  = "You are now logged in";
                
header('location: Student/index.php');
}
else if ($logged_in_user['user_type'] == 'employee') {

$_SESSION['user'] = $logged_in_user;
$_SESSION['success']  = "You are now logged in";
                  
header('location: Employee/index.php');
}
}else {
header('location: userlogin.php?error=1');
}
}
}

function isLoggedIn()
{
if (isset($_SESSION['user'])) {
return true;
}else{
return false;
}
}

function isAdmin()
{
if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
return true;
}else{
return false;
}
}
function isStudent()
{
if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'student' ) {
return true;
}else{
return false;
}
}
function isEmployee()
{
if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'employee' ) {
return true;
}else{
return false;
}
}
function isSuperAdmin()
{
if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] ==
'superadmin' ) {
return true;
}else{
return false;
}
}

// escape string
function e($val){
global $db;
return mysqli_real_escape_string($db, trim($val));
}


if (isset($_POST['cancel'])) {
   cancel();
    }


function cancel(){
global $error;
    if(empty($errors))
{
include 'config.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password,  $dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$id = intval(htmlspecialchars($_POST["id"]));
        $sql = "SELECT * FROM $tablename  WHERE id = $id";
$sql1 = "UPDATE $tablename SET canceled = 1 WHERE id = $id";
$result = $conn->query($sql1);
$affected_rows = $conn->affected_rows;
if (mysqli_query($conn, $sql)) {

if ($affected_rows > 0){
?>
        <script>
            alert("Booking cancelled.")
        </script>
        <?php
}
else{
        ?>
<script>
            alert("Booking Does Not Exist/Already have been Canceled.")
        </script>
        <?php
            }
}
}
else {
echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}

function book(){
	global $errors;
    include 'config.php';
// Create connection
$conn = mysqli_connect($servername, $username, $password,  $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

$start_day = intval(strtotime(htmlspecialchars($_POST["start_day"])));
$date_reserved = intval(strtotime(htmlspecialchars(date("d/m/Y"))));
$start_time = (60*60*intval(htmlspecialchars($_POST["start_hour"]))) +
(60*intval(htmlspecialchars($_POST["start_minute"])));
$end_day = intval(strtotime(htmlspecialchars($_POST["start_day"])));
$end_time = $start_time + (intval(htmlspecialchars($_POST["Duration"])));
$eventname = htmlspecialchars($_POST["eventname"]);
$organization = htmlspecialchars($_POST["organization"]);
$school_level = htmlspecialchars($_POST["School_Level"]);
$reservee = htmlspecialchars($_POST["reservee"]);
$capacity = intval(($_POST["atendee"]));
$phone = htmlspecialchars($_POST["phone"]);
$Id = htmlspecialchars($_POST["designation_id"]);
$RoomDepartment = htmlspecialchars($_POST["RoomDepartment"]);
$item = htmlspecialchars($_POST["Roomname"]);
$Materials = htmlspecialchars(join(", ",$_POST['material_list']));
$designation = htmlspecialchars($_POST["designation"]);
$starttime = explode(" ",$_POST["start_hour"]);
$endtime = $end_time;
$start_epoch = $start_day + $start_time;
$end_epoch = $end_day + $end_time;


if (empty($start_day)) {
array_push($errors, "Starting Day is required");
}
if (empty($start_time)) {
array_push($errors, "Starting Time is required");
}
if (empty($end_day)) {
array_push($errors, "End day of event is required");
}
if (empty($end_time)) {
array_push($errors, "End Time is required");
}
if (!is_numeric($capacity)) {
array_push($errors, "Capacity must be numeric");
}
if (!preg_match("/^[a-zA-Z .\-]*$/",$organization)) {
array_push($errors, "Organization must contain only letters");
}
if (!preg_match("/^[a-zA-Z\s]+$/",$reservee)) {
array_push($errors, "Name must be Valid");
}
if (!preg_match("/^[a-z0-9 .\-]+$/i",$Id)) {
array_push($errors, "ID must contain be Valid");
}
if (!is_numeric($phone)) {
array_push($errors, "Please Enter  a valid Phone Number");
}
    ?>
<?php
    if (count($errors) > 0 ){ ?>
	<?php echo join(', ', $errors); ?>
   <script> alert()</script>
<?php
} ?>
<?php 

// prevent double booking
$sql = "SELECT * FROM `bookingcalendar` WHERE room ='$item' AND
(start_day>=$start_day OR end_day >=$start_day) AND canceled=0";
$sql1 = "SELECT * FROM `venues` where RoomName = '$item'";
$sql2 = "SELECT * FROM unavailable_dates WHERE date='$start_day'";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
/*echo '<pre>';
    die(var_dump($item));
    echo '</pre>';*/
$result2 = mysqli_query($conn, $sql2);
if ($_SESSION['user']['user_type']  == "admin") {

  if(count($errors) == 0){
    if (mysqli_num_rows($result2) > 0) {
        
        echo header('location:../Admin/index.php?dateunavailable=0');
       
        goto end;
    }
/*echo '<pre>';
    die(var_dump($result));
    echo '</pre>';*/
   if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
    
    for ($i = $start_epoch; $i <= $end_epoch; $i=$i+600) {
       
    if ($i>($row["start_day"]+$row["start_time"]) &&
    $i<($row["end_day"]+$row["end_time"])) {
        echo header('location:../Admin/index.php?hasbooked=0');
 
goto end;
}
}
}
}
/*$sql1 = "SELECT * FROM $tablevenue WHERE RoomID='$item'";*/
/**/
/*$Roomsql = "SELECT * FROM $tablevenue WHERE room = '$item'";
$Roomresult = mysqli_query($conn, $Roomsql);
$RoomName = "";
if (mysqli_num_rows($Roomresult) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($Roomresult)) {
       $RoomName = $row['room'];
     
     
    }
} else {
  
    echo "0 results";
}*/

$sql = "INSERT INTO $tablename (eventname, organization,reservee_name,reservee_type,designation_id,School_Level_or_Course,phone, Room_Department,room,Materials,date_reserved,
start_day, start_time, end_day, TimeBeginDenum ,
TimeEndDenum,end_time, canceled, Capacity)
VALUES ('$eventname','$organization','$reservee','$designation',$Id,'$school_level','$phone','$RoomDepartment', '$item','$Materials',$date_reserved, $start_day,
$start_time, $end_day, '$starttime[1]' ,'$endtime[1]',$end_time,0,'$capacity')";

/*
echo '<pre>';
    die(var_dump($item));
    echo '</pre>';*/  
    
if (mysqli_num_rows($result1) > 0 ){
  
$row1 = mysqli_fetch_assoc($result1);
if ($row1["RoomCapacity"] == $capacity || $row1["RoomCapacity"] >=
$capacity && $capacity >= $row1["RoomMinimumCapacity"]){
if (mysqli_query($conn, $sql)) {

    /*if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
   echo header('location:../Admin/index.php?success=0');
}*/
echo header('location:../Admin/index.php?success=0');
    
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else if ($capacity < $row1["RoomMinimumCapacity"]){
    
 echo header('location:../Admin/index.php?toolow=0');
    
}
else if ($capacity > $row1["RoomCapacity"]) {
    
    echo header('location:../Admin/index.php?overload=0');
 
}
}


}

}


if ($_SESSION['user']['user_type']  == "student") {

  if(count($errors) == 0){
    if (mysqli_num_rows($result2) > 0) {
        
        echo header('location:../Student/index.php?datetilable=0');
       
        goto end;
    }
/*echo '<pre>';
    die(var_dump($result));
    echo '</pre>';*/
   if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
    
    for ($i = $start_epoch ; $i <= $end_epoch; $i=$i+600) {
       /*echo '<pre>';
    die(var_dump($end_epoch));
    echo '</pre>';*/
    if ($i>($row["start_day"]+$row["start_time"]) && $i<($row["end_day"]+$row["end_time"])) {

        echo header('location:../Student/index.php?hasbooked=0');
 
goto end;
}
}
}
}
/*$sql1 = "SELECT * FROM $tablevenue WHERE RoomID='$item'";*/
/**/
/*$Roomsql = "SELECT * FROM $tablevenue WHERE room = '$item'";
$Roomresult = mysqli_query($conn, $Roomsql);
$RoomName = "";
if (mysqli_num_rows($Roomresult) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($Roomresult)) {
       $RoomName = $row['room'];
     
     
    }
} else {
  
    echo "0 results";
}*/

$sql = "INSERT INTO $tablename (eventname, organization,reservee_name,reservee_type,designation_id,School_Level_or_Course,phone, Room_Department,room,Materials,date_reserved,
start_day, start_time, end_day, TimeBeginDenum ,
TimeEndDenum,end_time, canceled, Capacity)
VALUES ('$eventname','$organization','$reservee','$designation',$Id,'$school_level','$phone','$RoomDepartment', '$item','$Materials',$date_reserved, $start_day,
$start_time, $end_day, '$starttime[1]' ,'$endtime[1]',$end_time,0,'$capacity')";

/*
echo '<pre>';
    die(var_dump($item));
    echo '</pre>';*/  
    
if (mysqli_num_rows($result1) > 0 ){
  
$row1 = mysqli_fetch_assoc($result1);
if ($row1["RoomCapacity"] == $capacity || $row1["RoomCapacity"] >=
$capacity && $capacity >= $row1["RoomMinimumCapacity"]){
if (mysqli_query($conn, $sql)) {

    /*if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
   echo header('location:../Admin/index.php?success=0');
}*/
echo header('location:../Student/index.php?success=0');
    
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else if ($capacity < $row1["RoomMinimumCapacity"]){
    
 echo header('location:../Student/index.php?toolow=0');
    
}
else if ($capacity > $row1["RoomCapacity"]) {
    
    echo header('location:../Student/index.php?overload=0');
 
}
}
}
    
}

if ($_SESSION['user']['user_type']  == "employee") {

  if(count($errors) == 0){
    if (mysqli_num_rows($result2) > 0) {
        
        echo header('location:../Employee/index.php?dateunavailable=0');
       
        goto end;
    }
/*echo '<pre>';
    die(var_dump($result));
    echo '</pre>';*/
   if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
    
    for ($i = $start_epoch; $i <= $end_epoch; $i=$i+600) {
       
    if ($i>($row["start_day"]+$row["start_time"]) &&
    $i<($row["end_day"]+$row["end_time"])) {
        echo header('location:../Employee/index.php?hasbooked=0');
 
goto end;
}
}
}
}
/*$sql1 = "SELECT * FROM $tablevenue WHERE RoomID='$item'";*/
/**/
/*$Roomsql = "SELECT * FROM $tablevenue WHERE room = '$item'";
$Roomresult = mysqli_query($conn, $Roomsql);
$RoomName = "";
if (mysqli_num_rows($Roomresult) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($Roomresult)) {
       $RoomName = $row['room'];
     
     
    }
} else {
  
    echo "0 results";
}*/

$sql = "INSERT INTO $tablename (eventname, organization,reservee_name,reservee_type,designation_id,School_Level_or_Course,phone, Room_Department,room,Materials,date_reserved,
start_day, start_time, end_day, TimeBeginDenum ,
TimeEndDenum,end_time, canceled, Capacity)
VALUES ('$eventname','$organization','$reservee','$designation',$Id,'$school_level','$phone','$RoomDepartment', '$item','$Materials',$date_reserved, $start_day,
$start_time, $end_day, '$starttime[1]' ,'$endtime[1]',$end_time,0,'$capacity')";

/*
echo '<pre>';
    die(var_dump($item));
    echo '</pre>';*/  
    
if (mysqli_num_rows($result1) > 0 ){
  
$row1 = mysqli_fetch_assoc($result1);
if ($row1["RoomCapacity"] == $capacity || $row1["RoomCapacity"] >=
$capacity && $capacity >= $row1["RoomMinimumCapacity"]){
if (mysqli_query($conn, $sql)) {

    /*if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
   echo header('location:../Admin/index.php?success=0');
}*/
echo header('location:../Employee/index.php?success=0');
    
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else if ($capacity < $row1["RoomMinimumCapacity"]){
    
 echo header('location:../Employee/index.php?toolow=0');
    
}
else if ($capacity > $row1["RoomCapacity"]) {
    
    echo header('location:../Employee/index.php?overload=0');
 
}
}

end:
mysqli_close($conn);
}
    
}

}

function display_error() {
global $errors;

if (count($errors) > 0){

foreach ($errors as $error){
echo $errors .'<br>';
}

}
}
function test_progress($date) {
   echo '<pre>';
        die(var_dump($date));
        echo '</pre>';
}
function createvenue(){
    global $db, $errors;
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";

$venuename      = e($_POST['roomname']);
$department_id  = e($_POST['deparment']);
/*echo '<pre>';
    die(var_dump($_POST['deparment']));
    echo '</pre>';*/
$capacity       = e($_POST['capacity']);
$mincapacity    = e($_POST['mincapacity']);
$image          = $_FILES['image']['name'];

        $target = "../sanbedapics/".basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

       }else{
  array_push ($errors,"Failed to upload image");
       }
    
        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "INSERT INTO venues
(RoomName,Department_Id,RoomCapacity,RoomMinimumCapacity,VenueImage) VALUES
('$venuename',$department_id,'$capacity', '$mincapacity','$image')";
    
if ($conn->query($sql) === TRUE) {
    ?>
    <script>
         alert("Room added successfully")
    </script>
<?php
} else {
    echo "Error adding record: " . $conn->error;
}

}

function updatevenue (){
        $id            =  e($_POST['venueid']);
        $department_id =  e($_POST['department_id']);
        $venuename     =  e($_POST['name']);
		$capacity      =  e($_POST['capacity']);
		$mincapacity   =  e($_POST['mincapacity']);
        $image         =  $_FILES['venueimage']['name'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";


$id = e($_POST['venueid']);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


	$sql = "UPDATE venues SET RoomName = '$venuename',Department_Id = '$department_id',RoomCapacity = '$capacity',RoomMinimumCapacity= '$mincapacity', VenueImage = '$image'   WHERE RoomID = $id"; 
	
	if ($conn->query($sql) === TRUE) {
    ?>
    <script>
         alert("Room updated successfully")
    </script>
<?php
    
    $_SESSION['venuename'] =  "";
    $_SESSION['department_id'] =  "";
    $_SESSION['capacity'] =  "";
    $_SESSION['mincapacity'] =  "";
    $_SESSION['venueimagee'] =  "";
	 
}
 else {
    echo "Error updating venue: " . $conn->error;
}
}
function selectvenue() {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";


$id = e($_POST['venueid']);

	$con=mysqli_connect($servername,$username,$password,$dbname);
	$result = mysqli_query($con,"SELECT RoomId,RoomName,Department_Id,RoomCapacity,RoomMinimumCapacity,VenueImage FROM venues WHERE RoomId = $id"); 
	$row = mysqli_fetch_array($result);
	
	$_SESSION['venueid'] =  $id;
    $_SESSION['venuename'] =  $row['RoomName'];
    $_SESSION['department_id'] =  $row['Department_Id'];
    $_SESSION['capacity'] =  $row['RoomCapacity'];
    $_SESSION['mincapacity'] =  $row['RoomMinimumCapacity'];
    $_SESSION['venueimagee'] =  $row['VenueImage'];
    
}

function deletevenue(){

$id = e($_POST['venueid']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


	$sql = "UPDATE  venues SET Availability = 'Unavailable' WHERE RoomID = '$id'";

if ($conn->query($sql) === TRUE) {
    /*?>
    <script>
         alert("Venue deactivated successfully")
    </script>
<?php*/
    echo header('location:../Admin/checkrooms.php?venuedeactivated=0');
} else {
    echo "Error deleting venue: " . $conn->error;
}
}
function restorevenue(){

$id = e($_POST['venueid']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


	$sql = "UPDATE  venues SET Availability = 'Available' WHERE RoomID = '$id'";

if ($conn->query($sql) === TRUE) {
   /* ?>
    <script>
         alert("Venue activated successfully")
    </script>
<?php*/
    echo header('location:../Admin/checkrooms.php?venueactivated=0');
} else {
    echo "Error restoring venue: " . $conn->error;
}
}

function getRevenues() {
	
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";
$conn = mysqli_connect($servername, $username, $password, $dbname);
	$query = 'SELECT * FROM `venues` where Availability = "Available"';
	$sql = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_assoc($sql)) {
		$revenue_pictures[] = $row;
	}
	
	return $revenue_pictures;
}
/*function CheckUnavailableDates($result_of_Cancelled_Dates,$calendar){
					
					while($row = mysqli_fetch_assoc($result_of_Cancelled_Dates)) {
					$calendar .= "<div style=background-color:black>";
					$calendar .= "<font color=white><b>";
					$calendar .= "Closed" . "<br>";
					$calendar .= "Reason: " . $row["reason"];
					$calendar .= "</div>";
				
					}
				
				
}*/
function deletestudents(){

$id = e($_POST['venueid']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


	$sql = "UPDATE  tbl_student SET deleted_at = NOW() WHERE user_type = 'student'";

if ($conn->query($sql) === TRUE) {
    /*?>
    <script>
         alert("Venue deactivated successfully")
    </script>
<?php*/
    echo header('location:../Admin/DeleteStudents.php?StudentDeleted=0');
} else {
    echo "Error deleting students: " . $conn->error;
}
}
function AddUnavailableDate(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$unavailable_day = intval(strtotime(htmlspecialchars($_POST["unavailable_day"])));
$reason = $_POST["Reason"];

$DateCancelled = "SELECT date FROM unavailable_dates where date = $unavailable_day";
$DateCancelledResult = $conn->query($DateCancelled);

if ($DateCancelledResult->num_rows <= 0) {
    // output data of each row
    $sql = "INSERT INTO unavailable_dates (date, reason)
VALUES ($unavailable_day,'$reason')";

if ($conn->query($sql) === TRUE) {
    echo header('location:../Admin/checkbookings.php?SetUnavailableDate=0');
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    }
 else {
   echo header('location:../Admin/checkbookings.php?SetUnavailableDateError=0');
}


$conn->close();
}
?>