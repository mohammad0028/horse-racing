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
<title>پیش بینی</title>
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
<link href="css/predict.css" rel="stylesheet" type="text/css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="div1">

<a href="firstpage.php"><input type="button" value="صفحه اصلی" class="mainpage"></a>

<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> 
    <span style="color:rgba(210,210,210,1.00);" class="caret"></span>&nbsp; <span style="color:rgba(210,210,210,1.00);font-size:20px;">جداول و نتایج</span>   </button>
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
        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> 
        <span style="color:rgba(210,210,210,1.00);" class="caret"></span>&nbsp; &nbsp; 
        <span style="color:rgba(210,210,210,1.00);font-size:25px;">گالری</span>   </button>
        <ul class="dropdown-menu">
          <li><a href="pic_gallery1.php" class="aszx"><span class="drop">گالری عکس</span></a></li>
          <li><a href="video_gallery1.php" class="aszx"><span class="drop">گالری فیلم</span></a></li>
        </ul>
    </div>

	

<a href="logout.php" style="text-decoration:none;"><button type="submit" class="exit"><span class="afds"> خروج</span>  <span class="glyphicon glyphicon-log-out"></span></button>
</a>

</div>

<div class="div2">
<?php
	$connection=mysqli_connect('localhost','root','','asbdavani');
	mysqli_set_charset($connection,'utf8');
	/*
		save predict:
	*/
	$user_id=$_SESSION['user_id'];
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$horses=!empty($_POST['horse'])?$_POST['horse']:'';
		if(is_array($horses)){
			foreach($horses as $race_chart_id=>$horse_id){
				$query="select * from predict where race_chart_id='$race_chart_id' and user_id='$user_id'";
				$result=mysqli_query($connection,$query);
				if(mysqli_num_rows($result)>0){
					$query="update predict set horse_id='$horse_id' where race_chart_id='$race_chart_id' and user_id='$user_id'";
				}else{
					$query="insert into predict set user_id='$user_id',horse_id='$horse_id',race_chart_id='$race_chart_id'";
				}
				mysqli_query($connection,$query);
			}
		}
	}
	/*
		show predict tables:
	*/
	$query="select participant.horse_id,participant.race_chart_id,horse_info.name,race_chart.days,race_chart.course_num,race_chart.distance,race_chart.start_time from race_chart inner join participant on race_chart.id=participant.race_chart_id inner join horse_info on participant.horse_id=horse_info.id where (participant.rank='') order by race_chart_id asc";
	$result=mysqli_query($connection,$query);
	if(mysqli_num_rows($result)>0):
		$allinfo=array();
		while($info=mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$race_info[$info['race_chart_id']][]=$info;	
		}
		//print_r($race_info);
		foreach($race_info as $infoes):
?>
<form method='post' action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>'>
<table class="table1">
  
  <thead>
    <tr>
      <th colspan="3" style="direction:ltr;">کورس <?php echo htmlentities($infoes[0]['course_num']); ?> :  <?php echo htmlentities($infoes[0]['days']); ?></th>
    </tr>
  </thead>
  
  <tbody>
      <tr>
      <td class="head1">پیش بینی کنید</td>
      <td class="head2">سابقه</td>
      <td class="head3">مقایسه</td>      
    </tr>
  	<?php
		// to show the checked radio buttons
		$race_chart_id=$infoes[0]['race_chart_id'];
		$query="select * from predict where race_chart_id='$race_chart_id' and user_id='$user_id'";
		$result=mysqli_query($connection,$query);
		$selected_horse_id=-1;
		if(mysqli_num_rows($result)>0){
			$selected_horse=mysqli_fetch_assoc($result);
			$selected_horse_id=$selected_horse['horse_id'];
		}
		foreach($infoes as $info):
		
	?>
    <tr>
      <td><input type="radio" value="<?php echo htmlentities($info['horse_id']); ?>" name="<?php echo htmlentities('horse['.$info['race_chart_id'].']'); ?>"<?php echo ($selected_horse_id==$info['horse_id'])?' checked ':''; ?>><span class="span1"><?php echo htmlentities($info['name']); ?></span></td>
      <td><a href="horsePieChart.php?id=<?php echo $info['horse_id']; ?>" target="_blank"><i class="fa fa-pie-chart" aria-hidden="true" title="سابقه"></i></a></td>
      <td><a href="horseSpiderChart.php?id=<?php echo $race_chart_id; ?>" target="_blank"><i class="fa fa-line-chart" aria-hidden="true" title="مقایسه"></i></a></td>
    </tr>
     <?php
	 	endforeach;
	 ?>
     <tr>
     	<td colspan=3 style="border:0px;">
        	<input type="submit" value="ثبت پیش بینی" class="sabt">
        </td>
     </tr>
  </tbody>
  
</table>
</form>

<?php
	endforeach;
endif;
	
?>

</div>

</body>
</html>
