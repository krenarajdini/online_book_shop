<?php

session_start();

include 'connection.php';   

if (isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $password = mysqli_real_escape_string($con, md5($_POST["password"]));
    $cpassword = mysqli_real_escape_string($con, md5($_POST["cpassword"]));

    if ($password === $cpassword) {
        } else {
            $sql = "UPDATE user SET name='$name', password='$password' ";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>alert('Profile Updated successfully.');</script>";
                
            } else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $con->error;
            }
        }
    } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/signup-user.css">
    <title>Profile Page</title>
</head>
<body class="profile-page">
    <div class="wrapper">
        <h2>Profile</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <?php 
            
            $sql = "SELECT * FROM user";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="form-group">
                <input type="text" id="full_name" name="full_name" placeholder="Full Name" value="<?php echo $row['name']; ?>" disabled required>
            </div>
            <div class="form-group">
                <input type="number" id="phone_number" name="Phone_number" placeholder="Phone number" value="<?php echo $row['phone_number']; ?>" required>
            </div>
            <div class="form-group">
                <input type="select" id="gender" name="gender" placeholder="Gender" value="<?php echo $row['gender']; ?>" required>
            </div>
            <div class="form-group">
                <input type="comment" id="shipment_address" name="shipment_address" placeholder="Shipment address" value="<?php echo $row['shipment_address']; ?>" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $row['email']; ?>" disabled required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>" required>
            </div>
            <div class="form-group">
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" value="<?php echo $row['password']; ?>" required>
            </div>
            <?php
                }
            }

            ?>
            <div>
                <button type="submit" name="submit" class="btn">Update Profile</button>
                <button type="reset" name="reset" class="btn" value="Reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>
