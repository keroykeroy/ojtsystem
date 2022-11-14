<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

  .table{
    width: 1400px;
    height: 900px;
    table-layout: fixed;
    overflow-wrap: break-word;
  }

  /*TABLE DETAILS */
  .left-column
  {   
      text-align:right;  
      font-size:12px;
  }

  table,td,tr,th{ 
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse; 
      border: 1px solid darkgray;
      font-size: 13px;
  }

  .table_layout{
    margin-top: 20px;
    margin-bottom: 25px;  
  }

  .header{
    font-size: 25px;
    background-color: lightgray;  
  }

  
  .txt-align{
    text-align: center;
  }





</style>

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
        $rp_d_query = mysqli_query($connection, "SELECT * FROM users_rp_details WHERE t_id = '$id'");
        $rp_count = mysqli_num_rows($rp_d_query);

        if($rp_count == 1){
            $rowrp = mysqli_fetch_assoc($rp_d_query);
            $usersquery = mysqli_query($connection,"SELECT * FROM users where t_id = '$id'");
            $rowusers = mysqli_fetch_assoc($usersquery);
        }else{
            $rp_count == 0;
        }
    ?>



    <div align="center" class="table_layout">
      <table style="undefined;table-layout: fixed;" class="table" cellpadding="5">
        <colgroup>
          <col style="width: 40px">
          <col style="width: 120px">
          <col style="width: 150px">
          <col style="width: 70px">
          <col style="width: 60px">
          <col style="width: 70px">
          <col style="width: 100px">
          <col style="width: 100px">
          <col style="width: 100px">
          <col style="width: 100px">
          <col style="width: 100px">
          <col style="width: 90px">
          <col style="width: 40px">
          <col style="width: 40px">
          <col style="width: 40px">
          <col style="width: 50px">
          <col style="width: 60px">
        </colgroup>
        <tr>
          <th colspan="17" rowspan="2" class="header" style="letter-spacing: 1px;">﻿INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW FORM (IPCRF) - Teacher I-III (Proficient Teachers)</th>
        </tr>
        <tr>
        </tr>
   
        <tr>
          <td colspan="3" class="left-column">Name of Employee:</td>
          <td colspan="6"> <?php echo $rowusers["t_lastname"]. ", " . $rowusers["t_firstname"]; ?>  </td>
          <td colspan="1" class="left-column">Name of Rater:</td>
          <td colspan="7"></td>
        </tr>
        <tr>
          <td colspan="3" class="left-column">Position:</td>
          <td colspan="6"> <?php echo $rowrp["u_rp_position"];?></td>
          <td colspan="1" class="left-column">Position:</td>
          <td colspan="7"></td>
        </tr>
        <tr>
          <td colspan="3" class="left-column">Bureau/Center/Service/Division:</td>
          <td colspan="6"> <?php echo $rowrp["u_rp_office"];?> </td>
          <td colspan="1" class="left-column">Date of Review:</td>
          <td colspan="7"></td>
        </tr>
        <tr>
          <td colspan="3" class="left-column">Rating Period:</td>
          <td colspan="6">  <?php echo $rowrp["urp_date_start"] . "-" . $rowrp["urp_date_end"]; ?>  </td>
          <td colspan="1" class="left-column"></td>
          <td colspan="7"></td>
        </tr>

        <tr>
          <td colspan="11" class="txt-align" style="background-color:#FFDAB9; letter-spacing: 2px;" ><i>TO BE FILLED IN DURING PLANNING</i></td>
          <td colspan="6" class="txt-align" style="background-color:#FFE4B5; letter-spacing: 2px;" ><i>TO BE FILLED DURING EVALUATION</i></td>
        </tr>
        <tr>
          <th rowspan="2" class="txt-align">MFOs</th>
          <th rowspan="2" class="txt-align">KRAs</th>
          <th rowspan="2" class="txt-align">Objectives</th>
          <th rowspan="2" class="txt-align">Timeline</th>
          <th rowspan="2" class="txt-align">Weight per KRA</th>
          <th colspan="6" class="txt-align">Performance Indicators</th>
          <th rowspan="2" class="txt-align">Actual Results</th>
          <th colspan="4" class="txt-align">Rating</th>
          <th>Score</th>
        </tr>
        <tr>
          <th class="txt-align">Q,E,T</th>
          <th class="txt-align">Outstanding (5)</th>
          <th class="txt-align">Very Satisfactory (4)</th>
          <th class="txt-align">Satisfactory (3)</th>
          <th class="txt-align">Unsatisfactory (2)</th>
          <th class="txt-align">Poor (1)</th>
          <th class="txt-align">Q</th>
          <th class="txt-align">E</th>
          <th class="txt-align">T</th>
          <th class="txt-align">Ave</th>
          <th></td>
        </tr>

               
        <?php 
        $count = 0;
        $rowx = "";
        $gen_obj = "";

        $kra_query = mysqli_query($connection,"SELECT * FROM users_kra where t_id = '$id' ");
        while($row = mysqli_fetch_array($kra_query)):?>

          <tr
            <?php 

                if($rowx == $row["kra_no"]){
                    $rowx = $row["kra_no"]; 
                    $gen_obj = "";
                     
                }else{
                    if($count == 0){
                        $rowx = $row["kra_no"];
                        $gen_obj = $row["kra_gen_objective"];
                        $count++;
                        
                    }else{ 
                        echo "style='border-top: 8px solid darkgray';"; 
                        $gen_obj = $row["kra_gen_objective"];
                        $rowx = $row["kra_no"];
                    }
                }
          ?>>
          <td rowspan="15" class="txt-align"></td>
          <td rowspan="15" class=""><?php echo $gen_obj; ?></td>
          <td rowspan="15" class=""><?php  echo $row["kra_no"] . "." . $row["kra_items"] . ")" . "&emsp;" . $row["kra_objective"]; ?></td>
          <td rowspan="15" class="txt-align">June 2016 - March 2017</td>
          <td rowspan="15" class="txt-align"><?php if($row["kra_item_percentage"] != ""){ echo $row["kra_item_percentage"] . "%"; } ?></td>
          <td rowspan="5" class="txt-align">Quality</td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
          <td rowspan="15" class="txt-align"><?php if($row["tot_completion"] != ""){ echo $row["tot_completion"] . "%"; } ?></td>
          <td rowspan="15" class="txt-align"><?php echo $row["tot_rmks_quality"]?></td>
          <td rowspan="15" class="txt-align"><?php echo $row["tot_rmks_efficiency"]?></td>
          <td rowspan="15" class="txt-align"><?php echo $row["tot_rmks_timeliness"]?></td>
          <td rowspan="15" class="txt-align"><?php echo $row["tot_average"]?></td>
          <td rowspan="15" class="txt-align"><?php echo $row["tot_score"]?></td>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
          <td rowspan="5" class="txt-align">Efficiency</td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
          <td rowspan="5" class="txt-align">Timeliness</td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
          <td rowspan="5"></td>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <?php endwhile;?> 
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>OVERALL RATING FOR ACCOMPLISHM- ENTS</td>
          <td colspan="4"></td>
          <td></td>
        </tr>

      </table>
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