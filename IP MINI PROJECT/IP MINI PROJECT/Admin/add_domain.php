<?php
    $d_name=$_POST['d_name'];
    $fileobj=$_FILES['d_img'];
    $imname=$fileobj['name'];

    date_default_timezone_set('Asia/Kolkata');
    $unique_name=date("Y_m_d_H_i_s");
    $target_path="../Domain_Images/$unique_name.jpg";
    move_uploaded_file($fileobj['tmp_name'],$target_path);

    include_once "../Shared/config.php";

    $cmd="insert into domain (d_title,d_img) values('$d_name','$target_path')";

    $result=mysqli_query($conn,$cmd);

    if($result){
        header('location:domains.php');
    }
    else{
        echo "Error in uploading domain";
        echo "<a href='domains.php'>Try Again</a>";
    }






?>