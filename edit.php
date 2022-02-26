
<?php
session_start();
include_once("connection.php");
$username = $_SESSION['name'];
$result = mysqli_query($con, "SELECT * FROM user WHERE name = '$username'");

if($res = mysqli_fetch_array($result)){
	$u_id = $res['u_id'];
	$name = $res['name'];
	$phone_number = $res['phone_number'];
	$gender = $res['gender'];
	$shipment_address = $res['shipment_address'];
	$email = $res['email'];
	$password = $res['password'];
	echo $u_id;
	echo $name;
	echo $phone_number;
}

?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
    
<a href="profile.php">Home</a>
	<br><br>
	
	<form name="form1" method="post" action="editprocess.php">
		<table border="0">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr>
				<td>Phone number</td>
				<td><input type="text" name="phone_number" value="<?php echo $phone_number;?>"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
			</tr>
			<tr>
				<td>Shipment address</td>
				<td><input type="text" name="shipment_address" value="<?php echo $shipment_address;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password" value="<?php echo $password;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="u_id" value= "<?php echo $u_id;?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>