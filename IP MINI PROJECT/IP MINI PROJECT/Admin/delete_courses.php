<?php
    $co_id=$_GET['co_id'];

    include_once "../Shared/config.php";

    $cmd="delete from courses where co_id=$co_id";

    $cmd1="delete from lessons where co_id=$co_id";

    $result1=mysqli_query($conn,$cmd1);
    
    if($result1){
        $result=mysqli_query($conn,$cmd);

        if($result){
            
            header('location:courses.php');
        }
        else{
            echo "Error in deleting course";
            echo "<a href='courses.php'>Try Again</a>";
        }
    }
    else{
        echo "Error in deleting course";
        echo "<a href='courses.php'>Try Again</a>";
    }
    

   
?>