                           <!-- form date pickers -->
                                    <div class="well">
                                        <form class="form-horizontal">
                                            <fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="input-prepend input-group">
												<form method="post" action="sort_report.php">
                                                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                            <input type="text" style="width: 200px; height:39px;" name="sort" id="reservation" class="form-control" value="<?php echo date("M d Y"); ?>" />
															<button type="submit" name="ok" style="margin-left:10px; margin-bottom:-20px;" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
												</form>
															<button type="submit" name="print" style="margin-left:10px; margin-bottom:-20px;" class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                            <!-- /form datepicker -->