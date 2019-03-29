<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from bookingcalendar where id='".$row['id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?id=<?php echo $erow['id']; ?>">
					<div class="row">
						<div class="col-lg-2">Purpose
							<label style="position:relative; top:7px;">Purpose:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="purpose" class="form-control" value="<?php echo $erow['eventname']; ?>">
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
							<input type="text" name="designation" class="form-control" value="<?php echo $erow['reservee_type']; ?>">
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
							<label style="position:relative; top:7px;">School Level/Course:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="school_level" class="form-control" value="<?php echo $erow['School_Level_or_Course']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Room Department:</label>
						</div>
						<select id='categoriesSelect' onchange="change_Timer(this.value)" name="RoomDepartment" style="width:170px">
    </select>
    <select id='subcatsSelect' onchange="change_picture(this.value)"
name="Roomname" style="width:170px">
    </select>
						<div class="col-lg-10">
							<input type="text" name="room_department" class="form-control" value="<?php echo $erow['Room_Department']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Room:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="room" class="form-control" value="<?php echo $erow['room']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Day of Event:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="start_day" class="form-control" value="<?php echo $erow['start_day']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Time Start:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="start_time" class="form-control" value="<?php echo $erow['start_time']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Duration of Booking:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="duration" class="form-control" value="<?php echo $erow['end_time'] - $erow['start_time']; ?>">
						</div>
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->