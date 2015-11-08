<?php
	$raspiIp='localhost';	
	error_reporting(E_ALL ^ E_NOTICE);
	
	require("dynamicsecurity.php");
	include 'dynamicsecurity.php';

	$query=mysqli_query($conSec,"SELECT * FROM house WHERE id='1'");
		$numrows=mysqli_num_rows($query);
		if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$db_security=$row['security'];
			if($db_security==0)
				$query=mysqli_query($conSec,"UPDATE house set security='1' WHERE id='1' ");
			else
				$query=mysqli_query($conSec,"UPDATE house set security='0' WHERE id='1' ");
		}
		else
			$errormsg="DB:Error->Make sure that the database has exactly one row and with id=1";
	header('Location:http://'.$raspiIp.'/EHDLOGIN_rpi/security.php?userid=$username');
	if($errormsg)
		echo "<script type='text/javascript'>alert($errormsg);</script>";
?>