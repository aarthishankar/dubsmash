<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>video</title>
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
<link rel="stylesheet" type="text/css" href="asset/css/profile.css" />
<script src="asset/js/jquery-2.1.3.min.js"></script>
    <script src="asset/js/jquery.bootpag.min.js"></script>
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
  <div class="main-body">
    <?php include"header.php" ?>
    
     <?php include"body-starts.php" ?>
<div id="videopg">
     <ul class="nav nav-tabs ">
     <center><p>Sort by :</p></center>
  <li role="presentation" ><a href="#"><font color="grey">Date<span class="arrow">&#9660;</span></font></a></li>
  <li role="presentation" ><a href="#"><font color="grey">country<span class="arrow">&#9660;</span></font></a></li>
  <li role="presentation" ><a href="#"><font color="grey">Language<span class="arrow">&#9660;</span></font></a></li>

  <div id="content" ></div>
     <div id="page-selection" align="right"></div>
   
</ul>
 
</div>
     <div class="contents">
     </div>
    
     <?php include"body-ends.php" ?>
   
     <?php include"footer.php" ?>

   </div>
  <script>
        // init bootpag
        var yourVariable;
        var ajaxx=jQuery.ajax({
    type: "POST",
    url: 'getvideo.php',
    dataType: 'html',
    data: {'start': 0, 'size': 12 },
    success: function (data) {
            $('.contents').html(data);           

               }
});
        console.log(ajaxx);
      

  $('#page-selection').bootpag({
            total: 5,
    page: 1,
    maxVisible: 2,
    leaps: true,
    firstLastUse: true,
    first: '←',
    last: '→',
    wrapClass: 'pagination',
    activeClass: 'active',
    disabledClass: 'disabled',
    nextClass: 'next',
    prevClass: 'prev',
    lastClass: 'last',

    firstClass: 'first'
        }).on("page", function(event,num){
             jQuery.ajax({
    type: "POST",
    url: 'getvideo.php',
    dataType: 'html',
    data: {'start': 0, 'size': 12 },
    success: function (data) {
            $('.contents').html(data);           

               }
});
             $("#content").html()});
             </script>
</td> </tr></tbody></table>

</body>
</html>