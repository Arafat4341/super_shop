<?php 
	include('inc/header.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('location: admin_login.php');
	}
?>
<div class="col-md-3"></div>
<div class="col-md-6 loadf" style="border: 1px solid silver;padding: 10px;background-color: #dddddd;">
	<form action="" method="POST">
	  <div class="form-group">
	    <label>Product Name</label>
	    <input name="pname" class="form-control" placeholder="Profuct Name">
	  </div>
	  <div class="form-group">
	    <label>Product Category</label>
	    <input name="pcat" class="form-control" placeholder="Profuct Category">
	  </div>
	  <div class="form-group">
	    <label>Product Quantity</label>
	    <input name="pquan" class="form-control" placeholder="Profuct Quantity">
	  </div>
	  <div class="form-group">
	    <label>Product Unit</label>
	    <input name="punit" class="form-control" placeholder="Profuct Unit">
	  </div>
	  <div class="form-group">
	    <label>Wholesale Price Per Unit</label>
	    <input name="pwprice" class="form-control" placeholder="Profuct Name">
	  </div>
	  <div class="form-group">
	    <label>Retail Price Per Unit</label>
	    <input name="prprice" class="form-control" placeholder="Profuct Name">
	  </div>
	  <div class="form-group">
	  	<label>Sample photo of product(optional)</label>
	    
	    <input type="file" id="exampleInputFile">
	    
	  </div>
	  
	  <button name="submit" type="submit" class="btn btn-success">Submit</button>
	</form>
</div>
<?php include('inc/footer.php'); ?>

<?php
	if(isset($_POST['submit'])){

		$pname = $_POST['pname'];
		$pcat = $_POST['pcat'];
		$pquan = $_POST['pquan'];
		$punit = $_POST['punit'];
		$pwprice = $_POST['pwprice'];
		$prprice = $_POST['prprice'];
		$pid = "";
		$tw = $pwprice * $pquan;
		$tr = $prprice * $pquan;

		$sql1 = mysqli_query($con, "INSERT INTO `product`(`product_name`) VALUES ('$pname')");
		$getid = mysqli_query($con, "SELECT * FROM `product` WHERE product_name = '$pname'");

		while ($row = mysqli_fetch_array($getid)) {
			$pid = $row['id'];
		}

		$sql2 = mysqli_query($con, "INSERT INTO `product_category`(`product_id`, `product_category`) VALUES ('$pid','$pcat')");

		$sql3 = mysqli_query($con, "INSERT INTO `product_quantity`(`product_id`, `product_quantity`) VALUES ('$pid','$pquan')");

		$sql4 = mysqli_query($con, "INSERT INTO `product_unit`(`product_name`, `product_unit`) VALUES ('$pname', '$punit')");

		$sql5 = mysqli_query($con, "INSERT INTO `product_price`(`product_id`, `wholesale_price_per_unit`, `retail_price_per_unit`, total_wprice, total_rprice) VALUES ('$pid','$pwprice','$prprice', '$tw', '$tr')");

		echo "<script>alert('Item added to stock successfully!')</script>";
		echo "<script>window.open('stock.php','_self')</script>";


	}
?>