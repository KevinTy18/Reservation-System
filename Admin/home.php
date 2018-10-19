<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../adminlogin.php');
	}

    if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}
?>
<html>
<head>
    <title>Reservation System</title>
    <link href="calendar.css" type="text/css" rel="stylesheet" />
    </head>
<body>
<p>RESERVATION</p>
    <?php
include 'Calendar.php';
 
$calendar = new Calendar();
 
echo $calendar->show();
?>
</body>
</html>