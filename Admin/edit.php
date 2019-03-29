<?php
	include('conn.php');
	
	$id=$_GET['id'];
	
	$purpose=$_POST['purpose'];
	$organization=$_POST['organization'];
	$reservee=$_POST['reservee'];
	$reservee_type=$_POST['designation'];
	$reservee_id=$_POST['designation_id'];
	$school_level=$_POST['school_level'];
	$room_department=$_POST['room_department'];
	$room=$_POST['room'];
	$start_day=$_POST['start_day'];
	$start_time=$_POST['start_time'];
	$duration=$_POST['duration'];
	
	/*mysqli_query($conn,"update user set firstname='$firstname', lastname='$lastname', address='$address' where userid='$id'");*/
	$query = mysqli_query($conn,"UPDATE `bookingcalendar` SET `eventname`='$purpose',`organization`='$organization',`reservee_name`='$reservee',`reservee_type`= '$reservee_type',`designation_id`='$reservee_id',`School_Level_or_Course`='$school_level',`Room_Department`=$room_department,`room`='$room',`start_day`=$start_day,`start_time`=$start_time,`end_time`=$start_time + $duration WHERE id = $id");
	/*echo '<pre>';
        die(var_dump($query));
        echo '</pre>';*/
	header('location:index.php'); 

?>