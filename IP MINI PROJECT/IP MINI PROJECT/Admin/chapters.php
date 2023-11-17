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
			<div class="card" style=" background:transparent;">
				<div class="card-header">
					Manage Lessons
					<div class="col-md-12 text-right">
						<button type="button" class="btn btn-secondary" style="width:80px;" data-toggle="modal"
							data-target="#exampleModal"> ADD </button>



						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">ADD Lessons</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">

										<form action="add_lesson.php" method="post">
											
											<div class="form-group">
												<select class="custom-select" name="co_id">
													<option selected value="0">Courses</option>
													<?php
														include_once "../Shared/config.php";
														$cmd2="select * from courses";
														$sql_obj2=mysqli_query($conn,$cmd2);
														while($row2=mysqli_fetch_assoc($sql_obj2)){
															$co_id=$row2['co_id'];
															$co_name=$row2['co_name'];
															$domain_id=$row2['d_id'];
															echo "<option value='$co_id'>$co_name</option>";	
														}
													?>
													
												</select>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="exampleFormControlInput1"
													placeholder="Lesson name" name='l_chapname'>
											</div>
											<div class="form-group">
												<label class="form-label" for="customFile">Upload videos</label>
												<input type="text" class="form-control" id="exampleFormControlInput1"
													placeholder="Upload Link" name="l_link">
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
								<th scope="col">Lesson Name</th>
								<th class="col"> Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$cmd3="select * from lessons";
								$sql_obj3=mysqli_query($conn,$cmd3);
								while($row3=mysqli_fetch_assoc($sql_obj3)){
									$l_id=$row3['l_id'];
									$co_id=$row3['co_id'];
									$l_chapname=$row3['l_chapname'];
									$l_link=$row3['l_link'];
									$cmd4="select * from courses where co_id=$co_id limit 1";
									$sql_obj4=mysqli_query($conn,$cmd4);
									$row4=mysqli_fetch_assoc($sql_obj4);
									$co_name=$row4['co_name'];
									$d_id=$row4['d_id'];


									$cmd5="select * from domain where d_id=$d_id limit 1";
									$sql_obj5=mysqli_query($conn,$cmd5);
									$row5=mysqli_fetch_assoc($sql_obj5);
									$d_name=$row5['d_title'];
									echo "<tr>
									<th scope='row'>$l_id</th>
									<td>$d_name</td>
									<td>$co_name</td>
									<td>$l_chapname</td>
									<td>
										<button type='button' class='btn btn-primary btn-sm' style='width:80px;'
											data-toggle='modal' data-target='#exampleModal2$l_id'> Edit</button>
											<button type='button' class='btn btn-danger btn-sm' data-toggle='modal'
											data-target='#exampleModa3$l_id'>Delete </button>	
											</td>
											</tr>		";
									
									echo "<div class='modal fade' id='exampleModal2$l_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
									aria-hidden='true'>
									<div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header'>
												<h5 class='modal-title' id='exampleModalLabel'>EDIT CHAPTERS</h5>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
												</button>
											</div>
											<form action='edit_lesson.php' method='post'>
												<div class='modal-body'>
													<div class='form-group d-none'>
														<input type='text' class='form-control' id='exampleFormControlInput1'
															placeholder='Lesson Name' value='$l_id' readonly name='l_id'>
													</div>
													<div class='form-group'>
														<input type='text' class='form-control' id='exampleFormControlInput1'
															placeholder='Domain Name' value='$d_name' readonly name='d_name'>
													</div>
													<div class='form-group'>
														<input type='text' class='form-control' id='exampleFormControlInput1'
															placeholder='Course Name' value='$co_name' readonly name='co_name'>
													</div>
													<div class='form-group'>
														<input type='text' class='form-control' id='exampleFormControlInput1'
															placeholder='Chapter name' value='$l_chapname'  name='l_chapname'>
													</div>
													<div class='form-group'>
														<label class='form-label' for='customFile'>Upload
															videos</label>
														<input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Upload Link' value='$l_link' name='l_link'>
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
								</div>";
								
								echo "<div class='modal fade' id='exampleModa3$l_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
								aria-hidden='true'>
								<div class='modal-dialog' role='document'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h5 class='modal-title' id='exampleModalLabel'>DELETE CHAPTERS</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>
										<div class='modal-body'>
											Are you sure you want to delete?
										</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
											<button type='button' class='btn btn-danger'><a href='delete_lesson.php?l_id=$l_id' class='text-decoration-none' style='color:white;background-color:transparent;'>Delete</a></button>
										</div>
									</div>
								</div>
							</div>";
								}
							?>
							



									<!-- Modal -->
									
				
				
				
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