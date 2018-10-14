<?php
//处理ajax请求页面，解除占用的座位
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

$sql="update choose_seat set snum='0',choose_day='',choose_hour='',leave_day='',leave_hour='',state='0' WHERE seat_id='$seat_id'";
$sql1="update student set seat='' WHERE seat='$seat_id'";
if ($res=mysqli_query($con,$sql)){
    if (!($res1=mysqli_query($con,$sql1))){
        echo 1;
    }
}