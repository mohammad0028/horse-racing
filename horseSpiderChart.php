<?php
	//sibling score
	$sibling_score=array('ترکمن'=>"6",'آخال تکه'=>"5",'کوارتر'=>"4",'تروبرد داخلی'=>"3",'دو خون'=>"2",'دوخون'=>"2",'عرب'=>"1");

	$connection=mysqli_connect('localhost','root','','asbdavani');
	mysqli_set_charset($connection,'utf8');
	
	$race_chart_id=!empty($_GET['id'])?$_GET['id']:'';	
	//get horses info:
	$race_horses=array();
	$query="select participant.rider_id,horse_info.name,horse_info.age,horse_info.sibling,horse_info.firstplace_count,horse_info.score,horse_info.coach_id from participant inner join horse_info on participant.horse_id=horse_info.id where participant.race_chart_id='$race_chart_id'";
	$result=mysqli_query($connection,$query);
	if(mysqli_num_rows($result)>0){
		while($horseInfo=mysqli_fetch_assoc($result)){
			$race_horses[]=$horseInfo;	
		}
	}
	//get coach info:
	$race_coaches=array();
	$query="select coach_info.id as id,coach_info.name,coach_info.score from participant inner join horse_info on participant.horse_id=horse_info.id inner join coach_info on horse_info.coach_id=coach_info.id where participant.race_chart_id='$race_chart_id'";
	$result=mysqli_query($connection,$query);
	if(mysqli_num_rows($result)>0){
		while($coachInfo=mysqli_fetch_assoc($result)){
			$race_coaches[$coachInfo['id']]=$coachInfo;	
		}
	}
	
	
	//get rider info:
	$race_riders=array();
	$query="select rider_info.id as id,rider_info.name,rider_info.score from participant inner join rider_info on participant.rider_id=rider_info.id where participant.race_chart_id='$race_chart_id'";
	$result=mysqli_query($connection,$query);
	if(mysqli_num_rows($result)>0){
		while($riderInfo=mysqli_fetch_assoc($result)){
			$race_riders[$riderInfo['id']]=$riderInfo;	
		}
	}
	$finalData=array();
	$i=0;
	foreach($race_horses as $horse_id =>$horse){
		$finalData[$i]['name']=	$horse['name'];
		$coach_score=$race_coaches[$horse['coach_id']]['score'];
		$rider_score=$race_riders[$horse['rider_id']]['score'];
		$finalData[$i]['data']=array((int)$horse['age'],(int)$sibling_score[$horse['sibling']],(int)$coach_score,(int)$rider_score,(int)$horse['score'],(int)$horse['firstplace_count']);
		$finalData[$i]['pointPlacement']='on';
		$i++;
	}
	//echo json_encode($finalData,JSON_UNESCAPED_UNICODE|128);
	//print_r($finalData);
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<script src="js/charts/spiderChart1.js"></script>
	<script src="js/charts/spiderChart2.js"></script>
	<script src="js/charts/spiderChart3.js"></script>
	<script src="js/charts/spiderChart4.js"></script>
    
	<div id="container" style="max-width: 95%; height: 700px; margin: 0 auto"></div>
	
	<script>
		Highcharts.setOptions({
		chart: {
			style: {
				fontFamily: 'adobe arabic',
			}
		}
	   });			
		Highcharts.chart('container', {

			chart: {
				polar: true,
				type: 'line'
			},

			title: {
				text: 'مقایسه ی اسب های این کورس',
				x: -80,
				style:{
                	color: 'black',
                	fontSize: '30px'
            	}  				
			},

			pane: {
				size: '80%'
			},

			xAxis: {
				categories: ['سن', 'نژاد', 'امتیاز مربی', 'امتیاز چابکسوار',
						'امتیاز اسب', 'تعداد مقام اول اسب'],
				labels: {
                	style: {
                    	fontSize:'25px'
                	}
            	},
				tickmarkPlacement: 'on',
				lineWidth: 0
			},

			yAxis: {
				gridLineInterpolation: 'polygon',
				lineWidth: 0,
				min: 0,
				labels:{
					style:{
                		color: 'black',
                		fontSize: '20px'
            		}
				}
			},

			tooltip: {
				shared: true,
				pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>',
				style:{
                		color: 'black',
                		fontSize: '20px',
            		}
			},
			legend: {
				align: 'right',
				verticalAlign: 'top',
				y: 70,
				layout: 'vertical',				
             	itemStyle: {
                	font: '25px adobe arabic',
                	color: '#A0A0A0'
              	}
        },
		credits: false,
			series:<?php echo json_encode($finalData,JSON_UNESCAPED_UNICODE); ?>

		});
    </script>
</body>
</html>