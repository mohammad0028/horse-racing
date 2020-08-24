<?php
	/**
		Requirements:
			year=?
			season=?
			week=?
			course_num=?
	**/
	$day=!empty($_GET['day'])?$_GET['day']:'';

	$query="select distinct(race_chart.id),race_chart.date,race_chart.distance,race_chart.course_num,race_chart.start_time from race_chart left join participant on race_chart.id=participant.race_chart_id where race_chart.days='$day' AND (participant.rank='') order by course_num asc";
	$connection=mysqli_connect("localhost","root","","asbdavani");
	mysqli_set_charset($connection,'utf8');
	$result=mysqli_query($connection,$query);
	if(mysqli_num_rows($result)>0){
		$output=array();
		while($info=mysqli_fetch_assoc($result)){
			$output[]=$info;
		}
		echo json_encode($output,JSON_UNESCAPED_UNICODE);
	}	
?>