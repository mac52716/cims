<?php
$sql = "SELECT cId_no,f_name,l_name,level FROM users";
$r_query = mysqli_query($conn,$sql);
	
	while ($row = mysqli_fetch_array($r_query)){
		$level = $row['level'];
		if ($level == '0'){
			$level = 'USER';
		}else{
			$level = 'ADMIN';
		}
		echo"<tr class='tr' style='cursor: pointer;'>",
		"<td id='resulttd' style='width:100px;text-align:center;'>".$row['cId_no']."</td>",
		"<td id='resulttd' style='text-align:center;'>".$row['f_name']."</td>",
		"<td id='resulttd' style='text-align:center;'>".$row['l_name']."</td>",
		"<td id='resulttd' style='width:40px;text-align:center;'>".$level."</td>",
		//"<td id='resulttd' style='width:150px;text-align:center;'> &nbsp; <input name='edit' type='button' value='EDIT'/>
		//&nbsp; <input name='delete' type='button' value='DELETE'></td>",
		"</tr>";	

	}
mysqli_close($conn);
?>