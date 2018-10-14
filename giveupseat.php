<?php
//     ajax请求处理页面 放弃已经选择的座位
require("config.php");
session_start();
 	//首先判断Cookie是否有记住用户信息
 	if (isset($_COOKIE['user'])){
		$_SESSION['user'] = $_COOKIE['user']; 
        $_SESSION['islogin'] = 1; 
 	}
 	if (isset($_SESSION['islogin'])){
	
 	} else{
	
		echo "你还未登录，请登录</a>";
     echo "<script>location.href='index.html'</script>"; // JS 跳转

}
if($con/*=mysqli_connect('localhost','library','fWZj6yLDww4HSkKE')*/) {

    $db = mysqli_select_db($con, 'library');
    $seat_id = $_GET['seat_id'];//接收传过来的座位号
    $update="update choose_seat set state='0',choose_day='null',choose_hour='null',leave_day='null',leave_hour='null',snum='' WHERE seat_id='$seat_id'";
    $update1="update student set seat='0' WHERE seat='$seat_id'";
    //$res=mysqli_query($con,$update);
    //$res1=mysqli_query($con,$update1);
    if(mysqli_query($con,$update1) && mysqli_query($con,$update)){
        echo 1;
    }
//    if($count=mysqli_affected_rows($con)){
//        echo $count;
//    }

}