<?php
session_start();

    $_SESSION['venuename'] =  "";
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
if (isset($_POST['restorevenue'])) {
		restorevenue();
	}
if (isset($_GET['logout'])) {
session_destroy();
unset($_SESSION['user']);
header("location: ../login.php");
}
/*
// REGISTER USER
function register(){
global $db, $errors;

// receive all input values from the form
$username    =  e($_POST['username']);
$email       =  e($_POST['email']);
$password_1  =  e($_POST['password_1']);
$password_2  =  e($_POST['password_2']);

        $image =  $_FILES['image']['name'];

        //folder of uploaded pictures
        $target = "../photo/".basename($image);

  //      $sql = "INSERT INTO users1 (image) VALUES ('$image')";
  // execute query
  // mysqli_query($db, $sql);

// form validation: ensure that the form is correctly filled
if (empty($username)) {
array_push($errors, "Username is required");
}
if (empty($email)) {
array_push($errors, "Email is required");
}
if (empty($password_1)) {
array_push($errors, "Password is required");
}
if ($password_1 != $password_2) {
array_push($errors, "The two passwords do not match");
}

        //photo checking if image

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

  }else{
  array_push ($errors,"Failed to upload image");
  }

// register user if there are no errors in the form
if (count($errors) == 0) {
$password = md5($password_1);//encrypt the password before saving in
the database

if (isset($_POST['user_type'])) {
$user_type = e($_POST['user_type']);
$query = "INSERT INTO tbl_student (username, email, user_type, password)
  VALUES('$username', '$email', '$user_type', '$password','$image')";
mysqli_query($db, $query);
$_SESSION['success']  = "New user successfully created!!";
header('location: home.php');
}
            else{
$query = "INSERT INTO tbl_student (username, email, user_type, password)
  VALUES('$username', '$email', 'user', '$password','$image')";
mysqli_query($db, $query);

// get id of the created user
$logged_in_user_id = mysqli_insert_id($db);

                $sql = "SELECT * FROM tbl_student WHERE id = " .
$logged_in_user_id;
    $result = mysqli_query($db, $sql);

                $logged_in_user = mysqli_fetch_assoc($result);

$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in
user in session
$_SESSION['success']  = "You are now logged in";
                $_SESSION['image']  = $logged_in_user['image'];
header('location: index.php');
}

}

}

// return user array from their id
function getUserById($id){
global $db;
$query = "SELECT * FROM tbl_student WHERE id=" . $id;
$result = mysqli_query($db, $query);

$user = mysqli_fetch_assoc($result);
return $user;
}
*/
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
password='$password' LIMIT 1";
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
password='$password' LIMIT 1";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) == 1) { // user found
// check if user is admin or user
$logged_in_user = mysqli_fetch_assoc($results);
if ($logged_in_user['user_type'] == 'user') {

$_SESSION['user'] = $logged_in_user;
$_SESSION['success']  = "You are now logged in";
                  //  $_SESSION['image'] = $logged_in_user['image'];
header('location: User/checkbookingsUsers.php');
}
}else {
array_push($errors, "Wrong username/password combination");
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
function isUser()
{
if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user' ) {
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
$end_day = intval(strtotime(htmlspecialchars($_POST["end_day"])));
$end_time = (60*60*intval(htmlspecialchars($_POST["end_hour"]))) +
(60*intval(htmlspecialchars($_POST["end_minute"])));
        $eventname = htmlspecialchars($_POST["eventname"]);
$organization = htmlspecialchars($_POST["organization"]);
$reservee = htmlspecialchars($_POST["reservee"]);
$capacity = intval(($_POST["atendee"]));
$phone = htmlspecialchars($_POST["phone"]);
$Id = htmlspecialchars($_POST["designation_id"]);
$item = htmlspecialchars($_POST["item"]);
$designation = htmlspecialchars($_POST["designation"]);
$starttime = explode(" ",$_POST["start_hour"]);
$endtime = explode(" ",$_POST["end_hour"]);
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
if (!preg_match("/^[a-zA-Z ]*$/",$organization)) {
array_push($errors, "Organization must contain only letters");
}
if (!preg_match("/^[a-zA-Z ]*$/",$reservee)) {
array_push($errors, "Organization must contain only letters");
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
	
   <script> alert("Please Make Sure that the following are being followed \n*Organization must be Valid (No Numeric in name)\n*Contact Number must be Numercial")</script>
<?php
} ?>
<?php 

// prevent double booking
$sql = "SELECT * FROM $tablename WHERE item='$item' AND
(start_day>=$start_day OR end_day>=$start_day) AND canceled=0";
$sql1 = "SELECT * FROM $tablevenue WHERE RoomName='$item'";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
if(count($errors) == 0){
if (mysqli_num_rows($result) > 0) {
// handle every row
while($row = mysqli_fetch_assoc($result)) {
// check overlapping at 10 minutes interval
for ($i = $start_epoch; $i <= $end_epoch; $i=$i+600) {
if ($i>($row["start_day"]+$row["start_time"]) &&
$i<($row["end_day"]+$row["end_time"])) {
    ?>

<script>
alert("Unfortunately has already been booked for the time requested.")
</script>
<?php
goto end;
}
}
}
}
$sql = "INSERT INTO $tablename (eventname, organization,reservee_name,reservee_type,designation_id, phone, item,date_reserved,
start_day, start_time, end_day, TimeBeginDenum ,
TimeEndDenum,end_time, canceled, Capacity)
VALUES ('$eventname','$organization','$reservee','$designation',$Id,'$phone', '$item',$date_reserved, $start_day,
$start_time, $end_day, '$starttime[1]' ,'$endtime[1]',$end_time,0,'$capacity')";

if (mysqli_num_rows($result1) > 0 ){
$row1 = mysqli_fetch_assoc($result1);
if ($row1["RoomCapacity"] == $capacity || $row1["RoomCapacity"] >=
$capacity && $capacity >= $row1["RoomMinimumCapacity"]){
if (mysqli_query($conn, $sql)) {
    ?>
    <script>
alert("Booking succeed!")
</script>
<?php
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else if ($capacity < $row1["RoomMinimumCapacity"]){
    ?>
<script>
            alert("Atendees are too low")
        </script>
 <!-- echo "<center><h3> Atendees are too low </h3></center>"; -->
<?php
}
else if ($capacity > $row1["RoomCapacity"]) {
    ?>
<script>
alert("Capacity Overload / Expected atendee exceeded the room capacity!")
</script>
<?php
}
}

end:
mysqli_close($conn);
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

function createvenue(){
    global $db, $errors;
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cbfosystem";


$venuename    =  e($_POST['venuename']);
$capacity      =  e($_POST['capacity']);
$mincapacity  =  e($_POST['mincapacity']);
        $image =  $_FILES['image']['name'];

        $target = "../sanbedapics/".basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

       }else{
  array_push ($errors,"Failed to upload image");
       }
    
        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "INSERT INTO venues
(RoomName,RoomCapacity,RoomMinimumCapacity,VenueImage) VALUES
('$venuename','$capacity', '$mincapacity','$image')";
    
if ($conn->query($sql) === TRUE) {
    ?>
    <script>
         alert("Venue added successfully")
    </script>
<?php
} else {
    echo "Error adding record: " . $conn->error;
}

}

function updatevenue (){
        $id           =  e($_POST['venueid']);
        $venuename    =  e($_POST['venuename']);
		$capacity     =  e($_POST['capacity']);
		$mincapacity  =  e($_POST['mincapacity']);
        $image        =  $_FILES['venueimage']['name'];

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


	$sql = "UPDATE venues SET RoomName = '$venuename',RoomCapacity = '$capacity',RoomMinimumCapacity= '$mincapacity', VenueImage = '$image'   WHERE RoomID = $id"; 
	
	if ($conn->query($sql) === TRUE) {
    ?>
    <script>
         alert("Venue updated successfully")
    </script>
<?php
    $_SESSION['venuename'] =  "";
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
	$result = mysqli_query($con,"SELECT RoomId,RoomName,RoomCapacity,RoomMinimumCapacity,VenueImage FROM venues WHERE RoomId = $id"); 
	$row = mysqli_fetch_array($result);
	
	$_SESSION['venueid'] =  $id;
    $_SESSION['venuename'] =  $row['RoomName'];
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
    ?>
    <script>
         alert("Venue deactivated successfully")
    </script>
<?php
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
    ?>
    <script>
         alert("Venue activated successfully")
    </script>
<?php
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

?>
