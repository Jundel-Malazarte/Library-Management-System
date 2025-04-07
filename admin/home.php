<?php include('header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="description" content="homepage">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- bootstrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- font awesome icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- fontawesome css -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./css/custom.css">
	<!-- icon -->
	<link rel="icon" type="icon" href="./icon/Icon.png">
	<style>
        .dashboard {
            padding: 2rem;
            background: #f8f9fa;
            min-height: 100vh;
        }

        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-card .icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #4a90e2;
        }

        .stat-card .count {
            font-size: 2.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .stat-card .label {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .stat-card.admin-card { border-left: 4px solid #4a90e2; }
        .stat-card.member-card { border-left: 4px solid #2ecc71; }
        .stat-card.book-card { border-left: 4px solid #f1c40f; }
        .stat-card.borrowed-card { border-left: 4px solid #e67e22; }
        .stat-card.returned-card { border-left: 4px solid #9b59b6; }

        .dashboard-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #eee;
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <div class="dashboard">
        <h1 class="dashboard-title">Library Dashboard Overview</h1>
        
        <div class="stats-cards">
            <!-- Admin Card -->
            <div class="stat-card admin-card">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <?php
                $result = mysqli_query($con, "SELECT * FROM admin");
                $num_rows = mysqli_num_rows($result);
                ?>
                <div class="count"><?php echo $num_rows; ?></div>
                <div class="label">Total Administrators</div>
            </div>

            <!-- Members Card -->
            <div class="stat-card member-card">
                <div class="icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <?php
                $result = mysqli_query($con, "SELECT * FROM user");
                $num_rows = mysqli_num_rows($result);
                ?>
                <div class="count"><?php echo $num_rows; ?></div>
                <div class="label">Students & Teachers</div>
            </div>

            <!-- Books Card -->
            <div class="stat-card book-card">
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
                <?php
                $result = mysqli_query($con, "SELECT * FROM book");
                $num_rows = mysqli_num_rows($result);
                ?>
                <div class="count"><?php echo $num_rows; ?></div>
                <div class="label">Total Books</div>
            </div>

            <!-- Borrowed Books Card -->
            <div class="stat-card borrowed-card">
                <div class="icon">
                    <i class="fa fa-bookmark"></i>
                </div>
                <?php
                $result = mysqli_query($con, "SELECT * FROM borrow_book");
                $num_rows = mysqli_num_rows($result);
                ?>
                <div class="count"><?php echo $num_rows; ?></div>
                <div class="label">Books Borrowed</div>
            </div>

            <!-- Returned Books Card -->
            <div class="stat-card returned-card">
                <div class="icon">
                    <i class="fa fa-check-circle"></i>
                </div>
                <?php
                $result = mysqli_query($con, "SELECT * FROM return_book");
                $num_rows = mysqli_num_rows($result);
                ?>
                <div class="count"><?php echo $num_rows; ?></div>
                <div class="label">Books Returned</div>
            </div>
        </div>
		<?php include('slide.php'); ?>
    </div>
    <?php include('footer.php'); ?>
</div>
</body>
</html>