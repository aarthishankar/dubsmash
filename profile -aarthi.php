<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
error_reporting(0);
session_start();



if(isset($_GET['contest'])){
$str = $_GET['contest'];
}

$ownership=0;

include 'mysqlconnection_2.php';
if(!empty($str)){
	
	
		if($_SESSION['contID']==$str){
			$id_prof=$_SESSION['contID'];
			//$ownership=1;
			
			
			




			$str=NULL;	
		}else
		{
			$id_prof=$str;
			//$ownership=0;
		}
	}else{
	
			if(isset($_SESSION['u_id'])){
				$u_id=$_SESSION['u_id'];
				$check_contest="SELECT * FROM  `dubs_contestor` where littleID='$u_id'";
				//echo $check_contest;
				$query2 = mysql_query($check_contest, $con) or die(mysql_error());
				$rows = mysql_num_rows($query2);
				
				if ($rows == 1) { 
				$ro=mysql_fetch_array($query2);
				$id_prof=$ro['competitorID'];
				$_SESSION['contID']=$id_prof;
				//$ownership=1;
				}else{
				header("location: ajax/acceptance.php");
				exit();

				}
 
			
//			$id_prof=$_SESSION['contID'];	
			}else{
			
			header('Location: login.php');
			exit();
			}
				
		}


if(isset($_SESSION['u_id'])){
$u_id=$_SESSION['u_id'];

$check_ownership="SELECT * FROM dubs_contestor m where  littleID='$u_id' and competitorID='$id_prof' ";
$result_check_ownership=mysql_query($check_ownership);
$v_result_check_ownership=mysql_num_rows($result_check_ownership);

if($v_result_check_ownership>0){
	$ownership=1;
	}else{
		$ownership=0;
		}
//echo $ownership;
}
	
$take_details="SELECT * FROM dubs_contestor where   competitorID='$id_prof' ";	
$result_detail=mysql_query($take_details);
$row_details=mysql_fetch_array($result_detail);
$contestor_name=$row_details['contest_name'];
$total_clap=$row_details['overAllClap'];
$joining_date=$row_details['joiningDate'];
$little_id=$row_details['littleID'];
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $contestor_name.' Dubsmash Video | Littleshows Dubsmash Contest 2015'; ?></title>
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
<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="asset/css/profile.css" />

    <script>
	(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=363441500454559";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>
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
	z-index:10010;
	display:none;
	
	}	
.popup_header{
	min-height:60px;
	padding-top:20px;
	width:100%;
	border-bottom:1px solid #efefef;
	}
.popup_form{
	position:relative;
	z-index:10000;
	}	
