<?php
if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 1) {
    echo "<script>
    alert('Orders edited!');
    window.location.assign('view_orders.php');
    </script>";
}
if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 2) {
    echo "<script>
    alert('Orders detail edited!');
    window.location.assign('view_orders.php');
    </script>";
}
session_start();
if (isset($_SESSION['user_admin_id']) && $_SESSION['user_admin_id'] != null) {
    $admin_username = $_SESSION['user_admin_username'];
?>
    <!doctype html>
    <html lang="en">


    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>BZ - View Orders</title>
        <link rel="icon" type="image/x-icon" href="a1.jpg">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
    </head>

    <body>
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->
            <div class="dashboard-header">
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
                    <a class="navbar-brand" href="index.php">Fitbite...</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span><i class="fas fa-bars mx-3
"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-right-top">
                            <li class="nav-item dropdown nav-user">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../uploads/default-image.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="nav-user-info">
                                        <h5 class="mb-0 text-white nav-user-name"><?php echo $admin_username; ?></h5>
                                        <span class="status"></span><span class="ml-2">Available</span>
                                    </div>
                                    <a class="dropdown-item" href="account_admin.php"><i class="fas fa-user mr-2"></i>Account</a>
                                    <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- left sidebar -->
            <!-- ============================================================== -->
            <div class="nav-left-sidebar sidebar-dark">
                <div class="menu-list">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-divider">
                                    Menu
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="dashboard.php"><i class="fa fa-fw fa-rocket"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view_users.php"><i class="fa fa-fw fa-user-circle"></i>Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Category</a>
                                    <div id="submenu-3" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="view_category.php">View category</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="add_category.php">Add category</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-product-hunt
"></i>Products</a>
                                    <div id="submenu-4" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="view_product.php">View products</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="add_product.php">Add products</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="view_orders.php"><i class="fas fa-shopping-cart
"></i>Orders</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Orders</h2>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">View orders</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Orders Table</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Orders id</th>
                                                    <th>Users id</th>
                                                    <th>product_name</th>
                                                    <th>product_price</th>
                                                    <th>quantity</th>
                                                    <th>Delivery date</th>
                                                    <th>Payment method</th>
                                                    <th>Total amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once('connection.php');
                                                $select = "SELECT o.id, u.users_id, o.product_name, o.product_price, o.quantity, o.total_price, o.delivery_date, o.payment_method FROM orders1 o JOIN users_login u ON o.users_id = u.users_id";
                                                $query = mysqli_query($conn, $select);
                                                $i = 1;
                                                while ($res = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $res['id']; ?></td>
                                                        <td><?php echo $res['users_id']; ?></td>
                                                        <td><?php echo $res['product_name']; ?></td>
                                                        <td><?php echo $res['product_price']; ?></td>
                                                        <td><?php echo $res['quantity']; ?></td>
                                                        <td><?php echo $res['delivery_date']; ?></td>
                                                        <td><?php echo $res['payment_method']; ?></td>
                                                        <td><?php echo $res['total_price']; ?></td>
                                                        <td>
                                                            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-space btn-primary" onclick="edit_orders(<?php echo $res['id']; ?>)">Edit</button>
                                                            <button onclick="delete_orders(<?php echo $res['id']; ?>)" class="btn btn-space btn-secondary">DELETE</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Orders id</th>
                                                    <th>Users id</th>
                                                    <th>product_name</th>
                                                    <th>product_price</th>
                                                    <th>quantity</th>
                                                    <th>Delivery date</th>
                                                    <th>Payment method</th>
                                                    <th>Total amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <div class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <h2>Copyright © 2024 Concept | All rights reserved | Dashboard by <a href="#">PDK</a></h2>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="text-md-right footer-links d-none d-sm-block">
                                        <a href="javascript: void(0);">About</a>
                                        <a href="javascript: void(0);">Support</a>
                                        <a href="javascript: void(0);">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end main wrapper -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end main wrapper -->
            <!-- ============================================================== -->
            <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit orders</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="edit_orders.php" id="form" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="card">
                                    <h5 class="card-header">Edit orders</h5>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputUsersId">Users id</label>
                                            <input id="inputUsersId" type="number" min="1" name="users_id" required="" placeholder="Enter users id" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDeliveryDate">Delivery date</label>
                                            <input id="inputDeliveryDate" type="date" name="delivery_date" required="" placeholder="Enter delivery date" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPaymentMethod">Payment method</label>
                                            <select id="inputPaymentMethod" name="payment_method" class="form-control">
                                                <option>Cash</option>
                                                <option>Card</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputTotalAmount">Total amount</label>
                                            <input id="inputTotalAmount" type="number" min="1" name="total_price" required="" placeholder="Enter total amount" autocomplete="off" class="form-control">
                                        </div>
                                        <input type="hidden" name="hidden_orders">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-space btn-secondary">Clear</button>
                                <button type="submit" class="btn btn-space btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Optional JavaScript -->
            <script src="../js/jquery-3.3.1.min.js"></script>
            <script src="../js/bootstrap.bundle.js"></script>
            <script src="../js/jquery.slimscroll.js"></script>
            <script src="../js/main-js.js"></script>
            <script src="../js/jquery.dataTables.min.js"></script>
            <script src="../js/dataTables.bootstrap4.min.js"></script>
            <script src="../js/data-table.js"></script>
            <script>
                function edit_orders(id) {
                    $.ajax({
                        url: 'get_orders.php',
                        data: 'id=' + id,
                        method: 'get',
                        dataType: 'json',
                        success: function(res) {
                            console.log(res);
                            $('input[name="users_id"]').val(res.users_id);
                            $('input[name="delivery_date"]').val(res.delivery_date);
                            $('select[name="payment_method"]').val(res.payment_method);
                            $('input[name="total_price"]').val(res.total_price);
                            $('input[name="hidden_orders"]').val(res.id);
                        }
                    })
                }

                function delete_orders(id) {
                    var flag = confirm("Do you want to delete?");
                    if (flag) {
                        window.location.href = "delete_orders.php?id=" + id;
                    }
                }
            </script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>