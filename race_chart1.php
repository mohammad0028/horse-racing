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
<title>جدول مسابقات</title>
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/race_chart1.css" rel="stylesheet" type="text/css">
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

<a href="race_chart1.php"><input type="button" value="جدول مسابقات هفته جاری" class="chart"></a>

<a href="race_result1.php"><input type="button" value="نتایج مسابقات هفته های گذشته" class="result"></a>
<div class="div2">

<span class="span"> برای مشاهده ی مسابقات این هفته لطفا روز مورد نظر را انتخاب کنید :</span>

<div class="day">
 <span>
    <select id="day" onClick="getHorseInfo()" name="day" class="select">
		<option value="0">انتخاب کنید</option>    
        <option value="پنجشنبه">پنجشنبه</option>
        <option value="جمعه">جمعه</option>
    </select>
</span>
</div>

</div>

<table class="table1">
	<thead>
    	<tr>
        	<th class="header" style="width:1%;">شماره</th>
			<th class="header" style="width:7%;">تاریخ</th>
            <th class="header" style="width:6%;">شماره کورس</th>
            <th class="header" style="width:7%;">زمان شروع</th>
            <th class="header" style="width:5%;">مسافت به متر</th>
            <th class="header" style="width:5%;">مشاهده اطلاعات</th>
        </tr>

	</thead>
	<tbody id="race_list">
    	
    </tbody>
</table>

<script>
	function getHorseInfo(){
		var day=document.getElementById('day');
		var request='day='+day.options[day.selectedIndex].value+"&cache="+Math.random();
		var xhttp = new XMLHttpRequest();
		var json_result="";
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				$("#race_list").html("");
				if(this.responseText){
					json_result= JSON.parse(this.responseText);
					console.log(json_result);	
					if(json_result){
						var rowNum=document.querySelectorAll('#courses_list tr').length;
						for(var i=0;i<json_result.length;i++){
						rowNum++;
						$("#race_list").append("<tr><td style='color:white;'>"+rowNum+"</td>"
														+"<td>"+json_result[i].date+"</td>"
														+"<td>"+json_result[i].course_num+"</td>"
														+"<td>"+json_result[i].start_time+"</td>"
														+"<td>"+json_result[i].distance+"</td>"
														+"<td>"
														+"<a href='show_chart1.php?edit="+json_result[i].id+"' class='horse2' title='نمایش'>"
														+"<span class='glyphicon glyphicon-eye-open' id='glyph1'>"
														+"</span></a>"
														+"</td>");
						}
					}
				}
			}
		  };
		  xhttp.open("GET", "showRaceParticipants.php?"+request, true);
		  xhttp.send();
	
	}
</script>

</div>

</body>
</html>
