<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
error_reporting(0);
session_start(0);

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>video</title>
<style type="text/css">
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
<link rel="stylesheet" type="text/css" href="asset/css/profile.css" />
<!--<script src="asset/js/jquery-2.1.3.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script  type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/jquery.bootpag.min.js"></script>

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
.body{
	background-image: url("../../asset/image/grey-bg.jpg");
}

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
.image-blur {
width: 220px;
height: 156px;
}	
.view-clap {
	margin-top: -1px;
height: 55px;
position: absolute;
bottom: 0px;

color:#000;
} 

</style>

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
<div class="main-body">
<?php include"header.php" ?>

<?php include"body-starts.php" ?>

<?php include "modal.php" ?>


<div id="videopg">
<ul class="nav nav-tabs ">
<center><p>Sort by :</p></center>
<?php $choice_value=$_GET['choice'];?>
<li role="presentation" id="pop"><a href="video.php?choice=1" style="<?php if($choice_value==1){?>background:#ddd; <?php }?>"><font color="grey">Most Views<span class="arrow">&#9660;</span></font></a></li>
<li role="presentation" id="added" ><a href="video.php?choice=2" style="<?php if($choice_value==2){?>background:#ddd; <?php }?>"><font color="grey">Recently Added<span class="arrow">&#9660;</span></font></a></li>
<li role="presentation" id="claps" ><a href="video.php?choice=3" style="<?php if($choice_value==3){?>background:#ddd; <?php }?>"><font color="grey">More Claps<span class="arrow">&#9660;</span></font></a></li>

<div id="content" ></div>

<div id="page-selection" align="right"></div>

</ul>

</div>
<div class="contents">
</div>

<?php include"body-ends.php" ?>

<?php include"footer.php" ?>

</div>
<script>
var sdk_load=0;  

$(document).ready(function(){
		$.ajax({
type: 'post',
url: 'getCount.php',
dataType: 'html',
success: function(data){
var res = $.parseJSON(data);
pagination(res.count);
getVideo(1);
}
});
		});

function pagination(page){
	var total_page = Math.ceil(page/12)
		$('#page-selection').bootpag({
total: total_page,
page: 1,
maxVisible: 5,
leaps: true,
firstLastUse: true,
first: '←',
last: '→',
wrapClass: 'pagination',
activeClass: 'active',
disabledClass: 'disabled',
nextClass: 'next',
prevClass: 'prev',
lastClass: 'last',

firstClass: 'first'
}).on("page", function(event,num){
	getVideo(num);
	});
}

function getVideo(numbr){
	var choice=decodeURIComponent("<?php echo rawurlencode($_GET['choice']) ?>")
		var num = parseInt(numbr);

	$.ajax({

type: "POST",
url: 'getvideo1.php',
dataType: 'html',
data: {'start': (num-1)*12, 'size': 12,'choice':choice },
success: function (data) {
$('.contents').html('');
$('.contents').html(data);           

}
});
FB.XFBML.parse();	

}



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

});


});



$("#facebook_clap").click(function(e) {

		var mov_idd=$("#mov_id4clap").html();
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
				if(response.verified){ 
				$.post("ajax/clap_dubsmash.php",
					{
movid:mov_idd,
clapperName:fb_user_name,
clapperID:fb_user_id,
via:'facebook'


},
function(data,status){
var res = $.parseJSON(data);
alert(res.result1);
$(".popup").hide();
$(".people_register_page1").hide();
});
}//response.verified


});//fb.api /me
}, {scope: 'publish_actions,email'});//fb.login

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

$("#share_video").click(function(e) {

		var id_prof=$('#mov_id4clap').html();

		FB.ui({
method: 'feed',
link: 'http://139.59.27.207/dubsmash/profile.php?contest='+id_prof,
caption: 'Littleshows Shortfilms',
picture:img
}, function(response){});

		});



});//window load finished

