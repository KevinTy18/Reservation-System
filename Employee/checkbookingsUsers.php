<?php
include('../functions.php');


if (!isEmployee()) {
$_SESSION['msg'] = "You must log in first";
header('location: ../userlogin.php');
}

    if (isset($_GET['logout'])) {
session_destroy();
unset($_SESSION['user']);
header("location: ../userlogin.php");

$Image;
}
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop() > 100){
            $('#scroll').fadeIn();
        }else{
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
</script>
<style>
html *
{
   font-family: Arial ; <!--!important -->
}
table.calendar {
	border-left: 1px solid #999;
    
}
tr.calendar-row {
}
td.calendar-day {
	min-height: 80px;
	font-size: 14px;
	position: relative;
	vertical-align: top;
    padding-left:90px;
}
* html div.calendar-day {
	height: 80px;
}
td.calendar-day:hover {
	background: #eceff5;
	color: black;
}
td.calendar-day-np {

	min-height: 80px;
}
* html div.calendar-day-np {
	height: 80px;
}
td.calendar-day-head {

	font-weight: bold;
	text-align: center;
	width: 120px;
	padding: 30px;
	border-bottom: 1px solid #999;
	border-top: 1px solid #999;
	border-right: 1px solid #999;
}
div.day-number {

	background: rgba(255, 51, 0,0.5);
	padding: 5px;
	color: #fff;
	font-weight: bold;
	float: right;
	margin: -5px -5px 0 0;
	width: 20px;
	text-align: center;
}
td.calendar-day, td.calendar-day-np {
	width: 120px;
	padding: 5px;
	border-bottom: 1px solid #999;
	border-right: 1px solid #999;
}
input[type=button], input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
button {
    background: 0 0;
    border-radius: 2px;
    cursor: pointer;
    display:block;
    height: 60px;
    line-height: 60px;
    padding: 0 30px 0 25px;
    position: relative;
    transition: all .3s;
    border: 2px solid #fff;
    font-size: 1.3em;
    letter-spacing: 2px;
    text-transform: uppercase;
    z-index: 0;
    color:black;
    overflow: hidden;
    font-family: 'Open Sans', sans-serif;
}
.smallbutton {
  border-radius: 4px;
  background-color: white;
  border: none;
  color: crimson;
  text-align: center;
  font-size: 17px;
  padding: 6px;
  width: 120px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.smallbuttonnav {
  border-radius: 3px;
  background-color: #f13434;
  border: none;
  color: crimson;
  text-align: center;
  font-size: 13px;
  padding: 2px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
button.right::before {
            transform: translate(100%, 0);
        }
            button.right:hover::before {
                transform: translate(0, 0);
            }
			button:hover {
    color: black;
}
    /*Adding the hover effect base */
    button::before {
        content: '';
        height: 100%;
        width: 100%;
        background: #fff;
        position: absolute;
        top: 0;
        right: 0;
        transition: all .3s;
        z-index: -1;
    }
	.divbutton {
	max-width: auto;
    height: auto;
	margin: 2px;
	padding: 3px;
	display: inline-block;
    font-size: 62.5%;
    background:#61b2d8;
    background:-webkit-linear-gradient(45deg,  rgba(255,0,0,0), rgba(255,0,0,7)) fixed;
   margin-left: 40%;
}
.divcenter{
	
	margin-left: 10%;
}
  .divcalendar {
	  color: black;
    margin-left: 3.5%;
    margin-right: 10%;
    margin-top: 50px;
    padding-left: -30px;
    padding-right: 120px;
    width: 85%;
    background-color: rgba(255,255,255,0.8);
    border-radius: 30px;
    
}

    }
.divmargin{
    margin-top: 13%;
	font-size:20px;	
    }
.parallax {
    /* The image used */
    background-image: url('../sanbedapics/site-image.jpg');

    /* Full height */
    height: 100%;
    width:100%;

    /* Create the parallax scrolling effect */
    background-attachment: fixed;

    background-repeat: no-repeat;
    background-size: cover;
    
    overflow: hidden;
    background-color: #B22222;
    padding: 0px 10px;
   
    margin-left: -17px;
    margin-right: -10px;
}
body {
    color:black;
    
    background-color: #e89c9c;
    
    

}
/* BackToTop button css */
#scroll {
    position:fixed;
    right:10px;
    bottom:10px;
    cursor:pointer;
    width:50px;
    height:50px;
    background-color:#3498db;
    text-indent:-9999px;
    display:none;
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
    border-radius:5px;
}
#scroll span {
    position:absolute;
    top:50%;
    left:50%;
    margin-left:-8px;
    margin-top:-12px;
    height:0;
    width:0;
    border:8px solid transparent;
    border-bottom-color:#ffffff
}
#scroll:hover {
    background-color:#e74c3c;
    opacity:1;
    filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
}
.divsize {
    max-width: 400px;
    height: 110px;
    left: 50%;
    margin-left: 35%;
    margin-top: 15%;
    padding-top: 10px;
    background-color: rgba(255,255,255,0.8);
    border-radius: 30px;
}
.fontforlogo{
     font-family: Helvetica;
     color:black;
}

