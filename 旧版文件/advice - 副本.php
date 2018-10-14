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
    <title>反馈建议</title>
    <link rel="stylesheet" href="./css/myinfo.css">
    <link rel="stylesheet" href="./font/font-awesome-4.7.0/css/font-awesome.min.css">
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
		            <li class="nav__item"><a class="nav__link" href="./php.html"><i class="fa fa-comments"></i>&nbsp;反馈建议</a></li>
                    <li class="nav__item"><a class="nav__link" href="./index.html?link=logoff"><i class="fa fa-sign-out"></i>&nbsp;用户注销</a></li>
		            <li class="nav__item"><a class="nav__link" href="#"></a></li>
		        </ul>
	        </nav>
	        <div id="content">
                <!--导航条-->
                <div id="nav">
		            <span id="title">反馈建议</span>
		            <!--个人中心此处引入了CSS矢量图标-->
                    <div id="name">
			            <a style="color:#3d3d3d"><i class="fa fa-user"></i>&nbsp;你好，<?php echo $_SESSION['sname'];?>！</a>
		            </div>
                </div>
                <div id="info">
                    <div id="form">
                        <form method="post"action="do_adv.php">
                            <div style="padding-top: 5px;padding-bottom: 5px;width: 325px;text-align: center;border-bottom: 1px solid #888888;">
                            <i class="fa fa-comments"></i>&nbsp;请输入建议
                            </div>
                            <div id="textarea">
                                <textarea rows="10" cols="43" name="advice" style="resize: none;padding:3.5px;max-lines: 10;border-bottom: 1px solid #888888;"></textarea>
                                <div class="btn3">
                                        <input class="btn" type="submit" value="提交" />
                                        <input class="btn" type="reset" value="重置" />
                                </div>
                            </div>
                        </form>
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
<script>
    var ss;
     window.onload=function(){
    var w=document.documentElement.clientWidth ;//可见区域宽度
    var h=document.documentElement.clientHeight;//可见区域高度
    ss=document.getElementById('content');
    //alert(h);
    //ss.style.width=w+"px";
    ss.style.height=h+"px";
}

</script>