<?php
error_reporting(0);
session_start();


include 'mysqlconnection_2.php';
if(!isset($_GET['mov_id'])){
	$sql="SELECT * FROM  `dubs_contestmovie` ORDER BY rand() ";
	$result_ran=mysql_query($sql);
	$row_ran=mysql_fetch_array($result_ran);
	$movi= $row_ran['movieID'];
	header("Location://www.littleshows.com/dubsmash-competition/share_video.php?mov_id=$movi");
	exit(0);
	}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png"  href="../image/favicon.png" />

<?php
$mov_ide=$_GET['mov_id'];

$select_movie="select * from dubs_movie_details where movieID='$mov_ide'";
$result_select_movie=mysql_query($select_movie);
$row_select_movie=mysql_fetch_array($result_select_movie);

$mystring = $row_select_movie['MovieURL'];
$mymoviename=$row_select_movie['MovieName'];
$mymovietag=$row_select_movie['MovieTags'];

$actual_link = "http://www.littleshows.com/dubsmash-competition/share_video.php?mov_id=$mov_ide";

?>
<title><?php echo $mymoviename ?> Dubsmash Video</title>


<meta property="fb:app_id" content="363441500454559" />
<meta property="og:title" content="<?php echo $mymoviename ?> Dubsmash Video" />
<meta property="og:image" content="http://www.littleshows.com/dubsmash-competition/asset/image/ison.png" />
 <meta property="og:url" content="<?php echo $actual_link; ?>" />
 <meta property="og:type" content="littleshows:dubsmash_video" />

<meta property="og:description" 
  content=" Littleshows Dubsmash Contest  - <?php echo $mymoviename ?> Dubsmash video." />
 <meta property="og:site_name" content="Littleshows">

<style>
.mainbody {
	background:#fff;

	}

</style>



<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="asset/css/main.css" />

<link rel="stylesheet" type="text/css" href="asset/css/particular.css"/>
<script src="asset/js/jquery-2.1.3.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script  type="text/javascript" src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery.bootpag.min.js"></script>



</head>
<style>

.popup{
	width:100%;
	height:100%;
	background:rgba(5,5,5,0.6);
	position:fixed;
	z-index:10000;
	display:none;
	
	}	
.people_register_page1{
		
	
	background:#FFF;
	position:relative;
	margin:auto;
	margin-top:155px;
	float:none;
	padding-bottom:10px;
	display:none;
	
	}	
.popup_header{
	min-height:60px;
	padding-top:20px;
	width:100%;
	border-bottom:1px solid #efefef;
	}
</style>
<body>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=363441500454559";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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

<div class="main-body" >
    <?php include"header.php" ?>
 
     <?php include"body-starts.php" ?>
   <style>
.mainbody{
	width:1100px;
	}
.main-body {
	width:1120px;
}
</style>
    
   <div class="profile-contend">
    
    <!--left contend-->
    <div class="left-profile-contend">
     
     <!--scrolling starts-->
   <?php
	  include "videodisp.php" 
	?>
   
     
     </div>
     <!--left contend ends-->
     
     
     
     <!--.right-profile-contend starts-->
     <div class="right-profile-contend">
     <div class=" container-fluid" >
     
     <!--row start-->
     <div class="row"  >
    
     <div class="col-lg-11 text-left" style=" border-bottom:1px solid #222; line-height:25px;">
     	<?php echo "Related videos" ?>
     </div>
     <div class="col-lg-11 text-right">
     </div>
     
     <!--http://img.youtube.com/vi/<insert-youtube-video-id-here>/0.jpg-->
     
    
     <!--inner row starts-->
     <div class="col-lg-11 " style="margin-top:10px;"> 
     <div class="row" >
     
     
      <?php
	  include "part.php" // video on right side
	?>
     
      
     </div>
     </div>
         <!--inner row ends-->
         
             
     </div>
     <!--row ends-->
     
     </div>
     
     </div>
      <!--.right-profile-contend ends-->
      
      
      
   
     
     
     
     
     </div>
     
     <?php include"body-ends.php" ?>
   
   
     <?php include"footer.php" ?>
       
  

 </div>

<script>
  var sdk_load=0;  

/*$(".1my-video-offset").click(function(e) {
    $("#url_def").html($(this).attr('data-href'));
	$("#mov_id4clap").html($(this).attr('data-movid'));//data-movid
	//$(".popup").show();
});	*/


 var little_u_id="0";
var little_id="";

