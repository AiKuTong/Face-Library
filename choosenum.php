<?php
require("config.php");
//ajax请求处理页面,判断是否已经选择了座位，一个学生只能选择一个座位
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
if($con/*=mysqli_connect('localhost','library','fWZj6yLDww4HSkKE')*/){
    $snum=$_SESSION['snum'];
    $db=mysqli_select_db($con,'library');
    $sql="select seat from student WHERE snum='$snum'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    if($row[0]!=0){
        echo 1;
    }
}