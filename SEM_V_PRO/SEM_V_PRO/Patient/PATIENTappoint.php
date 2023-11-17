<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Book An Appointment</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/da1a2ce390.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
        include "../Includes/patient_include.html" 
    ?>

    <div class="container">
        <div class="jumbotran">
            <div class="card">
                <div class="card-header">
                    Book An Appointment
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Specialization</th>
                                    <th scope="col">Contact No.</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Consultancy fees</th>
                                    <th class="float-right"> Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>nkk </td>
                                    <td>mncdc </td>
                                    <td>500</td>
                                    <td> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModal">Book An Appointment </button>



                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Book an
                                                            appointment</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true"> &times; </span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Patient name">
                                                            </div> <br>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Patient contact no.">
                                                            </div> <br>

                                                            <div class="form-group">
                                                                <input type="email" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Patient Email">
                                                            </div> <br>

                                                            <div class="form-group">
                                                                <input type="email" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Patient Symptoms">
                                                            </div> <br>

                                                            <div class="form-group">
                                                                <input type="date" class="form-control"
                                                                    id="exampleFormControlInput1" placeholder="Date">
                                                            </div> <br>

                                                            <div class="form-group">
                                                                <input type="time" class="form-control"
                                                                    id="exampleFormControlInput1" placeholder="time">
                                                            </div>

                                                        </form>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>