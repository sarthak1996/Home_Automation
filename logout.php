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
			$raspiIp='192.168.1.10';
			if($username && $userid){
				
				session_destroy();
				header('Location:http://'.$raspiIp.'/EHDLOGIN_rpi/login.php');
				
			}
			else{
				echo $form;
				echo "<script type='text/javascript'>alert('You are not logged in.');</script>";
			}
		?>
	
	</body>