<?php

	error_reporting(0);
	ini_set("display_errors", 0);
	
	include('main.php');
	
	session_start();
	
	date_default_timezone_set($timezone);

	ini_set('session.gc_maxlifetime', '1800'); 

	if (isset($_POST['admin_password']) && $_POST['admin_password'] === $admin_password)
	{
		$_SESSION['admin_online'] = "true";
	}
?>

<!DOCTYPE html>
	<html lang="en">
   	 	<head>
   	 		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
			<meta content="utf-8" http-equiv="encoding">
   	 		<title>Live Analytics</title>
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
			<link href="style.css" rel="stylesheet" type="text/css" />
			<script src="chart.js"></script>
    	</head>
    	<body class="body">
    		<div class="site_background"></div>
    		<div class="content">
    			<div class="header">
    				<div class="darken"></div>
					<div class="site_title">Smart Analytics</div>

<?php
	if (!empty($_SESSION['admin_online'])) 
	{
?>

					<a href="logout.php"><div class="logout_button"></div></a>
					
<?php
	}
?>

				</div> 
				<div class="content_holder" id="content_holder">
				
<?php
	if (!empty($_SESSION['admin_online'])) 
	{
		include('update.php');
	}

	if (empty($_SESSION['admin_online'])) 
	{
?>
	
					<div class="content_wrapper" style="height:500px;">
  						<div class="admin_login_text">Login to admin control panel</div>   
    					<form style="color: white" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    						<input class="admin_login_input" name="admin_password" type="password" value="" />
    						<input class="admin_login_submit" type="submit" value="Login" />
    					</form>
    				</div>
    					
<?php 
		if (isset($_POST['admin_password']))
		{
			echo '<div class="admin_login_error">Invalid password. Please try again.</div>';	
		}
	
	}
	else
	{

	}
?>
					
					</div>
				</div>
			</div>
		</body>
	</html>