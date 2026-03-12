<?php
require('../dbconn.php');
session_start();

$user = $_SESSION['name'] ?? '';

if($user == ""){
    session_destroy();
    header("Location: index.php");
    exit();
}

if(isset($_POST['close'])){
    session_destroy();
    header("Location: index.php");
    exit();
}

if(isset($_POST['submit'])){
    $_SESSION['sl'] = $_POST['submit'];
    header("Location: details.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<title>Sharp Infotech Admin Panel</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>

<body>

<div class="container">

<h2 align="center">Job Openings</h2>

<table class="table table-bordered table-striped">

<thead>
<tr>

<th>Job ID</th>
<th>Role</th>
<th>Company</th>
<th>Location</th>
<th>Details</th>

</tr>
</thead>

<tbody>

<?php

$sql = "SELECT * FROM postings ORDER BY sl DESC";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['sl']; ?></td>

<td><?php echo $row['role']; ?></td>

<td><?php echo $row['company']; ?></td>

<td><?php echo $row['location']; ?></td>

<td>

<form method="post">

<button
type="submit"
name="submit"
value="<?php echo $row['sl']; ?>"
class="btn btn-danger">

Details

</button>

</form>

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</body>
</html>