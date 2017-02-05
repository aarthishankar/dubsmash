<?php
//error_reporting(0);
?>
<!--<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css" />
--><style>
.header {
  width: 980px;
  /*height: 95px;*/
  margin: 0;
  padding: 0;
  float: left;
  position: relative;
  border-top: 5px solid #ff6e03;

}
.navbar{
	width: 980px;
  height: 25px;
  background:#fff;
  float:left;
 
	}
.logout{
	width:220px;
	height:100px;
	margin-right:40px;
	padding-top:15px;
	padding-right:5px;
	padding-left:0px;
	position:relative;
	cursor:pointer;
	}
	
.loginerName{
	margin-top:20px;
	margin-right:10px;
	color:#000;
	font-size:20px;
	}	
.white-back{
	width:220px;
	height:0px;
	background:#fff;
	margin-top:15px;
	margin-right:-5px;
	border:1px solid #cecece;
	overflow:hidden;
	}
.logout:hover .white-back{
	height:150px;
	}	
.menu{
	width:100%;
	font-size:17px;
	margin-top:5px;
	padding-left:25px;
	color:#444;
	font-family:Verdana, Geneva, sans-serif;
	padding-top:1px;
	
	}		
</style>



  <div class="main-body">


<div style="position:absolute; left:0px; height:80px; top:-100px; width:100%;   z-index:5;">

<img src="asset/image/ls logo.png" class="pull-left" width="150" />


<!--my profile photo-->
<?php 
	 if(isset($_SESSION['u_id'])){
		 
	 ?>
<div class="pull-right logout" >
<img src="http://www.littleshows.com/profile/<?php echo $_SESSION['u_id']; ?>/001.png" class="pull-right" style="border-radius:200px; width:50px; height:50px; " />
<h1 class="pull-right loginerName"><?php echo $_SESSION['u_name']; ?></h1>
<br></br>
<div class="pull-right  white-back">
<a href="profile.php"><div class="menu">My Dubsmash</div></a>
<div class=" menu">My Status</div>
<a href="logout.php"><div class=" menu">Logout</div></a>
  

</div>

</div>
<?php
	 }
?>


<?php 
	 if(isset($_SESSION['fb_id'])){
	 ?>
<div class="pull-right logout" >
<img src="http://graph.facebook.com/<?php echo $_SESSION['fb_id']; ?>/picture?type=square" class="pull-right" style="border-radius:200px; width:70px; height:70px; " />
<div class="pull-right loginerName"><?php echo $_SESSION['fb_name']; ?></div>

<div class="pull-right  white-back" >
<div class=" menu">Top List</div>
<a href="logout.php"><div class=" menu">Logout</div></a>
  

</div>

</div>
<?php
	 }
?>



<!--my profile photo-->


</div>

  
<!--competition main image-->
<div style="position:absolute; left:345px; top:-80px; width:260px;  z-index:5;">

<img src="asset/image/dubsmash-logo.png" style="width:100%;" />
</div>
<!--competition main image-->

<?php include "terms.php" ?>

<!--<div class="header">-->
<!--<img src="asset/image/header-bg.jpg" style="position:relative; margin-top:0; left:0; width:100%;"  />
-->



<!--</div>-->

<!--navbar starts-->
<div class="navbar">
<!-- <div class="navbar-header">
 
  <a class="navbar-text text-muted " href="#">Home</a>
  
   <a class="navbar-text text-muted " href="#">Video</a>
    <a class="navbar-text text-muted " href="#">Participants</a>
    
     <a class="navbar-text text-muted " href="#"><p>Results</p></a>
</div>-->

<?php

$xmlFile = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path=explode("?",$xmlFile);
$file=basename($path[0],".php");
//echo $file;
?>


<ul class="nav nav-tabs ">
  <li role="presentation" class="<?php  if($file=="profile"){?>active<?php }?> text-muted"><a href="profile.php">Upload</a></li>
  <li role="presentation" class="<?php if($file=="video"){?>active<?php }?> text-muted"><a href="video.php">Video</a></li>
  <li role="presentation" class="<?php if($file=="participant"){?>active<?php }?> text-muted"><a href="participant.php">Participants</a></li>
   <li role="presentation" class=" <?php if($file=="leader-board"){?>active<?php }?> text-muted"><a href="leader-board.php">Results</a></li>
<li role="presentation" class="  text-muted pull-right"><a href="#"  id="tandc">Terms and condition</a></li>
</ul>

</div><!--navbar-->





<script type="text/javascript">
$(document).on('click', '#tandc', function(){
	$('#myterms').modal('show');
	function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
}

$('.modal').on('show.bs.modal', centerModal);
$(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
});
	
});
</script>