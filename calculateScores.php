<?php
	$scores=array(1=>5,2=>3,3=>1);	
	$connection=mysqli_connect('localhost','root','','asbdavani');
	mysqli_set_charset($connection,'utf8');
	
	//calculate horse score:
	$query="select * from participant where rank in (1,2,3)";
	$result=mysqli_query($connection,$query);
	$all_data=array();
	while($data=mysqli_fetch_assoc($result)){
		$all_data[$data['horse_id']][]=$data;
	}
	$all_scores=array();
	foreach($all_data as $horse_id=>$races){
		$all_scores[$horse_id]['score']=0;
		foreach($races as $race){
			$all_scores[$horse_id]['score']+=$scores[$race['rank']];
		}
	}
	
	foreach($all_scores as $horse_id=>$value){
		$score=$value['score'];
		$query="update horse_info set score='$score' where id='$horse_id'";
		mysqli_query($connection,$query);
	}
	
	//calculate rider score:
	$query="select * from participant where rank in (1,2,3)";
	$result=mysqli_query($connection,$query);
	$all_data=array();
	while($data=mysqli_fetch_assoc($result)){
		$all_data[$data['rider_id']][]=$data;
	}
	$all_scores=array();
	foreach($all_data as $rider_id=>$races){
		$all_scores[$rider_id]['score']=0;
		foreach($races as $race){
			$all_scores[$rider_id]['score']+=$scores[$race['rank']];
		}		
	}
	foreach($all_scores as $rider_id=>$value){
		$score=$value['score'];
		$query="update rider_info set score='$score' where id='$rider_id'";
		mysqli_query($connection,$query);
	}
	
	//calculate coach score:
	$query="select participant.rank,participant.horse_id,horse_info.coach_id,horse_info.id from participant inner join horse_info on horse_info.id=participant.horse_id where participant.rank in (1,2,3)";
	$result=mysqli_query($connection,$query);
	$all_data=array();
	while($data=mysqli_fetch_assoc($result)){
		$all_data[$data['coach_id']][]=$data;
	}
	$all_scores=array();
	foreach($all_data as $coach_id=>$races){
		$all_scores[$coach_id]['score']=0;
		foreach($races as $race){
			$all_scores[$coach_id]['score']+=$scores[$race['rank']];
		}		
	}
	foreach($all_scores as $coach_id=>$value){
		$score=$value['score'];
		$query="update coach_info set score='$score' where id='$coach_id'";
		mysqli_query($connection,$query);
	}	
?>