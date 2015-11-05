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
        <script language="javascript" src="scripthome.js"></script>
    </head>

    <body   >
	
	<?php
	
	//taking states from db
	$raspiIp='localhost';
	require("dynamicState.php");
	include 'dynamicState.php';

	$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='1'");
	$numrows=mysqli_num_rows($query);
	if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$state1=$row['app_state'];

				exec('gpio mode 7 output');
			if($state1==1){
				exec('gpio write 7 1');
				usleep(20);
				echo "<script type='text/javascript'>alert('gpio out 1 sucess!!');</script>";
			}
			else{
				exec('gpio write 7 0');
				usleep(20);
			}
	}
	else
		$errormsg="Can't find state of Appliance 1..Database error";

	
	$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='2'");
	$numrows=mysqli_num_rows($query);
	if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$state2=$row['app_state'];
	}
	else
		$errormsg="Can't find state of Appliance 2..Database error";

	
	$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='3'");
	$numrows=mysqli_num_rows($query);
	if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$state3=$row['app_state'];
			$jstate3=".$state3";
	}
	else
		$errormsg="Can't find state of Appliance 3..Database error";

	mysqli_close($conState);
	
	
	$home=  
	"<div class='heading'  >
  		<p><b>EHD HOME AUTOMATION</b></p>
	</div>
  	<div class='menu-wrap'>
        <nav class='menu'>
            <ul class='clearfix'>
                <li><a href='./member.php'>$username's Home</a></li>
                <li>
                    <a href='#'>States <span class='arrow'>&#9660;</span></a>
     
                    <ul class='sub-menu'>
                        <li><a href='#' onclick='changeAllStatesToFalse();'>ALL APPLIANCES OFF</a></li>
                        <li><a href='#' onclick='changeAllStatesToTrue();'>ALL APPLIANCES ON</a></li>
                        <li><a href='#' onclick='getStates();'>GET STATES</a></li>
                    </ul>
                </li>
                <li><a href='#'>Security</a></li>
                <li><a href='#'>Page info</a></li>
                <li><a href='./logout.php'>Logout</a></li>
            </ul>
        </nav>
    </div>

	<!3 Toggle Buttons start>
		<div class='buttonsArea'>
			<div class='display'>
 				 <label class='label toggle'>
  					  Appliance 1
   					 <input type='checkbox' class='toggle_input' id='button1' onclick='updateTable(1);'/>
   					 <div class='toggle-control'></div>
 				 </label>
			</div>
			<div class='display'>
 				 <label class='label toggle'>
  					  Appliance 2
   					 <input type='checkbox' class='toggle_input' id='button2' onclick='updateTable(2);'/>
   					 <div class='toggle-control'></div>
 				 </label>
			</div>
			<div class='display'>
 				 <label class='label toggle'>
  					  Appliance 3
   					 <input type='checkbox' class='toggle_input' id='button3' onclick='updateTable(3);' />
   					 <div class='toggle-control'></div>
 				 </label>
			</div>
		</div>
	<!3 Toggle Buttons end>";
		
	


	if($username && $userid){
		
		echo "$home";

		if($errormsg)
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
	}
	else{
		header('Location:http://'.$raspiIp.'/EHDLOGIN_rpi/login.php');
		echo "<script type='text/javascript'>alert('Please Login');</script>";
	}
	
	?>
	<script type='text/javascript'>
        var v1 = <?php echo(json_encode($state1)); ?>;
		
        var v2 = <?php echo(json_encode($state2)); ?>;
		
        var v3 = <?php echo(json_encode($state3)); ?>;
        
		setStates(v1,v2,v3);
 		
	</script>
	</body>
</html>