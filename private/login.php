<?php
	include_once("../conn/connection.php");
?>


<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="../img/icon/deped_icon.png"/>
<link rel="stylesheet" href="../css/bootstrap.min.css">

<style>


.logo{
	margin-top: 10px;
	margin-bottom: 10px;
}

h1{
	font-family: "Calibri Black", sans-serif;
	font-size: 3em;
	letter-spacing: -1px;
	text-shadow: 2px 2px 2px darkgray;
}

/* Add padding to containers */
.container{
  padding: 20px 20px;
  background-color: white;
  max-width: 500px;
  border-radius: 1em;
  box-shadow: 0 0 10px black;
  margin-top: 30px;	
  margin-bottom: 10px;
}




/*triggered after clicking the inputs*/
input[type=text]:focus, input[type=password]:focus {
  background-color: lightgreen;
  outline: none;
}


/*button*/
.btn{
	min-width: 150px;
}




</style>
</head>
<body>


	<?php
		if(isset($_SESSION['u_id'])){
		header("location:../src/index.php");
		}
	?>

	<?php 

		if(isset($_POST["u_login_submit"])){

			// form innput
			$u_username = mysqli_escape_string($connection,$_POST["u_username"]);
			$u_passw = mysqli_escape_string($connection,$_POST["u_passw"]);


			$userquery = mysqli_query($connection,"SELECT * FROM users WHERE t_username = '$u_username'");
			$row = mysqli_fetch_assoc($userquery);

			$adminquery = mysqli_query($connection,"SELECT * FROM admin WHERE username = '$u_username'");
			$row2 = mysqli_fetch_assoc($adminquery);


			if($u_username == $row2["username"] AND $u_passw == $row2["password"]){
				$a_id = $row2["admin_id"];
				$_SESSION["admin_id"] = $a_id;
				header("location:../admin/index.php");
			}
			else if($u_username == $row["t_username"] && $u_passw == $row["t_password"]){
				$u_id = $row["t_id"];
				$_SESSION["u_id"] = $u_id;
				header("location:../src/index.php");	
			}else{
				echo "NA WRONG!";
			}	
		}
	?>





<div align="center" class="logo">
	<img src="../img/logo/deped_logo.png" width="180" height="180">
</div>

<div>
	<center>
		<h1>PERFORMANCE MONITORING SYSTEM</h1>
	</center>
</div>

<div class="container">
  <center><h2 style="text-transform: uppercase;">Login</h2></center>
  <hr>

 	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
	    <div class='row'>
	        <div class='col-sm-12'>    
	            <div class='form-group'>
	                <label for="username">Username</label>
	                <input class="form-control" id="" name="u_username" type="text" />
	            </div>
	        </div>
	    </div>	
	 	<div class='row'>
	        <div class='col-sm-12'>    
	            <div class='form-group'>
	                <label for="passw">Password</label>
	                <input class="form-control" id="" name="u_passw" type="password" />
	            </div>
	        </div>
	    </div>	

		<center>
		    <div class='signin'>
			    <div class='form-group'>
			       <input class="btn btn-primary" type="submit" name="u_login_submit"/>
			    </div>
			    <p> Not registered yet?</p>
				<a href="registration.php">Create Account</a>
			</div>
		</center>
	</form>	
</div>

</body>
</html>
