
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
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
<link rel="stylesheet" type="text/css" href="asset/css/login.css" />

</head>

<body>


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
  


    <?php include"header.php" ?>
    
     <?php include"body-starts.php" ?>
     
    <div class="container">
    
      <div class="col-xs-3 col-xs-offset-3">
        
      

  <form method="post" id="loginForm">
    <center><h4>Forgot Password<h4></center> 
          <div class="alert alert-danger" style="display:none;" role="alert">         
          
          </div>

<input type='text' name='mail' placeholder="Enter your email id"/>
<input type='submit' name='submit' value='Submit'/>
</form>

<br>
    <?php
error_reporting(0);

if(isset($_POST['submit']))
{ 
  include 'mysqlconnection_2.php';
 $email = $_POST['mail'];


 $q=mysql_query("select * from little_register where u_mail='".$email."' ") or die(mysql_error());
 $p=mysql_num_rows($q);
 if($p>0) 
 {
  
  $res=mysql_fetch_array($q);
  $forgoter_name=$res['u_name'];
  $forgoter_pass=$res['u_password'];
  $to=$res['u_mail'];

  require_once('/var/www/html/class.phpmailer.php');
//require_once('asset/class.phpmailer.php');


$mail             = new PHPMailer();
$subject="Forgot password";
$body             = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Registration Confirmation</title>
</head>

<body style='width:100%; height:auto; background:#FFFFFF; padding:0; margin:0; position:relative; float:left;'>
<table align='center' cellpadding='0' cellspacing='1' border='0'>

<!------------------center----------------------->
<div style='width:980px; height:auto; min-height:auto; position:relative; float:left; margin:0; background:#CCC;'>
  <!-------------------header---------------------------->
  <tr><td bgcolor='#FF6E03'>
  <div style='width:980px; height:; position:relative; float:left; margin:0; background:#FF6E03;' >
  
      <div style='width:370px; height:203px; position:relative; float:left; margin-left:50px;  background:url(http://www.littleshows.com/logo_1.png)' ></div>
        <div style='width:400px; height:auto; min-height:auto; position:relative; float:right; color:#FFF; text-align:center;
        padding:50px; font-family:Arial Black, sans-serif; font-size:20px; font-weight:bold;'>WE RESPECT TALENT</div>
    </div>
  </td></tr>
  <!--------------header end--------------------------->
  <tr><td>
  
  <div style='width:700px; height:auto; min-height:20px; position:relative; float:left; padding-left:20px; padding-top:30px; color:#333; font-family:Arial, sans-serif; font-size:15px;'> Dear ".$forgoter_name.",<br><br>
  
    <p style='padding-left:40px'>Your littleshows password is ".$forgoter_pass." <a href='http://www.littleshows.com/dubsmash-competition/login.php'>click here</a> to login again.</p>
    <br><br>
    Thanks,<br> Team Littleshows
  </div>
  </td></tr>
   
    <!---------------footer---------------------------->
  <tr><td>
    <div style='width:980px; height:100px; position:relative; float:left; margin:0; background:#FF6E03;'>
      <div style='width:250px; height:100px; padding-left:20px; margin:0; position:relative; float:left;'>
          <div style='width:250px; height:auto; padding-top:9px; min-height:20px; position:relative; float:left; color:#000; font-family:Arial, sans-serif; font-weight:bold; font-size:22px;'>www.littleshows.com</div>
            <div style='width:250px; height:auto; padding-top:2px; min-height:20px; position:relative; float:left; color:#FFF;  font-family:Arial, sans-serif; font-size:14px;'>(C) copyright 2013 Registered (R)<br />www.littlebrander.com</div>
        </div>
        <div style='width:660px;  height:100px; padding-left:20px; margin:0; position:relative; float:left;'>
          <div style='width:600px; height:auto; padding-top:9px; min-height:20px; position:relative; float:left; color:#000; font-family:Arial, sans-serif; font-weight:bold; font-size:22px;'>Follows us On</div>
            
            <div style='width:190px; padding-left:25px; height:auto; padding-top:2px; padding-bottom:5px; min-height:10px; margin:0; position:relative; float:left; color:#FFF;  font-family:Arial, sans-serif; font-size:14px; margin-bottom:5px; background:url(http://www.littleshows.com/social/f.png) left top no-repeat;' >www.facebook.com/littleshows</div>
        
         <div style='width:190px; padding-left:25px; height:auto; padding-top:2px; padding-bottom:5px; min-height:10px; margin:0; position:relative; float:left; color:#FFF; font-family:Arial, sans-serif; font-size:14px; margin-bottom:5px; background:url(http://www.littleshows.com/social/p.png) left top no-repeat;' >www.pintrest.com/littleshows</div>
        
         <div style='width:190px; padding-left:25px; height:auto; padding-top:2px; padding-bottom:5px; min-height:10px; margin:0; position:relative; float:left; color:#FFF;  font-family:Arial, sans-serif; font-size:14px; margin-bottom:5px; background:url(http://www.littleshows.com/social/g.png) left top no-repeat;' >plus.google.com/+LittesShows</div>
        
         <div style='width:190px; padding-left:25px; height:auto; padding-top:2px; padding-bottom:5px; min-height:10px; margin:0; position:relative; float:left; color:#FFF;  font-family:Arial, sans-serif; font-size:14px; margin-bottom:5px; background:url(http://www.littleshows.com/social/t.png) left top no-repeat;' >www.twitter.com/littleshows</div>
        
         <div style='width:190px; padding-left:25px; height:auto; padding-top:2px; padding-bottom:5px; min-height:10px; margin:0; position:relative; float:left; color:#FFF; font-family:Arial, sans-serif; font-size:14px; margin-bottom:5px; background:url(http://www.littleshows.com/social/yt.png) left top no-repeat;' >www.youtube.com/thelittleshows</div>
        
        
        </div>
        
    </div>
  
  </td></tr>
    <!---------------footer end---------------------->
    
</div>
<!------------------center end------------------>
</table>
</body>
</html>

";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.mandrillapp.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "smtp.mandrillapp.com"; // sets the SMTP server
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "team@littleshows.com"; // SMTP account username
$mail->Password   = "UZocBgLQtBHo5wcSvgMuuw";        // SMTP account password

$mail->SetFrom('team@littleshows.com', 'LittleShows Team');

$mail->AddReplyTo("team@littleshows.com","LittleShows Team");

$mail->Subject    = $subject;

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test



$mail->MsgHTML($body);
$mail->AddAddress($to);


if(!$mail->Send()) {
 // echo "Mailer Error: " . $mail->ErrorInfo;
} else {
 // echo "Message sent!";
}

  








 echo "<p align='center'> Check Your Mail </p>";



 }
 else
 {
  echo "<p align='center'> You entered mail id is not present </p>";
 }
}

?>


      </div>

    </div>


     <?php include"body-ends.php" ?>
   
   
     <?php include"footer.php" ?>
   </div>
 
</td> </tr></tbody></table>




</body>
</html>


