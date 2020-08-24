<?php 
		if($_SERVER['REQUEST_METHOD']=="GET"){
			$id=!empty($_GET['id'])?$_GET['id']:"";
			if(!empty($id)){
				$connection=mysqli_connect('localhost','root','','asbdavani');
				mysqli_set_charset($connection,"utf8");
				$id=mysqli_real_escape_string($connection,$id);
				$query="select owner,coach_info.name as coach_name from horse_info inner join coach_info on horse_info.coach_id=coach_info.id where horse_info.id=$id";
				$result=mysqli_query($connection,$query);
				if(mysqli_num_rows($result)>0){
					while($info=mysqli_fetch_assoc($result)){
						echo json_encode($info,JSON_UNESCAPED_UNICODE);
					}
				}
					
			}
		}

?>

