<?php 
 // Include database connection
 include('include/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System - Sign in</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome CSS -->
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <!-- bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- icon -->
    <link rel="icon" type="icon" href="icon/Icon.png">
    <script src="js/jquery.min.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #eceff1 100%);
            font-family: 'Poppins', sans-serif;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-box {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-box h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-control {
            background: #f7f9fc;
            border: 1px solid #e3e8ef;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
            background: #fff;
        }

        .btn-primary {
            background: #4a90e2;
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background: #357abd;
            transform: translateY(-1px);
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1);
        }

        .separator {
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .alert {
            border-radius: 8px;
            margin-top: 20px;
        }

        .blink_text {
            color: #dc3545;
            font-size: 14px;
            font-weight: 500;
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            50% { opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <form action="" method="post">
                <h1>Library Management System</h1>
                <div>
                    <input type="text" class="form-control" name="username" placeholder="Enter your username" autofocus required />
                </div>
                <div>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password" required />
                </div>
                <div>
                    <button class="btn btn-primary" type="submit" name="login">
                        <i class="fa fa-sign-in"></i> Sign In
                    </button>
                </div>
                
                <div class="separator">
                    <div>
                        <h2><i class="fa fa-university"></i> College of Nursing</h2>
                        <p>© <?php echo date('Y'); ?> Library Management System</p>
                    </div>
                </div>
                <?php
                // Database connection
                if (isset($_POST['login'])) {
                    // Sanitize user inputs
                    $username = mysqli_real_escape_string($con, $_POST['username']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);

                    // Check if connection is successful
                    if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    try {
                        // Prepare and execute query
                        $login_query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
                        
                        if (!$login_query) {
                            throw new Exception(mysqli_error($con));
                        }

                        $count = mysqli_num_rows($login_query);
                        $row = mysqli_fetch_array($login_query);

                        if ($count > 0) {
                            // Start session and store admin ID
                            session_start();
                            $_SESSION['id'] = $row['admin_id'];
                            
                            // Redirect to home page
                            echo "<script>window.location='home.php';</script>";
                            exit();
                        } else {
                            echo '<div class="alert alert-danger">
                                    <h3 class="blink_text">Invalid username or password</h3>
                                  </div>';
                        }
                    } catch (Exception $e) {
                        echo '<div class="alert alert-danger">
                                <h3 class="blink_text">Error: ' . $e->getMessage() . '</h3>
                              </div>';
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>