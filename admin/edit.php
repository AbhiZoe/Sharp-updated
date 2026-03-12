<?php 

require('../dbconn.php'); 

session_start();

$user=$_SESSION['name'];
if($user=="" || $user==" ")
{
session_destroy();
echo "<div style='height: 100vh; width:100%; position: absolute; background-color: white; z-index: 999;'>";
	echo "<center><h2>Invalid Login Session. Please try Again</h2></center>";
	echo "<center><h2>You will be redirected in <span id='counter'>3</span> second(s).</h2></center></div>";
	echo '<script language="javascript">function countdown() {
    var i = document.getElementById("counter");
    if (parseInt(i.innerHTML)<=1) {
        location.href = "index.php";
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);</script>';
}
if(isset($_POST['close']))
{
session_destroy();
echo '<script language="javascript"> location.replace("index.php")</script>';
}

$sl=$_SESSION['sl'];

$query="SELECT * FROM `postings` WHERE `sl` ='$sl' ";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

      $role=$row['role'];

	  $company=$row['company'];

	  $posted=$row['posted'];

	  $last=$row['last'];	  

	  $exp=$row['expirience'];

	  $qual=$row['qualification'];

	  $salary=$row['salary'];

	  $location=$row['location'];

	  $jd1=$row['jd'];

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

	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,700,800' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Crete+Round:400,400italic' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	

	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen">

	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

		<link rel="stylesheet" type="text/css" href="css/red.css" media="screen">

	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

	<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78539129-1', 'auto');

  ga('send', 'pageview');

</script>

</head>

<body>

<?php

if(isset($_POST['submit']))

{

require('../dbconn.php'); 

$role=$_POST['f_role'];

$company=$_POST['f_company'];

$posted=$_POST['f_posted'];

$last=$_POST['f_last'];

$qual=$_POST['f_qual'];

$exp=$_POST['f_exp'];

$sal=$_POST['f_sal'];

$loc=$_POST['f_loc'];

$jd=$_POST['f_desc'];

$query = "UPDATE `postings` SET `sl`='$sl',`role`='$role',`company`='$company',`posted`='$posted',`last`='$last',`jd`='$jd',`expirience`='$exp',`qualification`='$qual',`salary`='$sal',`location`='$loc' WHERE `sl` ='$sl' ";

// Execute the query

$result=mysqli_query($conn, $query) or die('Error, query failed');

//Writes the photo to the server  

if($result)  

{   

//Tells you if its all ok  

echo '<script language="javascript"> alert("Successfully Updated the openings !!");</script>';

echo '<script language="javascript"> location.replace("admin.php")</script>';

} 

 else {   

 //Gives and error if its not  

 echo "Sorry, there was a problem uploading your file.";  

 }

} 

