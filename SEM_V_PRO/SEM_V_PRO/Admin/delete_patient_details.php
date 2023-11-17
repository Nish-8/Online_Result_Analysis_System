<?php
    $p_id=$_GET['p_id'];
    
    include_once "../Shared/config.php";

    $cmd="delete from patients where p_id=$p_id";

    $result=mysqli_query($conn,$cmd);

    if($result){
        header("location:patient_management.php");
    }
    else{
        echo "Error in deleting <a href='patient_management.php'>Try Again</a>";
    }


?>