<?php 
	session_start();
	if($_SESSION['loggined']!='true'){
		header('location:vorood.php');
		exit('login at first');
	}elseif($_SESSION['user_type']<2){
		echo("<h1>Access Denied </h1>");	
		die("<h2>you dont have enough permission to access this page!</h2>");
	}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ویرایش جدول مسابقات</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/edit_race_chart.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
<link rel="stylesheet" href="bootstrap/dist/css/main.css">
<link rel="stylesheet" href="bootstrap/dist/css/jspc-gray.css">
<script type="text/javascript" src="bootstrap/dist/js/js-persian-cal.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse">

  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
    
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret" style="color:rgba(215,240,27,1.00);"></span>&nbsp;<span class="nav-content" style="color:rgba(215,240,27,1.00);">جداول و نتایج</span></a>
       <ul class="dropdown-menu" style="direction:rtl;">
          <li><a href="ad_mainpage.php" class="dropdown-a">درج جدول مسابقات</a></li>
          <li><a href="search_race_chart.php" class="dropdown-a">ویرایش نتایج مسابقات</a></li>
        </ul>
       </li> 
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span><span class="nav-content">گالری</span> </a>
        <ul class="dropdown-menu" style="direction:rtl;">
          <li><a href="edit_pic_gallery.php" class="dropdown-a">ویرایش گالری عکس</a></li>
          <li><a href="edit_video_gallery.php" class="dropdown-a">ویرایش گالری فیلم</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span>&nbsp;<span class="nav-content">ویرایش اطلاعات</span></a>
        <ul class="dropdown-menu" style="direction:rtl;">
          <li><a href="edit_horse.php" class="dropdown-a">ویرایش اطلاعات اسب ها</a></li>
          <li><a href="edit_coach.php" class="dropdown-a">ویرایش اطلاعات مربی ها</a></li>
          <li><a href="edit_rider.php" class="dropdown-a">ویرایش طلاعات چابک سوارها</a></li>
        </ul>
      </li>
      <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span>&nbsp;<span class="nav-content">پیش بینی</span></a>
        <ul class="dropdown-menu" style="direction:rtl;">
          <li><a href="#" class="dropdown-a">پیش بینی سامانه</a></li>
          <li><a href="#" class="dropdown-a">شرکت در نظرسنجی</a></li>
        </ul>
      </li>-->
      
    </ul>
    <a href="logout.php" style="text-decoration:none;"><button type="submit" class="exit"><span class="afds"> خروج</span>  <span class="glyphicon glyphicon-log-out"></span></button></a>
    
  </div>
</nav>
<?php 
	$connection=mysqli_connect('localhost','root','','asbdavani');
	mysqli_set_charset($connection,"utf8");	
	$race_chart_id=!empty($_GET['edit'])?$_GET['edit']:'';
	if(!empty($race_chart_id)){
		$race_chart_id=mysqli_real_escape_string($connection,$race_chart_id);
		$query="select * from race_chart where id='$race_chart_id'";
		$result=mysqli_query($connection,$query);
		$race_chart_info=mysqli_fetch_assoc($result);
		
	}
	
	$delete_participant_id=!empty($_GET['delete'])?$_GET['delete']:'';
	if(!empty($delete_participant_id)){
		$query="delete from participant where id='$delete_participant_id'";
		mysqli_query($connection,$query);
		include 'increaseRaceNum.php';
	}

?>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF'].'?edit='.$race_chart_id); ?>">

<div class="div1">
<span id="enter">جدول مسابقه این هفته را ویرایش کنید ... </span>

<hr>

