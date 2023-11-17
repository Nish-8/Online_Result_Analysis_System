<?php
    $email=$_POST['email'];
    $password=$_POST['password'];

    include_once '../Shared/config.php';

    $cmd="select * from client where c_email='$email' limit 1";

    $sql_obj=mysqli_query($conn,$cmd);

    $total_rows=mysqli_num_rows($sql_obj);

    if($total_rows>0){
        $row = mysqli_fetch_assoc($sql_obj);
        $verify = password_verify($password, $row['c_password']);
        if ($verify == 1) {
            session_start();
            $_SESSION['client_id'] = $row['c_id'];
            $_SESSION['client_name'] = $row['c_name'];
            
            header("location:index.php");
        }
        else {
            echo "<h2> Invalid Credentials</h2>";
            echo "<a href='login.html'>Try Again</a>";
        }
    }


?>