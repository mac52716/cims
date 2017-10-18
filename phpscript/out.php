<?php
session_start();
require('../database/dbcon.php');
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");
$outCount = isset($_POST['out_count']) ? (int)$_POST['out_count'] : 0;
$outCount = $outCount + 1;
if ($_POST['ok'] = 'Withdraw'){
	if (!empty($_POST['box_no'])){
		$sql = "UPDATE inventory SET in_out ='OUT', out_count ='".$outCount."',  machine_no ='$_POST[machine_no]', remarks ='$_POST[remarks]', date_time = '$datetime' WHERE box_no ='$_POST[box_no]'";
		if (mysqli_query($conn, $sql)) {
			$sql = "INSERT INTO history (box_no,package,lf_name,clamp_serno,insert_serno,machine_model,machine_no,in_out,out_count,status,clerk,client,remarks,date_time)
			values('".$_POST['box_no']."','".$_POST['package']."','".$_POST['lf_name']."','".$_POST['clamp_serno']."','".$_POST['insert_serno']."','".$_POST['machine_model']."',
			'".$_POST['machine_no']."','OUT','".$outCount."','".$_POST['status']."','".$_SESSION['f_name']."','".$_POST['client']."','".$_POST['remarks']."','".$datetime."')";
			mysqli_query($conn, $sql);
		}else{
			echo "Error updating record: " . mysqli_error($conn);
		}
	}
	
}
mysqli_close($conn);
header("Location: track.php");
exit;
?>