<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location: userlogin.php');
	}
?>

<?php include('inc/header.php'); ?>

<div class="container">
	<div class="col-md-4">
		<div class="panel panel-success pb">
			<div class="panel-heading">
				<h3>Enter Date</h3>
			</div>
			<div class="panel panel-body">
				<form action="" method="post">

					<div class="form-group">
					    
					    <input name="date" type="date" class="form-control">
					</div>

					<button name="submit" type="submit" class="btn btn-success">Submit</button>
				</form>
			</div>
		</div>
		
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-6">
		<div class="panel panel-success pb">
			<div class="panel-heading">
				<h3>Total Sales History</h3>
			</div>
		
		<div class="panel-body">
				<table class="table table-hover tb">
					<tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Sold Quantity</th>
						<th>Sold Price</th>
					</tr>

				<?php
					if(isset($_POST['submit'])){
						$date = $_POST['date'];
						$total = "";
						$_SESSION['date'] = $date;
						$d = $_SESSION['date'];

						$sql = mysqli_query($con, "SELECT product.product_name, sales.p_id, sales.quantity, sales.price, sales.ddate, product_unit.product_unit  FROM product INNER JOIN sales ON product.id = sales.p_id
							INNER JOIN product_unit ON product.product_name = product_unit.product_name WHERE sales.ddate = '$date'");

						$sql2 = mysqli_query($con, "SELECT SUM(price) AS value_sum FROM sales where ddate = '$date' ");
						$row = mysqli_fetch_assoc($sql2);
						$sum = $row['value_sum'];
						$_SESSION['sum'] = $sum;
						$p = $_SESSION['sum'];

						while($row = mysqli_fetch_array($sql)) {
							$pid = $row['p_id'];
							$pname = $row['product_name'];
							$price = $row['price'];
							$quan = $row['quantity'];
							$punit = $row['product_unit'];
							$total += $price;
				?>
				<tr>
					<td><?php echo $pid; ?></td>
					<td><?php echo $pname; ?></td>
					<td><?php echo $quan." ".$punit; ?></td>
					<td><?php echo "BDT ".$price; ?></td>
				</tr>
				
				<?php }} ?>
				</table>
				</div>
				</div>
				<?php

					if(isset($_SESSION['sum']) && isset($_SESSION['date'])){
						echo '<div class="panel-success">
								<div class="panel-footer pb">
									<h4><b>Total Sold:</b> BDT '.$p.' at <b>'.$d.'</b></h4>
								</div>
							</div>';
					}
				?>
			</div>
			
		
		
		

</div>