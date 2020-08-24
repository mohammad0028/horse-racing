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
<title>نتیجه مسابقه</title>
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/show_result.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
</head>

<body>

<div class="div1">

<a href="firstpage.php"><input type="button" value="صفحه اصلی" class="mainpage"></a>

<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color:rgba(221,221,221,1.00);" class="caret"></span>&nbsp; <span style="font-size:20px;color:rgba(221,221,221,1.00);">سابقه و عملکرد</span>   </button>
    <ul class="dropdown-menu">
      <li><a href="horse_info1.php" class="aszx"><span class="drop">اطلاعات اسب ها</span></a></li>
      <li><a href="coach_info1.php" class="aszx"><span class="drop">اطلاعات مربی ها</span></a></li>
      <li><a href="rider_info1.php" class="aszx"><span class="drop">اطلاعات چابکسوارها</span></a></li>

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

<?php
	$race_chart_id=$_GET['edit'];
	$connection=mysqli_connect('localhost','root','','asbdavani');
	mysqli_set_charset($connection,"utf8");	
	
	if(!empty($race_chart_id)){
		$query="select * from race_chart where id='$race_chart_id'";
		$result=mysqli_query($connection,$query);
		$race_chart_info=mysqli_fetch_assoc($result);
				
	}

?>

<div class="div2">

<p>
<span class="span1">سال مسابقه :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['year']."'";}  ?>
 disabled> <br>
</p>

<p>
<span class="span1">فصل مسابقه :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['season']."'";}  ?>
disabled> <br>
</p>

<p>
<span class="span1">هفته :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['week']."'";}  ?>
disabled> <br>
</p>

<p>
<span class="span1">روز :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['days']."'";}  ?>
 disabled> <br>
</p>

<p>
<span class="span1">تاریخ :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['date']."'";}  ?>
disabled> <br>
</p>

<p>
<span class="span1">شماره کورس :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['course_num']."'";}  ?>
disabled> <br>
</p>

<p>
<span class="span1">مسافت :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['distance']."'";}  ?>
style="width:70px;" disabled><span class="toman">متر</span> <br>
</p>

<p>
<span class="span1">زمان شروع کورس :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['start_time']."'";}  ?>
disabled> <br>
</p>

<p>
<span class="span1">جایزه نفر اول :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['first_prize']."'";}  ?>
style="width:110px;" disabled><span class="toman">تومان</span> <br>
</p>

<p>
<span class="span1">جایزه نفر دوم :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['second_prize']."'";}  ?>
style="width:110px;" disabled><span class="toman">تومان</span> <br>
</p>

<p>
<span class="span1">جایزه نفر سوم :  </span>
<input class="input1" type="text" <?php if(!empty($race_chart_info)){echo "value='".$race_chart_info['third_prize']."'";}  ?>
style="width:110px;" disabled><span class="toman">تومان</span> <br>
</p>

</div>

<table class="table1">
	<thead>
    	<tr>
        	<th style="width:11%;">شماره جایگاه</th>
            <th style="width:15%;">نام اسب</th>
            <th style="width:15%;">مالک</th>
            <th style="width:15%;">مربی</th>
            <th style="width:15%;">چابکسوار</th>
            <th style="width:15%;">مقام</th>
            
        </tr> 
    </thead>
    
    <tbody id="horse_list">
    	
        <?php
			
			
			//this function is for access to horse name by its id
			function getHorses($id=-1){
				$connection=mysqli_connect('localhost','root','','asbdavani');
				mysqli_set_charset($connection,"utf8");
				$query="select * from horse_info where id='$id'";
				$result=mysqli_query($connection,$query);
				if(mysqli_num_rows($result)>0){
					while($info=mysqli_fetch_assoc($result)){
						$output="<input type='text' value='".$info['name']."'>";
					}
					return $output;
				}
			}
	
			//this function is for access to rider name by its id
			function getRiders($id=-1){
				$connection=mysqli_connect('localhost','root','','asbdavani');
				mysqli_set_charset($connection,"utf8");
				$query="select * from rider_info where id='$id'";
				$result=mysqli_query($connection,$query);
				if(mysqli_num_rows($result)>0){
					while($info=mysqli_fetch_assoc($result)){
						$output="<input type='text' value='".$info['name']."'>";	
					}
					return $output;
				}
				
			}
					
			function rankOption($numRows,$selectedRank){
					$rankOptions="";
					for($i=1;$i<=$numRows;$i++){
						$rankOptions.="<option value='".$i."'".($i==$selectedRank?' selected ':'').">".$i."</option>";
					}
					return $rankOptions;
				}
			
			
			$race_chart_id=$_GET['edit'];
			if(!empty($race_chart_id)){
				$query="select participant.id as participant_id,participant.race_chart_id,participant.horse_id,participant.rider_id,participant.rank,horse_info.owner,coach_info.name from participant inner join horse_info on participant.horse_id=horse_info.id inner join coach_info on horse_info.coach_id=coach_info.id where race_chart_id='$race_chart_id' ";
				$result=mysqli_query($connection,$query);
				$rowNum=1;
				if(mysqli_num_rows($result)>0){
					
					while($participant_info=mysqli_fetch_assoc($result)){
						echo "<tr><td style='color:white;'>".$rowNum++."</td>"
											."<td class='input5'>".getHorses($participant_info['horse_id'])."</td>"
											."<td class='input5'>".$participant_info['owner']."</td>"
											."<td class='input5'>".$participant_info['name']."</td>"
											."<td class='input5'>".getRiders($participant_info['rider_id'])."</td>"
											."<td class='rank'><small>".(empty($participant_info['rank'])?('مشخص نشده'):($participant_info['rank']))."</small></td>";
					}	
				}
			}

		?>

    
    </tbody>
</table>

<a href="race_result1.php" class="chart"><input type="button" class="mybtn" value="بازگشت"></a>

</body>
</html>