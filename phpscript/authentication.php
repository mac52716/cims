<?php
session_start();
require('../database/dbcon.php');

		 if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// username and password sent from form
			$username=mysqli_real_escape_string($conn,$_POST['myusername']);
			$password=mysqli_real_escape_string($conn, md5($_POST['mypassword']));
			$selectsql="SELECT id,cId_no,Password,level,f_name FROM users WHERE cId_no='$username' and Password='$password'";

			$result=mysqli_query($conn,$selectsql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$count=mysqli_num_rows($result);

			// If result matched $username and $password, table row must be 1 row
			if($count>0){
				$_SESSION['cId_no']=$row['cId_no'];
				$_SESSION['f_name']=$row['f_name'];
				$_SESSION['level']=$row['level'];
				header("location:track.php");
				exit;
			}else{
							$_SESSION['errMsg'] = "Invalid user or password! Please try again.";
							$_SESSION['login_user']=$username;
					header("Location: ../index.php"); //Redirect user back to your login form
					exit;
				}
		}
?>