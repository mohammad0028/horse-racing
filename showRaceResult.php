<?php
	/**
		Requirements:
			year=?
			season=?
			week=?
			course_num=?
	**/
	$year=!empty($_GET['year'])?$_GET['year']:'';
	$season=!empty($_GET['season'])?$_GET['season']:'';
	$week=!empty($_GET['week'])?$_GET['week']:'';
	$course_num=!empty($_GET['course_num'])?$_GET['course_num']:'';
	$query_fields=array('year'=>$year,'season'=>$season,'week'=>$week,'course_num'=>$course_num);
	$where='';
	foreach($query_fields as $key=>$query_field){
		if(empty($where)){
			if(!empty($query_field)){
				$where.=($key."='".$query_field."'");
			}
		}else{
			if(!empty($query_field)){
				$where.=(" and ".$key."='".$query_field."'");
			}
		}
	}
	if(!empty($where)){      //left join or inner join ??
		$query="select distinct(race_chart.id),race_chart.date,race_chart.distance,race_chart.course_num,race_chart.start_time from race_chart left join participant on race_chart.id=participant.race_chart_id where $where AND NOT(participant.rank='') order by course_num asc";
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
	}
?>