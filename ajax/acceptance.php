<?php 
error_reporting(0);
include '../mysqlconnection_2.php';
session_start();
$e_id=$_SESSION['u_id'];
$select="select u_name,u_mail,u_gender,u_phno from little_register where u_id='$e_id'";
$result_select=mysqli_query($con,$select);
$row_select=mysqli_fetch_array($result_select); 
$name=$row_select['u_name'];
$email_ID=$row_select['u_mail'];
$phno=$row_select['u_phno'];
$gender=$row_select['u_gender'];
if($gender=="male"){
	$gender='m';
} else {
	$gender='f';
}
?>
<?php
$count=1;
while($count>0){
	$dubsID='DUBS_'.rand(11,999999);
	$checking_apid="select competitorID from dubs_contestor where competitorID='".$movieID."'";
	$result=mysqli_query($con,$checking_apid);
	$count=mysqli_num_rows($result);
}
$_SESSION['contID']=$dubsID;	
$insert_exp="insert into dubs_contestor(competitorID,littleID,contest_name,joiningDate, emailID,phNo,gender) values('$dubsID','$e_id','$name',sysdate(),'$email_ID','$phno','$gender')";
mysqli_query($con,$insert_exp);
header('Location: ../profile.php');
?>
