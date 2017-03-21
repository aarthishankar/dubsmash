<?php
session_start(); 
unset($_SESSION['u_id']);
unset($_SESSION['contID']);
unset($_SESSION['fb_id']);
unset($_SESSION['fb_name']);
unset($_SESSION['u_name']);

$status = false;
$result = "Login Failed";
$response = array("status"=> $status, "result"=> $result);
if (empty($_POST['username']) || empty($_POST['password'])) {
	$response['status'] = false;
	$response['result'] = "Username or Password is invalid";
	echo json_encode($response);
}
else
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	include "mysqlconnection_2.php";
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($con,$username);
	$password = mysqli_real_escape_string($con,$password);
	$query = mysqli_query($con,"select * from little_register where u_password='$password' AND u_name='$username'") or die(mysql_error());
	$rows = mysqli_num_rows($query);
	$rowsdata=mysqli_fetch_array($query);
	if ($rows == 1) {
		$response['status'] = true;
		$response['result'] = "Success";
		$_SESSION['u_id']=$rowsdata['u_id'];
		$_SESSION['u_name']=$rowsdata['u_name'];
		echo json_encode($response);
	} else {
		$response['result'] = "Username or Password is invalid";
		echo json_encode($response);
	}
}
?>
