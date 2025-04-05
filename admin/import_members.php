<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Members /</small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-upload"></i> Import From Excel Files</h2>
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
                        <a  href="./import_member_fmt.csv" download="">Click here to download the CSV Format</a>
                        <!-- content starts here -->
				<form class="form-horizontal well" action="import_members_query.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<div class="control-group">
							
								<label>CSV/Excel File:</label>
							
							<div class="controls">
								<input type="file" multiple name="filename" id="filename" class="input-large">
							</div>
						</div>
						<br/>	
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="submit" class="btn btn-success button-loading" data-loading-text="Loading..."><i class="fa fa-upload"></i> Upload</button>
							<a href="user.php"><button type="button" class="btn btn-danger button-loading"><i class="fa fa-reply"></i> Back</button></a>
							</div>
						</div>
					</fieldset>
				</form>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>