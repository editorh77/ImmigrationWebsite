

 <?php ob_start(); ?>

<?php session_start(); ?>



<?php include $_SERVER['DOCUMENT_ROOT']."/includes/config.php"; error_log(get_include_path(), 0); ?>
<?php include "function.php"; ?>
   




<?php
    if (isset($_POST['login'])) {
        
        
   $username =  $_POST['username'];
   $password =  $_POST['Password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$query_exe = mysqli_query($con,$query);
$query_count = mysqli_num_rows($query_exe);


if ($query_count==1) {
    
while ($row = mysqli_fetch_assoc($query_exe)) {

   $fname =  $row['fname'];
   $lname =  $row['lname'];
   $sex =  $row['sex'];
   $phone =  $row['phone'];
   $email =  $row['email'];
   $username =  $row['username'];
   $password =  $row['password'];

    $_SESSION['fname']=$fname;
   $_SESSION['lname']= $lname;
   $_SESSION['sex']= $sex;
   $_SESSION['phone']= $phone;
   $_SESSION ['email']=$email;
   $_SESSION['username']=$username;
   $_SESSION['Password']=$password;

}
    if(isset($_SESSION['username']) && isset($_SESSION['Password'])){
        Redirect_to("/index.php");
    }
}else{

     $_SESSION["ErrorMessage"]="  not valid account !!!";
      Redirect_to("/login.php");

}


    }
?>
