<?php
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
}
require ('../config.php');
$pagesize=8;//每页显示的记录数
@$p=$_GET['p']?$_GET['p']:1;//接收到的当前页数
$offet=($p-1)*$pagesize; //limit 所要查询的第一个参数
$query_sql="select * from choose_seat WHERE state='1' order BY id ASC limit $offet,$pagesize";//查询本页的数据
$res=mysqli_query($con,$query_sql);
//计算总留言数
$count_res=mysqli_query($con,"select count(*) as count from choose_seat WHERE state='1'");
$count_array=mysqli_fetch_array($count_res);
//计算总的页数
$pagenum=ceil($count_array['count']/$pagesize);
//循环输出页数及其链接

?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>已选座位</title>
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
            <li class="dropdown"><a href="./home.php"><i class="fa fa-gears"></i>&nbsp;系统配置</a></li>
            <li class="active">
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

    <div class="seat">
    <div class="panel panel-default">
        <div class="panel-heading">
            <ol class="breadcrumb">
                <li><a href="./home.php">首页</a></li>
                <li><a href="#">座位管理</a></li>
                <li class="active">已选座位</li>
            </ol>
        </div>
       <table class="table table-bordered table-hover">
           <tr>
               <td class="th">座位号</td>
               <td class="th">学号</td>
               <td class="th">预订日期</td>
               <td class="th">预订时间</td>
               <td class="th">结束日期</td>
               <td class="th">结束时间</td>
               <td class="th">解除占座</td>
           </tr>
           <tr>
           <?php
           while ($list=mysqli_fetch_array($res))
               { ?>
               <td class="th"><?php echo $list['seat_id'];?></td>
               <td class="th"><?php echo $list['snum'];?></td>
               <td class="th"><?php echo $list['choose_day'];?></td>
               <td class="th"><?php echo $list['choose_hour'];?></td>
               <td class="th"><?php echo $list['leave_day'];?></td>
               <td class="th"><?php echo $list['leave_hour'];?></td>
               <td class="th"><button id="<?php echo $list['seat_id'];?>" class="btn btn-info" onclick="noseat(this)">解除</button></td>
           </tr>
           <?php } ?>
       </table>
    </div>
    <nav aria-label="Page navigation">
            <ul class="pagination">
            <?php
                if ($pagenum>1) {
                    if($p==1){
                        echo '<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                    }else{
                        echo'<li><a href="bechoose.php?p=',($p-1),'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                    for ($i = 1; $i <=$pagenum; $i++) {
                        if ($i == $p) {
                            echo '<li class="active"><a href="#">', $i, '<span class="sr-only">(current)</span></a></li>';  //因为是在本业所以不用输出超链接
                        } else {
                            echo '<li><a href="bechoose.php?p=', $i, '">', $i, '</a></li>';
                        }
                    }
                    if($p==$pagenum){
                        echo'<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    }else{
                        echo'<li><a href="bechoose.php?p=',($p+1),'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
            ?>
            </ul>
        </nav>
    </div>
</div>
</body>

<script>
    function noseat(obj) {

        var xmlHttp=createXmlHttp();
        var id=obj.id;
        var url="donoseat.php?id="+id;
        xmlHttp.open("get",url,true);
        xmlHttp.onreadystatechange=function () {
            if (xmlHttp.readyState == 4 && xmlHttp.status ==200){
                if (xmlHttp.responseText == '1'){
                    alert('解除失败请稍后重试！');window.location.href='bechoose.php';
                }else{
                    alert('解除成功！');window.location.href='bechoose.php';
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
</html>