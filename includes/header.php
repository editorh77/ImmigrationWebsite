<?php include_once $_SERVER['DOCUMENT_ROOT']."/profile.php"; ?>

<header class="p-3 bg-blue text-white">
    <link href="css/dropdown.css" rel="stylesheet">
    <link href="css/google.css" rel="stylesheet">


    <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background: rgb(2,0,36); background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(3,22,167,1) 14%, rgba(1,137,220,1) 56%, rgba(0,212,255,1) 100%);">
        <div class="container">
            <a class="logo" href="index.php"><span style="color: #ffffff !important; font-size: 24px; text-transform: uppercase; font-family: 'Hind Madurai', sans-serif; font-weight: 600; letter-spacing: 1px; line-height: 70px; position:relative; left:0px; top:0px;">HY<span style="color: #70baf6;
">Immigration</span></span><i
class="mdi mdi-layers"></i></a>
            <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                            <svg class="bi me-2" width="5" height="5" role="img" aria-label="Bootstrap">
                                <use xlink:href="#bootstrap" />
                            </svg>
                        </a>




                        <!-- Categories Widget -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="position:relative; left:0px">
                            <li class="nav-link  text-right">

                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-link text-right" style="margin: 0 0px">
                                <div class="dropdown">
                                    <button class="dropbtn">Services</button>
                                    <div class="dropdown-content">
                                        <a href="pageViewer.php?pagename=immigration" style="text-align:left;">Immigration</a>
                                        <a href="pageViewer.php?pagename=education" style="text-align:left;">Education</a>
                                        <a href="pageViewer.php?pagename=citizenship" style="text-align:left;">Citizenship</a>
                                        <a href="pageViewer.php?pagename=visa" style="text-align:left;">Visa</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-link text-right" >
                                <div class="dropdown">
                                    <button class="dropbtn" style="position:relative;">Blog</button>
                                    <div class="dropdown-content">
                                        <?php
                                            $query = mysqli_query($con, "select id,CategoryName from tblcategory where Is_Active=1");
                                            while(($row=mysqli_fetch_array($query))){
                                                ?>
                                                <a href="category.php?cat=<?php echo htmlentities($row['id']);?>" style="text-align:left;"><?php echo htmlentities($row['CategoryName']); ?></a>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-link text-right" style="position:relative; left:0px">
                              <a class="nav-link active" href="login.php">Login</a>
                            </li>
                            <li class="nav-link text-right" style="position:relative; left:0px">
                              <a class="nav-link active" href="register.php">Register</a>
                            </li>
                            <li class="nav-link text-right" style="position:relative; left:0px"><a class="nav-link px-2 text-white" href="admin/">Admin</a></li>
                            <li style="position:relative; left:0px">
                                <div id="google_translate_element"></div>
                                <script type="text/javascript">
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                                }
                                </script>
                                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                            </li>
                            <li style="position:relative; left:0px">
                                <a class="nav-link active" href="myprofile.php" style="position:relative;">
                                    <div style="position:relative">
                                        <img src="<?php echo htmlentities(getFrame($con));?>" style="position:absolute; left:-10px; top:-10px; width:80px; height:80px;">
                                        <img src="<?php echo htmlentities(getProfileImage($con));?>" style="positon:absolute; left:1000px; height:60px; overflow: hidden; border-radius: 100%;">
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <br>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            
<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
<!--
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li> -->


</ul>

                        </div>

                        </ul>


                    </div>
                </div>
            </div>
    </nav>
</header>
