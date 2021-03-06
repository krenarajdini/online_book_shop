<?php require_once "controllerUserData.php";?>
<?php
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false) {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $run_Sql = mysqli_query($con, $sql);
        if ($run_Sql) {
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $name = $fetch_info['name'];
            $status = $fetch_info['status'];
            $code = $fetch_info['code'];
            if ($status == "verified") {
                if ($code != 0) {
                    header('Location: reset-code.php');
                }
            } else {
                header('Location: user-otp.php');
            }
        }
    } else {
        header('Location: login-user.php');
    }
    if(isset($_POST['currency'])){
        $_SESSION['currency'] =  $_POST['currency'];
        $_SESSION['rate'] = $_POST['rate'];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    
  
    
</head>
<body>
    <?php
include_once "navbar.php";
?>

<?php  
    $books = [];
    $products_page = 6;
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $start = ($page - 1) * $products_page;
    $totalNumberOfBooks;



    if(isset($_GET['category'])){
        $category = $_GET['category'];
        $category_search = "SELECT category_id FROM category where title  = '$category'";
        $res = mysqli_query($con, $category_search);
        $category_id = mysqli_fetch_assoc($res)['category_id'];

        $book_search = "SELECT * FROM books where category_id = '$category_id'";
        $res = mysqli_query($con, $book_search);
        $totalNumberOfBooks = mysqli_num_rows($res);
        
        $book_search = "SELECT * FROM books where category_id = '$category_id' Limit $start, $products_page";
        $res = mysqli_query($con, $book_search);
        $totalNumberOfBooksForCategory = mysqli_num_rows($res);
         if ($totalNumberOfBooksForCategory  > 0) {
            $index = 0;
            while ($row = mysqli_fetch_assoc($res)) {
                $books[$index] = (object) ['author' => $row['author'], 'title' => $row['title'], 
                    'price' => $row['price'], 'book_number' => $row['book_number'], 'description' => $row['description'],
                        'coverImage' => $row['cover_image']];
                $index++;
            }
        }  
    }else //Search  
    if(isset($_POST["book-title"]) || isset($_POST['title'])|| isset($_POST['author']) || isset($_POST['description']) 
            || isset($_POST['year']) || isset($_POST['price']) ){
        
        //Basic search
        if(isset($_POST['book-title'])){

            $book_name = $_POST['book-title'];
            $book_search = "SELECT * FROM books WHERE title LIKE '%$book_name%' OR description LIKE '%$book_name%'  Limit $start, $products_page";
            $res = mysqli_query($con, $book_search);
            $totalNumberOfBooks = mysqli_num_rows($res);
            if ($totalNumberOfBooks > 0) {
                $index = 0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $books[$index] = (object) ['author' => $row['author'], 'title' => $row['title'], 'price' => $row['price'] , 'book_number' => $row['book_number'],
                    'description' => $row['description'],'coverImage' => $row['cover_image']];
                    $index++;
                }
            }  
        }else{      //Advanced search
            $book_search = "SELECT * FROM books WHERE ";
            $and = "";
            if(isset($_POST['title']) && $_POST['title'] != ""){
                $book_name = $_POST['title'];
                $book_search .= "title LIKE '%$book_name%' ";
                $and = " AND ";
            }
            if(isset($_POST['author']) && $_POST['author'] != ""){
                $author_name = $_POST['author'];
                $book_search .= $and . "author LIKE '%$author_name%' ";
                $and = " AND ";
            }
            if(isset($_POST['description']) && $_POST['description'] != ""){
                $description = $_POST['description'];
                $book_search .= $and . " description LIKE '%$description%' ";
                $and = " AND ";
            }
            if(isset($_POST['category']) && $_POST['category'] != ""){
                $category = $_POST['category'];
                $category_search = "SELECT category_id FROM category where title  = '$category'";
                $res = mysqli_query($con, $category_search);
                $category_id = mysqli_fetch_assoc($res)['category_id'];

                $book_search .= $and . " category_id LIKE '%$category_id%' ";
                $and = " AND ";
            }
            if(isset($_POST['year']) && $_POST['year'] != ""){
                $year = $_POST['year'];
                $book_search .= $and . " year LIKE '%$year%' ";
                $and = " AND ";
            }
            if(isset($_POST['price-max']) && $_POST['price-max'] != ""){
                $price_max = $_POST['price-max'];
                $book_search .= $and . " price <= '$price_max' ";
                $and = " AND ";
            }
            if(isset($_POST['price-min']) && $_POST['price-min'] != ""){
                $price_min = $_POST['price-min'];
                $book_search .= $and . " price >= '$price_min' ";
            }
            $book_search .= " Limit $start, $products_page";
            $res = mysqli_query($con, $book_search);
            $totalNumberOfBooks = mysqli_num_rows($res);
            if ($totalNumberOfBooks > 0) {
                $index = 0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $books[$index] = (object) ['author' => $row['author'], 'title' => $row['title'], 'price' => $row['price'] , 'book_number' => $row['book_number'],
                    'description' => $row['description'],'coverImage' => $row['cover_image']];
                    $index++;
                }
            }  
        }//Default page
    }else if(!isset($_POST["book-title"]) && !isset($_GET['category'])){

        $book_search = "SELECT * FROM books";
        $res = mysqli_query($con, $book_search);
        $totalNumberOfBooks = mysqli_num_rows($res);

        $book_search = "SELECT * FROM books Limit $start, $products_page";
        $res = mysqli_query($con, $book_search);
         if ($totalNumberOfBooks > 0) {
            $index = 0;
            while ($row = mysqli_fetch_assoc($res)) {
                $books[$index] = (object) ['author' => $row['author'], 'title' => $row['title'], 
                    'price' => $row['price'], 'book_number' => $row['book_number'], 'description' => $row['description'],
                        'coverImage' => $row['cover_image']];
                $index++;
            }
        } 
    }
