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
        <title> Activate your account </title>
        <link rel="stylesheet" href="style.css"/>
    </head>
	
	<body>
	<?php
		$raspiIp='localhost';
		include 'connect.php';
		$getuser=$_GET['user'];
		$getcode=$_GET['code'];
		
		
		if($_POST('activatebtn')){
			$getuser=$_POST['user'];
			$getcode=$_POST['code'];
			if($getuser){
				if($getcode){
					require("./connect.php");
					
					$query=mysqli_query($con,"SELECT * FROM users WHERE username='$getuser' AND code='$getcode'");
					$numrows=mysqli_num_rows($query);
					if($numrows==1){
						$row=mysqli_fetch_assoc($query);
						$dbcode=$row['code'];
						$dbactive=$row['active'];
						
						if($dbactive==0){
							if($dbcode==$getcode){
								$query=mysqli_query($con,"UPDATE users set active='1' WHERE username=$getuser AND code=$getcode");
								$query=mysqli_query($con,"SELECT * FROM users WHERE username='$getuser' AND code='$getcode' AND active='1'");
								$numrows=mysqli_num_rows($query);
								if($numrows==1){
									$errormsg="An error has occured your account has benn activated You may now login";
									$getuser="";
									$getcode="";
								}
								else
									$errormsg="An error has occured your account was not activated";
							}
							else
								$errormsg="Your code is incorrect";
						}
						else
							$errormsg="This a/c is already active";
					}
					else
						$errormsg="User not registered please register first";
					mysqli_close($con);
				}
				else
					$errormsg="You must enter your code";
			
			}
			else
				$errormsg="You must enter your username";
			
		}
		else
			$errormsg="";
		$form="<form action='./activate.php' method='post'>
		<table>
		<tr>
			<td></td>
			<td><font color='red'>$errormsg</font></td>
		</tr>
		<tr>
			<td>Username:</td>
			<td><input type='text' name='user' value='$getuser'/></td>
			<td>Code:</td>
			<td><input type='text' name='code' value='$getcode'/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='activatebtn' value='Activate'/></td>
		</tr>
		</table>
		</form>";
		
			echo $form;
	?>
	</body>
