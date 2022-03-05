<?php
	session_start();
	include_once("connection.php");
	$email = $_SESSION['email'];
	$user = mysqli_query($con, "SELECT * FROM user WHERE user.email = '$email'");


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
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/edit.css">
</head>

<body>
	<?php
	include_once("navbar.php");
	?>
	
	
	<div class="form-container">
		<div class="form-infos">
			<div class="form-title">
				<p>Name</p>
				<p>Phone number</p>
				<p>Gender</p>
				<p>Shipment address</p>
				<p>Email</p>
				<p>Password</p>
				<p>Confirm Password</p>
			</div>
			
			<form name="update" method="post" action="editprocess.php" >
				<div class="form-inputs">
					<input type="text" name="name"    value="<?php echo $name;?>">
					<input type="text" name="phone_number" value="<?php echo $phone_number;?>">
					<select name="gender" id="inputGroupSelect01" >
						<option value="0" selected>Choose...</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
					<input type="text" name="shipment_address" value="<?php echo $shipment_address;?>">
					<input type="text" name="email"  value="<?php echo $email;?>">
					<input type="password" name="password">
					<input type="password" name="confpassword">

					<input type="hidden" name="u_id" value= "<?php echo $u_id;?>">
					
				</div>
				
			
		</div>
		<input type="submit" name="update" class="btn btn-light form-btn" value="Update">
		</form>
	</div>
	
</body>
</html>