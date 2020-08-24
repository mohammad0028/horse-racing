<?php 
	session_start();
	if($_SESSION['loggined']!='true'){
		header('location:vorood.php');
		exit('login at first');
	}elseif($_SESSION['user_type']<1){
		echo("<h1>Access Denied </h1>");	
		die("<h2>you dont have enough permission to access this page!</h2>");
	}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>پروفایل</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
<link href="css/profile.css" rel="stylesheet" type="text/css">

</head>



<body>

<?php

$session_username=$_SESSION['username'];
$connection=mysqli_connect('localhost','root','','asbdavani');
$query="select * from users where username='$session_username'";
$result=mysqli_query($connection,$query);
$info=mysqli_fetch_assoc($result);
$user_id=$info['id'];
$username=$info['username'];
$email=$info['email'];
$phone_num=$info['phone_num'];
$card_num=$info['credit_num'];
$shaba_num=$info['shaba_num'];
$predict_count=0;
$truepre_count=0;
$score=$info['score'];
$query="select count(*) as cnt from predict where user_id='$user_id'";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)>0){
	$info=mysqli_fetch_assoc($result);
	$predict_count=$info['cnt'];
}
$query="select count(*) as cnt from predict inner join participant on predict.horse_id=participant.horse_id and predict.race_chart_id=participant.race_chart_id where predict.user_id='$user_id' and (participant.rank in (1,2,3))";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)>0){
	$info=mysqli_fetch_assoc($result);
	$truepre_count=$info['cnt'];
}

mysqli_close($connection);
?>


<div class="div1">

<a href="firstpage.php"> <input type="button" class="firstpage" value="صفحه اصلی"></a>

<div style="margin-top:30px;">

<a href="logout.php" style="text-decoration:none;"><button type="submit" class="exit"><span class="afds"> خروج</span>  <span class="glyphicon glyphicon-log-out"></span></button>
</a>

</div>

</div>


<div class="div2">
<div class="div3">

<a href="edit_pro.php"><input type="button" value="ویرایش اطلاعات کاربری" class="edit" style="font-size:18px;padding-left:0px;"></a>
<a href="change_pass.php"><input type="button" value="تغییر رمز عبور" class="edit" style="clear:both;"></a>
<a href="firstpage.php"><input type="button" value="بازگشت" class="edit" style="clear:both;"></a>

</div>


<div class="div2-1">

<span class="spans1">:  نام کاربری</span><input type="text" name="username" value="<?php echo $username; ?>" class="inputs1" disabled>
<span class="spans1">:  آدرس ایمیل</span><input type="text" name="email" value="<?php echo $email; ?>" class="inputs1" disabled>
<span class="spans1">:  شماره تماس</span><input type="text" name="phone_num" value="<?php echo $phone_num; ?>" class="inputs1" disabled>
<span class="spans1">:  شماره کارت</span><input type="text" name="card_num" value="<?php echo $card_num; ?>" class="inputs1" disabled>
<span class="spans1">:  شماره شبا</span><input type="text" name="shaba_num" value="<?php echo $shaba_num; ?>" class="inputs1" disabled>

<span class="spans2" style="margin-top:66px;">:  تعداد کل پیش بینی های انجام شده</span><input type="text" name="username" value="<?php echo $predict_count; ?>" class="inputs2" disabled style="margin-top:66px;">

<span class="spans2" style="margin-right:40px;">: تعداد پیش بینی های درست</span><input type="text" name="username"
 value="<?php echo $truepre_count; ?>" class="inputs2" style="margin-right:50px;" disabled>

<span class="spans2" style="margin-right:90px;">: امتیاز</span><input type="text" name="username" 
value="<?php echo $score; ?>" 
class="inputs2" style="margin-right:120px;" disabled>
</div>


<!--<div class="div2-2">

<span class="spans2">:  تعداد کل پیش بینی های انجام شده</span><input type="text" name="username" value="0" class="inputs2" disabled>
<span class="spans2" style="margin-right:40px;">: تعداد پیش بینی های درست</span><input type="text" name="username" value="0" class="inputs2" style="margin-right:50px;" disabled>
<span class="spans2" style="margin-right:90px;">: امتیاز</span><input type="text" name="username" value="0" class="inputs2" style="margin-right:120px;" disabled>

</div>-->


</div>





</body>


</html>
