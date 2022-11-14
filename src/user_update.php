<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>

<?php

        $u_id = $row["t_id"];
        $u_fname = mysqli_escape_string($connection,$_POST["u_fname"]);
        $u_mname = mysqli_escape_string($connection,$_POST["u_mname"]); 
        $u_lname = mysqli_escape_string($connection,$_POST["u_lname"]); 
        $u_dob = mysqli_escape_string($connection,$_POST["u_dob"]); 
        $u_sex = mysqli_escape_string($connection,$_POST["u_sex"]); 
        $u_contactno = mysqli_escape_string($connection,$_POST["u_contactno"]); 
        $u_email = mysqli_escape_string($connection,$_POST["u_email"]);
  		$query = "UPDATE users SET t_firstname='$u_fname',t_midname='$u_mname',t_lastname='$u_lname',t_dob='$u_dob',t_phonenumber='$u_contactno',t_sex='$u_sex',t_email='$u_email' WHERE t_id = '$u_id'"; 
  		if (mysqli_query($connection, $query)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($connection);
?>

