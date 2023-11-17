<?php
include_once "../Shared/config.php";
    $l_id=$_POST['l_id'];
    $l_chapname=$_POST['l_chapname'];
    $l_link=$_POST['l_link'];

    $cmd="update lessons set l_chapname='$l_chapname',l_link='$l_link' where l_id=$l_id";

    $result=mysqli_query($conn,$cmd);
   
    if($result){
        header("location:chapters.php");
    }
    else{
        echo "Error in adding course";
        echo "<a href='chapters.php'>Try again</a>";
    }

?>