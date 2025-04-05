<?php include ('header.php'); 

if (isset($_POST['sort'])){

$sort=$_POST['sort'];
}

?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Returned Books
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
	<div class="col-xs-3">
		<form method="POST">
		<input type="date" name="sort" class="form-control" value="<?php echo (isset($_POST['sort'])) ? $_POST['sort']: ''; ?>">
		<button type="submit" class="btn btn-primary btn-outline" style="margin:-34px -195px 0px 0px; float:right;" name="ok"><i class="fa fa-calendar-o"></i> Sort By Date Returned</button>
		</form>
	</div>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <!-- If needed 
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
						-->
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
		<!--- print -->
					<form method="POST" target="_blank" action="print_returned_sort.php">
							<input type="hidden" name="print_sort" value="<?php echo $sort; ?>">
						<button type="submit" name="print" class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print</button>
					</form>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<?php if (isset($_POST['ok'])) {
							$sort=$_POST['sort'];
							?>
 
							<?php
							$return_query= mysqli_query($con,"select * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN user ON return_book.user_id = user.user_id 
							where date_returned between '$sort 00:00:01' and '$sort 23:59:59'") or die (mysqli_error());
								$return_count = mysqli_num_rows($return_query);
								
							$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book where date_returned between '$sort 00:00:01' and '$sort 23:59:59' ")or die(mysqli_error());
							$count_penalty_row = mysqli_fetch_array($count_penalty);

							?>
						
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
							
							<thead>
								<tr>
									<th>Barcode</th>
									<th>Borrower Name</th>
									<th>Title</th>
									<th>Author</th>
									<th>ISBN</th>
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Date Returned</th>
									<th>Penalty</th>
								</tr>
							</thead>
							<div class="pull-left">
                                <div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Penalty:&nbsp;<?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                            </div>
								
							<tbody>
<?php 
while ($return_row= mysqli_fetch_array ($return_query) ){
$id=$return_row['return_book_id'];
?>
							<tr>
								<td><?php echo $return_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize"><?php echo $return_row['firstname']." ".$return_row['lastname']; ?></td>
								<td style="text-transform: capitalize"><?php echo $return_row['book_title']; ?></td>
								<td style="text-transform: capitalize"><?php echo $return_row['author']; ?></td>
								<td><?php echo $return_row['isbn']; ?></td>
								<td><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='alert alert-info' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='alert alert-danger' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }else {
									 echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='alert alert-warning' style='width:100px;'>Php ".$return_row['book_penalty'].".00</td>";
								 }else {
									 echo "<td>".$return_row['book_penalty']."</td>";
								 }
								
								?>
							</tr>
							<?php 
} 
							if ($return_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No Books returned at this date</td>
										</tr>
									</table>
								';
							} 
}							
							?>
							
                               
							</tbody>
							</table>
							
							
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>