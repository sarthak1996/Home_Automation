<?php
$con=mysqli_connect("localhost","root","password");
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
	mysqli_select_db($con,"login");
?>