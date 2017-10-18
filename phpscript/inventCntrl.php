<?php
require('../database/dbcon.php');
if (empty($_GET['q'])){

}else{
	$q = strval($_GET['q']);

//$con = mysqli_connect('localhost','peter','abc123','my_db');
//if (!$con) {
//    die('Could not connect: ' . mysqli_error($con));
//}

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT box_no,package,lf_name,machine_model,dra,clamp_serno,insert_serno,in_out,out_count,shots,max_shots,machine_no,status,remarks FROM inventory WHERE box_no = '".$q."'";
$result = mysqli_query($conn,$sql);

	if ($result->num_rows > 0) {
				
		while ($row = $result->fetch_assoc()){
			echo "<div style='width: 600px; height: 300px; margin: 10px auto; background-color: #001999; border-radius: 5px; color:white;'>
			<table style='margin: auto; padding-top: 10px;'>
			<tr>
			<td>Out Count: </td>
			<td><input name='out_count' class='lockedtext' type='text' value='".$row['out_count']."' readonly /></td>
			</tr>
			<tr>
			<td>LF Name: </td>
			<td><input id='lf_name' name='lf_name' type='text' value='".$row['lf_name']."' required/></td>
			<td>Box No.: </td>
			<td><input id='box_no' name='box_no' type='text' value='".$row['box_no']."' required/></td>
			</tr>
			<tr>
			<td>Clamp Serial No.: </td>
			<td><input id='clamp_serno' name='clamp_serno' type='text' value='".$row['clamp_serno']."' required/></td>
			<td>Insert Serial No.: </td>
			<td><input id='insert_serno' name='insert_serno' type='text' value='".$row['insert_serno']."' required/></td>
			</tr>
			<tr>
			<td>Package: </td>
			<td><input id='package' name='package' type='text' value='".$row['package']."' required/></td>
			<td>Drawing No.: </td>
			<td><input id='dra' name='dra' type='text' value='".$row['dra']."' required/></td>
			</tr>
			<tr>
			<td>In / Out: </td>
			<td><input id='in_out' name='in_out' type='text' value='".$row['in_out']."' required/></td>
			<td>Status: </td>
			<td><select id='status' name='status' required>
			<option value='".$row['status']."' selected>".$row['status']."</option>
			<option value='GOOD'>GOOD</option>
			<option value='NO GOOD'>NO GOOD</option>
			<option value='EVALUATION'>EVALUATION</option>
			</select></td>
			</tr>
			<td>Machine Model: </td>
			<td><input id='machine_model' name='machine_model' type='text' value='".$row['machine_model']."' required/></td>
			<td>Max Shot: </td>
			<td><input id='max_shots' name='max_shots' type='text' value='".$row['max_shots']."' required/></td>			
			</tr>
			<tr>
			<td>Machine No.: </td>
			<td><input id='machine_no' name='machine_no' type='text' value='".$row['machine_no']."' required/></td>
			<td>Shot Count: </td>
			<td><input id='shots' name='shots' type='text' value='".$row['shots']."' required/></td>
			</tr>
			<tr>
			<td>Remarks: </td>
			<td colspan='4'><textarea id='remarks' name='remarks' style='height:50px; width: 425px; resize: none;' required>".$row['remarks']."</textarea></td>
			</tr>
			<tr>
			<td colspan='4' style='text-align: center; padding-top:10px;'><input name='update' type='submit' value='UPDATE' />
			<input id='delete' name='delete' type='submit' value='DELETE' onclick='allowSubmit()'/>
			<input name='back' type='button' value='BACK' onclick=location.href='inventory.php' /></td>
			</tr>
			</table></div>";

		}
	}else {
		echo "<div style='text-align: center; color: red;'>Seach result: 0</div>";
	}


mysqli_close($conn);
}
?>