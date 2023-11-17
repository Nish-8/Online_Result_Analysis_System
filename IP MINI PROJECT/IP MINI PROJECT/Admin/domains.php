<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Domains</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<!--  font awsome cdn -->
	<link rel="stylesheet" type="text/css"
		href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>
	<?php
    	include "../Includes/admin_include.html";
  	?>

	<div class="container col-md-6 mt-5">
		<div class="jumbotran">
			<div class="card" style=" background:transparent;">
				<div class="card-header">
					Manage Domains
					<div class="col-md-12 text-right">
						<button type="button" class="btn btn-secondary" style="width:80px;" data-toggle="modal"
							data-target="#exampleModal"> ADD </button>



						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content"style="background-color:#eecfff;">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">ADD DOMAIN</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="add_domain.php" method="post" enctype="multipart/form-data">
										<div class="modal-body">

											
												<div class="form-group">
													<input type="text" class="form-control" id="exampleFormControlInput1"
														placeholder="name" name="d_name">
													<label class="form-label" for="customFile">Upload image</label>
													<input type="file" class="form-control" id="customFile" name="d_img" accept="image/*"/>
												</div>
											


										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Upload Domain</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-responsive table">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Name</th>
								<th class="col"> Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include_once "../Shared/config.php";
								$cmd="select * from domain";
								$sql_obj=mysqli_query($conn,$cmd);
								while($row=mysqli_fetch_assoc($sql_obj)){
									$d_id=$row['d_id'];
									$d_name=$row['d_title'];
									echo "<tr>
									<th scope='row'>$d_id</th>
									<td>$d_name</td>
									<td>
										<button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#exampleModal$d_id'>Edit
										</button>
								
										<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#exampleModa3$d_id'>Delete
										</button>
								
									</td>
									</tr>";

									echo "<div class='modal fade' id='exampleModal$d_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
									aria-hidden='true'>
									<div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header'>
												<h5 class='modal-title' id='exampleModalLabel'>EDIT DOMAIN</h5>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
												</button>
											</div>
											<form action='edit_domain.php' method='post' enctype='multipart/form-data'>
												<div class='modal-body'>
														<div class='form-group'>
														<input type='text' class='form-control d-none' id='exampleFormControlInput1' placeholder='ID' value='$d_id' name='id'>
															<input type='text' class='form-control' id='exampleFormControlInput1' placeholder='name' value='$d_name' name='name'>
															<label class='form-label' for='customFile'>Upload
																image</label>
															<input type='file' class='form-control' id='customFile' name='img' />
														</div>
												</div>
												<div class='modal-footer'>
													<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
													<button type='submit' class='btn btn-primary'>Save changes</button>
												</div>
											</form>
										</div>
									</div>
								</div>";

								echo "<div class='modal fade' id='exampleModa3$d_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
								aria-hidden='true'>
								<div class='modal-dialog' role='document'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h5 class='modal-title' id='exampleModalLabel'>DELETE DOMAIN</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>
										<div class='modal-body'>
											Are you sure you want to delete?  The Chapters and Lessons associated with the domain will also be deleted
										</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
											<button type='button' class='btn btn-danger'><a href='delete_domain.php?d_id=$d_id' class='text-decoration-none' style='color:white;background-color:transparent;'>Delete</a></button>
											
										</div>
											</div>
										</div>
									</div>";
								}
							?>
							
							<!-- Edit modal -->
							
									<!-- Delete modal -->
									
							<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
								integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
								crossorigin="anonymous"></script>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
								integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
								crossorigin="anonymous"></script>
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
								integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
								crossorigin="anonymous"></script>

</body>

</html>