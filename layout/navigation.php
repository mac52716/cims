<?php
if(!empty($_SESSION["cId_no"])){ //check if session exists
	if ($_SESSION['level'] == 0){
		echo "<ul class='navshadow navleft' style='width: 100%; height: 24px; overflow: hidden;'>",
		"<li id='home'><a href='home.php'>&nbsp;HOME&nbsp;</a></li>",
		"<li id='track'><a href='track.php'>&nbsp;TRACK&nbsp;</a></li>",
		//"<li><a href='#'>&nbsp;INVENTORY&nbsp;</a></li>",
		"<li id='history'><a href='history.php'>&nbsp;HISTORY&nbsp;</a></li>",
		//"<li><a href='testers.php'>&nbsp;TESTERS&nbsp;</a></li>",
		"<li class='dropdown' style='float:right;'>",
		"<a href='javascript:void(0)' class='dropbtn'>&nbsp;Hi! ".$_SESSION['f_name']."&nbsp;</a>",
		"<div class='dropdown-content'>",
			"<a href='myAccount.php'>My Account</a>",
			"<a href='logout.php'>LOG OUT</a>",
		"</li>",
		"<li class='dropdown' ></li>",
		"</ul>";
	/*}elseif ($level == 1){
		echo "<ul class='navshadow navleft' style='width: 100%; height: 24px; overflow: hidden;'>",
		"<li><a href='home.php'>&nbsp;HOME&nbsp;</a></li>",
		"<li><a href='mystudents.php'>&nbsp;MY STUDENTS&nbsp;</a></li>",
		"<li><a href='about us.php'>&nbsp;ABOUT US&nbsp;</a></li>",
		"<div style='text-align: right;'>|Hi! ".$_SESSION['fname']."&nbsp;",
		"<a href='logout.php' style='color: white; margin: 0px 2px 0px 2px;'>Logout</a>",
		"</div>",
		"</ul>";*/
	}else{
		echo "<ul class='navshadow navleft' style='width: 100%; height: 24px; overflow: hidden;'>",
		"<li id='home'><a href='home.php'>&nbsp;HOME&nbsp;</a></li>",
		"<li id='track'><a href='track.php'>&nbsp;TRACK&nbsp;</a></li>",
		"<li id='inventory'><a href='inventory.php'>&nbsp;INVENTORY&nbsp;</a></li>",
		"<li id='history'><a href='history.php'>&nbsp;HISTORY&nbsp;</a></li>",
		//"<li><a href='testers.php'>&nbsp;TESTERS&nbsp;</a></li>",
		"<li class='dropdown' style='float:right;'>",
		"<a href='javascript:void(0)' class='dropbtn'>&nbsp;Hi! ".$_SESSION['f_name']."&nbsp;</a>",
		"<div class='dropdown-content'>",
			"<a href='manageUser.php'>Manage User</a>",
			"<a href='myAccount.php'>My Account</a>",
			"<a href='logout.php'>LOG OUT</a>",
		"</li>",
		"<li class='dropdown' ></li>",
		"</ul>";
	}
}else{
	header("Location:../index.php");
	exit;
}
?>