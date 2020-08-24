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
<title>صفحه اول</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/dist/css/bootstrap-rtl.min.css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="bootstrap/dist/jquery/jquery.txt"></script>
<script src="bootstrap/dist/js/bootstrap-rtl.min.js"></script>
<link href="css/firstpage.css" rel="stylesheet" type="text/css">
</head>

<body>


		<script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript" src="js/index-ajax.js"></script>
      



<div class="page-header" id="top">
<span id="para">سایت اسبدوانی گرگان</span>
<div><p id="logo">کاربر گرامی خوش آمدید</p></div>
</div>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="firstpage.php"><span class="nav-content" style="color:#FBFBFB;font-size:25px;">صفحه اصلی</span></a>&nbsp;&nbsp;&nbsp;
    </div>
    
    <ul class="nav navbar-nav">
    
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span>&nbsp;<span class="nav-content">جداول و نتایج</span></a>
       <ul class="dropdown-menu" style="direction:rtl;">
          <li><a href="race_chart1.php" class="dropdown-a">جدول مسابقات</a></li>
          <li><a href="race_result1.php" class="dropdown-a">نتایج مسابقات</a></li>
        </ul>
       </li> 
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span><span class="nav-content">گالری</span> </a>
        <ul class="dropdown-menu" style="direction:rtl;">
          <li><a href="pic_gallery1.php" class="dropdown-a">گالری عکس</a></li>
          <li><a href="video_gallery1.php" class="dropdown-a">گالری فیلم</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span>&nbsp;<span class="nav-content">سابقه و عملکرد</span></a>
        <ul class="dropdown-menu" style="direction:rtl;">
          <li><a href="horse_info1.php" class="dropdown-a">اطلاعات اسب ها</a></li>
          <li><a href="coach_info1.php" class="dropdown-a">اطلاعات مربی ها</a></li>
          <li><a href="rider_info1.php" class="dropdown-a">اطلاعات چابک سوارها</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span>&nbsp;<span class="nav-content">پیش بینی</span></a>
        <ul class="dropdown-menu" style="direction:rtl;">
          <!-- <li><a href="#" class="dropdown-a">پیش بینی سامانه</a></li> -->
          <li><a href="predict.php" class="dropdown-a">شرکت در نظرسنجی</a></li>
        </ul>
      </li>
      
    </ul>
    
    
    <a href="logout.php"><div class="btn">
	<span>خروج </span><span class="glyphicon glyphicon-log-out"></span>
	</div></a>
    
    <a href="profile.php"><div class="profile">
	<span>پروفایل  </span><span class="glyphicon glyphicon-user"></span>
	</div></a>
    
  </div>
</nav>



<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

       <div class="item active">
        <img src="images/3.jpg" alt="Chania" >
        <div class="carousel-caption">
          <h3 style="font-family:adobe arabic;font-weight:bold;">دکتر مسعود خلیلی</h3>
          <p style="font-family:adobe arabic;font-size:19px;">رئیس فدراسیون سوارکاری</p>
        </div>
      </div>

      <div class="item">
        <img src="images/2.jpg" alt="Chania" >
        <div class="carousel-caption">
          <h3 style="font-family:adobe arabic;font-weight:bold;">کورس اول</h3>
          <p style="font-family:adobe arabic;font-size:19px;">هفته دوم بهاره اق قلا 95</p>
        </div>
      </div>
    
      <div class="item">
        <img  src="images/4.jpg" alt="Flower" >
        <div class="carousel-caption">
          <h3 style="font-family:adobe arabic;font-weight:bold;">کورس سوم</h3>
          <p style="font-family:adobe arabic;font-size:19px;">هفته اول بهاره تهران 94</p>
        </div>
      </div>

      <div class="item">
        <img src="images/1.jpg" alt="Flower">
        <div class="carousel-caption">
          <h3 style="font-family:adobe arabic;font-weight:bold;">کورس پنجم</h3>
          <p style="font-family:adobe arabic;font-size:19px;">هفته چهارم پاییزه گنبد 94</p>
        </div>
      </div>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

   
 </div>
 </div><br>

</div>

