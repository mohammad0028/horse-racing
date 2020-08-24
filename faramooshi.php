<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>بازیابی مجدد رمز</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="css/faramooshi.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>

</head>

<body>
<div class="div"> 
<P style="text-align:center;"><input type="button" value="بازیابی رمز عبور" class="input2" ></P><br><br>
<p class="para"> *  در صورتی که کلمه عبور خود را فراموش کرده اید، آدرس ایمیلی که به هنگام ثبت نام (نام کاربری) وارد کرده اید را در قسمت زیر وارد نمایید. <br> در این صورت ایمیلی برای شما ارسال می گردد که حاوی کلمه عبور جدید برای ورود به حساب کاربری شما می باشد.</p><br>
 

<form class="form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

<span> آدرس ایمیل</span><br>
<P style="text-align:center;"><input name="email" class="input" type="email" placeholder=" آدرس ایمیل خود را وارد نمایید" 
<?php if(!empty(post("email"))){echo " value='".htmlentities(post("email"))."' ";} ?>></P><br><br>

<p style="text-align:center"><button type="submit" class="submit">تایید</button> </p>

</form>

<a href="vorood.php"><p style="text-align:center;"><button type="button" class="submit">بازگشت به صفحه قبل</button> </p></a>
<a href="mainpage.php"><p style="text-align:center;"><button type="button" class="submit">بازگشت به صفحه اصلی</button> </p></a>

<?php

function post($x){
	if(!empty($_POST[$x])){
		return $_POST[$x];
	}
}

$msg="";
$showModal=false;
	
if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	$email=post("email");
	
	if(empty($email)){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا ایمیل را وارد نمایید ...<br></span>";
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* لطفا ایمیل را به صورت صحیح وارد نمایید ...<br></span>";
	}else{
		$connection=mysqli_connect('localhost','root','','asbdavani');
		$email=mysqli_real_escape_string($connection,$email);
		$query="select * from users where email='$email'";
		$result=mysqli_query($connection,$query);
		if(mysqli_num_rows($result)>0){
			$random_password=uniqid(mt_rand(0,10000),true).mt_rand(0,1000);
			$newpassword=md5($random_password);
			$query="update users set password='$newpassword' where email='$email'";
			$result=mysqli_query($connection,$query);
			if($result){
				@mail($email,'password-recovery','your new password:'.$random_password);
				$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* رمز عبور جدید برای شما ارسال شد . لطفا بعد از ورود به حساب کاربری خود ، رمز عبور خود را تغییر دهید ...<br></span>";	
			}else{
			
			}
		}else{
			$msg="<span style='font-size:18px;margin:10px;color:rgba(154,154,154,1.00);'>* ایمیل را اشتباه وارد کرده اید ...<br></span>";
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

</div>
</body>
</html>
