<?php
session_start();
include "logic.php";
include "includes/config.php";

function getExtension($imgfile){
    $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
    $allowed_extensions = array(".jpg",".jpeg",".png", ".gif");
    if(!in_array($extension,$allowed_extensions))
    {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png / gif format allowed');</script>";
    }else{
        return $extension;
    }
}

function processImage($image){
    $imgfile = $image["name"];
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    $extension=getExtension($imgfile);
    if(isset($extension))
    {
        //rename the image file
        $imgnewfile=md5($imgfile).$extension;
        // Code for move image into directory
        move_uploaded_file($image["tmp_name"],"imageStorage/users/".$imgnewfile);
        return "/imageStorage/users/".$imgnewfile;
    }
}

if(isset($_SESSION) && isset($_SESSION['username'])){
    if(isset($_POST['Modify']))
    {
        $fname =  $_POST['fname'];
        $lname =  $_POST['lname'];
        $sex =  $_POST['sex'];
        $phone =  $_POST['phone'];
        $email =  $_POST['email'];
        $username =  $_POST['username'];
        $password =  $_POST['Password'];
        $confirmPassword =  $_POST['confirm_Password'];
        $imgfile=$_FILES["profileimg"];
        $framefile=$_FILES["frame"]["name"];
        $imgfile = processImage($imgfile);
        // get the image extension
        // allowed extensions
        $framefile = "/imageStorage/frames/".$framefile;
        $formerName=$_SESSION['username'];
        
        $p = $_SESSION['username'];
        echo $imgfile;
        $query = mysqli_query($con, "UPDATE users SET
 fname='$fname',lname='$lname',sex='$sex',phone='$phone',email='$email',username='$username',password='$password',Image='$imgfile',frame='$framefile' WHERE username='$formerName'");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo htmlentities(getTitle()); ?> | My Profile</title>

    <!-- Select2 -->
    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Jquery filer css -->
    <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>



</head>
<body>
    <?php include "includes/header.php"; ?>
    <section class="text-left">
        <div class="row mb-4 wow fadeIn">
            <div class="col-lg-3 col-md-12 mb-4">
            </div>
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">My Profile</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php
                                    $formerName = $_SESSION['username'];
                                    $query=mysqli_query($con, "SELECT * FROM users WHERE username='$formerName'");
                                    $results = mysqli_fetch_array($query);
                                ?>
                                <div class="form-group">
                                    <label for="">First name</label>
                                    <input type="text" name="fname" id="" class="form-control" value=<?php echo htmlentities($results['fname']);?> placeholder=<?php echo htmlentities($results['fname']);?> aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Last name</label>
                                    <input type="text" name="lname" id="" class="form-control" value=<?php echo htmlentities($results['lname']);?> placeholder=<?php echo htmlentities($results['lname']);?> aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="sex">Sex</label>
                                    <select name="sex" class="form-control" id="" value=<?php echo htmlentities($results['sex']);?> >
                                        <option value="Male">Male</option>
                                        <option value="Male">Female</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="tel" name="phone" id="" class="form-control" value=<?php echo htmlentities($results['phone']);?> placeholder=<?php echo htmlentities($results['phone']);?> aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">email</label>
                                    <input type="email" name="email" id="" class="form-control" value=<?php echo htmlentities($results['email']);?> placeholder=<?php echo htmlentities($results['email']);?> aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">username</label>
                                    <input type="text" name="username" id="" class="form-control" value=<?php echo htmlentities($results['username']);?> placeholder=<?php echo htmlentities($results['username']);?> aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="Password" name="Password" id="" class="form-control" value=<?php echo htmlentities($results['password']);?> placeholder=<?php echo htmlentities($results['password']);?> aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">confirmPassword</label>
                                    <input type="Password" name="confirm_Password" id="" class="form-control" value=<?php echo htmlentities($results['password']);?> placeholder=<?php echo htmlentities($results['password']);?> aria-describedby="helpId">
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box">
                                            <h4 class="m-b-30 m-t-0 header-title"><b>Profile Image</b></h4>
                                            <input type="file" class="form-control" id="profileimg"
                                                name="profileimg" value=<?php echo htmlentities($results['Image']);?> required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box">
                                            <h4 class="m-b-30 m-t-0 header-title"><b>Frame Image</b></h4>
                                            <input type="file" class="form-control" id="frame"
                                                name="frame" value=<?php echo htmlentities($results['frame']);?> required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="Modify" id="" class="btn btn-primary" value="Modify" placeholder="" aria-describedby="helpId" value="sign in">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
