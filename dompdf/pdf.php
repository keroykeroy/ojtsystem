<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>

<?php 
use Dompdf\Dompdf;
require 'vendor/autoload.php';
?>

<?php

$html = '

	<<!DOCTYPE html>
	<html>
	<head><title>IPCRF (Non Teaching)</title>
	<style>

		.left-column
		{   
		    text-align: right;  
		    font-size:11px;
		}


		.table-data{
			width:100%;
			overflow-wrap: break-word;
		}

		table,tr,td{ 
		    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		    border-collapse: collapse; 
		    border: 1px solid lightgray;
		    font-size: 11px;
		}


		.img{
		    width: 100%;
		}


		.txt-align-center{
		    text-align: center;
		}


		.media td:first-of-type {
			width: 3%;

  		}
  		.media td:nth-of-type(2) {
  			width: 10%;

  		}
  		.media td:nth-of-type(3) {
  			width: 13%;

  		}
  		.media td:nth-of-type(4) {
  			width: 4%;

  		}
  		.media td:nth-of-type(5) {
  			width: 4%;

  		}
  		.media td:nth-of-type(6) {
  			width: 2%;

  		}
  		.media td:nth-of-type(7) {
  			width: 12%;

  		}
  		.media td:nth-of-type(8) {
  			width: 12%;

  		}
  		.media td:nth-of-type(9) {
  			width: 12%;  			

  		}
  		.media td:nth-of-type(10) {
			width: 6%;

  		}
  		.media td:nth-of-type(11) {
  			width: 4%;

  		}
  		.media td:nth-of-type(12) {
  			width: 4%;

  		}
  		.media td:nth-of-type(13) {
  			width: 4%;

  		}	
  		.media td:nth-of-type(14) {
  			width: 4%;

  		}
  		.media td:last-of-type {
  			width:10%;
  		}

      .blocks {
           display: inline-block;
           width: 350px; 
           margin-right: 30px;
           margin-left: 30px;
         }

      .underline{
          border-bottom: solid 0.5px black; 
          text-align: center;
      }

      .underline-bot{ 
          text-align: center;
      }

      .wrap{
        position: absolute; 
        bottom: 0%;
      }

    

	</style>
	</head>
	
	<body>';


 
        $id = $row["t_id"];
        //  1st query for employee data
        $rp_d_query = mysqli_query($connection, "SELECT * FROM users_rp_details WHERE t_id = '$id'");
        $rp_count = mysqli_num_rows($rp_d_query);
        $rowrp = mysqli_fetch_assoc($rp_d_query);

        // 2nd query for user data
        $usersquery = mysqli_query($connection,"SELECT * FROM users where t_id = '$id'");
        $rowusers = mysqli_fetch_assoc($usersquery);


$html .= '<div>
	    <img src="../img/ipcrf_cover.png" class="img"> 
		</div>

		    <table class="table table-responsive table-data" cellpadding="5">

		            <tr>
                        <td colspan="2" class="left-column">
                            CONTROL ID:
                        </td>
                        <td colspan="6"> 
                          '.$rowusers["control_id"].'
                        </td>

                        <!-- Right -->
                        <td colspan="1" class="left-column">
                            NAME OF RATER&nbsp;&nbsp;:
                        </td>
                        <td colspan="6"> 
                            ---
                        </td>
                    </tr>

                                      <tr>
                        <td colspan="2" class="left-column">
                            EMPLOYEE NAME&nbsp;&nbsp;:
                        </td>
                        <td colspan="6">
                            '.$rowusers["t_lastname"]. ", " . $rowusers["t_firstname"].'
                        </td>
                        <!-- Right -->
                        <td colspan="1" class="left-column">
                            POSITION&nbsp;&nbsp;:
                        </td>
                        <td colspan="6">
                            ---
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2" class="left-column">
                            POSITION&nbsp;&nbsp;:
                        </td>
                        <td colspan="6">
                          '.$rowrp["u_rp_position"].'
                        </td>
                        <!-- Right -->
                        <td colspan="1" class="left-column">
                            DATE REVIEW&nbsp;&nbsp;:
                        </td>
                        <td colspan="6">
                           ---
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="left-column">
                            DIVISION/SCHOOL&nbsp;&nbsp;:
                        </td>
                        <td colspan="6">
                           '.$rowrp["u_rp_office"].'
                        </td> 
                            <!-- Right -->
                            <td  colspan="1" class="left-column">
                             
                            </td>
                            <td colspan="6"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="left-column">
                            RATING PERIOD&nbsp;&nbsp;:
                        </td>
                        <td colspan="6">';
                           
                                if($rp_count != 0){ 
                                    if($rowrp["u_rp_relation"] == "Non Teaching")
                                    {   
                                        $tricks = $rowrp["u_rp_dateper"];
                                        $tricks = intval($tricks);
                                        if($tricks == 0){
$html .=                                	"CY" . " undefined";
                                        }else{
$html .=                                	"CY" . " " . $tricks;
                                        }
                                    }
                                    else{
$html .=                                  $rowrp["u_rp_dateper"];

                                    } 
                                }
                          
