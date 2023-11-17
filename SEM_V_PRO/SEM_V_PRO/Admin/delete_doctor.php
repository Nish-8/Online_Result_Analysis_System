<?php
    $d_id=$_GET['d_id'];
    
    include_once "../Shared/config.php";

    $cmd="delete from doctor where d_id=$d_id";

    $result=mysqli_query($conn,$cmd);

    if($result){
        header("location:doctor_management.php");
    }
    else{
        echo "Error in Deleting <a href='doctor_management.php'>Try Again</a>";
    }
?>