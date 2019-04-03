<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reservation System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="sanbedapics/sbcalogo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cssforlogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cssforlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cssforlogin/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cssforlogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="cssforlogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cssforlogin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cssforlogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="cssforlogin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cssforlogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="cssforlogin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('cssforlogin/images/site-image.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="adminlogin.php">
					<span class="login100-form-logo">
						<img src = "cssforlogin/images/sbcalogo.png" width="80" height="89" item-align = "center"> 
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Admin Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" autocomplete="off" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                    <?php
                        if(isset($_GET['error']) == TRUE) {
                            echo '<span class="fa fa-exclamation-circle" style="color:white;"> Wrong username/password combination</span>';
                        }
                    ?>
					<div class="container-login100-form-btn" style="margin-top:15px">
						<button class="login100-form-btn" type="submit" name=adminlogin_btn>
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							<!--Forgot Password?-->
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="cssforlogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="cssforlogin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="cssforlogin/vendor/bootstrap/js/popper.js"></script>
	<script src="cssforlogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="cssforlogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="cssforlogin/vendor/daterangepicker/moment.min.js"></script>
	<script src="cssforlogin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="cssforlogin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="cssforlogin/js/main.js"></script>

</body>
</html>
<!--
<form method="post" action="adminlogin.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" autocomplete="off">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
        <br>
		<div class="input-group">
			<button type="submit" class="btn" name="adminlogin_btn">Login</button>
		</div>
		

		
	</form>
    -->