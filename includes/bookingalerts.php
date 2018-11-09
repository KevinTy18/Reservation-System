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
?>