<?php 
error_reporting(0);
include '../mysqlconnection_2.php';
session_start();
$e_id=$_SESSION['u_id'];
$mov_id=$_POST['mov_id'];
$update_view="update dubs_movie_details set MovieViewer=MovieViewer+1 where movieID='$mov_id'";
$result=mysqli_query($con,$update_view);
if($result){
$update_overallview="update  dubs_contestor set overAllView=overAllview+1 where competitorID=(SELECT competitorID FROM dubs_contestmovie where movieID='$mov_id')";
mysqli_query($con,$update_overallview);
}
?>
