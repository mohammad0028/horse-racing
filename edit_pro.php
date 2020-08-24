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
<title>ویرایش اطلاعات کاربری</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/edit_pro.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
</head>


<body>

<?php

$session_username=$_SESSION['username'];
$connection=mysqli_connect('localhost','root','','asbdavani');
mysqli_set_charset($connection,"utf8");
$query="select * from users where username='$session_username'";
$result=mysqli_query($connection,$query);
$info=mysqli_fetch_assoc($result);
$username=$info['username'];
$email=$info['email'];
$phone_num=$info['phone_num'];
$card_num=$info['credit_num'];
$shaba_num=$info['shaba_num'];

mysqli_close($connection);

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
	$phone_num=post("phone_num");
	$card_num=post("card_num");
	$shaba_num=post("shaba_num");
	
	if(empty($username)){
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا نام کاربری را وارد نمایید ...<br></span>";
	}elseif(empty($email)){
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا ایمیل را وارد نمایید ...<br></span>";
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا ایمیل را به صورت صحیح وارد نمایید ...<br></span>";
	}elseif(empty($phone_num)){
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا شماره تماس خود را وارد نمایید ...<br></span>";
	}elseif(empty($card_num)){
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا شماره کارت خود را وارد نمایید ...<br></span>";
	}elseif(empty($shaba_num)){
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا شماره شبا را وارد نمایید ...<br></span>";
	}else{
		$session_username=$_SESSION['username'];
		$con=mysqli_connect('localhost','root','','asbdavani');
		$username=mysqli_real_escape_string($con,$username);
		$email=mysqli_real_escape_string($con,$email);
		$phone_num=mysqli_real_escape_string($con,$phone_num);
		$card_num=mysqli_real_escape_string($con,$card_num);
		$shaba_num=mysqli_real_escape_string($con,$shaba_num);
		$query1="select * from users where username='$session_username'";
		$result1=mysqli_query($con,$query1);
		$info=mysqli_fetch_assoc($result1);
		$id=$info['id'];
		$query1="UPDATE users SET username='$username', email='$email', phone_num='$phone_num',
				 credit_num='$card_num', shaba_num='$shaba_num' WHERE id='$id' ";
		mysqli_query($con,$query1);
		$_SESSION['login_username']=post("username");
		$msg="<span style='font-size:22px;margin:10px;color:rgba(154,154,154,1.00);'> ویرایش اطلاعات با موفقیت انجام شد ...";	
		mysqli_close($con);
		
	}
	
	
	
	
$showModal=true;	
}

?>



<script>
     function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
</script>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

<div class="div1"></div>


<div class="div2">

<div class="div2-1">
<div class="first"><span class="editinfo">ویرایش اطلاعات کاربری</span></div>
<hr>

<span class="spans1">:  نام کاربری</span><input type="text" name="username" value="<?php echo $username; ?>"
class="inputs1" >

<span class="spans1">:  آدرس ایمیل</span><input type="text" name="email" value="<?php echo $email; ?>"
class="inputs1" >

<span class="spans1">:  شماره تماس</span><input type="text" maxlength="11" name="phone_num" 
value="<?php echo $phone_num; ?>" class="inputs1" onkeypress="return isNumberKey(event);" >

<span class="spans1">:  شماره کارت</span><input type="text" name="card_num" value="<?php echo $card_num; ?>"
class="inputs1" 
onkeypress="return isNumberKey(event);" >

<span class="spans1">:  شماره شبا</span><input type="text" name="shaba_num" value="<?php echo $shaba_num; ?>"
class="inputs1" >
</div>


</div>


<div class="div3">

<input type="submit" value="تایید" class="edit" style="margin-right:350px;">

<a href="profile.php"><input type="button" value="انصراف" class="edit1"></a>

<a href="profile.php"><input type="button" value="بازگشت" class="edit1"></a>

</div>


</form>

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
