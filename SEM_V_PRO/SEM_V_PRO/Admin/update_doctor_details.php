<?php
    $d_id=$_POST['doctor_id'];
    $d_name=$_POST['d_name'];
    $d_email=$_POST['d_email'];
    $d_phno=$_POST['d_phno'];
    $d_specialization=$_POST['d_specialization'];
    $d_qualification=$_POST['d_qualification'];

    include_once "../Shared/config.php";
    $cmd="update doctor set d_name='$d_name', d_email='$d_email', d_specialization='$d_specialization', d_qualification='$d_qualification'";
    $result=mysqli_query($conn,$cmd);

    if($result){
        header("location:doctor_management.php");
    }
    else{
        echo "Error in updating <a href='doctor_management.php'>Try Again</a>";
    }



?>