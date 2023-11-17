<?php

    $email=$_POST['email'];
    $password=$_POST['password'];

    include_once '../Shared/config.php';

    $cmd="select * from doctor where d_email='$email' limit 1";

    $sql_obj=mysqli_query($conn,$cmd);

    $total_rows=mysqli_num_rows($sql_obj);

    if($total_rows>0){
        $row = mysqli_fetch_assoc($sql_obj);
        $verify = password_verify($password, $row['d_password']);
        if ($verify == 1) {
            // session_start();
            // $_SESSION['doctor_id'] = $row['d_id'];
            // $_SESSION['doctor_name'] = $row['d_name'];
            // header('location:doctor_home.php');
            if ($row['d_status']=='1') {
                session_start();
                $_SESSION['doctor_id'] = $row['d_id'];
                $_SESSION['doctor_name'] = $row['d_name'];
                header('location:doctor_home.php');
            }
            else{
                echo "<h2> Your registration is still under verification please wait for the verification to complete</h2>";
                echo "<a href='login_register.html'>Go Back</a>";
            }
        }
        else{
            echo "<h2> Invalid Credentials</h2>";
            echo "<a href='login_register.html'>Try Again</a>";
        }
    }


?>