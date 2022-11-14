<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adding of KRA</title>
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

    /* title top */
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

    .form-control{
        border-radius: 5px;
        border-color: lightgray;
    }

    input[type=number]:focus,input[type=search]:focus{
      background-color: #C1E1FF;    
      outline: none;
    }

    .content{
        width: 60%;
        position: relative;
        left: 57%;
        margin-left: -37.5%;
    }

    .view{
        border-radius: 5px;
    }

    /*link view*/
    .linkview{
        font-family: calibri;       
        border: 1px double darkgray;
        border-radius: 5px;
        padding: 5px 10px;
        background-color:lemonchiffon;
    }

    .linkview:hover{
        background: palegoldenrod;
    }
    .gradient{
        background-color: #f9ea8f;
        background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);
    }

    .opac{
        opacity: 0.3;
        pointer-events: none;
    }

</style>

<body>

    <?php
        // GLOBAL VARIABLE
        $message = ""; // success variable
        $error = ""; //error variable
        $kra_no = ""; //kra_no
        $new_kra = ""; // new kra no
        $new_item = ""; // kra_item
        $insert_item_kra = "";


        if(isset($_POST["kra_save"])){
            $kra_no = mysqli_escape_string($connection, $_POST["kra_no"]);
            $kra_item_no = mysqli_escape_string($connection, $_POST["kra_item_no"]);
            $kra_obj = mysqli_escape_string($connection, $_POST["kra_obj"]);
            $kra_gen_obj = mysqli_escape_string($connection, $_POST["kra_gen_obj"]);
            $kra_qual = mysqli_escape_string($connection, $_POST["kra_qual"]);            
            $kra_eff = mysqli_escape_string($connection, $_POST["kra_eff"]);
            $kra_time = mysqli_escape_string($connection, $_POST["kra_time"]);
            $kra_item_perc = mysqli_escape_string($connection, $_POST["kra_item_perc"]);
            // convert to string
            $kra_item_perc = intval($kra_item_perc); 

            // select to get variable -> FK
            $query_rp = mysqli_query($connection,"SELECT * FROM users_rp_details WHERE t_id ='$u_id'");
            $row = mysqli_fetch_assoc($query_rp);
            $rp_id = $row["u_rp_id"];

            if($query_rp){
                $query_insert = mysqli_query($connection,"INSERT INTO users_kra(u_rp_id, t_id, kra_no, kra_items, kra_gen_objective, kra_objective, kra_quality, kra_efficiency, kra_timeliness, kra_item_percentage) VALUES('$rp_id', '$u_id', '$kra_no', '$kra_item_no','$kra_gen_obj', '$kra_obj', '$kra_qual', '$kra_eff', '$kra_time', '$kra_item_perc')");

                $sum = 0;
                $query_count = mysqli_query($connection,"SELECT kra_item_percentage FROM users_kra where kra_no = '$kra_no' AND t_id ='$u_id' ORDER BY kra_no DESC");
                while($rowx = mysqli_fetch_assoc($query_count)){
                    $kra_totitemper = $rowx["kra_item_percentage"];
                    $sum = $sum + $kra_totitemper;
                }
                 $sum;
                $update_target = mysqli_query($connection,"UPDATE `users_kra` SET `kra_target_percentage`='$sum' WHERE t_id = '$u_id' AND kra_no = '$kra_no'");

                if($update_target){
                    $query_searchkraid = mysqli_query($connection, "SELECT * FROM users_kra where kra_no = '$kra_no' AND kra_items = '$kra_item_no' AND t_id ='$u_id'");
                    $row = mysqli_fetch_assoc($query_searchkraid);
                    $kra_id = $row["kra_id"];

                    if($query_searchkraid){
                        for($x = 5; $x>0; $x--){    
                        $query_piinsert = mysqli_query($connection,"INSERT INTO `kra_pi`(`u_rp_id`, `t_id`, `kra_id`, `pi_no`, `kra_no`, `kra_items`) VALUES ('$rp_id', '$u_id' , '$kra_id', '$x', '$kra_no', '$kra_item_no')");
                        }
                        $message = "Successfully Added!"; 
                    }
                }
            }
        }else if(isset($_POST["new_kra"])){

            $query = mysqli_query($connection,"SELECT kra_no,t_id FROM users_kra WHERE t_id = '$u_id' ORDER BY kra_no DESC LIMIT 1");
            if(mysqli_num_rows($query) == 0 ){
                // if wala shay makit.an so new
                $new_kra = 1;
                $new_item = 1;
            }else{
                $row = mysqli_fetch_assoc($query);
                $new_kra = $row["kra_no"] + 1;
                $new_item = 1; 
            }

        }else if(isset($_POST["new_kra_item"])){

            if(empty($_POST["kra_no"])){
                 $error = "You need to select KRA first!"; 
            }else{
                $insert_item_kra = $_POST["kra_no"];
                $query = mysqli_query($connection,"SELECT kra_no,kra_items,t_id FROM users_kra WHERE kra_no = '$insert_item_kra' AND t_id = '$u_id' ORDER BY kra_items DESC LIMIT 1");
                if(mysqli_num_rows($query) == 1 ){
                    $row = mysqli_fetch_assoc($query);
                    $new_kra = $row["kra_no"];
                    $new_item = $row["kra_items"] + 1; 
                }
            }

        }
        

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
        <h1 style="font-family: courier new; font-size: 40px; ">ADD KRA</h1>
        <hr class="style-four">
    </center>


    <!-- ADD -->

    <div class="content breadcome-list">
        <div class=" <?php if(!empty($new_item) OR !empty($insert_item_kra)){ echo "opac"; }?>">
            <div class="row" >
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class='col-sm-2'>
                        <label>ADD NEW KRA</label> 
                    </div>  
                    <div class='col-sm-10'>
                        <div class="form-group">
                            <input class="btn btn-dark" type="submit" name="new_kra" value="ADD KRA #"/>
                        </div>    
                    </div>   
                 </form>
            </div>

        <!-- get kra data -->
        <?php 
            $item_array[0] = "0";

            $count = 1;
            $query = mysqli_query($connection,"SELECT DISTINCT kra_no FROM users_kra WHERE t_id ='$u_id' ORDER BY kra_no ASC");
            if($query){
                while($data = mysqli_fetch_assoc($query)){
                    $kra_no = $data["kra_no"];
                    $item_array[$count] = $kra_no;
                    $count++;
                }
            }
        ?>

            <div class="row" >
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class='col-sm-2'>               
                        <div class="form-group">
                            <label>ADD NEW KRA TO</label>
                        </div>
                    </div>
                    <div class='col-sm-5'>               
                        <div class="form-group">
                            <select class="form-control" name="kra_no" id="kra_no">                  
                                <?php foreach($item_array as $key => $value): ?>
                                       <?php 
                                            if($item_array[$key] == 0){ 
                                                echo "<option disabled selected>SELECT KEY RESULT AREA</option>"; 
                                            }
                                            else{
                                                echo "<option value=".$item_array[$key].">KEY RESULT AREA NO. ".$item_array[$key]."</option>";
                                                }
                                            ?>
                                <?php endforeach ?>       
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <input class="btn btn-secondary" type="submit" name="new_kra_item" value="ADD KRA ITEM"/>
                    </div>

                </form>
            </div>
        </div>

            <div align="center" style="color:green;" id="success-alert1"><strong><?php if($message != ""){ echo $message; } ?></strong></div>
            <div align="center" style="color:red;" id="success-alert2"><strong><?php if($error != ""){ echo $error; } ?></strong></div>
            <hr> 
                <div class=" <?php if(empty($new_item) AND empty($insert_item_kra)){ echo "opac"; }?>">   
                    <div class="row" align="right">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <a href="kra_details.php" target="_blank" class="linkview">UPDATE KRA DATA</a>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <a href="kra_pi.php" target="_blank" class="linkview">UPDATE KRA PERFORMANCE INDICATOR</a>
                            </div>
                        </div>
                    </div>  

                    <!-- algo targetperc-->
                    <?php 
                        $kra_item_no = "";
                        $sum = 0;
                        $output_gen_obj = "";
                            $query_count = mysqli_query($connection,"SELECT kra_item_percentage,kra_gen_objective FROM users_kra where kra_no = '$insert_item_kra' AND t_id ='$u_id' ORDER BY kra_no DESC");
                            while($rowx = mysqli_fetch_assoc($query_count)){
                            $output_gen_obj = $rowx["kra_gen_objective"];
                            $kra_totitemper = $rowx["kra_item_percentage"];
                            $sum = $sum + $kra_totitemper;
                            }
                    ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>KRA Total Item Percentage: <?php echo $sum; ?> </label>
                            </div>
                        </div>
                    </div>

                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>KRA No : </label>
                                <input type="text" value="<?php echo $new_kra; ?>" style="border: none; outline: none;" name="kra_no" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>KRA Item No : </label>
                                <input type="text" value="<?php echo $new_item; ?>" style="border: none; outline: none;" name="kra_item_no" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>KRA General Objectives</label>
                                <textarea class="form-control gradient" style="resize: none; height: 70px; text-align: justify;" name="kra_gen_obj" <?php if($output_gen_obj != ""){echo "readonly"; }?> ><?php if($output_gen_obj != ""){echo $output_gen_obj; }?></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>KRA Objectives</label>
                                <textarea class="form-control" style="resize: none; height: 100px;" name="kra_obj"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Quality</label>
                                <select class="form-control" name="kra_qual">
                                    <option value="1">Required</option>
                                    <option value="0">Not Required</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Efficiency</label>
                                <select class="form-control" name="kra_eff">
                                    <option value="1">Required</option>
                                    <option value="0">Not Required</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Timeliness</label>
                                <select class="form-control" name="kra_time">
                                    <option value="1">Required</option>
                                    <option value="0">Not Required</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Item Percentage</label>
                                <input type="text" name="kra_item_perc" class="form-control txtinput">
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="row" align="center">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="hidden" name="kra_save">
                                <input type="submit" name="kra_save" class="btn btn-primary" value="Save" style="min-width: 100px; margin-right: 15px;">
                                <a href="kra_tables.php" class="btn btn-danger" style="min-width: 100px; margin-left: 15px;">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>

        </div>   

        <!-- Single pro tab review Start-->
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

<!-- Script for percent -->
<script>
    (function($) {
        var minNumber = 0;
        var maxNumber = 100;

        $('.txtinput').on("change", function() {
            var inputVal = parseFloat($(this).val().replace('%', '')) || 0

            if (minNumber > inputVal) {
              inputVal = 0;
            } else if (maxNumber < inputVal) {
              inputVal = 100;
            }

            $(this).val(inputVal + '%');
        });
    })(jQuery);
</script>

<!-- REFRESHING THE PAGE ALSO REFRESH DATA -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<!-- for success message -->
 <script>
        $("#success-alert1").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert1").slideUp(500);
});
 </script>

<!-- for error message -->
  <script>
        $("#success-alert2").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert2").slideUp(500);
});
 </script>


<!--multiple select -->
<script type="text/javascript">
var sel1 = document.querySelector('#select1');
var sel2 = document.querySelector('#select2');
var options2 = sel2.querySelectorAll('option');

function giveSelection(selValue) {
  sel2.innerHTML = '';
  // console.log(options2.length);

  for(var i = options2.length-1; i>= 0; i--) {
    if(options2[i].dataset.option === selValue) {
      sel2.appendChild(options2[i]);
    }

  }

}
giveSelection(sel1.value);
</script>