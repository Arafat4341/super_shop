<?php
	include('inc/header.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('location: admin_login.php');
	}
?>

<div class="container">
	<div class="row" style="padding-top: 100px">

		<?php
		      
		    $sql = mysqli_query($con, "SELECT count(id) from product");
		    $row = mysqli_fetch_assoc($sql);
		    $size = $row['count(id)'];

		    $sql2 = mysqli_query($con, "SELECT sum(total_wprice) from product_price");
		    $row2 = mysqli_fetch_assoc($sql2);
		    $size2 = $row2['sum(total_wprice)'];
		    
		    $sql3 = mysqli_query($con, "SELECT count(id) from employee_info");
		    $row3 = mysqli_fetch_assoc($sql3);
		    $size3 = $row3['count(id)'];

		    echo '<div class="col-sm-6 col-md-4">
				    <div class="panel panel-info">
				    <div class="panel-heading"><h3>Total Items</h3></div>
				    <div class="panel-body"><h4>'.$size.'</h4></div>
				    </div>
				  </div>';

			echo '<div class="col-sm-6 col-md-4">
				    <div class="panel panel-info">
				    <div class="panel-heading"><h3>Total value</h3></div>
				    <div class="panel-body"><h4>BDT '.$size2.' /=</h4></div>
				    </div>
				  </div>';

			echo '<div class="col-sm-6 col-md-4">
				    <div class="panel panel-info">
				    <div class="panel-heading"><h3>Total no. of employees</h3></div>
				    <div class="panel-body"><h4>'.$size3.'</h4></div>
				    </div>
				  </div>';
		?>
	  
	  
	  
	</div>
</div>