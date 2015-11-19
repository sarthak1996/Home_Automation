<?php
	$raspiIp='localhost';	
	error_reporting(E_ALL ^ E_NOTICE);
	
	require("dynamicsecurity.php");
	include 'dynamicsecurity.php';
	
		$query=mysqli_query($conSec,"SELECT * FROM house");
		$numrows=mysqli_num_rows($query);
		if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$dbapp_state=$row['secure'];
			if($dbapp_state==0)
				$query=mysqli_query($conSec,"UPDATE house set secure='1' WHERE id='1' ");
			else
				$query=mysqli_query($conSec,"UPDATE house set secure='0' WHERE id='1' ");
		}
		else
			$errormsg="Can't find state of Appliance ..Database error";
		header('Location:/EHDLOGIN_rpi/security.php');
		if($errormsg)
			echo "<script type='text/javascript'>alert($errormsg);</script>";
?>