<?php
	function post($name){
		if(!empty($_POST[$name])){
			return 	$_POST[$name];
		}
	}
		
		$msg="";
		$showModal=false;

	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$year=post('year');
		$season=post('season');
		$week=post('week');
		$days=post('days');
		$date=post('date');
		$course_num=post('course_num');
		$distance=post('distance');
		$start_time=post('start_time');
		$first_prize=post('first_prize');
		$second_prize=post('second_prize');
		$third_prize=post('third_prize');
		
		if(empty($date)){
			$msg="<span class='message'>* لطفا تاریخ برگزاری مسابقه را وارد نمایید ...<br></span>";
		}elseif(empty($distance)){
			$msg="<span class='message'>* لطفا مسافت را وارد نمایید ...<br></span>";
		}elseif(empty($start_time)){
			$msg="<span class='message'>* لطفا زمان شروع مسابقه را وارد نمایید ...<br></span>";
		}elseif(empty($first_prize)){
			$msg="<span class='message'>* لطفا جایزه نفر اول را وارد نمایید ...<br></span>";
		}elseif(empty($second_prize)){
			$msg="<span class='message'>* لطفا جایزه نفر دوم را وارد نمایید ...<br></span>";
		}elseif(empty($third_prize)){
			$msg="<span class='message'>* لطفا جایزه نفر سوم را وارد نمایید ...<br></span>";
		}else{
			$rank=post('rank');
			$connection=mysqli_connect('localhost','root','','asbdavani');
			mysqli_set_charset($connection,"utf8");
			$year=mysqli_real_escape_string($connection,$year);
			$season=mysqli_real_escape_string($connection,$season);
			$week=mysqli_real_escape_string($connection,$week);
			$days=mysqli_real_escape_string($connection,$days);
			$date=mysqli_real_escape_string($connection,$date);
			$course_num=mysqli_real_escape_string($connection,$course_num);
			$distance=mysqli_real_escape_string($connection,$distance);
			$start_time=mysqli_real_escape_string($connection,$start_time);
			$first_prize=mysqli_real_escape_string($connection,$first_prize);
			$second_prize=mysqli_real_escape_string($connection,$second_prize);
			$third_prize=mysqli_real_escape_string($connection,$third_prize);
			$query="update race_chart set year='$year',season='$season',week='$week',days='$days',date='$date',course_num='$course_num',distance='$distance',start_time='$start_time',first_prize='$first_prize',second_prize='$second_prize',third_prize='$third_prize' where id='$race_chart_id'";
			$result=mysqli_query($connection,$query);
			$horse_id=post('horse_id');
			$rider_id=post('rider_id');
			$query="delete from participant where race_chart_id='$race_chart_id'";
			mysqli_query($connection,$query);
			for($i=0;$i<count($horse_id);$i++){
				$rank[$i]=mysqli_real_escape_string($connection,$rank[$i]);
				$query="insert into participant (race_chart_id,horse_id,rider_id,rank) values ('$race_chart_id','$horse_id[$i]','$rider_id[$i]','$rank[$i]')";
				$result=mysqli_query($connection,$query);
			}
				$race_chart_id=mysqli_real_escape_string($connection,$race_chart_id);
				include 'calculateUserScore.php'; //calculate scores of users
				include 'calculateScores.php'; //calculate scores of horse & coaches & riders
				include 'increaseRaceNum.php'; //  increase number of race_count
				
				$query="select * from race_chart where id='$race_chart_id'";
				$result=mysqli_query($connection,$query);
				$race_chart_info=mysqli_fetch_assoc($result);		
				$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* اطلاعات با موفقیت ثبت شدند...<br></span>";
				
		}
		//include 'increaseRaceNum.php';
	    $showModal=true;
		
	}
	
	//this function is for access to horse name by its id
	function getHorses($id=-1){
		$connection=mysqli_connect('localhost','root','','asbdavani');
		mysqli_set_charset($connection,"utf8");
		$query="select * from horse_info";
		$result=mysqli_query($connection,$query);
		if(mysqli_num_rows($result)>0){
			$output="<select class='horseName' onClick='getHorseInfo(this);' name='horse_id[]' id=''>";
			while($info=mysqli_fetch_assoc($result)){
				$output.="<option value='".$info["id"]."'".($id==$info["id"]?' selected ':'').">".$info["name"]."</option>";	
			}
			$output.="</select>";
			return $output;
		}
	}
	
	//this function is for access to rider name by its id
	function getRiders($id=-1){
		$connection=mysqli_connect('localhost','root','','asbdavani');
		mysqli_set_charset($connection,"utf8");
		$query="select * from rider_info";
		$result=mysqli_query($connection,$query);
		if(mysqli_num_rows($result)>0){
			$output="<select class='horseName' name='rider_id[]' id=''>";
			while($info=mysqli_fetch_assoc($result)){
				$output.="<option value='".$info["id"]."'".($id==$info["id"]?' selected ':'').">".$info["name"]."</option>";	
			}
			$output.="</select>";
			return $output;
		}


	}
		


?>
<script>
	function getHorseInfo(e){
		var xhttp = new XMLHttpRequest();
		var json_result="";  
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			 json_result= JSON.parse(this.responseText);
			 e.parentNode.parentNode.querySelector("td:nth-child(3)").innerHTML=json_result.owner;
			 e.parentNode.parentNode.querySelector("td:nth-child(4)").innerHTML=json_result.coach_name;
			}
		  };
		  xhttp.open("GET", "getHorse_info.php?id="+e.options[e.selectedIndex].value+"&cache="+Math.random(), true);
		  xhttp.send();
	}
