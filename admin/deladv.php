<?php
header("Content-Type:text/html; charset=utf8");
 	session_start();
//首先判断Cookie是否有记住用户信息
 	if (isset($_COOKIE['username'])){
		$_SESSION['username'] = $_COOKIE['username']; 
        $_SESSION['islogin'] = 1; 
 	}
 	if (isset($_SESSION['islogin'])){
	
 	} else{
	
		echo "你还未登录，请登录</a>";
     echo "<script>location.href='index.html'</script>"; // JS 跳转

}
require ('../config.php');

$seat_id=$_GET['id'];

$sql="update student set advice=''";
if ($res=mysqli_query($con,$sql)){

        echo 1;

}