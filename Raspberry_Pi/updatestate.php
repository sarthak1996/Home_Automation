<?php
	$raspiIp='localhost';	
	error_reporting(E_ALL ^ E_NOTICE);
	$getapp_num=($_GET['app_n']);
	require("dynamicState.php");
	include 'dynamicState.php';
	if($getapp_num==0){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='4' ");
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='3' ");
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='2' ");
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='1' ");

			/*Gpio write for all devices*/
			exec('gpio write 7 0');
			exec('gpio write 5 0');
			exec('gpio write 3 0');
			exec('gpio write 2 0');
	}
	else if($getapp_num==5){
		$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='4' ");
		$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='3' ");
		$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='2' ");
		$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='1' ");
		
			/*Gpio write for all devices*/
			exec('gpio write 7 1');
			exec('gpio write 5 1');
			exec('gpio write 3 1');
			exec('gpio write 2 1');
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

			if($getapp_num==1){
			
				if($dbapp_state==0)
					exec('gpio write 7 1');
				else if($dbapp_state==0)
					exec('gpio write 7 0');
			
			}else if($getapp_num==2){

				if($dbapp_state==0)
					exec('gpio write 2 1');
				else if($dbapp_state==0)
					exec('gpio write 2 0');

			}else if($getapp_num==3){


				if($dbapp_state==0)
					exec('gpio write 3 1');
				else if($dbapp_state==0)
					exec('gpio write 3 0');

			}else if($getapp_num==4){


				if($dbapp_state==0)
					exec('gpio write 5 1');
				else if($dbapp_state==0)
					exec('gpio write 5 0');

			}
		}
		else
			$errormsg="Can't find state of Appliance ..Database error";
	}
	
	if($errormsg)
		echo "<script type='text/javascript'>alert($errormsg);</script>";
?>