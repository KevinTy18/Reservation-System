<?php
if (isset($_GET['venuedeactivated']) == true) {
    ?>
    <script type="text/javascript">
	swal("Changes succeeded!", "Venue Deactivated!", "success");
    </script>
<?php
}

if (isset($_GET['venueactivated']) == true) {
    ?>
    <script type="text/javascript">
	swal("Changes succeeded!!", "Venue Activated!", "success");
    </script>
<?php
}
?>