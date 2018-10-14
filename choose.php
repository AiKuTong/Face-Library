<?php
	require("config.php");
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
	$_SESSION['floor']=$_GET['floor'];
	$snum=$_SESSION['snum'];
	$floor=$_GET['floor'];
	header('Content-Type:text/html;charset=utf-8');
	//$con=mysqli_connect('localhost','library','fWZj6yLDww4HSkKE');
	if (mysqli_select_db($con,'library')){

	}
	if (mysqli_query($con,"set names utf8")){

	}
	$sql="SELECT * FROM choose_seat WHERE floor_num='".$floor."'";
	if ($res=mysqli_query($con,$sql)){

	}

	while ($row=mysqli_fetch_array($res)){
		$source[]=$row;
	}
//foreach ($seat_id as $value){}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<title>当前座位信息</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="./favicon.ico" />
	<link rel="stylesheet" type="text/css" href="./css/choose.css">
	<link rel="stylesheet" href="./font/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- <script type="text/javascript" src="fun.js"></script> -->
	<!-- 引入样式 -->
	<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
	<!-- 引入组件库 -->
	<script src="https://unpkg.com/element-ui/lib/index.js"></script>
</head>
<body>
	<!--设置网页背景图片--> 
	<div id="web_bg" style="background-image: url(./images/shuzhuo1.jpg);"></div>
	<div class="all">
		<!--顶部导航栏-->
		<div id="head">
			<span id="title">当前座位信息状况</span>
			<!--个人中心此处引入了CSS矢量图标-->
        	<div id="myinfo">
				<a href="myinfo.php" style="color:#3d3d3d"><i class="fa fa-user-circle-o"></i>&nbsp;个人中心</a>
			</div>
		</div>
		<!--状态提示-->
		<div id="status">
			<p id="tip">状态提示</p>
			<ul>
				<li id="status1">已选座位</li>
				<li id="status2">被选座位</li>
				<li id="status0">空闲座位</li>
			</ul>
		</div>
		<div class="floor_num">
<!--		<a href="index.php" class="num">1</a>-->
<!--		<a href="#" class="num">2</a>-->
<!--		<a href="#" class="num">3</a>-->
<!--		<a href="#" class="num">4</a>-->
<!--		<span style="float: right;margin-top: 20px;margin-right: 50px" ><img src="sign.png"></span>-->
		</div>
		<!--显示选择的座位-->
		<div class="seat_choose">
			<table>
				<div id="info">
					<?php
						echo 111;
					?>
				</div>
				<tr>
				<!--循环输出座位-->
					<?php
						foreach ($source as $item){ ?>
						<td class="seat_num" onclick="choose(this)"  id="<?php echo $item['seat_id'] ?>" name="<?php echo $item['state']?>"><i class="fa fa-male"></i>&nbsp;<?php echo $item['seat_id'] ?></td>
					<?php	} ?>

				</tr>

				<tr class="show_seat">
                  <p id="seat_map" style="margin-bottom:10px;"><a href="./map.php?floor=<?php echo $floor;?>">**座位信息示意图**</a></p>
					<p id="seat_info" name="seat_info">请选择您的座位！</p>

				</tr>
				<tr class="btn">
					<form name="form1" action="do_seat.php" method="post">
						<input type="hidden" name="hidden">

						<td class="submit"><input type="submit" onclick="trans()" value="确认选座" >
							<a href="choose.php?floor=<?php echo $floor;?>"  class="">取消选择</a>
                		</td>
					</form>
				</tr>
			</table>
		</div>
	</div>
</body>
<script type="text/javascript">
	var v1= document.getElementsByTagName('td');
	var xmlHttp=createXmlHttp();
	for(i=0;i<v1.length-1;i++){
		if (v1[i].getAttribute('name')==1){

                v1[i].style.backgroundImage="linear-gradient(60deg, #29323c 0%, #949697 100%)";
                var seat= v1[i].id;
                var url="choose_color.php?seat="+seat;
                xmlHttp.open("get",url,false);
                xmlHttp.onreadystatechange=function () {
                    if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
                        if(xmlHttp.responseText==seat){
                            v1[i].style.backgroundImage="linear-gradient(to top, #ff0844 0%, #ffb199 100%)";
                        }
                    }
                }
                xmlHttp.send(null);
		}else {
			    v1[i].style.backgroundImage="linear-gradient(to right, #0fd850 0%, #f9f047 100%)";
		}
	}
	window.count=0;
	function choose(obj) {

	    var xmlHttp=createXmlHttp();
	    var url="choosenum.php";
	    xmlHttp.open("get",url,true);
        xmlHttp.onreadystatechange=function () {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
              if (xmlHttp.responseText =='1'){
                  alert('只能选择一个座位!');window.location.href='choose.php?floor=<?php echo $floor;?>';
              }
            }
        }
        xmlHttp.send(null);

		if (obj.getAttribute('name')==1){
			alert("该位置已被选，请重新选择");
			window.location.href="choose.php?floor=<?php echo $floor;?>";
			exit();
		}
	else if (count>=1) {
			 alert("一次只能选择一个座位！")
			 window.location.href="choose.php?floor=<?php echo $floor;?>";
         }else{
		window.nid=obj.id;
		document.getElementById("seat_info").innerText="你选择的座位号为:"+obj.innerText;
         obj.style.backgroundImage="linear-gradient(to right, #f83600 0%, #f9d423 100%)";
         count++;
         }
	}

	function trans() {
		document.form1.hidden.value=nid;
	}

    function createXmlHttp() {
        var xmlHttp = null;

        try {
            //Firefox, Opera 8.0+, Safari
            xmlHttp = new XMLHttpRequest();
        } catch (e) {
            //IE
            try {
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }

        return xmlHttp;
    }
</script>
</html>