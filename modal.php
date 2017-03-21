<style>

</style>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



<!--popup-->

<div class="popup">
<div class="row">

<div class=" col-xs-4 people_register_page1">

<div class="popup_header">

<span class="text-info">Login in to Littleshows</span>
<input type="button" class="btn btn-danger pull-right" id="close_popup"  value="close"/> 
</div>

<form id="popup_form">
<div style="width:390px; min-height:210px; border:1px  dashed #666; text-align:center; padding:10px;  background:#555;">
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" />
<br />

<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  />
<br />
<div class="alert alert-danger" style="display:none;" role="alert"></div>

<input type="button" class="btn btn-info" id="popup_login" value=" LOGIN " />
<br />or<br />
<div class=" btn btn-primary " id="facebook_clap">FaceBook</div>
<br /><br />

</div>
</form> 
</div><!--people_register_page1-->

</div>
</div>

<!--popup-->
<div class="modal-dialog modal-lg">
<div class="modal-content" >
<div class="modal-header">
<span style="display:none;" id="mov_id4clap"></span><br />
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Title</h4>
<h4 class="modal-tags" id="myModalTag" >Tags</h4>
</div>
<div class="modal-body" style="display:inline-block;">

<!--left video starts-->
<div style="width:550px; float:left;">

<div class="embed-responsive embed-responsive-16by9" style="display:none; position:relative;float:left;">
<iframe class="embed-responsive-item  videoUrl" style="width:550px;height:500px;"  frameborder="0" allowfullscreen src=""></iframe>
</div>

<div class="fb-video fb-modal" data-href=""  style="display:none; float:left;">
</div>
<br /><br />

<div class="pull-left" style="margin-top:15px;"> <div class="button">
<a href="#"><img src="asset/image/clap.gif" id="clap_it"/></a>
<a href="#"><img src="asset/image/share.gif" hspace="3px" id="share_video"/></a>
</div></div>

<a id="contestNameLink" href="">
<div class="pull-right" style=" margin-top:15px;">
Posted By <span id="modal-contestName"></span>
</div>
</a>
<div class="fb-comments" data-href="" data-numposts="5" data-colorscheme="light"></div>


</div>
<!--left video ends-->


<!--right video starts-->
<div class="right_video_start" style="width:250px; float:left; margin-left:50px; display:inline-block;">

<?php

// include "particular_video.php?sample=$set&sample2=$set1";
//include "particular_video.php"; 

?>
</div>
<!--right video ends-->
<br />

</div>
</div>
</div>
</div>

