<?php 
	include('inc/header.php');
	session_start();
	if(!isset($_SESSION['admin'])){
		header('location: admin_login.php');
	}
?>

<div class="container">
	<div class="row">
	  <?php
	      
	      $sql = mysqli_query($con, "SELECT * from employee_info inner join employee_post on employee_info.id = employee_post.emp_id");
	      while($row = mysqli_fetch_array($sql)) {
	      	  $ename = $row['name'];
	      	  $eid = $row['id'];
	      	  $epost = $row['post'];
	      	  $pic = $row['pro_pic'];
	      
	  ?>
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail em">
	      <img src="images/<?php echo $pic; ?>" alt="...">
	      <div class="caption">
	        
	        <h4><?php echo $ename; ?></h4>
	        <p><?php echo $epost; ?></p>
	        <p><a href="edit.php?emedit=<?php echo $eid; ?>" class="btn btn-primary" role="button">Edit</a> <a href="view.php?emv=<?php echo $eid; ?>" class="btn btn-info" role="button">View</a>
	        	<a href="delete.php?emdel=<?php echo $eid; ?>" class="btn btn-default" role="button">Delete</a>
	        </p>
	      </div>
	    </div>
	  </div>
	  <?php } ?>
	  
	</div>
</div>