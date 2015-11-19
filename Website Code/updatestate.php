<?php
	$raspiIp='localhost';	
	error_reporting(E_ALL ^ E_NOTICE);
	$getapp_num=($_GET['app_n']);
	require("dynamicState.php");
	include 'dynamicState.php';
        


        if($getapp_num==10){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='1' ");
	}
        if($getapp_num==11){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='1' ");
	}
        if($getapp_num==20){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='2' ");
	}
        if($getapp_num==21){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='2' ");
	}
        if($getapp_num==30){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='3' ");
	}
        if($getapp_num==31){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='3' ");
	}
        if($getapp_num==40){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='4' ");
	}
        if($getapp_num==41){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='4' ");
	}




	if($getapp_num==0){
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='4' ");
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='3' ");
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='2' ");
			$query=mysqli_query($conState,"UPDATE savedstates set app_state='0' WHERE app_num='1' ");
	}
	else if($getapp_num==5){
		$query=mysqli_query($conState,"UPDATE savedstates set app_state='1' WHERE app_num='4' ");
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
	header("Location:/EHDLOGIN_rpi/member.php");
	if($errormsg)
		echo "<script type='text/javascript'>alert($errormsg);</script>";
?>