$(document).on('click', '#launchModal', function(){


		var url = $(this).attr('data-href');
		var via = $(this).attr('data-via');
		// $("#url_def").html($(this).attr('data-href'));
		$("#mov_id4clap").html($(this).attr('movie-id'));


		//alert($(this).attr('movie-id'));
		var mov_id = "http://139.59.27.207/dubsmash/share_video.php?mov_id=" + $(this).attr('movie-id');
		$('#myModal .modal-header #myModalLabel').html($(this).attr('movie-name'));
		$('#myModal .modal-header #myModalTag').html($(this).attr('movie-tags'));
		//alert($(this).attr('contest-name'));

		$('#myModal .modal-body #contestNameLink').attr('href','profile.php?contest='+$(this).attr('contest-id'));
		$('#myModal .modal-body #modal-contestName').html($(this).attr('contest-name'));
		$('#myModal .modal-body .fb-comments').attr('data-href', mov_id);
		if(via == "1"){
		$('#myModal .modal-body .fb-video').show();
		$('#myModal .modal-body .fb-video').attr('data-href', url);
		$('#myModal').modal('show');
		$('#myModal').on('hide.bs.modal', function(){			
				$('#myModal .modal-body .fb-video').hide();
				$('#myModal .modal-body .fb-video').attr('data-href', '');
				});
		$('#myModal .modal-body .embed-responsive').hide();
		$('#myModal .modal-body .videoUrl').attr('src', '');		
		} else if(via == "2"){
			$('#myModal .modal-body .embed-responsive').show();
			$('#myModal .modal-body .videoUrl').attr('src', url);
			$('#myModal').modal('show');
			$('#myModal').on('hide.bs.modal', function(){			
					$('#myModal .modal-body .embed-responsive').hide();
					$('#myModal .modal-body .videoUrl').attr('src', '');		
					});
			$('#myModal .modal-body .fb-modal').hide();
			$('#myModal .modal-body .fb-modal').attr('data-href', '');
		}


		$.post("particular_video.php",{ tags:$(this).attr('movie-tags')},
				function(data,status){
				$(".right_video_start").html(data);
				FB.XFBML.parse();
				});
		$.post("ajax/movie-view.php",{ mov_id:$(this).attr('movie-id'),},
				function(data,status){});
});


$(document).on('click', '#launchModal1', function(){
		var url = $(this).attr('data-href');
		var via = $(this).attr('data-via');
		$("#mov_id4clap").html($(this).attr('movie-id'));

		var mov_id = "http://139.59.27.207/dubsmash/share_video.php?mov_id=" + $(this).attr('movie-id');
		$('#myModal .modal-header #myModalLabel').html($(this).attr('movie-name'))
		$('#myModal .modal-header #myModalTag').html($(this).attr('movie-tags'));


		$('#myModal .modal-body #contestNameLink').attr('href','profile.php?contest='+$(this).attr('contest-id'));
		$('#myModal .modal-body #modal-contestName').html($(this).attr('contest-name'));
		$('#myModal .modal-body .fb-comments').attr('data-href', mov_id);
		if(via == "1"){
		$('#myModal .modal-body .fb-modal').show();
		$('#myModal .modal-body .fb-modal').attr('data-href', url);
		$('#myModal').modal('show');
		$('#myModal').on('hide.bs.modal', function(){			
			$('#myModal .modal-body .fb-modal').hide();
			$('#myModal .modal-body .fb-modal').attr('data-href', '');
			});
		$('#myModal .modal-body .embed-responsive').hide();
		$('#myModal .modal-body .videoUrl').attr('src', '');		
		} else if(via == "2"){
			$('#myModal .modal-body .embed-responsive').show();
			$('#myModal .modal-body .videoUrl').attr('src', url);
			$('#myModal').modal('show');
			$('#myModal').on('hide.bs.modal', function(){			
					$('#myModal .modal-body .embed-responsive').hide();
					$('#myModal .modal-body .videoUrl').attr('src', '');		
					});
			$('#myModal .modal-body .fb-modal').hide();
			$('#myModal .modal-body .fb-modal').attr('data-href', '');
		}

		$.post("particular_video.php",{ tags:$(this).attr('movie-tags')},
				function(data,status){
				$(".right_video_start").html(data);	
				FB.XFBML.parse();
				});

		$.post("ajax/movie-view.php",{ mov_id:$(this).attr('movie-id')},
				function(data,status){	});



});

</script>
</td> </tr></tbody></table>

</body>
</html>
