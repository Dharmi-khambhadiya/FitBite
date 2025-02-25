<?php
if (isset($_GET['login_error']) && $_GET['login_error'] == 1) {
    echo "<script>alert('Username or Password does not exist!')</script>";
    echo "<script>window.location.assign('index.php')</script>";
}
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BZ - Login</title>
    <!-- <link rel="icon" type="image/x-icon" href="a1.jpg"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    
    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            height: 100%;
            background-color: #f4f7fa;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .splash-container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card-header h2 {
            font-size: 28px;
            color: #4e73df;
            font-weight: bold;
        }

        .splash-description {
            font-size: 14px;
            color: #888;
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .form-group input:focus {
            border-color: #4e73df;
            outline: none;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background-color: #4e73df;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            color: #fff;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .card-footer a {
            text-decoration: none;
            font-size: 14px;
            color: #4e73df;
        }

        .card-footer a:hover {
            color: #2e59d9;
        }

        .footer-link {
            font-size: 14px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .splash-container {
                padding: 20px;
            }

            .card-header h2 {
                font-size: 24px;
            }

            .form-group input {
                font-size: 14px;
            }

            .btn-primary {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="index.php"><h2 class="text-primary">Fitbite...</h2></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form id="form" data-parsley-validate="" method="post" action="login_check.php">
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="admin_username" data-parsley-trigger="change" required="" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="pass1" type="password" required="" placeholder="Password" name="admin_password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="admin_signup.php" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/parsley.js"></script>
    <script>
    $('#form').parsley();
    </script>
</body>
 
</html>