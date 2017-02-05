<?php 
session_start();
if(isset($_SESSION['u_id']))
  header("location: profile.php");
?>
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
          <div class="alert alert-danger" style="display:none;" role="alert">         
          
          </div>

            <input type="text" name="username" placeholder="User Name" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" value = "Login" />
            <span>Or</span>
             <a href="sign-up.php">Sign Up</a>
        </form>

      </div>

    </div>

     <?php include"body-ends.php" ?>
   
   
     <?php include"footer.php" ?>
   </div>
 
</td> </tr></tbody></table>

<script type="text/javascript" src="asset/js/jquery.js"></script>
<script type="text/javascript" src="asset/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
  
  $(document).submit(function(event){
      event.preventDefault();
      $.post('check_login.php', $('#loginForm').serialize(), 
        function(data){
          var res = $.parseJSON(data);

		  if(res.status){
            window.location="profile.php";
          } else {
				$('.alert').show();
           		$('.alert').text(res.result);
	            $('.alert').delay(2000).fadeOut('slow');  
			}
      });
  });
</script>

</body>
</html>