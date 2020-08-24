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
<title>ویرایش اطلاعات چابکسوار ها</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/edit_rider.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse">

  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
    
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span>&nbsp;<span class="nav-content" >جداول و نتایج</span></a>
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
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret" 
      style="color:rgba(215,240,27,1.00);"></span>&nbsp;<span class="nav-content" style="color:rgba(215,240,27,1.00);">ویرایش اطلاعات</span></a>
        <ul class="dropdown-menu" style="direction:rtl;">
          <li><a href="edit_horse.php" class="dropdown-a">ویرایش اطلاعات اسب ها</a></li>
          <li><a href="edit_coach.php" class="dropdown-a">ویرایش اطلاعات مربی ها</a></li>
          <li><a href="edit_rider.php" class="dropdown-a">ویرایش اطلاعات چابکسوار ها</a></li>
        </ul>
      </li>
     <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span>&nbsp;<span class="nav-content">پیش بینی</span></a>
        <ul class="dropdown-menu" style="direction:rtl;">
          <li><a href="#" class="dropdown-a">پیش بینی سامانه</a></li>
          <li><a href="#" class="dropdown-a">شرکت در نظرسنجی</a></li>
        </ul>
      </li>-->
      
    </ul>
    <a href="logout.php" style="text-decoration:none;"><button type="submit" class="exit"><span class="afds"> خروج</span>  <span class="glyphicon glyphicon-log-out"></span></button></a>
    
  </div>
</nav>

<div class="div1">
<span id="enter">اطلاعات چابکسوار ها را ویرایش کنید ...</span>
</div>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

<table class="table1">
	<thead>
		<tr>
			<th class="header" style="width:5%;">شماره</th>
			<th class="header" style="width:9%;">نام چابکسوار</th>
            <th class="header" style="width:7%;">مجموع مسابقات</th>
            <th class="header" style="width:7%;">تعداد مقام اول</th>
            <th class="header" style="width:7%;">تعداد مقام دوم</th>
            <th class="header" style="width:7%;">تعداد مقام سوم</th>
            <th class="header" style="width:2%;">امتیاز</th>
            <th class="header" style="width:6%;">حذف و ویرایش</th>
		</tr>
	</thead>
    
    <tbody id="rider" style="color:rgba(129,7,9,1.00);">
    	<?php		
			function post($x){
				if(!empty($_POST[$x])){
					return $_POST[$x];
					}
				}
			$connection=mysqli_connect("localhost","root","","asbdavani");
			mysqli_set_charset($connection,"utf8");
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				
				$rider_name=post("rider_name");
				$race_count=post("race_count");
				$first_place=post("first_place");
				$second_place=post("second_place");
				$third_place=post("third_place");
				$ids=post("ids");
				$score=post("score");
				
				$count=count($rider_name);	// this variable is for number of inserting and updating riders
				
				for($i=0;$i<$count;$i++){
					if($ids[$i]<0){
					$query1="insert into rider_info (name,race_count,firstplace_count,secondplace_count,thirdplace_count,score)
						 values ('$rider_name[$i]','$race_count[$i]','$first_place[$i]','$second_place[$i]','$third_place[$i]','$score[$i]')";
					echo 'inserted';
					}else{
					$query1="update rider_info set name='$rider_name[$i]',race_count='$race_count[$i]',firstplace_count='$first_place[$i]',secondplace_count='$second_place[$i]',thirdplace_count='$third_place[$i]',score='$score[$i]' where id='$ids[$i]' ";
					echo 'updated';
					}
					echo mysqli_error($connection);
					$result1=mysqli_query($connection,$query1);
					
				}
				
				//delete
				
				$delete=post('delete');
				if(isset($_POST['delete']) ){
					$delete=mysqli_real_escape_string($connection,$delete);
					$query="select * from rider_info where id='$delete'";
					$result=mysqli_query($connection,$query);
					if(mysqli_num_rows($result)>0){
					$query="delete from rider_info where id='$delete'";
					mysqli_query($connection,$query);
					echo "deleted";
					}
				}	
				
			}		
			
			$query="select * from rider_info order by id asc";
			$result=mysqli_query($connection,$query);
			$i=0;  // for row numbers of table
			if(mysqli_num_rows($result)>0){
				while($data=mysqli_fetch_assoc($result)){
					$i++;
					echo '
						<tr>
							<td>'.$i.'</td>
							<td><input style="background-color:transparent;" class="input1" type="text" name="rider_name[]" value="'.htmlentities($data['name']).'" disabled>
							</td>
							<td><input style="background-color:transparent;" class="input2" type="text" name="race_count[]" value="'.htmlentities($data['race_count']).'" disabled>
							</td>
							<td><input style="background-color:transparent;" class="input3" type="text" name="first_place[]" value="'.htmlentities($data['firstplace_count']).'" disabled>
							</td>
							<td><input style="background-color:transparent;" class="input4" type="text" name="second_place[]" value="'.htmlentities($data['secondplace_count']).'" disabled>
							</td>
							<td><input style="background-color:transparent;" class="input5" type="text" name="third_place[]" value="'.htmlentities($data['thirdplace_count']).'" disabled >
							</td>
							<td><input style="background-color:transparent;" class="input6" type="text" name="score[]" value="'.htmlentities($data['score']).'" disabled >
							</td>
							<td>
								<input type="hidden" name="ids[]" value="'.htmlentities($data['id']).'" disabled >
								<button name="delete" type="submit" class="horse1" title="حذف" value="'.htmlentities($data['id']).'" autofocus="false">
									<span class="glyphicon glyphicon-trash" id="glyph1"></span>
								</button>
								<button type="button" class="horse2" title="ویرایش">
									<span class="glyphicon glyphicon-edit" id="glyph1"></span>
								</button>
							</td>
						</tr>
					
					';
				}
			}
					
		?>	
    
    </tbody>
    
