<?php

$conn = mysqli_connect(
"localhost",
"admin",
"administrator@1234",
"shariidq_sharp_jobs"
);

if(!$conn){
die("Database connection failed");
}

?>