</script>



<label for="label1"><span class="spans" style="margin-right:40px;">سال مسابقه :</span></label>
<select name="year" class="select1">
<option value="1395" <?php echo !empty($race_chart_info['year']=='1395')?' selected ':""; ?>>1395</option>
<option value="1396" <?php echo !empty($race_chart_info['year']=='1396')?' selected ':""; ?>>1396</option>
</select>


<label for="label2"><span class="spans" style="margin-right:150px;">فصل مسابقه :</span></label>
<select name="season" class="select2">
<option value="بهار"<?php echo !empty($race_chart_info['season']=='بهار') ? ' selected ' : ''; ?>>بهار</option>
<option value="تابستان"<?php echo !empty($race_chart_info['season']=='تابستان') ? ' selected ' : ''; ?>>تابستان</option>
<option value="زمستان"<?php echo !empty($race_chart_info['season']=='زمستان') ? ' selected ' : ''; ?>>زمستان</option>
<option value="پاییز"<?php echo !empty($race_chart_info['season']=='پاییز') ? ' selected ' : ''; ?>>پاییز</option>

</select>

<label for="label3"><span class="spans" style="margin-right:145px;">هفته :</span></label>
<select name="week" class="select3">
<option value="اول"<?php echo !empty($race_chart_info['week']=='اول') ? ' selected ' : ''; ?>>اول</option>
<option value="دوم"<?php echo !empty($race_chart_info['week']=='دوم') ? ' selected ' : ''; ?>>دوم</option>
<option value="سوم"<?php echo !empty($race_chart_info['week']=='سوم') ? ' selected ' : ''; ?>>سوم</option>
<option value="چهارم"<?php echo !empty($race_chart_info['week']=='چهارم') ? ' selected ' : ''; ?>>چهارم</option>
<option value="پنجم"<?php echo !empty($race_chart_info['week']=='پنجم') ? ' selected ' : ''; ?>>پنجم</option>
</select>

<label for="label4"><span class="spans" style="margin-right:180px;">روز :</span></label>
<select name="days" class="select4">
<option value="پنجشنبه" <?php echo !empty($race_chart_info['days']=='پنجشنبه') ? ' selected ' : ''; ?>>پنجشنبه</option>
<option value="جمعه" <?php echo !empty($race_chart_info['days']=='جمعه') ? ' selected ' : ''; ?>>جمعه</option>
</select>

<br>

    
<label for="pcal1"><span class="spans" style="margin-right:40px;">تاریخ :</span></label>
<input name="date" type="text" id="pcal1" class="pdate" <?php echo !empty($race_chart_info['date']) ? ' value="'.$race_chart_info['date'].'" ' : ''; ?>>

<script type="text/javascript">
	
		var objCal1 = new AMIB.persianCalendar( 'pcal1' );

</script>


<label for="label5"><span class="spans" style="margin-right:128px;">شماره کورس :</span></label>
<select name="course_num" class="select5">
<option value="اول" <?php echo !empty($race_chart_info['course_num']=='اول') ? ' selected ' : ''; ?>>اول</option>
<option value="دوم" <?php echo !empty($race_chart_info['course_num']=='دوم') ? ' selected ' : ''; ?>>دوم</option>
<option value="سوم" <?php echo !empty($race_chart_info['course_num']=='سوم') ? ' selected ' : ''; ?>>سوم</option>
<option value="چهارم" <?php echo !empty($race_chart_info['course_num']=='چهارم') ? ' selected ' : ''; ?>>چهارم</option>
<option value="پنجم" <?php echo !empty($race_chart_info['course_num']=='پنجم') ? ' selected ' : ''; ?>>پنجم</option>
</select>


<script>
     function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
</script>

<label for="label7"><span class="spans" style="margin-right:140px;">مسافت :</span></label>
<input name="distance" type="text" class="input2" id="label7" onkeypress="return isNumberKey(event);"
<?php echo !empty($race_chart_info['distance']) ? ' value="'.$race_chart_info['distance'].'" ' : ''; ?>>
<span class="spans">  متر</span>



<label for="label6"><span class="spans" style="margin-right:70px;">زمان شروع کورس :</span></label>
<input name="start_time" type="time" class="input1" id="label6"
<?php echo !empty($race_chart_info['start_time']) ? ' value="'.$race_chart_info['start_time'].'" ' : ''; ?>>  <br>


