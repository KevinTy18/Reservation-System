<?php
include('../functions.php');
include('config.php');
if (!isAdmin()) {
$_SESSION['msg'] = "You must log in first";
header('location: ../adminlogin.php');
}

    if (isset($_GET['logout'])) {
session_destroy();
unset($_SESSION['user']);
header("location: login.php");
}
$_SESSION['WebpageOrigin'] = "designationreports";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    top: 150%;
    left: 50%;
    margin-left: -60px;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    bottom: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: transparent transparent black transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
#backButton {
	border-radius: 4px;
	padding: 8px;
	border: none;
	font-size: 16px;
	background-color: #2eacd1;
	color: white;
	position: absolute;
	top: 10px;
	right: 10px;
	cursor: pointer;
  }
  .invisible {
    display: none;
  }
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: gainsboro;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: firebrick;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LRC Booking System</title>
<link href="jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../cssforlogin/css/CancelReservation.css">
<link rel="stylesheet" href="../cssforlogin/css/side.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="jquery-1.10.2.js"></script>
<script src="jquery-ui.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

   <?php
	  $db = mysqli_connect('localhost', 'root', '', 'cbfosystem');
					//show invoices list as options
          $result = $db->query("select *, count(room) as Number from bookingcalendar GROUP by reservee_type");
				?>
                      
                    <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                          ['reservee_typer', 'Total'],
                          <?php
                          if($result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo "['".$row['reservee_type']."', ".$row['Number']."],";
                              }
                          }
                          ?>
                        ]);
                        
                        var options = {
                            title: 'Percentage of Reservees',
                            width: 700,
                            height: 300,
                            is3D: true,
                        };
                        
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                        
                        chart.draw(data, options);
                    }
                    </script>
    
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
</head>
<script type="text/javascript"> 
function refresh(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('time()',refresh)
}

function time() {
var x = new Date()
var x1=x.toLocaleDateString() + " " + x.toLocaleTimeString();// changing the display to UTC string
document.getElementById('ct').innerHTML = x1;
refresh();
 }
    function startall(){
        time();
        loadCategories();
    
    }
</script>
<body onload=startall();>
<?php
include('header.php') 

?>

<!-- end header -->
<!--<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="designationreports.php">Reservee Reports</a>
  <a href="Reports/IBED-GS-Reports.php">IBED-GS Reports</a>
  <a href="Reports/IBED-JHS-Reports.php">IBED-JHS Reports</a>
  <a href="Reports/SHS-Reports.php">SHS Reports</a>
  <a href="Reports/CAS-Reports.php">CAS Reports</a>
  <a href="Reports/GSL-Reports.php">GSL Reports</a>
  <a href="Reports/SOL-Reports.php">SOL Reports</a>
</div>-->
<br>
<!--<span style="font-size:25px;cursor:pointer;color:white;padding:2px;" id="divcon" onclick="openNav()">&#9776; more reports</span>-->

<?php 
include('../includes/SideNavbarReports.php');
	?>

<br>

<div class="w3-container" >
<table id="divcon" color="black" border="1" cellpadding="5"
width="400" align="center"  style="margin-top:5px;margin-bottom:10px">
<tr>
    <td valign="top">
	 
 
           <div style="width:950px;height:50px">  
                <h2>Percentage of Reservee</h2>   
                <br />  
                <center><div id="piechart"></div></center>
           </div>


<div id="chartContainer" style="height: 370px; width: 100%;">
</div>
<button class="btn invisible" id="backButton"> Back</button>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </td>
</tr>


</table>
    </div>


</body>
</html>