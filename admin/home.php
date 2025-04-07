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
</head>
<body>
<div class="content-wrapper">
	<div class="clearfix">
	<!-- top tiles -->
	<div class="row tile_count" style="margin-right:-245px;">
		<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
			<div class="left"></div>
			<div class="right">
				<?php
				$result = mysqli_query($con, "SELECT * FROM admin");
				$num_rows = mysqli_num_rows($result);
				?>
				<a href="admin.php">
					<span class="count_top"><i class="fa fa-users"></i> Admin</span>
				</a>
				<div class="count green"><?php echo $num_rows; ?></div>
				<span class="count_bottom"> Total of Admin</span>

			</div>
		</div>
		<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
			<div class="left"></div>
			<div class="right">
				<?php
				$result = mysqli_query($con, "SELECT * FROM user");
				$num_rows = mysqli_num_rows($result);
				?>
				<a href="user.php">
					<span class="count_top"><i class="fa fa-male"></i> <i class="fa fa-female"></i> Student & Teacher</span>
				</a>
				<div class="count green"><?php echo $num_rows; ?></div>
				<span class="count_bottom">Total of Members</span>
			</div>
		</div>
		<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
			<div class="left"></div>
			<div class="right">
				<?php
				$result = mysqli_query($con, "SELECT * FROM book");
				$num_rows = mysqli_num_rows($result);
				?>
				<a href="book.php">
					<span class="count_top"><i class="fa fa-book"></i> Books</span>
				</a>
				<div class="count green"><?php echo $num_rows; ?></div>
				<span class="count_bottom ">Total of Books</span>
			</div>
		</div>
		<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
			<div class="left"></div>
			<div class="right">
				<?php
				$result = mysqli_query($con, "SELECT * FROM borrow_book");
				$num_rows = mysqli_num_rows($result);
				?>
				<a href="borrowed.php">
					<span class="count_top"><i class="fa fa-book"></i> Book Borrowed</span>
				</a>
				<div class="count green"><?php echo $num_rows; ?></div>
				<span class="count_bottom ">Total of Book Borrowed</span>
			</div>
		</div>
		<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
			<div class="left"></div>
			<div class="right">
				<?php
				$result = mysqli_query($con, "SELECT * FROM return_book");
				$num_rows = mysqli_num_rows($result);
				?>
				<a href="returned_book.php">
					<span class="count_top"><i class="fa fa-book"></i> Book Returned</span>
				</a>
				<div class="count green"><?php echo $num_rows; ?></div>
				<span class="count_bottom ">Total of Book Returned</span>
			</div>
		</div>
	</div>
</div>
	<!-- /top tiles -->

	<?php include('slide.php'); ?>
	<?php include('footer.php'); ?>
</body>

</html>