<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Restore booking</title>
</head>
<style>
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
    background:-moz-linear-gradient(45deg, #3498db 0%, #9b59b6 100%) fixed;
    background:-webkit-linear-gradient(45deg, #3498db 0%, #9b59b6 100%) fixed;
  margin-left: 26%;
        margin-right: 25%;
}
.divcenter{
	
	margin-left: 20%;
}    
body {
    
    background-image: url("site-image.jpg");
    background-size: 100%;
background-repeat: no-repeat;
}
 .divbg {
        
         background:  rgba(255, 56, 68,0.7);
        margin-right: 30%;
        margin-left: 30%;
        margin-bottom: 15%;
        margin-top: 10%;
             
    }   
    
    
</style>
<body>
<div class="divbg">
    <br>

<?php
// Captcha

	
	if(empty($errors))
	{
		include 'config.php';

		// Create connection
		$conn = mysqli_connect($servername, $username, $password,  $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$id = intval(htmlspecialchars($_POST["id"]));
 $sql = "SELECT * FROM $tablename  WHERE id = $id";
		$sql1 = "UPDATE $tablename SET canceled = 0 WHERE id = $id";
	$result = $conn->query($sql1);
	$affected_rows = $conn->affected_rows;
		if (mysqli_query($conn, $sql)) {
			if ($affected_rows > 0) {
			echo "<center><h3>Booking Restored.</h3></center>";
			}
			else {
					echo "<center><h3>Booking Does Not Exist/ Already have been Restored.</h3></center>";
			}
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		mysqli_close($conn);
	}
?>
<br>
<br>
<br>
<br>
<br>


<form action="index.php">
<div class="divbutton">
 <button class="right">Go back To Reservation</button></div>
   
	 
</form>


<!--<a href="index.php"><p>Back to the booking calendar</p></a> -->
   <br>
<br>
<br>
</div>
</body>

</html>
