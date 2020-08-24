<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>نتیجه مسابقات</title>
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/race_result.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
</head>

<body>

<div class="div1">

<a href="mainpage.php"><input type="button" value="صفحه اصلی" class="mainpage"></a>

<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color:rgba(221,221,221,1.00);" class="caret"></span>&nbsp; <span style="font-size:20px;color:rgba(221,221,221,1.00);">سابقه و عملکرد</span>   </button>
    <ul class="dropdown-menu">
      <li><a href="horse_info.php" class="aszx"><span class="drop">اطلاعات اسب ها</span></a></li>
      <li><a href="coach_info.php" class="aszx"><span class="drop">اطلاعات مربی ها</span></a></li>
      <li><a href="rider_info.php" class="aszx"><span class="drop">اطلاعات چابکسوارها</span></a></li>

    </ul>
    
</div>

<div class="dropdown">
        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="color:rgba(210,210,210,1.00);" class="caret"></span>&nbsp; &nbsp; <span style="color:rgba(210,210,210,1.00);font-size:25px;">گالری</span>   </button>
        <ul class="dropdown-menu">
          <li><a href="pic_gallery.php" class="aszx"><span class="drop">گالری عکس</span></a></li>
          <li><a href="video_gallery.php" class="aszx"><span class="drop">گالری فیلم</span></a></li>
        </ul>
    </div>

</div>

<a href="race_chart.php"><input type="button" value="جدول مسابقات هفته جاری" class="chart"></a>

<a href="race_result.php"><input type="button" value="نتایج مسابقات هفته های گذشته" class="result"></a>

<div class="year">
 <span>
    <label for="year" style="color:rgba(239,238,64,1.00);margin-right:6px;">سال:</label>
    <select onClick="getHorseInfo()" name="year" id="year">
		<option value="">انتخاب کنید</option>    
        <option value="1395">1395</option>
        <option value="1396">1396</option>
    </select>
</span>
</div>

<div class="season">
 <span>
    <label for="season" style="color:rgba(239,238,64,1.00);margin-right:6px;">فصل:</label>
    <select onClick="getHorseInfo()" name="season" id="season">
    	<option value="">انتخاب کنید</option>
        <option value="بهار">بهار</option>
        <option value="تابستان">تابستان</option>
        <option value="پاییز">پاییز</option>
        <option value="زمستان">زمستان</option>
    </select>
</span>

</div>

<div class="week">
 <span>
    <label for="week" style="color:rgba(239,238,64,1.00);margin-right:4px;">هفته:</label>
    <select onClick="getHorseInfo()" name="week" id="week">
    	<option value="">انتخاب کنید</option>
        <option value="اول">اول</option>
        <option value="دوم">دوم</option>
        <option value="سوم">سوم</option>
        <option value="چهارم">چهارم</option>
        <option value="پنجم">پنجم</option>        
    </select>
</span>

</div>

<div class="course">
 <span>
    <label for="course_num" style="color:rgba(239,238,64,1.00);margin-right:6px;">شماره کورس:</label>
    <select onClick="getHorseInfo()" name="course_num" id="course_num">
    	<option value="">انتخاب کنید</option>
        <option value="اول">اول</option>
        <option value="دوم">دوم</option>
        <option value="سوم">سوم</option>
        <option value="چهارم">چهارم</option>
        <option value="پنجم">پنجم</option>
    </select>
</span>
</div>

<!-- <div class="div3">
<span>روز و تاریخ مسابقه :</span>
<span style="margin-right:110px;">زمان شروع : </span>
<span style="margin-right:110px;">مسافت : </span>
</div>

<div class="div4">
<span>جایزه مقام اول : </span>
<span style="margin-right:110px;">جایزه مقام دوم : </span>
<span style="margin-right:110px;">جایزه مقام سوم : </span>
</div>

<div> -->


<table class="table1">
	<thead>
    	<tr>
            <th style="width:7%;">شماره</th>
            <th style="width:10%;">تاریخ</th>
            <th style="width:7%;">شماره کورس</th>
            <th style="width:12%;">زمان شروع</th>
            <th style="width:9%;">مسافت به متر</th>
            <th style="width:5%;">مشاهده نتیجه</th>                
        </tr>

	</thead>
	<tbody id="race_list">
    	
    </tbody>
</table>

<script>
	function getHorseInfo(){
		var year=document.getElementById('year');
		var season=document.getElementById('season');
		var week=document.getElementById('week');
		var course_num=document.getElementById('course_num');		
		var request='year='+year.value+'&season='+season.value+'&week='+week.value+'&course_num='+course_num.value+"&cache="+Math.random();
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
														+"<a href='show_result.php?edit="+json_result[i].id+"' class='horse2' title='نمایش'>"
														+"<span class='glyphicon glyphicon-eye-open' id='glyph1'>"
														+"</span></a>"
														+"</td>");
						}
					}
				}
			}
		  };
		  xhttp.open("GET", "showRaceResult.php?"+request, true);
		  xhttp.send();
	
	}
	
</script>
<div style="width:100%;height:100px;"></div>
</body>
</html>
