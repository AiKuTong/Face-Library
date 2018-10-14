<?php
header('Content-Type:text/html;charset=utf-8');

$con=mysqli_connect('localhost','library','fWZj6yLDww4HSkKE');
mysqli_query($con,"set names utf8");
$db=mysqli_select_db($con,'library');

