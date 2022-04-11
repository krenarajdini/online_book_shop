<html lang="en" style="height: auto;"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Online Book Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/view-product.css">
  
</head>
<body style="height: auto;">
<?php 
     session_start();
     include_once("navbar.php");
     include_once("connection.php");

     //Add Review
    if (isset($_POST['add_review'])) {
        $review = $_POST['review'];
        $rating = $_POST['rating'];
        $user_id = $_SESSION['user_id'];
        $book_number = $_POST['book_number'];
        $date = date("Y-m-d");
        echo $date;
        $review_insert = "INSERT INTO reviews (user_id, book_number, review, rating, date) 
                    VALUES ('$user_id', '$book_number', '$review', '$rating', '$date'  )";
        $res = mysqli_query($con, $review_insert);
        
    }else{
        $book_number = intval($_GET['book_number']);

    }
    //Get reviews
    $review_sql = "SELECT * FROM reviews WHERE book_number = '$book_number'";
    $review_result = mysqli_query($con, $review_sql);
    $reviews = array();
    $stars_count = [0,0,0,0,0];
    while($row = mysqli_fetch_assoc($review_result)){
        //Get user name
        $user_sql = "SELECT * FROM user WHERE u_id = '".$row['user_id']."'";
        $user_result = mysqli_query($con, $user_sql);
        $user = mysqli_fetch_assoc($user_result);
        $row['user_name'] = $user['name'];
        $reviews[] = $row;
        $stars_count[$row['rating']-1]++;
    }
    $totalReviews = count($reviews);
    if($totalReviews == 0){
        $totalReviews = 1;
    }else{
        $totalReviews = count($reviews);
    }

    //Calculate stars rating
    $totalRating = 0;
    foreach($reviews as $review){
        $totalRating += $review['rating'];
    }
    if($totalReviews > 0){
        $averageRating = $totalRating/$totalReviews;
    }else{
        $averageRating = 0;
    }
    $averageRating = round($averageRating, 1);
    $averageRating = number_format($averageRating, 1);
    echo $averageRating;

    
    
   


    //Get book info

    $book_search = "SELECT * FROM books WHERE book_number = '$book_number'";
    $res = mysqli_query($con, $book_search);
    $book = mysqli_fetch_assoc($res);

    //Recent Products
    $books = [];
        $book_search = "SELECT * FROM books LIMIT 3";
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

    
   
     ?>
<section>
    <div class="container px-4 px-lg-5 my-5">
        
        <div class="row py-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0 " loading="lazy" id="display-img" src="<?php echo $book['cover_image']?>" width="250" height="500" alt="...">
                <div class="mt-2 row gx-2 gx-lg-3 row-cols-4 row-cols-md-3 row-cols-xl-4 justify-content-start">
                    <div class="col">
                        <a href="" class="view-image active"><img src="<?php echo $book['cover_image']?>" loading="lazy" class="img-thumbnail" alt=""></a>
                    </div>
        	</div>
            </div>
                <div class="col-md-6">
                 <p class="display-4"><?php echo $book['title'] ?></p>
                <div class="small mb-1">SKU: <?php echo $book['book_number'] ?></div>
                <p class="m-0"><small>Author: <?php echo $book['author'] ?></small></p>
                <div class="fs-5 mb-5">
                    <span id="price">Price: <?php echo $book['price'] * $_SESSION['rate'] .' '. $_SESSION['currency']  ?></span>
                    <br>
                </div>
                <form action="product-cart.php" method="POST">
                    <div class="d-flex">
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                        <input type="hidden" name="add_to_cart" value="<?php echo $book_number;?>">
                        <input type="hidden" name = "price" value= <?php echo $book['price']?> >

                    </div>
                </form>
                <p class="lead"></p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;"><?php echo $book['description'] ?></p><p></p>
                
            </div>
        </div>
    </div>
