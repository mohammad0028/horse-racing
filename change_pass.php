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
<title>تغییر رمز عبور</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/change_pass.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
</head>

<body>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

<div class="div1">
<div class="div1-1"><span class="editpass">تغییر رمز عبور ...</span></div>
<hr>


<div class="div1-2">

<span class="spans1">رمز عبور فعلی : </span>
<input name="password" type="password" class="inputs1"<?php if(!empty(post("password"))){echo " value='".htmlentities(post("password"))."' ";} ?>>

<span class="spans1">رمز عبور جدید : </span>
<input name="newpassword" type="password" class="inputs1"<?php if(!empty(post("newpassword"))){echo " value='".htmlentities(post("newpassword"))."' ";} ?>>

<span class="spans1">تکرار رمز عبور جدید : </span>
<input name="renewpassword" type="password" class="inputs1">

</div>

</div>

<div class="div2">
<input type="submit" value="تغییر رمز" name="change" class="button">
<a href="profile.php"><input type="button" value="انصراف" name="quit" class="button"></a>
<a href="profile.php"><input type="button" value="بازگشت" name="quit" class="button"></a>
</div>

</form>


<?php

function post($x){
	if(!empty($_POST[$x])){
		return $_POST[$x];
	}
}

$msg='';
$showModal=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$password=post("password");
	$newpassword=post("newpassword");
	$renewpassword=post("renewpassword");
	
	if(empty($password)){
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا رمز عبور فعلی خود را وارد نمایید ...<br></span><br>";
	}elseif(empty($newpassword)){
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا رمز عبور جدید را وارد نمایید ...<br></span><br>";
	}elseif(empty($renewpassword)){
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا تکرار رمز عبور جدید را وارد نمایید ...<br></span><br>";
	}elseif($newpassword != $renewpassword){
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* تکرار رمز عبور جدید اشتباه است ...<br></span><br>";
	}else{
	
	$username=$_SESSION['username'];
	$password=md5($password);
	$connection=mysqli_connect('localhost','root','','asbdavani');
	$query="select * from users where username='$username' and password='$password'";
	$result=mysqli_query($connection,$query);
	//echo mysqli_error($connection);
	if(mysqli_num_rows($result)>0){
		$newpassword=md5($newpassword);
		$query="update users set password='$newpassword' where username='$username'";
		$result=mysqli_query($connection,$query);
		if($result){
			$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* رمز عبور شما با موفقیت تغییر یافت...<br></span><br>";	
		}
	}else{
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* رمز عبور فعلی خود را اشتباه وارد کرده اید ...<br></span><br>";
	}
	}
	$showModal=true;
}


?>



<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body" style="direction:rtl;">
          <p><?php echo $msg; ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >
          <span style="margin:5px;color:rgba(154,154,154,1.00);font-size:19px;font-family:'adobe arabic';">بستن</span></button>
        </div>
      </div>
      
    </div>
    </div>

<?php if($showModal){echo "<script>$('#myModal').modal('show')</script>";} ?>

</body>
</html>