</table>

<button onclick="addRider()" type="button" class="horse" title="افزودن"><span class="glyphicon glyphicon-plus" id="glyph"></span></button>
 
<button type="submit" id="changeBtn" class="change" title="اعمال تغییرات"><span class="emal">اعمال تغییرات</span></button>
 
</form>

<script>
	function enableEdit(){
		var enable_buttons=document.getElementsByClassName('horse2');
		//console.log(enable_buttons);
		for(var i=0;i<enable_buttons.length;i++){
			enable_buttons[i].addEventListener('click',function(){
			if(this.parentNode.parentNode.querySelectorAll('input')){
				var inputs=this.parentNode.parentNode.querySelectorAll('input');
				for(var j=0;j<inputs.length;j++){
					inputs[j].style.backgroundColor="#FFF";
					inputs[j].removeAttribute('disabled');
					inputs[j].addEventListener('keydown',function(e){
						if(e.keyCode=="13"){
							document.getElementById("changeBtn").click();
							e.preventDefault();
							return false;
							
						}
					});
				}	
			}
		});
		}
	}

	enableEdit();

	function addRider(){
		var rowNum=document.querySelectorAll('#rider tr').length;
		rowNum++;
		$("#rider").append("<tr><td style='color:white;'>"+rowNum+"</td>"
											+"<td><input name='rider_name[]' class='input1' type='text'></td>"
											+"<td><input name='race_count[]' class='input2' type='text'></td>"
											+"<td><input name='first_place[]' class='input3' type='text'></td>"
											+"<td><input name='second_place[]' class='input4' type='text'></td>"
											+"<td><input name='third_place[]' class='input5' type='text'></td>"
											+"<td><input name='score[]' class='input6' type='text'></td>"
											+"<td>"
											+"<input type='hidden' name='ids[]' value='-1'>"
            								+"<button name='delete[]' type='button' class='horse1' title='حذف' disabled>"
											+"<span style='color:#999;' class='glyphicon glyphicon-trash' id='glyph1'>"
            								+"</span></button>"
            								+"<button name='edit[]' type='button' class='horse2' title='ویرایش'>"
											+"<span class='glyphicon glyphicon-edit' id='glyph1'>"
           									+"</span></button>"
           									+"</td>"
											+"</tr>");
		enableEdit();									
	}
</script>




</body>
</html>