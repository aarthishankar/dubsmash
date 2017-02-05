<style>
.view-clap1 {
  margin-top: -1px;
  height: 22px;
  position: absolute;
  bottom: 0px;
  width: 100%;
  font-size: 10px;
  color: #FFF;
}

.image-blur1 {
  width: 220px;
  height: 126px;
  position: absolute;
  top: 0;
  left: 0;
  background: rgba(23,23,23,0.37);
  background: -moz-linear-gradient(top, rgba(23,23,23,0.37) 0%, rgba(8,8,8,0.61) 100%);
  background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(23,23,23,0.37)), color-stop(100%, rgba(8,8,8,0.61)));
  background: -webkit-linear-gradient(top, rgba(23,23,23,0.37) 0%, rgba(8,8,8,0.61) 100%);
  background: -o-linear-gradient(top, rgba(23,23,23,0.37) 0%, rgba(8,8,8,0.61) 100%);
  background: -ms-linear-gradient(top, rgba(23,23,23,0.37) 0%, rgba(8,8,8,0.61) 100%);
  background: linear-gradient(to bottom, rgba(23,23,23,0.37) 0%, rgba(8,8,8,0.61) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#171717', endColorstr='#080808', GradientType=0 );
}
</style>

<div style="width:100%">Related Video</div>
<?php
session_start();
 include 'mysqlconnection_2.php';
error_reporting(0);


$profileID=$_POST['tags'];

$profileID= str_replace(",", '|', $profileID);
//echo rand(1,155);

 // $profileID=$id_prof;
   //$movie="select * from dubs_contestmovie where competitorID='$profileID'";
   $movie="select * from dubs_movie_details where `MovieTags`  REGEXP '$profileID' ORDER BY RAND() limit 5 ";
 
  
   $result_movie=mysql_query($movie);
   
   while($row_movie=mysql_fetch_assoc($result_movie)){
   
   $movie_id=$row_movie['movieID'];
   $select_movie="select * from dubs_movie_details where movieID='$movie_id'";
  //$select_movie=" select * from dubs_movie_details where `MovieTags`  REGEXP 'comedia|action|chara' limit 5 ";
  
    $result_select_movie=mysql_query($select_movie);
   $row_select_movie=mysql_fetch_array($result_select_movie);
   
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
      <!--<div class=" my-video-offset" data-href="<?php// echo $mystring ?>"  data-movid="<?php //echo $movie_id; ?>" style="">-->
      
       <div class=" my-video-offset"  id="<?php echo $movie_id; ?>" style="">
      <a href="#" id="launchModal1" movie-name="<?php echo  $mymoviename; ?>" movie-tags="<?php echo  $mymovietag; ?>" data-via="<?php echo $via; ?>" data-href="<?php echo $mystring; ?>" movie-id="<?php echo $movie_id; ?>" style="width:100%; height:100%;">
      
       <?php
	   if($pos>-1){
	  ?>
     <div class="fb-video fb-particular" data-href="<?php echo $mystring?>"  style="width:220px; height:126px; float:left;"></div>
      <?php
	   }else{
	  ?>
      <img  src="<?php echo $thumb_video?>" style="width:220px; height:126px; float:left; " /> 
      <?php
	   }
	  ?>
     
     
      
      <div class="image-blur1"></div> 
   </a>
      <div class="view-clap1">
      <span class="pull-left"><img src="asset/image/view_eye.png" style="width:20px;" /><span class="movie_view_c"><?php echo $movie_view; ?></span> views</span>
      
       <span class="pull-right"><img src="asset/image/clap_new.png" style="width:20px;" /><span class="movie_clap_c"><?php echo $movie_clap; ?></span> claps &nbsp; </span>
      
       </div>
<!--      <div class="share-myvideo text-center"> <img src="asset/image/connect-icon.png" style="width:25px;" /> Share</div>-->
     </div>
    
    <?php
   }
   

// if related videos less than 5


if (mysql_num_rows($result_movie)) {
  $number_rows=mysql_num_rows($result_movie);
   }else{
	 $number_rows=0;  
	   }
$int_cal=intval(6)-intval($number_rows);
if(($int_cal)>0){
	
	 $movie="select * from dubs_movie_details  ORDER BY RAND() limit $int_cal ";
 
  
   $result_movie1=mysql_query($movie);
   
   while($row_movie=mysql_fetch_assoc($result_movie1)){
   
   $movie_id=$row_movie['movieID'];
   $select_movie="select * from dubs_movie_details where movieID='$movie_id'";
  //$select_movie=" select * from dubs_movie_details where `MovieTags`  REGEXP 'comedia|action|chara' limit 5 ";
  
    $result_select_movie=mysql_query($select_movie);
   $row_select_movie=mysql_fetch_array($result_select_movie);
   
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
      <!--<div class=" my-video-offset" data-href="<?php// echo $mystring ?>"  data-movid="<?php //echo $movie_id; ?>" style="">-->
      
       <div class=" my-video-offset"  id="<?php echo $movie_id; ?>" style="">
      <a href="#" id="launchModal1" movie-name="<?php echo  $mymoviename; ?>" movie-tags="<?php echo  $mymovietag; ?>" data-via="<?php echo $via; ?>" data-href="<?php echo $mystring; ?>" movie-id="<?php echo $movie_id; ?>" style="width:100%; height:100%;">
      
       <?php
	   if($pos>-1){
	  ?>
     <div class="fb-video fb-particular" data-href="<?php echo $mystring?>"  style="width:220px; height:126px; float:left;"></div>
      <?php
	   }else{
	  ?>
      <img  src="<?php echo $thumb_video?>" style="width:220px; height:126px; float:left; " /> 
      <?php
	   }
	  ?>
     
     
      
      <a href="share_video.php?mov_id=<?php echo $movie_id;?>"><div class="image-blur1"></div> </a>
   </a>
      <div class="view-clap1">
      <span class="pull-left"><img src="asset/image/view_eye.png" style="width:20px;" /><span class="movie_view_c"><?php echo $movie_view; ?></span> views</span>
      
       <span class="pull-right"><img src="asset/image/clap_new.png" style="width:20px;" /><span class="movie_clap_c"><?php echo $movie_clap; ?></span> claps &nbsp; </span>
      
       </div>
<!--      <div class="share-myvideo text-center"> <img src="asset/image/connect-icon.png" style="width:25px;" /> Share</div>-->
     </div>
    
    <?php
   }
	
	
	}
	

// if related videos less than 5 ends	
  ?>
