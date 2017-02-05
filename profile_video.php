<div style="width:1000px; padding-left:25px; font-size:16px; color:#333; border-bottom:#999 1px solid;"><?php echo $contestor_name; ?> 's Video</div>

<div class="profile_contend" style="">
<?php
  $profileID=$id_prof;
	 $movie="select * from dubs_contestmovie where competitorID='$profileID'";
	 $result_movie=mysql_query($movie);
	 while($row_movie=mysql_fetch_assoc($result_movie)){
	 $movie_id=$row_movie['movieID'];
	 $select_movie="select * from dubs_movie_details where movieID='$movie_id'";
	  $result_select_movie=mysql_query($select_movie);
	 $row_select_movie=mysql_fetch_array($result_select_movie);
	 
	 $competitorID=$row_movie['competitorID'];
	 $select_competitor="select * from dubs_contestor where competitorID='$competitorID'";
	  $result_select_competitor=mysql_query($select_competitor);
	 $row_select_competitor=mysql_fetch_array($result_select_competitor);
	 
	   $contestname=$row_select_competitor['contest_name']; 
    $contestID=$row_select_competitor['competitorID']; 
	 
	 $movie_view=$row_select_movie['MovieViewer'];
	 $movie_clap=$row_select_movie['MovieClaps'];
	 
	 $mystring = $row_select_movie['MovieURL'];
	 $mymoviename=$row_select_movie['MovieName'];
	 $mymovietag=$row_select_movie['MovieTags'];
	$via = $row_select_movie['via'];
	
//	$mystring = $row_select_movie['MovieURL'];
	$pos = strpos($mystring, 'facebook');
	
	if($pos>0){
//		$urlfb='https://www.facebook.com/dubsmashtamil/videos/468225100003355';
		$urlfbarray = explode("videos/", $mystring);
		$fbVideoID=$urlfbarray[1];
		$fbVideoID = explode("/", $fbVideoID);
		$fbVideoID=$fbVideoID[0];
		$thumb_video="https://graph.facebook.com/$fbVideoID/picture";
	}else{
		
	//	$urlfb='youtube.com/watch?v=tG3Ie7Ejrho';
		$urlfbarray = explode("embed/", $mystring);
		$fbVideoID=$urlfbarray[1];
		$thumb_video="http://img.youtube.com/vi/$fbVideoID/0.jpg";
		
		}
	 ?>
      <!--<div class=" my-video-offset" data-href="<?php// echo $mystring ?>"  data-movid="<?php //echo $movie_id; ?>" style="">-->



      
       <div class=" my-video-offset"  id="<?php echo $movie_id; ?>" style="">
      <a href="#" id="launchModal" contest-name="<?php echo $contestname;?>" contest-id="<?php echo $contestID;?>" movie-name="<?php echo  $mymoviename; ?>" movie-tags="<?php echo  $mymovietag; ?>" data-via="<?php echo $via; ?>" data-href="<?php echo $mystring; ?>" movie-id="<?php echo $movie_id; ?>" style="width:100%; height:100%;">
            <?php
	   if($pos>-1){
	  ?>
     <div class="fb-video" data-href="<?php echo $mystring?>"  style="width:220px; height:126px; float:left;"></div>
      <?php
	   }else{
	  ?>
      <img  src="<?php echo $thumb_video?>" style="width:220px; height:126px; float:left; " /> 
      <?php
	   }
	  ?>

      
     <div class="image-blur"></div></a>
      <div class="view-clap">
      <span class="pull-left"><img src="asset/image/view_eye.png" style="width:20px;" /><span class="movie_view_c"><?php echo $movie_view; ?></span> views</span>
      
       <span class="pull-right"><img src="asset/image/clap_new.png" style="width:20px;" /><span class="movie_clap_c"><?php echo $movie_clap; ?></span> claps &nbsp; </span>
      
       </div>
<!--      <div class="share-myvideo text-center"> <img src="asset/image/connect-icon.png" style="width:25px;" /> Share</div>-->
     </div>
     
     
    
    <?php
	 }
	?>
</div>	   