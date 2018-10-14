
<?php
session_start();
if (!isset($_SESSION['name'])){
    exit();
}
require ('../config.php');
$pagesize=8;//每页显示的记录数
@$p=$_GET['p']?$_GET['p']:1;//接收到的当前页数
$offet=($p-1)*$pagesize; //limit 所要查询的第一个参数
$query_sql="select * from student order BY id ASC limit $offet,$pagesize";//查询本页的数据
$res=mysqli_query($con,$query_sql);
//计算总留言数
$count_res=mysqli_query($con,"select count(*) as count from student");
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
        <title>学生信息</title>
        <link rel="shortcut icon" href="../favicon.ico" />
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="../font/font-awesome-4.7.0/css/font-awesome.min.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.js"></script>
</head>
<body >
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
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-heart"></i>&nbsp;座位管理 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="./bechoose.php"><i class="fa fa-user-plus"></i>&nbsp;已选座位</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="./nochoose.php"><i class="fa fa-user-times"></i>&nbsp;未选座位</a></li>
                </ul>
            </li>
            <li class="active">
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
                    <li><a href="#">学生管理</a></li>
                    <li class="active">学生信息</li>
                </ol>
            </div>
        <table class="table table-bordered table-hover">
            <tr>
                <td class="th">学号</td>
                <td class="th">姓名</td>
                <td class="th">邮箱</td>
                <td class="th">电话</td>
                <td class="th">座位号</td>
            </tr>
            <tr>
                <?php
                while ($list=mysqli_fetch_array($res))
                { ?>

                <td><?php echo $list['snum'];?></td>
                <td><?php echo $list['sname'];?></td>
                <td><?php echo $list['email'];?></td>
                <td><?php echo $list['tel'];?></td>
                <td><?php echo $list['seat'];?></td>
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
                        echo'<li><a href="student.php?p=',($p-1),'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                    for ($i = 1; $i <=$pagenum; $i++) {
                        if ($i == $p) {
                            echo '<li class="active"><a href="#">', $i, '<span class="sr-only">(current)</span></a></li>';  //因为是在本业所以不用输出超链接
                        } else {
                            echo '<li><a href="student.php?p=', $i, '">', $i, '</a></li>';
                        }
                    }
                    if($p==$pagenum){
                        echo'<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    }else{
                        echo'<li><a href="student.php?p=',($p+1),'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
            ?>
            </ul>
        </nav>
    </div>
</div>
</body>
</html>
