<?php
include('../functions.php');

$VenueImage = $_GET['VenueImage'];
$sql="SELECT RoomID, RoomName, Department_Id, RoomCapacity,RoomMinimumCapacity,VenueImage, Availability 
	FROM venues 
	Where Availability = 'Available' 
	AND RoomName = '$VenueImage'";

$result = $db->query($sql);
$row = $result->fetch_assoc();

$SelectedImage = $row['VenueImage'];
echo json_encode($SelectedImage);