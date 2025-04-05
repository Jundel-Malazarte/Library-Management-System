<a class="btn btn-primary pull-right" for="DeleteAdmin" href="#aa" data-toggle="modal" data-target="#aa">
		<i class="glyphicon glyphicon-plus icon-white"></i> Add
</a>								
	<div class="modal fade" id="aa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-plus"></i> Add</h4>
		</div>
		<div class="modal-body">
                            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-6" for="first-name">Day/Days <span class="required">*</span>
                                    </label>
                                    <div class="col-md-2">
                                        <input type="number" name="no_of_days" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								<div class="modal-footer">
								<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
								<button type="submit" style="margin-bottom:5px;" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</button>
								</div>
                            </form>
							
							<?php
								if (isset($_POST['submit'])) {
									
									$no_of_days = $_POST['no_of_days'];
									
									{
										mysqli_query($con,"INSERT INTO allowed_days (no_of_days) VALUES ('$no_of_days')") or die (mysqli_error());
									}
									{
										echo "<script>alert('Successfully Added!'); window.location='settings.php'</script>";
									}
								}
							?>
		</div>
		</div>
	</div>
	</div>