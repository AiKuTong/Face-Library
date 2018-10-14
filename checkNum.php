<?php
require("config.php");
//ajax请求处理页面,
if($con/*=mysqli_connect('localhost','library','fWZj6yLDww4HSkKE')*/){
    $snum=$_POST['snum'];
    $db=mysqli_select_db($con,'library');
    $sql="select * from student WHERE snum='$snum'";
   $res=mysqli_query($con,$sql);
  if(mysqli_fetch_array($res)){
       echo 1;
  }
}
?>