<?php
  include '../mysqlconnection_2.php';
$count =0;
$start = $_POST['start'];
$size = $_POST['size'];
 $contest_name="";
 
 $choice= $_POST['choice'];
//echo $choice;
switch ($choice) {
  case '1':
  
  $select_movie="select * from dubs_contestor order by overAllClap desc limit $start, $size";
 // echo json_encode($response);

    break;
  case '2':
  $select_movie="select * from dubs_contestor order by overAllView desc limit $start, $size";

  break;


  default:
   $select_movie="select * from dubs_contestor  limit $start, $size";

    break;
}

 
 
 
 
// $select_movie="select * from dubs_contestor  limit $start, $size";

    $result_select_movie=mysql_query($select_movie);

   while($row_select_movie=mysql_fetch_assoc($result_select_movie)){
   $contest_id=$row_select_movie['competitorID'];
   $overAllClap=$row_select_movie['overAllClap'];
   $contest_name=$row_select_movie['contest_name'];
   $joiningDate = $row_select_movie['joiningDate'];
   $overAllView = $row_select_movie['overAllView'];
   $littleid=$row_select_movie['littleID'];
?>
<a href="profile.php?contest=<?php echo $contest_id;?>">
 <div class=" profile-offset"  id="<?php echo $movie_id; ?>" style="  min-height:20px;">
 <img src="//www.littleshows.com/profile/<?php echo $littleid?>/001.png" class="profile-list-img"/>
 <!--profile-details-->
 <div class="profile-details">
 <div class="profile-det-name">&nbsp;<?php echo $contest_name;?></div>
 <div class="profile-det-join">Joined <?php  $date = strtotime($joiningDate); echo date('F jS ', $date);  ?></div>
 </div>
 <!--profile-details ends-->
 
  <!--clap-details-->
 <div class="clap-details">
 <span class="pull-left clap-view"><img src="asset/image/view_eye_black.png" width="13" /> &nbsp;<?php echo $overAllView; ?></span>
  <span class="pull-right clap-view"><img src="asset/image/clap_new_black.png" width="15" /><?php echo $overAllClap; ?></span>
 
 </div>
 <!--clap-details ends-->
 
 </div>
</a>
 

<?php

}
?>