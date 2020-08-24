<?php
	//$connection =mysqli_connect('localhost','root','','asbdavani');
	//$race_chart_id=$_GET['id'];
	$query="select * from participant";
	$result=mysqli_query($connection,$query);
	$all_info=array();
	while($info=mysqli_fetch_assoc($result)){
		$all_info[]=$info;
	}
	$all_horse_id=array();
	foreach($all_info as $single_info){
		$all_horse_id[]=$single_info['id'];
	}
	$all_horse_id=implode(',',$all_horse_id);
	if(!empty($all_info)){
		foreach($all_info as $single_info){
			$horse_id=$single_info['horse_id'];
			$rider_id=$single_info['rider_id'];
			$query="select * from horse_info where id='$horse_id'";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$coach_id=$info['coach_id'];
			/*
				update missed horse_id records from participant
			*/
			//$query="update horse_info set race_count=0,firstplace_count=0,thirdplace_count=0 where horse_id in ($all_horse_id)";
			//mysqli_query($connection,$query);			
			/*
				calculate and upadate
				-->race_count
				-->firtplace_count
				-->secondplace_count
				-->thirdplace_count
				in horse_info table
			
			*/						
			//horse race count
			$query="select count(*) as cnt from participant where horse_id='$horse_id' and !(rank='')";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$race_count=$info['cnt'];
			//echo $horse_id.'='.$race_count.'<br>';
			//horse first place count
			$query="select count(*) as first_place_count from participant where horse_id='$horse_id' and rank='1'";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$first_place_count=$info['first_place_count'];
			//horse second place count
			$query="select count(*) as second_place_count from participant where horse_id='$horse_id' and rank='2'";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$second_place_count=$info['second_place_count'];
			//horse third place count
			$query="select count(*) as third_place_count from participant where horse_id='$horse_id' and rank='3'";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$third_place_count=$info['third_place_count'];
			//update horse_info table
			$query="update horse_info set race_count='$race_count',firstplace_count='$first_place_count',secondplace_count='$second_place_count',thirdplace_count='$third_place_count' where id='$horse_id'";
			mysqli_query($connection,$query);


			/*
				calculate and upadate
				-->race_count
				-->firtplace_count
				-->secondplace_count
				-->thirdplace_count
				in rider_info table
			
			*/
			//rider race count
			$query="select count(*) as cnt from participant where rider_id='$rider_id' and !(rank='')";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$race_count=$info['cnt'];
			//rider first place count
			$query="select count(*) as first_place_count from participant where rider_id='$rider_id' and rank=1";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$first_place_count=$info['first_place_count'];
			//rider second place count
			$query="select count(*) as second_place_count from participant where rider_id='$rider_id' and rank=2";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$second_place_count=$info['second_place_count'];
			//rider third place count
			$query="select count(*) as third_place_count from participant where rider_id='$rider_id' and rank=3";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$third_place_count=$info['third_place_count'];
			//update rider_info table
			$query="update rider_info set race_count='$race_count',firstplace_count='$first_place_count',secondplace_count='$second_place_count',thirdplace_count='$third_place_count' where id='$rider_id'";
			mysqli_query($connection,$query);



			/*
				calculate and upadate
				-->race_count
				-->firtplace_count
				-->secondplace_count
				-->thirdplace_count
				in coach_info table
			
			*/
			//coach race count
			$query="select sum(race_count) as cnt from horse_info where coach_id='$coach_id'";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$race_count=$info['cnt'];
			//rider first place count
			$query="select sum(firstplace_count) as first_place_count from horse_info where coach_id='$coach_id'";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$first_place_count=$info['first_place_count'];
			//rider second place count
			$query="select sum(secondplace_count) as second_place_count from horse_info where coach_id='$coach_id'";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$second_place_count=$info['second_place_count'];
			//rider third place count
			$query="select sum(thirdplace_count) as third_place_count from horse_info where coach_id='$coach_id'";
			$result=mysqli_query($connection,$query);
			$info=mysqli_fetch_assoc($result);
			$third_place_count=$info['third_place_count'];
			//update rider_info table
			$query="update coach_info set race_count='$race_count',firstplace_count='$first_place_count',secondplace_count='$second_place_count',thirdplace_count='$third_place_count' where id='$coach_id'";
			mysqli_query($connection,$query);
			
		}
	}
?>