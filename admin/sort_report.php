<?php include ('header.php'); 

if (isset($_POST['sort'])){

$sort=$_POST['sort'];
}

?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Attendace
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
		<div class="alert alert-info" role="alert">
		<!--- sort -->
			<div class="row">
					<form method="POST" action="sort_report.php">
						<div class="col-xs-3">
							<input type="date" name="sort" style="color:black;" class="form-control" value="<?php echo date('Y-m-d'); ?>" >
						</div>
							<button type="submit" name="ok" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
					</form>
			</div>
		<!--- print -->
					<form method="POST" target="_blank" action="print_attendance_sort.php">
							<input type="hidden" name="print_sort" value="<?php echo $sort; ?>">
						<button type="submit" name="print" style="margin-top:-39px;" class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print</button>
					</form>
		</div>
							
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

<?php if (isset($_POST['ok'])) {
$sort=$_POST['sort'];
 ?>							
							<?php
							$result= mysqli_query($con,"select * from user_log 
							LEFT JOIN user ON user_log.user_id = user.user_id 
							where date_log between '$sort 00:00:01' and '$sort 23:59:59' 
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
<?php }	} ?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>