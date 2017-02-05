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
<link rel="stylesheet" type="text/css" href="asset/css/participant.css" />
<link rel="stylesheet" type="text/css" href="../font/gothic/stylesheet.css" />

<script src="asset/js/jquery-2.1.3.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script  type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/jquery.bootpag.min.js"></script>

</head>
<style>
.body{
	background-image: url("../../asset/image/grey-bg.jpg");

	}

</style>

<body>
<script>
	(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=363441500454559";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>
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


<div id="videopg" style="width:100%; height:100px; padding-top:30px;">
  
  <div style="width:450px;float:left; padding-top:20px;">
  <label for="sel1" style=" float:left; width:60px; padding-top:7px;">Sort by:</label>  
  <div class="sort-by">
 
<select id="sort-select" class="form-control" style="  background-color: #EAEAEA;" >
  <option value="name" <?php if($_GET['choice']=="3") echo selected;?>>Names</option>
  <option value="clap" <?php if($_GET['choice']=="1") echo selected;?>>Claps</option>
  <option  value="view" <?php if($_GET['choice']=="2") echo selected;?>>Views</option>
   
</select>
 </div>    </div>
 
 
 
     <div id="page-selection" align="right"></div>
    
 
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
    url: 'getCountprofile.php',
    //data: {'start': 0, 'size': '18'},
    dataType: 'html',
    success: function(data){
       // $('.contents').html(data);
        //setTimeout(function(){pagination();}, 4000);
        var res = $.parseJSON(data);

        pagination(res.count);
        getVideo(1);
    }
  });
});

function pagination(page){
  // var page = $('#page-count').val();
  console.log(page);
  var total_page = Math.ceil(page/15)
  console.log(total_page);
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
            //total: 6;
            console.log(num);
            getVideo(num);
             //$("#content").html()
           });
  }

function getVideo(numbr){
			 var choice=decodeURIComponent("<?php echo rawurlencode($_GET['choice']) ?>")
			 
		var num = parseInt(numbr);
        $.ajax({

          type: "POST",
          url: 'ajax/getprofile.php',
          dataType: 'html',
          data: {'start': (num-1)*15, 'size': 15,'choice':choice },
          success: function (data) {
            //console.log("start" +(num-1)*18);
            $('.contents').html('');
            $('.contents').html(data);           

          }
        });
        FB.XFBML.parse(); 
      }



$(".1my-video-offset").click(function(e) {
    $("#url_def").html($(this).attr('data-href'));
	$("#mov_id4clap").html($(this).attr('data-movid'));//data-movid
	//$(".popup").show();
});	

$("#sort-select").change(function(e) {
   // alert($( "#sort-select").val());
   var selectvalue=$( "#sort-select").val();
   var choice=0;
   if(selectvalue=="name"){
	   choice=3;
	   }else if(selectvalue=="clap"){
		  choice=1;
		  }else if(selectvalue=="view"){
			  choice=2;
		  }
		   
		   // $.ajax({
     //    type: 'get',
     //    url: 'participant.php',
     //    data: {'choice': choice},
     //    dataType: 'html',
     //    success: function(data){

     //    }
     //   });
   window.location.assign("participant.php?choice="+choice);
   // $('#sort-select').val(choice);


});
             </script>
</td> </tr></tbody></table>

</body>
</html>