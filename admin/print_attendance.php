<?php include ('include/dbcon.php');

?>
<html>

<head>
		<title>Library Management System</title>
		
		<style>
		
		
.container {
	width:100%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}
		
		</style>
		
</head>


<body>
	<div class = "container">
		<div id = "header">
		<br/>
				<img src = "images/logo.jpeg" style = " margin-top:-17px; float:left; margin-left:115px; margin-bottom:-6px; width:100px; height:100px;">
				<img src = "images/logo4.jpg" style = " margin-top:-17px; float:right; margin-right:115px; width:100px; height:100px;" >
				<center><h5 style = "font-style:Calibri"></h5>&nbsp; &nbsp;&nbsp; Republic of the Philippines &nbsp;	&nbsp; </center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> &nbsp; &nbsp; Library Management System</center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> Valladolid National High School</center>
				
			<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Attendance Sheet&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
		<br/>
		<br/>
		<br/>
						<table class="table table-striped">
						  <thead>
								<tr>
									<th style="width:100px;">Member Image</th>
									<th>School ID Number</th>
									<th>Member Name</th>
									<th>Date Log In</th>
								</tr>
						  </thead>   
						  <tbody>
<?php
include ('include/dbcon.php');
$result= mysqli_query($con,"select * from user_log 
LEFT JOIN user ON user_log.user_id = user.user_id 
order by user_log.user_log_id DESC ") or die (mysqli_error());
while ($row= mysqli_fetch_array ($result) ){
$id=$row['user_log_id'];
$user_id=$row['user_id'];
?>
							<tr>
								<td style="text-align:center;">
								<?php if($row['user_image'] != ""): ?>
								<img src="upload/<?php echo $row['user_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php else: ?>
								<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php endif; ?>
								</td> 
								<td style="text-align:center;"><?php echo $row['school_number']; ?></td>
								<td style="text-align:center;"><?php echo $row['user_name']; ?></td>
								<td style="text-align:center;"><?php echo date("M d, Y h:i:s a", strtotime($row['date_log'])); ?></td> 
							</tr>
				<?php } ?>					  
						  </tbody> 
					  </table> 

<br />
<br />
							<?php
								include('include/dbcon.php');
								include('session.php');
								$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysqli_error());
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>