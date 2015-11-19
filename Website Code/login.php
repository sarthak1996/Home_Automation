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
        <title> Member System-LOGIN </title>
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>

 <?php
 			$raspiIp='localhost';
			if($username && $userid){
				header('Location:/EHDLOGIN_rpi/member.php');
			}
			else{
            $form="<section class='login'>
            <div class='title'>Secure Login</div>
                <form action='./login.php' method='post' >
                    <input type='text' required title='Username required' placeholder='Username' data-icon='U' name='user'>
                    <input type='password' required title='Password required' placeholder='Password' data-icon='x' name='password'>
                    <div class='Footer'>
                        <div class='col'><a href='./register.php' title='Register'>Register</a></div>
                    </div>
                    <input type='submit' class='submit' name='loginbtn' value='Submit'>
                </form>
        </section>";
			include 'connect.php';
			if ($_POST['loginbtn']){
				$user=$_POST['user'];
				$password=$_POST['password'];
				
				if($user){
					if($password){
						require("connect.php");
						$password=md5(md5("jsaFGkh".$password."ajs46hs"));
						//make sure login info is correct
						$query=mysqli_query($con,"SELECT * FROM users WHERE username='$user'");
						$numrows=mysqli_num_rows($query);
						if($numrows==1){
							$row=mysqli_fetch_assoc($query);
							$dbid=$row['id'];
							$dbuser=$row['username'];
							$dbpass=$row['password'];
							$dbactive=$row['active'];
							
							if($password == $dbpass){
								if($dbactive==1){
									
									//set session info
									$_SESSION['userid']=$dbid;
									$_SESSION['username']=$dbuser;
									header('Location:/EHDLOGIN_rpi/member.php');
									
								}
								else{
									echo $form;
									echo "<script type='text/javascript'>alert('You must activate your account to login.');</script>";
									
								}
							}
							else{
								echo $form;
								echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
							}
							
						}
						else{
							echo $form;
							echo "<script type='text/javascript'>alert('The username was not found');</script>";
						}
						mysqli_close($con); //to convert into mysqli
					}
					else{
							echo $form;
							echo "<script type='text/javascript'>alert('You must enter a password');</script>";
					}
				}
				else{
					echo $form;
					echo "<script type='text/javascript'>alert('You must enter a username');</script>";
				}
				
			}
			else{
				echo $form;
			}
			}
        ?>

        
    </body>
</html>