<?php
	$rank_score=array(1=>7,2=>4,3=>2);
	
	$connection=mysqli_connect('localhost','root','','asbdavani');
	mysqli_set_charset($connection,'utf8');
	//$race_chart_id='2';
	$query="select predict.id as predict_id,predict.horse_id,participant.rank,users.id as user_id,users.score from predict inner join participant on predict.race_chart_id=participant.race_chart_id inner join users on users.id=predict.user_id where predict.race_chart_id='$race_chart_id' and predict.horse_id=participant.horse_id and (participant.rank!='') and (predict.isset_score='0') order by users.id";
	$result=mysqli_query($connection,$query);
	$all_data=array();
	while($data=mysqli_fetch_assoc($result)){
		$all_data[$data['user_id']]=$data;
	}
	//print_r($all_data);
	foreach($all_data as $user_id=>$data){
		if($data['rank']>=1 && $data['rank']<=3){
			$score=$rank_score[$data['rank']];
			$query="update users set score=score+$score where id='$user_id'";
			mysqli_query($connection,$query);
		}
		$query="update predict set isset_score=1 where race_chart_id='$race_chart_id'";
		mysqli_query($connection,$query);			

	}
?>