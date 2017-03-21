<?php
session_start();
include 'mysqlconnection_2.php';
error_reporting(0);
?>
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
$profileID=$_POST['tags'];
$profileID= str_replace(",", '|', $profileID);
$movie="select * from dubs_movie_details where `MovieTags`  REGEXP '$profileID' ORDER BY RAND() limit 5 ";
$result_movie=mysqli_query($con,$movie);
while($row_movie=mysqli_fetch_assoc($result_movie)){
	$movie_id=$row_movie['movieID'];
	$get_owner="SELECT dubs_contestor.competitorID as competitorID,dubs_contestor.contest_name as contest_name FROM dubs_contestor INNER JOIN dubs_contestmovie ON dubs_contestor.competitorID=dubs_contestmovie.competitorID where dubs_contestmovie.movieID='$movie_id'";
	$result_owner=mysqli_query($con,$get_owner); 
	$row_owner=mysqli_fetch_array($result_owner);
	$contestname= $row_owner['contest_name'];
	$contestID=$row_owner['competitorID'];
	$movie_view=$row_movie['MovieViewer'];
	$movie_clap=$row_movie['MovieClaps'];
	$mystring = $row_movie['MovieURL'];
	$mymoviename=$row_movie['MovieName'];
	$mymovietag=$row_movie['MovieTags'];
	$via = $row_movie['via'];
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
		<a href="#" id="launchModal1" contest-name="<?php echo $contestname;?>" contest-id="<?php echo $contestID;?>" movie-name="<?php echo  $mymoviename; ?>" movie-tags="<?php echo  $mymovietag; ?>" data-via="<?php echo $via; ?>" data-href="<?php echo $mystring; ?>" movie-id="<?php echo $movie_id; ?>" style="width:100%; height:100%;">

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

		<?php
}
if (mysqli_num_rows($result_movie)) {
	$number_rows=mysqli_num_rows($result_movie);
}else{
	$number_rows=0;  
}
$int_cal=intval(5)-intval($number_rows);
if(($int_cal)>0){

	$movie="select * from dubs_movie_details  ORDER BY RAND() limit $int_cal ";


	$result_movie1=mysqli_query($con,$movie);

	while($row_movie=mysqli_fetch_assoc($result_movie1)){

		$movie_id=$row_movie['movieID'];
		$select_movie="select * from dubs_movie_details where movieID='$movie_id'";
		$result_select_movie=mysqli_query($con,$select_movie);
		$row_select_movie=mysqli_fetch_array($result_select_movie);
		$get_owner="SELECT dubs_contestor.competitorID as competitorID,dubs_contestor.contest_name as contest_name FROM dubs_contestor INNER JOIN dubs_contestmovie ON dubs_contestor.competitorID=dubs_contestmovie.competitorID where dubs_contestmovie.movieID='$movie_id'";
		$result_owner=mysqli_query($con,$get_owner); 
		$row_owner=mysqli_fetch_array($result_owner);
		$contestname= $row_owner['contest_name'];
		$contestID=$row_owner['competitorID'];
		$movie_view=$row_movie['MovieViewer'];
		$movie_clap=$row_movie['MovieClaps'];

		$mystring = $row_movie['MovieURL'];
		$mymoviename=$row_movie['MovieName'];
		$mymovietag=$row_movie['MovieTags'];
		$via = $row_movie['via'];

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
			<a href="#" id="launchModal1"   contest-name="<?php echo $contestname;?>" contest-id="<?php echo $contestID;?>"  movie-name="<?php echo  $mymoviename; ?>" movie-tags="<?php echo  $mymovietag; ?>" data-via="<?php echo $via; ?>" data-href="<?php echo $mystring; ?>" movie-id="<?php echo $movie_id; ?>" style="width:100%; height:100%;">

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
			</div>

			<?php
	}


}


?>
