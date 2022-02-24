<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-3 form">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Username</strong></label>
                    </div>
                        <input class="form-control" type="text" name="name" placeholder="User Name" required value="<?php echo $name ?>">
                        <span role="alert" id="nameError" aria-hidden="true">
                            Please enter User Name
                        </span>
                    </div>
                      
                    <div class="input-group">
                    <td width="5%"><input name="txtisdcode" type="text" class="form-control"  size="7" placeholder="Country Code" value="<?php echo $intisd; ?>" maxlength="5">
                    <td width="10%"><input name="txtcitycode" type="text" class="form-control"  size="7" placeholder="Area Code" value="<?php echo $intccode;?>" maxlength="5">
                    <td width="26%"><input name="txtphone" type="text" class="form-control" placeholder="Phone number" required value="<?php echo $intphone;?>" maxlength="20" >
                    <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Tel</strong></label></div><br>
                    
                    <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"><strong>Gender</strong></label>
                    </div>
                    <select name="gender" class="custom-select" id="inputGroupSelect01" >
                        <option value="0" selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Shipment Address</strong></label>
                    </div>
                    <textarea class="textarea" name="shipment_address" placeholder=" input your text here.."  ></textarea>
                    </div><br>

                    <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Email</strong></label>
                    </div>
                        <input class="form-control" type="email" name="email" placeholder="email@example.com" required value="<?php echo $email ?> "minlength="8">
                        <span class="error" aria-live="polite"></span>
                    </div>

                    <div class="form-row">
                        <div class="col">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Password</strong></label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="col">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Confirm Password</strong></label>
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                        </div>
                    </div><br>
                    
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                        <input class="form-control resetbtn" type="reset" value="Reset" name="reset" >
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>