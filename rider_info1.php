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
<title>اطلاعات چابکسوار ها</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/rider_info1.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
</head>

<body>

<div class="div1">

<a href="firstpage.php"><input type="button" value="صفحه اصلی" class="mainpage"></a>

<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color:rgba(210,210,210,1.00);" class="caret"></span> <span style="color:rgba(210,210,210,1.00);">جداول و نتایج
 </span>   </button>
    <ul class="dropdown-menu">
      <li><a href="race_chart1.php" class="aszx"><span class="drop">جدول مسابقات</span></a></li>
      <li><a href="race_result1.php" class="aszx"><span class="drop">نتایج مسابقات</span></a></li>
    </ul>
</div>

<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color:rgba(210,210,210,1.00);" class="caret"></span>&nbsp; &nbsp; <span style="color:rgba(210,210,210,1.00);font-size:25px;">گالری</span>   </button>
    <ul class="dropdown-menu">
      <li><a href="pic_gallery1.php" class="aszx"><span class="drop">گالری عکس</span></a></li>
      <li><a href="video_gallery1.php" class="aszx"><span class="drop">گالری فیلم</span></a></li>
    </ul>
</div>


<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color:rgba(210,210,210,1.00);" class="caret"></span>&nbsp; &nbsp; <span style="color:rgba(210,210,210,1.00);font-size:25px;">پیش بینی</span>   </button>
    <ul class="dropdown-menu">
      <li><a href="predict.php" class="aszx"><span class="drop">شرکت در نظرسنجی</span></a></li>
    </ul>
</div>


<a href="logout.php" style="text-decoration:none;"><button type="submit" class="exit"><span class="afds"> خروج</span>  <span class="glyphicon glyphicon-log-out"></span></button>
</a>

   
</div>

<div class="div2">
<div style="margin-right:70px;">
<a href="horse_info1.php"><input type="button" value="اسب ها" class="info12"></a>
<a href="coach_info1.php"><input type="button" value="مربی ها" class="info12"></a>
<a href="rider_info1.php"><input type="button" value="چابکسوار ها" class="info3"></a>
</div>
</div>

<hr>

<div>

<table class="table1">
	<thead>
		<tr>
			<th class="header" style="width:5%;">شماره</th>
			<th class="header" style="width:9%;">نام چابکسوار</th>
            <th class="header" style="width:9%;">مجموع مسابقات</th>
            <th class="header" style="width:7%;">تعداد مقام اول</th>
            <th class="header" style="width:7%;">تعداد مقام دوم</th>
            <th class="header" style="width:7%;">تعداد مقام سوم</th>
            <th class="header" style="width:2%;">امتیاز</th>
		</tr>
	</thead>
	<tbody class="table1-body">
		<?php
	   		$connection=mysqli_connect('localhost','root','','asbdavani');
			mysqli_set_charset($connection,'utf8');
			$query="select * from rider_info order by id asc";
			$result=mysqli_query($connection,$query);
			$rowNum=mysqli_num_rows($result);
			if($rowNum>0){
				for($i=1;$i<=$rowNum;$i++){
					$rider=mysqli_fetch_assoc($result);
					echo '
						<tr>
							<td>'.$i.'</td>
							<td>'.$rider['name'].'</td>
							<td>'.$rider['race_count'].'</td>
							<td>'.$rider['firstplace_count'].'</td>
							<td>'.$rider['secondplace_count'].'</td>
							<td>'.$rider['thirdplace_count'].'</td>
							<td>'.$rider['score'].'</td>
						</tr>
						
						';
									
				}			
			}
			
	   ?>
	</tbody>
</table>

</div>

<div style="height:200px;"></div>

</body>
</html>
