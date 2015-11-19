<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$userid= $_SESSION['userid'];
$username= $_SESSION['username'];
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Member system-login </title>
        <link rel="stylesheet" href="style.css"/>
        <script language="javascript" src="scripthome.js"></script>
    </head>

    <body>
		<?php
			$raspiIp='localhost';
			if($username && $userid){
				
				session_destroy();
				header('Location:/EHDLOGIN_rpi/login.php');
				
			}
			else{
				echo "<script type='text/javascript'>alert('You are not logged in.');</script>";
				header('Location:/EHDLOGIN_rpi/login.php');
			}
		?>
	
	</body>
