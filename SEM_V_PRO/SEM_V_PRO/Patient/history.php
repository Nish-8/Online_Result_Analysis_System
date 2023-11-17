<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/da1a2ce390.js" crossorigin="anonymous"></script>
  <title>Appointment History</title>
</head>

<body>
  <?php  
    include "../Includes/patient_include.html"
  ?>

  


  <div class="heading text-center">
    <h3>Appointment History </h3>
  </div>
  <div class="container-fluid">
    <table class="table table-striped table-hover border-5">
      <thead>
        <tr>
          <th scope="col">SR.NO</th>
          <th scope="col">Doctor Name</th>
          <th scope="col">Consultancy Fees</th>
          <th scope="col">Appointment Date</th>
          <th scope="col">Appointment Time</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Dr.Saraf</td>
          <td>500</td>
          <td>9/9/22</td>
          <td>10:00 am</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Dr.Kulkarni</td>
          <td>400</td>
          <td>15/10/22</td>
          <td>7:00 pm</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Dr.Jagdale</td>
          <td>700</td>
          <td>7/11/22</td>
          <td>12:00 pm</td>
        </tr>
      </tbody>
    </table>
  </div>

</body>

</html>