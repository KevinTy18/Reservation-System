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
?>