<?php
include('include/dbcon.php');

if (isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

$login_query=mysqli_query($con,"select * from admin where username='$username' and password='$password'");
$count=mysqli_num_rows($login_query);
$row=mysqli_fetch_array($login_query);

if ($count > 0){
session_start();
$_SESSION['id']=$row['admin_id'];

echo "<script>alert('Successfully Login!'); window.location='home.php'</script>";
}else{
	echo "<script>alert('Invalid Username and Password! Try again.'); window.location='index.php'</script>";
?>
<?php } 
}
?>