<?php
session_start();

?>


<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title> ثبت نام</title>
<link href="css/sabtenam.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
 
</head>

<body>

<?php

function post($x){
	if(!empty($_POST[$x])){
		return $_POST[$x];
		}
	}
	
$msg="";
$showModal=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	$username=post("username");
	$email=post("email");
	$phone=post("phone");
	$card_num=post("card_num");
	$shaba=post("shaba");
	$password=post("password");
	$repassword=post("repassword");
	
	if(empty($username)){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا نام کاربری را وارد نمایید ...<br></span>";
	}elseif(empty($email)){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا ایمیل را وارد نمایید ...<br></span>";
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا ایمیل را به صورت صحیح وارد نمایید ...<br></span>";
	}elseif(empty($phone)){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا شماره تماس خود را وارد نمایید ...<br></span>";
	}elseif(empty($card_num)){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا شماره کارت خود را وارد نمایید ...<br></span>";
	}elseif(empty($shaba)){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا شماره شبا را وارد نمایید ...<br></span>";
	}elseif(empty($password)){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا رمز را وارد کنید ...<br></span>";
	}elseif(empty($repassword)){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا تکرار رمز خود را وارد نمایددی ...<br></span>";
	}elseif($password!=$repassword){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* تکرار رمز اشتباه است ...<br>";
	}else{
		$connection=mysqli_connect("localhost","root","","asbdavani");
		mysqli_set_charset($connection,"utf8");
		$username=mysqli_real_escape_string($connection,$username);
		$email=mysqli_real_escape_string($connection,$email);
		$phone=mysqli_real_escape_string($connection,$phone);
		$card_num=mysqli_real_escape_string($connection,$card_num);
		$shaba=mysqli_real_escape_string($connection,$shaba);
		$password=mysqli_real_escape_string($connection,$password);
		$user_type=1;
		$query="select * from users where username='$username' or email='$email'";
		$result=mysqli_query($connection,$query);
		if(mysqli_num_rows($result)>0){
			$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* این کاربر قبلا ثبت نام کرده است </span>";
		}else{
			$password=md5($password);
			$query1="insert into users (username,email,phone_num,credit_num,shaba_num,password,user_type)
			 values ('$username','$email','$phone','$card_num','$shaba','$password','$user_type')";
			$result1=mysqli_query($connection,$query1);
			if($result1){
				$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'> ثبت نام با موفقیت انجام شد ...";	
			}
			mysqli_close($connection);
		}
		
		}
		$showModal=true;
	}

?>



<div class="div"> 
<p style="text-align:center;margin-top:-25px;">

<input type="button" value="ثبت نام" class="input1"> 
<a href="vorood.php"><input type="button"  class="input2" value="ورود"></a>
</p><br>

<p id="sabtenam"> ثبت نام کنید</p><br>

<form  method="post" action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" class="form" >
<span> نام کاربری</span><br>
<p style="text-align:center;"><input name="username" type="text"  placeholder="   نام کاربری خود را وارد نمایید"
<?php if(!empty(post("username"))){echo " value='".htmlentities(post("username"))."' ";} ?> class="inputs">
</p><span class="errors"></span><br>

<span> آدرس ایمیل</span><br>
<p style="text-align:center;"><input name="email" class="inputs" type="email" placeholder="   آدرس ایمیل خود را وارد نمایید"
<?php if(!empty(post("email"))){echo " value='".htmlentities(post("email"))."' ";} ?>></p><span class="errors"></span><br>
<span class="errors"></span><br>

<script>
     function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
</script>

<span>شماره تماس</span><br>
<p style="text-align:center;"><input name="phone" class="inputs" maxlength="11" type="search" onkeypress="return isNumberKey(event);" placeholder=" XXXXXXXXXXX" style="text-align:center;"
<?php if(!empty(post("phone"))){echo " value='".htmlentities(post("phone"))."' ";} ?>></p>
<span class="errors"></span><br>

<span>شماره کارت</span><br>
<p style="text-align:center;"><input name="card_num" class="inputs" maxlength="16" type="search" onkeypress="return isNumberKey(event);" placeholder=" XXXXXXXXXXXXXXXX" style="text-align:center;"
<?php if(!empty(post("card_num"))){echo " value='".htmlentities(post("card_num"))."' ";} ?>></p>
<span class="errors"></span><br>

<span>شماره شبا</span>
<p style="text-align:center;"><input name="shaba" class="inputs" type="search" placeholder=" شماره شبا را وارد کنید"
 style="text-align:center;" 
 <?php if(!empty(post("shaba"))){echo " value='".htmlentities(post("shaba"))."' ";} ?>></p>
 <span class="errors"></span><br>

<span> رمز عبور</span><br>
<p style="text-align:center;"><input name="password" class="inputs" type="password" placeholder="   رمز عبور خود را وارد نمایید" ></p><span class="errors"
<?php if(!empty(post("password"))){echo " value='".htmlentities(post("password"))."' ";} ?>></span><br>

<span>تکرار رمز عبور</span><br>
<p style="text-align:center;"><input name="repassword" class="inputs" type="password" placeholder="   تکرار رمز عبور خود را وارد نمایید"></p><span class="errors"></span><br>

<p style="text-align:center"><input type="submit" class="submit" value="تایید" > </p>

</form>

<a href="mainpage.php" ><p style="text-align:center;"><input type="button"  class="submit" value="بازگشت به صفحه اصلی"></p></a>

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
 </div>

<?php if($showModal){echo "<script>$('#myModal').modal('show')</script>";} ?>
</body>
</html>
