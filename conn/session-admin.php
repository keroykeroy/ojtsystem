<?php
    //this verifies if session exists then redirect to user dashboard if not then goto login page
    include_once('connection.php');

    if(isset($_SESSION["admin_id"])){
    
    	// ADMIN SESSION
	   	$a_id = $_SESSION['admin_id']; //check if user is logined

	    $ses_query = mysqli_query($connection, "SELECT * FROM admin WHERE admin_id = '$a_id' ");

	    $row = mysqli_fetch_assoc($ses_query);
	    $a_id = $row["admin_id"];
    }else{
	    header("location:../private/login.php");
	}

?>