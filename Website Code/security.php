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
        <link rel="stylesheet" href="stylehome.css"/>
        <script language="javascript" src="scriptSec.js"></script>
    </head>

    <body>
	
	<?php

	



	$raspiIp='localhost';
	require("dynamicsecurity.php");
	include 'dynamicsecurity.php';

	$query=mysqli_query($conSec,"SELECT * FROM house WHERE id='1'");
	$numrows=mysqli_num_rows($query);
	if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$security=$row['secure'];
			$people=$row['people'];
	}
	else
		$errormsg="DB:ERROR->Please make sure that the db contains exactly one row and it has id=1";





	$home=  
	"<div class='heading' >
  		<p><b>EHD HOME AUTOMATION</b></p>
	</div>
  	<div class='menu-wrap'>
        <nav class='menu'>
            <ul class='clearfix'>
                <li><a href='./member.php'>$username's Home</a></li>
                <li>
                    <a >States <span class='arrow'>&#9660;</span></a>
     
                    <ul class='sub-menu'>
                        <li onclick='updateState(0);'><a>ALL APPLIANCES OFF</a></li>
                        <li onclick='updateState(5);'><a>ALL APPLIANCES ON</a></li>
                        <li><a onclick='getStates();'>GET STATES</a></li>
                    </ul>
                </li>
                <li><a href='./security.php'>Security</a></li>
                <li><a >About me</a></li>
                <li><a href='./logout.php'>Logout</a></li>
            </ul>
        </nav>
    </div>

	
		<div class='buttonsArea'>
			<div class='display'>
 				 <label class='label toggle'>
  					  Security
   					 <input type='checkbox' class='toggle_input' id='securityBtn' onclick='updateSecurity();'/>
   					 <div class='toggle-control'></div>
 				 </label>
			</div>
		<div>
	";
                 $file1="buttonstatus5.txt";
                 $handle=fopen($file1,'w+');
                 fwrite($handle,$security);
                 fclose($handle);
		if($username && $userid){
			echo $home;

			if($errormsg)
				echo "<script type='text/javascript'>alert('$errormsg');</script>";
		}
		else{
			header('Location:/EHDLOGIN_rpi/login.php');
		}
	?>
	<script type='text/javascript'>
        	var v1 = <?php echo(json_encode($security)); ?>;
		setSec(v1);
	</script>

	</body>
</html>
