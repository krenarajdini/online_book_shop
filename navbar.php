<nav class="navbar fixed-top container-fluid px-3 px-lg-3 ">
        <form class="form-inline" method="POST" action="home.php" autocomplete="off">
        <a class="navbar-brand" href="home.php">
            <img src="PngItem_194580.png" width="30" height="30" alt="" loading="lazy" >Book Shop</a>
            <div>
                <input class="p-1 border-0" type="search" name="book-title" placeholder="search.." title="Enter keyword, title, author or ISBN">
                <input class="p-1 border-0" type="submit" name="search-book" value="Search">

            </div>
        </form>
        <div class="from-inline ">
            <div class="username">
                <img src="icon-user-preview.png" width="30" height="30" alt="" loading="lazy">
                Welcome <?php echo ucwords($name) ?>
                <div title="Cart" class="btn btn-light mx-1">Cart
                <img src="https://z.nooncdn.com/s/app/com/noon/icons/cart.svg"
                alt="cart" width="20px" height="20px"></div>
                <button type="button" class="btn btn-light mx-1"><a href="edit.php">Account</a></button>
            <button type="button" class="btn btn-light mx-1"><a href="login-user.php">Logout</a></button></div>
        </div>

</nav>

<?php if(str_contains($_SERVER['REQUEST_URI'],'home.php')){


    ?> 
        <nav class="navbar category-bar fixed-top  mt-5 pt-2 px-3 px-lg-3 ">
            
            <?php 
                $category_search = "SELECT title FROM category";
                $categories = [];
                $res = mysqli_query($con, $category_search);
                $totalNumberOfCategories = mysqli_num_rows($res);
                if ($totalNumberOfCategories > 0) {
                    $index = 0;
                    while ($row = mysqli_fetch_assoc($res)) {
                        $categories[$index] = $row['title'];
                        $index++;
                    }
                }
            ?>

            <?php
                for($index = 0; $index < $totalNumberOfCategories; $index++  ){
                    echo "<a href=\"http://localhost//online_book_shop/home.php?category=" . $categories[$index] ."\" type=\"button\" class=\"btn btn-light mx-1\">" . ucfirst($categories[$index])."</a>";
                }
            ?>

            
                

        </nav>

<?php }?>