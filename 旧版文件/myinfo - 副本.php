<?php 
    if (!isset($_SESSION)){
        session_start();
        require ('config.php');
        $snum=$_SESSION['snum'];
        $select="select * from student WHERE snum='$snum'";
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
    <title>个人中心</title>
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
		            <li class="nav__item"><a class="nav__link" href="./choose.php"><i class="fa fa-check-square"></i>&nbsp;选座界面</a></li>
		            <li class="nav__item"><a class="nav__link" href="./aboutseat.php"><i class="fa fa-history"></i>&nbsp;座位取消</a></li>
		            <li class="nav__item"><a class="nav__link" href="./advice.php"><i class="fa fa-comments"></i>&nbsp;反馈建议</a></li>
                    <li class="nav__item"><a class="nav__link" href="./index.html?link=logoff"><i class="fa fa-sign-out"></i>&nbsp;用户注销</a></li>
		            <li class="nav__item"><a class="nav__link" href="#"></a></li>
		        </ul>
	        </nav>
	        <div id="content">
                <!--导航条-->
                <div id="nav">
		            <span id="title">个人中心</span>
		            <!--个人中心此处引入了CSS矢量图标-->
                    <div id="name">
			            <a style="color:#3d3d3d"><i class="fa fa-user"></i>&nbsp;你好，<?php echo $_SESSION['sname'];?>！</a>
		            </div>
                </div>
                <div id="info">
                <table class="table">
                    <tr>
                        <td ><div class="td1">&nbsp;<i class="fa fa-user"></i>&nbsp;姓&nbsp;名: </div></td>
                        <td class="td2"><?php echo $_SESSION['sname'] ?></td>
                    </tr>
                    <tr>
                        <td><div class="td1"><i class="fa fa-id-card"></i>&nbsp;学&nbsp;号:</div></td>
                        <td class="td2"><?php echo $_SESSION['snum'] ?></td>
                    </tr>
                    <tr>
                        <td>
                        <div class="td1"><i class="fa fa-envelope"></i>&nbsp;邮&nbsp;箱:</div>
                        </td>
                        <td class="td2">
                            <span ><input type="text" id="email" value="<?php echo $row['email'] ?>"></span>
                        </td>
                        <td > <button class="btn" id="1" onclick="change(this)">修改</button></td>
                    </tr>

                    <tr>
                        <td><div class="td1"><i class="fa fa-phone"></i>&nbsp;电&nbsp;话:</div></td>
                    <td class="td2">
                        <input type="text"  id="tel" value="<?php echo $row['tel'] ?>">
                    </td>
                        <td ><button class="btn" id="2" onclick="change(this)" >修改</button></td>

                    </tr>

                    </table>
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


    function change(obj) {
        var xmlHttp=createXmlHttp();

////        //判断修改的是email还是tel信息. q为要更新的值，p为修改的字段名
            if(obj.id==1){
                var q=document.getElementById('email').value+","+1;

            }
            else{
                var q=document.getElementById('tel').value+","+2;

            }


            if (xmlHttp==null){
                alert('你的浏览器不支持ajax');
                return;
            }
        var url="do_myinfo.php?q="+q;
        xmlHttp.open("get",url,true);
    xmlHttp.onreadystatechange=function () {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
            if(xmlHttp.responseText=='1'){
                alert('信息修改成功！');window.location.href="myinfo.php";
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