</style>
<body>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  /*var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&status=0&version=v2.3&appId=363441500454559";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));*/</script>


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
     <?php include "modal.php" ?>
     <div class="profile-contend">
    
    <!--left contend-->
    <div class="left-profile-contend">
     
     <!--scrolling starts-->
    
     
     <!--profile-display-->
     <div class="profile-display" >
     <div class="profile-logo-space">
     <img src="http://139.59.27.207/profile/<?php echo $little_id; ?>/001.png" style="width:200px; height:200px; border-radius:300px;" />

     <h3 class="text-center"><?php echo $contestor_name; ?></h3>
     <h5 class="text-center ">Joined on <?php  $date = strtotime($joining_date); echo date('jS F', $date);  ?></h5>
      <h4 class="text-center">Your Total Claps : <?php echo $total_clap;?></h4>
     </div>
     
     
     </div>
     <!--profile-display ends-->

   
     
     </div>
     <!--left contend ends-->
     
     
     
     <!--.right-profile-contend starts-->
     <div class="right-profile-contend">
     <div class=" container-fluid" >
     
     <!--row start-->
     <div class="row"  >
    
     <div class="col-lg-11 text-right" style=" border-bottom:1px solid #222; line-height:25px;">

     	
     </div>
     <?php
     	 if($ownership==1){
	 ?>

      <div class="scrolling">
       <?php 
	 if($ownership==1){
	 ?>
     
        <!--upload starts-->
     <div class="upload-display">
     
     
     <!--Upload Mask starts-->
     <div class="upload-mask">
     <div style="width:35px; height:35px; margin:auto display: block; margin-left: auto; margin-right: auto;">
     <img src="asset/image/spiffygif_60x60.gif" class="center"/>
     </div>
     <div style="width:125px; text-align:center; height:35px; margin:auto; margin-top:30px;">
     Fetching Data
     </div>
     </div>
     <!--Upload Mask ends-->
     	
        <!--upload-div starts-->
        <div class="upload-div">

<!--video-frame starts-->
<div class="video-frame">
        <!--frame ends-->
        <div class="frame">
        <iframe id="upload_ytplayer" type="text/html" width="400" height="255"
 style=" position:relative;margin-top:5px; display: block; margin-left: auto; margin-right: auto;"
src=""
frameborder="0" allowfullscreen></iframe>

<div class="fb-video" id="upload_fbplayer" data-href="" data-width="400"></div>
    

    
</div>
<!--frame ends-->
<br />
<form method="post">
<div class="input-group">
      <div class="input-group-addon">Title</div>
      <input type="text" class="form-control" name="movieTitle"  placeholder="Title of your Video" id="movieTitle" required onblur="compulsory()" />
      
 </div>
<br />
<div class="input-group">
      <div class="input-group-addon">Tags</div>
      <input type="text" class="form-control"  placeholder="#comedy, #action, #love" id="movieTags" name="movieTags" required onblur="validate()" />
      
 </div>

    <br />
      <input type="submit" class="btn btn-warning pull-right" value="Add" id="add-upload-frame"  />
      <input type="button" class="btn btn-danger pull-right" style="margin-right:10px;" id="reset-upload-frame" value="Reset" />
    
</div>
<!-- video-frame ends-->
</form>
 <!--upload-frame starts-->       
<div class="upload-frame">
        <div class="input-group" >
        <input type="text" class="form-control" id="youtube_url" placeholder="Paste your video URL" aria-describedby="basic-addon2">
        <span class="input-group-addon upload-button" id="basic-addon2">UPLOAD</span>
        </div>
        
        <br />
        <span class="btn btn-warning pull-right" id="cancel-upload-url">Back to Profile</span>
        
 </div>
 <!--upload-frame ends-->       
        
        </div>
        <!--upload-div ends-->
     </div>
     <!--upload ends-->
     
     <?php
	 }
	 ?>
	</div>
     <?php
		 }
	 ?>
     <!--http://img.youtube.com/vi/<insert-youtube-video-id-here>/0.jpg-->
     
    
     <!--inner row starts-->
     <div class="col-lg-11 " style="margin-top:10px;"> 
     <div class="row" >
   
     </div>
     </div>
         <!--inner row ends-->
         
             
     </div>
     <!--row ends-->
     
     </div>
     
     </div>
      <!--.right-profile-contend ends-->
      
     
     
     </div>

     <br></br>
     <br></br>
     <?php
	  include 'profile_video.php';// video on right side
	?>
     
     <?php include"body-ends.php" ?>
   
   
     <?php include"footer.php" ?>
       
   </div>
 

 
</td> </tr></tbody></table>

</body>
</html>
<!--<script  type="text/javascript" src="asset/js/jquery.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script  type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="asset/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="asset/js/jquery-ui.js"></script>
<script type="text/javascript" src="asset/js/jquery-ui.min.js"></script>



<script>
var sdk_load=0;  
  
