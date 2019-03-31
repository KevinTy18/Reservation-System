<?php
session_start();
	include('conn.php');
	$errors   = array();
	$id=$_GET['id'];
	
	$purpose=htmlspecialchars($_POST["purpose"]);
	$organization=htmlspecialchars($_POST['organization']);
	$reservee=htmlspecialchars($_POST['reservee']);
	$reservee_type=htmlspecialchars($_POST['designation']);
	$reservee_id=htmlspecialchars($_POST['designation_id']);
	$school_level=htmlspecialchars($_POST['school_level']);
	$room=htmlspecialchars($_POST['room']);
	$start_day=intval(strtotime(htmlspecialchars($_POST["start_day"])));
	$starttime = explode(" ",$_POST["start_time"]);
	$end_day = $start_day;
	$capacity = intval(($_POST["atendee"]));
	$start_time = (60*60*intval(htmlspecialchars($starttime[0]))) +
	(60*intval(htmlspecialchars($_POST["start_minutes"])));
	$end_time = $start_time + (intval(htmlspecialchars($_POST["duration"])));
	$start_epoch = $start_day + $start_time;
	$end_epoch = $end_day + $end_time;
	/*$duration=$_POST['duration'];*/
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
	if (!preg_match("/^[a-z0-9 .\-]+$/i",$reservee_id)) {
	array_push($errors, "ID must contain be Valid");
	}
	    ?>
<?php
    if (count($errors) > 0 ){ ?>
	<?php echo join(', ', $errors); ?>
   <script> alert()</script>
<?php
} ?>
<?php
	$sql = "SELECT * FROM `bookingcalendar` WHERE room ='$room' AND
(start_day>=$start_day OR end_day >=$start_day) AND canceled=0 AND id != $id";
$sql1 = "SELECT * FROM `venues` where RoomName = '$room'";
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
        
        echo header('location:../Admin/checkbookings.php?dateunavailable=0');
       
        goto end;
    }
    if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
    
    for ($i = $start_epoch; $i <= $end_epoch; $i=$i+600) {
       
    if ($i>($row["start_day"]+$row["start_time"]) &&
    $i<($row["end_day"]+$row["end_time"])) {
        echo header('location:../Admin/checkbookings.php?hasbooked=0');
 
goto end;
}
}
}
}
/*echo '<pre>';
    die(var_dump($result));
    echo '</pre>';*/
   if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
    
    for ($i = $start_epoch; $i <= $end_epoch; $i=$i+600) {
       
    if ($i>($row["start_day"]+$row["start_time"]) &&
    $i<($row["end_day"]+$row["end_time"])) {
        echo header('location:../Admin/checkbookings.php?hasbooked=0');
 
goto end;
}
}
}
}
	/*mysqli_query($conn,"update user set firstname='$firstname', lastname='$lastname', address='$address' where userid='$id'");*/
	$sql = "UPDATE `bookingcalendar` SET `eventname`='$purpose',`organization`='$organization',`reservee_name`='$reservee',`reservee_type`= '$reservee_type',`designation_id`='$reservee_id',`School_Level_or_Course`='$school_level',`room`='$room',`start_day`=$start_day,`start_time`=$start_time,`end_time`=$end_time, Capacity = $capacity  WHERE id = $id";
	
if (mysqli_num_rows($result1) > 0 ){
  
$row1 = mysqli_fetch_assoc($result1);
if ($row1["RoomCapacity"] == $capacity || $row1["RoomCapacity"] >=
$capacity && $capacity >= $row1["RoomMinimumCapacity"]){
if (mysqli_query($conn, $sql)) {

echo header('location:../Admin/checkbookings.php?success=0');
    
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else if ($capacity < $row1["RoomMinimumCapacity"]){
    
 echo header('location:../Admin/checkbookings.php?toolow=0');
    
}
else if ($capacity > $row1["RoomCapacity"]) {
    
    echo header('location:../Admin/checkbookings.php?overload=0');
 
}
}
}
}




	/*header('location:checkbookings.php'); */



end:
mysqli_close($conn);
?>