<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>

<!DOCTYPE html>
<html>
<head>
<title></title>

<style type="text/css">
    
    /*table bordered*/
    table,tr,td,th{ 
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse; 
        border: 1px solid darkgray;
        font-size: 13px;
    }

    /*all table fixed*/
    table{
    table-layout: fixed;
    overflow-wrap: break-word;
    }

    /*txt style and align*/
    .txt-align-center{
        text-align: center;
    }

    .opac{
          opacity: 0.2;
    }

</style>
</head>

<body>

<?php 


// users employee data
$query1 = mysqli_query($connection,"SELECT * FROM users_rp_details WHERE t_id = '$u_id'");
$row1 = mysqli_fetch_assoc($query1);
$relation = $row1["u_rp_relation"];

// GLOBAL ID's
$kra_id = $_POST["kra_id"];
// user id
$u_id = $row["t_id"];

// OUTPUT IN THE MODAL
$output =   '<table class="table table-hover">
                <colgroup>
                    <col style="width: 10px">
                    <col style="width: 20px">
                    <col style="width: 20px">
                    <col style="width: 20px">
                    <col style="width: 20px">
                </colgroup> 
                <tr>
                    <th>
                        <label></label>                        
                    </th>
                    <th>
                        <label>Actual Result</label>
                    </th>
                    <th>
                        <label>Quality</label>                        
                    </th>
                    <th>
                        <label>Efficiency</label>                        
                    </th>
                    <th>
                        <label>Timeliness</label>                        
                    </th>
                </tr>';
            

