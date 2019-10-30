<?php
	include('inc/header.php');
	if(isset($_GET['emedit'])){
		$id = $_GET['emedit'];
		$_SESSION['edit_id'] = $id;
		$sql = mysqli_query($con, "SELECT * from employee_info inner join employee_post on employee_info.id = employee_post.emp_id 
			   inner join employee_salary on employee_info.id = employee_salary.emp_id WHERE employee_info.id = '$id'");
		while ($row = mysqli_fetch_array($sql)){
			$ename = $row['name'];
			$ephone = $row['phone_no'];
			$eadd = $row['address'];
			$epost = $row['post'];
			$esal = $row['salary'];
			$esex = $row['sex'];
			$epic = $row['pro_pic'];
			$_SESSION['emp_pic'] = $epic;
			$_SESSION['esex'] = $esex;

		

?>

<div class="col-md-3"></div>
<div class="col-md-6 loadf" style="border: 1px solid silver;padding: 10px;background-color: #dddddd; padding-bottom: 20px;">
	<form action="" method="POST" enctype="multipart/form-data">
	  <div class="form-group">
	    <label>Employee Name</label>
	    <input name="ename" class="form-control" placeholder="Employee Name" value="<?php echo $ename; ?>">
	  </div>
	  
	  <div class="form-group">
	    <label>Employee Phone no.</label>
	    <input name="ephone" class="form-control" placeholder="Employee Phone no." value="<?php echo $ephone; ?>">
	  </div>
	  <div class="form-group">
	    <label>Employee Address</label>
	    <input name="eadd" class="form-control" placeholder="Employee Address" value="<?php echo $eadd; ?>">
	  </div>
	  <div class="form-group">
	    <label>Employee Post</label><br>
	    <select name="epost">
	    	<option value="<?php echo $epost; ?>"><?php echo $epost; ?></option>
	    	<option value="Salseman">Salseman</option>
	    	<option value="Salsemanager">Salsemanager</option>
	    	<option value="Delivery man">Delivery man</option>
	    	<option value="IT director">IT director</option>
	    	<option value="Creative director">Creative director</option>
	    </select>
	  </div>

	  <div class="form-group">
	    <label>Employee Salary</label>
	    <input name="esal" class="form-control" placeholder="Employee Salary" value="<?php echo $esal; ?>">
	  </div>

	  <div class="form-group">
	    <label>Employee Sex</label><br>
	    
	    	<label class="radio-inline"><input type="radio" name="radio" value="Male">Male</label>
	    
			<label class="radio-inline"><input type="radio" name="radio" value="Female">Female</label>
		
	  </div>
	  
	  <div class="form-group">
	  	<label>Employee Photo</label>
	    <img src="images/<?php echo $epic; ?>" height="120" width="120">
	    <input name="image" type="file" id="exampleInputFile">
	    
	  </div>
	  
	  <button name="submit" type="submit" class="btn btn-success">Submit</button>
	</form>
	<?php }} ?>
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
		$eid = $_SESSION['edit_id'];
		$pic = $_SESSION['emp_pic'];
		$sex = $_SESSION['esex'];
		
		if($ename || $esex || $ephone || $eadd || $epost || $esal){

			$location = 'images/';
			move_uploaded_file($tmp_name, $location.$post_image);

			if($post_image == ''){
				$sql1 = mysqli_query($con, "UPDATE `employee_info` set `name` = '$ename', `phone_no` = '$ephone', `address` = '$eadd', `sex` = '$esex',`pro_pic` = '$pic' where id = '$eid' ");
			}
			else if($esex == ''){
				$sql1 = mysqli_query($con, "UPDATE `employee_info` set `name` = '$ename', `phone_no` = '$ephone', `address` = '$eadd', `sex` = '$sex',`pro_pic` = '$post_image' where id = '$eid' ");
			}
			else{
				$sql1 = mysqli_query($con, "UPDATE `employee_info` set `name` = '$ename', `phone_no` = '$ephone', `address` = '$eadd', `sex` = '$esex',`pro_pic` = '$post_image' where id = '$eid' ");
			}

			

			$sql2 = mysqli_query($con, "UPDATE `employee_post` set `post` = '$epost' where emp_id = '$eid'");

			$sql3 = mysqli_query($con, "UPDATE `employee_salary` set `salary` = '$esal' where emp_id = '$eid'");

			echo "<script>alert('Info updated to the system successfully!')</script>";
			echo "<script>window.open('employee.php','_self')</script>";
		}
		else{
			echo "<script>alert('Some of the fields are empty!')</script>";
		}


	}
?>