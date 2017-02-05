<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include 'mysqlconnection_2.php';
session_start(0);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #FFF;
	margin: 0;
	padding: 0;
	color: #000;
}

</style>
<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="asset/css/main.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script  type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</head>

<body>

<div class="row">
<div class="col-md-12">

<div class="header-image">
</div>
<div class="row-header">
</div>

<div class="row-header">
</div>



</div>
</div>


  <table  align="center">
  <tbody>
  <tr>
  <td>
    <?php include"header.php" ?>
    
     <?php include"body-starts.php" ?>

     <br></br>
     <br></br>
     <center><img src="asset/image/dub.jpg"></center>
<style>
.mainbody {
	background:#fff;
	margin-top:-18px;
	padding:20px;
	}
.participant_row{
	cursor:pointer;
	}	
.small{
	width:30px;
	height:30px;
	}
.img-circle{
	border-radius:50px;
	}		
</style>
     
  <h2 class=" text-warning"></h2>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        
        <th>Contestant</th>
        <th>Movies</th>
        <th>Claps</th>
      </tr>
    </thead>


    <tbody>

<?php
$sql_cn="select * from dubs_contestor ORDER BY overAllClap desc";

$result_cn=mysql_query($sql_cn);

$i=1;

while($row_cn=mysql_fetch_assoc($result_cn)){
$contest_id=$row_cn['competitorID'];
$little_id=$row_cn['littleID'];


$sql_total="SELECT * FROM  `dubs_contestmovie` where competitorID='$contest_id' ";
$result_total=mysql_query($sql_total);
$row_total=mysql_num_rows($result_total); 
?>
      <tr class="participant_row" onclick="javascript: window.location='profile.php?contest=<?php echo $contest_id;?>'">
        
        
        <td><?php echo $i ?></td>
        <td ><img src="//www.littleshows.com/profile/<?php echo $little_id?>/001.png" class="img-circle small" /> &nbsp; <?php echo $row_cn['contest_name'] ?></td></a>
         <td><?php echo $row_total ?></td>
         <td><?php echo $row_cn['overAllClap'] ?></td>
      </tr>
      
<?php
$i++;
}
?>      
    </tbody>
  </table>

     <?php include"body-ends.php" ?>
   
   
     <?php include"footer.php" ?>
   </div>
 
</td> </tr></tbody></table><!--
<script src="asset/js/jquery-2.1.3.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script  type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script>

</script>
</body>
</html>