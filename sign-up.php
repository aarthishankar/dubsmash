<?php 
session_start();
if(isset($_SESSION['u_id']))
  header("location: login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sign-Up</title>
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
<link rel="stylesheet" type="text/css" href="asset/css/signup.css" />
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
<br></br>
<br></br>
<br></br>
     <div class="container">
    
      <div class="col-xs-3 col-xs-offset-3">
        <center><font color="#606060"> <p><b>SIGN UP :</b></p></font></center>
        <form method="post" id="signupForm">
          <div class="alert alert-danger" style="display:none;" role="alert">         
          
          </div>

            <input type="text" name="fname" placeholder="User Name" required />
            <input type="email" id="e1" name="username" placeholder="Email" required/>
             <input type="tel" id="ph" name="phone" placeholder="Phone Number" required/>
            <input type="password" id="p1" name="password" placeholder="Password" required />
            <input type="password" id="p2" name="confirm_password" placeholder="Confirm Password" required />
            <input type="submit" value = "SignUp" />
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
      if($("#p1").val()==$("#p2").val())
      {
		
      $.post('signup.php', $('#signupForm').serialize(), function(data){
          var res = $.parseJSON(data);
		  console.log(res);

		  if(res.status){
            window.location="login.php";
          } else {
				$('.alert').show();
           		 $('.alert').text(res.result);
	            $('.alert').delay(2000).fadeOut('slow');  
			}
      }); 
    } else {
       		 $('.alert').show();
               $('.alert').text("password doesn't match");
              $('.alert').delay(2000).fadeOut('slow'); 
    }
  });

  
</script>

</body>
</html>
