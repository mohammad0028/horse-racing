<?php 
	session_start();
	if($_SESSION['loggined']!='true'){
		header('location:vorood.php');
		exit('login at first');
	}elseif($_SESSION['user_type']<1){
		echo("<h1>Access Denied </h1>");	
		die("<h2>you dont have enough permission to access this page!</h2>");
	}
?>


<!doctype html>
<html>

<head>

<meta charset="utf-8">
<title>گالری تصاویر</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/pic_gallery1.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>

</head>


<body>

<div class="div1">

<a href="firstpage.php"><input type="button" value="صفحه اصلی" class="mainpage"></a>

<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color:rgba(221,221,221,1.00);" class="caret"></span> <span style="color:rgba(221,221,221,1.00);">جداول و نتایج
 </span>   </button>
    <ul class="dropdown-menu">
      <li><a href="race_chart1.php" class="aszx"><span class="drop">جدول مسابقات</span></a></li>
      <li><a href="race_result1.php" class="aszx"><span class="drop">نتایج مسابقات</span></a></li>
    </ul>
</div>

<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color:rgba(221,221,221,1.00);" class="caret"></span>&nbsp; <span style="font-size:20px;color:rgba(221,221,221,1.00);">سابقه و عملکرد</span>   </button>
    <ul class="dropdown-menu">
      <li><a href="horse_info1.php" class="aszx"><span class="drop">اطلاعات اسب ها</span></a></li>
      <li><a href="coach_info1.php" class="aszx"><span class="drop">اطلاعات مربی ها</span></a></li>
      <li><a href="rider_info1.php" class="aszx"><span class="drop">اطلاعات چابکسوارها</span></a></li>
    </ul>
</div>

<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color:rgba(221,221,221,1.00);" class="caret"></span>&nbsp; <span style="font-size:20px;color:rgba(221,221,221,1.00);">پیش بینی</span>   </button>
    <ul class="dropdown-menu">
      <li><a href="predict.php" class="aszx"><span class="drop">شرکت در نظرسنجی</span></a></li>
    </ul>
</div>

<a href="logout.php" style="text-decoration:none;"><button type="submit" class="exit"><span class="afds"> خروج</span>  <span class="glyphicon glyphicon-log-out"></span></button>
</a>
</div>

<div class="div2">
<a href="pic_gallery1.php"><input type="button" value="گالری تصاویر" class="picture"></a>
<a href="video_gallery1.php"><input type="button" value="گالری فیلم ها" class="film"></a>

</div>

<?php

	 
	$connection=mysqli_connect("localhost","root","","asbdavani");
	$query2="select * from images";
	$result2=mysqli_query($connection,$query2);
	$count=count($result2);
	
	if(mysqli_num_rows($result2)>0){
		
		while($info=mysqli_fetch_assoc($result2)){
			
			$id=$info['id'];
			$alladdress=$info['address'];
			$topic=$info['topic'];
			echo "
			
				<div class='col-md-4'>
      				<div class='thumbnail'>
       					<a href='$alladdress' target='_blank' class='link'>
          				<img src='$alladdress' alt='picture' style='width:100%' class='image'>
          				<div class='caption'>
           					<p class='topic1'>".htmlentities($topic)."</p>
          				</div>
        				</a>
      				</div>
					
					
			  </div>";
		}
	}
	
	
	?>
    
</body>


</html>