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
    <title>BZ - Product Details</title>
    <link rel="icon" type="image/x-icon" href="uploads/a1.jpg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <style>
    .navbar .logo h1 {
  font-weight: 600;
  font-family: sans-serif;
  color: black;
  font-size: 40px;
  margin-left: 100px;
}

.navbar .logo b {
  color: #FF7F32;
}
    </style>
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
                        <li class="nav-item dropdown nav-user">
                            <!-- <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/default-image.jpg" alt="" class="user-avatar-md rounded-circle"></a> -->
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $printUsername;?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="account_users.php"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="login_users.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                <a class="dropdown-item" href="logout_users.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
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
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <!-- <div class="dashboard-wrapper"> -->
            <div class="container-fluid dashboard-content">    
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Product</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-5">

                    <?php
                    require_once('connection.php');
                    $product_id = $_GET['product_id'];
                    $select = "SELECT * FROM product where product_id = $product_id";
                    $query = mysqli_query($conn, $select);
                    $res = mysqli_fetch_assoc($query);
                    ?>
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0 m-b-30">
                                <div class="product-slider p-4">
                                    <div id="carouselExampleIndicators" class="product-carousel carousel slide" data-ride="carousel">
                                        <?php
                                        $file_array = explode(', ', $res['product_image']);
                                        ?>
                                        <div class="carousel-inner">
                                            <?php
                                            for ($i = 0; $i < count($file_array); $i++) {
                                            ?>
                                            <div class="carousel-item <?php if($i == 0) {echo 'active';} ?>">
                                                <img class="d-block w-100" src="images/<?php echo $file_array[$i];?>" alt="slide<?php echo $i;?>">
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30 d-flex">
                                <div class="product-details p-4">
                                    <div class="border-bottom pb-3 mb-3">
                                        <h2 class="mb-3"><?php echo $res['product_name'];?></h2>
                                        <h3 class="mb-0 text-primary">Rs. <?php echo $res['product_price'];?></h3>
                                    </div>
                                    <div class="product-description">
                                        <h4 class="mb-1">Descriptions</h4>
                                        <p><?php echo $res['product_description'];?></p>
                                        <button onclick="add_cart(<?php echo $res['product_id'];?>)" class="btn btn-primary btn-block btn-lg">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            <!-- </div> -->
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
        /* Product Details Container */
.product-details {
    background: #fff;
    border-radius: 50px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.product-details h2 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

.product-details h3 {
    font-size: 20px;
    color: #ff5722;
    font-weight: bold;
}

/* Product Description */
/* .product-description {
    margin-top: 15px;
} */

.product-description h4 {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.product-description p {
    font-size: 16px;
    color: #666;
    line-height: 1.5;
}

/* Add to Cart Button */
.btn-primary {
    background-color:rgb(29, 29, 168);
    border: none;
    padding: 12px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 20px;
    transition: background 0.3s ease-in-out;
}

.btn-primary:hover {
    background-color: #218838;
}

/* Product Image Slider */ 
.product-slider {
    background: #fff;
    border-radius: 50px;
    padding: 15px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

/* .product-slider img {
    width: 100%;
    border-radius: 10px;
    object-fit: cover;
} */

/* Carousel Controls */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    padding: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .product-details {
        text-align: center;
    }

    .product-description {
        margin-top: 20px;
    }
}

    </style>
</body>
 
</html>
