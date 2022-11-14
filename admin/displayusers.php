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


		/*logo and button*/
		#myDiv {
			display: none;
		}

		/*header title 1*/
		#myDivv {
			display: none;
			text-align: center;
		}

		/*header title 2*/
		#myDivvv{
			display: none;
			text-align: center;
		}

		/*header content*/
		#myDivvvv{
			display: none;
		}

    	/*input group width*/
    	.input-group{
    		max-width: 300px;
    	}

    	/*main div*/
    	.container{
    		margin-top: 30px;
    		margin-bottom: 30px;
    	}

    	.gradient{
        	background-color: #f9ea8f;
        	background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);
    	}

    	.content{
    		margin-top: 50px;
    	}

        .button-back{
            position: absolute;
            left: 0%;
        }

        .button-logout{
            position: absolute;
            right: 0%;
        }

        /*13*/
        td:first-child { width: 700px; text-align: left;} 
        td:last-child { width: auto; text-align: right; } 


		h1{
			font-family: "Calibri Black", sans-serif;
			font-size: 3em;
			letter-spacing: -1px;
			text-shadow: 2px 2px 2px darkgray;
		}

		table,tr,td{ 
		    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		    border-collapse: collapse; 
		    border: 1px solid lightgray;
		    font-size: 13px;
		}

	</style>
</head>

<body onload="myFunction()" style="margin:0;">

	<?php 
		if(isset($_GET["id"])){
		// users id
			$id = $_GET["id"];
		}
	?>

	<?php 

		$usersquery = mysqli_query($connection,"SELECT * FROM join_users_details_view WHERE t_id = '$id'");
        $usercheck = mysqli_fetch_assoc($usersquery);

		$usersmonitoring = mysqli_query($connection,"SELECT * FROM kra_monitoring_view WHERE t_id = '$id'");
        $moncheck = mysqli_fetch_assoc($usersmonitoring);
	?>

    <!-- loader -->
    <div align="center">
        <img id="loader" src="../img/logo/deped_logo.png" width="80" height="80">
    </div>

	<div class="container">

		<!-- 2nd -->
		<div id="myDiv" class="animate-bottom">

            <div class='button-back'> 
                <div class="form-group">
                    <a href="../admin/index.php" class="btn btn-primary" style="max-width: 100px; min-width: 100px; ">BACK</a>
                </div>
            </div>
                       

            <div class="button-logout">
                <div class='form-group'> 
                    <a href="../conn/destroyer.php" class="btn btn-default" style="max-width: 100px; min-width: 100px; ">LOGOUT</a>
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
			<h3>CHECKING OF KEY RESULT AREA</h3>
		</div>
               
		
        <div id="myDivvvv" class="animate-bottom content">
        	<p><label>Control ID :</label> <?php echo $usercheck["control_id"]; ?></p>
        	<p><label>Full Name  :</label> <?php echo $usercheck["t_fullname"]; ?></p>

	        <?php 
	        // get all kra id
	        $kra_id[] = "";
	        $count = 0;
	        $getkraid = mysqli_query($connection,"SELECT kra_id FROM users_kra_view WHERE t_id = '$id'");

	        while($getkra = mysqli_fetch_assoc($getkraid)){
	        	$kra_id[$count] = $getkra["kra_id"];
	        	$count++;
	        }

	 		if($count!=0){
	 			if($usercheck["u_rp_relation"] == "Non Teaching"){
	 				$row = 0;
	 				foreach ($kra_id as $key => $value) {
	 					$sqlmon = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_jan_dec WHERE kra_id = '$value' AND t_id = '$id'");
                        $getobj = mysqli_query($connection,"SELECT * FROM users_kra_view WHERE kra_id = '$value' AND t_id = '$id'");
                        $objrow = mysqli_fetch_assoc($getobj);

	 					echo '<table>'.'<tr class="gradient" >';
	 					while($rowmon = mysqli_fetch_assoc($sqlmon)){
	 						if($row == $rowmon["kra_id"]){
	 							echo '<td><input type="button" name="edit" value="'.$rowmon["kra_mon_month"].'"  id="'.$rowmon["id"].'" class="btn btn-link edit_data"/></td>';
	 						}else{
	 							$row = $rowmon["kra_id"];
	 			
	 							echo '
	 								<td><label>'.$rowmon["kra_no"] . '.' . $rowmon["kra_item"].'</label>'.'<span>'.' ) '.$objrow["kra_objective"].'</span></td><td><input type="button" name="edit" value="'.$rowmon["kra_mon_month"].'"  id="'.$rowmon["id"].'" class="btn btn-link edit_data"/></td>';
	 						}
	 					}
	 					echo '</tr>'.'</table>'.'<br>';
	 				}
	 			}
	 		}
	      	?>

        </div>   	            
	</div>



    <!-- MODAL -->
        <div id="add_data_Modal" class="modal fade">  
          <div class="modal-dialog">  
               <div class="modal-content">  
                    <div class="modal-header" style="background-color:seagreen;">  
                         <button type="button" class="close" data-dismiss="modal">&times;</button>  
                         <strong class="modal-title">Update</strong>
                    </div>  
                    <div class="modal-body">  
                        <form method="post" id="insert_form">
                            <input type="text" id="monitoring_month" name="monitoring_month" class="form-control gradient" readonly style="border: none; font-size: 20px; letter-spacing: 3px; text-align: center; text-transform: uppercase;" />  
                            <br />

                            <div class="form-group">
                                <label style="font-style: italic;">Date and time encoded : </label> <input name="date-encoded" id="date-encoded" type="text" class="" style="border: none; color:red; font-style: italic; outline: none; width: 170px;" readonly>
                            </div>
                            <div class="form-group">
                                <label>Enter Target</label>
                                <input name="mon_target" id="mon_target" type="number" class="form-control prcmodal">
                            </div>
                            <div class="form-group">
                                <label>Enter Actual</label>
                                <input name="mon_actual" id="mon_actual" type="number" class="form-control prcmodal">
                            </div>
                            <div class="form-group"> 
                                <label>Completion</label>  
                                <input type="text" name="mon_completion" id="mon_completion" class="form-control" readonly style="border:none;" />  
                            </div>
                            <div class="form-group">  
                                <label>Remarks on Quality</label>  
                                <select name="mon_quality" id="mon_quality" class="form-control"> 
                                    <?php 
                                        if($rowkra["kra_quality"] == 0 ){ 
                                            echo '<option value="0">Not Required</option>';
                                        }else{
                                            echo'
                                                <option value="1">1</option>  
                                                <option value="2">2</option>  
                                                <option value="3">3</option>  
                                                <option value="4">4</option>  
                                                <option value="5">5</option>';
                                        }
                                    ?>
                                </select>  
                            </div>
                            <div class="form-group">
                            <label>Remarks on Efficiency</label>  
                                <select name="mon_efficiency" id="mon_efficiency" class="form-control"> 
                                    <?php 
                                        if($rowkra["kra_efficiency"] == 0 ){ 
                                            echo '<option value="0">Not Required</option>';
                                        }else{
                                            echo'
                                                <option value="1">1</option>  
                                                <option value="2">2</option>  
                                                <option value="3">3</option>  
                                                <option value="4">4</option>  
                                                <option value="5">5</option>';
                                        }
                                    ?>
                                </select> 
                            </div> 
                            <div class="form-group">
                            <label>Remarks on Timeliness</label>
                                <select name="mon_timeliness" id="mon_timeliness" class="form-control">
                                    <?php 
                                        if($rowkra["kra_timeliness"] == 0 ){ 
                                            echo '<option value="0">Not Required</option>';
                                        }else{
                                            echo'
                                                <option value="1">1</option>  
                                                <option value="2">2</option>  
                                                <option value="3">3</option>  
                                                <option value="4">4</option>  
                                                <option value="5">5</option>';
                                        }
                                    ?>

                                </select>  
                            </div>
                            <input type="hidden" name="insert" id="insert"/>  
                            <input type="submit" name="insert" id="insert" value="Update" class="btn btn-success" /><input type="text" name="modal-kra-id" id="modal-kra-id" style="visibility: hidden;" />    
                        </form>  
                    </div>  
                    <div class="modal-footer">  
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                    </div>  
               </div>  
          </div>  
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
	setInterval(function(){ document.getElementById("myDiv").style.display = "block"; }, 500);
	setInterval(function(){ document.getElementById("myDivv").style.display = "block"; }, 500);
	setInterval(function(){ document.getElementById("myDivvv").style.display = "block"; }, 500);
	setInterval(function(){ document.getElementById("myDivvvv").style.display = "block"; }, 500);
}
</script>

