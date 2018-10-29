<?php
include('../functions.php');

$VenueImage = $_GET['VenueImage'];
$sql="SELECT * FROM venues Where Availability = 'Available' AND RoomName = '$VenueImage'";

$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);

$SelectedImage = $row['VenueImage'];
echo json_encode($SelectedImage);