<?php
	include_once("../conn/connection.php");
?>

<?php

if(isset($_SESSION['u_id']))	
{	
	unset($_SESSION['u_id']);
	session_destroy();
	header("location:../private/login.php");
}

if(isset($_SESSION['admin_id']))	
{	
	unset($_SESSION['admin_id']);
	session_destroy();
	header("location:../private/login.php");
}


?>