<?php
	header("Content-Type:text/html; charset=utf8");
 	session_start();
 	//首先判断Cookie是否有记住用户信息
 	if (isset($_COOKIE['user'])){
		$_SESSION['user'] = $_COOKIE['user']; 
        $_SESSION['islogin'] = 1; 
 	}
 	if (isset($_SESSION['islogin'])){
	
 	} else{
	
		echo "你还未登录，请登录</a>";
     echo "<script>location.href='index.html'</script>"; // JS 跳转

}


  $floor=$_GET['floor'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>图书馆座位信息示意图</title>
    <style>
        #map{
            margin: 50px auto;
            width: 500px;
            height: 500px;
        }
        #title{width: 170px;margin: 0px auto;}
      #return{
      	width:100px;
        height:30px;
        margin:0px auto;
      }
    </style>
</head>
<body>
    <div id="map">
        <div id="title">图书馆座位信息示意图</div>
        <img src="./images/map<?php echo $floor;?>.jpg" alt="" srcset="" />
      <div id="return"><a href="javascript:;" onclick="javascript:history.back();">返回选座界面</a></div>
    </div>
</body>
</html>