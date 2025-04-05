<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Attendance
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Members Attendance</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="user_log_print.php" target="_blank" style="background:none;">
							<button class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
							</a>
							</li>
                  <!--           <li>
							<a href="add_book.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Book</button>
							</a>
							</li>
				  -->
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
						<form method="POST" action="user_log_search.php" class="form-inline">
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
								
								<button type="submit" name="search" class="btn btn-primary btn-outline"><i class="fa fa-calendar-o"></i> Search By Date Log In</button>
								
						</form>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th style="width:160px;">Member Image</th>
									<th style="width:160px;">School ID Number</th>
									<th style="width:160px;">Member Name</th>
									<th style="width:160px;">Date Log In</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
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
								<td><?php echo $row['school_number']; ?></td>
								<td><?php echo $row['user_name']; ?></td>
								<td><?php echo date("M d, Y h:i:s a", strtotime($row['date_log'])); ?></td> 
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