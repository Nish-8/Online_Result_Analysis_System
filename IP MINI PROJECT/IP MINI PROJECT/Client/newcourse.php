<?php
session_start();
if (!isset($_SESSION['client_id'])) {
    echo "<h2 class='bg-danger'>Unauthorized to Access</h2>";
    echo "<a href='login.html'>Login First </a>";
    die;
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">


  <!-- Bootstrap CSS -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/8523f244b1.js" crossorigin="anonymous"></script>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">


  <title>Courses</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
      <a class="navbar-brand fs-2" style="color:#5712d2" href="">e-vidya</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-between w-50" style="margin-left:15%;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="newcourse.php">Learn Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about2.php">About Us</a>
          </li>
        </ul>
        <li class="nav-link">
          <div class="dropdown me-5">

            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user-doctor"></i>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Logout</a></li>
              
            </ul>
          </div>
        </li>
      </div>
    </div>
  </nav>
  <hr>
  <h1>Courses</h1>
  <hr>
  <div class="container">
    <div class="justify-content-center d-flex">
      <?php
        include_once "../Shared/config.php";

        $cmd1="select * from domain";
        $sql_obj1=mysqli_query($conn,$cmd1);
        while($row1=mysqli_fetch_assoc($sql_obj1)){
          $d_id=$row1['d_id'];
          $d_name=$row1['d_title'];
          $d_img=$row1['d_img'];
          echo "<div class='col-lg-3 col-sm-12'>
          <div class='card ' style='width: 16rem;style='background:transparent;'>
              <img src='$d_img' class='card-img-top' alt='...'>
              <div class='card-body'>
                  <h5 class='card-title'>$d_name</h5>
                  <hr>
              ";
              $cmd2="select * from courses where d_id=$d_id";
              $sql_obj2=mysqli_query($conn,$cmd2);
              while($row2=mysqli_fetch_assoc($sql_obj2)){
                $co_id=$row2['co_id'];
                $co_name=$row2['co_name'];

                echo "
                  <a href='view_lesson.php?co_id=$co_id' class='card-link text-decoration-none'>$co_name</a><br>
                  ";
                
              }
              echo "</div>
                </div>
                </div>";
              
        }

      ?>
        
    </div>
  </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"></script>


</body>

</html>