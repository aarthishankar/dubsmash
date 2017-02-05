<?php



$get_owner="SELECT dubs_contestor.competitorID as competitorID,dubs_contestor.contest_name as contest_name FROM dubs_contestor INNER JOIN dubs_contestmovie ON dubs_contestor.competitorID=dubs_contestmovie.competitorID where dubs_contestmovie.movieID='$mov_ide'";
   //echo $get_owner;
   $result_owner=mysql_query($get_owner); 
   $row_owner=mysql_fetch_array($result_owner);
  
   $contestname= $row_owner['contest_name'];
   $contestID=$row_owner['competitorID'];
   

$movie_view=$row_select_movie['MovieViewer'];
$movie_clap=$row_select_movie['MovieClaps'];

$mystring = $row_select_movie['MovieURL'];
$mymoviename=$row_select_movie['MovieName'];
$mymovietag=$row_select_movie['MovieTags'];
$via = $row_select_movie['via'];

$pos = strpos($mystring, 'facebook');

if($pos>0){
//    $urlfb='https://www.facebook.com/dubsmashtamil/videos/468225100003355';
$urlfbarray = explode("videos/", $mystring);
$fbVideoID=$urlfbarray[1];
$fbVideoID = explode("/", $fbVideoID);
$fbVideoID=$fbVideoID[0];
$thumb_video="https://graph.facebook.com/$fbVideoID/picture";
}else{

//  $urlfb='youtube.com/watch?v=tG3Ie7Ejrho';
$urlfbarray = explode("embed/", $mystring);
$fbVideoID=$urlfbarray[1];
$thumb_video="http://img.youtube.com/vi/$fbVideoID/0.jpg";

}
?>


<div class="modal-body" style="  width: 450px; position:relative;">
<div id="mov_id4clap" style="display:none;"><?php echo $mov_ide; ?></div>
<div id="mov_name" style=" font-size:20px"><?php echo $mymoviename; ?></div>
  <div style="width:500px; float:left;">
      
      
     
      
      
         <div class="fb-video fb-modal" data-href=""  style="display:none; float:left;">
         </div>
         
         <?php
	   if($pos>-1){
	  ?>
     <div class="fb-video fb-particular" data-href="<?php echo $mystring?>"  style="width:480px; height:320px; float:left;"></div>
      <?php
	   }else{
	  ?>
    
      
       <div class="embed-responsive embed-responsive-16by9" style="display:block; position:relative;float:left;">
        <iframe class="embed-responsive-item  videoUrl" style="width:500px;height:320px;"  frameborder="0" allowfullscreen src="<?php echo $mystring?>"></iframe>
      </div>
      
      
      <?php
	   }
	  ?>
      
      
      <div class="fb-video fb-modal" data-href=""  style="display:none; float:left;">
         </div>
        <br /><br />
        
         <div class="pull-left" style="margin-top:15px;"> <div class="button">
         <a href="#"><img src="asset/image/clap.gif" id="clap_it"/></a>
        <a href="#"><img src="asset/image/share.gif" hspace="3px" id="share_video"/></a>
      </div></div>
      
      <a  href="profile.php?contest=<?php echo  $contestID; ?>">
      <div class="pull-right" style=" margin-top:15px;">
       Posted By <span id="modal-contestName"><?php echo  $contestname; ?></span>
       </div>
       </a>
      
        <div class="fb-comments" data-href="http://www.littleshows.com/dubsmash-competition/share_video.php?mov_id=<?php echo $mov_ide; ?>" data-numposts="5" data-colorscheme="light"></div>
        
        
        </div>
        
</div>


  
  
