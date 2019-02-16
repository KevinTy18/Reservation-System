<?php
include('../../functions.php');
include('../config.php');
if (!isAdmin()) {
$_SESSION['msg'] = "You must log in first";
header('location: ../../adminlogin.php');
}

    if (isset($_GET['logout'])) {
session_destroy();
unset($_SESSION['user']);
header("location: login.php");
}
$_SESSION['WebpageOrigin'] = "IBED-GS-Reports";

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
<title>SBCA Booking Calendar</title>
<link href="jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../cssforlogin/css/CancelReservation.css">
<link rel="stylesheet" href="../../cssforlogin/css/side.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="jquery-1.10.2.js"></script>
<script src="jquery-ui.js"></script>


<?php
	  $db = mysqli_connect('localhost', 'root', '', 'cbfosystem');

					//show invoices list as options
					$ReserveeQuery = mysqli_query($db,"select *, count(room) as Number from bookingcalendar WHERE Room_Department = 1 GROUP by reservee_type ");
				
				
				?>
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['reservee_type', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($ReserveeQuery))  
                          {  
                               echo "['".$row["reservee_type"]."', ".$row["Number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Reservee of IBED-GS',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           } 
           </script>   

<?php
  $query = mysqli_query($db,"select *, count(room) as Number from bookingcalendar WHERE School_Level_or_Course = 'Grade 4' OR School_Level_or_Course = 'Grade 5' OR School_Level_or_Course = 'Grade 6' GROUP by School_Level_or_Course");
        
        
        ?> 
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChartbyLevel);  
           function drawChartbyLevel()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['School_Level_or_Course', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($query))  
                          {  
                               echo "['".$row["School_Level_or_Course"]."', ".$row["Number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Reservee of IBED-GS by Grade Level',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechartforSchoolLevel'));  
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

<body>

<!-- end header -->
<?php
include('includes/header.php');
include('includes/nav.php');  

?>
<br>
<?php 
include('../../includes/SideNavbarDepartmentReports.php');
  ?>
<br>

<div class="w3-container" >
<table id="divcon" color="black" border="1" cellpadding="5"
width="400" align="center"  style="margin-top:5px;margin-bottom:10px">
<tr>
    <td valign="top">
	 
 
           <div style="width:950px;height:50px">
               <div class="w3-row">
    <a href="javascript:void(0)" onclick="openCity(event, 'London');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="color:white">IBED-GS Reservees</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'Paris');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="color:white">By Level</div>
    </a>
  </div>
               
        <div id="London" class="w3-container city" style="display:none">
    
    <h2>Percentage of Reservee of IBED-GS</h2>  
                <center><div id="piechart" style="width: 580px; height: 350px;"></div>
            <form method='post' action='PDFInvoice/invoice-db.php'>
<!--<button type='submit' class="smallbutton"  style="float:right;margin-right: 400px;
    margin-top: -90px;"><i class="fa fa-print" style="font-size:24px;color:red;" ></i><span> Print Reports</span>
	

</button>--> 
</form> 
            </center>
                <br />  
  </div>

  <div id="Paris" class="w3-container city" style="display:none">
    <h2>Reports by level</h2>
      <center><div id="piechartforSchoolLevel" style="width: 580px; height: 350px;"></div>
            <form method='post' action='PDFInvoice/invoice-db.php'>
<!--<button type='submit' class="smallbutton"  style="float:right;margin-right: 400px;
    margin-top: -90px;"><i class="fa fa-print" style="font-size:24px;color:red;" ></i><span> Print Reports</span>
	

</button>--> 
</form> 
            </center>
                <br />
  </div>       
               
                
           </div>


<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<button class="btn invisible" id="backButton"> Back</button>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </td>
</tr>


</table>

    </div>
<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}
</script>

</body>
</html>