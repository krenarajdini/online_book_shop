<nav class="navbar fixed-top container-fluid px-3 px-lg-3 ">
        <form class="form-inline" method="POST" action="home.php">
        <a class="navbar-brand" href="home.php">
            <img src="PngItem_194580.png" width="30" height="30" alt="" loading="lazy" >Book Shop</a>
            <div>
                <input type="text" name="book-title" placeholder="Enter keyword, title, author or ISBN">
                <input type="submit" name="submit">

            </div>
        </form>
        <div class="from-inline ">
            <div class="username">
                <img src="icon-user-preview.png" width="30" height="30" alt="" loading="lazy">
                Welcome <?php echo $name ?>
                <div title="Cart" class="btn btn-light mx-1">Cart
                <img src="https://z.nooncdn.com/s/app/com/noon/icons/cart.svg"
                alt="cart" width="20px" height="20px"></div>
                <button type="button" class="btn btn-light mx-1"><a href="edit.php">Account</a></button>
            <button type="button" class="btn btn-light mx-1"><a href="login-user.php">Logout</a></button></div>
        </div>

</nav>
