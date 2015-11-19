<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Member system-login </title>
        <link rel="stylesheet" href="style.css"/>
        <script language="javascript" src="script.js"></script>
    </head>
	
<body>
<?php

	$raspiIp='localhost';
	if($_POST['registerbtn']){
		// register button pressed
		$getuser=$_POST['user'];
		$getemail=$_POST['email'];
		$getpass=$_POST['pass'];
		$getretypepass=$_POST['retypepass'];
		include 'connect.php';
		if($getuser){
			if($getemail){
					if($getpass){
						if($getretypepass){
							if($getpass === $getretypepass){
								// tripple equals to check case sensitivity
								if( (strlen($getemail) >= 7) && (strstr($getemail,"@")) && (strstr($getemail,"."))){
									require("./connect.php");
									
									$query=mysqli_query($con,"SELECT * FROM users WHERE username='$getuser'");
									$numrows=mysqli_num_rows($query);
									if($numrows==0){
										$query=mysqli_query($con,"SELECT * FROM users WHERE email='$getemail'");
										$numrows=mysqli_num_rows($query);
										if($numrows==0){
											$getpass=md5(md5("jsaFGkh".$getpass."ajs46hs"));
											$date=date("F d, Y");
											$code= md5(rand());
											mysqli_query($con,"INSERT INTO users VALUES(
												'','$getuser','$getpass','$getemail','0','$code','$date'
											)");
											
											$query=mysqli_query($con,"SELECT * FROM users WHERE username='$getuser'");
											$numrows=mysqli_num_rows($query);
											if($numrows==1){
												
												$site="http://'.$raspiIp.'/LoginPhpMysql";
												$webmaster="Sarthak <201301183@daiict.ac.in>";
												$headers="From: $webmaster";
												$subject="Activate your account";
												$message="Thanks for registering. Click the link below to activate your account.\n";
												$message .= "$site/activate.php?user=$getuser&code=$code\n";
												$message .= "You must activate your account to login";
												
												if(mail($getemail,$subject,$message,$header)){
													$errormsg = "You have been registered. You must activate your account from the activation link sent to $getemail";
													$getuser="";
													$getemail="";
												}
												else
													$errormsg="An error has occurred. Your activation email was not sent.";
											}
											else
												$errormsg="An error has occured. Your a/c wwas not created";
											
										}
										else
											$errormsg="A User is already registered with this email";
									}
									else
										$errormsg = "A User is already registered with this username";
									
									mysqli_close($con);
								}
								else
									$errormsg="You must enter a valid email adress to regiter";
							}
							else
								$errormsg="Passwords do not match";
						}
						else
							$errormsg="You must retype your password to register";
					}
					else
						$errormsg="You must enter your password to register";
			}
			else
				$errormsg="You must enter your email to register";
		}
		else
			$errormsg="You must enter your username to register";
		
	}
	
	$form=
	"<section class='login'>
            <div class='title'>Secure Register</div>
                <form action='./register.php' method='post' >
                    <input type='text' required title='Username required' placeholder='Username' data-icon='U' name='user' value='$getuser'>
                    <input type='text' required title='Email required' placeholder='Email' data-icon='E' name='email' value='$getemail'>
                    <input type='password' required title='Password required' placeholder='Password' data-icon='x' name='pass' value=''>
                    <input type='password' required title='Password required' placeholder='Retype Password' data-icon='x' name='retypepass' value=''>
                    <input type='submit' class='submit' name='registerbtn' value='Register'>
                </form>
				<form action='login.php' method='get'>
					<input type='submit' value='Login' name='Submit' class='submit' />
				</form>
				

        </section>";
	echo $form;
	if($errormsg)
	echo "<script type='text/javascript'>alert('$errormsg');</script>"
?>
<a href ="login.php" class='submit'>Login</a>
</body>
</html>