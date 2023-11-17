<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact US</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="stylesheet.css">

  <!--  font awsome cdn -->
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="#">
</head>

<body>
  <?php
    include "../Includes/admin_include.html";
  ?>

  <!-- <div class="container  mt-5">
    <div class="jumbotran">
      <div class="card">
        <div class="card-header">
          Contact Queries
        </div>
        <div class="card-body">
          <table class="table  table-responsive">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Contact no.</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
              </tr>
            </thead>
            <tbody> -->

            <div class='container mt-5'>
    <div class='jumbotran'>
        <div class='card' style=" background:transparent;">
            <div class='card-header text-center'>Contact Queries<div class='card-body'>
                    <table class='table-group-divider table-body table-bordered table table-hover table caption-top mt-5'>
                        <thead>
                            <tr>
                                <th scope='col'>Id</th>
                                <th scope='col'>Name</th>
                                <th scope='col'>Contact</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Message</th>
                            </tr>
                        </thead>
                        <tbody>
              <?php
                include_once "../Shared/config.php";
                $cmd="select * from contact_us";
                $sql_obj=mysqli_query($conn,$cmd);
                while($row=mysqli_fetch_assoc($sql_obj)){
                  $c_id=$row['c_id'];
                  $c_name=$row['c_name'];
                  $c_email=$row['c_email'];
                  $c_phoneno=$row['c_phoneno'];
                  $c_message=$row['c_message'];

                  echo "<tr>
                  <th scope='row'>$c_id</th>
                  <td>$c_name</td>
                  <td>$c_phoneno</td>
                  <td>$c_email</td>
                  <td>$c_message</td>
                  </tr>";
                }
              ?>
              
              </tbody>
                    </table>
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