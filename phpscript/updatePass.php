<?php
session_start();
require('../database/dbcon.php');

date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");

$sql = "SELECT password FROM users WHERE cId_no ='".$_SESSION['cId_no']."' AND password ='".md5($_POST['password'])."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$sql = "UPDATE users set password = '".md5($_POST['rePass'])."', date_time = '".$datetime."' WHERE cId_no = '".$_SESSION['cId_no']."'";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['CurPass'] = '<p style="color: #00dd00;">Password has been successfully updated.</p>';
	}else{
		echo "Error updating record: " . mysqli_error($conn);
	}
}else{
	$_SESSION['CurPass'] = '<p style="color: #dd0000;">Current Password is not correct. Please try again!</p>';
	echo $_SESSION['CurPass'];
}
mysqli_close($conn);
header("Location: myAccount.php");
exit;
?>