<?php
	session_start();
	$username=$_SESSION['username'];
	$_SESSION=array();
	session_unset();
	session_destroy();
	setcookie('remember_code','',time()-10);
	$connection=mysqli_connect('localhost','root','','asbdavani');
	$query="delete from users_remember where username='$username'";
	mysqli_query($connection,$query);
	header("location:mainpage.php");
	exit('redirect to login page');
?>