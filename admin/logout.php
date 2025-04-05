<?php
include('include/dbcon.php');
include('session.php');

$logout_query=mysqli_query($con,"select * from admin where admin_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$user=$row['firstname']." ".$row['lastname'];
session_start();
session_destroy();

header('location:index.php');

?>