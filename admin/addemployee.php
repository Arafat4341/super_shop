<?php 
	include('inc/header.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('location: admin_login.php');
	}
?>
<div class="col-md-3"></div>
<div class="col-md-6 loadf" style="border: 1px solid silver;padding: 10px;background-color: #dddddd;">
	<form action="" method="POST" enctype="multipart/form-data">
	  <div class="form-group">
	    <label>Employee Name</label>
	    <input name="ename" class="form-control" placeholder="Employee Name">
	  </div>
	  
	  <div class="form-group">
	    <label>Employee Phone no.</label>
	    <input name="ephone" class="form-control" placeholder="Employee Phone no.">
	  </div>
	  <div class="form-group">
	    <label>Employee Address</label>
	    <input name="eadd" class="form-control" placeholder="Employee Address">
	  </div>
	  <div class="form-group">
	    <label>Employee Post</label><br>
	    <select name="epost">
	    	<option value="Salseman">Salseman</option>
	    	<option value="Salsemanager">Salsemanager</option>
	    	<option value="Delivery man">Delivery man</option>
	    	<option value="IT director">IT director</option>
	    	<option value="Creative director">Creative director</option>
	    </select>
	  </div>

	  <div class="form-group">
	    <label>Employee Salary</label>
	    <input name="esal" class="form-control" placeholder="Employee Salary">
	  </div>

	  <div class="form-group">
	    <label>Employee Sex</label><br>
	    
	    	<label class="radio-inline"><input type="radio" name="radio" value="Male">Male</label>
	    
			<label class="radio-inline"><input type="radio" name="radio" value="Female">Female</label>
		
	  </div>
	  
	  <div class="form-group">
	  	<label>Employee Photo</label>
	    
	    <input name="image" type="file" id="exampleInputFile">
	    
	  </div>
	  
	  <button name="submit" type="submit" class="btn btn-success">Submit</button>
	</form>
</div>
<?php include('inc/footer.php'); ?>

<?php
	if(isset($_POST['submit'])){

		$ename = $_POST['ename'];
		$esex = $_POST['radio'];
		$ephone = $_POST['ephone'];
		$eadd = $_POST['eadd'];
		$epost = $_POST['epost'];
		$esal = $_POST['esal'];
		$post_image = $_FILES["image"]["name"];
		$tmp_name = $_FILES['image']['tmp_name'];
		$eid = "";

		if($ename && $esex && $ephone && $eadd && $epost && $esal){

			$location = 'images/';
			move_uploaded_file($tmp_name, $location.$post_image);

			$sql1 = mysqli_query($con, "INSERT INTO `employee_info`(`name`, `phone_no`, `address`, `sex`,`pro_pic`) VALUES ('$ename', '$ephone', '$eadd', '$esex', '$post_image')");
			$getid = mysqli_query($con, "SELECT * FROM `employee_info` WHERE phone_no = '$ephone'");

			while ($row = mysqli_fetch_array($getid)) {
				$eid = $row['id'];
			}

			$sql2 = mysqli_query($con, "INSERT INTO `employee_post`(`emp_id`, `post`) VALUES ('$eid','$epost')");

			$sql3 = mysqli_query($con, "INSERT INTO `employee_salary`(`emp_id`, `salary`) VALUES ('$eid','$esal')");

			$sql4 = mysqli_query($con, "INSERT INTO `salemanager`(`emp_id`) VALUES ('$eid')");

			echo "<script>alert('Info added to the system successfully!')</script>";
			echo "<script>window.open('employee.php','_self')</script>";
		}
		else{
			echo "<script>alert('Some of the fields are empty!')</script>";
		}


	}
?>