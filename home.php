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


    if(isset($_GET['category'])){
        $category = $_GET['category'];
        
        $category_search = "SELECT category_id FROM category where title  = '$category'";
        $res = mysqli_query($con, $category_search);
        $category_id = mysqli_fetch_assoc($res)['category_id'];



        $book_search = "SELECT * FROM books where category_id = '$category_id'";
        $res = mysqli_query($con, $book_search);
        $totalNumberOfBooks = mysqli_num_rows($res);
         if ($totalNumberOfBooks > 0) {
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
            $book_search = "SELECT * FROM books WHERE title LIKE '%$book_name%'";

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
            // $year = isset($_POST['year']) ? $_POST['year'] : "";
            // $price = isset($_POST['price']) ? $_POST['price'] : "";
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

        $books = [];
        $book_search = "SELECT * FROM books";
        $res = mysqli_query($con, $book_search);
        $totalNumberOfBooks = mysqli_num_rows($res);
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
                        <h5 class="display-4 fw-bolder" >If you want to make intelligent, get books from here.</h5>
                        <p class="lead fw-normal mb-0">Shop Now!</p>
                    </div>
                </div>
            </header>
            <div class="row gx-4 gx-lg-6 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                        for($i= 0; $i < count($books); $i++){ ?>
                    <div name ="card" class="col mb-5">
                        <div class="card product-item">
                            <!-- Product image-->
                            <img class=" card-image book-cover" src="<?php echo $books[$i]->coverImage ?>" alt="...">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"> <?php echo $books[$i]->title ?> </h5>
                                    <!-- Product price-->
                                                                    <span><b>Price: </b><?php echo $books[$i]->price ?></span>
                                                            </div>
                                <p class="m-0"><small><?php echo $books[$i]->author ?></small></p>
                                <p class="m-0"><small><?php echo $books[$i]->book_number ?></small></p>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-flat btn-primary" href="view-product.php">View</a>
                                </div>

                            </div>
                        </div>
                    </div>   
                
                <?php   }?>
            </div>



        <footer class="py-4 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright © Books 2021</p>
              <p class="m-0 text-center text-white">Developed By: <a href="#">krenarajdini</a></p>
          </div>
        </footer>
</body>
</html>