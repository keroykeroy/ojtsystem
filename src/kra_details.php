<?php
    require_once("../conn/connection.php");
    include_once("../conn/session.php");
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KRA details</title>
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
    /*TOP*/


    hr.style-four {
        height: 12px;
        border: 0;
        box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
    }

    .content-top{
        margin-left: 5%;
        margin-right: 5%;
        margin-bottom: 2%;
    }

    /*Shadow panel*/
    .panel{
        box-shadow: 0px 0px 4px 1px black;
    }

    /*INPUT FORMS CSS FOR MODAL*/
    .form-control{
        padding:0 5px; 
        border-radius: 5px;
        border-color: lightgray;
        text-align: justify;
    }

    /*INPUT FORM FOR SEARCH*/
    .search{
        height: 30px;
    }

    /*INPUT TEXT FOCUS*/
    input[type=text]:focus, input[type=password]:focus {
        background-color: #C1E1FF; 
        outline: none;
    }

    /*SCROLLING TABLE*/
    .table-wrapper-scroll-y {
        display: block;
        max-height: 500px;
        overflow-y: auto;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }


    /*td search */
    .td-fsearch {
        min-width: 18em;
        max-width: 18em;
        word-break: break-all;
    }

    /*TABLE CSS*/
    .table{
        border: 2px solid darkgray;
    }

    thead{
        border-bottom:5px solid darkgray;
    }

    table, th, td {
    border: 1px solid darkgray;

    }

    /*input form values*/
    .kra_data{
        border-radius: 5px;
        font-size: 12px;
        letter-spacing: 1px;
        text-indent: 20px;
    }

    .title-checker{
        letter-spacing: 3px;
        font-weight: bold;
    }

    /* | size */
    .size{
        font-size: 30px;
    }
    /*red if error*/
    .error_red{ 
        color:red;
    }
    /*green if suc*/
    .success_green{
        color:green;
    }

    /*warning orange*/
    .warning_orange{
        color:#CA8A1D;
    }

    .gradient{
        border-radius: 1em;
        background-color: #f9ea8f;
        background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);
    }

</style>

<body>

