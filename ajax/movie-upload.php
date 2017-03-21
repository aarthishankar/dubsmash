<?php 
error_reporting(0);
include '../mysqlconnection_2.php';
session_start();
$e_id=$_SESSION['u_id'];
$contest_id=$_SESSION['contID'];
// $e_id='102';
 
$mov_title=$_POST['title'];
$mov_url=$_POST['url'];
$mov_tags=$_POST['tags'];

?>
<?php
$count=1;

while($count>0){
$movieID=rand(11,999999);
$checking_apid="select movieID from dubs_contestmovie where movieID='".$movieID."'";
$result=mysqli_query($con,$checking_apid);
$count=mysqli_num_rows($con,$result);
}
	$pos = strpos($mov_url, 'facebook');
	$via= ( $pos > 0 ? 1 : 2);
$insert_exp="insert into dubs_contestmovie (movieID,competitorID, valid,movie_upload_date) values('$movieID','$contest_id','p',sysdate())";
$insert_mov_details="insert into dubs_movie_details (movieID,MovieName, MovieURL,MovieViewer,MovieTags,MovieClaps,via,movie_upload_date) values('$movieID','$mov_title','$mov_url',1,'$mov_tags',0,$via,sysdate())";
mysqli_query($con,$insert_exp);
mysqli_query($con,$insert_mov_details);
?>
