<?php 
	include('inc/header.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('location: admin_login.php');
	}
?>
<div class="container">
	<div class="row">
		<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Product Category</th>
				<th>Product Available</th>
				<th>Wholesale price</th>
				<th>Retail price</th>
			</tr>
			<?php
				$cnt = 0;
				$sql = mysqli_query($con, "SELECT * FROM `product` inner join `product_category` on product.id = product_category.product_id
					 inner join `product_price`  on product.id = product_price.product_id
					 inner join `product_quantity`  on product.id = product_quantity.product_id
					 inner join `product_unit`  on product.product_name = product_unit.product_name");
				
				while ($row = mysqli_fetch_array($sql)) {
					$cnt++;
					$pid = $row['product_id'];
					$pname = $row['product_name'];
					$pcat = $row['product_category'];
					$pquan = $row['product_quantity'];
					$wprice = $row['wholesale_price_per_unit'] * $pquan;
					$rprice = $row['retail_price_per_unit'] * $pquan;
					$punit = $row['product_unit'];
				
			?>
			<tr>
				<td><?php echo $cnt; ?></td>
				<td><?php echo $pid; ?></td>
				<td><?php echo $pname; ?></td>
				<td><?php echo $pcat; ?></td>
				<td><?php echo $pquan." ".$punit; ?></td>
				<td><?php echo "BDT ".$wprice." /="; ?></td>
				<td><?php echo "BDT ".$rprice." /="; ?></td>
				
			</tr>
			<?php } ?>
		</table>
	  
	</div>
</div>