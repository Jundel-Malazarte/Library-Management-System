<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Members
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
							<a href="member_print.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Members List</button>
							</a>
							<a href="print_barcode.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Members Barcode</button>
							</a>
							<br />
							<br />
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Members Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="add_user.php" style="background:none;">
							<button class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Add Member</button>
							</a>
							</li>
                            <li>
							<a href="import_members.php" style="background:none;">
							<button class="btn btn-success btn-outline"><i class="fa fa-upload"></i> Import Members</button>
							</a>
							</li>
                        <!---    <li>
							<a href="update_members_status.php" style="background:none;">
							<button class="btn btn-danger btn-outline"><i class="fa fa-cog fa-spin"></i> Activate All Members</button>
							</a>
							</li>	-->
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
							<!---		<th>Image</th>	-->
									<th>School ID</th>
									<th>Member Full Name</th>
									<th>Type</th>
									<th>Level</th>
									<th>Section</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from user order by user_id DESC") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['user_id'];
							?>
							<tr>
						<!---		<td>
								<?php // if( $row['user_image'] != ""): ?>
								<img src="upload/<?php // echo $row['user_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php // else: ?>
								<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php // endif; ?>
								</td>  either this <td><a target="_blank" href="view_members_barcode.php?code=<?php // echo $row['school_number']; ?>"><?php // echo $row['school_number']; ?></a></td> -->
								<td><a target="_blank" href="print_barcode_individual.php?code=<?php echo $row['school_number']; ?>"><?php echo $row['school_number']; ?></a></td> 
								<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td> 
								<td><?php echo $row['type']; ?></td> 
								<td><?php echo $row['level']; ?></td> 
								<td><?php echo $row['section']; ?></td> 
								<td><?php echo $row['status']; ?></td> 
								<td>
									<a class="btn btn-primary" for="ViewAdmin" href="view_user.php<?php echo '?user_id='.$id; ?>">
										<i class="fa fa-search"></i>
									</a>
									<a class="btn btn-warning" for="ViewAdmin" href="edit_user.php<?php echo '?user_id='.$id; ?>">
									<i class="fa fa-edit"></i>
									</a>
									<a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
										<i class="glyphicon glyphicon-trash icon-white"></i>
									</a>
			
									<!-- delete modal user -->
									<div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> User</h4>
										</div>
										<div class="modal-body">
												<div class="alert alert-danger">
													Are you sure you want to delete?
												</div>
												<div class="modal-footer">
												<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
												<a href="delete_user.php<?php echo '?user_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
												</div>
										</div>
										</div>
									</div>
									</div>
								</td> 
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