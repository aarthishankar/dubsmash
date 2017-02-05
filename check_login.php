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
// if (isset($_POST['submit'])) {
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
	//$con = mysql_connect("localhost", "root", "");
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	//$db = mysql_select_db("seeliftc_littleshows", $con);
	$query = mysql_query("select * from little_register where u_password='$password' AND u_mail='$username'", $con) or die(mysql_error());
	
	$rows = mysql_num_rows($query);
	$rowsdata=mysql_fetch_array($query);




	if ($rows == 1) {
		$response['status'] = true;
		$response['result'] = "Success";
		$_SESSION['u_id']=$rowsdata['u_id'];
		$_SESSION['u_name']=$rowsdata['u_name'];
 
		//header("location: profile.php"); 
		echo json_encode($response);
	} else {
		$response['result'] = "Username or Password is invalid";
		echo json_encode($response);
	}
	mysql_close($con); 
}
// }
?>
 

