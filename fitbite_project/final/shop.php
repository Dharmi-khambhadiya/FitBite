<?php
session_start();
if (!empty($_SESSION['cart'])) {
	$printCount = count($_SESSION['cart']);
}
else {
	$printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
}
else {
    $printUsername = "None"; 
}
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BZ - Shop</title>
    <link rel="icon" type="image/x-icon" href="uploads/a1.jpg">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
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
            <div class="logo">
                   <a href="index.php"><h1>Fit<b>Bite</b></h1></a> 
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars mx-3
"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                            <?php
                            require_once('connection.php');
                            $select = "SELECT * FROM category";
                            $query = mysqli_query($conn, $select);
                            while ($res = mysqli_fetch_assoc($query)) {
                            ?>
                                <a class="dropdown-item" href="shop.php?category=<?php echo $res['category_id'];?>">
                                    <?php echo $res['category_name'];?>
                                </a>
                            <?php
                            }
                            ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-pill badge-secondary"><?php echo $printCount;?></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <!-- <div class="dashboard-wrapper"> -->
            <div class="container-fluid dashboard-content">    
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Products</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Our products</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-5">

                    <?php
                    require_once('connection.php');
                    $select = "SELECT * FROM product where product_category = ".$_GET['category'];
                    $query = mysqli_query($conn, $select);
                    while ($res = mysqli_fetch_assoc($query)) {
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="product-thumbnail rounded">
                            <div class="product-img-head">
                                <div class="product-img">
                                    <?php
                                    $file_array = explode(', ', $res['product_image']);
                                    ?>
                                    <img src="images/<?php echo $file_array[0];?>" class="img-fluid">
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title"><?php echo $res['product_name'];?></h3>
                                    <div class="product-price">Rs. <?php echo $res['product_price'];?></div>
                                </div>
                                <div class="product_btn">
                                    <button onclick="add_cart(<?php echo $res['product_id'];?>)" class="btn btn-primary">Add to Cart</button>
                                    <!-- <a href="#" onclick="add_cart(<?php echo $res['product_id'];?>)" class="btn btn-primary">Add to Cart</a> -->
                                    <a href="single_product.php?product_id=<?php echo $res['product_id'];?>" class="btn btn-outline-light">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <h2>Copyright © 2024 Concept | All rights reserved | Dashboard by <a href="#">VDS</a></h2>

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
            </div> -->
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        <!-- </div> -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/main-js.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true, margin: 10, dots: 0, autoplay: 4000, autoplayHoverPause: true, responsive:{
                    0:{items:1}, 600:{items:2}, 1000:{items:4}
                }
            })
        });
        function add_cart(product_id) {
                $.ajax({
                    url:'fetch_cart.php',
                    data:'id='+product_id,
                    method:'get',
                    dataType:'json',
                    success:function(cart){
                        console.log(cart);
                        $('.badge').html(cart.length);
                    }
                });
            }
    </script>
    <style>
        /* Product Card Styling */
.product-thumbnail {
    background: #fff;
    border-radius: 100px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    padding: 15px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.product-thumbnail:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
}

/* Image Styling */
.product-img-head {
    width: 100%;
    overflow: hidden;
    border-radius: 10px;
}

.product-img img {
    width: 100%;
    height: 200px; /* Adjust the height as needed */
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s ease-in-out;
}

.product-img img:hover {
    transform: scale(1.05);
}

/* Product Content */
.product-content {
    padding: 15px 0;
    flex-grow: 1;
}

.product-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.product-price {
    font-size: 16px;
    font-weight: bold;
    color: #ff5722;
}

/* Buttons */
.product_btn {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-top: 15px;
}

.btn-primary {
    background-color:rgb(49, 106, 164);
    border: none;
    padding: 10px 15px;
    font-size: 14px;
    font-weight: bold;
    border-radius: 10px;
    transition: background 0.3s ease-in-out;
}

.btn-primary:hover {
    background-color:rgb(95, 26, 208);
}

.btn-outline-light {
    border: 2px solidrgb(30, 94, 212);
    color:rgb(57, 156, 214);
    padding: 8px 15px;
    font-size: 14px;
    font-weight: bold;
    border-radius: 10px;
    transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
}

.btn-outline-light:hover {
    background-color:rgb(100, 142, 193);
    color: #fff;
}

    </style>
</body>
 
</html>