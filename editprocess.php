<?php
session_start();
include_once("connection.php");
$email = $_SESSION['email'];

if(isset($_POST['update'])){	
  

    //Clean input
    $u_id = mysqli_real_escape_string($con, $_POST['u_id']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $shipment_address = mysqli_real_escape_string($con, $_POST['shipment_address']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    //Validation
    if( empty($phone_number) || empty($shipment_address) || empty($password) ) {	
        if(empty($phone_number)) {
            echo '<font color="red">Phone number field is empty.</font><br>';
        }
        if(empty($shipment_address)) {
            echo '<font color="red">Shipment address field is empty.</font><br>';
        }
        if(empty($password)) {
            echo '<font color="red">Password field is empty.</font><br>';
        }		
    } else {	
        $result = mysqli_query($con, "UPDATE user SET phone_number='$phone_number',
                shipment_address='$shipment_address', password='$password' WHERE u_id=$u_id");
        header("Location: home.php");
    }
}
?>