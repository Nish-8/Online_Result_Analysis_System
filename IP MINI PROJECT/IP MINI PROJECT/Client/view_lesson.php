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
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <link rel="stylesheet" href="style.css">
    <title>Lessons</title>
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
  <?php
    include_once "../Shared/config.php";
    $co_id=$_GET['co_id'];
    $cmd1="select co_name from courses where co_id=$co_id limit 1";
    $sql_obj1=mysqli_query($conn,$cmd1);
    $row1=mysqli_fetch_assoc($sql_obj1);
    $co_name=$row1['co_name'];
    echo "<h5 class='text-center mb-5 mt-3 fs-2'>$co_name</h5>"
  ?>

<div class='container'>
    <div class='jumbotran'>
        <div class='card'style=" background:transparent;">
            <div class='card-header text-center'>List of Chapters<div class='card-body'>
                    <table class='table-group-divider table-bordered table table-hover table caption-top mt-5'>
                        <thead>
                            <tr>
                                <th scope='col'>Chapters</th>
                                <th scope='col'>Name</th>
                                <th scope='col'>Links</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                

                                
                                

                                $cmd="select * from lessons where co_id=$co_id";

                                $sql_obj=mysqli_query($conn,$cmd);
                                $num=0;
                                while($row=mysqli_fetch_assoc($sql_obj)){
                                    $l_chapname=$row['l_chapname'];
                                    $l_link=$row['l_link'];
                                    $num=$num+1;
                                    echo "<tr>
                                    <td>$num</td>
                                    <td>$l_chapname</td>
                                    <td>
                                        <a href='$l_link' target='_blank'><i class='fa-brands fa-youtube fs-2'></i></a>
                                    </td>
                                
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
</body>
</html>