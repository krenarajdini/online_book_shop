<nav class="navbar fixed-top container-fluid px-3 px-lg-3 ">
        <form class="form-inline" method="POST" action="home.php" autocomplete="off">
        <a class="navbar-brand" href="home.php">
            <img src="img\PngItem_194580.png" width="30" height="30" alt="" loading="lazy" >Book Shop</a>
            <div>
                <input class="p-1 border-0" type="search" name="book-title" placeholder="search.." title="Enter keyword, title, author or ISBN">
                <input class="p-1 border-0" type="submit" name="search-book" value="Search">
                
            </div>
        </form>
        <div class="from-inline ">
            <div class="username">
                <img src="img\icon-user-preview.png" width="30" height="30" alt="" loading="lazy">
                Welcome <?php echo ucwords($name) ?>
                <div title="Cart" class="btn btn-light mx-1 "><a href="#">Cart</a>
                <img src="img\shop.png"
                alt="cart" width="25px" height="25px"></div>
                <button type="button" class="btn btn-light mx-1"><a href="edit.php">Account</a></button>
                <button type="button" class="btn btn-light mx-1"><a href="login-user.php">Logout</a></button></div>
        </div>

        


</nav>


<?php if(str_contains($_SERVER['REQUEST_URI'],'home.php')){


    ?> 
        <nav class="navbar category-bar fixed-top  mt-5 pt-2 px-3 px-lg-3  ">
            
                
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
                $category = '';
                 if(isset($_GET['category'])){
                    $category = $_GET['category'];
                 }
                for($index = 0; $index < $totalNumberOfCategories; $index++  ){
                    $activeCategory = 'btn-light';
                    if($category == $categories[$index]){
                        $activeCategory = 'active-category';
                    }
                    echo "<a href=\"http://localhost//online_book_shop/home.php?category=" 
                    . $categories[$index] ."\" type=\"button\" class=\"btn " . $activeCategory .  "  mx-1\" >"
                     . ucfirst($categories[$index])."</a>";
                }
            ?>
                
            
                   
        </nav>
       
<?php }?>


