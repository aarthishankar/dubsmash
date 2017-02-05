<?php
include 'mysqlconnection_2.php';
$count =0;
$response = array("count"=>$count);
$count_rows = "select count(*) from little_register";
$query = mysql_query($count_rows);
$res_query = mysql_fetch_array($query);
$count = $res_query[0];
//echo "<input type='hidden' id='page-count' val=$pages />";
$response["count"] = $count;
echo json_encode($response);
?>