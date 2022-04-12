<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signup-user.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-4 form">
                <form id="signup-form" action="signup-user.php" method="POST" autocomplete="">
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
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Full Name</strong></label>
                    </div>
                        <input id="username" class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                    </div>
                    <p id="username-error"></p>

                    <div class="input-group input-group-sm mb-3">
                    <div class="input-group">
                    <input id="country-number" name="txtisdcode" type="text" class="form-control" 
                    placeholder="Country" value="<?php echo $intisd; ?>" maxLength="3">
                    <input  id="area-number" name="txtcitycode" type="text" class="form-control" 
                      placeholder="Area" value="<?php echo $intccode;?>" maxLength="2">
                    <input id="phone-number" name="txtphone" type="text" class="form-control"
                     placeholder="Phone " required value="<?php echo $intphone;?>" maxLength="7" >
                    <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Tel</strong></label></div></div>
                    <p id="number-error"></p>

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

                    
                    <div class="input-group input-group-sm mb-3">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Shipment Address</strong></label>
                        <textarea class="textarea" name="shipment_address" placeholder=" input your text here.."  ></textarea>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>UserName</strong></label>
                    </div>
                        <input id="user_name" class="form-control" type="text" name="user_name" placeholder="User Name" required >
                    </div>
                    <p id="username-error"></p>

                    <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Email</strong></label></div>
                        <input id="email" class="form-control" type="email" name="email" 
                        placeholder="email@example.com" required value="<?php echo $email ?> "minlength="8">
                    </div>
                    <p id="email-error"></p>
                    
                    <div class="input-group input-group-sm mb-3">
                    <div class="form-row">
                        <div class="col">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Password</strong></label>
                        <input class="form-control" id="pswd" type="password" name="password"
                         title="Minimum eight characters, at least one letter and one number:" placeholder="Password"  required>
                        </div>
                        <div class="col">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Confirm Password</strong></label>
                        <input class="form-control" id="confirm-pswd" type="password" name="cpassword" placeholder="Confirm password" required>
                        </div>
                        </div></div>
                        <p class="pass-error-message" id="pass-error-message"></p> 
                        
                    <div class="form-group">
                        <button class="form-control button"  type="submit" name="signup" value="Signup">Signup</button>
                        <button class="form-control resetbtn" type="reset" name="reset" >Reset</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/signup-user.js"></script>
</body>
</html>