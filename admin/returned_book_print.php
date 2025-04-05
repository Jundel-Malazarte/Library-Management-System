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
@media print{
#print {
display:none;
}
}

#print {
	width: 90px;
    height: 30px;
    font-size: 18px;
    background: white;
    border-radius: 4px;
	margin-left:28px;
	cursor:hand;
}
		
		</style>
<script>
function printPage() {
    window.print();
}
</script>
		
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
				
<button type="submit" id="print" onclick="printPage()">Print</button>
			<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Returned Books Monitoring&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
    <?php include('session.php'); ?>
		<br/>
<?php 
include ('include/dbcon.php');
							$return_query= mysqli_query($con,"select * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN user ON return_book.user_id = user.user_id 
							where return_book.date_returned BETWEEN '".$_SESSION['datefrom']." 00:00:01' and '".$_SESSION['dateto']." 23:59:59' 
							order by return_book.return_book_id DESC") or die (mysqli_error());
							$return_count = mysqli_num_rows($return_query);
								
							$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book 
							where return_book.date_returned BETWEEN '".$_SESSION['datefrom']." 00:00:01' and '".$_SESSION['dateto']." 23:59:59'  ")or die(mysqli_error());
							$count_penalty_row = mysqli_fetch_array($count_penalty);
							
?>
						<table class="table table-striped">
                                <div class="pull-left">
                                    <div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Date: From&nbsp;<?php echo date("M d, Y",strtotime($_SESSION['datefrom'])); ?> To&nbsp;<?php echo date("M d, Y",strtotime($_SESSION['dateto'])); ?></div></div>
                                </div>
								<br />
                                <div class="pull-left">
                                    <div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Penalty:&nbsp;<?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                                </div>
								<br />
						  <thead>
								<tr>
									<th>Barcode</th>
									<th>Borrower Name</th>
									<th>Level</th>
									<th>Section</th>
									<th>Title</th>
								<!---	<th>Author</th>
									<th>ISBN</th>	-->
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Date Returned</th>
									<th>Penalty</th>
								</tr>
						  </thead>   
						  <tbody>
<?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['return_book_id'];
?>
							<tr>
								<td style="text-align:center;"><?php echo $return_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['firstname']." ".$return_row['middlename']." ".$return_row['lastname']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['level']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['section']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['book_title']; ?></td>
							<!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
								<td><?php // echo $return_row['isbn']; ?></td>	-->
								<td style="text-align:center;"><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px; text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td style='text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px; text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }else {
									 echo "<td style='text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='alert alert-warning' style='width:100px; text-align:center;'>Php ".$return_row['book_penalty'].".00</td>";
								 }else {
									 echo "<td style='text-align:center;'>".$return_row['book_penalty']."</td>";
								 }
								
								?>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							
							<?php 
							}
							if ($return_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No Books returned at this Date</td>
										</tr>
									</table>
								';
							} 							
							?>
							</tr>  
						  </tbody> 
					  </table> 

<br />
<br />
							<?php
								include('include/dbcon.php');
								$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysqli_error());
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>