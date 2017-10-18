<?php
/*echo "<table id='search' style='margin: 0px auto 0px auto;'>
<tr>
<td>LF Name.:</td>
<td><input id='searchVal' name='searchVal' type='text' style='width: 170px;' /></td>
<td><input name='bttnSearch' type='submit' value='SEARCH'/></td>
</tr>
</table>";*/
//<content id='result'></content>";

if (!empty($_REQUEST['searchVal'])) {
	$searchVal = mysqli_real_escape_string($conn,$_REQUEST['searchVal']);    
	$sql = "SELECT box_no,package,lf_name,machine_model,dra,clamp_serno,insert_serno,in_out,out_count,status,remarks FROM inventory WHERE lf_name LIKE '%".$searchVal."%'";
	$r_query = mysqli_query($conn,$sql);

	$count=mysqli_num_rows($r_query);

	if($count>0){
		
		while ($row = mysqli_fetch_array($r_query)){
		 
		echo "<tr class='tr' style='cursor: pointer;'>",
			"<td id='resulttd'>".$row["box_no"]."</td>",
			"<td id='resulttd'>".$row["package"]."</td>",
			"<td id='resulttd'>".$row["lf_name"]."</td>",
			"<td id='resulttd'>".$row["machine_model"]."</td>",
			"<td id='resulttd'>".$row["dra"]."</td>",
			"<td id='resulttd'>".$row["clamp_serno"]."</td>",
			"<td id='resulttd'>".$row["insert_serno"]."</td>",
			"<td id='resulttd'>".$row["in_out"]."</td>",
			"<td id='resulttd'>".$row["out_count"]."</td>",
			"<td id='resulttd'>".$row["status"]."</td>",
			"<td id='resulttd'>".$row["remarks"]."</td>",
		"</tr>";

		}
	}else{
		echo '<h4 style="color:#cc1111;">*NO RECORDS FOUND*</h4>';
	}
}else{

}
mysqli_close($conn);
?>