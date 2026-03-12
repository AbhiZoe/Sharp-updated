<?php
session_start();
require('../dbconn.php');

$user = $_SESSION['name'] ?? '';

if($user == "")
{
    session_destroy();
    echo "<h2>Invalid Session. Redirecting...</h2>";
    header("refresh:3;url=index.php");
    exit();
}

if(isset($_POST['submit']))
{
    $role = mysqli_real_escape_string($conn,$_POST['f_role']);
    $company = mysqli_real_escape_string($conn,$_POST['f_company']);
    $location = mysqli_real_escape_string($conn,$_POST['f_loc']);
    $description = mysqli_real_escape_string($conn,$_POST['f_desc']);

    $query = "INSERT INTO postings (role, company, location, description)
              VALUES ('$role','$company','$location','$description')";

    $result = mysqli_query($conn,$query);

    if($result)
    {
        echo "<script>alert('Job posted successfully');</script>";
        echo "<script>location.replace('admin.php')</script>";
    }
    else
    {
        echo "Database Error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8"/>
<title>Sharp Infotech Admin</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>

<body>

<div class="container">

<h2>Add New Job Posting</h2>

<form method="post">

<div class="form-group">
<label>Job Title</label>
<input type="text" name="f_role" class="form-control" required>
</div>

<div class="form-group">
<label>Company</label>
<input type="text" name="f_company" class="form-control" required>
</div>

<div class="form-group">
<label>Location</label>
<input type="text" name="f_loc" class="form-control" required>
</div>

<div class="form-group">
<label>Job Description</label>
<textarea name="f_desc" class="form-control" rows="5" required></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Post Job
</button>

</form>

</div>

</body>
</html>