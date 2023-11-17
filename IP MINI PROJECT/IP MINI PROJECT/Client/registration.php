<?php
    $name=$_POST['name'];
    $phno=$_POST['phno'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    include_once "../Shared/config.php";

    $hashed_pass=password_hash($password,PASSWORD_DEFAULT);

    $cmd1="insert into client(c_name,c_phno,c_email,c_password) values ('$name','$phno','$email','$hashed_pass')";

    $cmd2="select * from client where c_email='$email' or c_phno='$phno' limit 1";

    $sql_obj=mysqli_query($conn,$cmd2);

    $total_rows=mysqli_num_rows($sql_obj);

    if($total_rows==0){
        $result=mysqli_query($conn,$cmd1);
        if($result){
            header('location:login.html');
        }
    }
    else {
        echo '<h2>Mobile/Mail Id is already registered</h2>';
        echo "<a href='registration.html'>Try Again</a>";
    }
    
    mysqli_close($conn);


?>