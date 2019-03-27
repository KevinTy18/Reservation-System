<?php
session_start();

    $_SESSION['venuename'] =  "";
    $_SESSION['department_id'] =  "";
    $_SESSION['capacity'] =  "";
    $_SESSION['mincapacity'] =  "";
    $_SESSION['venueimagee'] =  "";


    $_SESSION['levelcourse'] =  "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'cbfosystem');

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 
	$_SESSION['Department']  = " ";

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
    if (isset($_POST['AllDepartments'])) {
    	$_SESSION['Department'] = " ";
    }
     if (isset($_POST['IBED-GS'])) {
    	$_SESSION['Department'] = "AND Room_Department = 1";
    }
     if (isset($_POST['IBED-JHS'])) {
    	$_SESSION['Department'] = "AND Room_Department = 2";
    }
     if (isset($_POST['SHS'])) {
    	$_SESSION['Department'] = "AND Room_Department = 3";
    }
     if (isset($_POST['CAS'])) {
    	$_SESSION['Department'] = "AND Room_Department = 4";
    }
     if (isset($_POST['GSL'])) {
    	$_SESSION['Department'] = "AND Room_Department = 5";
    }
     if (isset($_POST['SOL'])) {
    	$_SESSION['Department'] = "AND Room_Department = 6";
    }
    if (isset($_POST['StudentDepartment'])) {
    	$_SESSION['Department'] = "AND Room_Department =" . $_SESSION['user']['Department_Id'];
    }
    if (isset($_POST['createlevel'])) {
		createlevel();
	}
    if (isset($_POST['editlevel'])) {
		updatelevel();
	}
    if (isset($_POST['selectlevel'])) {
		selectlevel();
	}
    if (isset($_POST['deletelevel'])) {
		deletelevel();
	}
    if (isset($_POST['restorelevel'])) {
		restorelevel();
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
$IfBookingExist = "SELECT * FROM $tablename  WHERE id = $id";
$AlreadyCalled = "SELECT * FROM $tablename  WHERE id = $id AND canceled = 1";
$CancellBooking = "UPDATE $tablename SET canceled = 1 WHERE id = $id";
$result = $conn->query($AlreadyCalled);
$affected_rows = $conn->affected_rows;
if (mysqli_affected_rows($conn) >= 1){
	// test_progress("Cancelled Failed");
	echo header('location:../Admin/checkbookings.php?BookingCancelledFailed=0');
}
$result = $conn->query($IfBookingExist);
if (mysqli_affected_rows($conn) < 1) {
 echo header('location:../Admin/checkbookings.php?BookingCancelledFailed=0');
 }
else{
	mysqli_query($conn, $CancellBooking);
	/*test_progress("Cancelled Success");*/
    echo header('location:../Admin/checkbookings.php?BookingCancelled=0');
            }
}