?>

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



			<div class="menu-box">

				<ul class="menu">				

					<?php if($user=="admin")

					{

					echo'<li><a href="admin.php"><i class="fa fa-home"></i><span>Home</span></a></li>';

					echo'<li><a href="view.php"><i class="fa-picture-o fa"></i><span>View Profiles</span></a></li>';

					echo'<li><a href="postings.php"><i class="fa fa-lightbulb-o"></i><span>View Job Postings</span></a></li>';

					echo'<li><a href="add.php"><i class="fa fa-lightbulb-o"></i><span>Add a Job Posting</span></a></li>';

					echo'<li><a class="active" href="remove.php"><i class="fa-anchor fa"></i><span>Edit a Job Posting</span></a></li>';

					echo'<li><a href="users.php"><i class="fa-picture-o fa"></i><span>Add/Remove Users</span></a></li>';					

					}

					else

					{

					echo'<li><a href="admin.php"><i class="fa fa-home"></i><span>Home</span></a></li>';

					echo'<li><a href="view.php"><i class="fa-picture-o fa"></i><span>View Profiles</span></a></li>';

					echo'<li><a href="postings.php"><i class="fa fa-lightbulb-o"></i><span>View Job Postings</span></a></li>';

					echo'<li><a class="active" href="add.php"><i class="fa fa-lightbulb-o"></i><span>Add a Job Posting</span></a></li>';					

					}

					?>	

						<form method=post>

						<input type=submit name=close value="Logout" style="margin-left:30%; margin-top:50%; background-color:#f05050; border-color:#f05050; border:solid; height:30px; width:100px; color:#fff; "/>

						</form>					

				</ul>				

			</div>		

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

								<h3 class="title">Edit the Details</h3>								

								<div class="devider"></div>

								<form  method="post" class="form-main">

						            <div class="col-xs-12 text-left">

						                <div class="row"> 

						                    <!-- Name -->           

						                    <div class="form-group col-xs-6">

							                    <label for="name2">Role</label>

							                    <input class="form-control" id="name2" name="f_role" onblur="if(this.value == '') this.value='Role'" onfocus="if(this.value == 'Role') this.value=''" type="text" value="<?php echo $role; ?>">

							                    <div class="error" id="err-name" style="display: none;">Please enter Role</div>

						                    </div>



						                    <!-- Email -->

						                    <div class="form-group col-xs-6">

							                    <label for="email2">Company</label>

							                    <input class="form-control" id="email2" name="f_company" type="text" onfocus="if(this.value == 'Name of Company') this.value='';" onblur="if(this.value == '') this.value='Name of Company';" value="<?php echo $company; ?>">

							                    <div class="error" id="err-emailvld" style="display: none;">Name of Company</div> 

						                    </div>

						                </div>

										 <div class="row"> 

						                    <!-- Name -->           

						                    <div class="form-group col-xs-6">

							                    <label for="name2">Date Posted</label>

							                    <input class="form-control" id="mobile" name="f_posted"  type="date" value="<?php echo $posted; ?>">

							                    <div class="error" id="err-name" style="display: none;">Please enter posted date</div>

						                    </div>



						                    <!-- Email -->

						                    <div class="form-group col-xs-6">

							                    <label for="email2">Last Date</label>

							                    <input class="form-control" id="city" name="f_last" type="date"  value="<?php echo $last; ?>">

							                    <div class="error" id="err-emailvld" style="display: none;">Please enter last date</div> 

						                    </div>

						                </div>

										 <div class="row"> 

						                    <!-- Name -->           

						                    <div class="form-group col-xs-6">

							                    <label for="name2">Qualification</label>

							                    <input class="form-control" id="mobile" name="f_qual"  type="text" value="<?php echo $qual; ?>">

							                    <div class="error" id="err-name" style="display: none;">Please enter qualification</div>

						                    </div>



						                    <!-- Email -->

						                    <div class="form-group col-xs-6">

							                    <label for="email2">Experience(years)</label>

							                    <input class="form-control" id="city" name="f_exp" type="text"  value="<?php echo $exp; ?>">

							                    <div class="error" id="err-emailvld" style="display: none;">Please enter experience</div> 

						                    </div>

						                </div>

										 <div class="row"> 

						                    <!-- Name -->           

						                    <div class="form-group col-xs-6">

							                    <label for="name2">Salary</label>

							                    <input class="form-control" id="mobile" name="f_sal"  type="text" value="<?php echo $salary; ?>">

							                    <div class="error" id="err-name" style="display: none;">Please enter salary</div>

						                    </div>



						                    <!-- Email -->

						                    <div class="form-group col-xs-6">

							                    <label for="email2">Location</label>

							                    <input class="form-control" id="city" name="f_loc" type="text"  value="<?php echo $location; ?>">

							                    <div class="error" id="err-emailvld" style="display: none;">Please enter the location</div> 

						                    </div>

						                </div>

										 <div class="row"> 

						                    <!-- Name -->           

						                    <div class="form-group col-xs-12">

							                    <label for="name2">Job Description</label>

							                    <textarea class="form-control" name="f_desc"><?php echo $jd1; ?></textarea>

							                </div>

						                </div>										

						                <!-- Submit-button -->

						                <div class="row">            

						                    <div class="col-xs-12 text-center">

						                        <button type="submit" class="btn btn-custom" id="submit" name="submit" value="submit">Update</button>

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