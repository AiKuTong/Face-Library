<?php
require("config.php");
//ajax请求处理页面,修改个人信息页面的邮箱和电话
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

    $db=mysqli_select_db($con,'library');
    $q=$_GET['q'];
    $row=explode(',',$q);
    $val=$row[0];
    $id=$row[1];
    $snum=$_SESSION['snum'];

    if ($id==1){
        $sql="UPDATE student set email='$val' WHERE snum='$snum'";
    }if($id==2){
        $sql="UPDATE student set tel='$val'  WHERE  snum='$snum'";
    }
    if (mysqli_query($con,$sql)){
        echo 1;
    }
}




