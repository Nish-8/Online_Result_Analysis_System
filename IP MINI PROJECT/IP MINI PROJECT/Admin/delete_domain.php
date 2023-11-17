<?php
    $d_id=$_GET['d_id'];

    include_once "../Shared/config.php";

    $cmd="delete from domain where d_id=$d_id";
    $cmd1="select co_id from courses where d_id=$d_id";

    $sql_obj1=mysqli_query($conn,$cmd1);
    while($row1=mysqli_fetch_assoc($sql_obj1)){
        $co_id=$row1['co_id'];
        $cmd2="delete from lessons where co_id=$co_id";
        $result2=mysqli_query($conn,$cmd2);

        if($result2){
            $cmd3="delete from courses where co_id=$co_id";
            $result3=mysqli_query($conn,$cmd3);
        }
        else{
            echo "Error in deleting domain";
            echo "<a href='domains.php'>Try Again</a>";
        }
    }
    $result=mysqli_query($conn,$cmd);

    if($result){
        
        header('location:domains.php');
    }
    else{
        echo "Error in deleting domain";
        echo "<a href='domains.php'>Try Again</a>";
    }
?>