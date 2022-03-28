<html lang="en" style="height: auto;"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Online Book Shop</title>
    <link rel="icon" href="http://localhost/book_shop/uploads/1640818140_depositphotos_273963164-stock-illustration-bookstore-logo-template-design-logo.jpg">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://localhost/book_shop/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="http://localhost/book_shop/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- DataTables -->
  <link rel="stylesheet" href="http://localhost/book_shop/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="http://localhost/book_shop/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="http://localhost/book_shop/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- Select2 -->
  <link rel="stylesheet" href="http://localhost/book_shop/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="http://localhost/book_shop/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="http://localhost/book_shop/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="http://localhost/book_shop/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost/book_shop/dist/css/adminlte.css">
    <link rel="stylesheet" href="http://localhost/book_shop/dist/css/custom.css">
    <link rel="stylesheet" href="http://localhost/book_shop/assets/css/styles.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="http://localhost/book_shop/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="http://localhost/book_shop/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="http://localhost/book_shop/plugins/summernote/summernote-bs4.min.css">
     <!-- SweetAlert2 -->
  <link rel="stylesheet" href="http://localhost/book_shop/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <style type="text/css">/* Chart.js */
      @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
   
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
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0 " loading="lazy" id="display-img" src="http://localhost/book_shop/uploads/product_4/english_dummies.jpg" alt="...">
                <div class="mt-2 row gx-2 gx-lg-3 row-cols-4 row-cols-md-3 row-cols-xl-4 justify-content-start">
                    <div class="col">
                        <a href="javascript:void(0)" class="view-image active"><img src="http://localhost/book_shop/uploads/product_4/english_dummies.jpg" loading="lazy" class="img-thumbnail" alt=""></a>
                    </div>
        	</div>
            </div>
            <div class="col-md-6">
                <!-- <div class="small mb-1">SKU: BST-498</div> -->
                <h1 class="display-5 fw-bolder border-bottom border-primary pb-1">English Grammar for Dummies</h1>
                <p class="m-0"><small>By: Geraldine Woods</small></p>
                <div class="fs-5 mb-5">
                ₱ <span id="price">2,000</span>
                <br>
                <span><small><b>Available Stock:</b> <span id="avail">50</span></small></span>
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
                <p class="lead"></p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;">Ut et urna sapien. Nulla lacinia sagittis felis id cursus. Etiam eget lacus quis enim aliquet dignissim. Nulla vel elit ultrices, venenatis quam sed, rutrum magna. Pellentesque ultricies non lorem hendrerit vestibulum. Maecenas lacinia pharetra nisi, at pharetra nunc placerat nec. Maecenas luctus dolor in leo malesuada, vel aliquet metus sollicitudin. Curabitur sed pellentesque sem, in tincidunt mi. Aliquam sodales aliquam felis, eget tristique felis dictum at. Proin leo nisi, malesuada vel ex eu, dictum pellentesque mauris. Quisque sit amet varius augue.</p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;">Sed quis imperdiet est. Donec lobortis tortor id neque tempus, vel faucibus lorem mollis. Fusce ut sollicitudin risus. Aliquam iaculis tristique nunc vel feugiat. Sed quis nulla non dui ornare porttitor eu vitae nisi. Curabitur at quam ut libero convallis mattis vel eget mauris. Vivamus vitae lectus ligula. Nulla facilisi. Vivamus tristique maximus nulla, vel mollis felis blandit posuere. Curabitur mi risus, rutrum non magna at, molestie gravida magna. Aenean neque sapien, volutpat a ullamcorper nec, iaculis quis est.</p><p></p>
                
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                <div class="card h-100 product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-100" src="http://localhost/book_shop/uploads/product_3/english grammar in use.jpg" alt="...">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="">
                            <!-- Product name-->
                            <h5 class="fw-bolder">English Grammar in Use</h5>
                            <!-- Product price-->
                                                            <span><b>Price: </b>2,500</span>
                                                        <p class="m-0"><small>By: Raymond Murphy, Surai Pongtongcharoen</small></p>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat btn-primary " href=".?p=view_product&amp;id=eccbc87e4b5ce2fe28308fd9f2a7baf3">View</a>
                        </div>
                        
                    </div>
                </div>
            </div>
                        <div class="col mb-5">
                <div class="card h-100 product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-100" src="http://localhost/book_shop/uploads/product_2/modern PHP.jpg" alt="...">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Modern PHP: New Features and Good Practices</h5>
                            <!-- Product price-->
                                                            <span><b>Price: </b>3,500</span>
                                                        <p class="m-0"><small>By: Josh Lockhart</small></p>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat btn-primary " href=".?p=view_product&amp;id=c81e728d9d4c2f636f067f89cc14862c">View</a>
                        </div>
                        
                    </div>
                </div>
            </div>
                        <div class="col mb-5">
                <div class="card h-100 product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-100" src="http://localhost/book_shop/uploads/product_1/modern PHP.jpg" alt="...">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="">
                            <!-- Product name-->
                            <h5 class="fw-bolder">The Joy of PHP: A Beginner's Guide to Programming</h5>
                            <!-- Product price-->
                                                            <span><b>Price: </b>2,500</span>
                                                        <p class="m-0"><small>By: Alan Forbes</small></p>
                        </div>
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
    </div>
</section>

<!-- Footer-->
<footer class="py-4 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright © Books 2021</p>
              <p class="m-0 text-center text-white">Developed By: <a href="#">krenarajdini</a></p>
          </div>
        </footer>
</body>
</html>