</section>
<!-- Review and Rating -->
<div class="container-fluid px-1 mx-auto">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-10 col-12 text-center mb-5">
            <div class="card">
                <div class="row justify-content-left d-flex">
                    <div class="col-md-4 d-flex flex-column">
                        <div class="rating-box">
                            <h1 class="pt-4"><?php echo $averageRating;?></h1>
                            <p class="">out of 5</p>
                        </div>
                        <div> 
                        <?php for($i = 0; $i < floor($averageRating); $i++){ ?>
                            <span class="fa fa-star star-active ml-3">
                            <?php }for($i = 0; $i < 5-floor($averageRating); $i++){ ?>
                                <span class="fa fa-star star-inactive ml-3">
                            <?php }?>
                         </div>
                    </div>
                    <div class="col-md-8">
                        <div class="rating-bar0 justify-content-center">
                            <table class="text-left mx-auto">
                                <tr>
                                    <td class="rating-label">Excellent</td>
                                    <td class="rating-bar">
                                        <div class="bar-container">
                                        <div class="progress"> 
                                            <div class="progress-bar bar-1" role="progressbar" style="width: <?php echo $stars_count[4]/$totalReviews * 100 . '%';?>"></div>
                                        </div>
                                        </div>
                                    </td>
                                    <td class="text-right"><?php echo $stars_count[4];?></td>
                                </tr>
                                <tr>
                                    <td class="rating-label">Good</td>
                                    <td class="rating-bar">
                                    <div class="progress"> 
                                            <div class="progress-bar bar-1" role="progressbar" style="width: <?php echo $stars_count[3]/$totalReviews * 100 . '%';?>"></div>
                                    </div>
                                    </td>
                                    <td class="text-right"><?php echo $stars_count[3];?></td>
                                </tr>
                                <tr>
                                    <td class="rating-label">Average</td>
                                    <td class="rating-bar">
                                        <div class="bar-container">
                                        <div class="progress"> 
                                            <div class="progress-bar bar-1" role="progressbar" style="width: <?php echo $stars_count[2]/$totalReviews * 100 . '%';?>"></div>
                                         </div>
                                        </div>
                                    </td>
                                    <td class="text-right"><?php echo $stars_count[2];?></td>
                                </tr>
                                <tr>
                                    <td class="rating-label">Poor</td>
                                    <td class="rating-bar">
                                        <div class="bar-container">
                                        <div class="progress"> 
                                            <div class="progress-bar bar-1" role="progressbar" style="width: <?php echo $stars_count[1]/$totalReviews * 100 . '%';?>"></div>
                                         </div>
                                        </div>
                                    </td>
                                    <td class="text-right"><?php echo $stars_count[1];?></td>
                                </tr>
                                <tr>
                                    <td class="rating-label">Terrible</td>
                                    <td class="rating-bar">
                                        <div class="bar-container">
                                        <div class="progress"> 
                                            <div class="progress-bar bar-1" role="progressbar" style="width: <?php echo $stars_count[0]/$totalReviews * 100 . '%';?>"></div>
                                        </div>
                                        </div>
                                    </td>
                                    <td class="text-right"><?php echo $stars_count[0];?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach($reviews as $review){?>
            <div class="card">
                <div class="row d-flex">
                    <div class="d-flex flex-column">
                        <h3 class="mt-2 mb-0"><?php echo $review['user_name']?></h3>
                        <div>
                            <p class="text-left">
                            <?php for($i = 0; $i < $review['rating']; $i++){ ?>
                            <span class="fa fa-star star-active ml-3">
                            <?php }for($i = 0; $i < 5-$review['rating']; $i++){ ?>
                                <span class="fa fa-star star-inactive ml-3">
                            <?php }?>
                            </p>
                        </div>
                    </div>
                    <div class="ml-auto">
                        <p class="text-muted pt-5 pt-sm-3"><?php echo $review['date']?></p>
                    </div>
                </div>
                <div class="row text-left">
                    <p class="content"><?php echo $review['review']?></p>
                </div>
               
            </div>
            <?php } ?>
            <div class="card">
                <div class="row d-flex">
                    <div class="d-flex flex-column">
                        <h3 class="mt-2 mb-0"><?php echo $_SESSION['name']?></h3>
                        
                    </div>
                    <div class="ml-auto">
                        <p class="text-muted pt-5 pt-sm-3"><?php  echo date('d M Y'); ?></p>
                    </div>
                </div>
                <div class="row text-left">
                    <form class="w-100" action="view-product.php" method="POST">
                        <div class="form-group">
                            <label for="formControlTextarea1">Review</label>
                            <textarea class="form-control" id="formControlTextarea1" rows="5" name="review"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="formControlSelect1">Rating</label>
                            <select class="form-control" id="formControlSelect1" name="rating">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <input type="hidden" name="book_number" value = "<?php echo $book['book_number']?>">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="add_review">Submit</button>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>


<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row justify-content-center">
            <?php
                for($i= 0; $i < count($books); $i++){ ?>
                <div class="col mb-5">
                    <div class="card h-100 product-item">
                        <!-- Product image-->
                        <img class="card-img-top w-100" src="<?php echo $books[$i]->coverImage ?>" alt="...">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $books[$i]->title ?></h5>
                                <!-- Product price-->
                                                                <span><b>Price: </b><?php echo $books[$i]->price * $_SESSION['rate'] .' '. $_SESSION['currency'] ?></span>
                                                            <p class="m-0"><small>By: <?php echo $books[$i]->author ?></small></p>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer  pt-0 border-top-0 bg-transparent">
                                <div class="text-center d-flex justify-content-center">
                                    <form action="product-cart.php?book_number=<?php echo $books[$i]->book_number ?>" method="POST">
                                        <a class="btn btn-flat btn-primary" href="view-product.php?book_number=<?php echo $books[$i]->book_number ?>">View</a>
                                        <button type="submit" class="btn btn-outline-primary mx-1" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 
                                        11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 
                                        2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 
                                        3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 
                                        2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 
                                        0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                        </svg></button>
                                     </form>
                                </div>

                            </div>
                        </div>
                    </div>   
                
                <?php   }?>
            
                
    </div>
</section>

<!-- Footer-->
<footer class="py-4 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright © Books 2022</p>
              <p class="m-0 text-center text-white">Developed By: <a href="#">krenarajdini</a></p>
          </div>
        </footer>
</body>
</html>