<?php
 include "mysqlconnection_2.php";
 $q=isset($_GET['q']);
 $my_data=mysqli_real_escape_string($con,$q);
 $sql="SELECT tagname FROM dubs_tags WHERE tagname LIKE '%$my_data%' ORDER BY tagname";
 $result = mysqli_query($con,$sql);
 $dname_list = array();
 if($result)
 {
  while($row=mysql_fetch_array($result))
  {
     $dname_list[] = $row['tagname'];
  }
    echo json_encode($dname_list);
 }
?>

