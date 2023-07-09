

 <?php ob_start(); ?>

<?php session_start(); ?>



<?php include $_SERVER['DOCUMENT_ROOT']."/includes/config.php";  ?>
<?php include "function.php"; ?>
   




<?php
    if (isset($_POST['Register'])) {
        
       $fname =  $_POST['fname'];
       $lname =  $_POST['lname'];
       $sex =  $_POST['sex'];
       $phone =  $_POST['phone'];
       $email =  $_POST['email'];
       $username =  $_POST['username'];
       $password =  $_POST['Password'];
       $confirmPassword =  $_POST['confirm_Password'];

        if ($password!==$confirmPassword) {
            $_SESSION["ErrorMessage"]="your password is not the same !!!";
              Redirect_to("../../register.php");
        }
        $query = "INSERT INTO users (fname,lname,sex,phone,email,username,password, Image, frame)";
        $query .="VALUES('$fname','$lname', '$sex','$phone','$email','$username','$password', '/imageStorage/users/anonymous.png', '/imageStorage/frames/canada.png')";

        $query_exe = mysqli_query($con,$query);
        if ($query_exe) {
              $_SESSION["SuccessMessage"]= "your are registered seccessfuly!!!";
              Redirect_to("/login.php");
            
        }else{
             die(mysqli_error($con));
            echo "<script>alert('alert');</script>";
        }



    }
?>
