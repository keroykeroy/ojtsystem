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
    <title>KRA Performance Indicator</title>
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


    .content-top{
        margin-left: 5%;
        margin-right: 5%;
    }

   
    /*TABLE CSS*/
    .table{
        border: 2px solid darkgray;
    }
    thead{
        border-bottom:5px solid darkgray;
    }

    table, th, td {
        border: 2px solid darkgray;
    }

    /*panel shadow*/
    .panel{
        box-shadow: 0px 0px 4px 1px black;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
    }


    /*form modal */
    .form-control{
        padding:0 5px; 
        border-radius: 5px;
        border-color: lightgray;
        text-align: justify;
    }

    /*SELECT KRA*/
    .krano-select{
        border-radius: 3px;
        padding: 5px 0px;
    }



    /*SCROLLING TABLE*/
    .table-wrapper-scroll-y {
        display: block;
        max-height: 500px;
        overflow-y: auto;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }

    .opac{
        visibility: hidden;
    }


</style>

<body>

    <?php
        $checkrow = "";
        $kra_id = "";
        if(isset($_POST["kra_id"])){
            $kra_id = mysqli_escape_string($connection,$_POST["kra_id"]);

            $querykra = mysqli_query($connection,"SELECT * FROM users_kra where kra_id = '$kra_id'");
            $checkrow = mysqli_num_rows($querykra);
            $krarow = mysqli_fetch_assoc($querykra);
        }
    ?>


    <!-- ALGO FOR KRA QUALITY,EFF,TIME = 1,0 -->

        <?php 
            $readonly1 = "";
            $readonly2 = "";
            $readonly3 = "";
            $check1 = "";
            $check2 = "";
            $check3 = "";

            if($checkrow == 1){ 
                if($krarow["kra_quality"] == 0 ){
                    $readonly1 = "readonly";
                    $check1 = "* Not required";
                }
                if($krarow["kra_efficiency"] == 0 ){
                    $readonly2 = "readonly";
                    $check2 = "* Not required";
                }
                if($krarow["kra_timeliness"] == 0 ){
                    $readonly3 = "readonly";
                    $check3 = "* Not required";
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
        <h1 style="font-family: courier new; font-size: 40px; ">KRA PERFORMANCE INDICATOR</h1>
        <hr class="style-four">
    </center>

    <div class="content-top">
        <div class="row" >
            <section class="panel" style="background-color: green;">
                <header class="panel-heading">
                      
                </header>   
                        <div class="panel-body">
                       
                                <!-- ALGO KRA ITEMS-->
                                <?php 
                                    $id = $row["t_id"];
                                    $item_array[0] = "0";
                                    $id_array[0] = "0"; 
                                    $count = 1;
                                    $query = mysqli_query($connection,"SELECT * FROM users_kra WHERE t_id ='$id' ORDER BY kra_no ASC");
                                    if($query){
                                        while($data = mysqli_fetch_assoc($query)){
                                            $kra_item = $data["kra_no"] .".". $data["kra_items"];
                                            $item_array[$count] = $kra_item;
                                            $id_array[$count] = $data["kra_id"];
                                            $count++;
                                        }
                                        // print_r($item_array);
                                    } 

                                ?>

                                <form method="post">
                                    <select name="kra_id" id="kra_id" onchange='if(this.value != "0"){ this.form.submit(); }'>
                                        <?php foreach($id_array as $index => $data_id): ?>
                                            <!-- make 1st data disabled,make 1st data selected -->
                                                <option <?php if($data_id == "0"){ echo "disabled";}?> <?php if($data_id == "0"){ echo "selected";}?> value="<?php echo $data_id ?>"<?php if($kra_id == $data_id){echo "selected";}?>> 
                                                        <!-- PRINT TO OPTION -->
                                                        <?php if($item_array[$index] == 0){echo "SELECT KRA";}else{echo "KEY RESULT AREA    " . $item_array[$index];} ?>
                                                </option>
                                        <?php endforeach ?>
                                    </select>
                                </form>



                                <center>  
                                    <div id="pi_table">  
                                        <div class="table-wrapper-scroll-y">         
                                            <table class="table table-hover" id="crud_table">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">Kra No</th>
                                                        <th width="5%">Item No</th>
                                                        <th width="5%">PI No</th>
                                                        <th width="28%">Quality</th>
                                                        <th width="28%">Efficiency</th>
                                                        <th width="29%">Timeliness</th>
                                                        <th width="5%">Active</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <!-- ALGO -->
                                                <?php $query = mysqli_query($connection,"SELECT * FROM kra_pi where kra_id = '$kra_id' AND t_id ='$u_id'");
        
                                                while($row = mysqli_fetch_array($query)):?>
                                                
                                                    <tr>              
                                                        <td><strong class="<?php if($row["pi_no"] != 5){echo "opac";}?>"><?php echo $row["kra_no"]; ?></strong>
                                                        </td>
                                                        <td>
                                                            <strong class="<?php if($row["pi_no"] != 5){echo "opac";}?>"><?php echo $row["kra_no"] . "." . $row["kra_items"]; ?> </strong>
                                                        </td>
                                                        <td><?php echo $row["pi_no"]; ?></td>
                                                        <td class=""><?php if(empty($check1)){ echo $row["pi_quality"]; }else{echo $check1; } ?></td>
                                                        <td class=""><?php if(empty($check2)){ echo $row["pi_efficiency"]; }else{echo $check2; } ?></td>
                                                        <td class=""><?php if(empty($check3)){ echo $row["pi_timeliness"]; }else{echo $check3; } ?></td>
                                                        <td><input type="button" name="edit" value="Update" id="<?php echo $row["pi_id"]; ?>" class="btn btn-info btn-sm edit_data" />
                                                        </td>         
                                                    </tr>
                                                <?php endwhile;?>
                                                </tbody>
                                            </table>    
                                        <br>
                                        </form>                    
                                    </div>
                                </center>
                    </div>
            </section>
        </div>  
    </div>
    <br><br>

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
                            <label>Enter Performance Indicator for Quality</label>  
                            <textarea name="pi_qual" id="pi_qual" class="form-control" rows="3" <?php if($readonly1 != ""){echo $readonly1;}?> placeholder="<?php echo $check1; ?>"></textarea>  
                            <br />  
                            <label>Enter Performance Indicator for Efficiency</label>  
                            <textarea name="pi_eff" id="pi_eff" class="form-control" rows="3" <?php if($readonly2 != ""){echo $readonly2;}?> placeholder="<?php echo $check2; ?>"></textarea>  
                            <br />  
                            <label>Enter Performance Indicator for Timeliness</label>  
                            <textarea name="pi_time" id="pi_time" class="form-control" rows="3" <?php if($readonly3 != ""){echo $readonly3;}?> placeholder="<?php echo $check3; ?>">
                            </textarea>  
                            <br />    
                            <input type="hidden" name="pi_id" id="pi_id" />  
                            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" /> 
                            <input type="text" name="modal-kra-id" id="modal-kra-id" style="visibility: hidden;">   
                        </form>  
                    </div>  
                    <div class="modal-footer">  
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                    </div>  
               </div>  
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

<!-- Update functions -->
 <script>  
 $(document).ready(function(){  
      $(document).on('click', '.edit_data', function(){  
           var pi_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{pi_id:pi_id},  
                dataType:"json",  
                success:function(data){  
                    //form name x database data
                    $('#modal-kra-id').val(data.kra_id);  
                    $('#pi_id').val(data.pi_id);  
                    $('#pi_qual').val(data.pi_quality);  
                    $('#pi_eff').val(data.pi_efficiency);  
                    $('#pi_time').val(data.pi_timeliness);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#kra_item_perc').val() == "")  
           {  
                // alert("Percentage is required");  validation
           }  
           else  
           {  
                $.ajax({  
                     url:"kra_pi_insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#pi_table').html(data);  
                     }  
                });  
           }  
      });    
 });  
 </script>
 
