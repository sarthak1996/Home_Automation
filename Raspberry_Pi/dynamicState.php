<?php
$conState=mysqli_connect("localhost","root","password");
if ($conState->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
	mysqli_select_db($conState,"states");
?>