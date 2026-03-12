<?php
session_start();

$user = $_SESSION['name'] ?? '';

if($user == "")
{
    session_destroy();
    header("Location: index.php");
    exit();
}

if(isset($_POST['close']))
{
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8"/>
<title>Sharp Infotech Admin Panel</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/red.css">
<link rel="stylesheet" href="css/responsive.css">

</head>

<body>

<div id="container">

<header>

<div class="logo-box logo">
<h2><a href="admin.php">Sharp Infotech</a></h2>
<p>Website Admin Panel</p>
</div>

<div class="menu-box">

<ul class="menu">

<li>
<a class="active" href="admin.php">
<i class="fa fa-home"></i>
<span>Dashboard</span>
</a>
</li>

<li>
<a href="postings.php">
<i class="fa fa-briefcase"></i>
<span>View Job Postings</span>
</a>
</li>

<li>
<a href="add.php">
<i class="fa fa-plus-circle"></i>
<span>Add Job Posting</span>
</a>
</li>

<li>
<a href="remove.php">
<i class="fa fa-edit"></i>
<span>Edit Job Posting</span>
</a>
</li>

<li>
<a href="view.php">
<i class="fa fa-users"></i>
<span>View Applications</span>
</a>
</li>

<?php if($user == "admin"){ ?>

<li>
<a href="users.php">
<i class="fa fa-user-plus"></i>
<span>Manage Users</span>
</a>
</li>

<?php } ?>

<form method="post">

<input type="submit"
name="close"
value="Logout"
style="margin-left:30%; margin-top:40%; background:#f05050; border:none; height:35px; width:120px; color:#fff;"/>

</form>

</ul>

</div>

</header>


<div id="content">

<div class="inner-content">

<h1 align="center">Welcome <?php echo $user; ?></h1>

<br>

<div style="width:70%; margin:auto; font-size:18px;">

<ol>

<li>Use the menu on the left to manage job postings.</li>

<li>You can add, edit, or remove jobs posted on the website.</li>

<li>Applicants will appear under <b>View Applications</b>.</li>

<li>Always logout after finishing your session.</li>

</ol>

<br>

<center>

<b>

<?php
date_default_timezone_set("Asia/Kolkata");
echo date("l, d M Y - h:i A");
?>

</b>

</center>

</div>

</div>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>