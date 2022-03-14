<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $name = $fetch_info['name'] ;
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    
</head>
<body>
    <?php
        include_once("navbar.php");
        
    ?>
    <?php

if (isset($_POST["submit"])) {



	$book_title = $_POST["book-title"];
	$book_search = "SELECT * FROM books WHERE title LIKE '%{$book_title}%'";

	$res = mysqli_query($con, $book_search);
    $fetch = mysqli_fetch_assoc($res);
	$book_author = $fetch['author'];

    echo($book_author);

	if($book_author)
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Title</th>
				<th>Description</th>
			</tr>
			<tr>
				<td><?php echo  ($book_author) ?></td>
				<td><?php echo ($book_author)?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Title Does not exist";
		}


}

?>
    <script src="js/animals.js"></script>

    <header class="bg-secondary py-1">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h5 class="display-4 fw-bolder">If you want to make intelligent, get books from here.</h5>
            <p class="lead fw-normal text-white-50 mb-0">Shop Now!</p>
        </div>
    </div>
</header>
<div class="row gx-4 gx-lg-6 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        <div class="col mb-6">
                <div class="card product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-70 book-cover" src="http://localhost/book_shop/uploads/product_4/english_dummies.jpg" alt="...">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="">
                            <!-- Product name-->
                            <h5 class="fw-bolder">English Grammar for Dummies</h5>
                            <!-- Product price-->
                                                            <span><b>Price: </b>2,000</span>
                                                    </div>
                        <p class="m-0"><small>By: Geraldine Woods</small></p>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat btn-primary " href=".?p=view_product&amp;id=a87ff679a2f3e71d9181a67b7542122c">View</a>
                        </div>
                        
                    </div>
                </div>
            </div>
                        <div class="col mb-6">
                <div class="card product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-70 book-cover" src="http://localhost/book_shop/uploads/product_3/english grammar in use.jpg" alt="...">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="">
                            <!-- Product name-->
                            <h5 class="fw-bolder">English Grammar in Use</h5>
                            <!-- Product price-->
                                                            <span><b>Price: </b>2,500</span>
                                                    </div>
                        <p class="m-0"><small>By: Raymond Murphy, Surai Pongtongcharoen</small></p>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat btn-primary " href=".?p=view_product&amp;id=eccbc87e4b5ce2fe28308fd9f2a7baf3">View</a>
                        </div>
                        
                    </div>
                </div>
            </div>
                        <div class="col mb-6">
                <div class="card product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-70 book-cover" src="http://localhost/book_shop/uploads/product_2/modern PHP.jpg" alt="...">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Modern PHP: New Features and Good Practices</h5>
                            <!-- Product price-->
                                                            <span><b>Price: </b>3,500</span>
                                                    </div>
                        <p class="m-0"><small>By: Josh Lockhart</small></p>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat btn-primary " href=".?p=view_product&amp;id=c81e728d9d4c2f636f067f89cc14862c">View</a>
                        </div>
                        
                    </div>
                </div>
            </div>
                        <div class="col mb-6">
                <div class="card product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-70 book-cover" src="http://localhost/book_shop/uploads/product_1/the Joy of PHP.jpg" alt="...">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="">
                            <!-- Product name-->
                            <h5 class="fw-bolder">The Joy of PHP: A Beginner's Guide to Programming</h5>
                            <!-- Product price-->
                                                            <span><b>Price: </b>2,500</span>
                                                    </div>
                        <p class="m-0"><small>By: Alan Forbes</small></p>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat btn-primary " href=".?p=view_product&amp;id=c4ca4238a0b923820dcc509a6f75849b">View</a>
                        </div>
                        
                    </div>
                </div>
            </div>
                    </div>

                    <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright © Books 2021</p>
              <p class="m-0 text-center text-white">Developed By: <a href="krenarajdini912@gmail.com">krenarajdini</a></p>
          </div>
        </footer>
</body>
</html>