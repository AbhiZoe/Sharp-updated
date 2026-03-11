<?php
require('../dbconn.php');
session_start();

if(isset($_POST['submit']))
{
    $user = $_POST['f_user'];
    $pass = $_POST['f_pass'];
    $captcha1 = trim($_POST['cp1']);
    $captcha2 = trim($_POST['cp2']);

    // Check captcha
    if($captcha1 != $captcha2)
    {
        echo "<script>alert('Captcha Incorrect');</script>";
    }
    else
    {
        $sql = "SELECT * FROM users WHERE name='$user' AND password='$pass'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['name'] = $user;
            echo "<script>location.replace('admin.php')</script>";
        }
        else
        {
            echo "<script>alert('Invalid Username or Password');</script>";
        }
    }
}
?>

<!DOCTYPE html >
<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8"/>
  <meta name="description" content=""/>
  <meta name="keywords" content="" />
  <meta name="author" content="CEO Foundry"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <!-- Site Title-->
  <title>CEO Foundry</title> <link href="../favicon.ico" rel="shortcut icon" />
  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<script
  src="http://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Crete+Round:400,400italic' rel='stylesheet' type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/red.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
	<script type="text/javascript" src="js/script.js"></script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-78539129-1', 'auto');
  ga('send', 'pageview');
</script>
</head>
<body onLoad="DrawCaptcha();">





	<!-- Container -->
	<div id="container">
<!-- Header
		================================================== -->
		<header>
			<div class="logo-box logo">
				<h2><a href="index.php">CEO Foundry</a></h2>
                <p>Website Admin Panel</p>
			</div>
			
			<a class="elemadded responsive-link" href="#">Menu</a>
		</header>
		<!-- End Header -->

		<!-- content 
		================================================== -->
		<div id="content">
			<div class="inner-content">
				<div class="portfolio-page">
					
					<div class="about-us-section">
					    <div class="text-center">
					    	<div class="about-detail">
								<h3 class="title">Login to your account !!</h3>								
								<div class="devider"></div>
								<form  method="post" class="form-main" enctype="multipart/form-data">
						            <div class="col-xs-12 text-left">
						                <div class="row"> 
						                    <!-- Name -->           
						                    <div class="form-group col-xs-6">
							                    <label for="name2">Username</label>
							                    <input class="form-control" id="name2" name="f_user"  value="" required>
							                    <div class="error" id="err-name" style="display: none;">Please enter name</div>
						                    </div>

						                    <!-- Email -->
						                    <div class="form-group col-xs-6">
							                    <label for="email2">Password</label>
							                    <input class="form-control" id="email2" name="f_pass" type="password"  value="" required>
							                    <div class="error" id="err-emailvld" style="display: none;">Please Enter Password</div> 
						                    </div>
						                </div>
										<div class="row"> 
											<div class="form-group col-xs-6">
							                    <label for="name2">Captcha</label>
							                    <input class="form-control" id="txtCaptcha" name="cp" disabled=disabled  type="text" value="" style="text-align:center; font-family:calibri; font-size:30px; background-image:url('');"/>
							                </div>						                    
											 <div class="form-group col-xs-6">
							                    <label for="name2">Enter Captcha</label>
							                    <input class="form-control" id="txtInput" name="cp2"  type="text" value="" required>
							                    <div class="error" id="err-name" style="display: none;">Please Enter Captcha</div>
						                    </div>
						                </div><input class="form-control" id="txtCaptcha1" name="cp1" type="text" value="" style="visibility:hidden;" />
							           <!-- Submit-button -->
						                <div class="row">
											<div class="col-xs-6 text-center">
						                        <button type="button" class="btn btn-custom" id="btnrefresh" name="New Captcha" value="" onClick="DrawCaptcha();">New Captcha</button>
						                    </div>
						                    <div class="col-xs-6 text-center">
						                        <button type="submit" class="btn btn-custom" id="submit" name="submit" value="submit">Login</button>
						                    </div>
						                </div>
						            </div>  
						        </form>
							</div>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<!-- End content -->
	</div>
	<!-- End Container -->
	<!-- Preloader -->
	<div class="preloader">
		<img alt="" src="">
	</div>
	<!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
  	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/SmoothScroll.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>