<!-- Update month modal functions -->
 <script>  
 $(document).ready(function(){  
      $(document).on('click', '.edit_data', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"fetch-mon-kra.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                    //form name x database data 
                    var date = data.date_encoded;
                    date = date.split('  ')[0];
                    $("#date-encoded").val(date);
                    $('#insert').val(data.id); 
                    $('#modal-kra-id').val(data.kra_id);  
                    $('#monitoring_month').val(data.kra_mon_month); 
                    $('#mon_actual').val(data.kra_mon_actual);
                    $('#mon_target').val(data.kra_mon_target);
                    $('#mon_completion').val(data.kra_mon_completion + "%");
                    $('#mon_quality').val(data.rmks_quality);  
                    $('#mon_efficiency').val(data.rmks_efficiency);  
                    $('#mon_timeliness').val(data.rmks_timeliness);  
                    $('#add_data_Modal').modal('show'); 

                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#kra_item_perc').val() == "")  
           {  
                // alert("Percentage is required");  validation area
           }  
           else  
           {  
                $.ajax({  
                     url:"monitoring_insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Updating");  
                     },  
                     success:function(data){   
                        $('#insert_form')[0].reset();  
                        $('#add_data_Modal').modal('hide');  
                        $('#monitoring-form').html(data); 
                     }  
                });  
           }  
      });    
 });  
 </script>