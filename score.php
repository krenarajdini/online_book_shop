<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require("connection.php");
session_start();
?>
 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
 
<?php
$con = mysqli_connect('localhost', 'root', '', 'online_book_shop');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
 
$result = mysqli_query($con,"SELECT * FROM user where 'name' LIKE _['name']");
 
 
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Fullname</th>
<th>Score</th>
<th>Gamedate</th>
<th>QuizTitle</th>
</tr>";
 
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['u_id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['Score'] . "</td>";
echo "<td>" . $row['Gamedate'] . "</td>";
echo "<td>" . $row['QuizTitle'] . "</td>";
echo "</tr>";
}
echo "</table>";
 
mysqli_close($con);
?>
this is profile.php
 <?php
 require('connection.php');
$result = mysqli_query($con,"SELECT *FROM user ");
while($row = mysqli_fetch_array($result))
{
       echo "<br />Your <b><i>Profile</i></b> is as follows:<br />";
        echo "<b>First name:</b> ". $row['name'];
        echo "<br /><b>password:</b> ".$row['Spassword'];
        echo "<br /><b>Email:</b> ".$row['Email'];
        echo "<br /><b>Year:</b> ".$row['Username'];
        echo "<br /><b>Date created :</b> ".$row['Date_Creation'];
}
mysqli_close($con);
?>
    </main>



</html>