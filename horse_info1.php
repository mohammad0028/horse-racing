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
<title>اطلاعات اسب ها</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
<link href="css/horse_info1.css" rel="stylesheet" type="text/css">
</head>

<body>

<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/index-ajax.js"></script>
      


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
<a href="horse_info1.php"><input type="button" value="اسب ها" class="info1"></a>
<a href="coach_info1.php"><input type="button" value="مربی ها" class="info23"></a>
<a href="rider_info1.php"><input type="button" value="چابکسوار ها" class="info23"></a>
</div>
</div>

<hr>

<div>

<table class="table1">
	<thead>
		<tr>
			<th class="header">شماره</th>
			<th class="header" style="width:10%;">نام اسب</th>
            <th class="header" style="width:9%;">شماره کارت</th>
            <th class="header">جنسیت</th>
            <th class="header">سن</th>
            <th class="header" style="width:7%;">نژاد</th>
            <th class="header" style="width:7%;">سیلمی</th>
            <th class="header" style="width:7%;">مادیان</th>
            <th class="header" style="width:7%;">مالک</th>
            <th class="header" style="width:7%;">مربی</th>
            <th class="header" style="width:1%;">تعداد مسابقه</th>
            <th class="header">تعداد مقام اول</th>
            <th class="header">تعداد مقام دوم</th>
            <th class="header">تعداد مقام سوم</th>
            <th class="header">امتیاز</th>   	
		</tr>
	</thead>
	<tbody class="table1-body">
		<?php
	   		$connection=mysqli_connect('localhost','root','','asbdavani');
			mysqli_set_charset($connection,'utf8');
			$query="select horse_info.name,card_num,owner,father,mother,sibling,horse_info.race_count,horse_info.firstplace_count,horse_info.secondplace_count,horse_info.thirdplace_count,horse_info.score,age,gender,coach_info.id as coach_id,coach_info.name as coach_name from horse_info left outer join coach_info on horse_info.coach_id=coach_info.id order by horse_info.id ASC";
			$result=mysqli_query($connection,$query);
			$rowNum=mysqli_num_rows($result);
			if($rowNum>0){
				for($i=1;$i<=$rowNum;$i++){
					$horse=mysqli_fetch_assoc($result);
					echo '
						<tr>
							<td>'.$i.'</td>
							<td>'.$horse['name'].'</td>
							<td>'.$horse['card_num'].'</td>
							<td>'.$horse['gender'].'</td>
							<td>'.$horse['age'].'</td>
							<td>'.$horse['sibling'].'</td>
							<td>'.$horse['father'].'</td>
							<td>'.$horse['mother'].'</td>
							<td>'.$horse['owner'].'</td>
							<td>'.$horse['coach_name'].'</td>
							<td>'.$horse['race_count'].'</td>
							<td>'.$horse['firstplace_count'].'</td>
							<td>'.$horse['secondplace_count'].'</td>
							<td>'.$horse['thirdplace_count'].'</td>
							<td>'.$horse['score'].'</td>

						</tr>
						
						';
									
				}			
			}
			
	   ?>
	</tbody>
</table>

		<div class="scroll-top">
            <a class="btn btn-primary" href="#top" id="to-top">
                <i class="fa fa-chevron-up"></i>
            </a>
		</div>


</div>

<div style="height:200px;"></div>

</body>
</html>
