<style>
    .search-icon{
        width: 15px;

    }
    .search-btn{
        padding: 0.4em;
        border: 0;
        background-color: #ddd;
        border-top-left-radius: 0.4em;   
        border-bottom-left-radius: 0.4em;  
    }
    .search-btn:focus{
        outline: none;
    }
    .search-btn:hover{
        background-color: lightblue;
    }
</style>
<nav class="navbar fixed-top container-fluid px-3 px-lg-3 ">
        

       <form class="form-inline" method="POST" action="home.php" autocomplete="off">
             <a class="navbar-brand" href="home.php">
                <img src="img\PngItem_194580.png" width="30" height="30" alt="" loading="lazy" >Book Shop</a>
        
            
            
                <div class="input-group md-form form-sm form-1 pl-0">
                    <div class="input-group-prepend">
                
                        <button class="search-btn" type="submit" ><img class="search-icon" src="img\search-icon.png" alt=""></button>
                 
                    </div>
                    <input class="form-control my-0 py-1" name="book-title" type="search" placeholder="Search" aria-label="Search">
                </div>
                <div class="input-group-prepend ml-1">
                   <a href="search-advanced.php" class="input-group-text btn ">Advanced Search</a>
                </div>
                
            </form>

        
            

            
        <div class="username" >
            
            <img src="img\icon-user-preview.png" width="30" height="30" alt="" loading="lazy">
            Welcome <?php echo ucwords($name) ?>
            <button type="button" class="btn btn-light mx-1">
            <a href="product-cart.php">Cart <img src="img\shop.png" alt="cart" width="25px" height="25px"></a></button>
            <button type="button" class="btn btn-light mx-1"><a href="edit.php">Account  <img src="img\user_icon.png" alt="cart" width="25px" height="25px"></a></button>
            <button type="button" class="btn btn-light mx-1"><a href="login-user.php">Logout  <img src="img\logout_icon.png" alt="cart" width="25px" height="25px"></a></button>
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



