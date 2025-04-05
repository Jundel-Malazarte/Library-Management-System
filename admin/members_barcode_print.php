<?php

include ('include/dbcon.php');


?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Members</small> View Image
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-barcode"></i> Barcode Image</h2>
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
							<a href="print_barcode.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print</button>
							</a>
                    <div class="x_content">
                        <!-- content starts here -->
						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Barcode Image</th>
									<th>School ID</th>
									<th>Full Name</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from user order by user_id DESC") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['user_id'];
							?>
							<tr>
								<td><?php	echo "<img style='border:2px solid black; padding:15px;' src = 'BCG/html/image.php?filetype=PNG&dpi=72&scale=1&rotation=0&font_family=Arial.ttf&font_size=8&text=".$row['school_number']."&thickness=30&start=NULL&code=BCGcode128' />";?></td>
								<td><?php echo $row['school_number']; ?></td> 
								<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td>
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