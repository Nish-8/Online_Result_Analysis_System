<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>PATIENT</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/da1a2ce390.js" crossorigin="anonymous"></script>
</head>

<body>

	<?php
		include "../Includes/admin_include.html"
	?>


	<div class="container">
		<div class="jumbotran">
			<div class="card">
				<div class="card-header">
					<h3 class="">Manage Patients</h3> 
					
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Name</th>
								<th scope="col">Contact No.</th>
								<th scope="col">Email</th>
								<th scope="col">Medical History</th>
								<th class="float-right"> Actions</th>

							</tr>
						</thead>
						<tbody>
							
								<?php
									include_once "../Shared/config.php";

									$cmd="Select * from patients";

									$sql_obj=mysqli_query($conn,$cmd);
									
									while($row=mysqli_fetch_assoc($sql_obj)){
										$p_id=$row['p_id'];
										
										echo "<script>console.log('$p_id')</script>";
										$p_name=$row['p_name'];
										
										
										$p_email=$row['p_email'];
										$p_phno=$row['p_phno'];
										$p_medhistory=$row['p_medhistory'];
										// echo for the rows
										echo "  <tr>
												<th scope='row'>$p_id</th>
												<td>$p_name</td>
												<td>$p_phno</td>
												<td>$p_email</td>
												<td>$p_medhistory</td>
												<td class='float-right'>
												<button type='button' class='btn btn-secondary btn-sm' data-toggle='modal'
												data-target='#exampleModal1$p_id'>Edit </button>
												<button type='button' class='btn btn-danger btn-sm' data-toggle='modal'
												data-target='#exampleModal2$p_id'>Delete</button>
												</td>
												</tr>";
										// echo for the edit modal
											echo "<div class='modal fade' id='exampleModal1$p_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
											aria-hidden='true'>
											<div class='modal-dialog' role='document'>
												<div class='modal-content'>
													<div class='modal-header'>
														<h5 class='modal-title' id='exampleModalLabel'>Edit</h5>
														<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
															<span aria-hidden='true'>&times;</span>
														</button>
													</div>
													<form action='update_patient_details.php' method='post'>
														<div class='modal-body'>
										
															<div class='form-group'>
																<input type='text' class='form-control' id='' placeholder='ID' name='patient_id' value='$p_id' readonly>
															</div>
															
															<div class='form-group'>
																<input type='text' class='form-control' id='exampleFormControlInput1' placeholder='name' name='name' required>
															</div>
															<div class='form-group'>
																<input type='text' class='form-control' id='exampleFormControlInput1' placeholder='contact no.' name='phno' required>
															</div>
															<div class='form-group'>
																<input type='email' class='form-control' id='exampleFormControlInput1' placeholder='Email' name='email' required>
															</div>
															<div class='form-group'>
																<input type='text' class='form-control' id='exampleFormControlInput1'
																	placeholder='Medical History' name='medhistory' required>
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
									// echo for the delete modal
											echo "<div class='modal fade' id='exampleModal2$p_id' tabindex='-1' role='dialog'
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
														Are you sure you want to delete patient $p_name ?
													</div>
													
													<div class='modal-footer'>
														<button type='button' class='btn btn-secondary'
															data-dismiss='modal'>Close</button>
														    <a href='delete_patient_details.php?p_id=$p_id' class='btn btn-primary'>Delete Patient</a>
														
													</div>
												</div>
											</div>
										</div>";
										


									}
								?>
								

									<!-- Code of edit modal -->

									<!-- <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form action="">
													<div class="modal-body">

														
															<div class="form-group">
																<input type="text" class="form-control"
																	id="exampleFormControlInput1" placeholder="name">
															</div>
															<div class="form-group">
																<input type="text" class="form-control"
																	id="exampleFormControlInput1" placeholder="contact no.">
															</div>
															<div class="form-group">
																<input type="email" class="form-control"
																	id="exampleFormControlInput1" placeholder="Email">
															</div>
															<div class="form-group">
																<input type="text" class="form-control"
																	id="exampleFormControlInput1"
																	placeholder="Specialization">
															</div>
															
																<div class="form-group">
																	<label for="exampleFormControlFile1"
																		class="float-left">Upload your files here</label>
																	<input type="file" class="form-control-file"
																		id="exampleFormControlFile1">
																</div>
															
														

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary">Save changes</button>
													</div>
												</form>
											</div>
										</div>
									</div> -->



									<!-- delete starts here -->
									
									<!-- Code of delete modal -->


									<!-- <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													Are you sure you want to delete?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Save changes</button>
												</div>
											</div>
										</div>
									</div> -->
								
							<!-- <tr>
								<th scope="row">2</th>
								<td>Jacob</td>
								<td>Thornton</td>
								<td>@fat</td>
								<td>nkk </td>
								<td><button type="button" class="btn btn-primary btn-sm">View</button>
									<button type="button" class="btn btn-secondary btn-sm">Edit</button>
									<button type="button" class="btn btn-danger btn-sm">Delete</button>
								</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
								<td>nkk </td>
								<td><button type="button" class="btn btn-primary btn-sm">View</button>
									<button type="button" class="btn btn-secondary btn-sm">Edit</button>
									<button type="button" class="btn btn-danger btn-sm">Delete</button>
								</td>
							</tr> -->
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