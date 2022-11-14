<?php
    require_once("../conn/connection.php");
    include_once("../conn/session-admin.php");
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="../img/icon/deped_icon.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet" />
	<style>
		#loader{
		    position: relative;
		    top: 300px;
		    width: 80px;
		    height: 80px;
		    -webkit-animation:spin 4s linear infinite;
		    -moz-animation:spin 4s linear infinite;
		    animation:spin 4s linear infinite;
		}

		@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
		@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
		@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }

		/* Add animation to "page content" */
		.animate-bottom {
		  position: relative;
		  -webkit-animation-name: animatebottom;
		  -webkit-animation-duration: 1s;
		  animation-name: animatebottom;
		  animation-duration: 1s
		}

		@-webkit-keyframes animatebottom {
			from { bottom:-150px; opacity:0 } 
		  	to { bottom:0; opacity:1 }
		}

		@keyframes animatebottom { 
		  from{ bottom:-150px; opacity:0 } 
		  to{ bottom:0; opacity:1 }
		}


		h1{
			font-family: "Calibri Black", sans-serif;
			font-size: 3em;
			letter-spacing: -1px;
			text-shadow: 2px 2px 2px darkgray;
		}

		/*button and logo*/
		#myDiv {
		  display: none;
		}

		/*header title*/
		#myDivv {
		  display: none;
		  text-align: center;
		}

		/*table*/
		#myDivvv{
		  display: none;
		}

    	/*input group width*/
    	.input-group{
    		max-width: 300px;
    	}

    	/*main div*/
    	.container{
    		margin-top: 30px;
    	}

    	.button-logout{
            position: absolute;
            right: 0%;
        }


		table,tr,td{ 
		    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		    border-collapse: collapse; 
		    border: 1px solid lightgray;
		    font-size: 13px;
		}


		td:hover {
 			cursor:pointer;
		}

	</style>
</head>

<body onload="myFunction()" style="margin:0;">

	<!-- loader -->
	<div align="center">
		<img id="loader" src="../img/logo/deped_logo.png" width="80" height="80">
	</div>


	<div class="container">
	
		<div id="myDiv" class="animate-bottom">
			<div class="button-logout">
             	<div class='form-group'> 
                	<a href="../conn/destroyer.php" class="btn btn-default"  style="max-width: 100px; min-width: 100px;">LOGOUT</a>
             	</div>
         	</div>

         	<div align="center">  
				<img src="../img/logo/deped_logo.png" width="180" height="180">
			</div>
		</div>

		<div id="myDivv" class="animate-bottom">
		  <h1>PERFORMANCE MONITORING SYSTEM</h1>
		  <br>
		  <p style="letter-spacing: 3px;">Administrative Section</p>
		</div>

		<div id="myDivvv" class="animate-bottom">
			<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="searchusers" id="searchusers" placeholder="search by name, id or job group" class="form-control" />
			</div>
			<p id="result"></p>
		</div>

</body>
</html>


<!-- intervals -->
<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 1000);
}

function showPage() {
  	document.getElementById("loader").style.display = "none";
  	setInterval(function(){ document.getElementById("myDiv").style.display = "block"; }, 0);
	setInterval(function(){ document.getElementById("myDivv").style.display = "block"; }, 500);
	setInterval(function(){ document.getElementById("myDivvv").style.display = "block"; }, 500);
}
</script>

<!-- Search ajax -->
<script>
	$(document).ready(function(){
		load_data();

		 function load_data(query){
			$.ajax({
			   url:"fetch-users.php",
			   method:"POST",
			   data:{query:query},
			   success:function(data)
			   {
			    $('#result').html(data);
			   }
			 });
		 }
		$('#searchusers').keyup(function(){
		  var search = $(this).val();
		  if(search != ''){
		   load_data(search);
		  }
		  else{
		   load_data();
		  }
		});
	});
</script>

