<?php
    $p_id=$_POST['patient_id'];
    $name=$_POST['name'];
    $phno=$_POST['phno'];
    $email=$_POST['email'];
    $medhistory=$_POST['medhistory'];
    
    include_once "../Shared/config.php";

    $cmd="update patients set p_name='$name', p_email='$email', p_phno='$phno', p_medhistory='$medhistory' where p_id=$p_id";

    $result=mysqli_query($conn,$cmd);

    if($result){
        header("location:patient_management.php");
    }
    else{
        echo "Error in updating <a href='patient_management.php'>Try Again</a>";
    }




?>