else {
echo "Error: " . $CancellBooking . "<br>" . mysqli_error($conn);
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
$date_reserved = intval(strtotime(htmlspecialchars(date("d-m-Y"))));
$starttime = explode(" ",$_POST["start_hour"]);
$start_time = (60*60*intval(htmlspecialchars($starttime[0]))) +
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
if (!preg_match("/^[a-zA-Z0-9 .\-]*$/",$organization)) {
array_push($errors, "Organization must contain only letters");
}
if (!preg_match("/^[a-zA-ZÀ-ž\- , . \s]+$/",$reservee)) {
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
VALUES ('$eventname','$organization','$reservee','$designation','$Id','$school_level','$phone','$RoomDepartment', '$item','$Materials',$date_reserved, $start_day,
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
        
        echo header('location:../Student/index.php?dateunavailable=0');
       
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
VALUES ('$eventname','$organization','$reservee','$designation','$Id','$school_level','$phone','$RoomDepartment', '$item','$Materials',$date_reserved, $start_day,
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
$capacity       = e($_POST['capacity']);
$mincapacity    = e($_POST['mincapacity']);
$image          = $_FILES['image']['name'];

        $target = "../sanbedapics/".basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

       }else{
  array_push ($errors,"Failed to upload image");
       }
    
        $conn = new mysqli($servername, $username, $password, $dbname);
if (empty($image)) {
	$sql = "INSERT INTO venues
(RoomName,Department_Id,RoomCapacity,RoomMinimumCapacity,VenueImage) VALUES
('$venuename',$department_id,'$capacity', '$mincapacity','UnavailablePicture.png')";
}
else {
	$sql = "INSERT INTO venues
(RoomName,Department_Id,RoomCapacity,RoomMinimumCapacity,VenueImage) VALUES
('$venuename',$department_id,'$capacity', '$mincapacity','$image')";
}
        
    
if ($conn->query($sql) === TRUE) {
    echo header('location:../Admin/addvenue.php?RoomAdded=0');
} else {
    echo "Error adding record: " . $conn->error;
}

}

function updatevenue (){
        $id            =  e($_POST['venueid']);
        $department_id =  e($_POST['department']);
        $venuename     =  e($_POST['venuename']);
		$capacity      =  e($_POST['capacity']);
		$mincapacity   =  e($_POST['mincapacity']);
        $image         =  $_FILES['venueimage']['name'];

	/* test_progress($image);*/
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

if (empty($image)) {
    $sql = "UPDATE venues SET RoomName = '$venuename',Department_Id = '$department_id',RoomCapacity = '$capacity',RoomMinimumCapacity= '$mincapacity'   WHERE RoomID = $id"; 
}
    else {
        $sql = "UPDATE venues SET RoomName = '$venuename',Department_Id = '$department_id',RoomCapacity = '$capacity',RoomMinimumCapacity= '$mincapacity', VenueImage = '$image'   WHERE RoomID = $id"; 
    }
	
	if ($conn->query($sql) === TRUE) {
    echo header('location:../Admin/checkrooms.php?roomupdated=0');
    
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
     
   
    /*echo header('location:../Admin/checkrooms.php?');*/
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
function createlevel(){
    global $db, $errors;
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";

$levelcourse      = e($_POST['levelcourse']);


    
$conn = new mysqli($servername, $username, $password, $dbname);

	$sql = "INSERT INTO school_level (Name_or_Course) VALUES
('$levelcourse')";


        
    
if ($conn->query($sql) === TRUE) {
    echo header('location:../Admin/checkschoollevel.php?levelAdded=0');
} else {
    echo "Error adding record: " . $conn->error;
}

}
function selectlevel() {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";


$id = e($_POST['levelid']);

	$con=mysqli_connect($servername,$username,$password,$dbname);
	$result = mysqli_query($con,"SELECT Id,Name_or_Course FROM school_level WHERE Id = $id"); 
	$row = mysqli_fetch_array($result);
	
	$_SESSION['levelid'] =  $id;
    $_SESSION['levelcourse'] =  $row['Name_or_Course'];
    
     
   
    /*echo header('location:../Admin/checkrooms.php?');*/
}
function updatelevel (){
        $id            =  e($_POST['levelid']);
        $levelcourse =  e($_POST['levelcourse']);
        

	/* test_progress($image);*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";


$id = e($_POST['levelid']);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


    $sql = "UPDATE school_level SET Name_or_Course = '$levelcourse'  WHERE Id = $id"; 

    
	
	if ($conn->query($sql) === TRUE) {
    echo header('location:../Admin/checkschoollevel.php?levelupdate=0');
    
    $_SESSION['levelcourse'] =  "";
   
	 
}
 else {
    echo "Error updating venue: " . $conn->error;
}
}
function deletelevel(){

$id = e($_POST['levelid']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


	$sql = "UPDATE  school_level SET Status = 1 WHERE Id = '$id'";

if ($conn->query($sql) === TRUE) {
    /*?>
    <script>
         alert("Venue deactivated successfully")
    </script>
<?php*/
    echo header('location:../Admin/checkschoollevel.php?leveldeactivated=0');
} else {
    echo "Error deleting venue: " . $conn->error;
}
}
function restorelevel(){

$id = e($_POST['levelid']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


	$sql = "UPDATE  school_level SET Status = 0 WHERE Id = '$id'";

if ($conn->query($sql) === TRUE) {
   /* ?>
    <script>
         alert("Venue activated successfully")
    </script>
<?php*/
    echo header('location:../Admin/checkschoollevel.php?levelactivated=0');
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
    echo header('location:../Admin/ManageStudentDatabase.php?StudentDeleted=0');
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

/* draws a calendar */
function draw_calendar($month,$year){

	include 'config.php';

	// Create connection
	$conn = mysqli_connect($servername, $username, $password,  $dbname);

	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
	
	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">
        <div style="max-width:200px;max-height:400px;overflow-y:scroll;overflow-x:hidden;">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			$current_epoch = mktime(0,0,0,$month,$list_day,$year);
			$Cancelled_Date_Epoch = intval(strtotime(htmlspecialchars($current_epoch)));
			
			$sql = "SELECT * FROM $tablename WHERE $current_epoch BETWEEN start_day AND end_day AND canceled = 0 {$_SESSION['Department']} ORDER BY room ASC,TimeBeginDenum ASC, start_time ASC";
			$CancelledDates = "SELECT * FROM unavailable_dates WHERE date = $current_epoch";

			$result = mysqli_query($conn, $sql);
    		$result_of_Cancelled_Dates = mysqli_query($conn, $CancelledDates);
    		//test_progress($result_of_Cancelled_Dates);
    		if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {


    				if (mysqli_num_rows($result_of_Cancelled_Dates) > 0) {
					while($row = mysqli_fetch_assoc($result_of_Cancelled_Dates)) {
					$calendar .= "<div style=background-color:black;>";
					$calendar .= "<font color=white><b>";
					$calendar .= "Closed" . "<br>";
					$calendar .= "Reason: " . $row["reason"];
					$calendar .= "</div>";
					}
				}
					else { 
					if($row["canceled"] == 1) $calendar .= "<font color=\"grey\"><s>";
    				$calendar .= "<b>" . "Room: ". $row["room"] . "</b><br>";
    				if($current_epoch == $row["start_day"] AND $current_epoch != $row["end_day"]) {
    					$calendar .= "<b>". "Booking starts: " . sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60)) . "<br><hr><br></b>";
    				}
    				if($current_epoch == $row["start_day"] AND $current_epoch == $row["end_day"]) {
    					$calendar .= "<b>" . "Booking start: " . sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60)) . " " . $row["TimeBeginDenum"] ."<br></b>";
    				}
    				if($current_epoch == $row["end_day"]) {
              if($row["end_time"]/60/60 > 12){
                $TimeEnd = $row["end_time"]/60/60 - 12;
                 $calendar .= "<b>" . "Booking end: " . sprintf("%02d:%02d", $TimeEnd, ($row["end_time"]%(60*60)/60)) . " " . "Pm" ."<br></b>" .
					'
                    <center>
                    <div class="dropdown">
 					<button class="dropbtn">Information</button>
  					<div class="dropdown-content">
  					<p>' . "Reservation ID: " . $row['id']  . '</p>
  					<p>' . "School ID: " . $row['designation_id']  . '</p>
  					<p>' . "Name: " . $row['reservee_name']  . '</p>
  					<p>' . "Organization: " . $row['organization']  . '</p>
  					<p>' . "Purpose: " . $row['eventname']  . '</p>
  					<p>' . "School Level/Course: " . $row['School_Level_or_Course']  . '</p>
  					</div>
					</div>
                    </center>'
					. "<hr><br>";
              }
    				else {
    					if ($row["end_time"] / 60 / 60 == 12) {
    						$calendar .= "<b>". "Booking end: " . sprintf("%02d:%02d", $row["end_time"]/60/60, ($row["end_time"]%(60*60)/60)) . " nn"  ."<br></b>"  .
					'
                  <center>
                    <div class="dropdown">
 					<button class="dropbtn">Information</button>
  					<div class="dropdown-content">
  					<p>' . "<b>Reservation ID: </b>" . $row['id']  . '</p>
  					<p>' . "<b>School ID: </b>" . $row['designation_id']  . '</p>
  					<p>' . "<b>Name: </b>" . $row['reservee_name']  . '</p>
  					<p>' . "<b>Organization: </b>" . $row['organization']  . '</p>
  					<p>' . "<b>Purpose: </b>" . $row['eventname']  . '</p>
  					<p>' . "<b>School Level/Course: </b>" . $row['School_Level_or_Course']  . '</p>
  					</div>
					</div>
                    </center>'
					. "<hr><br>";
    					}
    					else {
    						$calendar .= "<b>". "Booking end: " . sprintf("%02d:%02d", $row["end_time"]/60/60, ($row["end_time"]%(60*60)/60)) . " " . $row["TimeBeginDenum"] ."<br></b>"  .
					'
                  <center>
                    <div class="dropdown">
 					<button class="dropbtn">Information</button>
  					<div class="dropdown-content">
  					<p>' . "<b>Reservation ID: </b>" . $row['id']  . '</p>
  					<p>' . "<b>School ID: </b>" . $row['designation_id']  . '</p>
  					<p>' . "<b>Name: </b>" . $row['reservee_name']  . '</p>
  					<p>' . "<b>Organization: </b>" . $row['organization']  . '</p>
  					<p>' . "<b>Purpose: </b>" . $row['eventname']  . '</p>
  					<p>' . "<b>School Level/Course: </b>" . $row['School_Level_or_Course']  . '</p>
  					</div>
					</div>
                    </center>'
					. "<hr><br>";
    					}
              
            }

    				}
    				if($current_epoch != $row["start_day"] AND $current_epoch != $row["end_day"]) {
	    				$calendar .= "Booking: 24h<br><hr><br>";
	    			}
					if($row["canceled"] == 1) $calendar .= "</s></font>";
    			}
			} 
		}
		if (mysqli_num_rows($result_of_Cancelled_Dates) > 0) {
					while($row = mysqli_fetch_assoc($result_of_Cancelled_Dates)) {
					$calendar .= "<div style=background-color:black>";
					$calendar .= "<font color=white><b>";
					$calendar .= "Closed" . "<br>";
					$calendar .= "Reason: " . $row["reason"];
					$calendar .= "</div>";
					}
				}
			else {
    			$calendar .= "OPEN";
			}
			
		$calendar.= '</div></td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	mysqli_close($conn);
	
	/* all done, return result */
	return $calendar;
}
?>