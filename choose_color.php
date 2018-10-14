<?php
require("config.php");
//ajax请求页面，把自己选择的座位的颜色变成红色
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
if($con/*=mysqli_connect('localhost','library','fWZj6yLDww4HSkKE')*/) {

    $db = mysqli_select_db($con, 'library');
    $seat = $_GET['seat'];
    $snum = $_SESSION['snum'];
    $select="select seat from student WHERE snum='$snum'";
    $res=mysqli_query($con,$select);
    $row=mysqli_fetch_row($res);
    if ($row[0]==$seat){
        echo $row[0];
    }
}