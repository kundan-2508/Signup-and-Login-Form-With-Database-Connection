<?php
session_start();

	if(isset($_SESSION['u_id']) and $_SESSION['u_pwd'])
	{
		/*
		echo $_SESSION['u_id'].'<br>';
		echo $_SESSION['u_first'].'<br>';
		echo $_SESSION['u_last'].'<br>';
		echo $_SESSION['u_email'].'<br>';
		echo $_SESSION['u_uid'].'<br>';
		echo $_SESSION['u_pwd'];
		*/
		echo "you are logged in";
	}
	else
	{
		header("location:index.php?login=error");
		exit();
	}
	//echo $_SESSION['u_id'];



?>