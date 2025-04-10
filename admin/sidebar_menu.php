            <!-- sidebar navigation -->
            <div class="col-md-3 left_col">
                            <div class="left_col scroll-view">
                                <div class="navbar nav_title" style="border: 0;">
                                    <a href="home.php" class="site_title"><span style="font-size: 14px;">Library Management System</span><i class="fa fa-university"></i></a></div>
                                <div class="clearfix"></div>

                                <!-- menu prile quick info -->
                                <a href="admin_profile.php">
                                    <div class="profile">
                                        <?php
                                        include('include/dbcon.php');
                                        $user_query = mysqli_query($con, "select *  from admin where admin_id='$id_session'") or die(mysqli_error());
                                        $row = mysqli_fetch_array($user_query); {
                                        ?>
                                            <div class="profile_pic">
                                                <?php if ($row['admin_image'] != ""): ?>
                                                    <img src="upload/<?php echo $row['admin_image']; ?>" style="height:65px; width:75px;" class="img-thumbnail profile_img">
                                                <?php else: ?>
                                                    <img src="images/user.png" style="height:65px; width:75px;" class="img-circle profile_img">
                                                <?php endif; ?>
                                            </div>

                                            <div class="profile_info">
                                                <span>Welcome,</span>
                                                <h2><?php echo $row['firstname']; ?></h2>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </a>
                                <!-- /menu prile quick info -->

                                <br />

                                <!-- sidebar menu -->
                                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                                    <div class="menu_section">
                                        <h3 style="margin-top:85px;">File Information</h3>
                                        <div class="separator"></div>
                                        <ul class="nav side-menu">
                                            <li>
                                                <a href="home.php"><i class="fa fa-home"></i> Home</a>
                                            </li>
                                            <li>
                                                <a href="user.php"><i class="fa fa-users"></i> Members</a>
                                            </li>
                                            <li>
                                                <a href="book.php"><i class="fa fa-book"></i> Books</a>
                                            </li>
                                            <li>
                                                <a href="admin.php"><i class="fa fa-user"></i> Admin</a>
                                            </li>
                                            <li>
                                                <a href="user_log_in.php"><i class="fa fa-users"></i> Members Attendance</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="menu_section">
                                        <h3>Transaction Information</h3>
                                        <div class="separator"></div>
                                        <ul class="nav side-menu">
                                            <li>
                                                <a href="borrow.php"><i class="fa fa-edit"></i> Borrow</a>
                                            </li>
                                            <li>
                                                <a href="borrowed.php"><i class="fa fa-book"></i> Borrowed Books</a>
                                            </li>
                                            <li>
                                                <a href="returned_book.php"><i class="fa fa-book"></i> Returned Books</a>
                                            </li>
                                            <li>
                                                <a href="settings.php"><i class="fa fa-cog"></i> Settings</a>
                                            </li>
                                            <li>
                                                <a href="report.php"><i class="fa fa-file"></i> Reports</a>
                                            </li>
                                            <li>
                                                <a href="about_us.php"><i class="fa fa-info"></i> About Us</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <!-- /sidebar menu -->

                            </div>
                        </div>
            <!-- end of sidebar navigation -->