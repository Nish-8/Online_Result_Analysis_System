<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <!--  font awsome cdn -->
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>

<body>
  <?php
    include "../Includes/admin_include.html";

    include_once "../Shared/config.php";

    $cmd1="select * from domain";
    $cmd2="select * from courses";
    $cmd3="select * from client";

    $sql_obj1=mysqli_query($conn,$cmd1);
    $num_domains=mysqli_num_rows($sql_obj1);

    $sql_obj2=mysqli_query($conn,$cmd2);
    $num_courses=mysqli_num_rows($sql_obj2);

    $sql_obj3=mysqli_query($conn,$cmd3);
    $num_clients=mysqli_num_rows($sql_obj3);

  ?>

  
  <div class="col-sm-15 mt-5 ml-5">
    <div class="row mt-5 mx-2 d-flex text-center">
      <div class="col-sm-4 mt-5">
        <div class="card text-white  mb-3" style="max-width:18rem;background-color: #5837D0;">
          <div class="card-header">Domains</div>
          <div class="card-body">
            <?php
              echo "<h4 class='card-title'>
              $num_domains
            </h4>";
            ?>
            <a class="btn text-white" href="domains.php">View</a>
          </div>
        </div>
      </div>

      <div class="col-sm-4 mt-5">
        <div class="card text-white  mb-3" style="max-width:18rem;background-color: #5837D0;">
          <div class="card-header">Courses</div>
          <div class="card-body">
          <?php
              echo "<h4 class='card-title'>
              $num_courses
            </h4>";
            ?>
            <a class="btn text-white" href="courses.php">View</a>
          </div>
        </div>
      </div>

      <div class="col-sm-4 mt-5">
        <div class="card text-white  mb-3" style="max-width:18rem;background-color: #5837D0;">
          <div class="card-header">Users</div>
          <div class="card-body">
          <?php
              echo "<h4 class='card-title'>
              $num_clients
            </h4>";
            ?>
            <a class="btn text-white" href="users.php">View</a>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</body>

</html>