<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Monthly Monitoring Form</title>
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

    .gradient{
        background-color: #f9ea8f;
        background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);
    }
    .view{
        border-radius: 5px;
    }

</style>

<body>

<!-- get kra data -->
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
    } 

?>

    <!-- AFTER SELECTED -->
    <?php
    $kra_id = "";

        if(isset($_POST["kra_id"])){
            $kra_id = mysqli_escape_string($connection,$_POST["kra_id"]);
            if($kra_id != ""){

                // QUERY TO SEARCH KRA AFTER SUBMITTED
                $searchkra = mysqli_query($connection,"SELECT * FROM users_kra where kra_id = '$kra_id'");
                $rowkra = mysqli_fetch_array($searchkra);
            }
        }
    ?>

    <!-- SEARCH FOR MONTH -->
    <?php 

    $empdetails = mysqli_query($connection,"SELECT * FROM users_rp_details WHERE t_id = '$u_id'");
    $emprow = mysqli_fetch_assoc($empdetails);
    $relation = $emprow["u_rp_relation"];

    if($relation == "Non Teaching"){
        $searchmon = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_jan_dec WHERE kra_id = '$kra_id'");
        $moncheck = mysqli_num_rows($searchmon);
    }else{
        $searchmon = mysqli_query($connection,"SELECT * FROM kra_monitoring_view_july_june WHERE kra_id = '$kra_id'");
        $moncheck = mysqli_num_rows($searchmon);
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
        <h1 style="font-family: courier new; font-size: 40px; ">MONITORING FORM</h1>
        <hr class="style-four">
    </center>

                        <div class="breadcome-list content" id="content">
                            <form method="post">
                                <div class="row">
                                    <div class='col-sm-6'>               
                                        <div class="form-group">
                                            <select class="form-control" name="kra_id" id="kra_id" onchange='if(this.value != "0"){ this.form.submit(); }'>
                                                <?php foreach($id_array as $index => $data_id): ?>
                                                    <!-- make 1st data disabled,make 1st data selected -->
                                                    <option <?php if($data_id == "0"){ echo "disabled";}?> <?php if($data_id == "0"){ echo "selected";}?> value="<?php echo $data_id ?>" <?php if($kra_id == $data_id){echo "selected";}?>> 
                                                        <!-- PRINT TO OPTION -->
                                                        <?php if($item_array[$index] == 0){echo "SELECT KRA";}else{echo "KEY RESULT AREA    " . $item_array[$index];} ?>
                                                    </option>

                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- OBJECTIVES VIEW -->
                            <div class="row">
                                <div class='col-sm-12'>   
                                    <div class="form-group">
                                        <label>Objectives</label>
                                        <textarea style="resize: none; border:none; height: 100px; font-style: italic;" class="gradient view" readonly><?php if($kra_id != ""){ echo $rowkra["kra_objective"]; }?></textarea>
                                    </div>
                                </div>
                            </div>  

                            <div id="monthdiv">
                                <form method="post" id="monitoring-form">
                            
                                    <!-- MONTH-->
                                    <div class="row">
                                        <div class='col-sm-12'>   
                                            <div class="form-group">
                                                <label>Month</label>
                                                <div style="border:none;" class="gradient view" id="view" readonly>
                                                   <i> <?php if(empty($kra_id) || $moncheck == 0){echo "This Key result area (KRA) is no deciding month.";}?></i>
                                                   <div style="text-align: center;">
                                                        <small style="font-weight: bold;">
                                                            <?php if(!empty($moncheck)){echo "Click Month to  Update.";}?>
                                                        </small>
                                                   </div>
                                                    <?php while($rowmonth= mysqli_fetch_assoc($searchmon)):?>
                                                        <input type="button" name="edit" value="<?php echo $rowmonth["kra_mon_month"]; ?>"  id="<?php echo $rowmonth["id"]; ?>" class="btn btn-link edit_data" />
                                                    <?php endwhile; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                    
                                    <div class="row">
                                    <div class='col-sm-6'>               
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
                                    </div>
                                    
                                    <div class="row">
                                        <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label>Enter Target</label>
                                                <input name="kra_target" id="kra_target" type="number" class="form-control prc">
                                            </div>
                                        </div>
                                    <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label>Remarks on Quality</label>
                                                <select class="form-control" name="kra_quality" id="kra_quality">
                                                    <?php
                                                    if($kra_id != ""){
                                                        $arr = array("",1,2,3,4,5);
                                                    } 
                                                    foreach($arr as $value) :?>
                                                        <?php    
                                                            if($rowkra["kra_quality"] == 0 ){
                                                                echo  '<option value="0">Not Required</option>';
                                                                break;
                                                            }else{
                                                                echo '<option value='.$value.'>'.$value.'</option>';
                                                            }
                                                        ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label>Enter Actual</label>
                                                <input name="kra_actual" id="kra_actual" type="number" class="form-control prc">
                                            </div>
                                        </div>
                                    <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label>Remarks on Efficiency</label>
                                                <select class="form-control" name="kra_efficiency" id="kra_efficiency">
                                                    <?php foreach($arr as $value) :?>
                                                        <?php    
                                                            if($rowkra["kra_efficiency"] == 0 ){
                                                                echo  '<option value="0">Not Required</option>';
                                                                break;
                                                            }else{
                                                                echo '<option value='.$value.'>'.$value.'</option>';
                                                            }
                                                        ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label>Completion</label>
                                                <input name="kra_completion" id="kra_completion" type="text" class="form-control" style="border: none;" readonly>
                                            </div>
                                        </div>
                                    <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label>Remarks on Timeliness</label>
                                                <select class="form-control" name="kra_timeliness" id="kra_timeliness">
                                                    <?php foreach($arr as $value) :?>
                                                        <?php    
                                                            if($rowkra["kra_timeliness"] == 0 ){
                                                                echo  '<option value="0">Not Required</option>';
                                                                break;
                                                            }else{
                                                                echo '<option value='.$value.'>'.$value.'</option>';
                                                            }
                                                        ?>
                                                    <?php endforeach; ?>    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="center">
                                        <input type="hidden" name="save" id="submit-form"/>  
                                        <input type="button" class="btn btn-primary" value="Perform Monitoring" id="submit-form">
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
                            <input type="text" id="monitoring_month" name="monitoring_month" class="form-control gradient" readonly style="border: none; font-size: 20px; letter-spacing: 3px; text-align: center; text-transform: uppercase;" />  
                            <br />

                            <div class="form-group">
                                <label style="font-style: italic;">Date and time encoded : </label> <input name="date-encoded" id="date-encoded" type="text" class="" style="border: none; color:red; font-style: italic; outline: none; width: 170px;" readonly>
                            </div>
                            <div class="form-group">
                                <label>Enter Target</label>
                                <input name="mon_target" id="mon_target" type="number" class="form-control prcmodal">
                            </div>
                            <div class="form-group">
                                <label>Enter Actual</label>
                                <input name="mon_actual" id="mon_actual" type="number" class="form-control prcmodal">
                            </div>
                            <div class="form-group"> 
                                <label>Completion</label>  
                                <input type="text" name="mon_completion" id="mon_completion" class="form-control" readonly style="border:none;" />  
                            </div>
                            <div class="form-group">  
                                <label>Remarks on Quality</label>  
                                <select name="mon_quality" id="mon_quality" class="form-control"> 
                                    <?php 
                                        if($rowkra["kra_quality"] == 0 ){ 
                                            echo '<option value="0">Not Required</option>';
                                        }else{
                                            echo'
                                                <option value="1">1</option>  
                                                <option value="2">2</option>  
                                                <option value="3">3</option>  
                                                <option value="4">4</option>  
                                                <option value="5">5</option>';
                                        }
                                    ?>
                                </select>  
                            </div>
                            <div class="form-group">
                            <label>Remarks on Efficiency</label>  
                                <select name="mon_efficiency" id="mon_efficiency" class="form-control"> 
                                    <?php 
                                        if($rowkra["kra_efficiency"] == 0 ){ 
                                            echo '<option value="0">Not Required</option>';
                                        }else{
                                            echo'
                                                <option value="1">1</option>  
                                                <option value="2">2</option>  
                                                <option value="3">3</option>  
                                                <option value="4">4</option>  
                                                <option value="5">5</option>';
                                        }
                                    ?>
                                </select> 
                            </div> 
                            <div class="form-group">
                            <label>Remarks on Timeliness</label>
                                <select name="mon_timeliness" id="mon_timeliness" class="form-control">
                                    <?php 
                                        if($rowkra["kra_timeliness"] == 0 ){ 
                                            echo '<option value="0">Not Required</option>';
                                        }else{
                                            echo'
                                                <option value="1">1</option>  
                                                <option value="2">2</option>  
                                                <option value="3">3</option>  
                                                <option value="4">4</option>  
                                                <option value="5">5</option>';
                                        }
                                    ?>

                                </select>  
                            </div>
                            <input type="hidden" name="insert" id="insert"/>  
                            <input type="submit" name="insert" id="insert" value="Update" class="btn btn-success" /><input type="text" name="modal-kra-id" id="modal-kra-id" style="visibility: hidden;" />    
                        </form>  
                    </div>  
                    <div class="modal-footer">  
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                    </div>  
               </div>  
          </div>  
     </div>  


    <!-- jquery automatic calculate -->
    <!-- <script src="../js/jquery.min.js"></script> -->
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
      $(document).on('click', '#submit-form', function(){  
        var submit = $('#submit-form').val();
        var kra_id = "<?php echo $kra_id; ?>"
        var kra_target = $('#kra_target').val();
        var kra_actual = $('#kra_actual').val();
        var kra_completion = $('#kra_completion').val();
        var kra_quality = $('#kra_quality').val();
        var kra_efficiency = $('#kra_efficiency').val();
        var kra_timeliness = $('#kra_timeliness').val();
        var kra_month = $('#kra_month').val();
        var alert1 = 0;

        if(kra_target!="" && kra_actual!="" && kra_completion!="" && kra_quality!="" && kra_efficiency!="" && kra_timeliness != "" && kra_month != "" && kra_id != ""){

            if(kra_month == "January" || kra_month == "February" || kra_month == "March" || kra_month == "April" || kra_month == "May" || kra_month == "June" || kra_month == "July" || kra_month == "August" || kra_month == "September" || kra_month == "October" || kra_month == "November" || kra_month == "December"){
                alert1 = 1;

            }else{
                alert("Wrong Month input! Choose exactly.");
            }

        }else{
            alert("Field is Required!");
        }

        if(alert1 == 1){
            $.ajax({
                url: "monitoring_insert.php",
                type: "POST",
                data: {
                submit:submit,
                kra_id: kra_id,
                kra_target: kra_target,
                kra_actual: kra_actual,
                kra_completion: kra_completion,
                kra_quality: kra_quality,
                kra_efficiency: kra_efficiency,
                kra_timeliness: kra_timeliness,
                kra_month: kra_month          
                },
                cache: false,
                success: function(data){
                $('#monitoring-form').html(data);  
                }
            });
        }
    });
});
</script>


