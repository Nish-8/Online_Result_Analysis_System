<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>



    <link rel="stylesheet" href="style_admin.css">
</head>


<body>
    <?php

        include '../Includes/admin_include.html'
    
    ?>
    <div class="container-fluid vh-100">
        <div class="row mt-5 d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-9 col-sm-12 col-lg-3">
                <div class="card text-center">
                    <div class="card-header bg-secondary text-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <i class="bi bi-list-check"></i>
                            </div>
                            <div class="col">
                                <h3>#8</h3>
                                <h6>#Total Meetings</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                <h5>
                    <a href="#" class="text-primary"> Total </a>
                </h5>
                </div>
            </div>

            <div class="col-12 col-md-9 col-sm-12 col-lg-3">
                <div class="card text-center">
                    <div class="card-header bg-secondary text-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <i class="bi bi-list-check"></i>
                            </div>
                            <div class="col">
                                <h3>#</h3>
                                <h6>#Completed Meetings</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                <h5>
                    <a href="#" class="text-primary"> Completed </a>
                </h5>
                </div>

                

            </div>

            <div class="col-12 col-md-9 col-sm-12 col-lg-3">
                <div class="card text-center">
                    <div class="card-header bg-secondary text-white">
                        <div class="row align-items-center">
                            <div class="col">
                                <i class="bi bi-list-check"></i>
                            </div>
                            <div class="col">
                                <h3>#1</h3>
                                <h6>#Pending Meetings</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                <h5>
                    <a href="#" class="text-primary"> Pending </a>
                </h5>
                </div>

                

            </div>
        </div>
        <table class="mt-3 table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">Appointment ID</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Doctor Attending</th>
                <th scope="col">MeetLink</th>
                <th scope="col">Timing</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>10:00 TO 11:30</td>
                <td>Complete</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>10:00 TO 11:30</td>
                <td>Pending</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>10:00 TO 11:30</td>
                <td>Complete</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>