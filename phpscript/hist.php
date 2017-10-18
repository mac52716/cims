<?php
date_default_timezone_set("Asia/Manila");
$datetime = date("Y-m-d H:i:s");
if (!empty($_REQUEST['searchVal'])) {
	$searchVal = mysqli_real_escape_string($conn,$_REQUEST['searchVal']);    
	$sql = "SELECT box_no,package,lf_name,machine_model,machine_no,clamp_serno,insert_serno,in_out,out_count,status,shots,max_shots,remarks,clerk,client,date_time FROM history WHERE lf_name LIKE '%".$searchVal."%' or
	box_no LIKE '%".$searchVal."%' or clamp_serno LIKE '%".$searchVal."%' or insert_serno LIKE '%".$searchVal."%' or machine_no LIKE '%".$searchVal."%' ORDER BY date_time DESC";
	$r_query = mysqli_query($conn,$sql);

	$count=mysqli_num_rows($r_query);

	if($count>0){
		
		while ($row = mysqli_fetch_array($r_query)){
			$date = new DateTime($row["date_time"]);
			$date2 = new DateTime($datetime);
			$daysout = $date->diff($date2);//;
			$elapsed = $daysout->format('%a days %h hours');
		echo "<tr class='tr' style='cursor: pointer;'>",
			"<td id='resulttd'>".$row['box_no']."</td>",
			"<td id='resulttd'>".$row['package']."</td>",
			"<td id='resulttd'>".$row['lf_name']."</td>",
			"<td id='resulttd'>".$row['machine_model']."</td>",
			"<td id='resulttd'>".$row['machine_no']."</td>",
			"<td id='resulttd'>".$row['clamp_serno']."</td>",
			"<td id='resulttd'>".$row['insert_serno']."</td>",
			"<td id='resulttd'>".$row['in_out']."</td>",
			"<td id='resulttd'>".$row['client']."</td>",
			"<td id='resulttd'>".$row['out_count']."</td>",
			"<td id='resulttd'>".$row['status']."</td>",
			"<td id='resulttd'>".$row['shots']."</td>",
			"<td id='resulttd'>".$row['max_shots']."</td>",
			"<td id='resulttd'>".$row['remarks']."</td>",
			"<td id='resulttd'>".$row['clerk']."</td>",
			"<td id='resulttd'>".$row['date_time']."</td>",
			"<td id='resulttd'>".$elapsed."</td>",
		"</tr>";

		}
	}else{
		echo '<h4 style="color:#cc1111;">*NO RECORDS FOUND*</h4>';
	}
}else{
	$sql = "SELECT box_no,package,lf_name,machine_model,machine_no,clamp_serno,insert_serno,in_out,out_count,status,shots,max_shots,remarks,clerk,client,date_time FROM history ORDER BY date_time DESC";
	$r_query = mysqli_query($conn,$sql);
		
		while ($row = mysqli_fetch_array($r_query)){
			
			$date = new DateTime($row["date_time"]);
			$date2 = new DateTime($datetime);
			$daysout = $date->diff($date2);//;
			$elapsed = $daysout->format('%a days %h hours');
			echo"<tr class='tr' style='cursor: pointer;'>",
			"<td id='resulttd'>".$row['box_no']."</td>",
			"<td id='resulttd'>".$row['package']."</td>",
			"<td id='resulttd'>".$row['lf_name']."</td>",
			"<td id='resulttd'>".$row['machine_model']."</td>",
			"<td id='resulttd'>".$row['machine_no']."</td>",
			"<td id='resulttd'>".$row['clamp_serno']."</td>",
			"<td id='resulttd'>".$row['insert_serno']."</td>",
			"<td id='resulttd'>".$row['in_out']."</td>",
			"<td id='resulttd'>".$row['client']."</td>",
			"<td id='resulttd'>".$row['out_count']."</td>",
			"<td id='resulttd'>".$row['status']."</td>",
			"<td id='resulttd'>".$row['shots']."</td>",
			"<td id='resulttd'>".$row['max_shots']."</td>",
			"<td id='resulttd'>".$row['remarks']."</td>",
			"<td id='resulttd'>".$row['clerk']."</td>",
			"<td id='resulttd'>".$row['date_time']."</td>",
			"<td id='resulttd'>".$elapsed."</td>",
			"</tr>";	

		}
}
mysqli_close($conn);
?>