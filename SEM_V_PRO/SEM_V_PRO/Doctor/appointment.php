<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment</title>
  <link rel="stylesheet" href="app.css">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

  <script src="https://kit.fontawesome.com/da1a2ce390.js" crossorigin="anonymous"></script>

</head>

<body>
  <!-- include your php tag below -->
  <?php
    include "../Includes/doctor_include.html"
  ?>

 
  <div class="row mt-5 d-flex justify-content-center">

              <div class="card mb-3 col-lg-6 me-5 p-5 bg-light" style="max-width: 40%;margin-top:1%">
              <div class="row g-0">
                <div class="col-md-4">
                <img src="../Images/doctor.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Quote of the day</h5>
                    <p class="card-text">"Whereever trhe art of medicine is loved, there is also a love of Humanity"</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3 col-lg-6 me-5 p-5 bg-light" style="max-width: 40%; margin-top:1%">
              <div class="row g-0">
                <div class="col-md-4">
                <img src="../Images/appointment.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h3 class="text-center fs-1">8</h3>
                    <h6 class="text-center fs-4">No. Of Appointments</h6>  
              </div>
                </div>
              </div>
            </div>
     
        
  </div>


    <div class="card mt-5 px-4 d-flex justify-content-center">
      <table class="table caption-top table-light table-responsive">
        <caption class="text-centre">Appointmemts</caption>
        <thead class="table-light">
          <tr>
            <th scope="col">Patient Name</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Meet Link</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <tr>

            <td>Unknown</td>
            <td>10:50 PM</td>
            <td>10/12/2050</td>
            <td><a href="">https://meet.google.com/iuk-qhtq-iso</a></td>
            <td>Resolved</td>
            <td> 
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Completed
              </button>
            </td>
          </tr>
          <tr>

            <td>Unknown2</td>
            <td>11:30</td>
            <td>10/12/2060</td>
            <td><a href="">https://meet.google.com/iuk-qhtq-iso</a></td>
            <td>Pending</td>
            <td> 
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Completed
              </button>
            </td>
          </tr>
          <tr>

            <td>Unknown3</td>
            <td>11:30</td>
            <td>10/12/2060</td>
            <td><a href="">https://meet.google.com/iuk-qhtq-iso</a></td>
            <td>Pending</td>
            <td> 
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Completed
              </button>
            </td>
          </tr>
          <tr>

            <td>Unknown4</td>
            <td>11:30</td>
            <td>10/12/2060</td>
            <td><a href="">https://meet.google.com/iuk-qhtq-iso</a></td>
            <td>Pending</td>
            <td> 
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Completed
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      </div>
 

</body>

</html>