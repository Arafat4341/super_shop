<?php
	include('C:xampp/htdocs/super_shop/inc/connect.php');
	session_start();
?>

<html>

<!-- Head -->
<head>

<title>Admin login page</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Sleek Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<!-- Style --> <link rel="stylesheet" href="css/c4.css" type="text/css" media="all">

<!-- Fonts -->
<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>Welcome To Smart Bazar</h1>

	<h2>Log in to Salse Management Area</h2>
	<div class="w3layoutscontaineragileits">
		<form action="" method="post">
			<input type="text" Name="username" placeholder="USERNAME" required="">
			<input type="password" Name="password" placeholder="PASSWORD" required="">
			<ul class="agileinfotickwthree">
				<li>
					
					<label for="brand1"><span></span>or <a href = "usignup.php" style="color: blue">register</a></label>
				</li>
			</ul>
			<div class="aitssendbuttonw3ls">
				<input name="ulogin" type="submit" value="LOGIN">
				<div class="clear"></div>
			</div>
		</form>
	</div>

	<div class="w3footeragile">
		<p> &copy; 2017 Sleek Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
	</div>

</body>
<!-- //Body -->

</html>

<?php
	
	if(isset($_POST['ulogin'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = mysqli_query($con, "SELECT * from salemanager where username='$username' and password='$password'");
		
		if(mysqli_num_rows($sql) > 0){
			
			$_SESSION['user'] = $username;
			header('location: home.php');
		}
		else{
			echo "<script>alert('incorrect username or password!')</script>";
		}
	}
	
	
?>

