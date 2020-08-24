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
<title>ویرایش گالری عکس</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/edit_pic_gallery.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>

</head>

<body>

<nav class="navbar navbar-inverse" style="margin-bottom:50px;">

  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
    
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span>&nbsp;<span class="nav-content">جداول و نتایج</span></a>
       <ul class="dropdown-menu" style="direction:rtl;">
          <li><a href="ad_mainpage.php" class="dropdown-a">درج جدول مسابقات</a></li>
          <li><a href="search_race_chart.php" class="dropdown-a">ویرایش نتایج مسابقات</a></li>
        </ul>
       </li> 
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret" style="color:rgba(215,240,27,1.00);"></span><span class="nav-content" style="color:rgba(215,240,27,1.00);">گالری</span> </a>
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

function post($x){
	if(!empty($_POST[$x])){
		return $_POST[$x];
		}
	}
		
		$address=""; 
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			
			$file=!empty($_FILES['upload'])?$_FILES['upload']:"";
			$connection=mysqli_connect("localhost","root","","asbdavani");
			mysqli_set_charset($connection,"utf8");
			if(!empty($file['name'])){
				$address='upload/'.mt_rand(1,100000).$file['name'];
				move_uploaded_file($file['tmp_name'],$address);
				$topic=post("topic");			
				$topic=mysqli_real_escape_string($connection,$topic);
				$connection=mysqli_connect("localhost","root","","asbdavani");
				$query="insert into images (address,topic) values ('$address','$topic') ";
				mysqli_query($connection,$query);
							
			}
			
			//delete files
			$id=post('id');
			$delete=post('delete');
			if(!empty($delete) && !empty($id)){
				$id=mysqli_real_escape_string($connection,$id);
				$query="select * from images where id='$id'";
				$result=mysqli_query($connection,$query);
				if(mysqli_num_rows($result)>0){
					$imageInfo=mysqli_fetch_assoc($result);				
				}
				$query="delete from images where id='$id'";
				mysqli_query($connection,$query);
				if(file_exists($imageInfo['address'])){
					unlink($imageInfo['address']);
				}	
			}	
		}
	?>
    
	<form method="POST" enctype="multipart/form-data" style="margin-bottom:50px;display:block;" class="form1">
    	<p class="para"> تصویر مورد نظر خود را انتخاب کنید ...</p>
    	<input type="file" name="upload" style="display:inline;" class="file">
        <input type="submit" class="submit" value="تایید"><br>
        <div class="div1"><span class="span1">توضیحات : </span><input type="text" name="topic" class="topic">		        </div>
    </form>
    
    <?php
	 
	$connection=mysqli_connect("localhost","root","","asbdavani");
	$query2="select * from images";
	$result2=mysqli_query($connection,$query2);
	$count=count($result2);
	
	if(mysqli_num_rows($result2)>0){
		
		while($info=mysqli_fetch_assoc($result2)){
			
			$id=$info['id'];
			$alladdress=$info['address'];
			$topic=$info['topic'];
			echo "
			 
			<form method='post'>
			
				<div class='col-md-4'>
      				<div class='thumbnail'>
       					<a href='$alladdress' target='_blank' class='link'>
          				<img src='$alladdress' alt='picture' style='width:100%' class='image'>
          				<div class='caption'>
           					<p class='topic1'>".htmlentities($topic)."</p>
          				</div>
        				</a>
      				</div>
					<input name='id' type='hidden' value='$id'>
					<input type='submit' name='delete' value='حذف' class='delete'>
					
			  </div> 
			  
			</form>";
		}
	}
	
	
	?>


</body>
</html>