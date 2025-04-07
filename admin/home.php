<?php include('header.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="description" content="homepage">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/custom.css">
</head>
<body>
	<div class="clearfix"></div>
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
	<!-- /top tiles -->

	<?php include('slide.php'); ?>
	<?php include('footer.php'); ?>
</body>

</html>