<section class="section1">
سوارکاری از ورزشهایی است که در چند دههٔ اخیر مورد توجه خاصی قرار گرفته‌است، با این وجود سابقه‌ای طولانی داشته‌است و می‌توان آن را از کهن‌ترین ورزش‌ها به‌شمار آورد. این ورزش امروزه نه تنها به عنوان یک رقابت سالم و مفید، بلکه به عنوان سرگرمی و به منظور گذراندن اوقات فراغت مورد توجه قرار گرفته‌است، و با این که نسبت به بسیاری از ورزش‌ها پرهزینه به نظر می‌رسد، هر ساله تعداد بیشتری طرفدار به سوی خود جلب می‌کند. <br>
از این رو در جهت ارتقا سطح آگاهی مردم از ورزش سنتی اسبدوانی و با توجه به کمبود یک سایت منظم و کارا در این راستا و ضعف های موجود در زمینه اطلاع رسانی مردم از این رشته ورزشی و جهت معرفی پتانسیل های بالقوه این ورزش در سطح کشور و بالاخص در سطح استان گلستان ، تصمیم بر راه اندازی سایتی گرفته ایم که با وجود اطلاع رسانی کامل در این رشته ، مردم را به مشارکت و فعالیت در این زمینه ترغیب می کند.

</section>


<div class="container" id="contain">

<div class="col-lg-4 col-md-4 col-sm-4" id="div1">
<span class="span1"  style="margin-right:70px;">قوانین و مقررات</span><br><br><br>
<a href="maghale/asbdavani-RacingColour.pdf" download><span class="inner">آیین نامه ثبت لباس اختصاصی چابکسواران</span></a><br><br>
<a href="maghale/asbdavani-law.pdf" download><span class="inner">آیین نامه مسابقات اسبدوانی کشور</span></a><br><br>
<a href="maghale/asbdavani-law.pdf" download><span class="inner">آیین نامه شرکت کنندگان در مسابقه سوارکاری</span></a>
</div>

<div class="col-lg-4 col-md-4 col-sm-4" id="div2">

<span class="span1" style="margin-right:100px;color:rgba(150,21,21,1.00);">باشگاه ها</span><br><br><br>
<span class="gym">گنبد کاووس</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="gym1">01722226869</span><br><br>
<span class="gym">بندر ترکمن</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="gym1">01734222521</span><br><br>
<span class="gym">آق قلا</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="gym1">09113732180</span><br><br>
<span class="gym">نوروز آباد</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="gym1">02166180070</span><br><br>
</div>

<div class="col-lg-4 col-md-4 col-sm-4" id="div3">

<span class="span1" style="margin-right:80px;">سایتهای مرتبط</span><br><br><br>

<span class="inner">وزارت ورزش و جوانان جمهوری اسلامی ایران</span><br>
<a href="http://www.sport.ir"><span style="color:rgba(228,57,59,1.00);margin-right:80px;">
http://www.sport.ir</span></a><br><br>

<span class="inner" style="margin-right:88px;">فدراسیون سوارکاری</span><br>
<a href="http://www.feiri.ir"><span style="color:rgba(228,57,59,1.00);margin-right:80px;">
http://www.feiri.ir</span></a><br><br>

<span class="inner" style="margin-right:83px;">فدراسیون جهانی سوارکاری</span><br>
<a href="http://www.horsesport.org"><span style="color:rgba(228,57,59,1.00);margin-right:60px;">
http://www.horsesport.org</span></a><br><br>

<span class="inner" style="margin-right:70px;">بانک اطلاعاتی پدیگری اسبها</span><br>
<a href="http://www.allbreedpedigree.com"><span style="color:rgba(228,57,59,1.00);margin-right:40px;">
http://www.allbreedpedigree.com</span></a><br><br>

</div>

</div>


<footer class="footer">
  
  <p class="designed">طراحی و توسعه توسط محمد ایشانی</p>


</footer>


        <div class="scroll-top">
            <a class="btn btn-primary" href="#top" id="to-top" style="padding-top:9px;color:white;margin-left:0px;margin-top:0px;">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>





</body>

</html>
