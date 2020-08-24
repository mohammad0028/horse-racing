<?php
ob_start();

function create_sessions($user_info){
		session_start();
		$_SESSION['username']=$user_info["username"];
		$_SESSION['user_id']=$user_info['id'];
		$_SESSION['user_email']=$user_info['email'];
		$_SESSION['user_type']=$user_info['user_type'];
		$_SESSION['loggined']='true';
}
if(!empty($_COOKIE['remember_code'])){
	$connection=mysqli_connect('localhost','root','','asbdavani');
	$remember_code=mysqli_real_escape_string($connection,$_COOKIE['remember_code']);
	$query="select users_remember.remember_code,users.id,users.email,users.username,users.user_type from users_remember inner join users on users_remember.username=users.username where remember_code='$remember_code'";
	$result=mysqli_query($connection,$query);
	if(mysqli_num_rows($result)>0){
		$user_info= mysqli_fetch_assoc($result);
		switch($user_info['user_type']){
			case 1:	
				create_sessions($user_info);
				header('location:firstpage.php');
				break;
			case 2:
				create_sessions($user_info);
				header('location:ad_mainpage.php');
				break;
		}		
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> ورود</title>
<link href="css/vorood.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
</head>

<body>

<div class="div">
 
 <p style="text-align:center;margin-top:-25px;">
 
 <a href="sabtenam.php"><input type="button" value="ثبت نام" class="input1"></a>
 <input type="button" value="ورود" class="input2" >
 </p><br>
 
<p id="vared"> وارد شوید</p><br><br>

<form class="form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
<span> نام کاربری</span><br>
<p style="text-align:center;"><input name="username" class="inputs" type="text" placeholder="  نام کاربری خود را وارد نمایید"  <?php if(!empty(post("username"))){echo " value='".htmlentities(post("username"))."' ";} ?>></p><br><br><br>

<span> رمز عبور</span><br>
<p style="text-align:center;"><input name="password" class="inputs" type="password" placeholder="  رمز عبور خود را وارد نمایید"></p><br>

<p style="color:rgba(206,206,206,1.00);font-family:'Adobe Arabic';font-size:19px;margin-right:175px;">
<input type="checkbox" name="remember"> مرا به خاطر بسپار</p><br>

<p style="text-align:center"><button type="submit" class="submit" name="submit" >ورود</button> </p>

</form>

<a href="faramooshi.php" ><p style="text-align:center;"><input type="button"  class="submit" value="رمز عبور خود را فراموش کرده ام!" style="font-size:22px;"></p></a>
<a href="mainpage.php" ><p style="text-align:center;"><input type="button"  class="submit" value="بازگشت به صفحه اصلی"></p></a>


 </div>
 
 <?php
 session_start();
 
 function post($x){
	if(!empty($_POST[$x])){
		return $_POST[$x];
		}
	}
	
$msg="";
$showModal=false;
	
 if($_SERVER["REQUEST_METHOD"]=="POST"){
	 
	 $username=post("username");
	 $password=post("password");
	 
	 if(empty($username)){
		 $msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا نام کاربری را وارد نمایید ...<br></span><br>";
	 }elseif(empty($password)){
		 $msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا رمز خود را وارد نمایید ...<br></span><br>";
	 }else{
		$connection=mysqli_connect("localhost","root","","asbdavani");
		$username=mysqli_real_escape_string($connection,$username);
		$password=mysqli_real_escape_string($connection,$password);
		$password=md5($password);
		$query="select * from users where username='$username' and password='$password'";
		$result=mysqli_query($connection,$query);
		if(mysqli_num_rows($result)<1){
			$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* نام کاربری یا رمز عبور اشتباه است ...</span><br>";
		}else{
			$user_info=mysqli_fetch_assoc($result);
			if(post('remember')){
				$query="select * from users_remember where username='$username'";
				$result=mysqli_query($connection,$query);
				if(mysqli_num_rows($result)<1){
					$remember_code=md5(uniqid().mt_rand(0,1000));
					$query="insert into users_remember (username,remember_code) values ('$username','$remember_code')";
					$result=mysqli_query($connection,$query);
					setcookie('remember_code',$remember_code,time()+(60*60*24*30));	
				}
			}
			
			
			switch($user_info['user_type']){
				case 1:	
					create_sessions($user_info);
					header('location:firstpage.php');
					break;
				case 2:
					create_sessions($user_info);
					header('location:ad_mainpage.php');
					break;
				default:
					$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* اکانت شما مسدود شده است<br></span><br>";
					break;
			}			
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
          <span style="margin:5px;color:rgba(154,154,154,1.00);">بستن</span></button>
        </div>
      </div>
      
    </div>
    </div>

<?php if($showModal){echo "<script>$('#myModal').modal('show')</script>";} ?>


 
</body>
</html>
