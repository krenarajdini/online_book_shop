<?php
 require('connection.php');
$result = mysqli_query($con,"SELECT *FROM user ");
while($row = mysqli_fetch_array($result))
{
       echo "<br />Your <b><i>Profile</i></b> is as follows:<br />";
        echo "<b>Full name:</b> ". $row['name'];
        echo "<br /><b>Password:</b> ".$row['password'];
        echo "<br /><b>Email:</b> ".$row['Email'];
        echo "<br /><b>Year:</b> ".$row['name'];
        echo "<br /><b>Date created :</b> ".$row['Date_Creation'];
}
mysqli_close($con);
?>
    </main>



</html>