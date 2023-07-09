<?php
    session_start();

    function getProfileImage($con){
        if(isset($_SESSION) && isset($_SESSION['username'])){
            $username=$_SESSION['username'];
            $image = mysqli_query($con, "SELECT Image FROM users WHERE username='$username'");
            $src = mysqli_fetch_array($image)['Image'];
            if(isset($src) && $src != ""){
                return $src;
            }
        }
        return "/imageStorage/users/anonymous.png";
    }

    function getFrame($con){
        if(isset($_SESSION) && isset($_SESSION['username'])){
            $username=$_SESSION['username'];
            $frame = mysqli_query($con, "SELECT frame FROM users WHERE username='$username'");
            if(isset($frame)){
                return mysqli_fetch_array($frame)['frame'];
            }
        }
        return "/imageStorage/users/anonymous.png";
    }

?>


