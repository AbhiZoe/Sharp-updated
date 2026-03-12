<?php
if(isset($_POST['submit']))
{

$name = $_POST['f_name'];
$soc_code = $_POST['f_socc'];
$soc_title = $_POST['f_soct'];
$location = $_POST['f_loc'];
$city = $_POST['f_city'];
$state = $_POST['f_state'];
$zip = $_POST['f_zip'];
$wagerate = $_POST['f_rate'];
$employ_period_from = $_POST['f_empf'];
$employ_period_to = $_POST['f_empt'];
$posting_from = $_POST['f_posf'];
$posting_to = $_POST['f_post'];

$filename = $_FILES['filename']['name'];
$tmp = $_FILES['filename']['tmp_name'];

move_uploaded_file($tmp,"../lca/".$filename);

$query = "UPDATE lca1 SET
name='$name',
soc_code='$soc_code',
soc_title='$soc_title',
location='$location',
city='$city',
state='$state',
zip='$zip',
wagerate='$wagerate',
employ_period_from='$employ_period_from',
employ_period_to='$employ_period_to',
posting_from='$posting_from',
posting_to='$posting_to',
file='$filename'
WHERE sl='$sl'";

$result = mysqli_query($conn,$query);

if($result)
{
echo '<script>alert("LCA Posting Updated Successfully");</script>';
echo '<script>location.replace("viewlca.php")</script>';
}
else
{
echo "Error updating record";
}

}
?>