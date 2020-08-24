<?php 
	$horse_id=!empty($_GET['id'])?$_GET['id']:'';
	if(!empty($horse_id)){
		$connection=mysqli_connect('localhost','root','','asbdavani');
		mysqli_set_charset($connection,'utf8');
		$query="select participant.rank,horse_info.name,horse_info.race_count from horse_info inner join participant on participant.horse_id=horse_info.id where horse_info.id='$horse_id' and (participant.rank!='') order by rank desc";
		$result=mysqli_query($connection,$query);
		$allinfo=array();
		while($info=mysqli_fetch_assoc($result)){
			if($info['rank']==1){
				$info['rank']=$info['rank'].'st';
			}elseif($info['rank']==2){
				$info['rank']=$info['rank'].'nd';
			}elseif($info['rank']==3){
				$info['rank']=$info['rank'].'rd';
			}else{
				$info['rank']=$info['rank'].'th';
			}
			$allinfo[]=$info;
		}
		$allinfo=array_count_values(array_column($allinfo, 'rank'));
		//print_r ($allinfo);
		$finaldata=array();
		$i=0;
		foreach($allinfo as $key=>$value){
			$finaldata[$i]['name']=$key;
			$finaldata[$i]['y']=$value;
			$i++;
		}
	}
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>سابقه</title>
    <script src="js/charts/pieCahr1.js"></script>
	<script src="js/charts/pieChart2.js"></script>
	<script src="js/charts/pieChart3.js"></script>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
    <style>
	body{
		background-color:rgba(44,194,207,0.27);
	}
    .table{
		direction:rtl;
		margin-top:30px;
		margin-left:490px;
		width:570px;
		font-family:"adobe arabic";
		font-size:20px;
	}
	table th{
		text-align:center;
		border-left:1px solid rgba(0,0,0,0.61);
		border-right:1px solid rgba(0,0,0,0.61);
		font-size:21px;
	}
	table td{
		text-align:center;
		border-left:1px solid rgba(0,0,0,0.61);
		border-right:1px solid rgba(0,0,0,0.61);
	}
    </style>
    
</head>
<body>

	<div id="container" style="width:100%;height:600px;margin:0 auto;"></div>
    
    <?php
    	$connection=mysqli_connect('localhost','root','','asbdavani');
		mysqli_set_charset($connection,'utf8');
		$query="select * from horse_info where id='$horse_id'";
		$result=mysqli_query($connection,$query);
		if(mysqli_num_rows($result)>0){
			$info=mysqli_fetch_assoc($result);
			$horse_name=$info['name'];
			$race_count=$info['race_count'];
			$firstplace_count=$info['firstplace_count'];
			$secondplace_count=$info['secondplace_count'];
			$thirdplace_count=$info['thirdplace_count'];
		}	
	
	?>
    
    <table class="table">
    	<thead>
            <tr>
                <th>نام اسب</th>
                <th>تعداد مسابقات</th>
                <th>تعداد مقام اول</th>
                <th>تعداد مقام دوم</th>
                <th>تعداد مقام سوم</th>
            </tr>
       </thead>
        
        <tbody>
        	<tr>
            	<td><?php echo $horse_name; ?></td>
                <td><?php echo $race_count; ?></td>
                <td><?php echo $firstplace_count; ?></td>
                <td><?php echo $secondplace_count; ?></td>
                <td><?php echo $thirdplace_count; ?></td>
            </tr>
        </tbody>
    </table>
   
    
	<script>
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: false,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'بررسی عملکرد اسب در طی مسابقات گذشته',
		style:{
			fontFamily:'adobe arabic',
			fontSize: '25px'
		}
    },
	tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
	credits:false,
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: <?php echo json_encode($finaldata); ?>
    }]
});
    </script>    
    
</body>
</html>