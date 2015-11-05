<?php
	$raspiIp='192.168.1.10';	
	error_reporting(E_ALL ^ E_NOTICE);
	$getapp_num=($_GET['q']);
	require("dynamicState.php");
	include 'dynamicState.php';
	if($getapp_num==0){
			
	}
	$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='$getapp_num'");
	$numrows=mysqli_num_rows($query);
		if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$dbapp_state=$row['app_state'];
			if($dbapp_state==0)
				$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='$getapp_num' ");
			else
				$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='$getapp_num' ");

			if($dbapp_state==1){
				exec('gpio write 7 1');
				usleep(20);
				echo "<script type='text/javascript'>alert('gpio out 1 sucess update!!');</script>";
			}
			else if($dbapp_state==0){
				exec('gpio write 7 0');
				usleep(20);
			}
	}
	else
		$errormsg="Can't find state of Appliance ..Database error";
	header('Location:http://'.$raspiIp.'/EHDLOGIN_rpi/member.php');
	if($errormsg)
		echo "<script type='text/javascript'>alert($errormsg);</script>";
?>