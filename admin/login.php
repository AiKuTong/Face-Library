<?php
session_start();
$_SESSION['name']=$_POST['u'];
require ('../config.php');
$name=$_POST['u'];
$pwd=$_POST['p'];
$time=date("Y-m-d H:i-s");
$select="select * from admin where name='$name'";
$res=mysqli_query($con,$select);
$row=mysqli_fetch_array($res);
if ($pwd == $row['pwd']){
    echo "<script>alert('登录成功');window.location.href='home.php'</script>";
  				$_SESSION['username'] = $name; 
				$_SESSION['islogin'] = 1; 
}else{
    echo "<script>alert('登录失败，请检查你的账号或密码！');window.location.href='./index.html'</script>";
}
