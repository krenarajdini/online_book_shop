<?php
	session_start();
	include_once("connection.php");
	$email = $_SESSION['email'];
	$user = mysqli_query($con, "SELECT * FROM user WHERE user.email = '$email'");

    $u_id;
    $name;
    $phone_number;
    $gender;
    $shipment_address;
    $email ;



	if($res = mysqli_fetch_array($user)){
		$u_id = $res['u_id'];
		$name = $res['name'];
		$phone_number = $res['phone_number'];
		$gender = $res['gender'];
		$shipment_address = $res['shipment_address'];
		$email = $res['email'];
		$password = $res['password'];
	}

?>

<?php
include_once("editprocess.php");
?>
<html>
<head>	
	<link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/edit.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Online Book Shop</title>



</head>

<body>
	<?php
	include_once("navbar.php");
	?>
	
	
<section class="py-5 mt-5">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="w-100 justify-content-between d-flex">
                    <h4><b>Update Account Details</b></h4>
                    <a href="./orders.php" class="btn btn btn-dark btn-flat"><div class="fa fa-angle-left"></div> Back to Order List</a>
                </div>
                    <hr class="border-warning">
                    <div class="col-md-6">
                        <form action="edit.php" method="POST" id="update_account">
                        <input type="hidden" name="id" value="3">
                            <div class="form-group">
                                <label for="firstname" class="control-label">Name</label>
                                <input type="text" name="name" class="form-control form" disabled = "true" value="<?php echo $name;?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Contact</label>
                                <input type="text" class="form-control form-control-sm form" name="phone_number" 
                                        value="<?php echo $phone_number;?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Gender</label>
                                <select name="gender" id=""  disabled = "true" class="custom-select select" required="">
                                    <option <?php echo ($gender == 'Male' ? "selected" : "");?> >Male</option>
                                    <option <?php echo ($gender == 'Female' ? "selected" : "");?> >Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Default Delivery Address</label>
                                <textarea class="form-control form" rows="3" name="shipment_address"><?php echo $shipment_address;?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="text" name="email" class="form-control form w-100" disabled value="<?php echo $email;?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">New Password</label>
                                <input type="password" name="password" class="form-control form"  placeholder="Enter value to change password">
                            </div>
                            <div class="form-group">
                                <label for="cpassword" class="control-label">Current Password</label>
                                <input type="password" name="cpassword" class="form-control form" placeholder="Enter value to change password">
                                <p class="control-label text-danger"> <?php echo array_key_exists("password-error-message", $errors) ?  $errors["password-error-message"] : "" ; ?></p>
                            </div>
                           
                                
                            
                                <button type="submit" class="btn btn-dark btn-flat">Update</button>
                            </div>
                            <input type="hidden" name="edit-user">
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-4 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright © Books 2022</p>
              <p class="m-0 text-center text-white">Developed By: <a href="#">krenarajdini</a></p>
          </div>
        </footer>
</body>
</html>
