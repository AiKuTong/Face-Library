<!DOCTYPE html>
<html>
<head>
  <title>页面加载中 请稍等</title>
  <style type="text/css">
    /*
 *  Usage:
 *
      <div class="sk-double-bounce">
        <div class="sk-child sk-double-bounce1"></div>
        <div class="sk-child sk-double-bounce2"></div>
      </div>
 *
 */
.sk-double-bounce {
  width: 40px;
  height: 40px;
  position: relative;
  margin: 40px auto; }
  .sk-double-bounce .sk-child {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: #333;
    opacity: 0.6;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-animation: sk-doubleBounce 2s infinite ease-in-out;
            animation: sk-doubleBounce 2s infinite ease-in-out; }
  .sk-double-bounce .sk-double-bounce2 {
    -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s; }

@-webkit-keyframes sk-doubleBounce {
  0%, 100% {
    -webkit-transform: scale(0);
            transform: scale(0); }
  50% {
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes sk-doubleBounce {
  0%, 100% {
    -webkit-transform: scale(0);
            transform: scale(0); }
  50% {
    -webkit-transform: scale(1);
            transform: scale(1); } }

  </style>
</head>
<body>
 

      <div class="sk-double-bounce">
        <div class="sk-child sk-double-bounce1"></div>
        <div class="sk-child sk-double-bounce2"></div>
      </div>
</body>
</html>
<?php 
  require 'compress-img.php';
    require_once __DIR__ . '/faceid/AipFace.php';
    const APP_ID = '你的id';
    const API_KEY = '你的key';
    const SECRET_KEY = '你的秘钥';
include ('config.php'); 
if(!isset($_SESSION)){
    session_start();
    $_SESSION['id']=2;
}

if($_FILES["file"]["error"])
{
    echo $_FILES["file"]["error"];    
    echo"<script>alert('上传出错请重试！');window.close();</script>";
}
else
{
    //没有出错
    //加限制条件
    //判断上传文件类型为png或jpg且大小不超过4096000B
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<4096000)
    {
            //防止文件名重复
            $filename ="./temp-img/".time().$_FILES["file"]["name"];
            //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
            $filename =iconv("UTF-8","gb2312",$filename);
             //检查文件或目录是否存在
            if(file_exists($filename))
            {
                echo"<script>alert('该文件已存在,请勿重复上传');window.close();</script>";
            }
            else
            {  
                //保存文件,   move_uploaded_file 将上传的文件移动到新位置  
                move_uploaded_file($_FILES["file"]["tmp_name"],$filename);//将临时地址移动到指定地址
                $percent = 1;  #原图压缩，不缩放，但体积大大降低
                $image = (new imgcompress($filename,$percent))->compressImg($filename);
                $file=substr($filename,1);
                $image_face='http://'.$_SERVER['HTTP_HOST'].$file;
                $client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
                $perInfo=$client->search($image_face, "URL", "Library");

              /*echo"$perInfo";echo'<br />'; echo'<br />'; echo'<br />';*/
              
                //echo $image_face;
                //echo '<br />';
                //var_dump($perInfo);
                //echo '<br />';
                //var_dump($arr);
              
                if(@$perInfo['error_msg']=="SUCCESS"&&$perInfo['result']['user_list'][0]['score']>75){
                  
                  /*echo'<br /><br /><br /><br /><br /><br />识别度大于70<br />';*/
                  
                   $snum=$perInfo['result']['user_list'][0]['user_id'];

                    $sql="SELECT * FROM student WHERE snum='$snum'";
                    $res=mysqli_query($con,$sql);
                    $row=mysqli_fetch_array($res);
                    if ($snum==$row['snum']){
                        $_SESSION["sname"]=$row['sname'];
                        $_SESSION['snum']=$snum;
                      	$_SESSION['user'] = $snum; 
						$_SESSION['islogin'] = 1; 
                        echo "<script>window.location='choose-seat.php';</script>";
                      
                    }
                }else{
                    echo"<script>alert('面部识别信息错误！');window.location='faceid.html';</script>";
                }
            }        
    }
    else
    {
        echo"<script>alert('请上传小于4MB的正确JPG格式文件！');window.location='faceid.html';</script>";
    }
}


?>  
