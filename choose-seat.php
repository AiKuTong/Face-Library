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

	require './config.php';
	$sql1="select count('state') as 'seat' from choose_seat where floor_num='1'and state='0'";
	$sql2="select count('state') as 'seat' from choose_seat where floor_num='2'and state='0'";
	$sql3="select count('state') as 'seat' from choose_seat where floor_num='3'and state='0'";
	$sql4="select count('state') as 'seat' from choose_seat where floor_num='4'and state='0'";
	$res=mysqli_query($con,$sql1);
	$row1=mysqli_fetch_array($res);
	$res=mysqli_query($con,$sql2);
	$row2=mysqli_fetch_array($res);
	$res=mysqli_query($con,$sql3);
	$row3=mysqli_fetch_array($res);
	$res=mysqli_query($con,$sql4);
	$row4=mysqli_fetch_array($res);
	/*echo $row['seat'];*/
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>鲁南大学图书馆座位预约系统</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<script>
		document.documentElement.className = "js";
		var supportsCssVars = function() { var e, t = document.createElement("style"); return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e };
		supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
		</script>
	</head>
	<body>
		<svg class="hidden">
			<symbol id="icon-arrow" viewBox="0 0 24 24">
				<title>arrow</title>
				<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 " />
			</symbol>
			<symbol id="icon-drop" viewBox="0 0 24 24">
				<title>drop</title>
				<path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z" />
				<path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z" />
			</symbol>
		</svg>
		<main>
			
			<div class="slideshow">
				<div class="slide">
					<div class="slide__img-wrap">
						<div class="slide__img" style="background-image: url(images/1.jpg);"></div>
						<div class="slide__img-reveal"></div>
					</div>
					<div class="slide__title-wrap">
						<h3 class="slide__title"><div class="slide__box"></div><span class="slide__title-inner">鲁南大学图书馆</span></h3>
						<h4 class="slide__subtitle"><div class="slide__box"></div><span class="slide__subtitle-inner">第一层</span></h4>
						<p class="slide__quote"><em>"书是人类进步的阶梯"</em> &mdash; 高尔基</p>
                      	<p class="slide__quote">当前楼层剩余座位数:<span style="color:red;"><b><?php echo $row1['seat'];?></b></span></p>
						<a class="slide__explore" href="choose.php?floor=1" ><span class="slide__explore-inner">进入选座</span></a>
					</div>
					<span class="slide__number">01</span>
					<div class="slide__side">
						<span class="slide__info">Lunan University Library &mdash; 2018</span>
						<h5 class="slide__category">Seat Reservation System</h5>
					</div>
				</div>
				<div class="slide">
					<div class="slide__img-wrap">
						<div class="slide__img" style="background-image: url(images/2.jpg);"></div>
						<div class="slide__img-reveal"></div>
					</div>
					<div class="slide__title-wrap">
						<h3 class="slide__title"><div class="slide__box"></div><span class="slide__title-inner">鲁南大学图书馆</span></h3>
						<h4 class="slide__subtitle"><div class="slide__box"></div><span class="slide__subtitle-inner">第二层</span></h4>
						<p class="slide__quote"><em>"重要的不是知识的数量，而是知识的质量，有些人知道很多很多，但却不知道最有用的东西。"</em> &mdash; 托尔斯泰</p>
						<p class="slide__quote">当前楼层剩余座位数:<span style="color:red;"><b><?php echo $row2['seat'];?></b></span></p>
						<a class="slide__explore" href="choose.php?floor=2" ><span class="slide__explore-inner">进入选座</span></a>
					</div>
					<span class="slide__number">02</span>
					<div class="slide__side">
						<span class="slide__info">Lunan University Library &mdash; 2018</span>
						<h5 class="slide__category">Seat Reservation System</h5>
					</div>
				</div>
				<div class="slide">
					<div class="slide__img-wrap">
						<div class="slide__img" style="background-image: url(images/3.jpg);"></div>
						<div class="slide__img-reveal"></div>
					</div>
					<div class="slide__title-wrap">
						<h3 class="slide__title"><div class="slide__box"></div><span class="slide__title-inner">鲁南大学图书馆</span></h3>
						<h4 class="slide__subtitle"><div class="slide__box"></div><span class="slide__subtitle-inner">第三层</span></h4>
						<p class="slide__quote"><em>"读一本好书，就是和许多高尚的人谈话。"</em> &mdash; 歌德</p>
						<p class="slide__quote">当前楼层剩余座位数:<span style="color:red;"><b><?php echo $row3['seat'];?></b></span></p>
						<a class="slide__explore" href="choose.php?floor=3"  ><span class="slide__explore-inner">进入选座</span></a>
					</div>
					<span class="slide__number">03</span>
					<div class="slide__side">
						<span class="slide__info">Lunan University Library &mdash; 2018</span>
						<h5 class="slide__category">Seat Reservation System</h5>
					</div>
				</div>
				<div class="slide">
					<div class="slide__img-wrap">
						<div class="slide__img" style="background-image: url(images/4.jpg);"></div>
						<div class="slide__img-reveal"></div>
					</div>
					<div class="slide__title-wrap">
						<h3 class="slide__title"><div class="slide__box"></div><span class="slide__title-inner">鲁南大学图书馆</span></h3>
						<h4 class="slide__subtitle"><div class="slide__box"></div><span class="slide__subtitle-inner">第四层</span></h4>
						<p class="slide__quote"><em>"书籍是在时代的波涛中航行的思想之船，它小心翼翼地把珍贵的货物运送给一代又一代。"</em> &mdash; 培根</p>
						<p class="slide__quote">当前楼层剩余座位数:<span style="color:red;"><b><?php echo $row4['seat'];?></b></span></p>
						<a class="slide__explore" href="choose.php?floor=4" ><span class="slide__explore-inner">进入选座</span></a>
					</div>
					<span class="slide__number">04</span>
					<div class="slide__side">
					<span class="slide__info">Lunan University Library &mdash; 2018</span>
						<h5 class="slide__category">Seat Reservation System</h5>
					</div>
				</div>
				
		</main>
		<div class="loader">
			<div class="loader__inner"></div>
		</div>
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="./js/TweenMax.min.js"></script>
		<script src="./js/demo.js"></script>
	</body>
</html>