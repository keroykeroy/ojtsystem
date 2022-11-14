<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>


<?php
		
        $u_id = $row["t_id"];
		// users employee data
		$query1 = mysqli_query($connection,"SELECT * FROM users_rp_details WHERE t_id = '$u_id'");
		$row1 = mysqli_fetch_assoc($query1);
		$relation = $row1["u_rp_relation"];

                if($relation == "Non Teaching"){

    				    // users monitoring query non teaching
    				    $sqlkra = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_jan_dec WHERE kra_id = '$kra_id'");
    				    $count = mysqli_num_rows($sqlkra);

				        if($count != 0){
				            $sumqual = 0;
				            $sumeff =0;
				            $sumtime = 0;
				            $sumcompl = 0;
				            $dividen = 0;

				            while($row2= mysqli_fetch_assoc($sqlkra)){
				                $sumqual = $sumqual + $row2["rmks_quality"]; 
				                $sumeff = $sumeff + $row2["rmks_efficiency"]; 
				                $sumtime = $sumtime + $row2["rmks_timeliness"]; 
				                $sumcompl = $sumcompl + $row2["kra_mon_completion"]; 
				                $dividen++;
				            }
				            // end while

				                // set to round
				                if($dividen == 0){

				                }else{

				                	$userskratarget = mysqli_query($connection,"SELECT * FROM users_kra WHERE kra_id = '$kra_id'");
				                	$row3 = mysqli_fetch_assoc($userskratarget);
				                	// convert to decimal
				                	$kratarget = ($row3["kra_item_percentage"] / 100);

				                    $sumcompl = ($sumcompl / $dividen);               
				                    $sumqual = round(($sumqual / $dividen),2);
				                    $sumeff = round(($sumeff / $dividen),2);
				                    $sumtime = round(($sumtime / $dividen),2);

				                    $totaldividen = 3;
				                    $searchkra = mysqli_query($connection,"SELECT * FROM users_kra where kra_id = '$kra_id'");
        							$rowkra = mysqli_fetch_array($searchkra);

				                    if($rowkra["kra_timeliness"] == 0){
				                    	$totaldividen--;
				                    }

				                    if($rowkra["kra_efficiency"] == 0){
				                    	$totaldividen--;
				                    }


				                    if($rowkra["kra_quality"] == 0){
				                    	$totaldividen--;
				                    }

									$totaldividen = intval($totaldividen);
				                    $totalaverage = ($sumqual + $sumeff + $sumtime) / $totaldividen;	
									$totalaverage = round($totalaverage,2);
				                    $totalscore = round(($totalaverage * $kratarget) , 2);

				                    $sqlkratotal = mysqli_query($connection,"UPDATE `users_kra` SET `tot_completion`='$sumcompl',`tot_rmks_quality`='$sumqual',`tot_rmks_efficiency`='$sumeff',`tot_rmks_timeliness`= '$sumtime' ,`tot_average` = '$totalaverage', `tot_score` = '$totalscore' WHERE kra_id = '$kra_id'");
				                }
				       	}
				    // non teaching end
				}else{

				}
?>