<?php
 $q=isset($_GET['q']);
 $my_data=mysql_real_escape_string($q);
 include "mysqlconnection_2.php";
 $sql="SELECT tagname FROM dubs_tags WHERE tagname LIKE '%$my_data%' ORDER BY tagname";
 $result = mysql_query($sql);
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

