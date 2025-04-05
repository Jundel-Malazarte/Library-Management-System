	<?php include ('include/dbcon.php');
	
	mysqli_query($con,"UPDATE user SET status = 'Active' ")or die(mysqli_error());
	
	echo "<script> window.location='user.php' </script>";
	
	?>			