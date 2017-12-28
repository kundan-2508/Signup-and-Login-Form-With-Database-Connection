<?php

session_start();

if(isset($_POST['login']))
{
	include_once "dbh.inc.php";
	
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
	
	// error handler
	if(empty($uid) || empty($pwd))
	{
		header("location:../index.php?login=empty");
		exit();
	}
	else
	{
		
		$sql = "SELECT *FROM users WHERE user_uid = '$uid' ";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1)
		{
			header("location:../index.php?login=usernameNotExist");
			exit();
		}
		else
		{
			if($row = mysqli_fetch_assoc($result))
			{
				// De-hashing the password
				//$hashedPwdCheck = password_verify($pwd,$row[5]);
				$hashedPwdCheck = sha1($pwd);
				if($hashedPwdCheck != $row['user_pwd'])
				{
					header("location:../index.php?login=wrongPassword");
					exit();
				}
				else if($hashedPwdCheck == $row['user_pwd'])
				{
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					$_SESSION['u_pwd'] = $row['user_pwd'];
					header("location:../index.php?login=success");
					exit();
				}
			}
			
		}
	}
}


?>