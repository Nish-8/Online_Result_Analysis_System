<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/profile.css">
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

  <script src="https://kit.fontawesome.com/da1a2ce390.js" crossorigin="anonymous"></script>
  <title>Feedback</title>
</head>

<body>
  <!-- include your php below -->

  <?php 
    include "../Includes/doctor_include.html" 
  ?>
  

  <div class="card mt-5 px-4">
    <table class="table caption-top table-light table-responsive">
      <caption class="text-center ">Appointment History</caption>
      <thead>
        <tr>
          <th scope="col">SR.NO</th>
          <th scope="col">Doctor Name</th>
          <th scope="col">Consultancy Fees</th>
          <th scope="col">Appointment Date</th>
          <th scope="col">Appointment Time</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Dr.Saraf</td>
          <td>500</td>
          <td>9/9/22</td>
          <td>10:00 am</td>
          <td>
            Pending/Completed
          </td>
          <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Feedback
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
              aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Your Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send</button>
                  </div>
                </div>
              </div>
            </div>
            
          </td>
        </tr>

      </tbody>
    </table>
  </div>
  <!-- </div> -->


</body>

</html>