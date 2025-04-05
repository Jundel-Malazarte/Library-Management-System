<?php include ('include/dbcon.php');
$ID=$_GET['user_id'];
 ?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Users /</small> Edit User
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit User</h2>
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
                        <!-- content starts here -->
<?php
  $query=mysqli_query($con,"select * from user where user_id='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        <!---        <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">User Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
										<a href=""><?php // if($row['user_image'] != ""): ?>
										<img src="upload/<?php // echo $row['user_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php // else: ?>
										<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php // endif; ?>
										</a>
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>	-->
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">ID Number
                                    </label>
                                    <div class="col-md-2">
                                        <input type="number" value="<?php echo $row['school_number']; ?>" name="school_number" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name
									</label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="MI / Middle Name....." id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Contact
                                    </label>
                                    <div class="col-md-3">
                                        <input type='tel' value="<?php echo $row['contact']; ?>" autocomplete="off"  maxlength="11" name="contact" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Gender
                                    </label>
									<div class="col-md-4">
                                        <select name="gender" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>								
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Address
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['address']; ?>" name="address" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-4" for="last-name">Type
									</label>
									<div class="col-md-4">
                                        <select name="type" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                                            <option value="Student">Student</option>
                                            <option value="Teacher">Teacher</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-4" for="last-name">Level
									</label>
									<div class="col-md-4">
                                        <select name="level" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['level']; ?>"><?php echo $row['level']; ?></option>
                                            <option value="Grade 7">Grade 7</option>
                                            <option value="Grade 8">Grade 8</option>
                                            <option value="Grade 9">Grade 9</option>
                                            <option value="Grade 10">Grade 10</option>
                                            <option value="Faculty">Faculty</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Section
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="section" value="<?php echo $row['section']; ?>" placeholder="Section....." id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="user.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
<?php
$id =$_GET['user_id'];
if (isset($_POST['update'])) {
				//				$image = $_FILES["image"] ["name"];
				//			$image_name= addslashes($_FILES['image']['name']);
				//			$size = $_FILES["image"] ["size"];
				//			$error = $_FILES["image"] ["error"];
							


				//			if ($error > 0){
										
// $school_number = $_POST['school_number'];
// $firstname = $_POST['firstname'];
// $middlename = $_POST['middlename'];
// $lastname = $_POST['lastname'];
// $contact = $_POST['contact'];
// $gender = $_POST['gender'];
// $address = $_POST['address'];
// $type = $_POST['type'];
// $level = $_POST['level'];
// $still_profile = $row['user_image'];


// mysqli_query($con," UPDATE user SET school_number='$school_number', firstname='$firstname', middlename='$middlename', lastname='$lastname', contact='$contact', 
// gender='$gender', address='$address', type='$type', level='$level', user_image='$still_profile' WHERE user_id = '$id' ")or die(mysqli_error());
// echo "<script>alert('Successfully Update User Info!'); window.location='user.php'</script>";	
							//		}else{
							//			if($size > 10000000) //conditions for the file
							//			{
							//			die("Format is not allowed or file size is too big!");
							//			}
										

// move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
// $profile=$_FILES["image"]["name"];

$school_number = $_POST['school_number'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$type = $_POST['type'];
$level = $_POST['level'];
$section = $_POST['section'];

{		
mysqli_query($con," UPDATE user SET school_number='$school_number', firstname='$firstname', middlename='$middlename', lastname='$lastname', contact='$contact', 
gender='$gender', address='$address', type='$type', level='$level', section='$section' WHERE user_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated User Info!'); window.location='user.php'</script>";
}

// }
// }
}
?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>