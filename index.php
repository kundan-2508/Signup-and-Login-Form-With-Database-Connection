<?php

session_start();

?>
<!doctype html>
<html lang = 'en-us'>
<head>
                                                                            
<title> Log In system </title>


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href = "css/style.css" type = "text/css" rel = "stylesheet"/>
  </head>
  <body>
  
  <nav class = "navbar navbar-default">
		<div class = "container">
			<div class = "navbar-header">
				<a href = "index.php" class = "navbar-brand">Home</a>
			</div>
			<!-- logout button-->
			<?php
				if(isset($_SESSION['u_id']) and $_SESSION['u_pwd'])
				{
					echo '<form action = "include/logout.inc.php" method = "POST" class = "form-inline" style = "padding-top:8px;text-align:right;">
						<input type = "submit" value = "Log out" name = "logout" class = "btn btn-default"/>
						</form>';
				}
				else
				{
					echo '<form action = "include/login.inc.php" method = "POST" class = "form-inline" style = "padding-top:8px;text-align:right;">
						<div class = "form-group"> 
							<input type = "text" class = "form-control" placeholder = "username" name="uid"  />
						</div>
						<div class = "form-group"> 
							<input type = "password" class = "form-control" name = "pwd" placeholder = "Password"/>
						</div>
						<input type = "submit" value = "Log in" name = "login" class = "btn btn-default"/>
						</form>';
				}
			?>
			
		</div>
  </nav>
  
  <!--sign up-->
	<div class = "container">
		<div class = "row">
			<div class = "col-sm-4 col-md-4"></div>
			<div class = "col-sm-4 col-md-4">
				<h2 align = "center">Get started</h2>
				<form action = "include/signup.inc.php" method = "POST">
					<div class = "form-group" > 
						<input type = "text" class = "form-control" placeholder = "First name" name="first"/>
					</div>
					<div class = "form-group"> 
						<input type = "text" class = "form-control" placeholder = "Last name" name="last"  />
					</div>
					<div class = "form-group"> 
						<input type = "email" class = "form-control" placeholder = "Email" name="email"  />
					</div>
					<div class = "form-group"> 
						<input type = "text" class = "form-control" placeholder = "username" name="uid" />
					</div>
					<div class = "form-group"> 
						<input type = "password" class = "form-control"  placeholder = "Password" name = "pwd" />
					</div>
					<input type = "submit" value = "Sign up" name = "register" class = "btn btn-default"/>
				</form>
			</div>
			<div class = "col-sm-4 col-md-4"></div>
		</div>
	</div>
  
  </body>
  
  </html>