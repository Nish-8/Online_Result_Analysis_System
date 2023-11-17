<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medmantra</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <!-- CSS only -->
  
  <script src="https://kit.fontawesome.com/da1a2ce390.js" crossorigin="anonymous"></script>

<body>
<?php
  session_start();
  if (!isset($_SESSION['doctor_id'])) {
      echo "<h2 class='bg-danger'>Unauthorized to Access</h2>";
      echo "<a href='login_register.html'>Login First </a>";
      die;
  }
              
?>
  <?php
    include "../Includes/doctor_include.html"
  ?>


  <main>
    <div class="cards container-fluid mt-5">
      <div class="row">

        <div class="col-lg-6 col-sm-6">
          <div class="container-fluid">
            <?php
              $doctor_name=$_SESSION['doctor_name'];
              echo "<h1>Welcome Doctor: $doctor_name</h1>";
            ?>
            
            <p id="slogan"><b>"Your devotion and care bring healing, comfort and hope"</b></p>

          </div>
          <!-- <img src="../main_logo.jpg" class="img-thumbnail" alt="..."> -->
        </div>

        <div class="col-lg-3 col-sm-12">
          <div class="card" style="width: 20rem;">
            <img src="../UiImages/dashboard.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="dropDwn" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="btn btn-primary col-md-12 text-center">Dashboard</button>
                    </a>
                <ul class="dropdown-menu " aria-labelledby="dropDwn">
                  <li><a class="dropdown-item" href="../Doctor/profile.php">Edit Profile</a></li>
                  <li><a class="dropdown-item" href="../Doctor/profile.php">View Ratings</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12">
          <div class="card" style="width: 20rem; height: 25rem;">
            <img src="../UiImages/appointment.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="appointment.php" class=" cBtn btn btn-primary col-md-12 text-center">Scheduled appointments</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>





</body>

</html>