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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Baker's Zone</title>
    <link rel="icon" type="image/x-icon" href="uploads/a1.jpg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/userpage.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fstyle.css">
</head>
<body>
<div class="background-container"></div>
    <div class="dashboard-main-wrapper">
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <div class="logo"><h1>Fit<b>Bite</b></h1></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars mx-3
"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-pill badge-secondary"><?php echo $printCount;?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact-container">Contact</a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="uploads/default-image.jpg" alt="" class="user-avatar-md rounded-circle"></a>
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

        <!-- page of home     -->
        <section class="grid">
            <div class="content">
                <div class="content-left">
                    <div class="info">
                        <h2>Fresh, Healthy, and <br>Delicious Salads</h2>
                        <p>Get your salad fix without leaving home.<br>
                             Choose from a variety of fresh salads made just for you!</p>
                    </div>
                    <button><a href="#service">Explore Our Menu</a></button>
                </div> 
                <div class="content-right">
                    <img src="images/round.jpg" alt="">
                </div>            
            </div>
        </section>


        <!-- page of Services -->
       

        <?php
$categories = [
    "vegetables" => ["btnveg.png", "Vegetables"],
    "fruits" => ["btnfru1.png", "Exotic Fruits"],
    "dryfruits" => ["btndry.png", "Dry Fruits"],
    "soupbowl" => ["btnsbowl.png", "Soup Bowl"],
    "saladbowl" => ["btnbowl.png", "Salad Bowl"]
];

$products = [
    ["category" => "vegetables", "image" => "images/v15.webp", "name" => "Carrot"],
    ["category" => "vegetables", "image" => "images/v7.jpg", "name" => "Broccoli"],
    ["category" => "fruits", "image" => "images/v24.jpg", "name" => "Apple"],
    ["category" => "fruits", "image" => "images/v23.png", "name" => "Banana"],
    ["category" => "dryfruits", "image" => "images/d1.jpg", "name" => "Almonds"],
    ["category" => "dryfruits", "image" => "images/d6.jpg", "name" => "Cashews"],
    ["category" => "soupbowl", "image" => "images/Chunky Chipotle.png", "name" => "Chunky Chipotle"],
    ["category" => "soupbowl", "image" => "images/Five Spice Soup.png", "name" => "Five Spice Soup"],
    ["category" => "saladbowl", "image" => "images/crispy noodle salad recipe.jpg", "name" => "Crispy Noodle Salad"],
    ["category" => "saladbowl", "image" => "images/classic caesar salad.jpg", "name" => "Classic Caesar Salad"]
];
?>

<section id="service" class="Services">
    <div class="sectionHeader">
        <h1>Featured Categories</h1>
    </div>

    <!-- Categories Section -->
    <div class="categories">
        <?php foreach ($categories as $key => $category) { ?>
            <div class="category-card" onclick="filterProducts('<?= $key ?>')">
                <img src="<?= $category[0] ?>" alt="<?= $category[1] ?>">
                <p><strong><?= $category[1] ?></strong></p>
            </div>
        <?php } ?>
    </div>

    <!-- Products Section -->
    <div class="products">
        <?php foreach ($products as $product) { ?>
            <div class="product <?= $product['category'] ?>">
                <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" width="200">
                <p><?= $product['name'] ?></p>
                <div class="buttons">
                    <button onclick="updateCounter(this, -1)">-</button>
                    <span class="counter">0</span>
                    <button onclick="updateCounter(this, 1)">+</button>
                </div>
            </div>
        <?php } ?>
    </div>
</section>


<!-- page of contactus -->
<?php
$contact_info = [
    'email' => 'contact@saladshop.com',
    'phone' => '+123 456 789',
    'instagram' => 'https://www.instagram.com/saladshop',
    'instagram_handle' => '@saladshop',
    'address' => '123 Green St, Salad City'
];

$salad_dish = [
    'name' => 'Green Goddess Salad',
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
    </div>
</section>

    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/main-js.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>
    
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true, margin: 10, dots: 0, autoplay: 4000, autoplayHoverPause: true, responsive:{
                    0:{items:1}, 600:{items:2}, 1000:{items:4}
                }
            })
        });
    </script>
</body>
 
</html>