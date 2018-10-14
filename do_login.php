<?php
if(!isset($_SESSION)){
    session_start();

    $_SESSION['id']=2;
}
include ('config.php');
$snum=$_POST['login_user'];
$pwd=$_POST['login_pwd'];
$sql="SELECT * FROM student WHERE snum='$snum'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
if (md5($pwd)==$row['pwd']){
    $_SESSION["sname"]=$row['sname'];
    $_SESSION['snum']=$_POST['login_user'];
    echo "<script>alert('登录成功,提示信息：\\n1、使用本网站进行选座每次每人只能选一个座位。\\n2、请不要浪费宝贵的座位为他人带来不便。\\n3、座位取消请在个人中心进行。');window.location='choose-seat.php';</script>";
//    echo $_SESSION['sname'];

				$_SESSION['user'] = $snum; 
				$_SESSION['islogin'] = 1; 
}else{


    echo "<script>alert('用户名或者密码错误，请重新登录！');window.location.href='index.html'</script>";
}