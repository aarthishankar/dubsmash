<?php 
error_reporting(0);
include '../mysqlconnection_2.php';
session_start();
$status = false;
$result1 = "Only one clap allowed";
$movid="";
$response = array( "result1"=> $result1,"status"=> $status,"movid"=> $movid);
$response['result1']="Already clapped";

$movieID=$_POST['movid'];

if($_POST['via']=="facebook"){
	$dupli=1;


	if(!isset($_SESSION['fb_id'])){
		$_SESSION['fb_id']=$_POST['clapperID'];
		$clapper_id=$_POST['clapperID'];
		$clapperName=$_POST['clapperName'];
		$_SESSION['fb_name']=$clapperName;
		$dupli=0;
	}


	$e_id=$_SESSION['fb_id'];
	$unique=$movieID.''.$e_id;

	$insert_exp="insert into dubs_clapping (movieID,clapperID, timeOfClap,movIDclapID) values('$movieID','$e_id',sysdate(),'$unique')";

	if($dupli==0){
		$insert_clapper="insert into dubs_clapper (clapperID,Name) values('$clapper_id','$clapperName')";
		mysqli_query($con,$insert_clapper);	
	}
}else if($_POST['via']=="littleshows"){// else facebook starts 

	$e_id=$_SESSION['u_id'];

	$unique=$movieID.''.$e_id;
	?>
		<?php
		$result=0;

	$insert_exp="insert into dubs_clapping (movieID,clapperID, timeOfClap,movIDclapID) values('$movieID','$e_id',sysdate(),'$unique')";
}// else facebook



$result=mysqli_query($con,$insert_exp);

if (!$result) {
	//
	$response['status']=false;
	echo json_encode($response);

	exit;
	//   die('Invalid query: ' . mysql_error());
}else{
	//clapped
	$update_clap="UPDATE dubs_movie_details SET MovieClaps = MovieClaps + 1   WHERE movieID = '$movieID'";
	mysqli_query($con,$update_clap);

	$get_owner="select competitorID from dubs_contestmovie where movieID='$movieID'";
	$result_get_owner=mysqli_query($con,$get_owner);
	$row_get_owner=mysqli_fetch_array($result_get_owner);

	$movie_owner=$row_get_owner['competitorID'];

	$update_overall_clap="update dubs_contestor set overAllClap=overAllClap+1 where competitorID='$movie_owner'";
	mysqli_query($con,$update_overall_clap);	

	$response['result1']="Thank you for clapping";
	$response['status']=true;
	$response['movid']="$movieID";
}

echo json_encode($response);


?>
