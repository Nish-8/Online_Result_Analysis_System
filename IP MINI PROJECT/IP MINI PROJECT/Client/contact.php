<?php

$name = $_POST["txtName"];
$email = $_POST["txtEmail"];
$phoneNo = $_POST["txtPhone"];
$mssg = $_POST["txtMsg"];

include_once "../Shared/config.php";
$sql = "INSERT INTO contact_us (c_name,c_email,c_phoneno,c_message) values ('$name','$email','$phoneNo','$mssg')";
$result = mysqli_query($conn,$sql);

if($result){
header("location:index.php");
}else{
    echo "Failed";
    echo "<a href='index.php'> Try Again </a>";
}

?>