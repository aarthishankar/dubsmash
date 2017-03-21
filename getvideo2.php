<?php
include 'mysqlconnection_2.php';
$count =0;
$start = $_POST['start'];
$size = $_POST['size'];
$select_movie="select * from dubs_movie_details  limit $start, $size";
$result_select_movie=mysqli_query($con,$select_movie);
while($row_select_movie=mysqli_fetch_assoc($result_select_movie)){
	$movie_view=$row_select_movie['MovieViewer'];
	$movie_clap=$row_select_movie['MovieClaps'];
	$mystring = $row_select_movie['MovieURL'];
	$mymoviename=$row_select_movie['MovieName'];
	$via = $row_select_movie['via'];
	$movie_id=$row_select_movie['movieID'];
	$pos = strpos($mystring, 'facebook');
	if($pos>0){
		$urlfbarray = explode("videos/", $mystring);
		$fbVideoID=$urlfbarray[1];
		$fbVideoID = explode("/", $fbVideoID);
		$fbVideoID=$fbVideoID[0];
		$thumb_video="https://graph.facebook.com/$fbVideoID/picture";
	}else{
		$urlfbarray = explode("embed/", $mystring);
		$fbVideoID=$urlfbarray[1];
		$thumb_video="http://img.youtube.com/vi/$fbVideoID/0.jpg";
	}
	?>
		<div class=" my-video-offset"  id="<?php echo $movie_id; ?>" style="">
		<a href="#" id="launchModal" movie-name="<?php echo  $mymoviename; ?>" data-via="<?php echo $via; ?>" data-href="<?php echo $mystring; ?>" movie-id="<?php echo $movie_id; ?>" style="width:100%; height:100%;"><img  src="<?php echo $thumb_video?>" style="width:100%; height:126px;" />
		<div class="image-blur"></div></a>
		<div class="view-clap">
		<span class="pull-left"><img src="asset/image/view_eye.png" style="width:20px;" /><span class="movie_view_c"><?php echo $movie_view; ?></span> views</span>

		<span class="pull-right"><img src="asset/image/clap_new.png" style="width:20px;" /><span class="movie_clap_c"><?php echo $movie_clap; ?></span> claps &nbsp; </span>

		</div>
		</div>
		<?php
}
?>
