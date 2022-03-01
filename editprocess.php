<?php
session_start();
include_once("connection.php");
$username = $_SESSION['name'];
if(isset($_POST['update']))
{	

$u_id = mysqli_real_escape_string($con, $_POST['u_id']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$shipment_address = mysqli_real_escape_string($con, $_POST['shipment_address']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
if(empty($name) || empty($phone_number) || empty($gender) || empty($shipment_address) || empty($email) || empty($password) ) {	
if(empty($name)) {
echo '<font color="red">Name field is empty.</font><br>';
}
if(empty($phone_number)) {
echo '<font color="red">Phone number field is empty.</font><br>';
}
if(empty($gender)) {
echo '<font color="red">gender field is empty.</font><br>';
}
if(empty($shipment_address)) {
 echo '<font color="red">Shipment address field is empty.</font><br>';
}
if(empty($email)) {
echo '<font color="red">Email field is empty.</font><br>';
}
if(empty($password)) {
echo '<font color="red">Password field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($con, "UPDATE user SET name='$name',phone_number='$phone_number',gender='$gender',shipment_address='$shipment_address',email='$email',password='$password' WHERE u_id=$u_id");
header("Location: edit.php");
}
}
?>