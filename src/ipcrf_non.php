<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>

<!DOCTYPE html>
<html>
<head><title>IPCRF (Non Teaching)</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin:0;}


/*TABLE DETAILS */
.left-column
{   
    text-align: right;  
    font-size:13px;
}

/*width of tables*/
.table-data{
    table-layout: fixed;
    overflow-wrap: break-word;
}

table,tr,td{ 
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse; 
    border: 1px solid darkgray;
    font-size: 13px;
}


.img{
    position: relative;
    top: 0;
    width: 100%;
}

.container{
    margin-bottom: 35px;
}

.txt-align-center{
    text-align: center;
}

    
</style>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon/deped_icon.png"/>
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/meanmenu.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/educate-custon-icon.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../css/calendar/fullcalendar.print.min.css">
    <!-- x-editor CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/editor/select2.css">
    <link rel="stylesheet" href="../css/editor/datetimepicker.css">
    <link rel="stylesheet" href="../css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="../css/editor/x-editor-style.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../css/data-table/bootstrap-editable.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>

    <!-- RP details -->
    <?php 
        $id = $row["t_id"];
        //  1st query for employee data
        $rp_d_query = mysqli_query($connection, "SELECT * FROM users_rp_details WHERE t_id = '$id'");
        $rp_count = mysqli_num_rows($rp_d_query);

        if($rp_count == 1){
            $rowrp = mysqli_fetch_assoc($rp_d_query);
            // 2nd query for user data
            $usersquery = mysqli_query($connection,"SELECT * FROM users where t_id = '$id'");
            $rowusers = mysqli_fetch_assoc($usersquery);
        }else{
            $rp_count == 0;
        }
    ?>



<div>
    <img src="../img/ipcrf_cover.png" class="img"> 
</div>



<div class="container">
    <table class="table table-responsive table-data" style="width: 100%" cellpadding="5">
            <colgroup>
                <col style="width: 30px">
                <col style="width: 100px">
                <col style="width: 150px">
                <col style="width: 50px">
                <col style="width: 40px">
                <col style="width: 30px">
                <col style="width: 150px">
                <col style="width: 150px">
                <col style="width: 150px">
                <col style="width: 50px">
                <col style="width: 50px">
                <col style="width: 50px">
                <col style="width: 50px">
                <col style="width: 60px">
                <col style="width: 60px">
            </colgroup>     

                    <tr>
                        <td colspan="2" class="left-column">
                            CONTROL-ID:
                        </td>
                        <td colspan="6"> 
                           <?php echo $rowusers["control_id"]; ?>
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
                            <?php echo $rowusers["t_lastname"]. ", " . $rowusers["t_firstname"]; ?>  
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
                            <?php echo $rowrp["u_rp_position"];?>
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
                           <?php echo $rowrp["u_rp_office"];?>
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
                        <td colspan="6">
                            <?php 
                                if($rp_count != 0){ 
                                    if($rowrp["u_rp_relation"] == "Non Teaching")
                                    {   
                                        $tricks = $rowrp["u_rp_dateper"];
                                        $tricks = intval($tricks);
                                        if($tricks == 0){
                                            echo "CY" . " undefined";
                                        }else{
                                            echo "CY" . " " . $tricks;
                                        }
                                    }
                                    else{
                                        echo $rowrp["u_rp_dateper"];

                                    } 
                                }
                            ?>
                        </td>
                        <!-- Right -->
                            <td colspan="1" class="left-column">
                                <!-- blank -->
                            </td>
                             <td colspan="6">
                               <!-- BLANK -->
                            </td>
                    </tr>  

           
            <tr>
                <th colspan="9" style="background-color:#FFDAB9; letter-spacing: 2px;"><i>TO BE FILLED IN DURING PLANNING</i></th>
                <th colspan="6" style="background-color:#FFE4B5; letter-spacing: 2px;"><i>TO BE FILLED IN DURING EVALUATION</i></th>
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

            <tr>
            <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td> 
                <td class="txt-align-center">#</td>
                <td class="txt-align-center">QUALITY</td>
                <td class="txt-align-center">EFFICIENCY</td>
                <td class="txt-align-center">TIMELINESS</td>
                <td></td>
                <td class="txt-align-center">Q</td>
                <td class="txt-align-center">E</td>
                <td class="txt-align-center">T</td>
                <td class="txt-align-center">Ave</td>
                <td></td>
            </tr>

            <?php 
            // count for tr border
            $count = 0;
            $rowx = "";        
            $overalltotalscore = 0; 
            $query2 = mysqli_query($connection,"SELECT * FROM ipcrf_view WHERE t_id = '$id' ORDER BY kra_no ASC");
            while($row = mysqli_fetch_assoc($query2)):?>
                <tr             
                <?php 
                    if($rowx == $row["kra_no"]){
                        $rowx = $row["kra_no"]; 
                         
                    }else{
                        if($count == 0){
                            $rowx = $row["kra_no"];
                            $count++;
                            
                        }else{ 
                            echo "style='border-top: 8px solid darkgray';"; 
                            $rowx = $row["kra_no"];
                        }
                    }
                ?>>  
                <td></td>
                <td><?php if($row["pi_no"] == 5 ){echo $row["kra_gen_objective"];} ?></td>
                <td><?php if($row["pi_no"] == 5 ){echo $row["kra_no"] . "." . $row["kra_items"] . ")" . "&emsp;" . $row["kra_objective"];}else{}?></td>
                <td class="txt-align-center"><?php if($row["pi_no"] == 5 ){echo "Monthly"; }  ?></td>
                <td class="txt-align-center"><?php if($row["pi_no"] == 5 ){echo $row["kra_item_percentage"] . "%";} ?></td>
                <td class="txt-align-center"><?php echo $row["pi_no"]; ?></td>
                <td><?php echo $row["pi_quality"]; ?></td>
                <td><?php echo $row["pi_efficiency"]; ?></td>
                <td><?php echo $row["pi_timeliness"]; ?></td>
                <td class="txt-align-center"><?php if($row["pi_no"] == 5 ){if($row["tot_completion"] != "" ){ echo $row["tot_completion"] . "%"; }}  ?></td>
                <td class="txt-align-center"><?php if($row["pi_no"] == 5 ){echo $row["tot_rmks_quality"]; }  ?></td>
                <td class="txt-align-center"><?php if($row["pi_no"] == 5 ){echo $row["tot_rmks_efficiency"]; }  ?></td>
                <td class="txt-align-center"><?php if($row["pi_no"] == 5 ){echo $row["tot_rmks_timeliness"]; }  ?></td>
                <td class="txt-align-center"><?php if($row["pi_no"] == 5 ){echo $row["tot_average"]; }  ?></td>
                <td class="txt-align-center"><?php if($row["pi_no"] == 5 ){echo $row["tot_score"]; $overalltotalscore = $overalltotalscore + $row["tot_score"];  }?>
                    
                </td>
            </tr>
        <?php endwhile; ?>

            <tr>
                <td colspan="9" rowspan="2"></td>    
                <td colspan="2" rowspan="2" class="txt-align-center">OVERALL RATING FOR ACCOMPLISHMENT</td>  
                <td colspan="3" class="txt-align-center">NUMERICAL RATING</td>  
                <td class="txt-align-center"><?php echo $overalltotalscore; ?></td> 
            </tr>
            <tr>     
                <td colspan="3" class="txt-align-center">ADJECTIVAL RATING</td>  
                <td class="txt-align-center" style="text-transform: uppercase;">
                    <?php 
                        if($overalltotalscore < 1.5){
                                echo "Poor";
                        }else if($overalltotalscore < 2.5){
                                echo "Unsatisfactory";
                        }else if($overalltotalscore < 3.5){
                                echo "Satisfactory";
                        }else if($overalltotalscore <4.5){
                                echo "Very Satisfactory";
                        }else{
                            echo "Outstanding";
                        }
                    ?>
                </td>
            </tr>

        </table>
    <!-- end of div -->
