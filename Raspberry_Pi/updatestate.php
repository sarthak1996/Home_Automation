<?php
	$raspiIp='localhost';	
	error_reporting(E_ALL ^ E_NOTICE);
	$getapp_num=($_GET['q']);
	require("dynamicState.php");
	include 'dynamicState.php';
	if($getapp_num==0){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='3' ");
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='2' ");
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='1' ");
	}
	else if($getapp_num==4){
		$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='3' ");
		$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='2' ");
		$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='1' ");
	}
	else{
		$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='$getapp_num'");
		$numrows=mysqli_num_rows($query);
		if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$dbapp_state=$row['app_state'];
			if($dbapp_state==0)
				$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='$getapp_num' ");
			else
				$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='$getapp_num' ");
		}
		else
			$errormsg="Can't find state of Appliance ..Database error";
	}
	header('Location:http://'.$raspiIp.'/EHDLOGIN_rpi/member.php');
	if($errormsg)
		echo "<script type='text/javascript'>alert($errormsg);</script>";
?>