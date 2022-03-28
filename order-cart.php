<html lang="en" style="height: auto;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Book Shop</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
        
    </head>
     <body style="height: auto;">
     <?php 
     session_start();
     include_once("navbar.php"); ?>
        <section class="py-2 mt-5">
            <div class="container">
                <div class="card rounded-0">
                    <div class="card-body">
                        <div class="w-100 justify-content-between d-flex">
                            <h4><b>Orders</b></h4>
                            <a href="./edit.php" class="btn btn btn-dark btn-flat"><div class="fa fa-user-cog"></div> Manage Account</a>
                        </div>
                            <hr class="border-warning">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-stripped text-dark dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <colgroup>
                                    <col width="10%">
                                    <col width="15">
                                    <col width="25">
                                    <col width="25">
                                    <col width="15">
                                </colgroup>
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 116.2px;">#</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="DateTime: activate to sort column ascending" style="width: 176.15px;">DateTime</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Transaction ID: activate to sort column ascending" style="width: 616.425px;">Transaction ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 150.9px;">Amount</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Order Status: activate to sort column ascending" style="width: 152.325px;">Order Status</th></tr>
                                </thead>
                                <tbody>
                                                                    
                                                                    
                                                            <tr class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>2022-03-28 02:04</td>
                                            <td><a href="javascript:void(0)" class="view_order" data-id="8">c9f0f895fb98ab9159f51fd0297e236d</a></td>
                                            <td>2,500 </td>
                                            <td class="text-center">
                                                                                                    <span class="badge badge-light text-dark">Pending</span>
                                                                                            </td>
                                            </tr><tr class="even">
                                            <td class="sorting_1">2</td>
                                            <td>2022-03-28 01:23</td>
                                            <td><a href="javascript:void(0)" class="view_order" data-id="7">8f14e45fceea167a5a36dedd4bea2543</a></td>
                                            <td>0 </td>
                                            <td class="text-center">
                                                                                                    <span class="badge badge-light text-dark">Pending</span>
                                                                                            </td>
                                            </tr></tbody>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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