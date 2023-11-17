<?php
session_start();
if (!isset($_SESSION['client_id'])) {
    echo "<h2 class='bg-danger'>Unauthorized to Access</h2>";
    echo "<a href='login.html'>Login First </a>";
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="../CSS/stylesheet.css">
  <link rel="stylesheet" href="../CSS/EXP/exp.css">
  <link rel="stylesheet" href="../fonts/icomoon/style.css">

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
            <a class="nav-link" href="#contact-section">Contact Us</a>
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



  <!-- *************************Content********************************** -->

  <div class="parent" id="home-section";>
    <div class="c1">
      <?php
        $name=$_SESSION['client_name'];
        echo "<h1>Welcome $name</h1>";
      ?>
      <a href="newcourse.php">Get Started</a>
    </div>

  </div>

  <div style="padding-bottom:3%; padding-top: 5%;background-color:#7978ff;">

    <h1 id="course">Courses</h1>
  
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-3">
        <div class="card hover-zoom" style="width: 18rem;">
          <img src="../Images/C.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="text-center"><a class="text-decoration-none" href="newcourse.php">C++</a></h3>
                <p class="card-body">Learn the most famous programming language. </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card " style="width: 18rem;">
          <img src="../Images/Java.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="text-center"><a class="text-decoration-none" href="newcourse.php">Java</a></h3>
            <p class="card-text">Java is an object-oriented, class-based, concurrent, secured and general-purpose computer-programming language</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card " style="width: 18rem;">
          <img src="../Images/Python.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="text-center"><a class="text-decoration-none" href="newcourse.php">Python</a></h3>
            <p class="card-text">Python's design philosophy emphasizes code readability with its notable use of significant indentation.</p>
          </div>
        </div>
      </div>
      </div>

      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-3">
        <div class="card " style="width: 18rem;">
          <img src="../Images/graphic.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="text-center"><a class="text-decoration-none" href="newcourse.php">Graphic Designing</a></h3>
            <p class="card-text">Graphic design is a great career for people who are creative thinkers and enjoy art, technology.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card " style="width: 18rem;">
          <img src="../Images/android.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="text-center"><a class="text-decoration-none" href="newcourse.php">App Development</a></h3>
            <p class="card-text">Learning Android development opens up many career opportunities, such as freelancing.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card " style="width: 18rem;">
          <img src="../Images/web.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="text-center"><a class="text-decoration-none" href="newcourse.php">Web Development</a></h3>
            <p class="card-text">Learn the basics of how websites work, front-end vs back-end, and using a code editor.</p>
          </div>
        </div>
      </div>
      </div>

      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>






<div class="site-section " id="programs-section" style="margin-top: 5%;">
  <div class="container">
    <div class="row mb-5 justify-content-center">
      <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
        <h2 class="section-title">Our Programs</h2>
        <p>We aim to make studying SIMPLE, EASY and ACCESSIBLE to EVERYONE thus we collected the BEST COURSES from different plateforms.</p>
      </div>
    </div>
    <div class="row mb-5 align-items-center">
      <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
        <img src="../Images/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid">
      </div>
      <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
        <h2 class="text-primary mb-4">We Are Excellent In Education</h2>
        <p class="mb-4 fs-4">Education is an art and we are the artists.</p>

        <div class="d-flex align-items-center custom-icon-wrap">
          <div><p class="m-0"><i class="fa-solid fa-trophy"></i> e-vidya is helping to create vivid change our education system</p></div>
        </div>
      </div>
    </div>

    <div class="row mb-5 align-items-center">
      <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
        <img src="../Images/undraw_teaching.svg" alt="Image" class="img-fluid">
      </div>
      <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h2 class="text-primary mb-4">Strive for Excellent</h2>
        <p class="mb-4 fs-4">our goal is your success.</p>

        <div class="d-flex align-items-center custom-icon-wrap">
          <div><p class="m-0"><i class="fa-solid fa-trophy"></i> e-vidya is helping to create vivid change our education system</p></div>
        </div>

      </div>
    </div>

    <div class="row mb-5 align-items-center">
      <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
        <img src="../Images/undraw_teacher.svg" alt="Image" class="img-fluid">
      </div>
      <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
        <h2 class="text-primary mb-4">Education is life</h2>
        <p class="mb-4 fs-4">Beginning of a never ending journey of learning.</p>

        <div class="d-flex align-items-center custom-icon-wrap">
          <div><p class="m-0"><i class="fa-solid fa-trophy"></i> e-vidya is helping to create vivid change our education system</p></div>
        </div>

      </div>
    </div>

  </div>
</div>


<div class="site-section pb-0 " style="background-color: #7978FF; padding-top: 5%;">
  <div class="container">
    <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
      <div class="col-lg-7 text-center">
        <h2 class="section-title text-light">Why Choose Us</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

        <div class="p-4 rounded bg-white why-choose-us-box">

          <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
            <div><h5 class="m-0"><i class="fa-solid fa-award"></i> Access Variety of Courses Domain</h5></div>
          </div>

          <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
         
            <div><h5 class="m-0"><i class="fa-solid fa-award"></i> Authorised Resources</h5></div>
          </div>

          <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
     
            <div><h5 class="m-0"><i class="fa-solid fa-award"></i> Access Resources anytime anywhere</h5></div>
          </div>

          <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
         
            <div><h5 class="m-0"><i class="fa-solid fa-award"></i> Expand Your Knowledge</h5></div>
          </div>

          <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
          
            <div><h5 class="m-0"><i class="fa-solid fa-award"></i> Best Online Teaching Assistant Courses</h5></div>
          </div>

        </div>


      </div>
      <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
        <img src="../Images/person_transparent.png" alt="Image" class="img-fluid">
      </div>
    </div>
  </div>
</div>




<div class="container contact-form bg-light rounded-5" id="contact-section" >
  <div class="contact-image">
      <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
  </div>
  <form method="post" action="contact.php">
      <h3>Contact Us</h3>
     <div class="row">
          <div class="col-md-6">
              <div class="form-group mb-3">
                  <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value=""  maxlength="8" minlength="4" required />
              </div>
              <div class="form-group mb-3">
                  <input type="email" name="txtEmail" class="form-control" placeholder="Your Email *" value=""   minlength="4" required />
              </div>
              <div class="form-group mb-3">
                  <input type="number" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value=""  maxlength="10" minlength="4" required />
              </div>
              <div class="form-group mb-3 ">
                  <input type="submit" name="btnSubmit" class="btnContact" value="Send Message"  />
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <textarea name="txtMsg" class="form-control" placeholder="Your Message * " style="width: 100%; height: 150px;" minlength="4" required></textarea>
              </div>
          </div>
      </div>
  </form>
</div>


<!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted">
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
            <a href="#home-section" class="text-reset">Home</a>
          </p>
          <p>
            <a href="#course" class="text-reset">Courses</a>
          </p>
          <p>
            <a href="#contact-section" class="text-reset">Contact Us</a>
          </p>
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



</body>

</html>