<?php

	 if($ownership==1){
	 ?>

$(".upload-new-btn").click(function(e) {
    $(".upload-display").animate({marginLeft:'0px'},500);
});
$("#cancel-upload-url").click(function(e) {
    $(".upload-display").animate({marginLeft:'-470px'},500);
});


var embedding="";


$("#basic-addon2").click(function(e) {
    if($("#youtube_url").val()==""){
		alert("Please enter your URL");
		return false;
		}
		
	$(".upload-mask").show();	
	
	
	
	var url=$("#youtube_url").val();
	if(url.search("facebook")>0){
		//FB.XFBML.parse();
		// facebook  https://www.facebook.com/facebook/videos/10153415714906729/
		//$(".video-frame").show();

if(sdk_load==4){
	
	(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=363441500454559";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

sdk_load=1;	
}
		$("#upload_fbplayer").attr('data-href',url);
		$(".upload-frame").hide();


setTimeout(function(){
$(".video-frame").show();
$("#upload_fbplayer").show();
		}, 1500);	

setTimeout(function(){$(".upload-mask").hide();
		}, 2000);	



		}else{//youtube
	
	if(url.search("v=")>0){
		var n=url.split("?v=");
		embedding=n[1];
		}else if(url.search("youtu.be")>0){
			var n=url.split("/");
			embedding=n[3];
			}
			
	//$("#upload_ytplayer").attr('src','http://www.youtube.com/embed/'+embedding);
	//alert(embedding);https://www.youtube.com/embed/tG3Ie7Ejrho?&showinfo=0&rel=0
		
		setTimeout(function(){
		$(".video-frame").show();
	$("#upload_ytplayer").show();
		}, 1500);
		
		setTimeout(function(){$(".upload-mask").hide();
		

		}, 2000);	
	$(".upload-frame").hide();
	$("#upload_ytplayer").attr('src','http://www.youtube.com/embed/'+embedding+'?&showinfo=0&rel=0');
			}//youtube ends
	
	

	


});

$("#reset-upload-frame").click(function(e) {
    
	//reset display
	$(".video-frame").hide();
	$("#upload_ytplayer").hide();
	$("#upload_fbplayer").hide();
	$(".upload-frame").show();
	
	//empty url text
	$("#youtube_url").val("");
	
});
	
$("#add-upload-frame").click(function(e) {
 //mask
 	$(".upload-mask").show();	
 	$(".video-frame").hide();
	$("#upload_ytplayer").hide();
	$("#upload_fbplayer").hide();
	$(".upload-frame").show();
//
	
	//want to upload more
	setTimeout(function(){$(".upload-mask").hide();}, 2000);	
	

	
	//alert($("#movieTitle").val()); alert($("#movieTags").val()); alert($("#youtube_url").val());
	
	// reload video thumbnail
	
		var url=$("#youtube_url").val();
		var video_source="";
		
	if(url.search("facebook")>0){
			url1=url.split('videos/');
		
			url1=url1[1].split('?');
			url1=url1[0];

			//video_source=url1;
			//https://www.facebook.com/mannapramod/videos/vb.514262095343670/570837683019444/?type=2&theater
		
			if(url1.search("vb")>-1){
			var vb1 = url1.split('vb');
			url1=vb1[1];
			var vb2=url1.split('/');
			url1=vb2[1];
			}
			var vb2=url1.split('/');
			url1=vb2[0];	
		//video_id=url1;
		video_source="https://www.facebook.com/dubsmashtamil/videos/"+url1;
		
//			var result = url.split('|');
//alert( result[2] );
			
		
	}else{
		video_source='http://www.youtube.com/embed/'+embedding;
		}
	$.post("ajax/movie-upload.php",
			{
			   title:$("#movieTitle").val(),
			   tags:$("#movieTags").val(),
			   url:video_source,
			   
			},
			function(data,status){
				setTimeout(function(){
					window.location="profile.php";
					}, 1000);
				
			
			});
	



});
	
<?php
	 }
?>	


$(window).load(function(e) {
    	FB.XFBML.parse();	


$(".1my-video-offset").click(function(e) {
    $("#url_def").html($(this).attr('data-href'));
	$("#mov_id4clap").html($(this).attr('data-movid'));//data-movid
	//$(".popup").show();
});	


 var little_u_id="0";
var little_id="";

$("#clap_it").click(function(e) {
	
 var mov_idd=$("#mov_id4clap").html();
 
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


});



 $("#facebook_clap").click(function(e) {
	 
 var mov_idd=$("#mov_id4clap").html();
 //alert(mov_idd);
	 	 FB.login(function(response) {
			
							 var body_html="Littleshows Shortfilms www.facebook.com/littleshowss ";
							 var fb_user_name="";
							 var fb_user_id="";
							 var link_movie="";
							 var text="";
			
			 FB.api('/me', function(response) {
								  
				fb_user_name=response.name;
				fb_user_id=response.id;
				 link_movie="";
				//alert(fb_user_id); 
			$.post("ajax/clap_dubsmash.php",
			{
			   movid:mov_idd,
			   clapperName:fb_user_name,
			   clapperID:fb_user_id,
			   via:'facebook'
			  
			   
			},
			function(data,status){
				//setTimeout(function(){location.reload()}, 1000);
				var res = $.parseJSON(data);
				//alert(res.result1);
			$(".popup").hide();
			$(".people_register_page1").hide();
			});

			
			});//fb.api /me

				
				FB.api(
  'me/littleshows:clap',
  'post',
  {
    dubsmash_video: "littleshows.com/dubsmash/video/dubsmash.php?mov_id="+mov_idd
  },
  function(response) {
    // handle the response
  }
);
								
	/*				FB.api(
			  'me/littleshows:clap',
			  'post',
			  {
			//		shortfilm:link_movie
					
					  },
					  function(response) {
						if (!response) {
						//  alert('Error occurred.');
						 } else if (response.error) {
						  //  alert('Error: ' + response.error.message);
						 } else {
						 // alert('Story created.  ID is ' +response.id);
						
						 }


			 });
	*/					
		}, {scope: 'publish_actions,email'});//fb.login
			
			
		
								
								/* facebook comment end*/
		
 });




$("#share_video").click(function(e) {

 var mov_id=$('#mov_id4clap').html();
 
 var img=$("#"+mov_id).children().children('img').attr('src');
 
   
    var id_prof = decodeURIComponent("<?php  echo rawurlencode($id_prof); ?>");
 
FB.ui({
  method: 'feed',
  link: 'http://139.59.27.207/dubsmash/profile.php?contest='+id_prof,
  caption: 'Littleshows Shortfilms',
  picture:img
}, function(response){});

});



});//window.load




$(document).on('click', '#launchModal', function(){
if(sdk_load==5){
	
		(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=363441500454559";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

	}

	var url = $(this).attr('data-href');
	var via = $(this).attr('data-via');
	// $("#url_def").html($(this).attr('data-href'));
	$("#mov_id4clap").html($(this).attr('movie-id'));
	
	
	//alert($(this).attr('movie-id'));
	var mov_id = "http://139.59.27.207/dubsmash/video/" + $(this).attr('movie-id');
	$('#myModal .modal-header #myModalLabel').html($(this).attr('movie-name'))
	$('#myModal .modal-header #myModalTag').html($(this).attr('movie-tags'))
	$('#myModal .modal-body .fb-comments').attr('data-href', mov_id);
	if(via == "1"){
		$('#myModal .modal-body .fb-video').show();
		$('#myModal .modal-body .fb-video').attr('data-href', url);
		$('#myModal').modal('show');
		$('#myModal').on('hide.bs.modal', function(){			
				$('#myModal .modal-body .fb-video').hide();
				$('#myModal .modal-body .fb-video').attr('data-href', '');
		});
	} else if(via == "2"){
		$('#myModal .modal-body .embed-responsive').show();
		$('#myModal .modal-body .videoUrl').attr('src', url);
		$('#myModal').modal('show');
		$('#myModal').on('hide.bs.modal', function(){			
				$('#myModal .modal-body .embed-responsive').hide();
				$('#myModal .modal-body .videoUrl').attr('src', '');		
		});
	}
	//$('#myModal .modal-body .videoUrl').attr('src', "https://www."+url);
	//$('#myModal .modal-body .fb-comments').html('');
	FB.XFBML.parse();	
	$.post("ajax/movie-view.php",{ mov_id:$(this).attr('movie-id'),},
			function(data,status){});
});
$("#popup_login").click(function(e) {
    $.post("check_login.php",
			{
			   username:$("#exampleInputEmail1").val(),
			   password:$("#exampleInputPassword1").val(),		   
			},
			function(data,status){
					var res = $.parseJSON(data);
					
					if(res.status){
						location.reload();
					} else {
					$('.alert').show();
					$('.alert').text(res.result);
					$('.alert').delay(2000).fadeOut('slow');  
					}
				});
});

$("#close_popup").click(function(e) {
    		$(".people_register_page1").hide();
		$(".popup").hide();

});

 $(function() {
            var availableTags = <?php include('autocomplete.php'); ?>;
            $("#movieTags").autocomplete({
                source: availableTags,
                autoFocus:true
            });
        });

function validate()
{
	var value0=document.getElementById("movieTags").value;
	var length=value0.match(/\w+/g).length;
	if(length<3)alert("Enter atleast 3 tags");
	$("#movieTags").innerHTML(" ");
}
function compulsory()
{
	var value=document.getElementById("movieTitle").value;
	var length=value.length;
	if(length<=1) alert("Enter a title");
}


</script>

