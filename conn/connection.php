<?php

require("constant.php");
	
	session_start();

		$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if(!$connection)
{
	die("Database connection failed " . mysql_error());
}


?>