</div>

        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div align="center" style="background-color: black; padding: 5px 5px;">
                        <a href="../dompdf/pdf.php" style="letter-spacing: 2px; color: white; ">CONVERT TO PDF FILE</a>
                    </div>
                </div>
            </div>
        </div>


</body>
</html>



    <!-- jquery
        ============================================ -->
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="../js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="../js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="../js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="../js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="../js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="../js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="../js/metisMenu/metisMenu.min.js"></script>
    <script src="../js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
        ============================================ -->
    <script src="../js/data-table/bootstrap-table.js"></script>
    <script src="../js/data-table/tableExport.js"></script>
    <script src="../js/data-table/data-table-active.js"></script>
    <script src="../js/data-table/bootstrap-table-editable.js"></script>
    <script src="../js/data-table/bootstrap-editable.js"></script>
    <script src="../js/data-table/bootstrap-table-resizable.js"></script>
    <script src="../js/data-table/colResizable-1.5.source.js"></script>
    <script src="../js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
        ============================================ -->
    <script src="../js/editable/jquery.mockjax.js"></script>
    <script src="../js/editable/mock-active.js"></script>
    <script src="../js/editable/select2.js"></script>
    <script src="../js/editable/moment.min.js"></script>
    <script src="../js/editable/bootstrap-datetimepicker.js"></script>
    <script src="../js/editable/bootstrap-editable.js"></script>
    <script src="../js/editable/xediable-active.js"></script>
    <!-- Chart JS
        ============================================ -->
    <script src="../js/chart/jquery.peity.min.js"></script>
    <script src="../js/peity/peity-active.js"></script>
    <!-- tab JS
        ============================================ -->
    <script src="../js/tab.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="../js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="../js/main.js"></script>
    <!-- tawk chat JS