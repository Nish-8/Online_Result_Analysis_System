<?php
    $d_id=$_POST['id'];
    $d_name=$_POST['name'];
    $fileobj=$_FILES['img'];
    $imname=$fileobj['name'];


    

    include_once "../Shared/config.php";
    $cmd;
    if($imname==""){
        $cmd="update domain set d_title='$d_name' where d_id=$d_id";
    }
    else{
        date_default_timezone_set('Asia/Kolkata');
        $unique_name=date("Y_m_d_H_i_s");
        $target_path="../Domain_Images/$unique_name.jpg";
        move_uploaded_file($fileobj['tmp_name'],$target_path);
        $cmd="update domain set d_img='$target_path',d_title='$d_name' where d_id=$d_id";
    }
    

    $result=mysqli_query($conn,$cmd);

    if($result){
        
        header('location:domains.php');
    }
    else{
        echo "Error in updating domain";
        echo "<a href='domains.php'>Try Again</a>";
    }

?>