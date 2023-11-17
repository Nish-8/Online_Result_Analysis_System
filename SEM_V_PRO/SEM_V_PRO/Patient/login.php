<?php

$email = $_POST['email'];
$password = $_POST['password'];

include_once '../Shared/config.php';

$cmd = "select * from patients where p_email='$email' limit 1";

$sql_obj = mysqli_query($conn, $cmd);

$total_rows = mysqli_num_rows($sql_obj);

if ($total_rows > 0) {
    $row = mysqli_fetch_assoc($sql_obj);
    $verify = password_verify($password, $row['p_password']);
    if ($verify == 1) {
        session_start();
        $_SESSION['patient_id'] = $row['p_id'];
        $_SESSION['patient_name'] = $row['p_name'];
        header('location:patient_homepage.php');
    }
    else {
        echo "<h2> Invalid Credentials</h2>";
        echo "<a href='login_register.html'>Try Again</a>";
    }
}
mysqli_close($conn);
?>