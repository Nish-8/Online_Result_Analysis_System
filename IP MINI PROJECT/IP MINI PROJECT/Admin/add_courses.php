<?php
    $d_id=$_POST['d_id'];
    $co_name=$_POST['c_name'];

    include_once "../Shared/config.php";

    $cmd="insert into courses (d_id,co_name) values($d_id,'$co_name')";

    $result=mysqli_query($conn,$cmd);

    if($result){
        header("location:courses.php");
    }
    else{
        echo "Error in adding course";
        echo "<a href='courses.php'>Try again</a>";
    }

?>