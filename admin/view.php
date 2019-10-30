<?php 
	include('inc/header.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('location: admin_login.php');
	}
	if(isset($_GET['emv'])){

		$view_id = $_GET['emv'];
		$sql = mysqli_query($con, "SELECT * from employee_info inner join employee_post on employee_info.id = employee_post.emp_id 
			   inner join employee_salary on employee_info.id = employee_salary.emp_id WHERE employee_info.id = '$view_id'");

		while ($row = mysqli_fetch_array($sql)){
			$eid = $row['emp_id'];
			$ename = $row['name'];
			$ephone = $row['phone_no'];
			$eadd = $row['address'];
			$epost = $row['post'];
			$esal = $row['salary'];
			$esex = $row['sex'];
			$epic = $row['pro_pic'];
	
?>


<div class="col-md-12">
	<div class="col-md-3"></div>
	<div class="col-md-6" style="
    border: 1px solid silver;
    padding: 20px;
    border-radius: 4px;
    background-color: aliceblue;">
		<div class="col-md-6">
			<img src="images/<?php echo $epic ?>" style= "width: 250px; height: 250px; border: 1px solid darkgrey; border-radius: 2px;">
			
		</div>
		<div class="col-md-6">
			<p><b>Name: </b> <?php echo $ename; ?></p>
			<p><b>Sex: </b> <?php echo $esex; ?></p>
			<p><b>Address: </b> <?php echo $eadd; ?></p>
			<p><b>Phone: </b> <?php echo $ephone; ?></p>
			<p><b>Post: </b> <?php echo $epost; ?></p>
			<p><b>Salary: </b> <?php echo $esal." BDT"; ?></p>

		</div>
		<div class="col-md-12" style="padding-top: 20px;">
			<a href="edit.php?emedit=<?php echo $eid; ?>" class="btn btn-primary">Edit</a>
			<a href="delete.php?emdel=<?php echo $eid; ?>" class="btn btn-default">Delete</a>
		</div>
	</div>
</div>
<?php }} ?>