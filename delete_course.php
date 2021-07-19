<?php

include 'connection.php';
$cid = $_GET['cid'];
$q = " delete from tbl_course where cid = $cid " ;

mysqli_query($con,$q);

header('location:view-course.php');

?>