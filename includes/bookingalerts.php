<?php
if (isset($_GET['success']) == true) {
    ?>
    <script type="text/javascript">
	swal("Booking succeeded!", "Your schedule has been created!", "success");
    </script>
<?php
}

if (isset($_GET['overload']) == true) {
    ?>
    <script type="text/javascript">
	swal("Booking failed!", "Capacity Overload/Expected atendee exceeded the room capacity!", "error");
    </script>
<?php
}
if (isset($_GET['toolow']) == true) {
    ?>
    <script type="text/javascript">
	swal("Booking failed!", "Attendees are too low", "error");
    </script>
<?php
}
if (isset($_GET['hasbooked']) == true) {
    ?>
    <script type="text/javascript">
	swal("Booking failed!", "Unfortunately has already been booked for the time requested.", "error");
    </script>
<?php
}
if (isset($_GET['dateunavailable']) == true) {
    ?>
    <script type="text/javascript">
	swal("Booking failed!", "Unfortunately the date is unavailable.", "error");
    </script>
<?php
}
if (isset($_GET['datealreadyunavailable']) == true) {
    ?>
    <script type="text/javascript">
	swal("Cancel failed!", "Date is already Unavailable.", "error");
    </script>
<?php
}
if (isset($_GET['datecancelled']) == true) {
    ?>
    <script type="text/javascript">
	swal("Cancel Success!", "Date is cancelled!", "success");
    </script>
<?php
}
if (isset($_GET['updatesuccess']) == true) {
    ?>
    <script type="text/javascript">
	swal("Update success!", "Updating of room succeeded!", "success");
    </script>
<?php
}
if (isset($_GET['activated']) == true) {
    ?>
    <script type="text/javascript">
	swal("Activate success!", "Room activated success!", "success");
    </script>
<?php
}
if (isset($_GET['deactivated']) == true) {
    ?>
    <script type="text/javascript">
	swal("Deactivate success!", "Room deactivated successfully!", "success");
    </script>
<?php
}
if (isset($_GET['levelAdded']) == true) {
    ?>
    <script type="text/javascript">
	swal("Added success!", "Level/Course added successfully!", "success");
    </script>
<?php
}
if (isset($_GET['levelupdate']) == true) {
    ?>
    <script type="text/javascript">
	swal("Update success!", "Updating of level/course succeeded!", "success");
    </script>
<?php
}
if (isset($_GET['levelactivated']) == true) {
    ?>
    <script type="text/javascript">
	swal("Activate success!", "Level/Course activated success!", "success");
    </script>
<?php
}
if (isset($_GET['leveldeactivated']) == true) {
    ?>
    <script type="text/javascript">
	swal("Deactivate success!", "Level/Course deactivated successfully!", "success");
    </script>
<?php
}
if (isset($_GET['wrongpass']) == true) {
    ?>
    <script type="text/javascript">
	swal("Wrong password!", "Please enter the correct password!", "error");
    </script>
<?php
}
if (isset($_GET['errorcontact']) == true) {
    ?>
    <script type="text/javascript">
    swal("Invalid number!", "Please enter correct cellphone number!", "error");
    </script>
<?php
}
if (isset($_GET['errorstartday']) == true) {
    ?>
    <script type="text/javascript">
    swal("Invalid Start Day!", "Please enter the start day again!", "error");
    </script>
<?php
}
if (isset($_GET['errorstarttime']) == true) {
    ?>
    <script type="text/javascript">
    swal("Invalid Start Time!", "Please enter the start time again!", "error");
    </script>
<?php
}
if (isset($_GET['errorendday']) == true) {
    ?>
    <script type="text/javascript">
    swal("Invalid End Day!", "Please enter the End Day again!", "error");
    </script>
<?php
}
if (isset($_GET['errorendtime']) == true) {
    ?>
    <script type="text/javascript">
    swal("Invalid End Time!", "Please enter the End Time again!", "error");
    </script>
<?php
}
if (isset($_GET['errorcapacity']) == true) {
    ?>
    <script type="text/javascript">
    swal("Invalid Capacity!", "Please enter the correct capacity again!", "error");
    </script>
<?php
}
if (isset($_GET['errororganization']) == true) {
    ?>
    <script type="text/javascript">
    swal("Invalid Organization!", "Please enter the correct organization again!", "error");
    </script>
<?php
}
if (isset($_GET['errorname']) == true) {
    ?>
    <script type="text/javascript">
    swal("Invalid Reservee Name!", "Please enter the correct name again!", "error");
    </script>
<?php
}
if (isset($_GET['errorid']) == true) {
    ?>
    <script type="text/javascript">
    swal("Invalid ID!", "Please enter the correct ID again!", "error");
    </script>
<?php
}
?>