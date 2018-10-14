<?php 
    if (!isset($_SESSION)){
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
		$floor=$_SESSION['floor'];
        require ('config.php');
        $snum=$_SESSION['snum'];
        $select="select * from choose_seat WHERE snum='$snum'";
        $res=mysqli_query($con,$select);
        $row=mysqli_fetch_array($res);
    }
    header('Content-Type:text/html;charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./favicon.ico" />
    <title>座位信息</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/myinfo.css">
    <link rel="stylesheet" href="./font/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</head>
<body>
    <div class="mobile">
	    <div class="mobile_screen">
	        <a href="#" class="nav__trigger"><span class="nav__icon"></span></a>
	        <nav class="nav">
		        <ul class="nav__list">
		            <li class="nav__item"><a class="nav__link" href="./myinfo.php"><i class="fa fa-drivers-license"></i>&nbsp;我的信息</a></li>
		            <li class="nav__item"><a class="nav__link" href="./choose-seat.php"><i class="fa fa-home"></i>&nbsp;楼层界面</a></li>
                    <li class="nav__item"><a class="nav__link" href="./choose.php?floor=<?php echo $floor;?>"><i class="fa fa-check-square"></i>&nbsp;选座界面</a></li>
		            <li class="nav__item"><a class="nav__link" href="./aboutseat.php"><i class="fa fa-history"></i>&nbsp;座位取消</a></li>
		            <li class="nav__item"><a class="nav__link" href="./advice.php"><i class="fa fa-comments"></i>&nbsp;反馈建议</a></li>
                    <li class="nav__item"><a class="nav__link" href="./logout.php"><i class="fa fa-sign-out"></i>&nbsp;用户注销</a></li>
		            <li class="nav__item"><a class="nav__link" href="#"></a></li>
		        </ul>
	        </nav>
	        <div id="content">
                <!--导航条-->
                <div id="nav">
		            <span id="title">座位信息</span>
		            <!--个人中心此处引入了CSS矢量图标-->
                    <div id="name">
			            <a style="color:#3d3d3d"><i class="fa fa-user"></i>&nbsp;你好，<?php echo $_SESSION['sname'];?>！</a>
		            </div>
                </div>
                <div id="info">
                    <div id="pan-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">已选座位信息</h3>
                            </div>
                            <div class="panel-body">
                                <div class="info-all">
                                    <div class="td1">
                                        <i class="fa fa-male"></i>&nbsp;座&nbsp;位&nbsp;号:
                                    </div>
                                    <div class="td2content">
                                        <?php echo $row['seat_id'] ?>
                                    </div>
                                </div>
                                <div class="info-all">
                                    <div class="td1">
                                        <i class="fa fa-calendar"></i>&nbsp;选座日期:
                                    </div>
                                    <div class="td2content">
                                        <?php echo $row['choose_day'] ?>-<?php echo $row['choose_hour'] ?>
                                    </div>
                                </div>
                                <div class="info-all">
                                    <div class="td1">
                                        <i class="fa fa-calendar"></i>&nbsp;结束日期:
                                    </div>
                                    <div class="td2content">
                                        <?php echo $row['leave_day'] ?>-<?php echo $row['leave_hour'] ?>
                                    </div>
                                </div>
                                <div class="btn-quit">
                                    <button type="button" class="btn btn-warning" onclick="giveup(this)" id="<?php echo $row['seat_id'] ?>"><i class='fa fa-close'></i>&nbsp;取消选座</button>
                                    <a href="choose.php?floor=<?php echo $floor;?>"><button type="button" class="btn btn-info"><i class='fa fa-home'></i>&nbsp;选座界面</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
		</div>
  </div>


<script src="./js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		$('.nav__trigger').on('click', function(e){
			  e.preventDefault();
			  $(this).parent().toggleClass('nav--active');
			});
	})
</script>

</body>
</html>
<script language="javascript">
    var ss;
    window.onload=function(){
        var w=document.documentElement.clientWidth ;//可见区域宽度
        var h=document.documentElement.clientHeight;//可见区域高度
        ss=document.getElementById('content');
        //alert(h);
        //ss.style.width=w+"px";
        ss.style.height=h+"px";
    }


    //取消选座
    function giveup(obj) {

var xmlHttp=createXmlHttp();
var seat_id=obj.id;
if (seat_id == ""){
    alert("请先选择座位！");
    exit();
}
var url="giveupseat.php?seat_id="+seat_id;
xmlHttp.open("get",url,true);
xmlHttp.onreadystatechange=getDate;
function getDate() {
    if (xmlHttp.readyState == 4){
        if (xmlHttp.status == 200 ){
            
           if (xmlHttp.responseText == 1){
               alert('解除座位成功！');window.location.href='aboutseat.php';
           }
        }
    }
}

xmlHttp.send(null);
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