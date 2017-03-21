<?php
error_reporting(0);
include 'mysqlconnection_2.php';

$status = false;
$result = "Signup Failed";
$response = array("status"=> $status, "result"=> $result);

function generateRandomString($length = 5) {
	$count=1;
	while($count>0){
		$ap_id=rand(11,999999);
		$checking_apid="select u_id from little_register where u_id='little_".$ap_id."'";
		$result=mysqli_query($checking_apid);
		$count=mysqli_num_rows($result);
	}
	$user_id='little_'.$ap_id;
	return $user_id;
}
if (isset($_POST['username']) && isset($_POST['password'])){
	$userid=generateRandomString();
	$username = $_POST['fname'];
	$email = $_POST['username'];
	$mobile = $_POST['phone'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirm_password'];
	$fb_link=$_POST['fb_link'];
	$gender=$_POST['gender']; 
	$q="SELECT * from little_register where u_mail LIKE '$email' ";
	$res= mysqli_query($con,$q);
	$rows = mysqli_num_rows($res);
	if($rows == 0)
	{
		if($password==$confirmpassword)
		{
			$query = "INSERT INTO little_register(u_id,u_name, u_mail,u_phno, u_password,time) VALUES ('$userid','$username', '$email', '$mobile', '$password',sysdate())";
			$result = mysqli_query($con,$query);

			if ($result) {

				$sql2="INSERT INTO profile_table (pro_id, pro_name,facebook_link,pro_mail) VALUES ('$userid','$username', '$fb_link', '$email')";
				mysqli_query($con,$sql2);

				$response['status'] = true;
				$response['result'] = "Success";

				mkdir("/var/www/html/profile/$userid/", 0777);
				mkdir("/var/www/html/profile/$userid/thumbnail/", 0777);
				$file = "/var/www/html/profile/default1.png";
				$newfile = "/var/www/html/profile/$userid/001.png";
				echo json_encode($response);
			} else {
				$response['result'] = "registration failed";
				echo json_encode($response);
			}        
		}
	}else {
		$response['result'] = "email already exists";
		echo json_encode($response);
	}
}
?>
