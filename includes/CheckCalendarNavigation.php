<div class="buttons">
<form action="checkbookings.php" method="POST">
    <!--<input type="submit" value="Check Calendar" /> -->
    <button class="smallbuttonnav" type="submit" name="AllDepartments"
style="float:left"><span><i class="fa
fa-calendar" style="font-size:15px;color:red"></i> All Departments</span></button>
</form>
</div>
<?php 
include('../Admin/config.php');
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Id, Department FROM room_department";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo  '<div class="buttons">';
    echo  '<form action="checkbookings.php" method="POST">';
    echo  '<button class="smallbuttonnav" type="submit" name='. $row['Department'] . ' style="float:left"><span><i class="fa fa-calendar"
      style="font-size:15px;color:red"></i>'. $row['Department']  .'</span></button>';
    echo  '</form>';
    echo  '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>