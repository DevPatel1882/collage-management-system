<?php

include 'connection.php';
$sid = $_GET['sid'];
$sql = " DELETE FROM `student` WHERE sid = $sid ";
$query = mysqli_query($con,$sql);
header("location:index.php.php");

?>