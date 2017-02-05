<?php
  include 'mysqlconnection_2.php';
$count =0;
$result= "";
$response=array("result"=> $result);
$start = $_POST['start'];
$size = $_POST['size'];
$choice= $_POST['choice'];
//echo $choice;
switch ($choice) {
  case '1':
  
  $select_movie="select * from dubs_movie_details order by MovieViewer desc limit $start, $size";
 // echo json_encode($response);

    break;
  case '2':
  $select_movie="select * from dubs_movie_details order by movie_upload_date desc limit $start, $size";

  break;

  case '3':
  $select_movie="select * from dubs_movie_details order by MovieClaps desc limit $start, $size";
  break;

  default:
   $select_movie="select * from dubs_movie_details  limit $start, $size";

    break;
}


//$response["result"]=$select_movie; 

// $response = array("count"=>$count);
// $count_rows = "select count(*) from dubs_movie_details";
// $query = mysql_query($count_rows);
// $res_query = mysql_fetch_array($query);
// $count = $res_query[0];
// //echo "<input type='hidden' id='page-count' val=$pages />";
// $response["count"] = $count;
   

    $result_select_movie=mysql_query($select_movie);

   while($row_select_movie=mysql_fetch_assoc($result_select_movie)){
  $movie_id=$row_select_movie['movieID'];	   

 $take_video_owner="select d.competitorID,d.movieID, c.littleID,c.contest_name as contest_name  from dubs_contestmovie d inner join dubs_contestor c on d.competitorID=c.competitorID where d.movieID='$movie_id'";
 $result_take_video_owner=mysql_query($take_video_owner);
 $row_take_video_owner=mysql_fetch_array($result_take_video_owner);
  
  $littleID=$row_take_video_owner['littleID'];
   $contestname=$row_take_video_owner['contest_name']; 
    $contestID=$row_take_video_owner['competitorID']; 
 
   
   $movie_view=$row_select_movie['MovieViewer'];
   $movie_clap=$row_select_movie['MovieClaps'];
   $mystring = $row_select_movie['MovieURL'];
   $mymoviename=$row_select_movie['MovieName'];
    $mymovietag=$row_select_movie['MovieTags'];
   $via = $row_select_movie['via'];
  $movie_id=$row_select_movie['movieID'];
  $movieupload_date=$row_select_movie['movie_upload_date'];

  /*$popular="select * from dubs_movie_details order by MovieViewer";
  $recent="select * from dubs_movie_details order by MovieClaps";
  $clap="select * from dubs_movie_details order by movie_upload_date";*/

  
  $pos = strpos($mystring, 'facebook');
  
  if($pos>-1){
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

 <div class=" my-video-offset"  id="<?php echo $movie_id; ?>" style=" background:#000; height:190px;">
      <a href="#" id="launchModal" contest-name="<?php echo $contestname;?>" contest-id="<?php echo $contestID;?>" movie-name="<?php echo  $mymoviename; ?>" movie-tags="<?php echo  $mymovietag; ?>" data-via="<?php echo $via; ?>" data-href="<?php echo $mystring; ?>" movie-id="<?php echo $movie_id; ?>" style="width:100%; height:100%;">
      <?php
	   if($pos>-1){
	  ?>
     <div class="fb-video" data-href="<?php echo $mystring?>" data-width="500" style="width:220px; height:156px; float:left;"></div>
      <?php
	   }else{
	  ?>
      <img  src="<?php echo $thumb_video?>" style="width:220px; height:156px; float:left; " /> 
      <?php
	   }
	  ?>
     <div class="image-blur"></div></a>
      
      <div class="view-clap">
      <div style="width:100%; float:left; height:22px; background:#000; color:#fff;" >
      <span class="pull-left"><img src="asset/image/view_eye.png" style="width:20px;" /><span class="movie_view_c"><?php echo $movie_view; ?></span> views</span>
      
       <span class="pull-right"><img src="asset/image/clap_new.png" style="width:16px;" /><span class="movie_clap_c"><?php echo $movie_clap; ?></span> claps &nbsp; </span>
      </div>
      
      <a href="profile.php?contest=<?php echo $contestID; ?>">
      <div style="width:100%; float:left; background:rgba(255,255,255,0.8); height:33px; color:#C0C0C0; ">
      <span class="pull-left"><img src="//www.littleshows.com/profile/<?php echo $littleID?>/001.png" style="width:20px; height:20px; margin-left:5px; margin-top:5px; border-radius:50px;"/>
        <font style="padding:px;"><?php echo $contestname; ?></font></span>
      </div>
      </span>
       </div>
		</a>       
<!--      <div class="share-myvideo text-center"> <img src="asset/image/connect-icon.png" style="width:25px;" /> Share</div>-->
     </div>
<?php

}
?>