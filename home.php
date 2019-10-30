<?php
	include('inc/header.php');
	session_start();
	if(!isset($_SESSION['user'])){
		header('location: userlogin.php');
	}
?>
<div class="container">
	<div class="panel panel-info pb">
		<div class="panel-heading">
			<h3>Happy Dealing!</h3>
		</div>
	</div>

	<div class="row">
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img src="images/g1.jpg" alt="..." height="280" width="300">
	      <div class="caption">
	        <h3>Thumbnail label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-success" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>

	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img src="images/g3.jpg" alt="..." height="280" width="300">
	      <div class="caption">
	        <h3>Thumbnail label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-success" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>

	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img src="images/g4.jpg" alt="..." height="320" width="300">
	      <div class="caption">
	        <h3>Thumbnail label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-success" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
	</div>
</div>