// 1= midyear
if($_POST["id"] == 1 AND $_POST["kra_id"] != ""){

    if($relation == "Non Teaching" ){

    // users monitoring query non teaching
    $query2 = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_jan_dec where kra_id = '$kra_id'");

    $count = mysqli_num_rows($query2);

        if($count != 0){

            $sumqual = 0;
            $sumeff = 0;
            $sumtime = 0;
            $sumcompl = 0;
            $dividen = 0;
            $arr_month[] = "";

            while($row2= mysqli_fetch_assoc($query2)){
                if($row2["kra_mon_month"] == "January" OR $row2["kra_mon_month"] == "February" OR $row2["kra_mon_month"] == "March" or $row2["kra_mon_month"] == "April" OR $row2["kra_mon_month"] == "May" OR $row2["kra_mon_month"] == "June"){
                $arr_month[$dividen] = $row2["kra_mon_month"];
                $sumqual = $sumqual + $row2["rmks_quality"]; 
                $sumeff = $sumeff + $row2["rmks_efficiency"]; 
                $sumtime = $sumtime + $row2["rmks_timeliness"]; 
                $sumcompl = $sumcompl + $row2["kra_mon_completion"]; 
                $dividen++;
                $print = 1;
                }
            }
            // end while

                if($dividen == 0){

                }else{
                    $sumcompl = round($sumcompl / $dividen);               
                    $sumqual = round(($sumqual / $dividen),2);
                    $sumeff = round(($sumeff / $dividen),2);
                    $sumtime = round(($sumtime / $dividen),2);
                }
                // set to round



                $output .= '<tr>
                            <td>'."<label>Total</labeL>".'</td>';
                $output .= '<td>'.$sumcompl."%".'</td>';
                $output .= '<td>'.$sumqual.'</td>';
                $output .= '<td>'.$sumeff.'</td>';
                $output .= '<td>'.$sumtime.'</td>';
                $output .= '<tr>';
                $output .= '</table>';

            echo '<table class="table">

                <col style="width: 6px">
                <col style="width: 20px">

                <tr>
                    <td>
                        <label>Required Month</label> 
                    </td>
                    <td>
                        January - June
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Acquired Month</label> 
                    </td>
                    <td>';
                        foreach ($arr_month as $key => $value) {
                            if($value == end($arr_month)){
                                echo $value;
                            }else{
                                echo $value . ", ";
                            }
                            
                        }
            echo    '</td>
                </tr>
            </table>';
            echo $output;
                

        }
    }else if($relation == "Teacher"){
        // TEACHER
    }else{
        // TEACHER  RELATED
    }

// 2 YEAR END 
}else if($_POST["id"] == 2 AND $_POST["kra_id"] != ""){

    if($relation == "Non Teaching"){

    // users monitoring query non teaching
    $query2 = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_jan_dec WHERE kra_id = '$kra_id'");

    $count = mysqli_num_rows($query2);

        if($count != 0){

            $sumqual = 0;
            $sumeff =0;
            $sumtime = 0;
            $sumcompl = 0;
            $dividen = 0;
            $arr_month[] = "";

            while($row2= mysqli_fetch_assoc($query2)){
                // total
                if($row2["kra_mon_month"] == "July" OR $row2["kra_mon_month"] == "August" OR $row2["kra_mon_month"] == "September" or $row2["kra_mon_month"] == "October" OR $row2["kra_mon_month"] == "November" OR $row2["kra_mon_month"] == "December"){
                $arr_month[$dividen] = $row2["kra_mon_month"];
                $sumqual = $sumqual + $row2["rmks_quality"]; 
                $sumeff = $sumeff + $row2["rmks_efficiency"]; 
                $sumtime = $sumtime + $row2["rmks_timeliness"]; 
                $sumcompl = $sumcompl + $row2["kra_mon_completion"]; 
                $dividen++;
                $print = 1;
                }
            }
            // end while

                // set to round
                if($dividen == 0){

                }else{
                    $sumcompl = round($sumcompl / $dividen);               
                    $sumqual = round(($sumqual / $dividen),2);
                    $sumeff = round(($sumeff / $dividen),2);
                    $sumtime = round(($sumtime / $dividen),2);
                }



                $output .= '<tr>
                            <td>'."<label>Total</labeL>".'</td>';
                $output .= '<td>'.$sumcompl."%".'</td>';
                $output .= '<td>'.$sumqual.'</td>';
                $output .= '<td>'.$sumeff.'</td>';
                $output .= '<td>'.$sumtime.'</td>';
                $output .= '<tr>';
                $output .= '</table>';

            echo '<table class="table">

                <col style="width: 6px">
                <col style="width: 20px">

                <tr>
                    <td>
                        <label>Required Month</label> 
                    </td>
                    <td>
                        July - December
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Acquired Month</label> 
                    </td>
                    <td>';
                        foreach ($arr_month as $key => $value) {
                            if($value == end($arr_month)){
                                echo $value;
                            }else{
                                echo $value . ", ";
                            }
                            
                        }
            echo    '</td>
                </tr>
            </table>';
            echo $output;
                

        }
    }else if($relation == "Teacher" AND $_POST["kra_id"] != ""){
        // TEACHER
    }else{
        // TEACHER  RELATED
    }


// 3 SUMMARY OF ALL
}else if($_POST["id"] == 3 AND $_POST["kra_id"] != ""){


    if($relation == "Non Teaching"){

    // users monitoring query non teaching
    $query2 = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_jan_dec WHERE kra_id = '$kra_id'");

    $count = mysqli_num_rows($query2);

        if($count != 0){

            $arr_month[] = "";
            $dividen = 0;

            while($row2= mysqli_fetch_assoc($query2)){
                $arr_month[$dividen] = $row2["kra_mon_month"]; 
                $dividen++;
            }
            // end while

                // set to round
                if($dividen != 0){
                    $query3 = mysqli_query($connection,"SELECT * FROM users_kra WHERE kra_id = '$kra_id'");
                    $rows = mysqli_fetch_assoc($query3);
                    $sumcompl = $rows["tot_completion"];
                    $sumqual = $rows["tot_rmks_quality"];
                    $sumeff = $rows["tot_rmks_efficiency"];
                    $sumtime = $rows["tot_rmks_timeliness"];
                }


                $output .= '<tr>
                            <td>'."<label>Total</labeL>".'</td>';
                $output .= '<td>'.$sumcompl."%".'</td>';
                $output .= '<td>'.$sumqual.'</td>';
                $output .= '<td>'.$sumeff.'</td>';
                $output .= '<td>'.$sumtime.'</td>';
                $output .= '<tr>';
                $output .= '</table>';

            echo '<table class="table">

                <col style="width: 6px">
                <col style="width: 20px">

                <tr>
                    <td>
                        <label>Required Month</label> 
                    </td>
                    <td>
                        Jan - December
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Acquired Month</label> 
                    </td>
                    <td>';
                        foreach ($arr_month as $key => $value) {
                            if($value == end($arr_month)){
                                echo $value;
                            }else{
                                echo $value . ", ";
                            }
                            
                        }
            echo    '</td>
                </tr>
            </table>';
            echo $output;
                

        }
    }else if($relation == "Teacher" AND $_POST["kra_id"] != ""){
        // TEACHER
    }else{
        // TEACHER  RELATED
    }

// IF NO KRA CLICKED
}else{
    echo '<div align="center"><h2 class="opac">SELECT KRA TO VIEW</h2></div>';
}
?>



</body>
</html>

