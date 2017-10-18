<?php
include('../layout/header.php');
?>
<body>
<div class="main">
<div class="header3"><img src="img/onlogo.png" style="width: 125px; height: 120px; margin-left:30px;"><span style="position: absolute;top: 25px; font-family: Verdana; font-size: 45px; text-align: center; color: #009900; margin-left: 10px;">TESTER INVENTORY SYSTEM</span></div>
<div class="nav"><?php include('navigation.php'); ?></div>
<div class="content">
<div class="intro">
<h2>Create new user account</h2>
<div style="width: 100%; height: 300px;">
<form action="newuser.php" method="post">
<table style="margin: 100px auto 0px auto;">
<tr>
<td>FFID :</td>
<td><input type="text" name="myidno"required></td>
</tr>
<tr>
<td>Lastname :</td>
<td><input type="text" name="mylname" required></td>
</tr>
<tr>
<td>Firstname :</td>
<td><input type="text" name="myfname" required></td>
</tr>
<tr>
<td>User level :</td>
<td><input type="radio" name="mylevel" value="1" required>Clerk</td>
</tr>
<tr>
<td></td>
<td><input type="radio" name="mylevel" value="2" required>Secretary/Administrator</td>
</tr>
</table>
<div style="text-align: center; margin-top: 30px;">
<?php
if(!empty($_SESSION['Msg'])){
	echo $_SESSION['Msg'];
}
?>
</div>
<?php
	unset($_SESSION['Msg']);
?>
<div style="text-align: center; margin-top: 50px"><input class="buttons" type="submit" name="submit" value="Submit"></div>
</form>
</div>
</div>
</div>
<div class="footer"></div>
</div>
</body>
</html>