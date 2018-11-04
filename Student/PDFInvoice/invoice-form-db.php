
<?php
//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'multi_login');
?>
<html lang="en" class="animated fadeIn">
	<head>
		<title>Invoice generator</title>
		<link rel="stylesheet" type="text/css" href="style1.css">
        <link rel="stylesheet" type="text/css" href="animate.css">
	</head>
	<body>
	<div class="header">
		<h2>Select Invoice</h2>
		</div>
		<form method='post' action='invoice-db.php'>
			<select name="invoiceID">
				<?php
					//show invoices list as options
					$query = mysqli_query($con,"select * from ordering GROUP by date");
					while($invoice = mysqli_fetch_array($query)){
						echo "<option value='". str_replace(',', '/', $invoice['date'])."'>".str_replace(',', '/', $invoice['date'])."</option>";					
							
					}
				?>
			</select>
			<select name='BrandID'>
				<?php
					//show invoices list as options
					$query1 = mysqli_query($con,"select * from ordering inner join products using(ProductID) GROUP by brand");
					while($brand = mysqli_fetch_array($query1)){
						echo "<option value='" .$brand['brand']."'>".$brand['brand']."</option>";					
							
					}
				?>
			</select>
			<input type='submit' value='Generate' button type="submit" class="btn" name="generate_btn">
			<a href="../home.php" button type="submit" class="btn" name="admin_btn">Back to Admin Page</a>
		</form>
	</body>
</html>
