<?php
// including the database connection file
include_once("connection.php");

?>
<?php
//getting id from url
$u_id = $_GET['u_id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM user WHERE u_id=$u_id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$gender = $res['gender'];
	$email = $res['email'];
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
				<td>Gender</td>
				<td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
			</tr>
		<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="u_id" value=<?php echo $_GET['u_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>