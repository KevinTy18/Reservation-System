<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Make booking</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
button {
    background: 0 0;
    border-radius: 2px;
    cursor: pointer;
    display:block;
    height: 60px;
    line-height: 60px;
    padding: 0 30px 0 25px;
    position: relative;
    transition: all .3s;
    border: 2px solid #fff;
    font-size: 1.3em;
    letter-spacing: 2px;
    text-transform: uppercase;
    z-index: 0;
    color:black;
    overflow: hidden;
    font-family: 'Open Sans', sans-serif;
}
button.right::before {
            transform: translate(100%, 0);
        }
            button.right:hover::before {
                transform: translate(0, 0);
            }
button:hover {
    color: black;
}
    /*Adding the hover effect base */
    button::before {
        content: '';
        height: 100%;
        width: 100%;
        background: #fff;
        position: absolute;
        top: 0;
        right: 0;
        transition: all .3s;
        z-index: -1;
    }
.divbutton {
max-width: auto;
    height: auto;
margin: 2px;
padding: 3px;
display: inline-block;
    font-size: 62.5%;
    background:#61b2d8;
    background:-moz-linear-gradient(45deg, #3498db 0%, #9b59b6 100%) fixed;
    background:-webkit-linear-gradient(45deg, #3498db 0%, #9b59b6 100%) fixed;
   margin-left: 26%;
        margin-right: 25%;
}
.divcenter{
margin-left: 20%;
}
body {
    background-image: url("site-image.jpg");
    background-size: 100%;
background-repeat: no-repeat;
}

    .divbg {

         background:  rgba(255, 56, 68,0.7);
        margin-right: 30%;
        margin-left: 30%;
        margin-bottom: 15%;
        margin-top: 10%;

    }

</style>

<body>
<div class="divbg">
<br>
<?php
// Captcha


include 'config.php';
// Create connection
$conn = mysqli_connect($servername, $username, $password,  $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$start_day = intval(strtotime(htmlspecialchars($_POST["start_day"])));
$start_time = (60*60*intval(htmlspecialchars($_POST["start_hour"]))) +
(60*intval(htmlspecialchars($_POST["start_minute"])));
$end_day = intval(strtotime(htmlspecialchars($_POST["end_day"])));
$end_time = (60*60*intval(htmlspecialchars($_POST["end_hour"]))) +
(60*intval(htmlspecialchars($_POST["end_minute"])));
        $eventname = htmlspecialchars($_POST["eventname"]);
$organization = htmlspecialchars($_POST["organization"]);
$capacity = intval(($_POST["atendee"]));
$phone = htmlspecialchars($_POST["phone"]);
$item = htmlspecialchars($_POST["item"]);
$starttime = explode(" ",$_POST["start_hour"]);
$endtime = explode(" ",$_POST["end_hour"]);
$start_epoch = $start_day + $start_time;
$end_epoch = $end_day + $end_time;
$errors   = array(); 
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
		if (!is_numeric($phone)) {
			array_push($errors, "Please Enter  a valid Phone Number");
		}
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
for ($i = $start_epoch; $i <= $end_epoch; $i=$i+1800) {
if ($i>($row["start_day"]+$row["start_time"]) &&
$i<($row["end_day"]+$row["end_time"])) {
echo '<h3><font color="red">Unfortunately ' . $item . ' has already
been booked for the time requested.</font></h3>';
goto end;
}
}
}
}
$sql = "INSERT INTO $tablename (eventname, organization, phone, item,
start_day, start_time, end_day, TimeBeginDenum , TimeEndDenum,end_time, canceled, Capacity)
VALUES ('$eventname','$organization','$phone', '$item', $start_day,
$start_time, $end_day, '$starttime[1]' ,'$endtime[1]',$end_time,0,'$capacity')";

if (mysqli_num_rows($result1) > 0 ){
$row1 = mysqli_fetch_assoc($result1);
if ($row1["RoomCapacity"] == $capacity || $row1["RoomCapacity"] >= $capacity &&	 $capacity >= $row1["RoomMinimumCapacity"]){
if (mysqli_query($conn, $sql)) {
    echo "<center><h3>Booking succeed.</h3></center>";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else if ($capacity < $row1["RoomMinimumCapacity"]){
echo "<center><h3> Atendees are too low </h3></center>";	
}
else if ($capacity > $row1["RoomCapacity"]) {
echo "<center><h3>Capacity Overload / Expected Atendee Exceeded The
Room Capacity </h3></center>";
}
}

end:
mysqli_close($conn);
}
else 	 {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
?>
<br>
<br>
<br>
<br>
<br>
<br>

<form action="index.php">
    <div class="divbutton">
    <button class="right">Go back To Reservation</button>
    </div>
</form>
    <!-- <a href="index.php"><p>Back to the booking calendar</p></a> -->

    <br>
    <br>
    <br>

    <center>
<form action="checkbookings.php">
    <!--<input type="submit" value="Check Calendar" /> -->
    <div class="divbutton">
    <button class="right" type="submit"><span><i class="fa
fa-calendar" style="font-size:24px;"></i> Check
Calendar</span></button>
    </div>
</form>
    </center>
</div>


</body>

</html>