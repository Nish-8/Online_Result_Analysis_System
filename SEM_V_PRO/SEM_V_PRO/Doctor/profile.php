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

   <!-- Include Twitter Bootstrap and jQuery: -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
 
<!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

  <!-- <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="style.css"> -->
</head>

<body>
  <?php
    include "../Includes/doctor_include.html"
  ?>

  <div class="container-xl">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
      
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
      <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
          <div class="card-header bg-primary text-white text-center">Profile Picture</div>
          <div class="card-body text-center">
            <!-- Profile picture image-->
            <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png"
              alt="">
            <!-- Profile picture help block-->
            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
            <!-- Profile picture upload button-->
            <div class="mb-3 col-lg-12">
              <label for="formFileSm" class="form-label">Upload Image</label>
              <input class="form-control form-control-sm bg-primary text-white" id="formFileSm" type="file">
            </div>
          </div>
        </div>
      </div>



      <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4 mt-5">
          <div class="card-header bg-primary text-white text-center">Personal Details</div>
          <div class="card-body">
            <form>

              <div class="row gx-3 mb-3">
                <!-- Form Group (first name)-->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputFirstName">First name</label>
                  <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name"
                    value="">
                </div>
                <!-- Form Group (last name)-->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputLastName">Last name</label>
                  <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name"
                    value="">
                </div>
              </div>
              <!-- Form Row        -->
              <div class="row gx-3 mb-3">
                <div class="col-lg-4 col-md-6">
                  <label class="small mb-1" for="inputGender">Gender</label> <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                      value="option1">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                      value="option2">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <label class="small mb-1" for="inputLocation">Address</label>
                  <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <label class="small mb-1" for="inputExperience">Years of Experience</label>
                  <input class="form-control" id="inputLocation" type="text" placeholder="Enter number of Years"
                    value="">
                </div>
              </div>

              <!-- row -->

              <div class="row gx-3 mb-3">
                <div class="col-lg-6">
                  <label class="small mb-1" for="inputEmailAddress">Email address</label>
                  <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address"
                    value="">
                </div>
                <div class="col-lg-6">
                  <label class="small mb-1" for="inputPhone">Phone number</label>
                  <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="">
                </div>
              </div>
              <div class="row gx-3 mb-3">
                <div class="col-lg-4 col-md-6">
                  <label class="small mb-1" for="inputLocation">Consultancy Fees</label>
                  <input class="form-control" id="inputLocation" type="text" placeholder="Enter your Appointent fee" value="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <label class="small mb-1" for="inputLocation">Enter Your Availability time </label>
                  <input class="form-control" id="inputLocation" type="text" placeholder="Enter your Appointent fee" value="">
                </div>
              </div>
            </div>
  
              <button class="btn btn-primary" type="button">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>












  






  

</body>

</html>



