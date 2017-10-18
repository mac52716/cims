<?php
session_start();
require('../database/dbcon.php');
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");

if ($_POST['ok'] = 'Receive'){
	$sql = "SELECT shots FROM inventory WHERE box_no = '".$_POST['box_no']."'";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()){
			$prevShots = $row['shots'];
		}
		$shots = $_POST['r_shots'] + $prevShots;
		if (!empty($_POST['box_no'])){
				$sql = "UPDATE inventory SET in_out ='IN', machine_no ='".$_POST['r_machine_no']."', remarks ='".$_POST['r_remarks']."', shots ='".$shots."', date_time = '".$datetime."' WHERE box_no ='".$_POST['box_no']."'";
				if (mysqli_query($conn, $sql)) {
					$sql = "INSERT INTO history (box_no,package,lf_name,clamp_serno,insert_serno,machine_model,machine_no,in_out,status,shots,clerk,client,remarks,date_time)
					values('".$_POST['box_no']."','".$_POST['package']."','".$_POST['lf_name']."','".$_POST['clamp_serno']."','".$_POST['insert_serno']."','".$_POST['machine_model']."',
					'".$_POST['r_machine_no']."','IN','".$_POST['r_status']."','".$_POST['r_shots']."','".$_SESSION['f_name']."','".$_POST['r_client']."','".$_POST['r_remarks']."','".$datetime."')";
					mysqli_query($conn, $sql);
				}else{
					echo "Error updating record: " . mysqli_error($conn);
				}
				
		}
	}
}
mysqli_close($conn);
header("Location: track.php");
exit;
?>