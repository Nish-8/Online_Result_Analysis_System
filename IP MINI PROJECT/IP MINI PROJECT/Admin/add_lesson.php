<?php
 $co_id=$_POST['co_id'];
 $l_chapname=$_POST['l_chapname'];
 $l_link=$_POST['l_link'];

 include_once "../Shared/config.php";

 $cmd="insert into lessons (co_id,l_chapname,l_link) values($co_id,'$l_chapname','$l_link')";

 $result=mysqli_query($conn,$cmd);

 if($result){
     header("location:chapters.php");
 }
 else{
     echo "Error in adding course";
     echo "<a href='chapters.php'>Try again</a>";
 }



?>