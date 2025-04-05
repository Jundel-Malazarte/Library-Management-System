<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Borrowed Books
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
	<div class="col-xs-3">
		<form method="POST" action="sort_borrowed_book.php">
		<input type="date" class="form-control" name="sort" value="<?php echo date('Y-m-d'); ?>">
		<button type="submit" class="btn btn-primary btn-outline" style="margin:-34px -195px 0px 0px; float:right;" name="ok"><i class="fa fa-calendar-o"></i> Sort By Date Borrowed</button>
		</form>
	</div>
					<?php 
					$count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book`")) or die(mysqli_error());
					$count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'borrowed'")) or die(mysqli_error());
					$count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'returned'")) or die(mysqli_error());
					?>
						<span style="float:left; margin-left:358px;">
						<!---	<a href="borrowed_book.php"><button class="btn btn-primary"><i class="fa fa-info"></i> All Records (<?php /// echo $count['total']; ?>)</button></a> -->
							<a href="borrowed.php"><button class="btn btn-success btn-outline"><i class="fa fa-info"></i> Borrowed Books (<?php echo $count1['total']; ?>)</button></a>
							<a href="returned.php"><button class="btn btn-danger btn-outline"><i class="fa fa-info"></i> Returned Books (<?php echo $count2['total']; ?>)</button></a>
						</span>
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
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Barcode</th>
									<th>Borrower Name</th>
									<th>Title</th>
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Date Returned</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
								$borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id 
									LEFT JOIN user ON borrow_book.user_id = user.user_id 
									WHERE borrowed_status = 'borrowed'
									ORDER BY borrow_book.borrow_book_id DESC") or die(mysqli_error());
								$borrow_count = mysqli_num_rows($borrow_query);
								while($borrow_row = mysqli_fetch_array($borrow_query)){
									$id = $borrow_row ['borrow_book_id'];
									$book_id = $borrow_row ['book_id'];
									$user_id = $borrow_row ['user_id'];
							?>
							<tr>
								<td><?php echo $borrow_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize"><?php echo $borrow_row['firstname']." ".$borrow_row['lastname']; ?></td>
								<td style="text-transform: capitalize"><?php echo $borrow_row['book_title']; ?></td>
								<td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
								<td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?></td>
								<td><?php echo ($borrow_row['date_returned'] == "0000-00-00 00:00:00") ? "Pending" : date("M d, Y h:m:s a",strtotime($borrow_row['date_returned'])); ?></td>
								<?php
									if ($borrow_row['borrowed_status'] != 'returned') {
										echo "<td class='alert alert-success'>".$borrow_row['borrowed_status']."</td>";
									} else {
										echo "<td  class='alert alert-danger'>".$borrow_row['borrowed_status']."</td>";
									}
								?>
							</tr>
							<?php } 
							if ($borrow_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No Books returned at this moment</td>
										</tr>
									</table>
								';
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