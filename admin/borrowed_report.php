<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Reports
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-file"></i> Report Lists</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="add_book.php" style="background:none;">
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
						<span style="float:left;">
					<?php 
					$count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report`")) or die(mysqli_error());
					$count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Borrowed Book'")) or die(mysqli_error());
					$count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Returned Book'")) or die(mysqli_error());
					?>
							<a href="report.php"><button class="btn btn-primary btn-outline"><i class="fa fa-info"></i> All Reports (<?php echo $count['total']; ?>)</button></a>
							<a href="borrowed_report.php"><button class="btn btn-success"><i class="fa fa-info"></i> Borrowed Reports (<?php echo $count1['total']; ?>)</button></a>
							<a href="returned_report.php"><button class="btn btn-danger btn-outline"><i class="fa fa-info"></i> Returned Reports (<?php echo $count2['total']; ?>)</button></a>
						</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Members Name</th>
									<th>Book Title</th>
									<th>Task</th>
									<th>Person In Charge</th>
									<th>Date Transaction</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from report 
							LEFT JOIN book ON report.book_id = book.book_id 
							LEFT JOIN user ON report.user_id = user.user_id 
							where detail_action = 'Borrowed Book'
							order by report.report_id DESC ") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['report_id'];
							$book_id=$row['book_id'];
							$user_name=$row['firstname']." ".$row['middlename']." ".$row['lastname'];
							
							?>
							<tr>
								<td><?php echo $user_name; ?></td>
								<td><?php echo $row['book_title']; ?></td>
								<td><?php echo $row['detail_action']; ?></td>
								<td><?php echo $row['admin_name']; ?></td> 
								<td><?php echo date("M d, Y h:m:s a",strtotime($row['date_transaction'])); ?></td>
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>