<!-- Update month modal functions -->
 <script>  
 $(document).ready(function(){  
      $(document).on('click', '.edit_data', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                    //form name x database data 
                    var date = data.date_encoded;
                    date = date.split('  ')[0];
                    $("#date-encoded").val(date);
                    $('#insert').val(data.id); 
                    $('#modal-kra-id').val(data.kra_id);  
                    $('#monitoring_month').val(data.kra_mon_month); 
                    $('#mon_actual').val(data.kra_mon_actual);
                    $('#mon_target').val(data.kra_mon_target);
                    $('#mon_completion').val(data.kra_mon_completion + "%");
                    $('#mon_quality').val(data.rmks_quality);  
                    $('#mon_efficiency').val(data.rmks_efficiency);  
                    $('#mon_timeliness').val(data.rmks_timeliness);  
                    $('#add_data_Modal').modal('show'); 
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#kra_item_perc').val() == "")  
           {  
                // alert("Percentage is required");  validation area
           }  
           else  
           {  
                $.ajax({  
                     url:"monitoring_insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Updating");  
                     },  
                     success:function(data){   
                        $('#insert_form')[0].reset();  
                        $('#add_data_Modal').modal('hide');  
                        $('#monitoring-form').html(data); 
                     }  
                });  
           }  
      });    
 });  
 </script>


<!-- AUTO CALCULATE -->
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

<!-- AUTO IN MODAL CALCULATE -->
<script>
    $('.form-group').on('input','.prcmodal',function(){
        var total = 0;
        $('.form-group .prcmodal').each(function(){
            var target = parseFloat($("#mon_target").val()) || 0;
            var actual = parseFloat($("#mon_actual").val()) || 0;
            if(target == 0){
                total = 0;    
            }else{
                total = (actual / target) * 100;
                total = Math.round(total);
            }
        });
        $('#mon_completion').val(total+'%');
    });
</script>

