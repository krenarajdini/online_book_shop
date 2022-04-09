<html lang="en" style="height: auto;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Book Shop</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/extra.css">

        
    </head>
     <body style="height: auto;">
     <?php 
        session_start();
        include_once("navbar.php");
        include_once("connection.php");

        //Checkout
        if(isset($_POST['checkout'])){
            $total = 0;
            foreach($_SESSION['mycart'] as $book){
                $total += $book['price'] * $book['amount'];
            }
            $date = date("Y-m-d");
            $time = date("H:i:s");
            $shipment_address = $_SESSION['shipment_address'];
            //generate random order id with letter and numbers
            $transaction_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);

            //Insert into database
            $sql = "INSERT INTO orders(transaction_id, u_id, shipment_address, total, date, time, order_status) 
            VALUES('$transaction_id', '$_SESSION[user_id]', '$shipment_address', '$total', '$date', '$time', 'Pending')";

            $result = mysqli_query($con, $sql);
            $order_id = mysqli_insert_id($con);
            foreach($_SESSION['mycart'] as $book){
                $sql = "INSERT INTO buys (order_id, product_id, amount) VALUES ('".$order_id."', '".$book['book_number']."', '".$book['amount']."')";
                $result = mysqli_query($con, $sql);
            }
            $_SESSION['mycart'] = array();  
        }
        //Show orders
        $orders_page = 5;
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $start = ($page - 1) * $orders_page;
        //count the number of orders
        $sql = "SELECT * FROM orders WHERE u_id = '$_SESSION[user_id]'";
        $result = mysqli_query($con, $sql);
        $total_orders = mysqli_num_rows($result);
        $total_pages = ceil($total_orders / $orders_page);

        $sql = "SELECT * FROM orders WHERE u_id = '$_SESSION[user_id]' ORDER BY order_id ASC LIMIT $start, $orders_page";
        $result = mysqli_query($con, $sql);
        $orders = array();
        while($row = mysqli_fetch_assoc($result)){
            $orders[] = $row;
        }


     
     
     
     ?>
        <section class="py-5 mt-5">
            <div class="container">
                <div class="card rounded-0">
                    <div class="card-body">
                        <div class="w-100 justify-content-between d-flex">
                            <h4><b>Orders</b></h4>
                            <a href="./edit.php" class="btn btn btn-dark btn-flat"><div class="fa fa-user-cog"></div> Manage Account</a>
                        </div>
                            <hr class="border-warning">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length">
                                 </div></div>
                                    <div class="col-sm-12 col-md-6">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-stripped text-dark dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <colgroup>
                                    <col width="10%">
                                    <col width="15">
                                    <col width="25">
                                    <col width="25">
                                    <col width="15">
                                </colgroup>
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 116.2px;">#</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="DateTime: activate to sort column ascending" style="width: 176.15px;">DateTime</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Transaction ID: activate to sort column ascending" style="width: 616.425px;">Transaction ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 150.9px;">Total</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Order Status: activate to sort column ascending" style="width: 152.325px;">Order Status</th></tr>
                                </thead>
                                <tbody>
                                                                    
                                                                    
                                    <tr class="odd">
                                        <?php foreach($orders as $order){ ?>
                                            <td class="sorting_1"><?php echo  $order['order_id']?></td>
                                            <td><?php echo $order['date'].' '.$order['time']?></td>
                                            <td><a href="javascript:void(0)" class="view_order" data-id="8"><?php echo $order['transaction_id'] ?></a></td>
                                            <td><?php echo $order['total'] * $_SESSION['rate'] .' '. $_SESSION['currency']?> </td>
                                            <td class="text-center">
                                                                                                    <span class="badge badge-light text-dark">Pending</span>
                                                                                            </td>
                                            </tr><tr class="even">
                                                <?php } ?>
                                            </tbody>
                                            </table>
                                        <div class="row d-flex justify-content-center">
                                         <div  >
                                            <?php if($total_orders > 0){?>

                                                <div aria-label="Page navigation example bg-light ">
                                                    <ul class="pagination bg-light d-flex justify-content-center">
                                                        <li class="page-item">
                                                            <a class="page-link" href="orders.php?page=<?php echo $page > 1? $page-1 : $page?>">Previous</a>
                                                        </li>
                                                        <?php for($i =0; $i < $total_pages; $i++){ ?>
                                                        <li class="page-item <?php echo $page==$i +1 ? "active":""; ?>"><a class="page-link" 
                                                            href="orders.php?page=<?php echo $i+1; ?>">
                                                            <?php echo $i+1; ?>
                                                        </a></li>
                                                        
                                                        <?php } ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="orders.php?page=<?php echo $page < $total_pages? $page+1 : $page?>">Next</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php }?>
                                        
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
              <p class="m-0 text-center text-white">Copyright © Books 2022</p>
              <p class="m-0 text-center text-white">Developed By: <a href="#">krenarajdini</a></p>
          </div>
        </footer>
    </body>
</html>