$("#clap_it").click(function(e) {
   var mov_idd = decodeURIComponent("<?php  echo rawurlencode($_GET['mov_id']); ?>");	
// var mov_idd=$("#mov_id4clap").html();
var link_movie="http://www.littleshows.com/dubsmash-competition/share_video.php?mov_id="+mov_idd;  

var via="";
	<?php
	if(isset($_SESSION['u_id'])){
	?>
	 var little_id = decodeURIComponent("<?php echo rawurlencode($_SESSION['u_id']); ?>");
	 via="littleshows";
	<?php
	}else if(isset($_SESSION['fb_id'])){
		?>
		 var little_id = decodeURIComponent("<?php echo rawurlencode($_SESSION['fb_id']); ?>");
		via="facebook";
		<?php
		}
	?>
//alert(via);
	if(little_id=="" && little_u_id=="0"){
		
		$(".people_register_page1").show();
		$(".popup").show();
		
		return false;
		}



	<?php
	if(isset($_SESSION['u_id'])){
	?>

 $.post("ajax/clap_dubsmash.php",
			{
			   movid:mov_idd,
			   via:via
			  
			   
			},
			function(data,status){
				 var res = $.parseJSON(data);
				alert(res.result1);
				if(res.status){
					var movid=res.movid;
					//alert(movid);
					var totalcount=parseInt($(".clap-display").html());
					$(".clap-display").html(totalcount+1);
				var oneMovieCount=parseInt($("#"+movid).children('.view-clap').children('span').children(".movie_clap_c").html());
				$("#"+movid).children('.view-clap').children('span').children(".movie_clap_c").html(oneMovieCount+1);
					}else{
						
						}
				//setTimeout(function(){location.reload()}, 1000);
//				alert(data);
			
			});


	<?php
	}else if(isset($_SESSION['fb_id'])){
		?>

//facebook
FB.api('/me', function(response) {
								  
				fb_user_name=response.name;
				fb_user_id=response.id;
				 
				
				if(response.verified){ 
						
			$.post("ajax/clap_dubsmash.php",
			{
			   movid:mov_idd,
			   via:via
			   
			},
			function(data,status){
				 var res = $.parseJSON(data);
				alert(res.result1);
				//res.status starts
				if(res.status){
					var movid=res.movid;
					//alert(movid);
					var totalcount=parseInt($(".clap-display").html());
					$(".clap-display").html(totalcount+1);
				var oneMovieCount=parseInt($("#"+movid).children('.view-clap').children('span').children(".movie_clap_c").html());
				$("#"+movid).children('.view-clap').children('span').children(".movie_clap_c").html(oneMovieCount+1);
				
					//facebook clap
					FB.api(
					'me/littleshows:clap',
					'post',
					{
					dubsmash_video:link_movie
					
					},
					function(response){ console.log(response); });
					// facebook clap ends
					
					
					}else{
						
						}
			//res.status ends
			
			});

	}//response.verified

			
	});//fb.api /me
								
		
//facebook ends
		<?php
		}else{
			?>
			location.reload();
			<?php
			
			}
	?>


});



 $("#facebook_clap").click(function(e) {
	 
var mov_idd = decodeURIComponent("<?php  echo rawurlencode($_GET['mov_id']); ?>");
var link_movie="http://www.littleshows.com/dubsmash-competition/share_video.php?mov_id="+mov_idd;

	 	 FB.login(function(response) {
			
							 var body_html="Littleshows Dubsmash Contest www.facebook.com/littleshowss ";
							 var fb_user_name="";
							 var fb_user_id="";
							 var link_movie="";
							 var text="";
			
			 FB.api('/me', function(response) {
								  
				fb_user_name=response.name;
				fb_user_id=response.id;
				 
				if(response.verified){ 
				little_u_id=1;
						$.post("ajax/clap_dubsmash.php",
						{
						   movid:mov_idd,
						   clapperName:fb_user_name,
						   clapperID:fb_user_id,
						   via:'facebook'
						  
						   
						},function(data,status){
							var res = $.parseJSON(data);
							alert(res.result1);
							
							$(".popup").hide();
							$(".people_register_page1").hide();
							
							if(res.status){
									FB.api(
									'me/littleshows:clap',
									'post',
									{dubsmash_video:link_movie},
									function(response){ });
							}//res.status
							
							
						
						});
						
				}// RESPONSE.VERIFIED

			
			});//fb.api /me
								

						
		}, {scope: 'publish_actions,email'});//fb.login
			
			
		
								
								/* facebook comment end*/
		
 });







$("#share_video").click(function(e) {

 
 
   
    var id_prof = decodeURIComponent("<?php  echo rawurlencode($_GET['mov_id']); ?>");
 
FB.ui({
  method: 'feed',
  link: 'http://www.littleshows.com/dubsmash-competition/share_video.php?mov_id='+id_prof,
  caption: 'Littleshows Dubsmash Contest 2015',
 // picture:img
}, function(response){});

});


             </script>
</td> </tr></tbody></table>

</body>
</html>