<?php
    if (!isset($_SESSION)){
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
        include ('config.php');
        @$snum=$_SESSION['snum'];
        @$oldpass = $_POST['oldpass'];
        @$newpass = $_POST['newpass'];
        mysqli_query($con,"set names utf8");
        $sql="select * from student WHERE snum='$snum'";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($res);
    }
    $old_pass=md5($oldpass);
    $new_pass=md5($newpass);
    if($oldpass==""||$newpass==""){
        echo "<script>alert('新密码和旧密码输入不能为空！');window.location='myinfo.php'</script>";
    }else if(strlen($newpass)<6||strlen($newpass)>16){
        echo "<script>alert('新密码长度必须大于6位小于16位！');window.location='myinfo.php';</script>";
    }else if($row['pwd']===$old_pass){
        $update="update student set pwd='$new_pass' where snum='$snum'";
        if(mysqli_query($con,$update)){
            echo"<script>alert('修改密码成功，请重新登录！');window.location='index.html';</script>";
        }else{
            echo "<script>alert('修改密码失败，请稍后重试！');window.location='myinfo.php';</script>";
        }
    }else{
        echo "<script>alert('旧密码不正确,请检查您输入的旧密码！');window.location='myinfo.php';</script>";
    }
?>