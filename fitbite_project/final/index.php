<?php
if (isset($_GET['login_success']) && $_GET['login_success'] == 1) {
    echo "<script>alert('Logged in!')</script>";
    echo "<script>window.location.assign('index.php')</script>";
}
if (isset($_GET['logout_success']) && $_GET['logout_success'] == 1) {
    echo "<script>alert('Logged out!')</script>";
    echo "<script>window.location.assign('index.php')</script>";
}
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
} else {
    $printUsername = "None";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FitBite</title>
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
    <div class="background-container"></div>
    <div class="dashboard-main-wrapper">


        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">


            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <div class="logo">
                    <a href="index.php">
                        <h1>Fit<b>Bite</b></h1>
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars mx-3
"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="shop.php" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                                <?php
                                require_once('connection.php');
                                $select = "SELECT * FROM category";
                                $query = mysqli_query($conn, $select);
                                while ($res = mysqli_fetch_assoc($query)) {
                                ?>
                                    <a class="dropdown-item" href="shop.php?category=<?php echo $res['category_id']; ?>">
                                        <?php echo $res['category_name']; ?>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact-container">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-pill badge-secondary"><?php echo $printCount; ?></span></a>
                        </li>

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/default-image.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $printUsername; ?></h5>
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

        <!-- page of home     -->
        <section class="grid">
            <div class="content">
                <div class="content-left">
                    <div class="info">
                        <h2>Fresh, Healthy, and <br><br>Delicious Salads</h2>
                        <p>Get your salad fix without leaving home.<br>
                            Choose from a variety of fresh salads made just for you!</p>
                    </div>
                    <button>Explore Our Menu</button>
                </div>
                <div class="content-right">
                    <img src="images/round.jpg" alt="">
                </div>
            </div>
        </section>



        <div class="row m-5 our-features">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                <h1>Our Features</h1>
            </div>

            <!-- Fresh Ingredients -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card text-center p-3 custom-card">
                    <div class="card-body">
                        <h1 class="card-title"><i class="fas fa-leaf"></i></h1>
                        <h3 class="card-title">Fresh Ingredients</h3>
                        <p class="card-text">We use only the freshest organic ingredients, sourced daily to ensure top-quality salads for a healthy lifestyle.</p>
                    </div>
                </div>
            </div>

            <!-- Customizable Salads -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card text-center p-3 custom-card">
                    <div class="card-body">
                        <h1 class="card-title"><i class="fas fa-seedling"></i></h1>
                        <h3 class="card-title">Customizable Salads</h3>
                        <p class="card-text">Create your own salad with a wide variety of fresh vegetables, proteins, and dressings to suit your taste and diet.</p>
                    </div>
                </div>
            </div>
            <!-- Fast & Free Delivery -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card text-center p-3 custom-card">
                    <div class="card-body">
                        <h1 class="card-title"><i class="fas fa-truck"></i></h1>
                        <h3 class="card-title">Fast & Free Delivery</h3>
                        <p class="card-text">Enjoy fresh salads delivered to your doorstep within 30 minutes, absolutely free of charge.</p>
                    </div>
                </div>
            </div>
        </div>



        <!-- ---------------our catgory---------------- -->

        <div class="row mx-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                <h1>Our Categories</h1>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="owl-carousel owl-theme">
                    <?php
                    require_once('connection.php');
                    $select = "SELECT * FROM category";
                    $query = mysqli_query($conn, $select);
                    while ($res = mysqli_fetch_assoc($query)) {
                    ?>
                        <div class="item">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $res['category_name']; ?></h3>
                                    <a href="shop.php?category=<?php echo $res['category_id']; ?>"><img class="card-img" src="images/<?php echo $res['category_image']; ?>"></a>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- page of contact us -->
        <section>
            <?php
            $contact_info = [
                'email' => 'contact@FitBite.com',
                'phone' => '+123 456 789',
                'instagram' => 'https://www.instagram.com/FitBite',
                'instagram_handle' => '@FitBite',
                'address' => '123 Green City,Mota Varcha,Surat'
            ];

            $salad_dish = [
                'name' => 'Classic Caesar Salad',
                'description' => 'A healthy mix of fresh lettuce, cucumbers, tomatoes, avocado, and our secret Green Goddess dressing. Perfect for a light meal or snack.'
            ];
            ?>

            <section class="contact-container" id="contact-container">
                <div class="contact-header">
                    <h1>Contact Us</h1>
                    <p>Get in touch with us for any inquiries or to learn more about our delicious salads!</p>
                </div>

                <div class="contact-details">
                    <div class="contact-info">
                        <h2><i class="fas fa-phone-alt"></i> Contact Information</h2>
                        <ul>
                            <li><i class="fas fa-envelope"></i> Email: <a href="mailto:<?php echo $contact_info['email']; ?>"><?php echo $contact_info['email']; ?></a></li>
                            <li><i class="fas fa-phone"></i> Phone: <?php echo $contact_info['phone']; ?></li>
                            <li><i class="fab fa-instagram"></i> Instagram: <a href="<?php echo $contact_info['instagram']; ?>" target="_blank"><?php echo $contact_info['instagram_handle']; ?></a></li>
                            <li><i class="fas fa-map-marker-alt"></i> Address: <?php echo $contact_info['address']; ?></li>
                        </ul>
                    </div>

                    <div class="contact-info">
                        <h2><i class="fas fa-lemon"></i> Salad Dish Information</h2>
                        <p>Our signature dish is the "<?php echo $salad_dish['name']; ?>," <?php echo $salad_dish['description']; ?></p>
                    </div>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15068.916563628642!2d72.85
                                    23129!3d19.2288429!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5a3374a957943f4b!2sTryCatch%20
                                    Classes%20%7C%20UI%20UX%2C%20Web%20Design%2C%20IOS%2CAndroid%20Development%2C%20Data%20Science%20Pytho
                                    n%20Training%20Mumbai!5e0!3m2!1sen!2sin!4v1582367388365!5m2!1sen!2sin" width="700" height="450"
                            frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </section>


            <!-- <div class="row m-5 hero-image2 rounded">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-3 hero-text">
                        <h1 class="text-dark">About Us</h1>
                        <p class="text-dark px-5">We are bakers, we bake the piece of joy. We believe cake and baked goods are an expression of love.</p>
                        <p class="text-dark px-5">We bake from scratch daily using traditional methods and quality ingredients. There are some things in life you just can't fake, and dang good cake? That's one of them. We use organic whole milk, cage-free eggs, loads of real fruit, pure extracts, amazingly delicious chocolate, and lots and lots of real butter to create simply delicious treats the old-fashioned way.</p>
                        <a href="about.php" class="btn btn-rounded btn-success">Read More</a>
                    </div>
                </div>

                <div class="row mx-5 hero-image rounded">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-3 hero-text">
                        <h1 class="text-white">Always happy to hear from you.</h1>
                        <a href="contact.php" class="btn btn-rounded btn-brand">Contact Us</a>
                    </div>
                </div>

            </div> -->
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
    <script src="js/script.js"></script>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                dots: 0,
                autoplay: 4000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            })
        });
    </script>
    <style>
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        /* Style the Owl Carousel */
        .owl-carousel .item {
            padding: 15px;
        }

        .card {
            width: 100%;
            /* Ensures full width inside the grid column */
            min-height: 250px;
            /* Adjust height as needed */
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card:hover {
            transform: translateY(-5px);
            color: #2c3e50;
            ;
        }

        .card-body {
            flex-grow: 1;
            text-align: center;
            padding: 20px;
        }

        /* Style the category title */
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: rgb(106, 165, 131);
            margin-bottom: 15px;
        }

        /* Style the category images */
        .card-img {
            /* width: 100%; */
            height: auto;
            /* height: 200px; Adjust height as needed */
            object-fit: cover;
            /* Ensures images fit well */
            border-radius: 100px;
            transition: transform 0.3s ease-in-out;
        }


        .card-img:hover {
            transform: scale(1.05);
        }

        /* Adjust responsiveness */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .card-body {
                padding: 15px;
            }
        }

        /* ---------------our features---------------- */
        .content {
            display: grid;
            grid-template-columns: 50% auto;
            gap: 30px;
            margin-top: 100px;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        /* Features Section Styling */
        .navbar .logo h1 {
            font-weight: 600;
            font-family: sans-serif;
            color: black;
            font-size: 40px;
            margin-left: 100px;
        }

        .our-features h1 {
            font-size: 36px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .our-features .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .our-features .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
        }

        .our-features .card-title i {
            font-size: 50px;
            color: rgb(42, 56, 48);
        }

        .our-features .card-title {
            font-size: 22px;
            font-weight: bold;
            color: #34495e;
        }

        .our-features .card-text {
            font-size: 16px;
            color: #555;
        }

        .custom-card {
            background-color: rgb(235, 209, 235) !important;
            /* Custom Green */
            color: white !important;
            border-radius: 15px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .our-features .card {
                margin-bottom: 20px;
            }
        }

        .map-container {
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            /* height: 100vh; Adjust height as needed */
            margin-left: 250px;
            margin-top: -40px;
        }

        iframe {
            border-radius: 10px;
            /* Optional: Adds rounded corners */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            /* Optional: Adds shadow */
        }
    </style>

</body>

</html>