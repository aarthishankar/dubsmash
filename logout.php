<?php 
session_start();
unset($_SESSION['u_id']);
unset($_SESSION['contID']);
unset($_SESSION['fb_id']);
unset($_SESSION['fb_name']);
unset($_SESSION['u_name']);
header("Location:video.php");
?>
