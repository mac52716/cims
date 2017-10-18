<?php
session_start();
require('../database/dbcon.php');

date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");

//$sql = "SELECT cId_no FROM users WHERE cId_no = '".$_POST['cId_no']."'";
if ($_POST['cId_no'])
	$sql = "INSERT INTO users (cId_no,password,level,f_name,l_name,date_time)
		VALUES ('".$_POST['cId_no']."','".md5('Welcome2ON!')."','".$_POST['level']."','".$_POST['fname']."','".$_POST['lname']."','".$datetime."')";
	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		header("Location: manageuser.php");
		exit;
	}else{
		echo "Error updating record: " . mysqli_error($conn);
		
	}
mysqli_close($conn);
header("Location: manageuser.php");
exit;
?>