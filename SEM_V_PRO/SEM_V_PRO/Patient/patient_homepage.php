<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient HomePage</title>
    <style>
        body {
            background: url("../UiImages/BG.png");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <?php
session_start();
if (!isset($_SESSION['patient_id'])) {
    echo "<h2 class='bg-danger'>Unauthorized to Access</h2>";
    echo "<a href='login_register.html'>Login First </a>";
    die;
}
?>

    <?php
include "../Includes/patient_include.html"
    ?>

    <div class="container-fluid m-0 p-0">
        <div class="col-12 mt-4">
            <div class="container-fluid text-center w-100 ">
                <?php
$patient_name = $_SESSION['patient_name'];
echo "<h2><em>Welcome $patient_name</em></h2>";
?>
                <p id="slogan"><b><em>"A little progress each day adds up to big results."</em></b></p>

            </div>
        </div>
        <div class="row ps-5 pb-3 w-100 mt-5">
            <div class="col-lg-4 col-md-4 col-sm-12 h-100">

                <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="../UiImages/dashboard.jpg" alt="Card image cap">
                    <div class="card-body">

                        <a href="#" class="btn btn-primary col-lg-12">Dashboard</a>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 h-100">
                <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="../UiImages/appointment.jpg" alt="Card image cap">
                    <div class="card-body">

                        <a href="PATIENTappoint.php" class="btn btn-primary col-lg-12">Schedule Appointments</a>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 h-100">
                <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="../UiImages/dash_logo.jpg" alt="Card image cap">
                    <div class="card-body">

                        <a href="history.php" class="btn btn-primary col-lg-12">Appointment History</a>
                    </div>
                </div>

            </div>

        </div>

    </div>




</body>

</html>