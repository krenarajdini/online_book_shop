<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
include_once("connection.php");
$email = $_SESSION['email'];
$errors = array();
if(isset($_POST['edit-user'])){	
    
 
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $phone_number  = mysqli_real_escape_string($con, $_POST['phone_number']);
    $shipment_address = mysqli_real_escape_string($con, $_POST['shipment_address']);

    //Validation

    if($password !== $cpassword){
        $errors['password-error-message'] = "Confirm password not matched!";
    }

    //DB insertion
    if(count($errors) === 0){
        echo "success";
		function createSalt(){
   			$string = md5(uniqid(rand(), true));
    		return substr($string, 0, 3);
		}
		$salt = createSalt();
		$encpass = hash('sha256', $salt . $password);

        
        $insert_data = "UPDATE user SET password = '$encpass', salt = '$salt', phone_number = '$phone_number', shipment_address = '$shipment_address'
                 WHERE email = '$email'";
        $update_user_result = mysqli_query($con, $insert_data);

    
        $update_account = "UPDATE account SET hash_password = '$encpass' WHERE u_id = '$u_id'";
        $update_account_result = mysqli_query($con, $insert_data);
        
    }

}
?>