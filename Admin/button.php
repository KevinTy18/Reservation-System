<?php

$db = mysqli_connect('localhost', 'root', '', 'cbfosystem');
$edit=mysqli_query($conn,"select * from bookingcalendar where id='".$row['id']."'");
$erow=mysqli_fetch_array($edit);

//query
$sql= mysqli_query($db,"SELECT * FROM `school_level`");
if(mysqli_num_rows($sql)){
//dropdown for Course And School Level
$selectCourse= '<select name="school_level" class="form-control">';
while($rs=mysqli_fetch_array($sql)){
		$selector = "asde";
		if ($erow['School_Level_or_Course'] == $rs['Name_or_Course']) { 
      	 $selector = "selected='selected'";
      }
      $selectCourse.='<option value="'.$rs['Name_or_Course'].'"' . $selector .'>'.$rs['Name_or_Course'].'</option>';
  }
}
$selectCourse.='</select>'; 

//Dropdown for room
$sql= mysqli_query($db,"SELECT * FROM `venues` where Department_Id='".$row['Room_Department']."'");
if(mysqli_num_rows($sql)){
//dropdown for Course And School Level
$selectRoom= '<select name="room" class="form-control">';
while($rs=mysqli_fetch_array($sql)){
		$selector = "asde";
		if ($erow['room'] == $rs['RoomName']) { 
      	 $selector = "selected='selected'";
      }
      $selectRoom.='<option value="'.$rs['RoomName'].'"' . $selector .'>'.$rs['RoomName'].'</option>';
  }
}
$selectRoom.='</select>'; 

//Dropdown for Time Start and Start Minutes
$sql= mysqli_query($db,"SELECT * FROM `department_schedule` where Department_Id='".$row['Room_Department']."'");
if(mysqli_num_rows($sql)){
//dropdown for Course And School Level
$selectTimeStart= '<select name="start_time" class="form-control">';
$selectTimeMinutes= '<select name="start_minutes" class="form-control">';
while($rs=mysqli_fetch_array($sql)){
		$selector = "asde";
		$selectorMinutes0= "asde";
		$selectorMinutes30 = "asde";
		if ($erow['start_time'] == 60*60*intval(htmlspecialchars($rs['Schedule_Value']))) { 
      	 $selector = "selected='selected'";
      }
      if ($erow['start_time'] - 60*60*intval(htmlspecialchars($rs['Schedule_Value'])) == 0) { 
      	 $selectorMinutes0 = "selected='selected'";
      }
      if ($erow['start_time'] - 60*60*intval(htmlspecialchars($rs['Schedule_Value'])) == 1800) { 
      	 $selectorMinutes30 = "selected='selected'";
      }

      $selectTimeStart.='<option value="'.$rs['Schedule_Value'].'"' . $selector .'>'.$rs['Schedule_Description'].'</option>';
  }
  	$selectTimeMinutes .= '<option value="0"' . $selectorMinutes0 .'>'. '0'.'</option>';
  	$selectTimeMinutes .= '<option value="1800"' . $selectorMinutes30 .'>'.'30'.'</option>';
}
$selectTimeStart.='</select>'; 
$selectTimeMinutes.='</select>';

//Dropdown for Duration
$sql= mysqli_query($db,"SELECT * FROM `department_duration` where Department_Id='".$row['Room_Department']."'");
if(mysqli_num_rows($sql)){
//dropdown for Course And School Level
$selectDuration= '<select name="duration" class="form-control">';
while($rs=mysqli_fetch_array($sql)){
		$selector = "asde";
		if ($erow['end_time'] - $erow['start_time'] == $rs['Duration_Value']) { 
      	 $selector = "selected='selected'";
      }
      $selectDuration.='<option value="'.$rs['Duration_Value'].'"' . $selector .'>'.$rs['Duration_Description'].'</option>';
  }
}
$selectDuration.='</select>'; 

?>

  <script>
$(function() {
  $('input[name="start_day"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  });
});
</script>

<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Booking</h4></center>
                </div>
				<form method="POST" action="edit.php?id=<?php echo $erow['id']; ?>">
                <div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Purpose:</label>
						</div>
						<div class="col-lg-10">
							<?php $default_state = $erow['eventname'];; ?>
							<select id="" name="purpose" class="form-control" >
							<option value="Meeting"  <?php if ($erow['eventname'] == "Meeting") {
								echo "selected='selected'";
							} ?>>Meeting</option>
            				<option value="Presentation" <?php if ($erow['eventname'] == "Presentation") {
								echo "selected='selected'";
							} ?>>Presentation</option>
            				<option value="Research" <?php if ($erow['eventname'] == "Research") {
								echo "selected='selected'";
							} ?>>Research</option>
            </select>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Organization:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="organization" class="form-control" value="<?php echo $erow['organization']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Reservee:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="reservee" class="form-control" value="<?php echo $erow['reservee_name']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Reservee Type:</label>
						</div>
						<div class="col-lg-10">
						<!-- 	<input type="text" name="designation" class="form-control" value="<?php echo $erow['reservee_type']; ?>"> -->
							<input  name="designation" type="radio" value="Student" <?php if ($erow['reservee_type'] == "Student") {
								echo 'checked="checked"';
							} ?>/>Student | 
							<input name="designation" type="radio" value="Employee" <?php if ($erow['reservee_type'] == "Employee") {
								echo 'checked="checked"';
							} ?>/>Employee
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Reservee ID:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="designation_id" class="form-control" value="<?php echo $erow['designation_id']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Room:</label>
						</div>
						<div class="col-lg-10">
							<!-- <input type="text" name="room" class="form-control" value="<?php echo $erow['room']; ?>"> -->
							<?php echo $selectRoom;?>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Day of Event:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="start_day" class="form-control" value="<?php echo date('m/d/Y',$erow['start_day']); ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">School Level/Course:</label>
						</div>
						<div class="col-lg-10">
							<?php echo $selectCourse; ?>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Expected Atendee:</label>
						</div>
						<div class="col-lg-10">
							<input  class="form-control" maxlength="20" name="atendee" required="" type="number"
							 min="0" value="<?php echo 
							$erow['Capacity']; ?>"/>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Time Start:</label>
						</div>
						<div class="col-lg-10">
							<!-- <input type="text" name="start_time" class="form-control" value="<?php echo $erow['start_time']; ?>"> -->
							<?php echo $selectTimeStart;?>
							<?php echo $selectTimeMinutes;?>
          
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Duration of Booking:</label>
						</div>
						<div class="col-lg-10">
							<!-- <input type="text" name="duration" class="form-control" value="<?php echo $erow['end_time'] - $erow['start_time']; ?>"> -->
							<?php echo $selectDuration;?>
						</div>
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning" style="color:black;"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->