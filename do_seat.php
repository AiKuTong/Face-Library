<?php
date_default_timezone_set("PRC");
if (!isset($_SESSION)){
        session_start();
		$floor=$_SESSION['floor'];
	}
header('Content-Type:text/html;charset=utf-8');
$seat_num=$_POST['hidden'];
if ($seat_num==null){
    echo "<script>alert('请选择座位！');window.location.href='choose.php?floor=<?php echo $floor;?>';exit();</script>";
}
?>
<!doctype html>
<html lang="zh">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="shortcut icon" href="./favicon.ico" />
    <title>确认选座</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/store.css">
    <link rel="stylesheet" href="./font/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</head>
<body>
    <div class="form">
        <form name="form1" method="post" action="store.php" onsubmit="return checksubmit();">
            <ul class="list-group">
                <li class="list-group-item">
                <div class="tips">&nbsp;<i class="fa fa-user"></i>&nbsp;座位号码：</div><label ><?php echo $seat_num ?></label>
                <input type="hidden" name="seat_id" value="<?php echo $seat_num ?>">
                </li>
                <li class="list-group-item">
                <div class="tips"><i class="fa fa-calendar-plus-o"></i>&nbsp;预订日期：</div>
                    <select name="choose_day" class="form-control" id="checkeddate">
                        <option><?php echo date("Y-m-d")?></option>
                        <option><?php echo date("Y-m-d",strtotime("+1 day"))?></option>
                        <option><?php echo date("Y-m-d",strtotime("+2 day"))?></option>
                        <option><?php echo date("Y-m-d",strtotime("+3 day"))?></option>
                    </select>
                </li>
                <li class="list-group-item">
                <div class="tips"><i class="fa fa-clock-o"></i>&nbsp;预订时间：</div>
                    <select name="choose_hour" class="form-control" id="choose_hour">
                        <option >8时</option> <option >9时</option> <option >10时</option> <option >11时</option> <option >12时</option>
                        <option >13时</option> <option >14时</option> <option >15时</option> <option >16时</option> <option >17时</option> <option >18时</option>
                        <option >19时</option> <option >20时</option> <option >21时</option> <option >22时</option> 
                    </select>
                </li>
                <li class="list-group-item">
                <div class="tips"><i class="fa fa-calendar-plus-o"></i>&nbsp;结束日期：</div>
                    <select name="leave_day" class="form-control" id="checkdate" onchange="check_day(this)">
                        <option><?php echo date("Y-m-d")?></option>
                        <option><?php echo date("Y-m-d",strtotime("+1 day"))?></option>
                        <option><?php echo date("Y-m-d",strtotime("+2 day"))?></option>
                        <option><?php echo date("Y-m-d",strtotime("+3 day"))?></option>
                    </select>
                </li>
                <li class="list-group-item">
                <div class="tips"><i class="fa fa-clock-o"></i>&nbsp;结束时间：</div>
                    <select name="leave_hour" class="form-control" id="leave_hour" onBlur="check_hour(this)">
                    <option >8时</option> <option >9时</option> <option >10时</option> <option >11时</option> <option >12时</option>
                        <option >13时</option> <option >14时</option> <option >15时</option> <option >16时</option> <option >17时</option> <option >18时</option>
                        <option >19时</option> <option >20时</option> <option >21时</option> <option >22时</option> 
                     </select>
                </li>
                <li class="list-group-item">
                    <div class="btn-all">
                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;确认选座</button>
                    <a href="./choose.php?floor=<?php echo $floor;?>"><button type="button" class="btn btn-warning"><i class="fa fa-close"></i>&nbsp;重新选座</button></a>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</body>
<script>
    //测试选择日期
    function check_day() {
        var selected  = document.getElementById('checkeddate');
        var indexed=selected.selectedIndex;
        var dayed=selected.options[indexed].text;

        var select  = document.getElementById('checkdate');
        var index=select.selectedIndex;
        var day=select.options[index].text;

        var starttime=new Date(dayed);
        var endtime=new Date(day);
        if (starttime.getTime()>endtime.getTime()){
            alert('请选择正确的日期');
        }
     }
    //测试选择时间
    function checkhour(){
        var select = document.getElementById("choose_hour");
        var starthour = select.value;

        var select = document.getElementById("leave_hour");
        var endhour = select.value;
        if(starttime.getTime()==endtime.getTime()){
        if(starthour>endhour){
            alert('请选择正确的时间');
        }
        }
    }
    //最终检查结果
    function checksubmit(){
        var selected  = document.getElementById('checkeddate');
        var indexed=selected.selectedIndex;
        var dayed=selected.options[indexed].text;

        var select  = document.getElementById('checkdate');
        var index=select.selectedIndex;
        var day=select.options[index].text;

        var starttime=new Date(dayed);
        var endtime=new Date(day);
        if (starttime.getTime()>endtime.getTime()){
            alert('请选择正确的日期');
            return false;
        }
    }

</script>
</html>
