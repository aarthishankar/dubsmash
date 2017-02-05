<?php
//$con=mysql_connect("localhost","littlesh_data","April72013");
//mysql_close($con);li
$con=mysql_connect("localhost","root","");
if(!$con)
{
echo 'couldnot connect'.mysql_error();
if (mysql_errno() == 1203) {
  // 1203 == ER_TOO_MANY_USER_CONNECTIONS (mysqld_error.h)
  header("Location: http://www.littleshows.com/about.php");
  exit;
}


}

//mysql_select_db("littlesh_seelift",$con);
mysql_select_db("seeliftc_littleshows",$con);

?>
