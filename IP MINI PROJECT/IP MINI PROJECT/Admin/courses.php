<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Courses</title>
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
			<div class="card"style="background-color:#eecfff;">
				<div class="card-header">
					Manage Courses
					<div class="col-md-12 text-right">
						<button type="button" class="btn btn-secondary" style="width:80px;" data-toggle="modal"
							data-target="#exampleModal"> ADD </button>


							<?php
								
								
							?>
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">ADD COURSE</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="add_courses.php" method="post">
										<div class="modal-body">

										
												<div class="form-group">
													<select class="custom-select" required name='d_id'>
														<option selected value="0">Domains</option>
														<?php
															include_once "../Shared/config.php";
															$cmd1="select * from domain";
															$sql_obj1=mysqli_query($conn,$cmd1);
															while($row1=mysqli_fetch_assoc($sql_obj1)){
																$d_id=$row1['d_id'];
																$d_name=$row1['d_title'];
																echo "<option value='$d_id'>$d_name</option>";
															}
														?>
													</select>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" id="exampleFormControlInput1"
														placeholder="Course name" name="c_name">
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save changes</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Domain</th>
								<th scope="col">Courses</th>
								<th class="col"> Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$cmd2="select * from courses";
								$sql_obj2=mysqli_query($conn,$cmd2);

								while($row2=mysqli_fetch_assoc($sql_obj2)){
									$co_id=$row2['co_id'];
									$domain_id=$row2['d_id'];
									$co_name=$row2['co_name'];

									$cmd3="select * from domain where d_id=$domain_id limit 1";
									$sql_obj3=mysqli_query($conn,$cmd3);
									$row=mysqli_fetch_assoc($sql_obj3);
									$domain_name=$row['d_title'];
									echo "<tr>
									<th scope='row'>$co_id</th>
									<td>$domain_name</td>
									<td>$co_name</td>
									<td>
										<button type='button' class='btn btn-primary btn-sm' style='width:80px;' data-toggle='modal'
											data-target='#exampleModal2$co_id'> Edit</button>
								
								
								
										<!-- Modal -->
										<div class='modal fade' id='exampleModal2$co_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
											aria-hidden='true'>
											<div class='modal-dialog' role='document'>
												<div class='modal-content'>
													<div class='modal-header'>
														<h5 class='modal-title' id='exampleModalLabel'>EDIT COURSE</h5>
														<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
															<span aria-hidden='true'>&times;</span>
														</button>
													</div>
													<div class='modal-body'>
								
															<form action='edit_courses.php' method='post'>
																<div class='form-group'>
																	<input type='text' class='form-control d-none' id='exampleFormControlInput1'
																		placeholder='Course id' name='co_id' value=$co_id>
																</div>
																<div class='form-group'>
																	<input type='text' class='form-control' id='exampleFormControlInput1'
																		placeholder='Domain' name='domain_name' value='$domain_name' readonly>
																</div>
																<div class='form-group'>
																	<input type='text' class='form-control' id='exampleFormControlInput1'
																		placeholder='Change Course name' name='co_name' value='$co_name'>
																</div>
									
											
																</div>
											
											
																
											
											
															</div>
															<div class='modal-footer'>
																<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
																<button type='submit' class='btn btn-primary'>Save changes</button>
															</div>
														</form>
											</div>
										</div>
										</div>
										<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#exampleModa3$co_id'>Delete
										</button>
										<div class='modal fade' id='exampleModa3$co_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
											aria-hidden='true'>
											<div class='modal-dialog' role='document'>
												<div class='modal-content'>
													<div class='modal-header'>
														<h5 class='modal-title' id='exampleModalLabel'>Delete Course</h5>
														<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
															<span aria-hidden='true'>&times;</span>
														</button>
													</div>
													<div class='modal-body'>
														Are you sure you want to delete? The Lessons Associated with the courses will also be deleted
													</div>
													<div class='modal-footer'>
														<button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
														<button type='button' class='btn btn-danger'><a href='delete_courses.php?co_id=$co_id' class='text-decoration-none' style='color:white;background-color:transparent;'>Delete</a></button>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>";
								}

							?>
							
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