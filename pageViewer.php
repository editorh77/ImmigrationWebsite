<?php

include "includes/config.php";
include "logic.php";

if(isset($_GET['pagename'])){
    $pagename = $_GET['pagename'];

    $query = mysqli_query($con, "select PageDescription from tblpages where PageName='$pagename'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo htmlentities(getTitle()); ?> | Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet">



</head>
<body>

    <?php include("includes/header.php"); ?>

    <div class="container">
        <div class="row" style="margin-top:4%">
            <div class="col-md-8">
                <?php
                $query = mysqli_query($con, "select PageDescription from tblpages where PageName='$pagename'");
                echo mysqli_fetch_array($query)['PageDescription'];?>
            </div>
            <?php include("includes/sidebar.php"); ?>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
