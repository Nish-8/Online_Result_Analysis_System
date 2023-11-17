<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/da1a2ce390.js" crossorigin="anonymous"></script>

  <!-- <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="style.css"> -->
</head>

<body>


  <!-- Change your includes below -->

  <?php
    include "../Includes/doctor_include.html"
  ?>

  <div class="container-xl">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
      
    </nav>
    
    <div class="row d-flex justify-content-center mt-5">
      <div class="col-xl-8">
        <!-- Appointment details card-->
        <div class="card mb-4">
          <div class="card-header bg-primary text-white text-center fs-5">Appointment Status</div>
          <div class="card-body">
            <form>
                <div class="container">
                    <h3>Your Appointment has been successfully booked!</h3>
                    <p class="mt-5 text-center fs-4" id="">Click below to consult your doctor</p>
                    <p class = "text-center" id="">
                    <a href="https://meet.google.com/nrx-rqui-sgk"><i class="fa-solid fa-video fa-3x "></i></a>
                    </p>
                    <p class="text-center fs-4" id="">A mail has been set to you or you can check the Application</p>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary mt-3 text-center" type="button">Go Back</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>