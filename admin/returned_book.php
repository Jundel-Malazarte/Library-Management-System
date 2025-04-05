<?php include ('header.php'); ?>

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
<!--	<div class="col-xs-3">
		<form method="POST" action="sort_returned_book.php">
		<input type="date" class="form-control" name="sort" value="<?php //echo date('Y-m-d'); ?>">
		<button type="submit" class="btn btn-primary btn-outline" style="margin:-34px -195px 0px 0px; float:right;" name="ok"><i class="fa fa-calendar-o"></i> Sort By Date Returned</button>
		</form>
	</div>
-->
                        <h2><i class="fa fa-book"></i> Returned Books Monitoring</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="print_returned_book.php" target="_blank" style="background:none;">
							<button class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
							</a>
							</li>
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
		<!--- sort -->
						<form method="POST" action="returned_book_search.php" class="form-inline">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
								
								<button type="submit" name="search" class="btn btn-primary btn-outline"><i class="fa fa-calendar-o"></i> Search By Date Returned</button>
								
						</form>
                    </div>
                       <!--         <div class="pull-right">
                                    <div class="span">
											<form method="POST" target="_blank" action="print_returned_book.php">
												<button name="print" class="btn btn-danger">
													<i class="fa fa-print"></i>
													Print
												</button>
											</form>
									</div>
                                </div>
							-->
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">							
							<?php
							$return_query= mysqli_query($con,"select * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN user ON return_book.user_id = user.user_id 
							where return_book.return_book_id order by return_book.return_book_id DESC") or die (mysqli_error());
								$return_count = mysqli_num_rows($return_query);
								
							$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ")or die(mysqli_error());
							$count_penalty_row = mysqli_fetch_array($count_penalty);
							
							?>
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
                                <div class="pull-left">
                                    <div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Penalty:&nbsp;<?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                                </div>
								
							<thead>
								<tr>
									<th>Barcode</th>
									<th>Borrower Name</th>
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
								<td><?php echo $return_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize"><?php echo $return_row['firstname']." ".$return_row['lastname']; ?></td>
								<td style="text-transform: capitalize"><?php echo $return_row['book_title']; ?></td>
							<!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
								<td><?php // echo $return_row['isbn']; ?></td>	-->
								<td><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
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