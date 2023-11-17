<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['reg_password'];
$medhistory=$_POST['medhistory'];
$name = $fname . " " . $lname;

include_once "../Shared/config.php";

$hashed_pass = password_hash($password, PASSWORD_DEFAULT);

$cmd1 = "insert into patients(p_name,p_email,p_phno,p_password,p_medhistory)
            values('$name','$email','$number','$hashed_pass','$medhistory')";

$cmd2 = "select * from patients where p_email='$email' or p_phno='$number' limit 1";
$sql_obj = mysqli_query($conn, $cmd2);
$total_rows = mysqli_num_rows($sql_obj);

if ($total_rows == 0) {
    $result = mysqli_query($conn, $cmd1);
    if ($result) {
        header('location:login_register.html');
    }
}
else {
    echo '<h2>Mobile/Mail Id is already registered</h2>';
    echo "<a href='login_register.html'>Try Again</a>";
}

mysqli_close($conn);

?>