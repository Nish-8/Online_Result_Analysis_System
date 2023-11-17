<!doctype html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>DOCTOR</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/da1a2ce390.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<?php
		include "../Includes/admin_include.html"
	?>
	<div class="container-fluid pt-5">
		<div class="jumbotran">
			<div class="card">
				<div class="card-header">
					<h3>Manage Doctors</h3> 
				</div>
				<div class="card-body w-100">
					<table class="table table-striped w-100">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Name</th>
								<th scope="col">Contact No.</th>
								<th scope="col">Email</th>
								<th scope="col">Specialization</th>
								<th scope="col">Qualification</th>
								<th scope="col">Address</th>
								<th scope="col">Verification Status</th>
								<th class="float-right"> Actions</th>

							</tr>
						</thead>
						<tbody class="w-100">
							<?php
								include_once "../Shared/config.php";
								$cmd="select * from doctor";
								$sql_obj=mysqli_query($conn,$cmd);
								$verify;
								while($row=mysqli_fetch_assoc($sql_obj)){
									$d_id=$row['d_id'];
									$d_status=$row['d_status'];
									$d_name=$row['d_name'];
									$d_phno=$row['d_phno'];
									$d_email=$row['d_email'];
									$d_certificate=$row['d_certificate'];
									$d_specialization=$row['d_specialization'];
									$d_qualification=$row['d_qualification'];
									$d_address=$row['d_address'];

									if($d_status==0){
										$verify="Not Verified";
									}
									else{
										$verify="Verified";
									}


									echo "<th scope='row'>$d_id</th>
										<td>$d_name</td>
										<td>$d_phno</td>
										<td>$d_email</td>
										<td>$d_specialization</td>
										<td>$d_qualification</td>
										<td>$d_address</td>
										<td>$verify</td>
										<td class='float-right'>";
										if($d_status==0){
											echo"
										<button type='button' class='btn btn-primary btn-sm' data-toggle='modal'
												data-target='#exampleModa3$d_id'>Verify</button>
										
										<button type='button' class='btn btn-secondary btn-sm' data-toggle='modal'
										data-target='#exampleModal$d_id'>Edit </button>
										<button type='button' class='btn btn-danger btn-sm' data-toggle='modal'
											data-target='#exampleModal2$d_id'>Delete </button>		
									    </td>
										</tr>";
										}
										else{
											echo"
										<button type='button' class='btn btn-primary btn-sm' data-toggle='modal'
												data-target='#exampleModa3$d_id' disabled>Verify</button>
										
										<button type='button' class='btn btn-secondary btn-sm' data-toggle='modal'
										data-target='#exampleModal$d_id'>Edit </button>
										<button type='button' class='btn btn-danger btn-sm' data-toggle='modal'
											data-target='#exampleModal2$d_id'>Delete </button>		
									    </td>
										</tr>";
										}

										// modal for verify

										echo "<div class='modal fade' id='exampleModa3$d_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
										aria-hidden='true'>
										<div class='modal-dialog' role='document'>
											<div class='modal-content'>
												<div class='modal-header'>
													<h5 class='modal-title' id='exampleModalLabel'>Verify Here</h5>
													<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
														<span aria-hidden='true'>&times;</span>
													</button>
												</div>
												<div class='modal-body'>
													<object data='$d_certificate' width='450' height='600'>
													</object>
									
												</div>
												<div class='modal-footer'>
													Are you sure you want to add this or not?
													<button type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
													<a href='verify_doctor.php?d_id=$d_id' class='btn btn-primary'>Verify Doctor</a>
												</div>
											</div>
										</div>
									</div>";
									// modal for edit
									echo "<div class='modal fade' id='exampleModal$d_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
									aria-hidden='true'>
									<div class='modal-dialog' role='document'>
										<div class='modal-content'>
											<div class='modal-header'>
												<h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													<span aria-hidden='true'>&times;</span>
												</button>
											</div>
											<form action='update_doctor_details.php' method='post'>
												<div class='modal-body'>
								
													<div class='form-group'>
														<input type='text' class='form-control' id='' placeholder='ID' name='doctor_id' value='$d_id' readonly>
													</div>
													<div class='form-group'>
														<input type='text' class='form-control' id='exampleFormControlInput1' placeholder='name' name='d_name'>
													</div>
													<div class='form-group'>
														<input type='text' class='form-control' id='exampleFormControlInput1' placeholder='contact no.' name='d_phno'>
													</div>
													<div class='form-group'>
														<input type='email' class='form-control' id='exampleFormControlInput1' placeholder='Email' name='d_email'>
													</div>
													<div class='form-group'>
														<input type='text' class='form-control' id='exampleFormControlInput1'
															placeholder='Specialization' name='d_specialization'>
													</div>
													<div class='form-group'>
														<input type='text' class='form-control' id='exampleFormControlInput1'
															placeholder='Qualification' name='d_qualification'>
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

								echo "<div class='modal fade' id='exampleModal2$d_id' tabindex='-1' role='dialog'
											aria-labelledby='exampleModalLabel' aria-hidden='true'>
											<div class='modal-dialog' role='document'>
												<div class='modal-content'>
													<div class='modal-header'>
														<h5 class='modal-title' id='exampleModalLabel'>Delete</h5>
														<button type='button' class='close' data-dismiss='modal'
															aria-label='Close'>
															<span aria-hidden='true'>&times;</span>
														</button>
													</div>
													<div class='modal-body'>
														Are you sure you want to delete doctor $d_name ?
													</div>
													
													<div class='modal-footer'>
														<button type='button' class='btn btn-secondary'
															data-dismiss='modal'>Close</button>
														    <a href='delete_doctor.php?d_id=$d_id' class='btn btn-primary'>Delete Patient</a>
														
													</div>
												</div>
											</div>
										</div>";
									

								}
							?>
							
									
										
									
										
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
</body>

</html>