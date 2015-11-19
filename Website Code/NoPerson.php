<?php
	$raspiIp='localhost';	
	error_reporting(E_ALL ^ E_NOTICE);
	$getapp_num=($_POST['app_n']);
	require("dynamicState.php");
	include 'dynamicState.php';
	
	if($getapp_num==0){
		$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='1'");
		$numrows=mysqli_num_rows($query);
		if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$dbapp_state=$row['app_state'];
			if($dbapp_state==0)
				$query=mysqli_query($conState,"UPDATE savedstates set actual_app_state='0' WHERE app_num='1' ");
			else
				$query=mysqli_query($conState,"UPDATE savedstates set actual_app_state='1' WHERE app_num='1' ");
		}
		else
		$errormsg="Can't find state of Appliance ..Database error";
		
		

		$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='2'");
		$numrows=mysqli_num_rows($query);
		if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$dbapp_state=$row['app_state'];
			if($dbapp_state==0)
				$query=mysqli_query($conState,"UPDATE savedstates set actual_app_state='0' WHERE app_num='2' ");
			else
				$query=mysqli_query($conState,"UPDATE savedstates set actual_app_state='1' WHERE app_num='2' ");
		}
		else
		$errormsg="Can't find state of Appliance ..Database error";
	

		$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='3'");
		$numrows=mysqli_num_rows($query);
		if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$dbapp_state=$row['app_state'];
			if($dbapp_state==0)
				$query=mysqli_query($conState,"UPDATE savedstates set actual_app_state='0' WHERE app_num='3' ");
			else
				$query=mysqli_query($conState,"UPDATE savedstates set actual_app_state='1' WHERE app_num='3' ");
		}
		else
		$errormsg="Can't find state of Appliance ..Database error";
	

	$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='4'");
		$numrows=mysqli_num_rows($query);
		if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$dbapp_state=$row['app_state'];
			if($dbapp_state==0)
				$query=mysqli_query($conState,"UPDATE savedstates set actual_app_state='0' WHERE app_num='4' ");
			else
				$query=mysqli_query($conState,"UPDATE savedstates set actual_app_state='1' WHERE app_num='4' ");
		}
		else
		$errormsg="Can't find state of Appliance ..Database error";
		
	}
	if($errormsg)
		echo "<script type='text/javascript'>alert($errormsg);</script>";
?>
