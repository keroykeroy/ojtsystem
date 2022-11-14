<?php
	include_once("../conn/connection.php");
?>


<!DOCTYPE html>
<html>
<head>

<title>PMS Registration</title>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" type="image/x-icon" href="../img/icon/deped_icon.png"/>
<link rel="stylesheet" href="../css/bootstrap.min.css">

<style>

.logo{
	margin-top: 10px;
	margin-bottom: 10px;
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



/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/*button*/
.btn{
	width: 100%;
}


</style>
</head>
<body>

	<?php

		if(isset($_POST["u_reg_submit"])){

			$u_fname = mysqli_escape_string($connection,$_POST["u_fname"]);
			$u_fname = ucwords(strtolower($u_fname));

			$u_mname = mysqli_escape_string($connection,$_POST["u_mname"]);
			$u_mname = ucwords(strtolower($u_mname));

			$u_lname = mysqli_escape_string($connection,$_POST["u_lname"]);
			$u_lname = ucwords(strtolower($u_lname));

			$u_dob = mysqli_escape_string($connection,$_POST["u_dob"]);
			$u_contactno = mysqli_escape_string($connection,$_POST["u_contactno"]);
			$u_sex = mysqli_escape_string($connection,$_POST["u_sex"]);
			$u_email = mysqli_escape_string($connection,$_POST["u_email"]);
			$u_username = mysqli_escape_string($connection,$_POST["u_username"]);
			$u_passw = mysqli_escape_string($connection,$_POST["u_passw"]);
			$u_cpassw = mysqli_escape_string($connection,$_POST["u_cpassw"]); 

			$u_fullname = $u_fname . ' ' . $u_mname . ' ' . $u_lname;
			$u_fullname = ucwords($u_fullname);



			if($u_passw == $u_cpassw){
				$query = mysqli_query($connection,"INSERT INTO users(t_fullname,t_firstname,t_midname,t_lastname,t_dob,t_phonenumber,t_sex,t_email,t_username,t_password,t_registration_date) VALUES ('$u_fullname','$u_fname','$u_mname','$u_lname','$u_dob','$u_contactno','$u_sex','$u_email','$u_username','$u_passw',NOW())");

				$id = mysqli_insert_id($connection);
				$newid = strval($id);
				$generate_id =  "2019" . "-" .$newid;

				$query2 = mysqli_query($connection,"UPDATE users SET control_id = '$generate_id' WHERE t_id = ".$id."");

				if($query2){
				echo ("<script>
					    window.location.replace('../private/login.php');
					   </script>");
				}else{
				echo "error";
				}
			}else{
				echo "Wrong passwords";
			}
		}

	?>

<div align="center" class="logo">
	<img src="../img/logo/deped_logo.png" width="180" height="180">
</div>

<div class="container">
  <center><h2 style="text-transform: uppercase;">registration</h2></center>
  <br>
  <p>Please fill up the form to create account.	
  <br>
  <br>
  
  <legend class="">Personal Information</legend>
 	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	    <div class='row'>
	        <div class='col-sm-4'>    
	            <div class='form-group'>
	                <label for="firstname">First Name</label>
	                <input class="form-control" id="" name="u_fname" type="text" title="Only Alphabetical Letter is Allowed." required pattern ="^[a-zA-Z\s]*$"/>
	            </div>
	        </div>
	        <div class='col-sm-4'>
	            <div class='form-group'>
	                <label for="middlename">Middle name</label>
	                <input class="form-control" id="" name="u_mname" type="text" title="Only Alphabetical Letter is Allowed." required pattern ="^[a-zA-Z\s]*$"/>
	            </div>
	        </div>
	        <div class='col-sm-4'>
	            <div class='form-group'>
	                <label for="lastname">Last name</label>
	                <input class="form-control" id="" name="u_lname"  type="text" title="Only Alphabetical Letter is Allowed." required pattern ="^[a-zA-Z\s]*$"/>
	            </div>
	        </div>
	    </div>

	    <div class='row'>

	        <div class='col-sm-8'>
	            <div class='form-group'>
	                <label for="phonenumber">Phone Number</label>
	                <input class="form-control" id="" name="u_contactno" type="text" title="Invalid phone format, try again." placeholder ="Format: 09-999-999-999" required pattern="^(09)-\d{3}-\d{3}-\d{3}$"/>
	            </div>
	        </div>

	        <div class='col-sm-4'>
	            <div class='form-group'>
	                <label for="gender">Sex</label>
	                <select class="form-control" name="u_sex" required>
	                	  <option selected disabled></option>
						  <option value="Male">Male</option>
						  <option value="Female">Female</option>
					</select> 
	            </div>
	        </div>
	    </div> 
	    <!-- end -->
	   
	    <div class='row'>
	        <div class='col-sm-6'>
	            <div class='form-group'>
	                <label for="email">Email Address</label>
	                <input class="form-control required email" id="" name="u_email" type="text" title="Invalid email format, try again." required pattern ="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
	            </div>
	        </div>

	        <div class='col-sm-6'>    
	            <div class='form-group'>
	            <label for="birthdate">Date of Birth</label>
       		 	<input class="form-control" type="date" name="u_dob" required/>
	            </div>
	        </div>
	    </div>

	    <legend class="">User Account</legend>
	    <div class='row'>
	        <div class='col-sm-12'>
	            <div class='form-group'>
	                <label for="username">Username</label>
	                <input class="form-control required email" id="" name="u_username" type="text" title="Invalid username, only alphanumeric value and minimum of 6 and maximum of 12 characters allowed." required pattern ="^[a-zA-Z0-9]{6,12}$"/>
	            </div>
	        </div>
	    </div>

	    <div class='row'>
	        <div class='col-sm-4'>    
	            <div class='form-group'>
	                <label for="password">Password</label>
	                <input class="form-control" id="" name="u_passw"  type="password" required/>
	            </div>
	        </div>

	        <div class='col-sm-8'>
	            <div class='form-group'>
	                <label for="confirmpass">Confirm Password</label>
	                <input class="form-control" id="" name="u_cpassw" type="password" required/>
	            </div>
	        </div>
	    </div>
	    <hr>	

	   <div class='row'>
	        <div class='col-sm-6'>    
	            <div class='form-group'>
	                <input class="btn btn-success" type="submit" name="u_reg_submit" value="Submit" />
	            </div>
	        </div>

	        <div class='col-sm-6'>    
	            <div class='form-group'>	
	                <a href="login.php" class="btn btn-warning" type="submit">Back</a>
	            </div>
	        </div>
	    </div>


	</form>
</div>

</body>
</html>
