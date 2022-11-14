<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>

<?php

    // global
    $message = "";
    $output = "";

    $u_id = $row["t_id"];
    // users employee data
    $empdetails = mysqli_query($connection,"SELECT * FROM users_rp_details WHERE t_id = '$u_id'");
    $emprow = mysqli_fetch_assoc($empdetails);
    $relation = $emprow["u_rp_relation"];


   // MODAL UPDATE
    if(isset($_POST["modal-kra-id"])){
        $kra_id = mysqli_real_escape_string($connection, $_POST["modal-kra-id"]);   
        $id = mysqli_real_escape_string($connection, $_POST["insert"]);   
        $month = mysqli_real_escape_string($connection, $_POST["monitoring_month"]);  
        $actual = mysqli_real_escape_string($connection, $_POST["mon_actual"]);  
        $target = mysqli_real_escape_string($connection, $_POST["mon_target"]);
        $completion = mysqli_real_escape_string($connection, $_POST["mon_completion"]);
        $completion = intval($completion);
        $quality = mysqli_real_escape_string($connection, $_POST["mon_quality"]); 
        $efficiency = mysqli_real_escape_string($connection, $_POST["mon_efficiency"]); 
        $timeliness = mysqli_real_escape_string($connection, $_POST["mon_timeliness"]); 

          if($_POST["insert"] != ''){

            $query = mysqli_query($connection,"UPDATE kra_monitoring SET `kra_mon_actual`='$actual',`kra_mon_target`='$target',`kra_mon_completion`='$completion', `rmks_quality` = '$quality', `rmks_efficiency` = '$efficiency', `rmks_timeliness` = '$timeliness' WHERE id='$id'");  
            $success =  $month . " " . "Performance is Successfully Updated!";
            
            if($query){
              include("../include/update_kra.php");
              echo $message = '<div class="alert alert-success alert-dismissible" id="success-alert" style="display:none;">"'.$success.'"</div>';
            }else{

            }    
          }
        }
        // END OF MODAL

        // INSERT AJAX
        else if(isset($_POST["submit"])){

        $dupl = "";
        // forms input
        $kra_id = mysqli_escape_string($connection,$_POST["kra_id"]);
        $target = mysqli_escape_string($connection,$_POST["kra_target"]);
        $actual = mysqli_escape_string($connection,$_POST["kra_actual"]); 
        $completion = mysqli_escape_string($connection,$_POST["kra_completion"]); 
        $completion = intval($completion);
        $quality = mysqli_escape_string($connection,$_POST["kra_quality"]); 
        $efficiency = mysqli_escape_string($connection,$_POST["kra_efficiency"]); 
        $timeliness = mysqli_escape_string($connection,$_POST["kra_timeliness"]); 
        $month = mysqli_escape_string($connection,$_POST["kra_month"]); 

        $sql = mysqli_query($connection,"SELECT * FROM users_kra WHERE kra_id = '$kra_id'");
            if($sql){
                $emp_row = mysqli_fetch_assoc($sql);

                $kra_no = $emp_row["kra_no"];
                $kra_item = $emp_row["kra_items"];

                $sql2 = mysqli_query($connection, "SELECT * FROM kra_monitoring_view WHERE kra_mon_month = '$month' AND kra_id ='$kra_id'");
                $check_row = mysqli_num_rows($sql2);

                if($check_row == 1){
                  $dupl = "You cannot add with the same month!";
                  echo $message = '<div class="alert alert-danger alert-dismissible" id="danger-alert" style="display:none;">"'.$dupl.'"</div>';
                }else{

                    $finalquery = mysqli_query($connection,"INSERT INTO `kra_monitoring`(`kra_id`,`t_id`, `kra_no`, `kra_item`, `kra_mon_target`, `kra_mon_actual`, `kra_mon_completion`, `rmks_quality`, `rmks_efficiency` ,`rmks_timeliness`,`kra_mon_month`, `date_encoded`) VALUES ('$kra_id','$u_id','$kra_no','$kra_item','$target','$actual','$completion','$quality','$efficiency','$timeliness','$month',NOW())"); 

                      if($finalquery){
                        include("../include/update_kra.php");
                        $success = "Success! Monitoring is perform!";
                        echo $message = '<div class="alert alert-success alert-dismissible" id="success-alert" style="display:none;">"'.$success.'"</div>';
                      }
                }
			     }
	     }

 
?>

