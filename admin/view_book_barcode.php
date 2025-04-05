<?php

include ('include/dbcon.php');

$code = $_GET['code'];
							$result1= mysqli_query($con,"select * from book where book_barcode = '$code' ") or die (mysqli_error());
							$row1=(mysqli_fetch_array($result1));
							$code1=$row1['book_barcode'];
							$code2=$row1['book_title'];

?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Books /</small> View Image
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
							<a href="print_barcode_individual1.php?code=<?php echo $code1; ?>" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Book Barcode</button>
							</a>
                    <div class="x_content">
                        <!-- content starts here -->

	<center>	
	<div style="width: 400px; margin-bottom:60px; background-color: #fff;margin-top: 50px;border-radius: 8px;box-shadow: 1px 1px 1px 1px maroon;" > <!-- /content -->
		<h4 style="line-height:40px;">Barcode Image</h4>
		<div>
			<div class="clearfix"></div>
			<hr style="margin-top: 10px; color: black; border:1px solid;width: 90%;"/>
			<?php	echo "<img style='border:2px solid black; padding:15px;' src = 'BCG/html/image.php?filetype=PNG&dpi=72&scale=1&rotation=0&font_family=Arial.ttf&font_size=8&text=".$code."&thickness=30&start=NULL&code=BCGcode128' />";?>
			<h3><?php echo $code2; ?></h3>
			<hr style=" color: black; border:1px solid;width: 90%;"/>
			<div class="clearfix"></div>
				<a class="btn btn-primary" href="book.php"><i class="icon-ok"></i> Ok</a>
			
		</div>
	</div>
</center>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>