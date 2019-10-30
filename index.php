
<html>

<!-- Head -->
<head>

<title>Welcome to Smart Bazar</title>

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

	<h2>Are you an Admin or a User</h2>
	<div class="w3layoutscontaineragileits">
		<form action="" method="post">
			
				
				<div class="aitssendbuttonw3ls">
					<input name="admin" type="submit" value="ADMIN">
					
					<div class="clear"></div>
				</div><br>
				<div class="aitssendbuttonw3ls">
					<input name="user" type="submit" value="USER">
					
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
	
	if(isset($_POST['admin'])){
		echo "<script>window.open('admin/admin_login.php','_self')</script>";
	}
	elseif (isset($_POST['user'])) {
		echo "<script>window.open('userlogin.php','_self')</script>";
	}

?>