$html .=                '</td>
                        <!-- Right -->
                            <td colspan="1" class="left-column">
                                <!-- blank -->
                            </td>
                             <td colspan="6">
                               <!-- BLANK -->
                            </td>
                    </tr>  


		            <tr>
		                <th class="txt-align-center" colspan="9" style="background-color:#FFDAB9; letter-spacing: 2px;"><i>TO BE FILLED IN DURING PLANNING</i></th>
		                <th class="txt-align-center" colspan="6" style="background-color:#FFE4B5; letter-spacing: 2px;"><i>TO BE FILLED IN DURING EVALUATION</i></th>
		            </tr>
		            <tr>
		                <td class="txt-align-center">MFO</td>
		                <td class="txt-align-center">KRAs</td>
		                <td class="txt-align-center">OBJECTIVES</td>
		                <td class="txt-align-center">TIMELINE</td>
		                <td class="txt-align-center">Weight per KRA</td>
		                <td colspan="4" class="txt-align-center">PERFORMANCE INDICATORS</td>
		                <td class="txt-align-center">ACTUAL<br> RESULTS</td>
		                <td colspan="4" class="txt-align-center">RATING</td>
		                <td class="txt-align-center">SCORE</td>
		            </tr>

		            <tr class="media">
		            	<td></td>
		                <td></td>
		                <td></td>
		                <td></td>
		                <td></td> 
		                <td class="txt-align-center">#</td>
		                <td class="txt-align-center">QUALITY</td>
		                <td class="txt-align-center">EFFICIENCY</td>
		                <td class="txt-align-center">TIMELINESS</td>
		                <td ></td>
		                <td class="txt-align-center">Q</td>
		                <td class="txt-align-center">E</td>
		                <td class="txt-align-center">T</td>
		                <td class="txt-align-center">Ave</td>
		                <td ></td>
		            </tr>';

		            $overalltotalscore = 0; 
		            $message = 0; 
		             
		            $query2 = mysqli_query($connection,"SELECT * FROM ipcrf_view WHERE t_id = '$id'");
		            while($row = mysqli_fetch_assoc($query2)){
$html .=		    '<tr>
		                <td></td>
		                <td>'; 
		                	if($row["pi_no"] == 5 ){ 
$html .=		                $row["kra_gen_objective"]; 
		                	}
$html .=		        '</td>
		                <td>';
		                	if($row["pi_no"] == 5 ){
$html .=		                $row["kra_no"] . "." . $row["kra_items"] . ")" . "&nbsp;&nbsp;&nbsp;" . $row["kra_objective"];
							}
$html .=		        '</td>
		                <td class="txt-align-center">'; 
		                	if($row["pi_no"] == 5 ){ 
$html .=		                "Monthly"; 
							}
$html .=	            '</td>
		                <td class="txt-align-center">';
		                	if($row["pi_no"] == 5 ){ 
$html .=		                $row["kra_target_percentage"] . "%";
							}
$html .=                '</td>
		                <td class="txt-align-center">';
$html .=		               $row["pi_no"]; 
$html .= 				'</td>
		                <td>'.
		                	$row["pi_quality"].'</td>
		                <td>'.$row["pi_efficiency"].'</td>
		                <td>'.$row["pi_timeliness"].'</td>';

$html .=		       	'<td class="txt-align-center">';
							if($row["pi_no"] == 5 ){
								if($row["tot_completion"] != "" ){ 
$html .=							$row["tot_completion"] . "%"; 
								}
							} 
$html .=				'</td>
		                <td class="txt-align-center">';
		                	if($row["pi_no"] == 5 ){
$html .=		                $row["tot_rmks_quality"]; 
		                	}
$html .=                '</td>
		                <td class="txt-align-center">';
		                	if($row["pi_no"] == 5 ){
$html .=		                $row["tot_rmks_efficiency"]; 
							}
$html .=               	'</td>
		                <td class="txt-align-center">';
		                	if($row["pi_no"] == 5 ){ 
$html .=		                $row["tot_rmks_timeliness"]; 
		                	}
$html .=		        '</td>
		                <td class="txt-align-center">';
		                	if($row["pi_no"] == 5 ){
$html .=		                $row["tot_average"]; 
		                	}
$html .=		        '</td>
		                <td class="txt-align-center">';
		                	if($row["pi_no"] == 5 ){
$html .=		                $row["tot_score"]; $overalltotalscore = $overalltotalscore + $row["tot_score"];
							}
$html .=				'</td>
		            </tr>';
		        }

$html .=		
		    '<tr>
                <td colspan="9" rowspan="2"></td>    
                <td colspan="2" rowspan="2" class="txt-align-center">OVERALL RATING FOR ACCOMPLISHMENT</td>  
                <td colspan="3" class="txt-align-center">NUMERICAL RATING</td>  
                <td class="txt-align-center">'.$overalltotalscore.'</td> 
            </tr>
            <tr>     
                <td colspan="3" class="txt-align-center">ADJECTIVAL RATING</td>  
                <td class="txt-align-center" style="text-transform: uppercase;">';
             
                        if($overalltotalscore < 1.5){
	 					 	$message = "Poor";
                        }else if($overalltotalscore < 2.5){
 							$message = "Unsatisfac - tory";
                        }else if($overalltotalscore < 3.5){
 							$message = "Satisfac - tory";
                        }else if($overalltotalscore <4.5){
 							$message = "Very Satisfac - tory";
                        }else{
							$message = "Outstan - ding";
                        }
$html .=		$message;
                	
$html .=        '</td>
            </tr>
				</table>


        <div class="wrap">
  
              <div class="blocks">
                <div class="underline">
                  <div>Romel M. Tambis</div>
                </div>
                  <p class="underline-bot">Rater</p>
              </div>

              <div class="blocks">
                <div class="underline">
                  <div>'.$rowusers["t_fullname"].'</div>
                </div>
                  <p class="underline-bot">Ratee</p>
              </div>

              <div class="blocks">
                <div class="underline">
                  <div>?</div>
                </div>
                  <p class="underline-bot">Approving Authority</p>
              </div>
          

        </div>

	</body>
</html>';

?>

<?php 
	$codeHTML = utf8_encode($html);
	$dompdf = new dompdf();
	$dompdf->load_html($codeHTML);
	$dompdf->setPaper('Legal','landscape');

	ini_set('memory_limit','128M');
	$dompdf->render();
	$dompdf->stream('ipcrf-non.pdf');

?>