?>
        <!-- Deafult home page -->
                <header class="py-1" >
                    <div class=" p-5 mt-5 ">
                        <div class="text-center" >
                         <?php if(!isset($_GET['category'])){ ?>
                            <h5 class="display-4 fw-bolder" >If you want to make intelligent, get books from here.</h5>
                            <p class="lead fw-normal mb-0">Shop Now!</p>

                        <?php }else{?>
                            <h5 class="display-4 fw-bolder" >Books in <?php echo ucfirst($_GET['category']); ?></h5>
                        <?php } ?>
                        </div>
                    </div>
                </header>
            <div class="row gx-4 gx-lg-6 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                    if(isset($_POST["book-title"])){
                        if(count($books) == 0){
                            echo "<h3 class='text-center m-5'>No books found for: '". $_POST["book-title"] ."'</h3>";
                        }
                    }

                    if(isset($_POST['title'])|| isset($_POST['author']) || isset($_POST['description']) 
                        || isset($_POST['year']) || isset($_POST['price']) ){
                        if(count($books) == 0){
                            echo "<h3 class='text-center m-5'>No books found for 'advanced search' </h3>";
                        }
                    }
                    

                        for($i= 0; $i < count($books); $i++){ ?>
                    <div name ="card" class="col mb-5">
                        <div class="card product-item">
                            <!-- Product image-->
                            <img class=" card-image book-cover " src="<?php echo $books[$i]->coverImage ?>" width="350" height="400" alt="...">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"> <?php echo $books[$i]->title ?> </h5>
                                    <!-- Product price-->
                                    <span><b>Price: </b><strong><?php echo $books[$i]->price * $_SESSION['rate'] ."</strong> ". $_SESSION['currency'] ?> </span>
                                </div>
                                <p class="m-0"><small><?php echo $books[$i]->author ?></small></p>
                                <p class="m-0"><small>ISBN: <?php echo $books[$i]->book_number ?></small></p>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer  pt-0 border-top-0 bg-transparent">
                                <div class="text-center d-flex justify-content-center">
                                    <a class="btn btn-flat btn-primary" href="view-product.php?book_number=<?php echo $books[$i]->book_number ?>">View</a>
                                
                                    <form action="product-cart.php" method="POST">
                                        <input type="hidden" name = "add_to_cart" value= <?php echo $books[$i]->book_number ?> >
                                        <input type="hidden" name = "price" value= <?php echo $books[$i]->price ?> >

                                         <button type="submit" class="btn btn-outline-primary mx-1" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                        </svg></button>
                                     </form>
                                </div>

                            </div>
                        </div>
                    </div>   
                
                <?php   }?>
            </div>
            <?php if($totalNumberOfBooks > 0){?>
            <nav aria-label="Page navigation example bg-light ">
                <ul class="pagination bg-light d-flex justify-content-center">
                    <li class="page-item"><a class="page-link"
                         href="home.php?<?php echo (empty($category)? "" : "category=".$category."&") ;?>page=<?php echo $page > 1? $page-1 : $page?>">Previous</a></li>
                    <?php for($i =0; $i < $totalNumberOfBooks/$products_page; $i++){ ?>
                    <li class="page-item <?php echo $page==$i +1 ? "active":""; ?>"><a class="page-link" 
                        href="home.php?<?php echo (empty($category)? "" : "category=".$category."&") ;?>page=<?php echo $i+1; ?>">
                        <?php echo $i+1; ?>
                    </a></li>
                    
                    <?php } ?>
                    <li class="page-item"><a class="page-link" 
                        href="home.php?<?php echo (empty($category)? "" : "category=".$category."&") ;?>page=<?php echo $page < $totalNumberOfBooks/$products_page? $page+1 : $page?>">Next</a></li>
                </ul>
            </nav>
            <?php }?>
<!-- Footer-->
        <footer class="py-4 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright ?? Books 2022</p>
              <p class="m-0 text-center text-white">Developed By: <a href="#">krenarajdini</a></p>
          </div>
        </footer>
</body>
</html>