<?php
    include ('config.php');
    require_once __DIR__ . '/faceid/AipFace.php';
    const APP_ID = '14335899';
    const API_KEY = 'z9cfhRjcMEL0cF2lk0wSArm6';
    const SECRET_KEY = 'gZtzVLubYXGvoOFFvthd0XxQqbDlBwY2';
    mysqli_query($con,"set names utf8");
    $sname=$_POST['sname'];
    $pwd=$_POST['pwd'];
    $snum=$_POST['snum'];
    $email=$_POST['email'];
    $pwd2=$_POST['pwd2'];
    $sql="select * from student WHERE snum='$snum'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    if(($pwd != $pwd2)||($snum==$row['snum'])){
        echo "<script>alert('注册信息有误，请检查输入的内容！');window.location.href='rec.html';</script>";
    }else{
        if (!mysqli_select_db($con,'library')){
            echo "<script>alert('连接数据库失败，请稍后尝试！');window.location.href='rec.html';</script>";
        }else{
            $md_pwd=md5($pwd);
            $insert="insert into student(sname,snum,pwd,email)VALUES('$sname','$snum','$md_pwd','$email') ";
            if(mysqli_query($con,$insert)){
                if(file_exists('./temp-img/'.$snum.'.jpg')){
                    $client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
                    $image='http://'.$_SERVER['HTTP_HOST'].'/temp-img/'.$snum.'.jpg';
                    $imageType="URL";
                    $groupId="Library";
                    $userId=$snum;
                    //echo $image;
                    //var_dump($client->addUser($image, $imageType, $groupId, $userId));
                    $client->addUser($image, $imageType, $groupId, $userId);
                }
                echo "<script>alert('注册成功，去登录');window.location='index.html';</script>";
            }else{
                echo"<script>alert('注册失败！');</script>";
            }
        }
    }
    mysqli_close($con);
?>
