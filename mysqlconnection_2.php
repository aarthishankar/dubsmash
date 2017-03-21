<?php
/** The name of the database for WordPress */
/** MySQL database username */
/** MySQL hostname */

$con=mysqli_connect("mysql","root","123thisisit");
if(!$con)
{
	echo 'couldnot connect'.mysql_error();
}

mysqli_select_db($con,"seeliftc_littleshows");
?>
