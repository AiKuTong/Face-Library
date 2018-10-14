<?php session_start();
header("Content-Type:text/html; charset=utf8");
 	session_start();
//首先判断Cookie是否有记住用户信息
 	if (isset($_COOKIE['username'])){
		$_SESSION['username'] = $_COOKIE['username']; 
        $_SESSION['islogin'] = 1; 
 	}
 	if (isset($_SESSION['islogin'])){
	
 	} else{
	
		echo "你还未登录，请登录</a>";
     echo "<script>location.href='index.html'</script>"; // JS 跳转

}
if (!isset($_SESSION['name'])){
    exit(); 
} ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>座位管理系统后台</title>
        <link rel="shortcut icon" href="../favicon.ico" />
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="../font/font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.js"></script>
</head>
<body>
<div class="all">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">座位后台管理系统</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            <li class="active"><a href="./home.php"><i class="fa fa-gears"></i>&nbsp;系统配置</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-heart"></i>&nbsp;座位管理 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="./bechoose.php"><i class="fa fa-user-plus"></i>&nbsp;已选座位</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="./nochoose.php"><i class="fa fa-user-times"></i>&nbsp;未选座位</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp;学生管理 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="./student.php"><i class="fa fa-group"></i>&nbsp;学生信息</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="./lookadv.php"><i class="fa fa-envelope"></i>&nbsp;学生建议</a></li>
                </ul>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    <div class="rig_con">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ol class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li class="active">系统配置</li>
                </ol>
            </div>
            <div class="panel-body">
                
                <table class="config_tab">
                    <tr>
                        <td class="td_text_rig"><i class="fa fa-home"></i>&nbsp;站点名称:</td>
                        <td class="td_text_cen"><?php echo $_SERVER['HTTP_HOST'];?></td>
                    </tr>
                    <tr>
                        <td class="td_text_rig"><i class="fa fa-user"></i>&nbsp;默认管理员:</td>
                        <td class="td_text_cen">admin</td>
                    </tr>
                    <tr>
                        <td class="td_text_rig"><i class="fa fa-database"></i>&nbsp;数据库:</td>
                        <td class="td_text_cen">library</td>
                    </tr>
                </table>
            </div>
        </div>  
    </div>

</div>
</body>
</html>