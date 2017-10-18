<?php
session_start();
require('../database/dbcon.php');
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");
$outCount = isset($_POST['out_count']) ? (int)$_POST['out_count'] : 0;
$outCount = $outCount + 1;
if (!empty($_POST['update'])){
	if (!empty($_POST['box_no'])){
		$sql = "UPDATE inventory SET box_no='".$_POST['box_no']."', package='".$_POST['package']."', lf_name='".$_POST['lf_name']."', clamp_serno='".$_POST['clamp_serno']."',
		insert_serno='".$_POST['insert_serno']."', machine_model='".$_POST['machine_model']."', machine_no='".$_POST['machine_no']."', in_out='".$_POST['in_out']."',
		out_count='".$outCount."',  status='".$_POST['status']."', shots='".$_POST['shots']."', max_shots='".$_POST['max_shots']."', dra='".$_POST['dra']."',
		remarks='UPDATED BY ".$_SESSION['f_name']."', date_time='".$datetime."' WHERE box_no='".$_POST['box_no']."'";
		if (mysqli_query($conn, $sql)) {
			$sql = "INSERT INTO history (box_no,package,lf_name,clamp_serno,insert_serno,machine_model,machine_no,in_out,out_count,status,max_shots,shots,remarks,clerk,date_time)
			values('".$_POST['box_no']."','".$_POST['package']."','".$_POST['lf_name']."','".$_POST['clamp_serno']."','".$_POST['insert_serno']."','".$_POST['machine_model']."',
			'".$_POST['machine_no']."','".$_POST['in_out']."','".$outCount."','".$_POST['status']."','".$_POST['max_shots']."','".$_POST['shots']."','UPDATED',
			'".$_SESSION['f_name']."','".$datetime."')";
			mysqli_query($conn, $sql);
		}else{
			echo "Error updating record: " . mysqli_error($conn);
		}
		
	}
}else{
	$maxshots = isset($_POST['max_shots']) ? (int)$_POST['max_shots'] : 0;
	$shots = isset($_POST['shots']) ? (int)$_POST['shots'] : 0;
	$sql = "INSERT INTO history (box_no,package,lf_name,clamp_serno,insert_serno,machine_model,machine_no,in_out,out_count,status,max_shots,shots,remarks,clerk,date_time)
			values('".$_POST['box_no']."','".$_POST['package']."','".$_POST['lf_name']."','".$_POST['clamp_serno']."','".$_POST['insert_serno']."','".$_POST['machine_model']."',
			'".$_POST['machine_no']."','".$_POST['in_out']."','".$outCount."','".$_POST['status']."','".$maxshots."','".$shots."','DELETED',
			'".$_SESSION['f_name']."','".$datetime."')";
	if (mysqli_query($conn, $sql)) {
			$sql = "DELETE FROM inventory WHERE box_no='".$_POST['box_no']."'";
			mysqli_query($conn, $sql);
		}else{
			echo "Error updating record: " . mysqli_error($conn);
		}
}

			
mysqli_close($conn);
header("Location: inventory.php");
exit;
?>