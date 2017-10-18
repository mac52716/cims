<?php
include('promisconn.php');

    	$result = $conn->query("SELECT DISTINCT TesterPF FROM testers ORDER by TesterModel ASC");
    	while ($row = $result->fetch_assoc()) {
                  $TesterPF = $row['TesterPF']; 
                  echo '<option value="'.$TesterPF.'">'.$TesterPF.'</option>';
	}

mysqli_close($conn);

?>