<?php 

  if($message != ""){   
                        if(isset($_POST["kra_id"])){
                            $kra_id = mysqli_escape_string($connection,$_POST["kra_id"]);
                        }else if(isset($_POST["modal-kra-id"])){
                            $kra_id = mysqli_escape_string($connection,$_POST["modal-kra-id"]);
                        }

                        if($relation == "Non Teaching"){
	                       	$searchmon = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_jan_dec WHERE kra_id = '$kra_id'");
	                        $moncheck = mysqli_num_rows($searchmon);
                        }else{
                        	$searchmon = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_july_june WHERE kra_id = '$kra_id'");
	                        $moncheck = mysqli_num_rows($searchmon);
                        }


                        $output .= '<div id="monthdiv">';
                        $output .= '<form method="post" id="monitoring-form">';
                        $output .= '<div class="row">
                                    <div class="col-sm-12">   
                                    <div class="form-group">
                                        <label>Month</label>
                                        <div style="border:none;" class="gradient view" id="view" readonly><i>'; 
                                           if(empty($kra_id) || $moncheck == 0){echo "This Key result area (KRA) is no deciding month.";}
                        $output .= '</i><div style="text-align: center;"><small style="font-weight: bold;">
                                          Click Month to  Update';
                        $output .= '</small></div>';
                                    while($rowmonth= mysqli_fetch_assoc($searchmon)){
                        $output .= '<input type="button" name="edit" value="'.$rowmonth["kra_mon_month"].'"  id="'.$rowmonth["id"].'" class="btn btn-link edit_data" />';
                                    }
                        $output .='</div>'.'</div>'.'</div>'.'</div>';

                        $output .='
                    
                                    <div class="row">
                                    <div class="col-sm-6">               
                                            <div class="form-group">
                                                <label for="fname">Select Month</label>
                                                <input type="search" list="month" class="form-control" name="kra_month" id="kra_month">
                                                <datalist id="month">
                                                  <option value="January"/>
                                                  <option value="February"/>
                                                  <option value="March"/>
                                                  <option value="April"/>
                                                  <option value="May"/>
                                                  <option value="June"/>
                                                  <option value="July"/>
                                                  <option value="August"/>
                                                  <option value="September"/>
                                                  <option value="October"/>
                                                  <option value="November"/>
                                                  <option value="December"/>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>';
                        $output .='<div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Enter Target</label>
                                                <input name="kra_target" id="kra_target" type="number" class="form-control prc">
                                            </div>
                                        </div>
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Remarks on Quality</label>
                                                <select class="form-control" name="kra_quality" id="kra_quality">';
                                                    // QUERY TO SEARCH KRA AFTER SUBMITTED
                                                    $searchkra = mysqli_query($connection,"SELECT * FROM users_kra where kra_id = '$kra_id'");
                                                    $rowkra = mysqli_fetch_array($searchkra);
                                                    $arr = array("",1,2,3,4,5);
                                                    foreach($arr as $value){
                                                        if($rowkra["kra_quality"] == 0 )
                                                        {
                        $output .=                          '<option value="0">Not Required</option>';
                                                            break;
                                                        }else{
                        $output .=                          '<option value='.$value.'>'.$value.'</option>';
                                                        }
    
                                                    }
                        $output .= '                                 
                                                </select>
                                            </div>
                                        </div>
                                    </div>';

                        $output .= '     <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Enter Actual</label>
                                                <input name="kra_actual" id="kra_actual" type="number" class="form-control prc">
                                            </div>
                                        </div>';
                        $output .= '                
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Remarks on Efficiency</label>
                                                <select class="form-control" name="kra_efficiency" id="kra_efficiency">';
                                                   foreach($arr as $value){
                                                        if($rowkra["kra_efficiency"] == 0 )
                                                        {
                        $output .=                          '<option value="0">Not Required</option>';
                                                            break;
                                                        }else{
                        $output .=                          '<option value='.$value.'>'.$value.'</option>';
                                                        }
                                                   }
                        $output .='             </select>
                                            </div>
                                        </div>
                                    </div>';   

                        $output .=' <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Completion</label>
                                                <input name="kra_completion" id="kra_completion" type="text" class="form-control" style="border: none;" readonly>
                                            </div>
                                        </div>';
                        $output .=' <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Remarks on Timeliness</label>
                                                <select class="form-control" name="kra_timeliness" id="kra_timeliness">';
                                                    foreach($arr as $value){
                                                        if($rowkra["kra_timeliness"] == 0 )
                                                        {
                        $output .=                          '<option value="0">Not Required</option>';
                                                            break;
                                                        }else{
                        $output .=                          '<option value='.$value.'>'.$value.'</option>';
                                                        }
                                                    }
                                                        
                        $output .='   
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div align="center">
                                        <input type="button" class="btn btn-primary" value="Perform Monitoring" id="submit-form" name="save" style="">
                                    </div>
                                </form>
                            </div>  
                        </div>';


                        echo $output;
  }

?>

  <script>
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
    });
  </script>

    <script>
    $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#danger-alert").slideUp(500);
    });
  </script>

  
<!-- AUTO CALCULATE AFTER AJAX LOAD THIS ONE WILL RUN-->
<script>
    $('.form-group').on('input','.prc',function(){
        var total = 0;
        $('.form-group .prc').each(function(){
            var target = parseFloat($("#kra_target").val()) || 0;
            var actual = parseFloat($("#kra_actual").val()) || 0;
            if(target == 0){
                total = 0;    
            }else{
                total = (actual / target) * 100;
                total = Math.round(total);
            }
        });
        $('#kra_completion').val(total+'%');
    });
</script>