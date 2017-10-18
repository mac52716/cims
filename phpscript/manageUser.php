<?php
require('../layout/header.php');
require('../database/dbcon.php');
?>
<div class="main">
<div class="content">
<div class="intro">
<div style="width: 100%; height: 300px; margin-top:35px;">
<div style="width: 100%; text-align: right;">
<td><input id='searchVal' name='addUser' type='button' value='ADD' style='width:75px;' onclick='showadd()'/></td>
</div>
<hr>
<div style="width:100%;">
<div id="hist">
<div id='addUser' style='display: none;'>
<form action='newuser.php' method='post'>
<table style='width: 50%;margin: auto;'>
<tr>
<th>CID No.:</th>
<td><input name='cId_no' type='text' minlength='8' required></td>
</tr>
<!--<tr>
<th>Password:</th>
<td><input name='password' type='password' required></td>
</tr>-->
<tr>
<th>First Name:</th>
<td><input name='fname' type='text' required></td>
</tr>
<tr>
<th>Last Name:</th>
<td><input name='lname' type='text' required></td>
</tr>
<tr>
<th>User Level</th>
<td><select name='level' required>
<option value='0'>USER</option>
<option value='1'>ADMIN</option>
</select></td>
</tr>
<tr>
<td colspan='2' style='text-align:center; padding-top: 10px; color: blue;'>Default Password: Welcome2ON!</td>
</tr>
<tr>
<td colspan='2' style='text-align:center;'><input name='submit' type='submit' value='OK' style='margin-top:5px;'>
<input id='cancel' name='cancel' type='button' value='CANCEL' onclick='hideadd()'></td>
</tr>
</table>
</form>
</div>
<div id='userList'>
<table id='histtb'>
<tr style='background-color: blue; color: white;'>
<th id='resulttd'>CID No</th>
<th id='resulttd'>FIRST NAME</th>
<th id='resulttd'>LAST NAME</th>
<th id='resulttd'>LEVEL</th>
<!--<th id='resulttd'>ACTION</th>-->
<?php include('usersList.php'); ?>
</tr>
</table>
</div>
</div>
</div>
<hr>
</div>
</div>
</div>
<?php include('../layout/footer.php') ?>
</div>
<script src="../js/track.js" type='text/javascript'></script>
<script type='text/javascript'>
</script>
</body>
</html>