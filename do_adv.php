<?php
//插入建议的页面
session_start();
 	if (isset($_COOKIE['user'])){
		$_SESSION['user'] = $_COOKIE['user']; 
        $_SESSION['islogin'] = 1; 
 	}
 	if (isset($_SESSION['islogin'])){
	
 	} else{
	
		echo "你还未登录，请登录</a>";
     echo "<script>location.href='index.html'</script>"; // JS 跳转

}
$snum=$_SESSION['snum'];
require ('config.php');
$adv=$_POST['advice'];
if($adv==""){
     echo "<script> alert('反馈建议不能为空！');window.location.href='advice.php';</script>";
}else{
    $update="update student set advice='$adv' WHERE snum='$snum'";
    if (mysqli_query($con,$update)){
        echo "<script> alert('提交成功');window.location.href='advice.php';</script>";
    }else{
        echo "<script> alert('提交失败，请稍后重试。');window.location.href='advice.php';</script>";
    }
}