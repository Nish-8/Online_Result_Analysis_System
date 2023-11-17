<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin</title>


  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  
  <script src="https://kit.fontawesome.com/da1a2ce390.js" crossorigin="anonymous"></script>
</head>

<body>

  <?php
    include "../Includes/admin_include.html"
  ?>

  <div class="container mt-3">

    <div class="row d-flex justify-content-center">

    

      <div class="col-md-3">
        <div class="card text-center bg-light " style="height:18rem;">
          <div class="card-header bg-secondary text-white">
            <div class="row align-items-center">
             
              <div class="col mb-3">
                <h3>8</h3>
                <h6>No.Of Patients</h6>
              </div>
              
              <i class="fa-solid fa-bed fa-5x pb-5"></i>
             
            </div>
          </div>
          <div class="card-footer"></div>
          <h5 >
            <a class="text-decoration-none text-primary " href="PATIENT.HTML"> PATIENTS </a>
           
          </h5>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-center bg-light" style="height:18rem;">
          <div class="card-header bg-secondary text-white">
            <div class="row align-items-center">
              
              <div class="col mb-3">
                <h3>8</h3>
                <h6>No. Of Doctors</h6>
              </div>

             
              <i class="fa-solid fa-user-doctor fa-5x pb-5"></i>
             
            </div>
          </div>
          <div class="card-footer"></div>
          <h5>
            <a class="text-decoration-none text-primary" href="Doctor.html" > DOCTORS </a>
           
          </h5>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-center bg-light" style="height:18rem;">
          <div class="card-header bg-secondary text-white">
            <div class="row align-items-center">
             
              <div class="col mb-3">
                <h3>8</h3>
                <h6>No. Of Appointments</h6>
              </div>
             
              <i class="fa-regular fa-calendar-check fa-5x pb-5"></i>
             
            </div>

          </div>
          <div class="card-footer"></div>
          <h5>
            <a class="text-decoration-none text-primary" href="#">APPOINTMENTS</a>
           
          </h5>
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