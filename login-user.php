<?php require_once "controllerUserData.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signup-user.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login</h2>
                    <p class="text-center"><small>Please enter your email and password to access your account..</small></p>
                    <?php
if (count($errors) > 0) {
    ?>
                        <div class="alert alert-danger text-center">
                            <?php
foreach ($errors as $showerror) {
        echo $showerror;
    }
    ?>
                        </div>
                        <?php
}
?>
                    <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Email</strong></label></div>
                        <input id="email" class="form-control" type="email" name="email"
                        placeholder="email@example.com" required value="<?php echo $email ?> "minlength="8">
                    </div>
                    <p id="email-error"></p>

                    <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" id="inputGroup-sizing-sm"><strong>Password</strong></label>
                    </div>
                        <input class="form-control" id="password1" type="password" name="password" placeholder="Password" required>
                    </div>
                    <p id="pass-error-message"></p>
                    <!-- <div><input type="checkbox" name="rememberme" value="1" />&nbsp;Remember Me</div> -->
                    <div class="table">
                        <input class="form-control button" type="submit" name="login" value="Login">
                        <input class="form-control resetbtn" type="reset" value="Reset" name="reset" >
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="link login-link text-center">Not a member of Online Book Shop? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/login-user.js"></script>
</body>
</html>