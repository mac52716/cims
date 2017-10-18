<?php
include('./database/dbcon.php');
$sql = "SELECT cId_no FROM users";
$r_query = mysqli_query($conn,$sql);
	
	while ($row = mysqli_fetch_array($r_query)){
		echo "<option value='".$row["cId_no"]."'>".$row["cId_no"]."</option>";
	}
mysqli_close($conn);
?>