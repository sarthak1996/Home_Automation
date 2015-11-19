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

    <body>
	
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
				exec('gpio write 7 0');
			}
			else{
				exec('gpio write 7 1');
			}
	}
	else
		$errormsg="Can't find state of Appliance 1..Database error";

	
	$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='2'");
	$numrows=mysqli_num_rows($query);
	if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$state2=$row['app_state'];
			
			exec('gpio mode 2 output');
			if($state2==1){
				exec('gpio write 2 0');
			}
			else{
				exec('gpio write 2 1');
			}	
	}
	else
		$errormsg="Can't find state of Appliance 2..Database error";

	
	$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='3'");
	$numrows=mysqli_num_rows($query);
	if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$state3=$row['app_state'];

			exec('gpio mode 3 output');
			if($state3==1){
				exec('gpio write 3 0');
			}
			else{
				exec('gpio write 3 1');
			}
	}
	else
		$errormsg="Can't find state of Appliance 3..Database error";


		
	$query=mysqli_query($conState,"SELECT * FROM savedstates WHERE app_num='4'");
	$numrows=mysqli_num_rows($query);
	if($numrows==1){
			$row=mysqli_fetch_assoc($query);
			$state4=$row['app_state'];

			exec('gpio mode 0 output');
			if($state4==1){
				exec('gpio write 0 0');
			}
			else{
				exec('gpio write 0 1');
			}
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
                    <a >States <span class='arrow'>&#9660;</span></a>
     
                    <ul class='sub-menu'>
                        <li onclick='changeAllStatesToFalse();'><a >ALL APPLIANCES OFF</a></li>
                        <li onclick='changeAllStatesToTrue();'><a >ALL APPLIANCES ON</a></li>
                        <li><a onclick='getStates();'>GET STATES</a></li>
                    </ul>
                </li>
                <li><a href='./security.php?userid=$username'>Security</a></li>
                <li><a >About me</a></li>
                <li><a href='./logout.php'>Logout</a></li>
            </ul>
        </nav>
    </div>

	
		<div class='buttonsArea'>
			<div class='display'>
 				 <label class='label toggle'>
  					  App-1
   					 <input type='checkbox' class='toggle_input' id='button1' onclick='updateTable(1);'/>
   					 <div class='toggle-control'></div>
 				 </label>
			</div>
			<div class='display'>
 				 <label class='label toggle'>
  					  App-2
   					 <input type='checkbox' class='toggle_input' id='button2' onclick='updateTable(2);'/>
   					 <div class='toggle-control'></div>
 				 </label>
			</div>
			<div class='display'>
 				 <label class='label toggle'>
  					  App-3
   					 <input type='checkbox' class='toggle_input' id='button3'  onclick='updateTable(3);'/>
   					 <div class='toggle-control'></div>
 				 </label>
			</div>
			<div class='display'>
 				 <label class='label toggle'>
  					  App-4
   					 <input type='checkbox' class='toggle_input' id='button4' onclick='updateTable(4);'/>
   					 <div class='toggle-control'></div>
 				 </label>
			</div>
		</div>
	";
		
	


	if($username && $userid){
		
		echo $home;

		if($errormsg)
			echo "<script type='text/javascript'>alert('$errormsg');</script>";
	}
	else{
		header('Location:/EHDLOGIN_rpi/login.php');
		echo "<script type='text/javascript'>alert('Please Login');</script>";
	}
	
	?>
	<script type='text/javascript'>
        	var v1 = <?php echo(json_encode($state1)); ?>;
		
       	 	var v2 = <?php echo(json_encode($state2)); ?>;
		
        	var v3 = <?php echo(json_encode($state3)); ?>;
        	
		var v4 = <?php echo(json_encode($state4)); ?>;
			setStates(v1,v2,v3,v4);
 		
	</script>
	</body>
</html>
