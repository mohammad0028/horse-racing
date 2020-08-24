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
<title>جستجوی جدول مسابقه</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/search_race_chart.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
<link rel="stylesheet" href="bootstrap/dist/css/main.css">
<link rel="stylesheet" href="bootstrap/dist/css/jspc-gray.css">
<link href="css/search_race_chart.css" rel="stylesheet" type="text/css">
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


<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

<div class="div1">

<span id="enter">مسابقه ی مورد نظر را برای ویرایش جستجو کنید...</span>

<hr>


<script>
	function getHorseInfo(){
		var date=document.getElementsByName('date');
		var course_num=document.getElementsByName('course_num');
		date=date[0];
		course_num=course_num[0];
		var request='date='+date.value+"&course_num="+course_num.options[course_num.selectedIndex].value+"&cache="+Math.random();
		var xhttp = new XMLHttpRequest();
		var json_result="";
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				$("#courses_list").html("");
				if(this.responseText){
					json_result= JSON.parse(this.responseText);
					console.log(json_result);	
					if(json_result){
						var rowNum=document.querySelectorAll('#courses_list tr').length;
						for(var i=0;i<json_result.length;i++){
						rowNum++;
						$("#courses_list").append("<tr><td style='color:white;'>"+rowNum+"</td>"
														+"<td style='color:black;'>"+json_result[i].date+"</td>"
														+"<td>"+json_result[i].course_num+"</td>"
														+"<td>"+json_result[i].start_time+"</td>"
														+"<td style='color:black;'>"+json_result[i].distance+"</td>"
														+"<td style='color:black;'>"+json_result[i].first_prize+"</td>"
														+"<td style='color:black;'>"+json_result[i].second_prize+"</td>"
														+"<td style='color:black;'>"+json_result[i].third_prize+"</td>"
														+"<td>"
														+"<a href='?delete="+json_result[i].id+"' class='horse1' title='حذف'>"
														+"<span class='glyphicon glyphicon-trash' id='glyph1'>"
														+"</span></a>"
														+"<a href='edit_race_chart.php?edit="+json_result[i].id+"' class='horse2' title='ویرایش'>"
														+"<span class='glyphicon glyphicon-edit' id='glyph1'>"
														+"</span></a>"
														+"</td>");
						}
					}
				}
			}
		  };
		  xhttp.open("GET", "getRace_list.php?"+request, true);
		  xhttp.send();
	
	}
</script>

    
<label for="pcal1"><span class="spans" style="margin-right:40px;">تاریخ :</span></label>
<input onchange="getHorseInfo();" onclick="getHorseInfo();" name="date" type="text" id="pcal1" class="pdate" placeholder="تاریخ مسابقه">

<script type="text/javascript">	
		var objCal1 = new AMIB.persianCalendar( 'pcal1' );
		 $(document).ready(function(){
                $("#x").change(function(){
					getHorseInfo();
                });
            });		
</script>


<label for="label5"><span class="spans" style="margin-right:128px;">شماره کورس :</span></label>
<select onchange="getHorseInfo();" name="course_num" class="select5">
<option value="" selected>همه ی کورس ها</option>
<option value="اول">اول</option>
<option value="دوم">دوم</option>
<option value="سوم">سوم</option>
<option value="چهارم">چهارم</option>
<option value="پنجم">پنجم</option>
</select>




</div>
<?php 
	$connection=mysqli_connect('localhost','root','','asbdavani');
	$delete_id=!empty($_GET['delete'])?$_GET['delete']:'';
	if(!empty($delete_id)){
		$query="delete from race_chart where id='$delete_id'";
		$result=mysqli_query($connection,$query);
		$query="delete from participant where race_chart_id='$delete_id'";
		mysqli_query($connection,$query);
		if($result){
			echo "مسابقه با موفقیت حذف شد";
		}			
	}
	
	
?>
<table class="table1">
	<thead>
    	<tr>
        	<th style="width:7%;">شماره</th>
            <th style="width:10%;">تاریخ</th>
            <th style="width:7%;">شماره کورس</th>
            <th style="width:15%;">زمان شروع</th>
            <th style="width:9%;">مسافت به متر</th>
            <th style="width:14%;">جایزه نفر اول (تومان)</th>
            <th style="width:14%;">جایزه نفر دوم (تومان)</th>
            <th style="width:14%;">جایزه نفر سوم (تومان)</th>
            <th class="header" style="color:rgba(237,241,61,1.00);width:15%;">حذف و ویرایش</th>
        </tr> 
    </thead>
	<tbody id="courses_list">
		
    </tbody>

</table>

 </form>




</body>
</html>
