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
<title>ویرایش اطلاعات اسب ها</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/edit_horse.css" rel="stylesheet" type="text/css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
</head>

<body>

<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/index-ajax.js"></script>


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

<div class="div1">
<span id="enter">اطلاعات اسب ها را ویرایش کنید ...</span>
</div>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

<table class="table1">
	<thead>
		<tr>
			<th class="header" style="width:2%;">شماره</th>
			<th class="header" style="width:10%;">نام اسب</th>
            <th class="header" style="width:7%;">شماره کارت</th>
            <th class="header" style="width:4%;">جنسیت</th>
            <th class="header" style="width:1%;">سن</th>
            <th class="header" style="width:6%;">نژاد</th>
            <th class="header" style="width:7%;">سیلمی</th>
            <th class="header" style="width:7%;">مادیان</th>
            <th class="header" style="width:7%;">مالک</th>
            <th class="header" style="width:8%;">مربی</th>
            <th class="header" style="width:1%;">تعداد مسابقه</th>
            <th class="header" style="width:1%;">تعداد مقام اول</th>
            <th class="header" style="width:1%;">تعداد مقام دوم</th>
            <th class="header" style="width:1%;">تعداد مقام سوم</th>
            <th class="header" style="width:1%;">امتیاز</th> 
            <th class="header" style="color:rgba(237,241,61,1.00);width:6%;">حذف و ویرایش</th>  	
		</tr>
	</thead>
    
	<tbody id="horse_list" style="color:rgba(129,7,9,1.00);">
		
        <?php		
			function post($x){
				if(!empty($_POST[$x])){
					return $_POST[$x];
					}
				}
			$connection=mysqli_connect("localhost","root","","asbdavani");
			mysqli_set_charset($connection,"utf8");	
			if($_SERVER['REQUEST_METHOD']=="GET"){
				$delete_id=!empty($_GET['delete'])?$_GET['delete']:'';
				if(!empty($delete_id)){
					$delete_id=mysqli_real_escape_string($connection,$delete_id);
					$query="delete from horse_info where id=$delete_id";	
					mysqli_query($connection,$query);
				}	
			}
			
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$horse_name=post("horse_name");
				$card_num=post("card_num");
				$owner=post("owner");
				$coach=post("coach");
				$gender=post("gender");
				$age=post("age");
				$father=post("father");
				$mother=post("mother");
				$sibling=post("sibling");
				$race_count=post("race_count");
				$firstplace_count=post("firstplace");
				$secondplace_count=post("secondplace");
				$thirdplace_count=post("thirdplace");
				$ids=post("ids");
				$score=post("score");
				
				$count=count($horse_name);	
				
				for($i=0;$i<$count;$i++){
					if($ids[$i]<0){
					$query1="insert into horse_info (name,card_num,owner,coach_id,gender,age,father,mother,sibling,race_count,firstplace_count,secondplace_count,thirdplace_count,score) values ('$horse_name[$i]','$card_num[$i]','$owner[$i]','$coach[$i]','$gender[$i]','$age[$i]','$father[$i]','$mother[$i]','$sibling[$i]','$race_count[$i]','$firstplace_count[$i]','$secondplace_count[$i]','$thirdplace_count[$i]','$score[$i]')";
					echo 'inserted';
					}else{
					$query1="update horse_info set name='$horse_name[$i]',card_num='$card_num[$i]',owner='$owner[$i]',coach_id='$coach[$i]',gender='$gender[$i]',age='$age[$i]',father='$father[$i]',mother='$mother[$i]',sibling='$sibling[$i]',race_count='$race_count[$i]',firstplace_count='$firstplace_count[$i]',secondplace_count='$secondplace_count[$i]',thirdplace_count='$thirdplace_count[$i]',score='$score[$i]' where id=$ids[$i] ";
					
					echo 'updated';
					}
					echo mysqli_error($connection);
					$result1=mysqli_query($connection,$query1);
					
				}
			}
			function selectOption($id=-1){
				global $connection;
				$query="select * from coach_info";
				$result=mysqli_query($connection,$query);
				$selectOption="";//select option
				if(mysqli_num_rows($result)){
					while($coach=mysqli_fetch_assoc($result)){
						$selectOption.="<option value=".$coach['id'].($id==$coach['id']?" selected ":"").">".$coach['name']."</option>";
					} 
				}
				return $selectOption;				
			}
			
			function gender($selected=-1,$dataArray=null){
				$selectOption=null;
				if(is_array($dataArray)){
					foreach($dataArray as $value){
						$selectOption.="<option value=".$value.($selected==$value?" selected ":"").">".$value."</option>";						
					}	
				}
				return $selectOption;
			}
			
			 
			$query="select horse_info.id,horse_info.name,card_num,owner,father,mother,sibling,horse_info.race_count,horse_info.firstplace_count,horse_info.secondplace_count,horse_info.thirdplace_count,horse_info.score,age,gender,coach_info.id as coach_id,coach_info.name as coach_name from horse_info left outer join coach_info on horse_info.coach_id=coach_info.id order by horse_info.id ASC";
			$result=mysqli_query($connection,$query);
			$i=0;  // table row number
			if(mysqli_num_rows($result)>0){
				while($data=mysqli_fetch_assoc($result)){
					$i++;  // table row number
					echo '
						<tr>
							<td>'.$i.'</td>
							<td><input style="background-color:transparent;" class="input1" type="text" name="horse_name[]" value="'.htmlentities($data['name']).'" disabled>
							</td>
							<td><input style="background-color:transparent;" class="input2" type="text" name="card_num[]" value="'.htmlentities($data['card_num']).'" disabled>
							</td>
							<td><select style="background-color:transparent;" class="input3" type="text" name="gender[]" disabled>'.gender($data['gender'],array('نر','ماده')).'</select>
							</td>
							<td><select style="background-color:transparent;" class="input3" type="text" name="age[]" disabled>'.gender($data['age'],array(1,2,3,4)).'</select>
							</td>
							<td><input style="background-color:transparent;" class="input5" type="text" name="sibling[]" value="'.htmlentities($data['sibling']).'" disabled >
							</td>
							<td><input style="background-color:transparent;" class="input6" type="text" name="father[]" value="'.htmlentities($data['father']).'" disabled >
							</td>
							<td><input style="background-color:transparent;" class="input7" type="text" name="mother[]" value="'.htmlentities($data['mother']).'" disabled >
							</td>
							<td><input style="background-color:transparent;" class="input8" type="text" name="owner[]" value="'.htmlentities($data['owner']).'" disabled >
							</td>
							<td><select style="background-color:transparent;" class="input9" type="text" name="coach[]" disabled >'.selectOption($data['coach_id']).'</select>
							</td>
							<td><input style="background-color:transparent;" class="input10" type="text" name="race_count[]" value="'.htmlentities($data['race_count']).'" disabled >
							</td>
							<td><input style="background-color:transparent;" class="input11" type="text" name="firstplace[]" value="'.htmlentities($data['firstplace_count']).'" disabled >
							</td>
							<td><input style="background-color:transparent;" class="input12" type="text" name="secondplace[]" value="'.htmlentities($data['secondplace_count']).'" disabled >
							</td>
							<td><input style="background-color:transparent;" class="input13" type="text" name="thirdplace[]" value="'.htmlentities($data['thirdplace_count']).'" disabled >
							</td>
							<td><input style="background-color:transparent;" class="input14" type="text" name="score[]" value="'.htmlentities($data['score']).'" disabled >
							</td>
							<td>
								<input type="hidden" name="ids[]" value="'.htmlentities($data['id']).'" disabled >
								<a href="?delete='.htmlentities($data['id']).'" class="horse" title="حذف">
									<span class="glyphicon glyphicon-trash" id="glyph"></span>
								</a>
								<button type="button" class="horse1" title="ویرایش">
									<span class="glyphicon glyphicon-edit" id="glyph"></span>
								</button>
							</td>
						</tr>
					
					';
				}
			}
					
		?>	
        
        
	</tbody>