.divsbcalogo{
    margin-left: 28%;
    margin-top: -17%;
}
.header {
    overflow: hidden;
    background-color: #B22222;
    padding: 0px 10px;
    margin-top: -9px;
    margin-left: -17px;
    margin-right: -10px;
}
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 10px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}
.header a.logo {
  font-size: 25px;
  font-weight: bold;
}
.heade a:hover {
  background-color: #ddd;
  color: black;
}
.header a.active {
  background-color: dodgerblue;
  color: white;
}
.header-right {
  float: right;
}
.divcancel{
  background-color: rgba(255,255,255,0.8);
  padding:200px;

}
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}
</style>
<link href="jquery-ui.css" rel="stylesheet">
</head>

<body>
     <div class="header">
  <a class="logo" style="color:white;"> Welcome, <?php  if
(isset($_SESSION['user'])) : ?>
<strong><?php echo $_SESSION['user']['username']; ?>!</strong>


<?php endif ?></a>
  <div class="header-right">
    <a href="checkbookingsUsers.php?logout='1'" class="smallbutton"
style="margin-right:10px;color:maroon;">
          <span class="fa fa-sign-out" style="font-size:20px"></span> Log out
    </a>
  </div>
</div>
    

<!-- BackToTop Button -->
<a href="javascript:void(0);" id="scroll" title="Scroll to Top"
style="display: none;">Top<span></span></a>




<div class="parallax" style="">
   <div class="divsize" style="margin:0 auto;margin-top:250px">

    <div class="divlogo"><img src="../sanbedapics/sbcalogo.png" alt="SBCA Logo"
width="20%" height="80%" style="margin-left:20px"></div>
    <div class="divsbcalogo" ><h2 class="fontforlogo">  SBCA Booking
Calendar</h2></div>
</div>
</div>

<div class="divmargin">
    <div class="divcalendar">
        <center>
<?php
/* draws a calendar */
function draw_calendar($month,$year){

	include 'config.php';

	// Create connection
	$conn = mysqli_connect($servername, $username, $password,  $dbname);

	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
	
	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			$current_epoch = mktime(0,0,0,$month,$list_day,$year);
			
			$sql = "SELECT * FROM $tablename WHERE $current_epoch BETWEEN start_day AND end_day AND canceled = 0 ORDER BY start_time ASC";
						
			$result = mysqli_query($conn, $sql);
    		
    		if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {
					if($row["canceled"] == 1) $calendar .= "<font color=\"grey\"><s>";
    				$calendar .= "<b>" . "Room: ". $row["room"] . "</b><br>ID: " . $row["id"] . "<br>" ."Event Name: " . $row["eventname"] . "<br>". "Organization: ". $row["organization"] . "<br>". "Reservee name: ". $row["reservee_name"] . "<br>" ."Phone Num: " . $row["phone"] . "<br>" ."Capacity: " .$row["Capacity"] . "<br>";
    				if($current_epoch == $row["start_day"] AND $current_epoch != $row["end_day"]) {
    					$calendar .= "Booking starts: " . sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60)) . "<br><hr><br>";
    				}
    				if($current_epoch == $row["start_day"] AND $current_epoch == $row["end_day"]) {
    					$calendar .= "Booking start: " . sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60)) . " " . $row["TimeBeginDenum"] ."<br>";
    				}
    				if($current_epoch == $row["end_day"]) {
    					$calendar .= "Booking end: " . sprintf("%02d:%02d", $row["end_time"]/60/60, ($row["end_time"]%(60*60)/60)) . " " . $row["TimeEndDenum"] ."<br><hr><br>";
    				}
    				if($current_epoch != $row["start_day"] AND $current_epoch != $row["end_day"]) {
	    				$calendar .= "Booking: 24h<br><hr><br>";
	    			}
					if($row["canceled"] == 1) $calendar .= "</s></font>";
    			}
			} else {
    			$calendar .= "OPEN";
			}
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	mysqli_close($conn);
	
	/* all done, return result */
	return $calendar;
}

include 'config.php';
echo '<br>';
echo '<div class="divcenter">';
$d = new DateTime(date("Y-m-d"));
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));
echo '</div>';
echo '<br>';
?>
        </center>




    </div>
</div>
</body>
</html>