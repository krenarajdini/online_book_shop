<html lang="en" style="height: auto;"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Online Book Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    <style>
    #main-header{
        position:relative;
        background: rgb(0,0,0)!important;
        background: radial-gradient(circle, rgba(0,0,0,0.48503151260504207) 22%, rgba(0,0,0,0.39539565826330536) 49%, rgba(0,212,255,0) 100%)!important;
    }
    #main-header:before{
        content:"";
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background-image:url(http://localhost/book_shop/uploads/1640818320_front-view-desk-with-stacked-books-copy-space.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        filter: drop-shadow(0px 7px 6px black);
        z-index:-1;
    }

 </style>
  </head>
  <body style="height: auto;">
  <?php 
     session_start();
     include_once("navbar.php"); 
     include_once("connection.php");
     

     //Delete cart
     if(isset($_POST['empty_cart'])){
       $_SESSION['mycart'] = array();
     }

     //Delete product from cart
    if(isset($_POST['delete_product'])){
        $product_id = $_POST['delete_product'];
        unset($_SESSION['mycart'][$product_id]);
        header('Location: product-cart.php');
    }

    //Add amount
    if(isset($_POST['add_amount'])){
        $product_id = $_POST['add_amount'];
        $_SESSION['mycart'][$product_id]['amount']++;
        
    }
    //Subtract amount
    if(isset($_POST['sub_amount'])){
        $product_id = $_POST['sub_amount'];
        $_SESSION['mycart'][$product_id]['amount']--;
        if($_SESSION['mycart'][$product_id]['amount'] == 0){
            unset($_SESSION['mycart'][$product_id]);
            header('Location: product-cart.php');

        }
    }

     //Add to cart
     if(isset($_POST['add_to_cart'])){
         $book_number = $_POST['add_to_cart'];
         if(isset($_SESSION['mycart'][$book_number])){
            $amount = $_SESSION['mycart'] [$book_number]['amount'];
            $_SESSION['mycart'][$book_number]['amount'] = $amount + 1;
         }
         else{
            $_SESSION['mycart'][$book_number]['amount'] = 1;
         }
        //  header('Location: home.php');
        header('Location: ' . $_SERVER['HTTP_REFERER']);

     }
     $books = [];
     $total_price = 0;      
     foreach ( $_SESSION['mycart'] as $key => $value) {
        $search_book = "SELECT * FROM books WHERE book_number = '$key'";
        $result = mysqli_query($con, $search_book);
        $row = mysqli_fetch_assoc($result);
        $books[$key] = $row;
        $total_price += $row['price'] * $value['amount'];
     }    
                    

     ?>
<section class="py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-end mb-2">
                <form action="product-cart.php" method="POST">
                    <input class="btn btn-outline-dark btn-flat btn-sm" type="submit" value="Empty Cart" name="empty_cart"/>
                </form>
            </div>
        </div>
        <div class="card rounded-0">
            <div class="card-body">
                <h3><b>Cart List</b></h3>
                <hr class="border-dark">
                   <?php foreach ( $_SESSION['mycart'] as $key => $value) {?>
                      <div class="d-flex w-100 justify-content-between  mb-2 py-2 border-bottom cart-item">
                        <div class="d-flex align-items-center col-8">
                            
                            <form action="product-cart.php" method= "POST" > 
                                <button type="submit" class="btn btn-sm mr-2 btn-outline-danger rem_item" ><i class="fa fa-trash"></i></button>
                                <input type="hidden" name="delete_product" value="<?php echo $key; ?>"/>
                            </form>
                            <img src="<?php echo $books[$key]['cover_image']?>" loading="lazy" class="cart-prod-img mr-2 mr-sm-2" width="150" height="150" alt="">
                            <div>
                                <p class="mb-1 mb-sm-1"><?php echo $books[$key]['title']?></p>
                                
                                <p class="mb-1 mb-sm-1"><small><b>Price:</b> <span class="price"><?php echo $books[$key]['price'] * $_SESSION['rate'] .' '. $_SESSION['currency']?></span></small></p>
                                <div>
                                <div class="input-group" style="width:130px !important">
                                    <form action="product-cart.php" method="post">
                                        <div class="input-group-prepend">
                                        
                                                <button class="btn  btn-outline-secondary min-qty" type="submit"><i class="fa fa-minus"></i></button>
                                                <input type="hidden" name="sub_amount" value="<?php echo $key; ?>"/>
                                        
                                        </div>
                                    </form>
                                    <input type="number" class="form-control form-control-sm qty text-center cart-qty" placeholder="" aria-label="Example text with button addon" value="<?php echo $value['amount']?>" aria-describedby="button-addon1" data-id="9" readonly="">
                                    <form action="product-cart.php" method="post">
                                        <div class="input-group-prepend">
                                        
                                                <button class="btn  btn-outline-secondary min-qty" type="submit" ><i class="fa fa-plus"></i></button>
                                                <input type="hidden" name="add_amount" value="<?php echo $key; ?>"/>
                                        
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col text-right align-items-center d-flex justify-content-end">
                            <h4><b class="total-amount"><?php echo $books[$key]['price'] * $value['amount'] * $_SESSION['rate'] .' '. $_SESSION['currency']?></b></h4>
                        </div>
                    </div>
                     <?php } ?>
                                <div class="d-flex w-100 justify-content-between mb-2 py-2 border-bottom">
                    <div class="col-8 d-flex justify-content-end"><h4>Grand Total:</h4></div>
                    <div class="col d-flex justify-content-end"><h4 id="grand-total"><?php echo $total_price * $_SESSION['rate'] .' '. $_SESSION['currency']?></h4></div>
                </div>
            </div>
        </div>
        <div class="d-flex w-100 justify-content-end">
            <form action="orders.php" method="POST">
                <input type="submit" class="btn btn-sm btn-flat btn-dark" value="Checkout">
                <input type="hidden" name="checkout">      
            </form>
        </div>
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