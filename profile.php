<?php
include_once("connection.php");
$u_id = mysqli_query($con, "SELECT * FROM user ORDER BY u_id DESC"); 
?>

<html>
<head>	
	<title>Display data in table with edit button </title>
</head>

<body>
<a href="home.php">Get Home</a><br><br>

	<table width='50%'height='15%' border='0'>

	<tr bgcolor='yellow'>
		<td>Name</td>
		<td>Phone number</td>
		<td>Gender</td>
		<td>Shipment Address</td>
		<td>Email</td>
		<td>Password</td>
		<td>Update</td>	
	</tr>
	<?php 
	
	while($res = mysqli_fetch_array($u_id)) { 		
		echo "<tr>";
		echo "<td bgcolor=''>".$res['name']."</td>";
		echo "<td>".$res['phone_number']."</td>";
		echo "<td>".$res['gender']."</td>";
		echo "<td>".$res['shipment_address']."</td>";
		echo "<td>".$res['email']."</td>";
		echo "<td>".$res['password']."</td>";	
echo "<td bgcolor='green'><a href='edit.php?u_id=$res[u_id]'><font color='white'>Edit</a>";         
	}
	?>
	</table>
</body>
</html>