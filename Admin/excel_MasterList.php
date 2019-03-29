<?php 
session_start();
if(isset($_POST["export"]))
{
$connect = mysqli_connect("localhost", "root", "", "cbfosystem");
$output = '';



$filterResult    =   $_SESSION['FilterResult'];
$filterMonths    =   $_SESSION['FilterMonths'];
$filterYear    =    $_SESSION['FilterYear'];


 $query = "SELECT * FROM bookingcalendar WHERE  canceled = 0 AND room= '$filterResult' AND  (MONTH(FROM_UNIXTIME(start_day)) = '$filterMonths' AND  YEAR(FROM_UNIXTIME(start_day)) = '$filterYear' )  ORDER BY start_day ASC";
  /* echo '<pre>';
        die(var_dump($query));
        echo '</pre>';*/
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
       <th>EventName</th>
       <th>Organization</th> 
       <th>PhoneNum</th>
       <th>Venue</th>
       <th>Start Day</th>
       <th>End Day</th>
       <th>Start Time</th>
       <th>End Time</th>
       <th>Expected Attendee</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  					
						<td>'.$row["eventname"].'</td>  
                        <td>'.$row["organization"].'</td>  
                        <td>'.$row["phone"].'</td>  
                        <td>'.$row["room"].'</td>    
				        <td>'.date('d/m/Y',$row['start_day']).'</td> 
						<td>'.date('d/m/Y',$row['end_day']).'</td>
                        <td>'.sprintf("%02d:%02d", $row["start_time"]/60/60, ($row["start_time"]%(60*60)/60)).'</td>  
                        <td>'.sprintf("%02d:%02d", $row["end_time"]/60/60, ($row["end_time"]%(60*60)/60)).'</td>  
                        <td>'.$row["Capacity"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>