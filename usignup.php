<?php
	include('C:xampp/htdocs/super_shop/inc/connect.php');
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Salse Management Signup</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Circle Sign Up Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/rstyle.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
	<div class="main">	
		<div class="w3layouts_main agileinfo w3">		
			<div class="w3_agile_signup_form agileits">
				<h1 class="w3_agileits w3ls">Salse Management</h1>
				<h2 class="wthree">Sign up to create new account</h2>
				<div class="agile_login_form">
					<form action="" method="post" class="agileits_w3layouts_form">
						<input type="text" name="eid" placeholder="Employee ID" required="">
						<input type="text" name="username" placeholder="User Name" required="">
						
						<input type="password" name="password1" placeholder="Password" required="">
						<input type="password" name="password2" placeholder="Confirm Password" required="">
						<input name="usignup" type="submit" value="SIGN UP">
					</form>
				</div>
			</div>
		</div>
		<div class="agileits_copyright w3l">
			<p>© 2017 Circle Sign Up Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	</div>
</body>
</html>

<?php
	
	if(isset($_POST['usignup'])){
		$eid = $_POST['eid'];
		$username = $_POST['username'];
		$pass1 = $_POST['password1'];
		$pass2 = $_POST['password2'];
		
		$sql = mysqli_query($con, "SELECT * from salemanager where emp_id ='$eid'");
		
		if(mysqli_num_rows($sql) > 0){
			
			if($pass1 == $pass2){
				$sql = mysqli_query($con, "UPDATE `salemanager` SET `username`= '$username',`password`=$pass1 WHERE emp_id = '$eid'");
				echo "<script>alert('Registration Successful!')</script>";
				echo "<script>window.open('userlogin.php','_self')</script>";

			}
			else{
				echo "<script>alert('Password didn't match')</script>";
			}
		}
		else{
			echo "<script>alert('Sorry! Your Employee id is not enlisted!')</script>";
		}
	}
	
?>

