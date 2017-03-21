<?php
include 'mysqlconnection_2.php';
$count =0;
$response = array("count"=>$count);
$count_rows = "select count(*) from dubs_movie_details";
$query = mysqli_query($con,$count_rows);
$res_query = mysqli_fetch_array($query);
$count = $res_query[0];
$response["count"] = $count;
echo json_encode($response);
?>