</table>


<button onClick="addHorse_list()" type="button" class="horse2" title="افزودن"><span class="glyphicon glyphicon-plus" id="glyph1"></span>
</button>

<button type="submit" class="change" title="اعمال تغییرات"><span class="emal">اعمال تغییرات</span></button>

    <div class="scroll-top">
        <a class="btn btn-primary" href="#top" id="to-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


</form>

<script>
	function enableEdit(){
		enable_buttons=document.getElementsByClassName('horse1');
		//console.log(enable_buttons);
		for(var i=0;i<enable_buttons.length;i++){
			enable_buttons[i].addEventListener('click',function(){
			if(this.parentNode.parentNode.querySelectorAll('input')){
				var inputs=this.parentNode.parentNode.querySelectorAll('input');
				var selects=this.parentNode.parentNode.querySelectorAll('select');
				for(var j=0;j<inputs.length;j++){
					inputs[j].style.backgroundColor="#FFF";
					inputs[j].removeAttribute('disabled');
				}	
				for(var z=0;z<selects.length;z++){
					selects[z].style.backgroundColor="#FFF";
					selects[z].removeAttribute('disabled');
				}				
			}
		},false);
		}	
	}
	enableEdit();
	
	function addHorse_list(){
		var rowNum=document.querySelectorAll('#horse_list tr').length;
		rowNum++;
		$("#horse_list").append("<tr><td style='color:white;'>"+rowNum+"</td>"
											+"<td><input name='horse_name[]' class='input1' type='text'></td>"
            								+"<td><input name='card_num[]' class='input2' type='text'></td>"
											+"<td><select name='gender[]' class='input3'><option value='ماده'>ماده</option><option value='نر'>نر</option></select></td>"
											+"<td><select name='age[]' class='input4'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></td>"
											+"<td><input name='sibling[]' class='input5' type='text'></td>"
											+"<td><input name='father[]' class='input6' type='text'></td>"
											+"<td><input name='mother[]' class='input7' type='text'></td>"
											+"<td><input name='owner[]' class='input8' type='text'></td>"
											+"<td><?php if(!empty(selectOption())): ?><select class='input9' name='coach[]'><?php echo selectOption(); ?></select><?php else: echo "<p>هیچ مربی یافت نشد</p>"; endif; ?></td>"
											+"<td><input name='race_count[]' class='input10' type='text'></td>"
											+"<td><input name='firstplace[]' class='input11' type='text'></td>"
											+"<td><input name='secondplace[]' class='input12' type='text'></td>"
											+"<td><input name='thirdplace[]' class='input13' type='text'></td>"
											+"<td><input name='score[]' class='input14' type='text'></td>"
											+"<td>"
											+"<input name='ids[]' type='hidden' value='-1'>"
            								+"<a  type='button' class='horse' title='حذف' disabled>"
											+"<span style='color:#999;' class='glyphicon glyphicon-trash' id='glyph'>"
            								+"</span></a>"
            								+"<button name='edit[]' type='button' class='horse1' title='ویرایش'>"
											+"<span class='glyphicon glyphicon-edit' id='glyph'>"
           									+"</span></button>"
           									+"</td>"
											+"</tr>");
											enableEdit();
}
							
</script>




</body>
</html>
