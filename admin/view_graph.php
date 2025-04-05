	<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Reports /</small> Graph
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bar-chart"></i> Graph Report</h2>
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
						
					<!---	<form method="POST" action="report_search.php" class="form-inline">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php // echo date('Y-m-d'); ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php // echo date('Y-m-d'); ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-2">
											<select class="form-control" name="status" style="color:black;">
												<option>---All---</option>
												<option>Borrowed Book</option>
												<option>Returned Book</option>
											</select>
                                        </div>
                                    </div>
                                </div>
								
								<button type="submit" name="search" class="btn btn-primary btn-outline"><i class="fa fa-calendar-o"></i> Search By Date Transaction</button>
								
						</form>
						-->
						
						<span style="float:left;">
					<?php 
				//	$count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report`")) or die(mysqli_error());
				//	$count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Borrowed Book'")) or die(mysqli_error());
				//	$count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Returned Book'")) or die(mysqli_error());
					?>
				<!---			<a href="report.php"><button class="btn btn-primary"><i class="fa fa-info"></i> All Reports <?php // echo $count['total']; ?></button></a>
							<a href="borrowed_report.php"><button class="btn btn-success btn-outline"><i class="fa fa-info"></i> Borrowed Reports (<?php //echo $count1['total']; ?>)</button></a>
							<a href="returned_report.php"><button class="btn btn-danger btn-outline"><i class="fa fa-info"></i> Returned Reports (<?php //echo $count2['total']; ?>)</button></a>
				-->
				</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th style="width:160px;">No.</th>
									<th style="width:160px;">Member Name</th>
									<th style="width:160px;">Count Log In</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select *,(SELECT COUNT(*) FROM user_log WHERE user_id = tbl_user.user_id) AS levelCount from user_log 
							LEFT JOIN user AS tbl_user ON user_log.user_id = tbl_user.user_id 
							group by user_log.user_name ORDER BY user_log.user_log_id ASC ") or die (mysqli_error());
							
							$q = mysqli_query($con,"select COUNT(distinct firstname) as total from user");
							$row1 = mysqli_fetch_array($q);
							$num = 1;

							while ($row= mysqli_fetch_array ($result) ){
							$num<=$row1['total'];
							$id=$row['user_log_id'];
							$user_id=$row['user_id'];
							
							?>
							<tr>
								<td><?php echo $num; $num++; ?></td>
								<td><?php echo $row['user_name']; ?></td>
								<td><?php echo $row['levelCount']; ?></td> 
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