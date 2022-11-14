<?php
    //this verifies if session exists then redirect to user dashboard if not then goto login page
    include_once('connection.php');

    if(!empty($_SESSION["u_id"])){
    	
	    // USERS SESSION
	   	$u_id = $_SESSION['u_id']; //check if user is logined

	    $ses_query = mysqli_query($connection, "SELECT * FROM users WHERE t_id = '$u_id' ");

	    $row = mysqli_fetch_assoc($ses_query);
	    $u_id = $row["t_id"];
    }else{
	    header("location:../private/login.php");
	}
    
?>