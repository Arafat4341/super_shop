<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location: userlogin.php');
	}
?>

<?php include('inc/header.php'); ?>

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading ph">
			<h2 style="text-align: center;">Today is: <?php echo date('d M, Y') ?></h2>
		</div>
		<div class="panel-body pb">
			<h4>Happy dealing!</h4>
		</div>
	</div>

	<div class="col-md-4">
		<form action="" method="post" style="
										    background: gainsboro;
										    border: 1px solid silver;
										    border-radius: 4px;
										    padding: 10px; ">

			<div class="form-group">
			    <label>Product ID</label>
			    <input name="pid" class="form-control" placeholder="Product ID">
			</div>

			<div class="form-group">
			    <label>Product Quantity (units)</label>
			    <input name="pquan" class="form-control" placeholder="Product Quantity">

			</div>



			<button name="submit" type="submit" class="btn btn-success">Submit</button>

		</form>
	</div>
	<div class="col-md-3"></div>
	<div class="col-md-5">
		<div class="panel panel-success pb">
			<div class="panel-heading">
				<h3>Available Products</h3>
			</div>
		</div>
		<table class="table table-bordered tb">
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Product Price per Unit (BDT)</th>
			</tr>
			<?php
				$sql = mysqli_query($con, "SELECT product.id, product.product_name, product_price.retail_price_per_unit from product inner join product_price on product.id = product_price.product_id where 1");
				while ($row = mysqli_fetch_array($sql)) {
					$p_id = $row['id'];
					$pname = $row['product_name'];
					$pr = $row['retail_price_per_unit'];
				
			?>
			<tr>
				<td><?php echo $p_id; ?></td>
				<td><?php echo $pname; ?></td>
				<td><?php echo $pr; ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>

<?php
	if(isset($_POST['submit'])){
		$pid = $_POST['pid'];
		$pquan = $_POST['pquan'];
		$date = date('Y-m-d');
		$price = "";
		$pname = "";
		$sql = mysqli_query($con, "SELECT * from product where id = '$pid'");

		while ($r = mysqli_fetch_array($sql)) {
			$pname = $r['product_name'];
		}

		if(mysqli_num_rows($sql) > 0){
			$sql2 = mysqli_query($con, "select * from product_price where product_id = '$pid' ");
			while($row = mysqli_fetch_array($sql2)){
				$rp = $row['retail_price_per_unit'];
				$price = $rp * $pquan;
			}
			$s = mysqli_query($con, "INSERT INTO `sales`(`p_id`, `quantity`, `price`, `ddate`) VALUES ('$pid','$pquan','$price','$date')");

			$s2 = mysqli_query($con, "UPDATE `product_quantity` SET `product_quantity`= `product_quantity`-'$pquan' WHERE product_id = '$pid' ");

			echo "<script>alert('Product Name: $pname \\n\\nProduct Price: BDT $price');</script>";
		}
		else{
			echo "<script>alert('Invalid product ID!')</script>";
		}
	}
?>