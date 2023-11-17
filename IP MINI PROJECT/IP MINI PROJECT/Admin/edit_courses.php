<?php

    $co_id=$_POST['co_id'];
    $co_name=$_POST['co_name'];
    include_once "../Shared/config.php";
    $cmd="update courses set co_name='$co_name' where co_id=$co_id";

    $result=mysqli_query($conn,$cmd);

    if($result){
        header("location:courses.php");
    }
    else{
        echo "Error in updating course";
        echo "<a href='courses.php'>Try again</a>";
    }

?>