<label for="label7"><span class="spans" style="margin-right:70px;">جایزه نفر اول :</span></label>
<input name="first_prize" type="text" class="input3" id="label7" onkeypress="return isNumberKey(event);"
<?php echo !empty($race_chart_info['first_prize']) ? ' value="'.$race_chart_info['first_prize'].'" ' : ''; ?>>
<span class="spans">  تومان</span>


<label for="label7"><span class="spans" style="margin-right:160px;">جایزه نفر دوم :</span></label>
<input name="second_prize" type="text" class="input3" id="label7" onkeypress="return isNumberKey(event);"
<?php echo !empty($race_chart_info['second_prize']) ? ' value="'.$race_chart_info['second_prize'].'" ' : ''; ?>>
<span class="spans">  تومان</span>

<label for="label7"><span class="spans" style="margin-right:160px;">جایزه نفر سوم:</span></label>
<input name="third_prize" type="text" class="input3" id="label7" onkeypress="return isNumberKey(event);"
<?php echo !empty($race_chart_info['third_prize']) ? ' value="'.$race_chart_info['third_prize'].'" ' : ''; ?>>
<span class="spans">  تومان</span>

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
            <th class="header" style="color:rgba(237,241,61,1.00);width:7%;">حذف و ویرایش</th>
        </tr> 
    </thead>
	<tbody id="horses_list">
		<?php	
			if(!empty($race_chart_id)){
				$query="select participant.id as participant_id,participant.horse_id,participant.rider_id,participant.rank,horse_info.owner,coach_info.name from participant inner join horse_info on participant.horse_id=horse_info.id inner join coach_info on horse_info.coach_id=coach_info.id where race_chart_id='$race_chart_id'";
				$result=mysqli_query($connection,$query);
				$rowNum=1;
				function rankOption($numRows,$selectedRank){
					$rankOptions="";
					for($i=1;$i<=$numRows;$i++){
						$rankOptions.="<option value='".$i."'".($i==$selectedRank?' selected ':'').">".$i."</option>";
					}
					return $rankOptions;
				}
				$numRows=mysqli_num_rows($result);
				if(mysqli_num_rows($result)>0){
					while($participant_info=mysqli_fetch_assoc($result)){
						echo "<tr><td style='color:white;'>".$rowNum++."</td>"
											."<td style='color:black;'>".getHorses($participant_info['horse_id'])."</td>"
											."<td>".$participant_info['owner']."</td>"
											."<td>".$participant_info['name']."</td>"
											."<td style='color:black;'>".getRiders($participant_info['rider_id'])."</td>"
											."<td><select class='rank' name='rank[]'><option value=''>تعیین نشده</option>".rankOption($numRows,$participant_info['rank'])."</select></td>"
											."<td>"
            								."<a href='?delete=".$participant_info['participant_id'].'&edit='.$race_chart_id."' class='horse1' title='حذف' style='margin-right:25px;'>"
											."<span style='font-size:23px;' class='glyphicon glyphicon-trash' id='glyph1'>"
            								."</span></a>"
											."</td>";
					}	
				}
			}
		?>
    </tbody>

</table>

<script>
	function addHorsers_list(){
		var rowNum=document.querySelectorAll('#horses_list tr').length;
		rowNum++;
		$("#horses_list").append("<tr><td style='color:white;'>"+rowNum+"</td>"
											+"<td style='color:black;'><?php echo getHorses(); ?></td>"
											+"<td></td>"
											+"<td></td>"
											+"<td style='color:black;'><?php echo getRiders(); ?></td>"
											+"<td><select class='rank' name='rank[]'><option value=''>تعیین نشده</option><?php echo rankOption($numRows,''); ?></select></td>"
											+"<td>"
            								+"<button type='button' style='margin-right:25px;' class='horse1' title='حذف' disabled>"
											+"<span style='color:rgba(224,224,224,1.00);font-size:23px;' class='glyphicon glyphicon-trash' id='glyph1'>"
            								+"</span></button>"
           									+"</td>");
	}
</script>

<button onclick="addHorsers_list()" type="button" class="horse" title="افزودن"><span class="glyphicon glyphicon-plus" id="glyph"></span></button>
	
<button type="submit" class="change" title="اعمال تغییرات"><span class="emal">اعمال تغییرات</span></button>
  
 </form>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body" style="direction:rtl;">
          <p><?php echo $msg; ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >
          <span style="margin:5px;color:rgba(154,154,154,1.00);font-family:'adobe arabic';font-size:21px;">بستن</span></button>
        </div>
      </div>
      
    </div>
    </div>

<?php if($showModal){echo "<script>$('#myModal').modal('show')</script>";} ?>



</body>
</html>
