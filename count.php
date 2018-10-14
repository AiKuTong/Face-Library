<?php
require './config.php';
$floor=$_GET['floor'];
$sql="select count('state') as 'seat' from choose_seat where state='0'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
echo $row['seat'];
echo "<br />";
echo $floor;
?>