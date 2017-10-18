<?php
require('../layout/header.php');
require('../database/dbcon.php');
?>
<div class="main">
<div class="content">
<div class="intro">
<div style="width: 100%; height: 300px; margin-top:35px;">
<hr>
<div style="width:100%;">
<div id="hist">
<div>
<form id='updatePass' action='' method='post'>
<table style='width: 50%;margin: auto;'>
<tr>
<th>Current Password:</th>
<td><input name='password' type='password' required></td>
</tr>
<tr>
<th>New Password:</th>
<td><input id='newPass' name='newPass' type='password' minlength='6' required></td>
</tr>
<tr>
<th>Re-type Password:</th>
<td><input id='rePass'name='rePass' type='password' minlength='6' required></td>
</tr>
<tr>
<td colspan='2' style='text-align:center;'><input id='change' name='submit' type='button' value='OK' onclick='chckPass()' style='margin-top:10px; width: 50px;'>
</tr>
</table>
<div id='error' style='text-align:center;'><?php if(!empty($_SESSION['CurPass'])) { echo $_SESSION['CurPass']; } ?></div>
<?php unset($_SESSION['CurPass']);?></td>
</form>
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