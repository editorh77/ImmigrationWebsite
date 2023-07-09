
<?php include $_SERVER['DOCUMENT_ROOT']."/includes/config.php"; ?>
<?php require_once ("session.php");  ?>
<?php require_once ("function.php");  ?>
      
    <?php include $_SERVER['DOCUMENT_ROOT']."/includes/header.php";?>
<?php

function Redirect_to($New_Location){
    header("Location: ".$New_Location);
    exit;

}


function Login(){
	if(isset($_SESSION["username"])){
		return true;
	}
}
function Confirm_Login(){
	if(!Login()){
		Redirect_to("/login.php");
	}
}
function Confirm_Login_ad(){
	if(!Login()){
		Redirect_to("/login.php");
	}
}

?>
