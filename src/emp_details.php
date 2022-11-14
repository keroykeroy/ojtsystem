<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
    ob_start();
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Employee Details</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon/deped_icon.png"/>

    <!-- Google Fonts
        ============================================ -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet"> -->
    
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- calendar CSS
    ============================================ -->
    <link rel="stylesheet" href="../css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../css/calendar/fullcalendar.print.min.css">

</head>

    <style type="text/css">
        .title{
            font-size: 20.5px;
            color: white;
            font-family: Engravers MT;  
            text-shadow: 2px 2px 2px black;
            margin-top:18px;
            margin-left: -50px; 
        }

        /*HR TOP*/
        hr.style-four {
            height: 12px;
            border: 0;
            box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
        }
          
        /* Add padding to containers */
        .canvas-detail{ 
            width: 75%;
            position: relative;
            left: 50%;
            margin-left: -37.5%;
            border-radius: 5px;
            box-shadow: 0 0 5px black;   
        }
    </style>

<body>

    <?php 
        $id = $row["t_id"];
        $rp_d_query = mysqli_query($connection, "SELECT * FROM users_rp_details WHERE t_id = '$id'");
        $rp_count = mysqli_num_rows($rp_d_query);
        $rp_row = mysqli_fetch_assoc($rp_d_query);
    ?>


 <!-- Start Left menu area -->
 <?php require("menu/menu_main.php");?>

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="educate-icon educate-nav"></i>
                                                </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-0 col-md-0 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <h1 class="title">PERFORMANCE MONITORING SYSTEM</h1>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                
                                                
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <img src="../img/icon/admin_icon.png" alt="" />
                                                            <!-- <span class="admin-name" style="font-size: 15px; letter-spacing: 0.5px;"></span> -->
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="../conn/destroyer.php"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Mobile Menu start -->
        <?php require("menu/menu_mb.php"); ?>      
        </div>
                          
                <br>
                    <center>
                        <h1 style="font-family: courier new; font-size: 40px; ">PERFORMANCE RATING DETAILS</h1>
                        <hr class="style-four">
                        <br>
                    </center>
          
                                    <div class="canvas-detail" align="center">
                                        <br>
                                            <h4>EMPLOYEE DATA</h4>
                                            <a href="emp_data.php" class="update_ahref">Update Data</a>
                                            <div class="profile-details-hr">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-6">
                                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                            <p><b>Job Group</b><br/> <?php if($rp_count != 0){ if($rp_row["u_rp_relation"] == ""){echo "---";}else{echo $rp_row["u_rp_relation"];} }else{echo "---";} ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-6">
                                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                            <p><b>Current position</b><br/> <?php if($rp_count != 0){ if($rp_row["u_rp_position"] == ""){echo "---";}else{echo $rp_row["u_rp_position"];} }else{echo "---";} ?></p>
                                                        </div>
                                                    </div>
                                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-6">
                                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                            <p><b>Date Hired</b><br/>  <?php if($rp_count != 0){ if($rp_row["u_rp_datehired"] == ""){echo "---";}else{echo $rp_row["u_rp_datehired"];} }else{echo "---";} ?> </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                            <p><b>Office/School/Section</b><br/> <?php if($rp_count != 0){ if($rp_row["u_rp_office"] == ""){echo "---";}else{echo $rp_row["u_rp_office"];} }else{echo "---";} ?></p>
                                                        </div>
                                                    </div>
                               
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                            <p><b>Designation</b><br/>  <?php if($rp_count != 0){ if($rp_row["u_rp_designation"] == ""){echo "---";}else{echo $rp_row["u_rp_designation"];} }else{echo "---";} ?> </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                            <p><b>Designation Date</b><br/>  <?php if($rp_count != 0){ if($rp_row["u_rp_designation_date"] == ""){echo "---";}else{echo $rp_row["u_rp_designation_date"];} }else{echo "---";} ?> </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="address-hr">
                                                            <p><b>Rating Period</b><br/>
                                                                <?php 
                                                                if($rp_count != 0){ 
                                                                    if($rp_row["u_rp_relation"] == "Non Teaching")
                                                                    {   
                                                                        $tricks = $rp_row["u_rp_dateper"];
                                                                        $tricks = intval($tricks);
                                                                        if($tricks == 0){
                                                                            echo "CY" . " undefined";
                                                                        }else{
                                                                            echo "CY" . " " . $tricks;
                                                                        }
                                                                    }
                                                                    else{
                                                                        echo $rp_row["u_rp_dateper"];

                                                                    } 
                                                                }else{
                                                                    echo "---";
                                                                } 
                                                                ?></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>

                                        <div class="form-group">
                                            <?php 
                                                $rel =  $rp_row["u_rp_relation"];
                                                if($rel == "Teacher"){
                                                    echo "<a href='ipcrf_teach.php' class='btn btn-info' target='_blank'>VIEW IPCRF</a>";
                                                }else if($rel == "Teacher Related"){
                                                    echo "<a href='ipcrf_teach.php' class='btn btn-info' target='_blank'>VIEW IPCRF</a>";
                                                }else if($rel == "Non Teaching"){
                                                    echo "<a href='ipcrf_non.php' class='btn btn-info' target='_blank'>VIEW IPCRF</a>";
                                                }else{
                                                    echo "<a href='#' class='btn btn-info'>VIEW IPCRF</a>";
                                                }
                                            ?>
                                        </div>
                                        <br>  
                                    </div>
    
          
        <!-- FOOTER -->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>DepEd Performance Management System © 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <!-- counterup JS
        ============================================ -->
    <script src="../js/counterup/jquery.counterup.min.js"></script>
    <script src="../js/counterup/waypoints.min.js"></script>
    <script src="../js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="../js/metisMenu/metisMenu.min.js"></script>
    <script src="../js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="../js/morrisjs/raphael-min.js"></script>
    <script src="../js/morrisjs/morris.js"></script>
    <script src="../js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="../js/sparkline/jquery.sparkline.min.js"></script>
    <script src="../js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="../js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="../js/calendar/moment.min.js"></script>
    <script src="../js/calendar/fullcalendar.min.js"></script>
    <script src="../js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="../js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="../js/main.js"></script>
 
</body>
</html>

<!-- date picker -->
<script type="text/javascript">
    $("#datepicker1").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
    $("#datepicker2").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});

</script> -->