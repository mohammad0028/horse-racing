<?php
	$date=!empty($_GET['date'])?$_GET['date']:'';
	$course_num=!empty($_GET['course_num'])?$_GET['course_num']:'';
	if(!empty($date) and !empty($course_num)){
		$query="select * from race_chart where date='$date' and course_num='$course_num'";
	}elseif(empty($course_num)){
		$query="select * from race_chart where date='$date'";
	}
	if(!empty($date) || !empty($course_num)){
		$connection=mysqli_connect("localhost","root","","asbdavani");
		mysqli_set_charset($connection,'utf8');
		$date=mysqli_real_escape_string($connection,$date);
		$course_num=mysqli_real_escape_string($connection,$course_num);
		$result=mysqli_query($connection,$query);
		if(mysqli_num_rows($result)>0){
			$output=array();
			while($info=mysqli_fetch_assoc($result)){
				$output[]=$info;
			}
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
		}
	}
?>