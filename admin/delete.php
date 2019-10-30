<?php
	
	
	include('../inc/connect.php');
	if(isset($_GET['emdel'])){
		$delete_id = $_GET['emdel'];
		
		$sql1 = mysqli_query($con, "DELETE from employee_info where id = '$delete_id'");
		$sql2 = mysqli_query($con, "DELETE from employee_post where emp_id = '$delete_id'");
		$sql3 = mysqli_query($con, "DELETE from employee_salary where emp_id = '$delete_id'");
		if($sql1 && $sql2 && $sql3){
			echo "<script>alert('Post has been deleted')</script>";
			echo "<script>window.open('employee.php','_self')</script>";
		}
		else{
			echo "hoy nai";
		}
	}
?>