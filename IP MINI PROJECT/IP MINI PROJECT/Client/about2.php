<?php
session_start();
if (!isset($_SESSION['client_id'])) {
    echo "<h2 class='bg-danger'>Unauthorized to Access</h2>";
    echo "<a href='login.html'>Login First </a>";
    die;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>About Us card || Learning robo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">


  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/da1a2ce390.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="sty.css">
  <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../CSS/stylesheet.css">
  <link rel="stylesheet" href="../CSS/EXP/exp.css">
  <link rel="stylesheet" href="../fonts/icomoon/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
      <a class="navbar-brand fs-2" style="color:#5712d2" href="#">e-vidya</a>
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

  <div class="about-section">
    <h1>About Us Page</h1>
    <p>E-vidya website will help users in finding the best courses as per their requirement.We contain the courses of
      all majors and we hope that our website will help you.For any queries please contact</p>
  </div>

  <h2 style="text-align:center" class="mt-3">Our Team</h2>
  <div class="row">
    <div class="column">
      <div class="card">
        <div class="container">
          <h2>Nitish Palanivellu</h2>
          <p class="title">CEO & Founder</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>nitish532002@gmail.com</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <div class="container">
          <h2>Nishita Jagdale</h2>
          <p class="title">Director</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>njagdale@gmail.com</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <div class="container">
          <h2>Nishith Dubey</h2>
          <p class="title">Designer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>john@example.com</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <div class="container">
          <h2>Bharati Jagtap</h2>
          <p class="title">Designer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>john@example.com</p>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center text-lg-start bg-white text-muted mt-5">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 link-secondary">
        <i class="fa-brands fa-facebook"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3 text-secondary"></i>e-Vidya
          </h6>
          <p>
            An E-Learning platform rich of resources, We make learning easy and simple for Everyone.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="index.php" class="text-reset">Home</a>
          </p>
          <!-- <p>
            <a href="#course" class="text-reset">Courses</a>
          </p>
          <p>
            <a href="contact-section" class="text-reset">Contact Us</a>
          </p> -->
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3 text-secondary"></i> Navi Mumbai, Panvel 410206, India</p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            e-Vidya@gmail.com
          </p>
          <p><i class="fas fa-phone me-3 text-secondary"></i> + 91 123 456 789</p>
          <p><i class="fas fa-print me-3 text-secondary"></i> + 91 123 456 789</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">e-Vidya.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->