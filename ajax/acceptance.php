<?php 
error_reporting(0);
include '../mysqlconnection_2.php';
session_start();
$e_id=$_SESSION['u_id'];
// $e_id='102';
 
$select="select u_name,u_mail,u_gender,u_phno from little_register where u_id='$e_id'";
$result_select=mysql_query($select);
$row_select=mysql_fetch_array($result_select); 

$name=$row_select['u_name'];
$email_ID=$row_select['u_mail'];
$phno=$row_select['u_phno'];
$gender=$row_select['u_gender'];
if($gender=="male"){
	$gender='m';
	}else{
		$gender='f';
		}
?>
<?php
$count=1;

while($count>0){
$dubsID='DUBS_'.rand(11,999999);
$checking_apid="select competitorID from dubs_contestor where competitorID='".$movieID."'";
$result=mysql_query($checking_apid);
$count=mysql_num_rows($result);
}
	
	
$_SESSION['contID']=$dubsID;	
$insert_exp="insert into dubs_contestor(competitorID,littleID,contest_name,joiningDate, emailID,phNo,gender) values('$dubsID','$e_id','$name',sysdate(),'$email_ID','$phno','$gender')";


mysql_query($insert_exp);


mysql_close($con2);
header('Location: ../profile.php');

?>