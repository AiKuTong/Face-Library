<?php
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
$floor=$_SESSION['floor'];
$snum=$_SESSION['snum'];
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18 0018
 * Time: 下午 3:24
 */
header('Content-Type:text/html;charset=utf-8');
//$con=mysqli_connect('localhost','library','fWZj6yLDww4HSkKE');
if(!$con){
    echo "no";
}
mysqli_select_db($con,'library');
mysqli_query($con,"set names utf8");
$seat_id=$_POST['seat_id'];
$choose_day=$_POST['choose_day'];
$choose_hour=$_POST['choose_hour'];
$leave_day=$_POST['leave_day'];
$leave_hour=$_POST['leave_hour'];
$update1="UPDATE student set seat='$seat_id' WHERE snum='$snum'";
//$insert="insert into student(seat)VALUES('$seat_id') WHERE snum='$snum'";
$update="UPDATE choose_seat set state=1,choose_day='$choose_day',choose_hour='$choose_hour',leave_day='$leave_day',leave_hour='$leave_hour',snum='$snum' WHERE seat_id=$seat_id";
//$insert="insert into choose_seat(seat_id,state,floor_num,choose-day,choose_hour,leave_day,leave_hour)values('$seat_id',1.1,'$choose_day','$choose_hour','$leave_day','$leave_hour')";
if (!mysqli_query($con,$update1)){
    echo "<script> alert(111);</script>";
}
if (mysqli_query($con,$update)){
    echo"<script>alert('选座成功');window.location.href='choose.php?floor=$floor'</script>";
}else{
    echo"<script>alert('选座失败');</script>";
}

