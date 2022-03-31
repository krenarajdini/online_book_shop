<html lang="en" style="height: auto;"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Online Book Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
  
</head>
<body style="height: auto;">
<?php 
     session_start();
     include_once("navbar.php");
     include_once("connection.php");

    $book_number = intval($_GET['book_number']);
    echo $book_number;
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
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0 " loading="lazy" id="display-img" src="<?php echo $book['cover_image']?>" alt="...">
                <div class="mt-2 row gx-2 gx-lg-3 row-cols-4 row-cols-md-3 row-cols-xl-4 justify-content-start">
                    <div class="col">
                        <a href="javascript:void(0)" class="view-image active"><img src="<?php echo $book['cover_image']?>" loading="lazy" class="img-thumbnail" alt=""></a>
                    </div>
        	</div>
            </div>
            <div class="col-md-6">
                 <p class="display-4"><?php echo $book['title'] ?></p>
                <div class="small mb-1">SKU: <?php echo $book['book_number'] ?></div>
                <p class="m-0"><small>Author: <?php echo $book['author'] ?></small></p>
                <div class="fs-5 mb-5">
                    <span id="price">Price: <?php echo $book['price'] ?></span>
                    <br>
                </div>
                <form action="" id="add-cart">
                <div class="d-flex">
                    <input type="hidden" name="price" value="1999.99">
                    <input type="hidden" name="inventory_id" value="4">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" name="quantity">
                    <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
                </form>
                <p class="lead"></p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;"><?php echo $book['description'] ?></p><p></p>
                
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">
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
                                                                <span><b>Price: </b><?php echo $books[$i]->price ?></span>
                                                            <p class="m-0"><small>By: <?php echo $books[$i]->author ?></small></p>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-flat btn-primary " href="view-product.php?book_number=<?php echo $books[$i]->book_number ?>">View</a>
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