<!-- SEARCH CUSTOMER  -->
<?php
if(isset($_POST['valueToSearch']))
  {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM users_kra_view WHERE CONCAT(`kra_no`) LIKE '%".$valueToSearch."%' AND t_id='$u_id' ORDER BY kra_no ASC";
    $result = mysqli_query($connection,$query);
    $search_result = mysqli_query($connection,$query);

        while($rows = mysqli_fetch_assoc($result)){

          if($valueToSearch == $rows['kra_no'] || $valueToSearch == $rows['kra_items']){
                $_SESSION['valueToSearch'] = $valueToSearch;
                $_SESSION['valueToSearch'];
          }else{
            unset($_SESSION['valueToSearch']);
          }
    }
  }

   else{
      $query = "SELECT * FROM users_kra_view where t_id = '$u_id' ORDER BY kra_no";
      $search_result = mysqli_query($connection,$query);
      unset($_SESSION['valueToSearch']);

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
        <h1 style="font-family: courier new; font-size: 40px; ">KRA DETAILS</h1>
        <hr class="style-four">
    </center>

    <div class="content-top">
        <div class="row" >
            <section class="panel" style="background-color: green;">
                <header class="panel-heading">
                    
                </header>    
                    
            <!-- TABLE BODY -->
            <div class="panel-body">   
              
                    <!-- SEARCH AND OUTPUTDATA -->
                    <?php
                    $sum = 0;
                    $target_perc[] = "";
                    $item_perc[] = "";

                    $getlength = mysqli_query($connection,"SELECT COUNT(DISTINCT kra_no) AS count FROM users_kra");
                    $data = mysqli_fetch_array($getlength);
                    $length = $data["count"] +1;

                        for($x=1; $x<$length; $x++){
                            $query = mysqli_query($connection,"SELECT * FROM users_kra where kra_no = '$x' AND t_id ='$u_id'");
                            while ($row = mysqli_fetch_assoc($query)) {                        
                                if($query){
                                    $query2 = mysqli_query($connection,"SELECT SUM(kra_item_percentage) AS total_item_sum FROM users_kra where kra_no = '$x' AND t_id ='$u_id'");
                                    $data = mysqli_fetch_array($query2);
                                    $item_perc[$x] = $data["total_item_sum"];
                                    $target_perc[$x] = $row["kra_target_percentage"];
                                    $sum = $sum +  $row["kra_item_percentage"];
                                }   
                                $total = $sum;              
                            }                    
                        }
                    ?>
                    <!-- DIV FOR TABLE REFERSH -->
                    <div id="kra_ref" class="gradient" align="center">  
                    <div class="title-checker">          
                        <small>KRA Percentage Checker</small>
                    </div>
              
                        <?php 
                            for($i = 1; $i<$length; $i++){
                                if(!empty($item_perc[$i])){
                                    if($item_perc[$i] == $target_perc[$i]){
                                        echo "<label  class='kra_data success_green'>"  . "KRA" . $i . ": " . "<span>" . $item_perc[$i] ."%" . "<span class='size'>" . "|" . "</span>" .$target_perc[$i] . "%"  . "</span>" . "</label>"; 
                                    }
                                    else if($item_perc[$i] > $target_perc[$i]){
                                        echo "<label  class='kra_data error_red'>"  . "KRA" . $i . ": " . "<span>" . $item_perc[$i] ."%" . "<span class='size'>" . "|" . "</span>" .$target_perc[$i] . "%"  . "</span>" . "</label>"; 
                                    }else{
                                            echo "<label  class='kra_data warning_orange'>" . "KRA" . $i . ": " . "<span>" . $item_perc[$i] ."%" . "<span class='size'>" . "|" . "</span>" .$target_perc[$i] . "%"  . "</span>" . "</label>";
                                        }
                                }                   
                            }                    
                        ?> 
                                   
                        
                        <?php 
                            if(!empty($total)){
                                if($total > 100){
                                    echo "<div class='kra_data'><label class='error_red'>TOTAL:" . $total . "%" . "<span class='size'>|</span>" . "100%" . "  </label> </div>";    
                                }else if($total == 100){
                                    echo "<div class='kra_data'><label class='success_green'>TOTAL:" . $total . "%" . "<span class='size'>|</span>" . "100%" . "  </label> </div>";  
                                }else{
                                     echo "<div class='kra_data'><label class='warning_orange'>TOTAL:" . $total . "%" . "<span class='size'>|</span>" . "100%" . "  </label> </div>";  
                                }  
                            }
                        ?>                                             
                    </div> 

                <br>
                <div class="td-fsearch kra_data">
                    <form action="kra_details.php" method="post"> 
                        <input type="text"  class="form-control search" name="valueToSearch" placeholder="Search for KRA no." autocomplete="off">
                    </form>     
                </div>                  
                
                <!-- TABLE -->
                <center>  
                    <div id="employee_table" >  
                        <div class="table-wrapper-scroll-y">         
                            <table class="table table-hover" id="crud_table">
                                <thead>
                                    <tr>
                                        <th width="5%">Kra No</th>
                                        <th width="50%">Objective</th>
                                        <th width="10%">Quality</th>          
                                        <th width="10%">Efficiency</th>
                                        <th width="10%">Timeliness</th>
                                        <th width="5%">Item Percentage</th>
                                        <th width="5%">Target Percentage</th>
                                        <th width="5%" colspan="2">Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($row = mysqli_fetch_array($search_result)):?>
                                    <tr>
                                        <td><?php echo $row['kra_no'] . "." . $row["kra_items"]; ?></td>
                                        <td><?php echo $row['kra_objective'];?></td>
                                        <td><?php if($row["kra_quality"] == 1){ echo "Required"; }else{ echo "Not Required"; } ?></td>
                                        <td><?php if($row["kra_efficiency"] == 1){ echo "Required"; }else{ echo "Not Required"; } ?></td>
                                        <td><?php if($row["kra_timeliness"] == 1){ echo "Required"; }else{ echo "Not Required"; } ?></td>
                                        <td><?php echo $row['kra_item_percentage'] . "%"; ?> </td> 
                                        <td><?php echo $row['kra_target_percentage'] . "%"; ?> </td> 
                                        <td><input type="button" name="edit" value="Update"  id="<?php echo $row["kra_id"]; ?>" class="btn btn-info btn-sm edit_data" /></td>         
                                        <td><input type="button" name="kra_del" value="Delete" data-id="<?php echo $row["kra_id"]; ?>" class="btn btn-danger btn-sm kra_del">
                                        </td>       
                                    </tr>  
                                <?php endwhile;?>
                                </tbody>
                            </table>  
                        </div>
                    </div>
                </center>
            </div>
            </section>
        </div>   
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


 
    <div id="add_data_Modal" class="modal fade">  
          <div class="modal-dialog">  
               <div class="modal-content">  
                    <div class="modal-header" style="background-color:seagreen;">  
                         <button type="button" class="close" data-dismiss="modal">&times;</button>  
                         <strong class="modal-title">Update</strong>
                    </div>  
                    <div class="modal-body">  
                        <form method="post" id="insert_form">
                            <label>Enter Target Percentage</label>  
                            <input type="text" name="kra_target_perc" id="kra_target_perc" class="form-control"/>  
                            <br />  
                            <label>Enter Item Percentage</label>  
                            <input type="text" name="kra_item_perc" id="kra_item_perc" class="form-control"/>  
                            <br />  
                            <label>Enter Objective</label>  
                            <textarea name="kra_objective" id="kra_objective" class="form-control" rows="5"></textarea>  
                            <br />  
                            <label>Select Quality</label>  
                            <select name="kra_quality" id="kra_quality" class="form-control"> 
                                <option value="1">Required</option>  
                                <option value="0">Not Required</option>  
                            </select>  
                            <br />  
                            <label>Select Efficiency</label>  
                            <select name="kra_eff" id="kra_eff" class="form-control"> 
                                <option value="1">Required</option>  
                                <option value="0">Not Required</option>  
                            </select>  
                            <br />  
                            <label>Select Timeliness</label>  
                            <select name="kra_time" id="kra_time" class="form-control">
                                <option value="1">Required</option>  
                                <option value="0">Not Required</option>  
                            </select>  

                            <br />    
                            <input type="hidden" name="kra_id" id="kra_id" />  
                            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                            <input type="text" name="kra_no" id="kra_no" style="visibility: hidden">  

                        </form>  
                    </div>  
                    <div class="modal-footer">  
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
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


<!-- Update/Inserting functions -->
 <script>  
 $(document).ready(function(){  
      $(document).on('click', '.edit_data', function(){  
           var kra_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{kra_id:kra_id},  
                dataType:"json",  
                success:function(data){  
                    //form name x database data 
                    $('#kra_id').val(data.kra_id);  
                    $('#kra_no').val(data.kra_no);  
                    $('#kra_target_perc').val(data.kra_target_percentage); 
                    $('#kra_item_perc').val(data.kra_item_percentage);  
                    $('#kra_objective').val(data.kra_objective);  
                    $('#kra_quality').val(data.kra_quality);  
                    $('#kra_eff').val(data.kra_efficiency);  
                    $('#kra_time').val(data.kra_timeliness); 
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show'); 
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#kra_item_perc').val() == "")  
           {  
                alert("Percentage is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"kra_details_insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#kra_ref').load(document.URL +  ' #kra_ref');
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });    
 });  
 </script>


<!--  
<script>
function to be called after deletion = print
    function fetch_data(){  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#employee_table').html(data);  
                }  
           });  
    } 
</script> -->

<script>

//delete ajax
     $(document).on('click', '.kra_del', function(){  
           var kra_del=$(this).data("id");  
           console.log(kra_del);
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                    url:"kra_delete.php",  
                    method:"POST",  
                    data:{kra_del:kra_del},  
                    dataType:"text",  
                    success:function(data){  
                        $('#kra_ref').load(document.URL +  ' #kra_ref');
                        $('#employee_table').html(data);   
                    }  
                });  
           }  
       });
</script>