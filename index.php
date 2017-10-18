<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge;IE=9;IE=8;IE=7">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CIM System</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div class="header3"><img src="img/onlogo.png" style="width: 125px; height: 115px; margin-left:50px;"><span style="position: absolute;top: 25px; font-family: Verdana; font-size: 45px; text-align: center; color: #009900; margin-left: 100px;">CLAMP AND INSERT SYSTEM</span>
<div style="width: 100%;">
<div style="text-align: center;">
<table style="margin: auto;">
<tr>
<td rowspan="5"></td>
</tr>
<tr>
<td>
<form action="phpscript/authentication.php" method="post">
<table style="width: 250px; height: 250px; background-color: #c5c5c5; border-radius: 10px;">
<tr>
<td style="background-color: green; color: white; border-radius: 5px;">SIGN IN</td>
</tr>
<tr>
<td style="text-align: center;">
<select name="myusername" placeholder="User name" style="width: 200px; background-color: #f0f0f0; border-radius: 5px;" required/>
<option value="<?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['login_user']; } ?>"><?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['login_user']; } ?></option>
<?php
include('phpscript/users.php');
?>
</select>
</tr>
<tr>
<td style="text-align: center;">
<input type="password" name="mypassword" placeholder="Password" style="width: 195px; background-color: #f0f0f0; border-radius: 5px;" required></td>
</tr>
<tr>
<td style="text-align: center;color: red; height: 15px; font-size: 10px;"><?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } ?>
<?php unset($_SESSION['errMsg']);?></td>
</tr>
<tr>
<td style="text-align: center; "><input class="bttnlogin" type="submit" name="submit" value="Sign in"></td>
</tr>
</table>
</form>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>