<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $spec=$_POST['spec'];
    $quali=$_POST['quali'];

    $password = $_POST['reg_password'];
    $fileobj=$_FILES['certificate'];
    $certificate=$fileobj['name'];
    $address=$_POST['address'];
    $name = $fname . " " . $lname;

    date_default_timezone_set('Asia/Kolkata');
    $unique_name=date("Y_m_d_H_i_s");
    $target_path="../Certificates/$unique_name.pdf";
    

    include_once "../Shared/config.php";

    $hashed_pass=password_hash($password,PASSWORD_DEFAULT);

    $cmd1="insert into doctor(d_name, d_email, d_phno, d_specialization, d_qualification, d_certificate, d_password,d_address) values('$name','$email','$number','$spec','$quali','$target_path','$hashed_pass','$address')";

    $cmd2="select * from doctor where d_email='$email' or d_phno='$number' limit 1";

    $sql_obj=mysqli_query($conn,$cmd2);

    $total_rows=mysqli_num_rows($sql_obj);

    if($total_rows==0){
        $result=mysqli_query($conn,$cmd1);
        if($result){
            
            move_uploaded_file($fileobj['tmp_name'],$target_path);
            
        //     echo "<div class='modal' tabindex='-1' role='dialog'>
        //     <div class='modal-dialog' role='document'>
        //       <div class='modal-content'>
        //         <div class='modal-header'>
        //           <h5 class='modal-title'>Modal title</h5>
        //           <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
        //             <span aria-hidden='true'>&times;</span>
        //           </button>
        //         </div>
        //         <div class='modal-body'>
        //           <p>ThankYou doctor for selecting MedMantra you registration will me verified thereafter you will receive a mail of conformation that your account has been activated</p>
        //         </div>
        //         <div class='modal-footer'>
        //           <button type='button' class='btn btn-primary'>Ok</button>
        //           <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        //         </div>
        //       </div>
        //     </div>
        //   </div>";
          header('location:login_register.html');
        }
       

        
    }
    else {
        echo '<h2>Mobile/Mail Id is already registered</h2>';
        echo "<a href='login_register.html'>Try Again</a>";
    } 
    mysqli_close($conn);
?>