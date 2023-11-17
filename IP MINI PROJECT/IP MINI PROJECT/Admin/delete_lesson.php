<?php
    $l_id=$_GET['l_id'];

    include_once "../Shared/config.php";

    $cmd="delete from lessons where l_id=$l_id";

    $result=mysqli_query($conn,$cmd);

    if($result){
        
        header('location:chapters.php');
    }
    else{
        echo "Error in deleting domain";
        echo "<a href='chapters.php'>Try Again</a>";
    }
?>