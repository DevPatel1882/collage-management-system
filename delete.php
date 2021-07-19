<?php
/*
include 'connection.php';
$cid = $_GET['cid'];
$q = " delete from tbl_course where cid = $cid " ;

mysqli_query($con,$q);

header('location:view-course.php');
*/
?>

<?php
include 'connection.php';
$subid = $_GET['subid'];
$sql = " delete from subject where subid = $subid " ;
mysqli_query($con,$sql);

header("location:view-subjects.php");

?>