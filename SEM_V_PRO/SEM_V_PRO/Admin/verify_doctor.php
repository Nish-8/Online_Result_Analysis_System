<?php
    $d_id=$_GET['d_id'];
    
    include_once "../Shared/config.php";

    $cmd="update doctor set d_status=1 where d_id='$d_id'";

    $result=mysqli_query($conn,$cmd);

    if($result){
        header("location:doctor_management.php");
    }
    else{
        echo "Error in Vefifying <a href='doctor_management.php'>Try Again</a>";
    }
?>