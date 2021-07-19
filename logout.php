<?php
session_start();
unset($_SESSION['NAME']);


if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:login.php");

?>