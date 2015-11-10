<?php
$conSec=mysqli_connect("localhost","root","password");
if ($conSec->connect_error) {
    die("Connection failed: " . $conSec->connect_error);
}
else{
	mysqli_select_db($conSec,"security");
}
?>
