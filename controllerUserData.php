<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();


//Check whether the submission is made
if(!isset($_POST["hidSubmit"])){

    //Declarate the necessary variables
    $intisd="";
    $intccode="";
    $intphone="";
    DisplayForm();
    }
    else{
    
    //Assign the entered values to variables for validation
    $intisd=$_POST["txtisdcode"];
    $intccode=$_POST["txtcitycode"];
    $intphone=$_POST["txtphone"];
    
    //The entered value is checked for proper format
    if(substr_count($intisd,"+")>0){
    if(strpos($intisd,"+")==0)
    $intisd=substr($intisd,1,strlen($intisd));
    }
    $result=ereg("^[0-9]+$",$intisd,$trashed);
    $result=ereg("^[0-9]+$",$intisd,$trashed);
    if(!($result)){echo "Enter Valid ISDCODE";}
    $result=ereg("^[0-9]+$",$intccode,$trashed);
    if(!($result)){echo "Enter Valid CITY CODE";}
    $result=ereg("^[0-9]+$",$intphone,$trashed);
    if(!($result)){echo "Enter Valid Phone Number";}
    DisplayForm();
    }
    
    //User-defined Function to display the form in case of Error
    function DisplayForm(){
    global $intisd,$intccode,$intphone;}
    
//if user signup button
if(isset($_POST['signup'])){
    //Getting input
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $txtisdcode = mysqli_real_escape_string($con, $_POST['txtisdcode']);
    $txtcitycode = mysqli_real_escape_string($con, $_POST['txtcitycode']);
    $txtphone = mysqli_real_escape_string($con, $_POST['txtphone']);
    $phone_number = $txtisdcode . $txtcitycode .  $txtphone ;

    $shipment_address = mysqli_real_escape_string($con, $_POST['shipment_address']);


    //Validation

    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM user WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }

    //DB insertion
    if(count($errors) === 0){
        // $password = hash('sha256', $_POST['password']);
		// function createSalt(){
   		// 	$string = md5(uniqid(rand(), true));
    	// 	return substr($string, 0, 3);
		// }
		// $salt = createSalt();
		// $encpass = hash('sha256', $salt . $password);

        $encpass = password_hash($password, PASSWORD_BCRYPT);
        // echo password_hash('sha256', $_POST['password']);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO user (name, email, password, code, status, gender, phone_number, shipment_address  )
                        values('$name', '$email', '$encpass', '$code', '$status', '$gender', '$phone_number', '$shipment_address' )";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "krenarajdini912@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                echo('Sent from buraydah');
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}



    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM user WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE user SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM user WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: home.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM user WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE user SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: krenarajdini912@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM user WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE user SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
    
        
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
    
    
?>