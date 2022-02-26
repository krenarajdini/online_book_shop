<?php
include_once("connection.php");
if(isset($_POST['update']))
{	

$u_id = mysqli_real_escape_string($con, $_POST['u_id']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$email = mysqli_real_escape_string($con, $_POST['email']);	
if(empty($name) || empty($gender) || empty($email)) {	
if(empty($name)) {
echo '<font color="red">Name field is empty.</font><br>';
}
if(empty($gender)) {
echo '<font color="red">Age field is empty.</font><br>';
}
if(empty($email)) {
echo '<font color="red">Email field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($con, "UPDATE user SET name='$name',gender='$gender',email='$email' WHERE u_id=$u_id");
header("Location: profile.php");
}
}
?>