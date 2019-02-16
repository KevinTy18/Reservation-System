<?php
if (isset($_GET['SetUnavailableDate']) == true) {
    ?>
    <script type="text/javascript">
  swal("Date cancelled!", "Date successfully cancelled!", "success");
    </script>
<?php
}
if (isset($_GET['SetUnavailableDateError']) == true) {
    ?>
    <script type="text/javascript">
    swal("Date Cancel Failed", "Unfortunately the date has already been cancelled", "error");
    </script>
<?php
}
?>