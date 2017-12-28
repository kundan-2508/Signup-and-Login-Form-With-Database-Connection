<?php

if(isset($_POST['register']))
{
	include_once "dbh.inc.php";
	$first = mysqli_real_escape_string($conn,$_POST['first']);
	$last = mysqli_real_escape_string($conn,$_POST['last']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
	
	// error handlers
	
	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd))
	{
		header("location:../index.php");
		exit();
	}
	else
	{
		if((!preg_match("/^[a-zA-Z]*$/",$first)) || (!preg_match("/^[a-zA-Z]*$/",$last)))
		{
			header("location:../index.php?signup=invalidName");
			exit();
		}
		else
		{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				header("location:../index.php?signup=invalidEmail");
				exit();
			}
			else
			{
				$sql = "SELECT * FROM users WHERE user_uid = '$uid'";
				$result = mysqli_query($conn,$sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck > 0)
				{
					header("location:../index.php?signup=usertaken");
					exit();
				}
				else
				{
					// hashing the password
					//$hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
					$hashedPwd = sha1($pwd);
					// insert teh user into database
					$sql = "INSERT INTO users (
						user_first , user_last , user_email , user_uid ,user_pwd)
						VALUES ('$first' , '$last' , '$email' , '$uid' , '$hashedPwd'
					)";
					mysqli_query($conn,$sql);
					header("location:../index.php?signup=success");
					exit();
				}
			}
		}
	}
	
}
else
{
	header("location:index.php");
	exit();
}
?>