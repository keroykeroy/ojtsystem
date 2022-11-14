<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Profile</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
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
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>

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
    hr.style-four {
        height: 12px;
        border: 0;
        box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
    }


    .form-control{
        border-radius: 5px;
        border-color: lightgray;
    }


    .content{
        width: 60%;
        position: relative;
        left: 57%;
        margin-left: -37.5%;
    }

    input[type=text]:focus{
      background-color: #C1E1FF;
      outline: none;
    }


</style>

<body>

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
                                    <h1 style="font-family: courier new; font-size: 40px; ">MY PROFILE</h1>
                                    <hr class="style-four">
                        </center>
                        <br>
                        <!-- PROFILE AVATAR -->
                        <div class="">
                            <!-- <img src="../img/notification/5.jpg" width="100"/> -->
                        </div>

                            <div align="center" class="content">
                                <div class="alert alert-success alert-dismissible" id="success" style="display:none;"></div>
                                <form method="POST" id="user-form">
                                    <div class="row">
                                        <div class='col-sm-4'>               
                                            <div class="form-group">
                                                <label for="fname">First name</label>
                                                <input name="u_fname" id="u_fname" type="text" class="form-control" value="<?php echo $row["t_firstname"]; ?>">
                                            </div>
                                        </div>

                                        <div class='col-sm-4'>      
                                            <div class="form-group">
                                                <label for="mname">Middle name</label>
                                                <input name="u_mname" id="u_mname" type="text" class="form-control" value="<?php echo $row["t_midname"]; ?>">
                                            </div>
                                        </div>

                                        <div class='col-sm-4'>   
                                            <div class="form-group">
                                                <label>Last name</label>
                                                <input name="u_lname" id="u_lname" type="text" class="form-control" value="<?php echo $row["t_lastname"]; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class='col-sm-6'>   
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input name="u_dob" id="u_dob" type="date" class="form-control" value="<?php echo date('Y-m-d',strtotime($row["t_dob"])) ?>"/>
                                            </div>
                                        </div>

                                        <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label>Sex</label>
                                                <select class="form-control" id="u_sex" name="u_sex" required>
                                                    <option value="Male" <?php if($row["t_sex"] == "Male"){ echo "selected";} ?>    >Male</option>
                                                    <option value="Female" <?php if($row["t_sex"] == "Female"){ echo "selected";} ?>   >Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input name="u_contactno" id="u_contactno" type="text" class="form-control" value="<?php echo $row["t_phonenumber"]; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input name="u_email" id="u_email" ype="text" class="form-control" value="<?php echo $row["t_email"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">   
                                            <input type="button" class="btn btn-primary mg-b-15" value="Update" id="submit-form" name="save" style="width: 20%;">                 
                                        </div>
                                    </div>

                                </form>
                            </div>           
   
       
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

<!-- INSERT AJAX -->
<script>
$(document).ready(function() {
    $('#submit-form').on('click', function() {
        var u_idd = "<?php echo $row["t_id"]; ?>";
        var u_fname = $('#u_fname').val();
        var u_mname = $('#u_mname').val();
        var u_lname = $('#u_lname').val();
        var u_dob = $('#u_dob').val();
        var u_sex = $('#u_sex').val();
        var u_contactno = $('#u_contactno').val();
        var u_email = $('#u_email').val();

        if(u_fname!="" && u_mname!="" && u_lname!="" && u_dob!="" && u_sex!="" && u_contactno!="" && u_email != ""){
            $.ajax({
                url: "user_update.php",
                type: "POST",
                data: {
                u_fname: u_fname,
                u_mname: u_mname,
                u_lname: u_lname,
                u_dob: u_dob,
                u_sex: u_sex,
                u_contactno: u_contactno,
                u_email: u_email          
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $("#success").show();
                        $('#success').html('Data Updated Successfully!');   
                        $("#success").fadeTo(2000, 500).slideUp(500, function(){
                        $("#success").slideUp(500);
                        });                    
                    }
                    else if(dataResult.statusCode==201){
                       alert("Error occured !");
                    }
                    
                }
            });
        }
        else{
            alert('Field is required!');
        }
    });
});
</script>

