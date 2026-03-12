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

/* DELETE JOBS */

if(isset($_POST['submit'])){
    if(!empty($_POST['check_list'])){
        foreach($_POST['check_list'] as $selected){
            mysqli_query($conn,"DELETE FROM postings WHERE sl='$selected'");
        }
    }
}

/* EDIT JOB */

if(isset($_POST['sub'])){
    $_SESSION['sl'] = $_POST['sub'];
    header("Location: edit.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<title>Sharp Infotech Admin</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>

<body>

<div class="container">

<h2>Edit / Delete Job Posting</h2>

<form method="post">

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>ID</th>
<th>Role</th>
<th>Company</th>
<th>Location</th>
<th>Description</th>
<th>Edit</th>
<th>Delete</th>

</tr>

</thead>

<tbody>

<?php

$sql = "SELECT * FROM postings ORDER BY sl DESC";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['sl']; ?></td>

<td><?php echo $row['role']; ?></td>

<td><?php echo $row['company']; ?></td>

<td><?php echo $row['location']; ?></td>

<td><?php echo $row['description']; ?></td>

<td>

<button
type="submit"
name="sub"
value="<?php echo $row['sl']; ?>"
class="btn btn-info">

Edit

</button>

</td>

<td>

<input
type="checkbox"
name="check_list[]"
value="<?php echo $row['sl']; ?>">

</td>

</tr>

<?php } ?>

</tbody>

</table>

<br>

<button type="submit" name="submit" class="btn btn-danger">
Delete Selected
</button>

</form>

</div>

</body>
</html>