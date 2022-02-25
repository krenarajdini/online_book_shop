<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: gray;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h1{
        position: absolute;
        top: 50%;
        left: 75%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 15px;
        font-weight: 600;
    }
    </style>
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">Online Book Shop</a>
    <div class="form-group">
    
    
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav>
    </div>
    
</body>
</html>
<?php
 require('connection.php');
$result = mysqli_query($con, "SELECT * FROM `user`");

        echo "<table border='1'>
            <tr>     
                <th><br />Your <b><i>Profile</i></b> is as follows:<br /></th>
                <th><br>  User id:</b> </th>
                <th><br /><b>Full name:</b> </th>
                <th><br /><b>Phone number:</b> </th>
                <th><br /><b>Gender:</b> </th>
                <th><br /><b>Shipment Address :</b> </th>
                <th><br /><b>Email:</b> </th>
                <th><br /><b>Password:</b></th>
            </tr>"; 
       
                while($row = mysqli_fetch_array($result)) 
                { 
                    echo "<tr>";
                    echo "<td>" . "</td>";
                    echo "<td>" . $row['u_id'] . "</td>"; 
                    echo "<td>" . $row['name'] . "</td>"; 
                    echo "<td>" . $row['phone_number'] . "</td>"; 
                    echo "<td>" . $row['gender'] . "</td>"; 
                    echo "<td>" . $row['shipment_address'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>"; 
                    echo "<td>" . $row['password'] . "</td>";

                    echo "</tr>"; 
                    } 
                echo "</table>"; 


                

mysqli_close($con);
?>
<button type="button" class="btn btn-light"><a href="">Update</a></button>
</body>
</html>
<script src="js/update.js"></script>
