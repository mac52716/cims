<?php
require('../database/dbcon.php');
if (empty($_GET['q'])){

}else{
	$q = strval($_GET['q']);


$sql="SELECT box_no,package,lf_name,machine_model,dra,clamp_serno,insert_serno,in_out,shots,max_shots,status,remarks FROM inventory WHERE box_no LIKE '%".$q."%'";
$result = mysqli_query($conn,$sql);

	if ($result->num_rows > 0) {
				
		while ($row = $result->fetch_assoc()){
			echo "<div style='width: 600px; height: 265px; margin: 10px auto; background-color: #00af00; border-radius: 5px; color:white;'>
			<table style='margin: auto; padding-top: 10px;'>
			<tr>
			<td>LF Name: </td>
			<td><input name='lf_name' class='lockedtext' type='text' value='".$row['lf_name']."' readonly /></td>
			<td>Box No.: </td>
			<td><input  name='box_no' class='lockedtext type='text' value='".$row['box_no']."' readonly /></td>
			</tr>
			<tr>
			<td>Clamp Serial No.: </td>
			<td><input name='clamp_serno' class='lockedtext type='text' value='".$row['clamp_serno']."' readonly /></td>
			<td>Insert Serial No.: </td>
			<td><input name='insert_serno' class='lockedtext type='text' value='".$row['insert_serno']."' readonly /></td>
			</tr>
			<tr>
			<td>Package: </td>
			<td><input name='package' class='lockedtext type='text' value='".$row['package']."' readonly /></td>
			<td>Drawing No.: </td>
			<td><input name='dra' class='lockedtext type='text' value='".$row['dra']."' readonly /></td>
			</tr>
			<tr>
			<td>In / Out: </td>
			<td><input id='r_in_out' name='in_out' class='lockedtext type='text' value='".$row['in_out']."' readonly /></td>
			<td>Max Shot: </td>
			<td><input name='max_shots' class='lockedtext type='text' value='".$row['max_shots']."' readonly /></td>
			</tr>
			<td>Machine Model: </td>
			<td><input name='machine_model' class='lockedtext type='text' value='".$row['machine_model']."' readonly /></td>
			<td>Shot Count: </td>
			<td><input id='r_shots' name='r_shots' type='text' /></td>
			</tr>
			<tr>
			<td>Machine No.: </td>
			<td><input id='r_machine' name='r_machine_no' type='text' /></td>
			<td>Returner: </td>
			<td><input id='r_client' name='r_client' type='text' /></td>
			</tr>
			<tr>
			<td>Status: </td>
			<td><select id='r_status' name='r_status'>
			<option value='' disabled selected>Select</option>
			<option value='GOOD'>Good</option>
			<option value='NO GOOD'>No Good</option>
			</select></td>
			</tr>
			<tr>
			<td>Remarks: </td>
			<td colspan='4'><textarea id='r_remarks' name='r_remarks' style='height:50px; width: 425px; resize: none;'>".$row['remarks']."</textarea></td>
			</tr>
			</table></div>";

		}
	}else {
		echo "<div style='text-align: center; color: red;'>Seach result: 0</div>";
	}


mysqli_close($conn);
}
?>